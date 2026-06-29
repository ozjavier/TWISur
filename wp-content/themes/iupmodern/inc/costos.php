<?php
/**
 * Administración de Costos (página "Costos IUP")
 *
 * Permite crear, editar, reordenar y eliminar las colegiaturas y conceptos
 * que se muestran en la plantilla page-costos-iup.php, todo desde wp-admin.
 *
 * Convención del tema: prefijo iupmodern_ · text domain iupmodern.
 *
 * Se incluye desde functions.php:
 *   require get_template_directory() . '/inc/costos.php';
 *
 * @package IUP_Modern
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'IUPMODERN_COSTOS_OPTION', 'iupmodern_costos_data' );

/* =====================================================================
 * 1. DATOS POR DEFECTO (semilla)
 *    Replica el contenido original de la plantilla.
 * ===================================================================== */
function iupmodern_costos_defaults() {
	return array(
		'meta' => array(
			'actualizacion' => 'Enero – Abril 2026',
		),

		// Colegiatura mensual: Grupos → Programas → Filas (etiqueta + precio).
		'colegiaturas' => array(
			array(
				'grupo'     => 'Ciencias Sociales, Jurídicas y Administrativas',
				'programas' => array(
					array(
						'nombre' => 'Lic. en Derecho',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1250.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1250.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1365.00' ),
						),
					),
					array(
						'nombre' => 'Lic. en Criminología',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1400.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1520.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1665.00' ),
						),
					),
					array(
						'nombre' => 'Lic. en Psicología',
						'filas'  => array(
							array( 'label' => '5º Cuatrimestre', 'precio' => '1635.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1775.00' ),
						),
					),
					array(
						'nombre' => 'Lic. en Administración y Contaduría',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1250.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1362.00' ),
						),
					),
					array(
						'nombre' => 'Lic. en Ciencias Periciales',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1250.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1255.00' ),
						),
					),
				),
			),
			array(
				'grupo'     => 'Educación',
				'programas' => array(
					array(
						'nombre' => 'Lic. en Educación Inicial',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1350.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1470.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1600.00' ),
						),
					),
				),
			),
			array(
				'grupo'     => 'Creatividad, Comunicación y Servicios',
				'programas' => array(
					array(
						'nombre' => 'Lic. en Diseño Gráfico',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1250.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1362.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1370.00' ),
						),
					),
					array(
						'nombre' => 'Lic. en Gastronomía',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1350.00' ),
							array( 'label' => '5º Cuatrimestre', 'precio' => '1470.00' ),
							array( 'label' => '8º Cuatrimestre', 'precio' => '1600.00' ),
						),
					),
				),
			),
			array(
				'grupo'     => 'Tecnología y Datos',
				'programas' => array(
					array(
						'nombre' => 'Lic. en Software y Big Data',
						'filas'  => array(
							array( 'label' => '2º Cuatrimestre', 'precio' => '1250.00' ),
						),
					),
				),
			),
		),

		// Incorporación SEP (cuota anual + recargo).
		'incorporacion_sep' => array(
			'cuota'   => '1200.00',
			'recargo' => '120.00',
		),

		// Nota de fechas límite de pago.
		'recargos' => array(
			'dia_limite' => '7',
			'recargo_1'  => '100.00',
			'recargo_2'  => '170.00',
		),

		// Otros conceptos administrativos (lista simple).
		'conceptos_admin' => array(
			array( 'label' => 'Examen Ordinario de 2da Vuelta', 'precio' => '250.00' ),
			array( 'label' => 'Examen Extraordinario', 'precio' => '500.00' ),
			array( 'label' => 'Reposición de Credencial', 'precio' => '200.00' ),
			array( 'label' => 'Constancia Simple', 'precio' => '200.00' ),
			array( 'label' => 'Constancia con Historial Académico', 'precio' => '250.00' ),
			array( 'label' => 'Baja y devolución de documentos', 'precio' => '350.00' ),
		),

		// Tabulador de egreso y titulación.
		'titulacion_lic' => array(
			array( 'label' => 'Paquete de Titulación', 'precio' => '17500.00' ),
			array( 'label' => 'Liberación de no adeudos y biblioteca', 'precio' => '1200.00' ),
			array( 'label' => 'Certificado Parcial', 'precio' => '1500.00' ),
			array( 'label' => 'Curso Seminario de Tesis', 'precio' => '4000.00' ),
			array( 'label' => 'Revisión de Proyectos', 'precio' => '2500.00' ),
			array( 'label' => 'Examen Profesional (Proyecto o Tesis)', 'precio' => '4000.00' ),
			array( 'label' => 'Examen General de Conocimientos', 'precio' => '5000.00' ),
		),
		'titulacion_mtria' => array(
			array( 'label' => 'Paquete de Titulación', 'precio' => '18000.00' ),
			array( 'label' => 'Liberación de no adeudos y biblioteca', 'precio' => '1200.00' ),
			array( 'label' => 'Certificado Parcial', 'precio' => '1500.00' ),
			array( 'label' => 'Curso Seminario de Tesis', 'precio' => '4000.00' ),
			array( 'label' => 'Examen Profesional en Defensa de Tesis', 'precio' => '4000.00' ),
		),
	);
}

