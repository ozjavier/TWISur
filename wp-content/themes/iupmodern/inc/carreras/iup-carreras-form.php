<?php
/**
 * Módulo: Formulario "Agenda una cita" (single-carreras) IUP Sur
 * ------------------------------------------------------------------
 * - Procesa el envío del formulario que aparece en single-carreras.php
 * - Incluye el nombre de la carrera (campo oculto tomado del <h1> de la página)
 * - Anti-spam: honeypot + token de tiempo firmado + nonce + límite por IP
 * - Sanitiza todos los campos para evitar inyección de código / cabeceras
 * - Página de configuración propia en wp-admin (remitente, destinatario, plantilla)
 *
 * Módulo INDEPENDIENTE: tiene su propio destinatario y su propia plantilla.
 *
 * Cárgalo desde el functions.php de tu tema activo:
 *
 *   require_once get_theme_file_path( '/inc/carreras/iup-carreras-form.php' );
 *
 * @package IUPSUR
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Evita acceso directo.
}

if ( ! class_exists( 'IUP_Carreras_Form' ) ) :

class IUP_Carreras_Form {

	/* Identificadores internos */
	const OPTION_KEY   = 'iup_carreras_form_options';
	const SETTINGS_GRP = 'iup_carreras_form_group';
	const NONCE_ACTION = 'iup_carreras_form_nonce';
	const NONCE_FIELD  = 'iup_kf_nonce';
	const ACTION       = 'iup_carreras_submit';
	const HONEYPOT     = 'iup_kf_website';
	const TS_FIELD     = 'iup_kf_token';

	/* Reglas anti-spam */
	const MIN_SECONDS  = 3;
	const MAX_SECONDS  = 3600;
	const RATE_MAX     = 5;
	const RATE_WINDOW  = 600;

	/** @var IUP_Carreras_Form|null */
	private static $instance = null;

	/** @var string Plantilla resuelta para la petición actual. */
	private static $current_template = '';

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

		// Captura la plantilla que se usará para detectar single-carreras.php.
		add_filter( 'template_include', array( $this, 'capture_template' ), 99 );

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
	}

	public function capture_template( $template ) {
		self::$current_template = (string) $template;
		return $template;
	}

	/* =====================================================================
	 * OPCIONES / VALORES POR DEFECTO
	 * =================================================================== */

	public static function default_options() {
		return array(
			'recipient'       => get_option( 'admin_email' ),
			'from_name'       => get_bloginfo( 'name' ),
			'from_email'      => 'no-reply@' . self::site_domain(),
			'subject'         => 'Nueva solicitud de cita ([carrera]) — IUP Sur',
			'body'            => self::default_template(),
			'success_message' => '¡Listo! Recibimos tus datos. Un asesor académico te contactará muy pronto.',
			'error_message'   => 'Ocurrió un error al enviar tus datos. Inténtalo de nuevo o escríbenos por WhatsApp.',
		);
	}

	/** Plantilla por defecto del correo de cita. */
	public static function default_template() {
		return "Nueva solicitud de cita\n\n"
			. "Carrera de interés: [carrera]\n\n"
			. "Nombre: [first-name] [last-name]\n"
			. "Correo: [email]\n"
			. "Teléfono / WhatsApp: [tel-number]";
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

	/* =====================================================================
	 * ANTI-SPAM
	 * =================================================================== */

	public static function make_token() {
		$ts = time();
		return $ts . ':' . wp_hash( $ts . '|iup_kf' );
	}

	private function valid_token( $token, &$reason = '' ) {
		if ( ! is_string( $token ) || false === strpos( $token, ':' ) ) {
			$reason = 'token';
			return false;
		}
		list( $ts, $hash ) = explode( ':', $token, 2 );
		$ts = (int) $ts;

		if ( ! hash_equals( wp_hash( $ts . '|iup_kf' ), (string) $hash ) ) {
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
		$key   = 'iup_kf_rl_' . md5( $ip );
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
				return $this->respond( false, 'Espera un momento antes de enviar el formulario.', array(), $is_ajax );
			}
			return $this->respond( false, 'No pudimos validar tu envío. Recarga la página e inténtalo de nuevo.', array(), $is_ajax );
		}

		// 4) Límite por IP.
		if ( $this->rate_limited() ) {
			return $this->respond( false, 'Has enviado varias solicitudes. Espera unos minutos antes de intentar de nuevo.', array(), $is_ajax );
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

	private function collect_fields() {
		$p = wp_unslash( $_POST );
		return array(
			'nombre'    => isset( $p['nombre'] )    ? sanitize_text_field( $p['nombre'] )    : '',
			'apellidos' => isset( $p['apellidos'] ) ? sanitize_text_field( $p['apellidos'] ) : '',
			'correo'    => isset( $p['correo'] )    ? sanitize_email( $p['correo'] )         : '',
			'telefono'  => isset( $p['telefono'] )  ? sanitize_text_field( $p['telefono'] )  : '',
			// Carrera: viene del campo oculto (tomado del <h1>). Solo informativo.
			'carrera'   => isset( $p['carrera'] )   ? sanitize_text_field( $p['carrera'] )   : '',
		);
	}

	private function validate( $f ) {
		$e = array();

		if ( '' === $f['nombre'] ) {
			$e['nombre'] = 'Ingresa tu nombre.';
		}
		if ( '' === $f['apellidos'] ) {
			$e['apellidos'] = 'Ingresa tus apellidos.';
		}
		if ( '' === $f['correo'] || ! is_email( $f['correo'] ) ) {
			$e['correo'] = 'Ingresa un correo electrónico válido.';
		}

		$digits = preg_replace( '/\D/', '', $f['telefono'] );
		if ( strlen( $digits ) < 10 ) {
			$e['telefono'] = 'Ingresa un teléfono válido (al menos 10 dígitos).';
		}

		return $e;
	}

	private function send_email( $f ) {
		$opts = self::get_options();

		$carrera = '' !== $f['carrera'] ? $f['carrera'] : 'No especificada';

		$map = array(
			'[first-name]' => $f['nombre'],
			'[last-name]'  => $f['apellidos'],
			'[email]'      => $f['correo'],
			'[tel-number]' => $f['telefono'],
			'[carrera]'    => $carrera,
		);

		$body    = strtr( $opts['body'], $map );
		$subject = sanitize_text_field( strtr( $opts['subject'], $map ) );

		$recipients = array_filter( array_map( 'trim', explode( ',', $opts['recipient'] ) ), 'is_email' );
		if ( empty( $recipients ) ) {
			$recipients = array( get_option( 'admin_email' ) );
		}

		$from_name  = '' !== $opts['from_name'] ? $opts['from_name'] : get_bloginfo( 'name' );
		$from_email = is_email( $opts['from_email'] ) ? $opts['from_email'] : ( 'no-reply@' . self::site_domain() );

		$reply_name = trim( $f['nombre'] . ' ' . $f['apellidos'] );

		$headers   = array();
		$headers[] = sprintf( 'From: %s <%s>', $this->encode_name( $from_name ), $from_email );
		$headers[] = sprintf( 'Reply-To: %s <%s>', $this->encode_name( $reply_name ), $f['correo'] );
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
		$back = remove_query_arg( array( 'iup_cita' ), $back );
		$back = add_query_arg( 'iup_cita', $success ? 'ok' : 'error', $back );

		wp_safe_redirect( $back . '#contacto' );
		exit;
	}

	/* =====================================================================
	 * ASSETS DEL FRONT
	 * =================================================================== */

	public function enqueue_assets() {
		if ( ! $this->is_carreras_template() ) {
			return;
		}

		$handle = 'iup-carreras-form';
		$src    = get_theme_file_uri( '/inc/carreras/iup-carreras-form.js' );
		$path   = get_theme_file_path( '/inc/carreras/iup-carreras-form.js' );
		$ver    = file_exists( $path ) ? filemtime( $path ) : '1.0.0';

		wp_register_script( $handle, $src, array(), $ver, true );
		wp_localize_script( $handle, 'IUP_KF', array(
			'ajaxUrl' => admin_url( 'admin-ajax.php' ),
			'action'  => self::ACTION,
		) );
		wp_enqueue_script( $handle );
	}

	private function is_carreras_template() {
		if ( 'single-carreras.php' === basename( self::$current_template ) ) {
			return true;
		}
		// Respaldo por tipo de contenido.
		return is_singular( 'carreras' );
	}

	/* =====================================================================
	 * PANEL DE ADMINISTRACIÓN
	 * =================================================================== */

	public function register_settings_page() {
		add_options_page(
			'Formulario de Carreras (Cita)',
			'Carreras — Agenda cita',
			'manage_options',
			'iup-carreras-form',
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
			<h1>Formulario de Carreras — Agenda una cita</h1>
			<p>Configura el remitente, el destinatario y la plantilla del correo que se envía desde el formulario de cada carrera. Es independiente de los demás formularios.</p>

			<form method="post" action="options.php">
				<?php settings_fields( self::SETTINGS_GRP ); ?>

				<table class="form-table" role="presentation">
					<tr>
						<th scope="row"><label for="iup_kf_recipient">Destinatario(s)</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[recipient]" id="iup_kf_recipient" type="text" class="regular-text" value="<?php echo esc_attr( $o['recipient'] ); ?>" />
							<p class="description">Correo que recibirá las solicitudes de cita. Para varios, sepáralos con comas.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_from_name">Nombre del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_name]" id="iup_kf_from_name" type="text" class="regular-text" value="<?php echo esc_attr( $o['from_name'] ); ?>" />
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_from_email">Correo del remitente</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[from_email]" id="iup_kf_from_email" type="email" class="regular-text" value="<?php echo esc_attr( $o['from_email'] ); ?>" />
							<p class="description">Usa un correo de tu dominio (por ej. <code>no-reply@<?php echo esc_html( self::site_domain() ); ?></code>). El <em>Reply-To</em> se ajusta al correo de quien escribe.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_subject">Asunto del correo</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[subject]" id="iup_kf_subject" type="text" class="large-text" value="<?php echo esc_attr( $o['subject'] ); ?>" />
							<p class="description">Puedes usar marcadores, por ejemplo: <code>[carrera]</code>.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_body">Plantilla del correo</label></th>
						<td>
							<textarea name="<?php echo esc_attr( self::OPTION_KEY ); ?>[body]" id="iup_kf_body" rows="10" class="large-text code"><?php echo esc_textarea( $o['body'] ); ?></textarea>
							<p class="description">Los marcadores se reemplazan con los datos del usuario y la carrera de origen.</p>
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_success">Mensaje de éxito</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[success_message]" id="iup_kf_success" type="text" class="large-text" value="<?php echo esc_attr( $o['success_message'] ); ?>" />
						</td>
					</tr>

					<tr>
						<th scope="row"><label for="iup_kf_error">Mensaje de error</label></th>
						<td>
							<input name="<?php echo esc_attr( self::OPTION_KEY ); ?>[error_message]" id="iup_kf_error" type="text" class="large-text" value="<?php echo esc_attr( $o['error_message'] ); ?>" />
						</td>
					</tr>
				</table>

				<h2>Marcadores disponibles</h2>
				<table class="widefat striped" style="max-width:720px">
					<thead>
						<tr><th>Marcador</th><th>Campo del formulario</th></tr>
					</thead>
					<tbody>
						<tr><td><code>[first-name]</code></td><td>Nombre completo</td></tr>
						<tr><td><code>[last-name]</code></td><td>Apellidos</td></tr>
						<tr><td><code>[email]</code></td><td>Correo electrónico</td></tr>
						<tr><td><code>[tel-number]</code></td><td>Teléfono / WhatsApp</td></tr>
						<tr><td><code>[carrera]</code></td><td>Nombre de la carrera (del &lt;h1&gt;)</td></tr>
					</tbody>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}
}

endif;

IUP_Carreras_Form::instance();