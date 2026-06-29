<?php
/**
 * Módulo: Formulario de Quejas y Sugerencias IUP Sur
 * ------------------------------------------------------------------
 * - Procesa el envío del formulario de la plantilla page-quejas-y-sugerencias.php
 * - Permite reportes ANÓNIMOS: nombre, teléfono y correo son opcionales.
 * - Anti-spam: honeypot + token de tiempo firmado + nonce + límite por IP
 * - Sanitiza todos los campos para evitar inyección de código / cabeceras
 * - Página de configuración propia en wp-admin (remitente, destinatario, plantilla)
 *
 * Es un módulo INDEPENDIENTE del formulario de contacto: tiene su propio
 * destinatario y su propia plantilla de correo.
 *
 * Cárgalo desde el functions.php de tu tema activo:
 *
 *   require_once get_theme_file_path( '/inc/quejas/iup-quejas-form.php' );
 *
 * @package IUPSUR
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Evita acceso directo.
}

if ( ! class_exists( 'IUP_Quejas_Form' ) ) :

class IUP_Quejas_Form {

	/* Identificadores internos */
	const OPTION_KEY   = 'iup_quejas_form_options';
	const SETTINGS_GRP = 'iup_quejas_form_group';
	const NONCE_ACTION = 'iup_quejas_form_nonce';
	const NONCE_FIELD  = 'iup_qf_nonce';
	const ACTION       = 'iup_quejas_submit';
	const HONEYPOT     = 'iup_qf_website';
	const TS_FIELD     = 'iup_qf_token';

	/* Reglas anti-spam */
	const MIN_SECONDS  = 3;
	const MAX_SECONDS  = 3600;
	const RATE_MAX     = 5;
	const RATE_WINDOW  = 600;

	/** @var IUP_Quejas_Form|null */
	private static $instance = null;

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	private function __construct() {
		add_action( 'admin_menu', array( $this, 'register_settings_page' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );

		add_action( 'admin_post_' . self::ACTION,        array( $this, 'handle_submission' ) );
		add_action( 'admin_post_nopriv_' . self::ACTION, array( $this, 'handle_submission' ) );
		add_action( 'wp_ajax_' . self::ACTION,           array( $this, 'handle_submission' ) );
		add_action( 'wp_ajax_nopriv_' . self::ACTION,    array( $this, 'handle_submission' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	/* =====================================================================
	 * OPCIONES / VALORES POR DEFECTO
	 * =================================================================== */

	public static function default_options() {
		return array(
			'recipient'       => get_option( 'admin_email' ),
			'from_name'       => get_bloginfo( 'name' ),
			'from_email'      => 'no-reply@' . self::site_domain(),
			'subject'         => 'Nuevo reporte ([report-type]) — IUP Sur',
			'body'            => self::default_template(),
			'success_message' => 'Recibimos tu reporte. Gracias por ayudarnos a mejorar.',
			'error_message'   => 'Ocurrió un error al enviar tu reporte. Inténtalo de nuevo más tarde.',
		);
	}

	/** Plantilla por defecto, pensada para reportes (admite anonimato). */
	public static function default_template() {
		return "Nuevo reporte: [report-type]\n\n"
			. "Nombre: [full-name]\n"
			. "Teléfono: [tel-number]\n"
			. "Correo: [email]\n\n"
			. "Mensaje:\n"
			. "[message]";
	}

	public static function get_options() {
		$saved = get_option( self::OPTION_KEY, array() );
		if ( ! is_array( $saved ) ) {
			$saved = array();
		}
		return wp_parse_args( $saved, self::default_options() );
	}

	private static function site_domain() {
		$host = wp_parse_url( home_url(), PHP_URL_HOST );
		$host = preg_replace( '/^www\./', '', (string) $host );
		return $host ? $host : 'localhost';
	}

	/** Etiquetas legibles para el <select name="type">. */
	public static function type_labels() {
		return apply_filters( 'iup_qf_type_labels', array(
			'queja'          => 'Queja',
			'sugerencia'     => 'Sugerencia',
			'comentario'     => 'Comentario general',
			'reconocimiento' => 'Reconocimiento',
		) );
	}

	/* =====================================================================
	 * ANTI-SPAM
	 * =================================================================== */

	public static function make_token() {
		$ts = time();
		return $ts . ':' . wp_hash( $ts . '|iup_qf' );
	}

	private function valid_token( $token, &$reason = '' ) {
		if ( ! is_string( $token ) || false === strpos( $token, ':' ) ) {
			$reason = 'token';
			return false;
		}
		list( $ts, $hash ) = explode( ':', $token, 2 );
		$ts = (int) $ts;

		if ( ! hash_equals( wp_hash( $ts . '|iup_qf' ), (string) $hash ) ) {
			$reason = 'token';
			return false;
		}

		$elapsed = time() - $ts;
		if ( $elapsed < self::MIN_SECONDS ) {
			$reason = 'fast';
			return false;
		}
		if ( $elapsed > self::MAX_SECONDS ) {
			$reason = 'expired';
			return false;
		}
		return true;
	}

	private function client_ip() {
		$ip = isset( $_SERVER['REMOTE_ADDR'] ) ? wp_unslash( $_SERVER['REMOTE_ADDR'] ) : '';
		return filter_var( $ip, FILTER_VALIDATE_IP ) ? $ip : '';
	}

	private function rate_limited() {
		$ip = $this->client_ip();
		if ( '' === $ip ) {
			return false;
		}
		$key   = 'iup_qf_rl_' . md5( $ip );
		$count = (int) get_transient( $key );
		if ( $count >= self::RATE_MAX ) {
			return true;
		}
		set_transient( $key, $count + 1, self::RATE_WINDOW );
		return false;
	}

	/* =====================================================================
	 * PROCESAMIENTO DEL ENVÍO
	 * =================================================================== */

	public function handle_submission() {
		$is_ajax = wp_doing_ajax();

		// 1) Nonce (CSRF).
		$nonce = isset( $_POST[ self::NONCE_FIELD ] ) ? wp_unslash( $_POST[ self::NONCE_FIELD ] ) : '';
		if ( ! wp_verify_nonce( $nonce, self::NONCE_ACTION ) ) {
			return $this->respond( false, 'Tu sesión expiró. Recarga la página e inténtalo de nuevo.', array(), $is_ajax );
		}

		// 2) Honeypot -> bot: "éxito" silencioso.
		$honeypot = isset( $_POST[ self::HONEYPOT ] ) ? trim( (string) wp_unslash( $_POST[ self::HONEYPOT ] ) ) : '';
		if ( '' !== $honeypot ) {
			return $this->respond( true, self::get_options()['success_message'], array(), $is_ajax );
		}

		// 3) Token de tiempo.
		$reason = '';
		$token  = isset( $_POST[ self::TS_FIELD ] ) ? (string) wp_unslash( $_POST[ self::TS_FIELD ] ) : '';
		if ( ! $this->valid_token( $token, $reason ) ) {
			if ( 'fast' === $reason ) {
				return $this->respond( false, 'Espera un momento antes de enviar el reporte.', array(), $is_ajax );
			}
			return $this->respond( false, 'No pudimos validar tu envío. Recarga la página e inténtalo de nuevo.', array(), $is_ajax );
		}

		// 4) Límite por IP.
		if ( $this->rate_limited() ) {
			return $this->respond( false, 'Has enviado varios reportes. Espera unos minutos antes de intentar de nuevo.', array(), $is_ajax );
		}

		// 5) Sanitizar y validar.
		$fields = $this->collect_fields();
		$errors = $this->validate( $fields );
		if ( ! empty( $errors ) ) {
			return $this->respond( false, 'Revisa los campos marcados e inténtalo de nuevo.', $errors, $is_ajax );
		}

		// 6) Enviar correo.
		$sent = $this->send_email( $fields );
		if ( ! $sent ) {
			return $this->respond( false, self::get_options()['error_message'], array(), $is_ajax );
		}

		return $this->respond( true, self::get_options()['success_message'], array(), $is_ajax );
	}

	/** Lee y sanitiza los campos. Nombre/teléfono/correo son opcionales (anonimato). */
	private function collect_fields() {
		$p = wp_unslash( $_POST );
		return array(
			'name'    => isset( $p['name'] )    ? sanitize_text_field( $p['name'] )       : '',
			'phone'   => isset( $p['phone'] )   ? sanitize_text_field( $p['phone'] )      : '',
			'email'   => isset( $p['email'] )   ? sanitize_email( $p['email'] )           : '',
			'type'    => isset( $p['type'] )    ? sanitize_text_field( $p['type'] )       : '',
			'message' => isset( $p['message'] ) ? sanitize_textarea_field( $p['message'] ) : '',
		);
	}

	private function validate( $f ) {
		$e = array();

		// Tipo de reporte: obligatorio y debe ser uno de los válidos.
		$labels = self::type_labels();
		if ( '' === $f['type'] || ! isset( $labels[ $f['type'] ] ) ) {
			$e['type'] = 'Selecciona un tipo de reporte.';
		}

		// Mensaje: obligatorio.
		if ( '' === $f['message'] ) {
			$e['message'] = 'Escribe tu mensaje.';
		} elseif ( function_exists( 'mb_strlen' ) ? mb_strlen( $f['message'] ) > 5000 : strlen( $f['message'] ) > 5000 ) {
			$e['message'] = 'El mensaje es demasiado largo.';
		}

		// Correo: opcional, pero si se escribe debe ser válido.
		if ( '' !== $f['email'] && ! is_email( $f['email'] ) ) {
			$e['email'] = 'Ingresa un correo electrónico válido o déjalo vacío.';
		}

		return $e;
	}

	private function send_email( $f ) {
		$opts = self::get_options();

		$labels      = self::type_labels();
		$type_label  = isset( $labels[ $f['type'] ] ) ? $labels[ $f['type'] ] : $f['type'];

		// Valores opcionales con respaldo legible cuando van vacíos.
		$name  = '' !== $f['name']  ? $f['name']  : 'Anónimo';
		$phone = '' !== $f['phone'] ? $f['phone'] : 'No proporcionado';
		$email = '' !== $f['email'] ? $f['email'] : 'No proporcionado';

		$map = array(
			'[full-name]'   => $name,
			'[tel-number]'  => $phone,
			'[email]'       => $email,
			'[report-type]' => $type_label,
			'[message]'     => $f['message'],
		);

		$body    = strtr( $opts['body'], $map );
		$subject = sanitize_text_field( strtr( $opts['subject'], $map ) );

		$recipients = array_filter( array_map( 'trim', explode( ',', $opts['recipient'] ) ), 'is_email' );
		if ( empty( $recipients ) ) {
			$recipients = array( get_option( 'admin_email' ) );
		}

		$from_name  = '' !== $opts['from_name'] ? $opts['from_name'] : get_bloginfo( 'name' );
		$from_email = is_email( $opts['from_email'] ) ? $opts['from_email'] : ( 'no-reply@' . self::site_domain() );

		$headers   = array();
		$headers[] = sprintf( 'From: %s <%s>', $this->encode_name( $from_name ), $from_email );
		// Reply-To solo si la persona dejó un correo válido (no es anónimo).
		if ( is_email( $f['email'] ) ) {
			$reply_name = '' !== $f['name'] ? $f['name'] : 'Reporte IUP Sur';
			$headers[]  = sprintf( 'Reply-To: %s <%s>', $this->encode_name( $reply_name ), $f['email'] );
		}
		$headers[] = 'Content-Type: text/plain; charset=UTF-8';

		return wp_mail( $recipients, $subject, $body, $headers );
	}

	private function encode_name( $name ) {
		return trim( preg_replace( '/[\r\n,<>"]+/', ' ', (string) $name ) );
	}

	private function respond( $success, $message, $errors, $is_ajax ) {
		if ( $is_ajax ) {
			if ( $success ) {
				wp_send_json_success( array( 'message' => $message ) );
			}
			wp_send_json_error( array( 'message' => $message, 'errors' => $errors ) );
		}

		$back = wp_get_referer();
		if ( ! $back ) {
			$back = home_url( '/' );
		}
		$back = remove_query_arg( array( 'iup_quejas' ), $back );
		$back = add_query_arg( 'iup_quejas', $success ? 'ok' : 'error', $back );

		wp_safe_redirect( $back . '#Reporte' );
		exit;
	}

	/* =====================================================================
	 * ASSETS DEL FRONT
	 * =================================================================== */

	public function enqueue_assets() {
		if ( ! $this->is_quejas_template() ) {
			return;
		}

		$handle = 'iup-quejas-form';
		$src    = get_theme_file_uri( '/inc/quejas/iup-quejas-form.js' );
		$path   = get_theme_file_path( '/inc/quejas/iup-quejas-form.js' );
		$ver    = file_exists( $path ) ? filemtime( $path ) : '1.0.0';

		wp_register_script( $handle, $src, array(), $ver, true );
		wp_localize_script( $handle, 'IUP_QF', array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'action'  => self::ACTION,
		) );
		wp_enqueue_script( $handle );
	}

	private function is_quejas_template() {
		if ( ! is_page() ) {
			return false;
		}
		$template = function_exists( 'get_page_template' ) ? get_page_template() : '';
		if ( 'page-quejas-y-sugerencias.php' === basename( (string) $template ) ) {
			return true;
		}
		return is_page( 'quejas-y-sugerencias' );
	}

	/* =====================================================================
	 * PANEL DE ADMINISTRACIÓN
	 * =================================================================== */

	public function register_settings_page() {
		add_options_page(
			'Quejas y Sugerencias',
			'Quejas y Sugerencias',
			'manage_options',
			'iup-quejas-form',
			array( $this, 'render_settings_page' )
		);
	}

	public function register_settings() {
		register_setting( self::SETTINGS_GRP, self::OPTION_KEY, array(
			'type'              => 'array',
			'sanitize_callback' => array( $this, 'sanitize_options' ),
			'default'           => self::default_options(),
		) );
	}

	public function sanitize_options( $input ) {
		$defaults = self::default_options();
		$out      = array();

		$out['recipient'] = $this->sanitize_email_list( isset( $input['recipient'] ) ? $input['recipient'] : '' );
		if ( '' === $out['recipient'] ) {
			$out['recipient'] = $defaults['recipient'];
			add_settings_error( self::OPTION_KEY, 'recipient', 'El destinatario no es válido; se restauró el correo de administración.' );
		}

		$out['from_name'] = sanitize_text_field( isset( $input['from_name'] ) ? $input['from_name'] : '' );
		if ( '' === $out['from_name'] ) {
			$out['from_name'] = $defaults['from_name'];
		}

		$from_email        = sanitize_email( isset( $input['from_email'] ) ? $input['from_email'] : '' );
		$out['from_email'] = is_email( $from_email ) ? $from_email : $defaults['from_email'];

		$out['subject'] = sanitize_text_field( isset( $input['subject'] ) ? $input['subject'] : '' );
		if ( '' === $out['subject'] ) {
			$out['subject'] = $defaults['subject'];
		}

		$body        = isset( $input['body'] ) ? (string) $input['body'] : '';
		$out['body'] = sanitize_textarea_field( $body );
		if ( '' === trim( $out['body'] ) ) {
			$out['body'] = $defaults['body'];
		}

		$out['success_message'] = sanitize_text_field( isset( $input['success_message'] ) ? $input['success_message'] : '' );
		if ( '' === $out['success_message'] ) {
			$out['success_message'] = $defaults['success_message'];
		}

		$out['error_message'] = sanitize_text_field( isset( $input['error_message'] ) ? $input['error_message'] : '' );
		if ( '' === $out['error_message'] ) {
			$out['error_message'] = $defaults['error_message'];
		}

		return $out;
	}

	private function sanitize_email_list( $value ) {
		$parts = array_map( 'trim', explode( ',', (string) $value ) );
		$valid = array();
		foreach ( $parts as $p ) {
			$e = sanitize_email( $p );
			if ( is_email( $e ) ) {
				$valid[] = $e;
			}
		}
		return implode( ', ', array_unique( $valid ) );
	}

	public function render_settings_page() {
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		$o = self::get_options();
		?>
		<div class="wrap">
			<h1>Quejas y Sugerencias</h1>
			<p>Configura el remitente, el destinatario y la plantilla del correo de los reportes (quejas, sugerencias, comentarios y reconocimientos). Es independiente del formulario de contacto.</p>

			<form method="post" action="options.php">
				<?php settings_fields( self::SETTINGS_GRP ); ?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="iup_qf_recipient">Destinatario(s)</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recipient]" id="iup_qf_recipient" type="text" class="regular-text" value="<?php echo esc_attr( $o['recipient'] ); ?>" />
							<p class="description">Correo que recibirá los reportes. Para varios, sepáralos con comas.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_from_name">Nombre del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_name]" id="iup_qf_from_name" type="text" class="regular-text" value="<?php echo esc_attr( $o['from_name'] ); ?>" />
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_from_email">Correo del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_email]" id="iup_qf_from_email" type="email" class="regular-text" value="<?php echo esc_attr( $o['from_email'] ); ?>" />
							<p class="description">Usa un correo de tu dominio (por ej. <code>no-reply@<?php echo esc_html( self::site_domain() ); ?></code>). El <em>Reply-To</em> se ajusta solo si la persona dejó su correo.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_subject">Asunto del correo</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[subject]" id="iup_qf_subject" type="text" class="large-text" value="<?php echo esc_attr( $o['subject'] ); ?>" />
							<p class="description">Puedes usar marcadores, por ejemplo: <code>[report-type]</code>.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_body">Plantilla del correo</label></th>
						<td>
							<textarea name="<?php echo esc_attr( self::OPTION_KEY ); ?>[body]" id="iup_qf_body" rows="10" class="large-text code"><?php echo esc_textarea( $o['body'] ); ?></textarea>
							<p class="description">Los marcadores se reemplazan con lo que escriba el usuario. Si un dato opcional va vacío, se muestra "Anónimo" o "No proporcionado".</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_success">Mensaje de éxito</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[success_message]" id="iup_qf_success" type="text" class="large-text" value="<?php echo esc_attr( $o['success_message'] ); ?>" />
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_qf_error">Mensaje de error</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[error_message]" id="iup_qf_error" type="text" class="large-text" value="<?php echo esc_attr( $o['error_message'] ); ?>" />
						</td>
					</tr>
				</table>

				<h2>Marcadores disponibles</h2>
				<table class="widefat striped" style="max-width:720px">
					<thead>
						<tr><th>Marcador</th><th>Campo del formulario</th></tr>
					</thead>
					<tbody>
						<tr><td><code>[full-name]</code></td><td>Nombre completo (o "Anónimo")</td></tr>
						<tr><td><code>[tel-number]</code></td><td>Teléfono (o "No proporcionado")</td></tr>
						<tr><td><code>[email]</code></td><td>Correo (o "No proporcionado")</td></tr>
						<tr><td><code>[report-type]</code></td><td>Tipo de reporte (texto legible)</td></tr>
						<tr><td><code>[message]</code></td><td>Mensaje detallado</td></tr>
					</tbody>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

endif;

IUP_Quejas_Form::instance();