/* =====================================================================
 * 2. LECTURA DE DATOS (la usa la plantilla del front-end)
 * ===================================================================== */
function iupmodern_costos_get_data() {
	$data = get_option( IUPMODERN_COSTOS_OPTION );
	if ( ! is_array( $data ) || empty( $data ) ) {
		return iupmodern_costos_defaults();
	}
	return wp_parse_args( $data, iupmodern_costos_defaults() );
}

/* =====================================================================
 * 3. FORMATO DE PRECIO  ->  1250  =>  $1,250.00
 * ===================================================================== */
function iupmodern_costos_precio( $num ) {
	$n = (float) str_replace( array( ',', '$', ' ' ), '', (string) $num );
	return '$' . number_format( $n, 2, '.', ',' );
}

/* =====================================================================
 * 4. SEMBRADO: al activar el tema, guarda los valores por defecto
 *    (si la opción aún no existe). El getter ya hace respaldo, así que
 *    esto sólo persiste la semilla para que el panel arranque listo.
 * ===================================================================== */
add_action( 'after_switch_theme', 'iupmodern_costos_seed' );
function iupmodern_costos_seed() {
	if ( false === get_option( IUPMODERN_COSTOS_OPTION ) ) {
		add_option( IUPMODERN_COSTOS_OPTION, iupmodern_costos_defaults() );
	}
}

/* =====================================================================
 * 5. MENÚ DE ADMINISTRACIÓN
 * ===================================================================== */
add_action( 'admin_menu', 'iupmodern_costos_admin_menu' );
function iupmodern_costos_admin_menu() {
	add_menu_page(
		__( 'Costos IUP', 'iupmodern' ),
		__( 'Costos IUP', 'iupmodern' ),
		'manage_options',
		'iupmodern-costos',
		'iupmodern_costos_render_page',
		'dashicons-money-alt',
		58
	);
}

/* =====================================================================
 * 6. SANITIZACIÓN
 * ===================================================================== */
function iupmodern_costos_sanitize_precio( $valor ) {
	$valor = str_replace( array( ',', '$', ' ' ), '', (string) $valor );
	$valor = preg_replace( '/[^0-9.]/', '', $valor );
	if ( '' === $valor ) {
		return '0.00';
	}
	return number_format( (float) $valor, 2, '.', '' );
}

function iupmodern_costos_sanitize_lista( $lista ) {
	$salida = array();
	if ( ! is_array( $lista ) ) {
		return $salida;
	}
	foreach ( $lista as $item ) {
		$label  = isset( $item['label'] ) ? sanitize_text_field( $item['label'] ) : '';
		$precio = isset( $item['precio'] ) ? iupmodern_costos_sanitize_precio( $item['precio'] ) : '0.00';
		if ( '' === $label && '0.00' === $precio ) {
			continue; // Fila vacía: se descarta.
		}
		$salida[] = array( 'label' => $label, 'precio' => $precio );
	}
	return $salida;
}

