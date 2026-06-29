<?php
/**
 * Módulo: Formulario de Contacto IUPSUR
 * ------------------------------------------------------------------
 * - Procesa el envío del formulario de la plantilla page-contacto.php
 * - Anti-spam: honeypot + token de tiempo firmado + nonce + límite por IP
 * - Sanitiza todos los campos para evitar inyección de código / cabeceras
 * - Página de configuración en wp-admin: remitente, destinatario y plantilla
 *
 * Cárgalo desde el functions.php de tu tema activo:
 *
 *   require_once get_theme_file_path( '/inc/contacto/iup-contact-form.php' );
 *
 * @package IUPSUR
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Evita acceso directo.
}

if ( ! class_exists( 'IUP_Contact_Form' ) ) :

class IUP_Contact_Form {

	/* Identificadores internos (cámbialos solo si sabes lo que haces) */
	const OPTION_KEY   = 'iup_contact_form_options';
	const SETTINGS_GRP = 'iup_contact_form_group';
	const NONCE_ACTION = 'iup_contact_form_nonce';
	const NONCE_FIELD  = 'iup_cf_nonce';
	const ACTION       = 'iup_contact_submit'; // acción de admin-post / admin-ajax
	const HONEYPOT     = 'iup_cf_website';      // campo trampa: debe quedar vacío
	const TS_FIELD     = 'iup_cf_token';        // token de tiempo firmado

	/* Reglas anti-spam */
	const MIN_SECONDS  = 3;     // tiempo mínimo razonable para llenar el form
	const MAX_SECONDS  = 3600;  // validez del token (1 hora)
	const RATE_MAX     = 5;     // máx. envíos...
	const RATE_WINDOW  = 600;   // ...por IP cada 10 minutos

	/** @var IUP_Contact_Form|null */
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

		// Procesamiento del envío:
		//  - Sin JS  -> admin-post.php  (responde con redirección PRG)
		//  - Con JS  -> admin-ajax.php  (responde con JSON)
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
			'subject'         => 'Nuevo mensaje de contacto: [text-subject]',
			'body'            => self::default_template(),
			'success_message' => '¡Gracias! Tu mensaje se envió correctamente. Te contactaremos muy pronto.',
			'error_message'   => 'Ocurrió un error al enviar tu mensaje. Inténtalo de nuevo o escríbenos por WhatsApp.',
		);
	}

	/** Plantilla del cuerpo por defecto (la que pediste). */
	public static function default_template() {
		return "De: [your-name] [your-last-name] [your-second-last-name] [your-email]\n"
			. "Teléfono: [tel-number]\n\n"
			. "Asunto: [text-subject]\n"
			. "Cuerpo del mensaje:\n"
			. "[your-message]";
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

	/**
	 * Etiquetas legibles para el <select name="asunto">.
	 * Se usan para reemplazar [text-subject] con un texto comprensible.
	 */
	public static function subject_labels() {
		return apply_filters( 'iup_cf_subject_labels', array(
			'informacion' => 'Información general',
			'admisiones'  => 'Admisiones',
			'becas'       => 'Becas',
			'otro'        => 'Otro',
		) );
	}

	/* =====================================================================
	 * ANTI-SPAM
	 * =================================================================== */

	/** Genera un token de tiempo firmado (no manipulable desde el cliente). */
	public static function make_token() {
		$ts = time();
		return $ts . ':' . wp_hash( $ts . '|iup_cf' );
	}

	private function valid_token( $token, &$reason = '' ) {
		if ( ! is_string( $token ) || false === strpos( $token, ':' ) ) {
			$reason = 'token';
			return false;
		}
		list( $ts, $hash ) = explode( ':', $token, 2 );
		$ts = (int) $ts;

		if ( ! hash_equals( wp_hash( $ts . '|iup_cf' ), (string) $hash ) ) {
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
		$key   = 'iup_cf_rl_' . md5( $ip );
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

		// 1) Nonce (protección CSRF).
		$nonce = isset( $_POST[ self::NONCE_FIELD ] ) ? wp_unslash( $_POST[ self::NONCE_FIELD ] ) : '';
		if ( ! wp_verify_nonce( $nonce, self::NONCE_ACTION ) ) {
			return $this->respond( false, 'Tu sesión expiró. Recarga la página e inténtalo de nuevo.', array(), $is_ajax );
		}

		// 2) Honeypot. Si trae texto, casi seguro es un bot -> "éxito" silencioso.
		$honeypot = isset( $_POST[ self::HONEYPOT ] ) ? trim( (string) wp_unslash( $_POST[ self::HONEYPOT ] ) ) : '';
		if ( '' !== $honeypot ) {
			return $this->respond( true, self::get_options()['success_message'], array(), $is_ajax );
		}

		// 3) Token de tiempo.
		$reason = '';
		$token  = isset( $_POST[ self::TS_FIELD ] ) ? (string) wp_unslash( $_POST[ self::TS_FIELD ] ) : '';
		if ( ! $this->valid_token( $token, $reason ) ) {
			if ( 'fast' === $reason ) {
				return $this->respond( false, 'Espera un momento antes de enviar el formulario.', array(), $is_ajax );
			}
			return $this->respond( false, 'No pudimos validar tu envío. Recarga la página e inténtalo de nuevo.', array(), $is_ajax );
		}

		// 4) Límite por IP.
		if ( $this->rate_limited() ) {
			return $this->respond( false, 'Has enviado varios mensajes. Espera unos minutos antes de intentar de nuevo.', array(), $is_ajax );
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

	/** Lee y sanitiza cada campo del formulario. */
	private function collect_fields() {
		$p = wp_unslash( $_POST );
		return array(
			'nombre'   => isset( $p['nombre'] )   ? sanitize_text_field( $p['nombre'] )      : '',
			'paterno'  => isset( $p['paterno'] )  ? sanitize_text_field( $p['paterno'] )     : '',
			'materno'  => isset( $p['materno'] )  ? sanitize_text_field( $p['materno'] )     : '',
			'email'    => isset( $p['email'] )    ? sanitize_email( $p['email'] )            : '',
			'telefono' => isset( $p['telefono'] ) ? sanitize_text_field( $p['telefono'] )    : '',
			'asunto'   => isset( $p['asunto'] )   ? sanitize_text_field( $p['asunto'] )      : '',
			'mensaje'  => isset( $p['mensaje'] )  ? sanitize_textarea_field( $p['mensaje'] ) : '',
		);
	}

	private function validate( $f ) {
		$e = array();

		if ( '' === $f['nombre'] ) {
			$e['nombre'] = 'Ingresa tu nombre.';
		}
		if ( '' === $f['paterno'] ) {
			$e['paterno'] = 'Ingresa tu apellido paterno.';
		}
		if ( '' === $f['materno'] ) {
			$e['materno'] = 'Ingresa tu apellido materno.';
		}
		if ( '' === $f['email'] || ! is_email( $f['email'] ) ) {
			$e['email'] = 'Ingresa un correo electrónico válido.';
		}

		$digits = preg_replace( '/\D/', '', $f['telefono'] );
		if ( strlen( $digits ) < 10 ) {
			$e['telefono'] = 'Ingresa un teléfono válido (al menos 10 dígitos).';
		}

		if ( '' === $f['asunto'] ) {
			$e['asunto'] = 'Selecciona un asunto.';
		}
		if ( '' === $f['mensaje'] ) {
			$e['mensaje'] = 'Escribe tu mensaje.';
		} elseif ( function_exists( 'mb_strlen' ) ? mb_strlen( $f['mensaje'] ) > 5000 : strlen( $f['mensaje'] ) > 5000 ) {
			$e['mensaje'] = 'El mensaje es demasiado largo.';
		}

		return $e;
	}

	/** Construye y envía el correo según la plantilla configurada. */
	private function send_email( $f ) {
		$opts = self::get_options();

		$labels        = self::subject_labels();
		$subject_label = isset( $labels[ $f['asunto'] ] ) ? $labels[ $f['asunto'] ] : $f['asunto'];

		// Reemplazo de marcadores -> valores escritos por el usuario (ya sanitizados).
		$map = array(
			'[your-name]'             => $f['nombre'],
			'[your-last-name]'        => $f['paterno'],
			'[your-second-last-name]' => $f['materno'],
			'[your-email]'            => $f['email'],
			'[tel-number]'            => $f['telefono'],
			'[text-subject]'          => $subject_label,
			'[your-message]'          => $f['mensaje'],
		);

		$body    = strtr( $opts['body'], $map );
		// sanitize_text_field elimina saltos de línea -> evita inyección de cabeceras en el asunto.
		$subject = sanitize_text_field( strtr( $opts['subject'], $map ) );

		// Destinatarios (uno o varios separados por coma).
		$recipients = array_filter( array_map( 'trim', explode( ',', $opts['recipient'] ) ), 'is_email' );
		if ( empty( $recipients ) ) {
			$recipients = array( get_option( 'admin_email' ) );
		}

		// Remitente.
		$from_name  = '' !== $opts['from_name'] ? $opts['from_name'] : get_bloginfo( 'name' );
		$from_email = is_email( $opts['from_email'] ) ? $opts['from_email'] : ( 'no-reply@' . self::site_domain() );

		$reply_name = trim( $f['nombre'] . ' ' . $f['paterno'] . ' ' . $f['materno'] );

		$headers   = array();
		$headers[] = sprintf( 'From: %s <%s>', $this->encode_name( $from_name ), $from_email );
		$headers[] = sprintf( 'Reply-To: %s <%s>', $this->encode_name( $reply_name ), $f['email'] );
		$headers[] = 'Content-Type: text/plain; charset=UTF-8';

		return wp_mail( $recipients, $subject, $body, $headers );
	}

	/** Limpia el nombre para usarlo dentro de una cabecera de correo. */
	private function encode_name( $name ) {
		return trim( preg_replace( '/[\r\n,<>"]+/', ' ', (string) $name ) );
	}

	/**
	 * Devuelve la respuesta:
	 *  - AJAX  -> JSON
	 *  - Sin JS -> redirección (PRG) de vuelta a la página de contacto.
	 */
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
		$back = remove_query_arg( array( 'iup_contact' ), $back );
		$back = add_query_arg( 'iup_contact', $success ? 'ok' : 'error', $back );

		wp_safe_redirect( $back . '#Formulario' );
		exit;
	}

	/* =====================================================================
	 * ASSETS DEL FRONT
	 * =================================================================== */

	public function enqueue_assets() {
		if ( ! $this->is_contact_template() ) {
			return;
		}

		$handle = 'iup-contact-form';
		$src    = get_theme_file_uri( '/inc/contacto/iup-contact-form.js' );
		$path   = get_theme_file_path( '/inc/contacto/iup-contact-form.js' );
		$ver    = file_exists( $path ) ? filemtime( $path ) : '1.0.0';

		wp_register_script( $handle, $src, array(), $ver, true );
		wp_localize_script( $handle, 'IUP_CF', array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'action'  => self::ACTION,
		) );
		wp_enqueue_script( $handle );
	}

	/** Detecta si la página actual usa la plantilla page-contacto.php. */
	private function is_contact_template() {
		if ( ! is_page() ) {
			return false;
		}
		$template = function_exists( 'get_page_template' ) ? get_page_template() : '';
		if ( 'page-contacto.php' === basename( (string) $template ) ) {
			return true;
		}
		// Respaldo por slug.
		return is_page( 'contacto' );
	}

	/* =====================================================================
	 * PANEL DE ADMINISTRACIÓN
	 * =================================================================== */

	public function register_settings_page() {
		add_options_page(
			'Formulario de Contacto',
			'Formulario de Contacto',
			'manage_options',
			'iup-contact-form',
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

		// El cuerpo conserva saltos de línea (texto plano con marcadores).
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
			<h1>Formulario de Contacto</h1>
			<p>Configura el remitente, el destinatario y la plantilla del correo que se envía desde la página de contacto.</p>

			<form method="post" action="options.php">
				<?php settings_fields( self::SETTINGS_GRP ); ?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="iup_cf_recipient">Destinatario(s)</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recipient]" id="iup_cf_recipient" type="text" class="regular-text" value="<?php echo esc_attr( $o['recipient'] ); ?>" />
							<p class="description">Correo que recibirá los mensajes. Para varios, sepáralos con comas.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_from_name">Nombre del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_name]" id="iup_cf_from_name" type="text" class="regular-text" value="<?php echo esc_attr( $o['from_name'] ); ?>" />
							<p class="description">Nombre que aparece como remitente (From) del correo.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_from_email">Correo del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_email]" id="iup_cf_from_email" type="email" class="regular-text" value="<?php echo esc_attr( $o['from_email'] ); ?>" />
							<p class="description">Recomendado: usa un correo de tu propio dominio (por ej. <code>no-reply@<?php echo esc_html( self::site_domain() ); ?></code>) para mejor entrega. El <em>Reply-To</em> se ajusta automáticamente al correo de quien escribe.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_subject">Asunto del correo</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[subject]" id="iup_cf_subject" type="text" class="large-text" value="<?php echo esc_attr( $o['subject'] ); ?>" />
							<p class="description">Puedes usar marcadores, por ejemplo: <code>[text-subject]</code>.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_body">Plantilla del correo</label></th>
						<td>
							<textarea name="<?php echo esc_attr( self::OPTION_KEY ); ?>[body]" id="iup_cf_body" rows="10" class="large-text code"><?php echo esc_textarea( $o['body'] ); ?></textarea>
							<p class="description">Texto del cuerpo. Los marcadores se reemplazan con lo que escriba el usuario.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_success">Mensaje de éxito</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[success_message]" id="iup_cf_success" type="text" class="large-text" value="<?php echo esc_attr( $o['success_message'] ); ?>" />
							<p class="description">Se muestra al usuario cuando el mensaje se envía correctamente.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_cf_error">Mensaje de error</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[error_message]" id="iup_cf_error" type="text" class="large-text" value="<?php echo esc_attr( $o['error_message'] ); ?>" />
							<p class="description">Se muestra al usuario si ocurre un problema al enviar.</p>
						</td>
					</tr>
				</table>

				<h2>Marcadores disponibles</h2>
				<table class="widefat striped" style="max-width:720px">
					<thead>
						<tr><th>Marcador</th><th>Campo del formulario</th></tr>
					</thead>
					<tbody>
						<tr><td><code>[your-name]</code></td><td>Nombre(s)</td></tr>
						<tr><td><code>[your-last-name]</code></td><td>Apellido paterno</td></tr>
						<tr><td><code>[your-second-last-name]</code></td><td>Apellido materno</td></tr>
						<tr><td><code>[your-email]</code></td><td>Correo electrónico</td></tr>
						<tr><td><code>[tel-number]</code></td><td>Teléfono</td></tr>
						<tr><td><code>[text-subject]</code></td><td>Asunto (texto legible)</td></tr>
						<tr><td><code>[your-message]</code></td><td>Mensaje</td></tr>
					</tbody>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

endif;

IUP_Contact_Form::instance();