function iupmodern_costos_sanitize_colegiaturas( $grupos ) {
	$salida = array();
	if ( ! is_array( $grupos ) ) {
		return $salida;
	}
	foreach ( $grupos as $grupo ) {
		$nombre_grupo = isset( $grupo['grupo'] ) ? sanitize_text_field( $grupo['grupo'] ) : '';
		$programas    = array();

		if ( isset( $grupo['programas'] ) && is_array( $grupo['programas'] ) ) {
			foreach ( $grupo['programas'] as $programa ) {
				$nombre_prog = isset( $programa['nombre'] ) ? sanitize_text_field( $programa['nombre'] ) : '';
				$filas       = isset( $programa['filas'] ) ? iupmodern_costos_sanitize_lista( $programa['filas'] ) : array();

				if ( '' === $nombre_prog && empty( $filas ) ) {
					continue;
				}
				$programas[] = array( 'nombre' => $nombre_prog, 'filas' => array_values( $filas ) );
			}
		}

		if ( '' === $nombre_grupo && empty( $programas ) ) {
			continue;
		}
		$salida[] = array( 'grupo' => $nombre_grupo, 'programas' => array_values( $programas ) );
	}
	return array_values( $salida );
}

/* =====================================================================
 * 7. GUARDADO (procesa el POST del formulario)
 * ===================================================================== */
function iupmodern_costos_maybe_save() {
	if ( ! isset( $_POST['iupmodern_costos_nonce'] ) ) {
		return null;
	}
	if ( ! current_user_can( 'manage_options' ) ) {
		return null;
	}
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['iupmodern_costos_nonce'] ) ), 'iupmodern_costos_save' ) ) {
		return new WP_Error( 'nonce', __( 'La verificación de seguridad falló. Vuelve a intentarlo.', 'iupmodern' ) );
	}

	$raw  = wp_unslash( $_POST ); // Se sanitiza campo por campo más abajo.
	$data = array();

	$data['meta'] = array(
		'actualizacion' => isset( $raw['meta']['actualizacion'] ) ? sanitize_text_field( $raw['meta']['actualizacion'] ) : '',
	);

	$data['colegiaturas'] = isset( $raw['colegiaturas'] ) ? iupmodern_costos_sanitize_colegiaturas( $raw['colegiaturas'] ) : array();

	$data['incorporacion_sep'] = array(
		'cuota'   => isset( $raw['incorporacion_sep']['cuota'] ) ? iupmodern_costos_sanitize_precio( $raw['incorporacion_sep']['cuota'] ) : '0.00',
		'recargo' => isset( $raw['incorporacion_sep']['recargo'] ) ? iupmodern_costos_sanitize_precio( $raw['incorporacion_sep']['recargo'] ) : '0.00',
	);

	$data['recargos'] = array(
		'dia_limite' => isset( $raw['recargos']['dia_limite'] ) ? preg_replace( '/[^0-9]/', '', $raw['recargos']['dia_limite'] ) : '7',
		'recargo_1'  => isset( $raw['recargos']['recargo_1'] ) ? iupmodern_costos_sanitize_precio( $raw['recargos']['recargo_1'] ) : '0.00',
		'recargo_2'  => isset( $raw['recargos']['recargo_2'] ) ? iupmodern_costos_sanitize_precio( $raw['recargos']['recargo_2'] ) : '0.00',
	);

	$data['conceptos_admin']  = isset( $raw['conceptos_admin'] ) ? array_values( iupmodern_costos_sanitize_lista( $raw['conceptos_admin'] ) ) : array();
	$data['titulacion_lic']   = isset( $raw['titulacion_lic'] ) ? array_values( iupmodern_costos_sanitize_lista( $raw['titulacion_lic'] ) ) : array();
	$data['titulacion_mtria'] = isset( $raw['titulacion_mtria'] ) ? array_values( iupmodern_costos_sanitize_lista( $raw['titulacion_mtria'] ) ) : array();

	update_option( IUPMODERN_COSTOS_OPTION, $data );

	return true;
}

/* =====================================================================
 * 8. UTILIDAD DE RENDER (fila etiqueta/precio)
 * ===================================================================== */
function iupmodern_costos_field_fila( $label = '', $precio = '' ) {
	?>
	<div class="iup-fila" data-repeat-item>
		<span class="iup-drag" title="<?php esc_attr_e( 'Arrastra para reordenar', 'iupmodern' ); ?>">⠿</span>
		<input type="text" class="iup-input-label" data-field="label"
			value="<?php echo esc_attr( $label ); ?>" placeholder="<?php esc_attr_e( 'Concepto / etiqueta', 'iupmodern' ); ?>">
		<div class="iup-precio-wrap">
			<span class="iup-precio-sign">$</span>
			<input type="number" step="0.01" min="0" class="iup-input-precio" data-field="precio"
				value="<?php echo esc_attr( $precio ); ?>" placeholder="0.00">
		</div>
		<button type="button" class="button iup-btn-del" data-remove title="<?php esc_attr_e( 'Eliminar', 'iupmodern' ); ?>">✕</button>
	</div>
	<?php
}

/* =====================================================================
 * 9. PÁGINA DE ADMINISTRACIÓN
 * ===================================================================== */
function iupmodern_costos_render_page() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$resultado = iupmodern_costos_maybe_save();
	$data      = iupmodern_costos_get_data();
	?>
	<div class="wrap iup-costos-wrap">
		<h1 class="iup-title"><span class="dashicons dashicons-money-alt"></span> Costos IUP</h1>
		<p class="iup-sub">Administra las colegiaturas y conceptos que se muestran en la página pública de costos. Arrastra (⠿) para reordenar, usa los botones <strong>+</strong> para agregar y <strong>✕</strong> para eliminar. No olvides <strong>Guardar cambios</strong>.</p>

		<?php if ( true === $resultado ) : ?>
			<div class="notice notice-success is-dismissible"><p>✅ Cambios guardados correctamente.</p></div>
		<?php elseif ( is_wp_error( $resultado ) ) : ?>
			<div class="notice notice-error is-dismissible"><p>⚠️ <?php echo esc_html( $resultado->get_error_message() ); ?></p></div>
		<?php endif; ?>

		<form method="post" id="iup-costos-form">
			<?php wp_nonce_field( 'iupmodern_costos_save', 'iupmodern_costos_nonce' ); ?>

			<div class="iup-savebar">
				<button type="submit" class="button button-primary button-hero">💾 Guardar cambios</button>
			</div>

			<!-- ============ GENERAL ============ -->
			<div class="iup-card">
				<h2>General</h2>
				<label class="iup-row">
					<span class="iup-label">Texto de "Última actualización" (Hero)</span>
					<input type="text" name="meta[actualizacion]" class="regular-text"
						value="<?php echo esc_attr( $data['meta']['actualizacion'] ); ?>"
						placeholder="Ej. Enero – Abril 2026">
				</label>
			</div>

			<!-- ============ COLEGIATURAS ============ -->
			<div class="iup-card">
				<div class="iup-card-head">
					<h2>Colegiatura mensual · Grupos y programas</h2>
					<button type="button" class="button button-secondary" id="iup-add-grupo">+ Agregar grupo</button>
				</div>

				<div id="iup-grupos" data-repeat-zone="grupos">
					<?php foreach ( $data['colegiaturas'] as $grupo ) : ?>
						<div class="iup-grupo" data-repeat-item>
							<div class="iup-grupo-head">
								<span class="iup-drag" title="Arrastra para reordenar el grupo">⠿</span>
								<input type="text" class="iup-input-grupo" data-field="grupo"
									value="<?php echo esc_attr( $grupo['grupo'] ); ?>"
									placeholder="Nombre del grupo (ej. Educación)">
								<button type="button" class="button iup-btn-del" data-remove title="Eliminar grupo">Eliminar grupo</button>
							</div>

							<div class="iup-programas" data-repeat-zone="programas">
								<?php foreach ( $grupo['programas'] as $programa ) : ?>
									<div class="iup-programa" data-repeat-item>
										<div class="iup-programa-head">
											<span class="iup-drag" title="Arrastra para reordenar el programa">⠿</span>
											<input type="text" class="iup-input-programa" data-field="nombre"
												value="<?php echo esc_attr( $programa['nombre'] ); ?>"
												placeholder="Nombre del programa (ej. Lic. en Derecho)">
											<button type="button" class="button iup-btn-del" data-remove title="Eliminar programa">✕ programa</button>
										</div>
										<div class="iup-filas" data-repeat-zone="filas">
											<?php
											foreach ( $programa['filas'] as $fila ) {
												iupmodern_costos_field_fila( $fila['label'], $fila['precio'] );
											}
											?>
										</div>
										<button type="button" class="button button-small iup-add-fila">+ Agregar cuatrimestre / fila</button>
									</div>
								<?php endforeach; ?>
							</div>
							<button type="button" class="button button-small iup-add-programa">+ Agregar programa</button>
						</div>
					<?php endforeach; ?>
				</div>
			</div>

			<!-- ============ INCORPORACIÓN SEP + RECARGOS ============ -->
			<div class="iup-grid-2">
				<div class="iup-card">
					<h2>Incorporación SEP (anual)</h2>
					<label class="iup-row">
						<span class="iup-label">Cuota anual</span>
						<div class="iup-precio-wrap">
							<span class="iup-precio-sign">$</span>
							<input type="number" step="0.01" min="0" name="incorporacion_sep[cuota]"
								value="<?php echo esc_attr( $data['incorporacion_sep']['cuota'] ); ?>">
						</div>
					</label>
					<label class="iup-row">
						<span class="iup-label">Recargo</span>
						<div class="iup-precio-wrap">
							<span class="iup-precio-sign">$</span>
							<input type="number" step="0.01" min="0" name="incorporacion_sep[recargo]"
								value="<?php echo esc_attr( $data['incorporacion_sep']['recargo'] ); ?>">
						</div>
					</label>
				</div>

				<div class="iup-card">
					<h2>Fechas límite de pago (nota)</h2>
					<label class="iup-row">
						<span class="iup-label">Día límite sin recargo</span>
						<input type="number" min="1" max="31" name="recargos[dia_limite]" class="small-text"
							value="<?php echo esc_attr( $data['recargos']['dia_limite'] ); ?>">
					</label>
					<label class="iup-row">
						<span class="iup-label">Recargo del día 8 al 14</span>
						<div class="iup-precio-wrap">
							<span class="iup-precio-sign">$</span>
							<input type="number" step="0.01" min="0" name="recargos[recargo_1]"
								value="<?php echo esc_attr( $data['recargos']['recargo_1'] ); ?>">
						</div>
					</label>
					<label class="iup-row">
						<span class="iup-label">Recargo del día 15 en adelante</span>
						<div class="iup-precio-wrap">
							<span class="iup-precio-sign">$</span>
							<input type="number" step="0.01" min="0" name="recargos[recargo_2]"
								value="<?php echo esc_attr( $data['recargos']['recargo_2'] ); ?>">
						</div>
					</label>
				</div>
			</div>

			<!-- ============ OTROS CONCEPTOS ADMINISTRATIVOS ============ -->
			<div class="iup-card">
				<div class="iup-card-head">
					<h2>Otros conceptos administrativos</h2>
					<button type="button" class="button button-secondary iup-add-simple" data-zone="conceptos_admin">+ Agregar concepto</button>
				</div>
				<div class="iup-lista" data-repeat-zone="conceptos_admin">
					<?php
					foreach ( $data['conceptos_admin'] as $item ) {
						iupmodern_costos_field_fila( $item['label'], $item['precio'] );
					}
					?>
				</div>
			</div>

			<!-- ============ TABULADOR EGRESO Y TITULACIÓN ============ -->
			<div class="iup-grid-2">
				<div class="iup-card">
					<div class="iup-card-head">
						<h2>Titulación · Nivel Licenciatura</h2>
						<button type="button" class="button button-secondary iup-add-simple" data-zone="titulacion_lic">+ Concepto</button>
					</div>
					<div class="iup-lista" data-repeat-zone="titulacion_lic">
						<?php
						foreach ( $data['titulacion_lic'] as $item ) {
							iupmodern_costos_field_fila( $item['label'], $item['precio'] );
						}
						?>
					</div>
				</div>

				<div class="iup-card">
					<div class="iup-card-head">
						<h2>Titulación · Nivel Maestría</h2>
						<button type="button" class="button button-secondary iup-add-simple" data-zone="titulacion_mtria">+ Concepto</button>
					</div>
					<div class="iup-lista" data-repeat-zone="titulacion_mtria">
						<?php
						foreach ( $data['titulacion_mtria'] as $item ) {
							iupmodern_costos_field_fila( $item['label'], $item['precio'] );
						}
						?>
					</div>
				</div>
			</div>

			<div class="iup-savebar iup-savebar-bottom">
				<button type="submit" class="button button-primary button-hero">💾 Guardar cambios</button>
			</div>
		</form>

		<!-- ===== PLANTILLAS (templates) para clonar nuevos elementos ===== -->
		<template id="tpl-grupo">
			<div class="iup-grupo" data-repeat-item>
				<div class="iup-grupo-head">
					<span class="iup-drag">⠿</span>
					<input type="text" class="iup-input-grupo" data-field="grupo" placeholder="Nombre del grupo (ej. Educación)">
					<button type="button" class="button iup-btn-del" data-remove>Eliminar grupo</button>
				</div>
				<div class="iup-programas" data-repeat-zone="programas"></div>
				<button type="button" class="button button-small iup-add-programa">+ Agregar programa</button>
			</div>
		</template>

		<template id="tpl-programa">
			<div class="iup-programa" data-repeat-item>
				<div class="iup-programa-head">
					<span class="iup-drag">⠿</span>
					<input type="text" class="iup-input-programa" data-field="nombre" placeholder="Nombre del programa (ej. Lic. en Derecho)">
					<button type="button" class="button iup-btn-del" data-remove>✕ programa</button>
				</div>
				<div class="iup-filas" data-repeat-zone="filas"></div>
				<button type="button" class="button button-small iup-add-fila">+ Agregar cuatrimestre / fila</button>
			</div>
		</template>

		<template id="tpl-fila">
			<div class="iup-fila" data-repeat-item>
				<span class="iup-drag">⠿</span>
				<input type="text" class="iup-input-label" data-field="label" placeholder="Concepto / etiqueta">
				<div class="iup-precio-wrap">
					<span class="iup-precio-sign">$</span>
					<input type="number" step="0.01" min="0" class="iup-input-precio" data-field="precio" placeholder="0.00">
				</div>
				<button type="button" class="button iup-btn-del" data-remove>✕</button>
			</div>
		</template>
	</div>
	<?php
	iupmodern_costos_print_admin_assets();
}

/* =====================================================================
 * 10. CSS + JS del panel (inline, sólo en esta pantalla)
 * ===================================================================== */
function iupmodern_costos_print_admin_assets() {
	?>
	<style>
		.iup-costos-wrap{max-width:1100px}
		.iup-title .dashicons{font-size:28px;width:28px;height:28px;vertical-align:middle}
		.iup-sub{max-width:760px;color:#50575e;font-size:13px}
		.iup-card{background:#fff;border:1px solid #dcdcde;border-radius:10px;padding:18px 20px;margin:16px 0;box-shadow:0 1px 2px rgba(0,0,0,.04)}
		.iup-card>h2{margin-top:0;font-size:15px;border-bottom:1px solid #f0f0f1;padding-bottom:10px}
		.iup-card-head{display:flex;align-items:center;justify-content:space-between;gap:12px;border-bottom:1px solid #f0f0f1;padding-bottom:10px;margin-bottom:14px}
		.iup-card-head h2{margin:0;border:0;padding:0;font-size:15px}
		.iup-grid-2{display:grid;grid-template-columns:1fr 1fr;gap:16px}
		@media(max-width:960px){.iup-grid-2{grid-template-columns:1fr}}
		.iup-row{display:flex;align-items:center;gap:14px;margin:10px 0}
		.iup-label{min-width:230px;font-weight:600;color:#3c434a;font-size:13px}
		.iup-precio-wrap{display:inline-flex;align-items:center;border:1px solid #8c8f94;border-radius:6px;overflow:hidden;background:#fff}
		.iup-precio-wrap:focus-within{border-color:#2271b1;box-shadow:0 0 0 1px #2271b1}
		.iup-precio-sign{padding:0 8px;color:#787c82;background:#f6f7f7;align-self:stretch;display:flex;align-items:center;font-weight:600}
		.iup-precio-wrap input{border:0!important;box-shadow:none!important;width:120px;text-align:right}
		.iup-precio-wrap input:focus{box-shadow:none!important;outline:0}
		.iup-grupo{border:1px solid #c3c4c7;border-left:4px solid #2271b1;border-radius:8px;padding:14px;margin-bottom:16px;background:#fbfbfc}
		.iup-grupo-head{display:flex;align-items:center;gap:10px;margin-bottom:12px}
		.iup-input-grupo{flex:1;font-weight:700!important;font-size:14px!important}
		.iup-programas{padding-left:6px}
		.iup-programa{border:1px solid #e0e0e0;border-left:3px solid #00a32a;border-radius:6px;padding:12px;margin:10px 0;background:#fff}
		.iup-programa-head{display:flex;align-items:center;gap:10px;margin-bottom:8px}
		.iup-input-programa{flex:1;font-weight:600!important}
		.iup-filas{margin:6px 0 8px}
		.iup-fila{display:flex;align-items:center;gap:8px;padding:5px 0}
		.iup-input-label{flex:1}
		.iup-drag{cursor:grab;color:#a7aaad;user-select:none;font-size:15px;line-height:1}
		.iup-drag:active{cursor:grabbing}
		.iup-btn-del{color:#b32d2e!important}
		.iup-btn-del:hover{background:#b32d2e!important;color:#fff!important;border-color:#b32d2e!important}
		.iup-lista .iup-fila{border-bottom:1px solid #f3f3f4}
		.iup-savebar{position:sticky;top:32px;z-index:20;background:rgba(255,255,255,.92);backdrop-filter:blur(4px);padding:10px 0;margin:8px 0;border-bottom:1px solid #e6e6e6}
		.iup-savebar-bottom{position:static;border:0;border-top:1px solid #e6e6e6;margin-top:20px;text-align:right}
		.iup-dragging{opacity:.5}
	</style>

	<script>
	(function(){
		'use strict';
		var form = document.getElementById('iup-costos-form');
		if(!form) return;

		function tpl(id){
			var t = document.getElementById(id);
			return t.content.firstElementChild.cloneNode(true);
		}
		function closestItem(el){ return el.closest('[data-repeat-item]'); }

		/* ---------- Delegación de clicks ---------- */
		form.addEventListener('click', function(e){
			var btn = e.target.closest('button');
			if(!btn) return;

			if(btn.hasAttribute('data-remove')){
				e.preventDefault();
				var item = closestItem(btn);
				if(item){ item.remove(); }
				return;
			}
			if(btn.id === 'iup-add-grupo'){
				e.preventDefault();
				document.getElementById('iup-grupos').appendChild(tpl('tpl-grupo'));
				return;
			}
			if(btn.classList.contains('iup-add-programa')){
				e.preventDefault();
				var zona = btn.previousElementSibling;
				if(zona && zona.matches('[data-repeat-zone="programas"]')){
					zona.appendChild(tpl('tpl-programa'));
				}
				return;
			}
			if(btn.classList.contains('iup-add-fila')){
				e.preventDefault();
				var zonaF = btn.previousElementSibling;
				if(zonaF && zonaF.matches('[data-repeat-zone="filas"]')){
					zonaF.appendChild(tpl('tpl-fila'));
				}
				return;
			}
			if(btn.classList.contains('iup-add-simple')){
				e.preventDefault();
				var zoneName = btn.getAttribute('data-zone');
				var zona2 = document.querySelector('[data-repeat-zone="'+zoneName+'"]');
				if(zona2){ zona2.appendChild(tpl('tpl-fila')); }
				return;
			}
		});

		/* ---------- Reordenar (drag & drop nativo) ---------- */
		var dragEl = null;
		form.addEventListener('mousedown', function(e){
			if(e.target.classList.contains('iup-drag')){
				var item = closestItem(e.target);
				if(item){ item.setAttribute('draggable','true'); }
			}
		});
		form.addEventListener('dragstart', function(e){
			var item = e.target.closest('[data-repeat-item]');
			if(!item) return;
			dragEl = item;
			item.classList.add('iup-dragging');
			e.dataTransfer.effectAllowed = 'move';
		});
		form.addEventListener('dragover', function(e){
			if(!dragEl) return;
			var over = e.target.closest('[data-repeat-item]');
			if(!over || over === dragEl) return;
			if(over.parentNode !== dragEl.parentNode) return;
			e.preventDefault();
			var rect = over.getBoundingClientRect();
			var after = (e.clientY - rect.top) / rect.height > 0.5;
			over.parentNode.insertBefore(dragEl, after ? over.nextSibling : over);
		});
		form.addEventListener('dragend', function(){
			if(dragEl){
				dragEl.classList.remove('iup-dragging');
				dragEl.removeAttribute('draggable');
				dragEl = null;
			}
		});

		/* ---------- Reindexar nombres justo antes de enviar ---------- */
		form.addEventListener('submit', function(){
			var grupos = document.querySelectorAll('#iup-grupos > .iup-grupo');
			grupos.forEach(function(g, gi){
				var gIn = g.querySelector(':scope > .iup-grupo-head > [data-field="grupo"]');
				if(gIn) gIn.name = 'colegiaturas['+gi+'][grupo]';
				var programas = g.querySelectorAll(':scope > .iup-programas > .iup-programa');
				programas.forEach(function(p, pi){
					var pIn = p.querySelector(':scope > .iup-programa-head > [data-field="nombre"]');
					if(pIn) pIn.name = 'colegiaturas['+gi+'][programas]['+pi+'][nombre]';
					var filas = p.querySelectorAll(':scope > .iup-filas > .iup-fila');
					filas.forEach(function(f, fi){
						var base = 'colegiaturas['+gi+'][programas]['+pi+'][filas]['+fi+']';
						var l = f.querySelector('[data-field="label"]');
						var pr = f.querySelector('[data-field="precio"]');
						if(l) l.name = base+'[label]';
						if(pr) pr.name = base+'[precio]';
					});
				});
			});

			['conceptos_admin','titulacion_lic','titulacion_mtria'].forEach(function(name){
				var zona = document.querySelector('[data-repeat-zone="'+name+'"]');
				if(!zona) return;
				var items = zona.querySelectorAll(':scope > .iup-fila');
				items.forEach(function(f, i){
					var l = f.querySelector('[data-field="label"]');
					var pr = f.querySelector('[data-field="precio"]');
					if(l) l.name = name+'['+i+'][label]';
					if(pr) pr.name = name+'['+i+'][precio]';
				});
			});
		});
	})();
	</script>
	<?php
}