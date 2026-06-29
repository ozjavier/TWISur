<?php
/**
 * ============================================================================
 *  CARRERAS — Custom Post Type + campos personalizados
 * ----------------------------------------------------------------------------
 *  Optimización de la interfaz del EDITOR CLÁSICO (carga / actualización /
 *  eliminación de datos más fáciles). No cambia nada del frontend.
 *
 *  COMPATIBILIDAD DE DATOS — se conservan idénticos (no se pierde info):
 *    - Post type:  'carrera'  (rewrite slug: 'carreras')
 *    - Todas las meta keys (con guion bajo inicial)
 *    - Todos los names de los campos del formulario
 *    - Los 3 nonces y la lógica de guardado
 *
 *  Mejoras de esta versión (solo UI/UX del admin):
 *    1. Campos agrupados en "tarjetas" por sección → fácil de escanear.
 *    2. Campo de imagen reutilizable con vista previa que se oculta cuando
 *       está vacío (adiós al ícono de "imagen rota") + botón "Quitar".
 *    3. Repetidores (cuatrimestres, materias, herramientas) con:
 *         - Bug corregido: al borrar un elemento intermedio y agregar otro
 *           ya NO se duplican los índices (antes se perdía un dato al guardar).
 *         - Reordenar arrastrando (drag & drop).
 *         - Renumeración automática y estados vacíos claros.
 *    4. Todo el CSS y JS del admin se encola UNA sola vez y solo en la
 *       pantalla de "carrera" (sin scripts duplicados dentro de cada metabox).
 *
 *  Uso: coloca este archivo en /inc/carreras.php y en functions.php:
 *      require_once get_template_directory() . '/inc/carreras.php';
 * ============================================================================
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Salir si se accede directamente.
}

/* ============================================================================
 * 1. REGISTRO DEL CUSTOM POST TYPE "CARRERA"  (sin cambios)
 * ========================================================================== */

function iupsur_create_carreras_post_type() {
    $labels = array(
        'name'                  => _x( 'Carreras', 'Post type general name', 'iupsurtheme' ),
        'singular_name'         => _x( 'Carrera', 'Post type singular name', 'iupsurtheme' ),
        'menu_name'             => _x( 'Carreras', 'Admin Menu text', 'iupsurtheme' ),
        'name_admin_bar'        => _x( 'Carrera', 'Add New on Toolbar', 'iupsurtheme' ),
        'add_new'               => __( 'Añadir nueva', 'iupsurtheme' ),
        'add_new_item'          => __( 'Añadir nueva carrera', 'iupsurtheme' ),
        'new_item'              => __( 'Nueva carrera', 'iupsurtheme' ),
        'edit_item'             => __( 'Editar carrera', 'iupsurtheme' ),
        'view_item'             => __( 'Ver carrera', 'iupsurtheme' ),
        'all_items'             => __( 'Todas las carreras', 'iupsurtheme' ),
        'search_items'          => __( 'Buscar carreras', 'iupsurtheme' ),
        'parent_item_colon'     => __( 'Carrera padre:', 'iupsurtheme' ),
        'not_found'             => __( 'Sin resultados.', 'iupsurtheme' ),
        'not_found_in_trash'    => __( 'Sin resultados.', 'iupsurtheme' ),
        'featured_image'        => _x( 'Imagen principal', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'iupsurtheme' ),
        'set_featured_image'    => _x( 'Establecer imagen principal', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'iupsurtheme' ),
        'remove_featured_image' => _x( 'Remover imagen principal', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'iupsurtheme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'iupsurtheme' ),
        'archives'              => _x( 'Carrera archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'iupsurtheme' ),
        'insert_into_item'      => _x( 'Insert into carrera', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'iupsurtheme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this carrera', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'iupsurtheme' ),
        'filter_items_list'     => _x( 'Filter carreras list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”. Added in 4.4', 'iupsurtheme' ),
        'items_list_navigation' => _x( 'Carreras list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”. Added in 4.4', 'iupsurtheme' ),
        'items_list'            => _x( 'Carreras list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”. Added in 4.4', 'iupsurtheme' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'carreras' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'taxonomies'         => array( 'category' ),
    );

    register_post_type( 'carrera', $args );
}
add_action( 'init', 'iupsur_create_carreras_post_type' );


/* ============================================================================
 * 2. REGISTRO DE LOS METABOXES
 * ========================================================================== */

function iupsur_carrera_meta_boxes() {
    add_meta_box(
        'info_carrera_metabox',
        'Información de la Carrera',
        'mostrar_metabox_info_carrera',
        'carrera',
        'normal',
        'high'
    );

    add_meta_box(
        'plan_estudios_metabox',
        'Plan de Estudios',
        'mostrar_metabox_plan_estudios',
        'carrera',
        'normal',
        'high'
    );

    add_meta_box(
        'herramientas_metabox',
        'Herramientas / Instalaciones',
        'mostrar_metabox_herramientas',
        'carrera',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'iupsur_carrera_meta_boxes' );


/* ============================================================================
 * 3. HELPERS DE RENDER (componentes reutilizables del formulario)
 * ----------------------------------------------------------------------------
 *  Generan SIEMPRE el mismo `name` que espera el guardado: no tocar.
 * ========================================================================== */

/** Abre una tarjeta de sección. */
function iupsur_card_open( $titulo, $sub = '' ) {
    echo '<div class="iupsur-card"><div class="iupsur-card__head">';
    echo '<h3 class="iupsur-card__title">' . esc_html( $titulo ) . '</h3>';
    if ( $sub ) {
        echo '<p class="iupsur-card__sub">' . esc_html( $sub ) . '</p>';
    }
    echo '</div><div class="iupsur-card__body">';
}

/** Cierra una tarjeta de sección. */
function iupsur_card_close() {
    echo '</div></div>';
}

/** Campo de texto / url. $type: 'text' | 'url'. */
function iupsur_campo_texto( $name, $label, $value, $args = array() ) {
    $type        = isset( $args['type'] ) ? $args['type'] : 'text';
    $placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';
    $desc        = isset( $args['desc'] ) ? $args['desc'] : '';
    ?>
    <div class="iupsur-field">
        <label class="iupsur-label" for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
        <input type="<?php echo esc_attr( $type ); ?>"
               id="<?php echo esc_attr( $name ); ?>"
               name="<?php echo esc_attr( $name ); ?>"
               value="<?php echo esc_attr( $value ); ?>"
               placeholder="<?php echo esc_attr( $placeholder ); ?>"
               class="widefat">
        <?php if ( $desc ) : ?><p class="iupsur-help"><?php echo wp_kses_post( $desc ); ?></p><?php endif; ?>
    </div>
    <?php
}

/** Área de texto. */
function iupsur_campo_textarea( $name, $label, $value, $args = array() ) {
    $placeholder = isset( $args['placeholder'] ) ? $args['placeholder'] : '';
    $rows        = isset( $args['rows'] ) ? (int) $args['rows'] : 3;
    $desc        = isset( $args['desc'] ) ? $args['desc'] : '';
    ?>
    <div class="iupsur-field">
        <label class="iupsur-label" for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
        <textarea id="<?php echo esc_attr( $name ); ?>"
                  name="<?php echo esc_attr( $name ); ?>"
                  rows="<?php echo esc_attr( $rows ); ?>"
                  placeholder="<?php echo esc_attr( $placeholder ); ?>"
                  class="widefat"><?php echo esc_textarea( $value ); ?></textarea>
        <?php if ( $desc ) : ?><p class="iupsur-help"><?php echo wp_kses_post( $desc ); ?></p><?php endif; ?>
    </div>
    <?php
}

/**
 * Campo de imagen: input + botón Subir/Cambiar + botón Quitar + vista previa.
 * La preview se oculta automáticamente cuando no hay valor.
 */
function iupsur_campo_imagen( $name, $label, $value, $args = array() ) {
    $value = (string) $value;
    $desc  = isset( $args['desc'] ) ? $args['desc'] : '';
    $tiene = '' !== trim( $value );
    ?>
    <div class="iupsur-field iupsur-image-field">
        <label class="iupsur-label" for="<?php echo esc_attr( $name ); ?>"><?php echo esc_html( $label ); ?></label>
        <div class="iupsur-image-field__row">
            <input type="text"
                   id="<?php echo esc_attr( $name ); ?>"
                   name="<?php echo esc_attr( $name ); ?>"
                   value="<?php echo esc_attr( $value ); ?>"
                   placeholder="URL de la imagen…"
                   class="iupsur-image-field__input regular-text">
            <button type="button" class="button upload_image_button"><?php echo $tiene ? 'Cambiar' : 'Subir imagen'; ?></button>
            <button type="button" class="button iupsur-remove-image"<?php echo $tiene ? '' : ' style="display:none;"'; ?>>Quitar</button>
        </div>
        <div class="iupsur-image-field__preview"<?php echo $tiene ? '' : ' style="display:none;"'; ?>>
            <img src="<?php echo esc_url( $value ); ?>" alt="">
        </div>
        <?php if ( $desc ) : ?><p class="iupsur-help"><?php echo wp_kses_post( $desc ); ?></p><?php endif; ?>
    </div>
    <?php
}


/* ============================================================================
 * 3.1  METABOX: Información de la carrera
 * ========================================================================== */
function mostrar_metabox_info_carrera( $post ) {
    wp_nonce_field( 'guardar_info_carrera', 'info_carrera_nonce' );

    $incorporado_unam       = get_post_meta( $post->ID, '_incorporado_unam', true );
    $video_hero             = get_post_meta( $post->ID, '_video_hero', true );
    $imagen_hero            = get_post_meta( $post->ID, '_imagen_hero', true );
    $titulo_linea_1         = get_post_meta( $post->ID, '_titulo_linea_1', true );
    $titulo_linea_2_verde   = get_post_meta( $post->ID, '_titulo_linea_2_verde', true );
    $titulo_linea_3         = get_post_meta( $post->ID, '_titulo_linea_3', true );
    $descripcion_corta_hero = get_post_meta( $post->ID, '_descripcion_corta_hero', true );
    $url_plan_estudios      = get_post_meta( $post->ID, '_url_plan_estudios', true );
    $imagen_programa        = get_post_meta( $post->ID, '_imagen_programa', true );
    $vida_subtitulo         = get_post_meta( $post->ID, '_vida_subtitulo', true );
    $vida_descripcion       = get_post_meta( $post->ID, '_vida_descripcion', true );
    $vida_imagen            = get_post_meta( $post->ID, '_vida_imagen', true );
    $rvoe                   = get_post_meta( $post->ID, '_rvoe', true );
    $duracion               = get_post_meta( $post->ID, '_duracion', true );
    $modalidad              = get_post_meta( $post->ID, '_modalidad', true );
    $imagen_encabezado      = get_post_meta( $post->ID, '_imagen_encabezado', true );
    $perfil_ingreso         = get_post_meta( $post->ID, '_perfil_ingreso', true );
    $perfil_egreso          = get_post_meta( $post->ID, '_perfil_egreso', true );
    $imagen_ingreso         = get_post_meta( $post->ID, '_imagen_ingreso', true );
    $imagen_egreso          = get_post_meta( $post->ID, '_imagen_egreso', true );

    echo '<div class="iupsur-metabox">';

    /* --- Información general --- */
    iupsur_card_open( 'Información general', 'Datos principales que aparecen en la ficha de la carrera.' );
    ?>
    <div class="iupsur-field">
        <label class="iupsur-check">
            <input type="checkbox" name="incorporado_unam" value="1" <?php checked( $incorporado_unam, '1' ); ?>>
            <span>Incorporado a la UNAM</span>
        </label>
    </div>
    <div class="iupsur-grid iupsur-grid--3">
        <?php
        iupsur_campo_texto( 'rvoe', 'RVOE', $rvoe, array( 'placeholder' => 'Ej. 20210123' ) );
        iupsur_campo_texto( 'duracion', 'Duración', $duracion, array( 'placeholder' => 'Ej. 8 cuatrimestres' ) );
        iupsur_campo_texto( 'modalidad', 'Modalidad', $modalidad, array( 'placeholder' => 'Ej. Escolarizada' ) );
        ?>
    </div>
    <?php
    iupsur_campo_imagen( 'imagen_encabezado', 'Imagen de encabezado', $imagen_encabezado );
    iupsur_card_close();

    /* --- Sobre el programa --- */
    iupsur_card_open( 'Sobre el programa' );
    iupsur_campo_imagen( 'imagen_programa', 'Imagen de la sección', $imagen_programa );
    iupsur_card_close();

    /* --- Hero --- */
    iupsur_card_open( 'Hero de la carrera', 'Portada superior: imagen/video y los textos del título.' );
    iupsur_campo_imagen( 'imagen_hero', 'Imagen de póster (Hero)', $imagen_hero );
    iupsur_campo_texto( 'video_hero', 'URL del video (Hero)', $video_hero, array(
        'type'        => 'url',
        'placeholder' => 'https://ejemplo.com/video.mp4',
        'desc'        => 'URL directa al archivo de video (se recomienda MP4). Si la dejas vacía, se usa la imagen.',
    ) );
    echo '<div class="iupsur-grid iupsur-grid--3">';
    iupsur_campo_texto( 'titulo_linea_1', 'Título · línea 1 (blanco)', $titulo_linea_1, array( 'placeholder' => 'Ej. Licenciatura en' ) );
    iupsur_campo_texto( 'titulo_linea_2_verde', 'Título · línea 2 (verde)', $titulo_linea_2_verde, array( 'placeholder' => 'Ej. Administración de' ) );
    iupsur_campo_texto( 'titulo_linea_3', 'Título · línea 3 (blanco)', $titulo_linea_3, array( 'placeholder' => 'Ej. Empresas Gastronómicas' ) );
    echo '</div>';
    iupsur_campo_textarea( 'descripcion_corta_hero', 'Descripción corta (Hero)', $descripcion_corta_hero, array(
        'rows'        => 3,
        'placeholder' => 'Descripción que acompaña al título…',
    ) );
    iupsur_card_close();

    /* --- Vida estudiantil --- */
    iupsur_card_open( 'Vida estudiantil' );
    iupsur_campo_texto( 'vida_subtitulo', 'Subtítulo', $vida_subtitulo, array( 'placeholder' => 'Ej. En el IUP no solo vienes a estudiar…' ) );
    iupsur_campo_textarea( 'vida_descripcion', 'Texto descriptivo', $vida_descripcion, array(
        'rows'        => 4,
        'placeholder' => 'Participa en concursos internos…',
    ) );
    iupsur_campo_imagen( 'vida_imagen', 'Imagen de vida estudiantil', $vida_imagen );
    iupsur_card_close();

    /* --- Descargables --- */
    iupsur_card_open( 'Descargables' );
    iupsur_campo_texto( 'url_plan_estudios', 'URL del plan de estudios (PDF)', $url_plan_estudios, array(
        'type'        => 'url',
        'placeholder' => 'https://tusitio.com/plan-estudios.pdf',
    ) );
    iupsur_card_close();

    /* --- Perfil de ingreso --- */
    iupsur_card_open( 'Perfil de ingreso' );
    iupsur_campo_imagen( 'imagen_ingreso', 'Imagen de perfil de ingreso', $imagen_ingreso );
    echo '<div class="iupsur-field"><label class="iupsur-label">Texto del perfil de ingreso</label>';
    wp_editor( $perfil_ingreso, 'perfil_ingreso', array(
        'textarea_name' => 'perfil_ingreso',
        'media_buttons' => false,
        'textarea_rows' => 10,
        'teeny'         => true,
    ) );
    echo '</div>';
    iupsur_card_close();

    /* --- Perfil de egreso --- */
    iupsur_card_open( 'Perfil de egreso' );
    iupsur_campo_imagen( 'imagen_egreso', 'Imagen de perfil de egreso', $imagen_egreso );
    echo '<div class="iupsur-field"><label class="iupsur-label">Texto del perfil de egreso</label>';
    wp_editor( $perfil_egreso, 'perfil_egreso', array(
        'textarea_name' => 'perfil_egreso',
        'media_buttons' => false,
        'textarea_rows' => 10,
        'teeny'         => true,
    ) );
    echo '</div>';
    iupsur_card_close();

    echo '</div>'; // .iupsur-metabox
}


/* ============================================================================
 * 3.2  METABOX: Plan de estudios (repetidor)
 * ========================================================================== */
function mostrar_metabox_plan_estudios( $post ) {
    wp_nonce_field( 'guardar_plan_estudios', 'plan_estudios_nonce' );

    $plan_estudios = get_post_meta( $post->ID, '_plan_estudios', true );
    if ( ! is_array( $plan_estudios ) ) {
        $plan_estudios = array();
    }
    ?>
    <div class="iupsur-metabox">
        <p class="iupsur-help">Arrastra las tarjetas desde su encabezado para reordenar. La numeración se ajusta sola.</p>

        <div id="plan_estudios_container" class="iupsur-repeater">
            <?php foreach ( $plan_estudios as $index => $cuatrimestre ) : ?>
                <?php mostrar_cuatrimestre( $index, $cuatrimestre ); ?>
            <?php endforeach; ?>
        </div>

        <p id="plan_estudios_empty" class="iupsur-empty"<?php echo count( $plan_estudios ) ? ' style="display:none;"' : ''; ?>>
            Aún no hay cuatrimestres. Agrega el primero para construir el plan.
        </p>

        <button type="button" id="agregar_cuatrimestre" class="button button-primary">+ Agregar cuatrimestre</button>
    </div>
    <?php
}

function mostrar_cuatrimestre( $index, $cuatrimestre ) {
    $numero = isset( $cuatrimestre['numero'] ) ? $cuatrimestre['numero'] : '';
    ?>
    <div class="cuatrimestre iupsur-card iupsur-repeat-item">
        <div class="iupsur-card__head iupsur-handle-row">
            <span class="iupsur-drag dashicons dashicons-menu" title="Arrastra para reordenar"></span>
            <h4 class="iupsur-card__title iupsur-cuatri-title">Cuatrimestre <?php echo (int) $index + 1; ?></h4>
            <label class="iupsur-inline-label">Etiqueta
                <input type="text" name="plan_estudios[<?php echo (int) $index; ?>][numero]" value="<?php echo esc_attr( $numero ); ?>">
            </label>
            <button type="button" class="button-link-delete iupsur-del-cuatrimestre">Eliminar</button>
        </div>
        <div class="materias">
            <?php
            if ( isset( $cuatrimestre['materias'] ) && is_array( $cuatrimestre['materias'] ) ) {
                foreach ( $cuatrimestre['materias'] as $materia_index => $materia ) {
                    ?>
                    <div class="materia">
                        <input type="text" name="plan_estudios[<?php echo (int) $index; ?>][materias][<?php echo (int) $materia_index; ?>]" value="<?php echo esc_attr( $materia ); ?>" placeholder="Nombre de la materia">
                        <button type="button" class="iupsur-del iupsur-del-materia" title="Eliminar materia" aria-label="Eliminar materia">&times;</button>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <button type="button" class="button agregar_materia">+ Agregar materia</button>
    </div>
    <?php
}


/* ============================================================================
 * 3.3  METABOX: Herramientas e instalaciones (repetidor)
 * ========================================================================== */
function mostrar_metabox_herramientas( $post ) {
    wp_nonce_field( 'guardar_herramientas', 'herramientas_nonce' );

    $herramientas = get_post_meta( $post->ID, '_herramientas', true );
    if ( ! is_array( $herramientas ) ) {
        $herramientas = array();
    }
    ?>
    <div class="iupsur-metabox">
        <p class="iupsur-help">Bloques de la sección "Herramientas / Instalaciones". Arrastra desde el encabezado para reordenar.</p>

        <div id="herramientas_container" class="iupsur-repeater">
            <?php foreach ( $herramientas as $index => $item ) : ?>
                <?php mostrar_item_herramienta( $index, $item ); ?>
            <?php endforeach; ?>
        </div>

        <p id="herramientas_empty" class="iupsur-empty"<?php echo count( $herramientas ) ? ' style="display:none;"' : ''; ?>>
            Aún no hay bloques. Agrega uno para empezar.
        </p>

        <button type="button" id="agregar_herramienta" class="button button-primary">+ Agregar herramienta</button>
    </div>
    <?php
}

function mostrar_item_herramienta( $index, $item ) {
    $icono  = isset( $item['icono'] ) ? $item['icono'] : '';
    $titulo = isset( $item['titulo'] ) ? $item['titulo'] : '';
    $desc   = isset( $item['descripcion'] ) ? $item['descripcion'] : '';
    ?>
    <div class="herramienta_item iupsur-card iupsur-repeat-item">
        <div class="iupsur-card__head iupsur-handle-row">
            <span class="iupsur-drag dashicons dashicons-menu" title="Arrastra para reordenar"></span>
            <h4 class="iupsur-card__title"><?php echo $titulo ? esc_html( $titulo ) : 'Bloque de herramienta'; ?></h4>
            <button type="button" class="button-link-delete iupsur-del-herramienta">Eliminar</button>
        </div>
        <div class="iupsur-card__body">
            <div class="iupsur-grid iupsur-grid--2">
                <div class="iupsur-field">
                    <label class="iupsur-label">Icono (Lucide)</label>
                    <input type="text" name="herramientas[<?php echo (int) $index; ?>][icono]" value="<?php echo esc_attr( $icono ); ?>" placeholder="Ej. chef-hat" class="widefat">
                    <p class="iupsur-help">Nombres en <a href="https://lucide.dev/icons/" target="_blank" rel="noopener">lucide.dev</a></p>
                </div>
                <div class="iupsur-field">
                    <label class="iupsur-label">Título</label>
                    <input type="text" name="herramientas[<?php echo (int) $index; ?>][titulo]" value="<?php echo esc_attr( $titulo ); ?>" placeholder="Ej. Laboratorios Culinarios" class="widefat">
                </div>
            </div>
            <div class="iupsur-field">
                <label class="iupsur-label">Descripción</label>
                <textarea name="herramientas[<?php echo (int) $index; ?>][descripcion]" rows="2" class="widefat"><?php echo esc_textarea( $desc ); ?></textarea>
            </div>
        </div>
    </div>
    <?php
}


/* ============================================================================
 * 4. GUARDADO (idéntico a la versión original — no se toca la lógica de datos)
 * ========================================================================== */

function iupsur_sanitize_plan_estudios( $plan ) {
    $limpio = array();
    if ( is_array( $plan ) ) {
        foreach ( $plan as $cuatri ) {
            $item = array(
                'numero'   => isset( $cuatri['numero'] ) ? sanitize_text_field( $cuatri['numero'] ) : '',
                'materias' => array(),
            );
            if ( isset( $cuatri['materias'] ) && is_array( $cuatri['materias'] ) ) {
                foreach ( $cuatri['materias'] as $materia ) {
                    $materia = sanitize_text_field( $materia );
                    if ( '' !== $materia ) {
                        $item['materias'][] = $materia; // descarta materias vacías
                    }
                }
            }
            $limpio[] = $item;
        }
    }
    return $limpio;
}

function iupsur_guardar_carrera( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( get_post_type( $post_id ) !== 'carrera' ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    /* --- Información de la carrera --- */
    if ( isset( $_POST['info_carrera_nonce'] ) && wp_verify_nonce( $_POST['info_carrera_nonce'], 'guardar_info_carrera' ) ) {

        if ( isset( $_POST['incorporado_unam'] ) ) {
            update_post_meta( $post_id, '_incorporado_unam', '1' );
        } else {
            delete_post_meta( $post_id, '_incorporado_unam' );
        }

        $campos = array( 'rvoe', 'duracion', 'modalidad', 'imagen_encabezado', 'imagen_ingreso', 'imagen_egreso', 'video_hero', 'imagen_hero', 'titulo_linea_1', 'titulo_linea_2_verde', 'titulo_linea_3', 'url_plan_estudios', 'imagen_programa', 'vida_subtitulo', 'vida_imagen' );

        foreach ( $campos as $campo ) {
            if ( isset( $_POST[ $campo ] ) ) {
                update_post_meta( $post_id, '_' . $campo, sanitize_text_field( $_POST[ $campo ] ) );
            }
        }

        if ( isset( $_POST['perfil_ingreso'] ) ) {
            update_post_meta( $post_id, '_perfil_ingreso', wp_kses_post( $_POST['perfil_ingreso'] ) );
        }
        if ( isset( $_POST['perfil_egreso'] ) ) {
            update_post_meta( $post_id, '_perfil_egreso', wp_kses_post( $_POST['perfil_egreso'] ) );
        }
        if ( isset( $_POST['descripcion_corta_hero'] ) ) {
            update_post_meta( $post_id, '_descripcion_corta_hero', sanitize_textarea_field( $_POST['descripcion_corta_hero'] ) );
        }
        if ( isset( $_POST['vida_descripcion'] ) ) {
            update_post_meta( $post_id, '_vida_descripcion', sanitize_textarea_field( $_POST['vida_descripcion'] ) );
        }
    }

    /* --- Plan de estudios --- */
    if ( isset( $_POST['plan_estudios_nonce'] ) && wp_verify_nonce( $_POST['plan_estudios_nonce'], 'guardar_plan_estudios' ) ) {
        if ( isset( $_POST['plan_estudios'] ) ) {
            update_post_meta( $post_id, '_plan_estudios', iupsur_sanitize_plan_estudios( $_POST['plan_estudios'] ) );
        } else {
            delete_post_meta( $post_id, '_plan_estudios' );
        }
    }

    /* --- Herramientas e instalaciones --- */
    if ( isset( $_POST['herramientas_nonce'] ) && wp_verify_nonce( $_POST['herramientas_nonce'], 'guardar_herramientas' ) ) {
        if ( isset( $_POST['herramientas'] ) && is_array( $_POST['herramientas'] ) ) {
            $herramientas_limpias = array();
            foreach ( $_POST['herramientas'] as $h ) {
                $herramientas_limpias[] = array(
                    'icono'       => sanitize_text_field( isset( $h['icono'] ) ? $h['icono'] : '' ),
                    'titulo'      => sanitize_text_field( isset( $h['titulo'] ) ? $h['titulo'] : '' ),
                    'descripcion' => sanitize_textarea_field( isset( $h['descripcion'] ) ? $h['descripcion'] : '' ),
                );
            }
            update_post_meta( $post_id, '_herramientas', $herramientas_limpias );
        } else {
            delete_post_meta( $post_id, '_herramientas' );
        }
    }
}
add_action( 'save_post', 'iupsur_guardar_carrera' );


/* ============================================================================
 * 5. ASSETS DEL ADMIN (CSS + JS unificados, solo en la pantalla de "carrera")
 * ========================================================================== */

function iupsur_carrera_admin_assets( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }
    $screen = get_current_screen();
    if ( ! $screen || 'carrera' !== $screen->post_type ) {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script( 'jquery-ui-sortable' ); // reordenar arrastrando (incluido en WP)

    /* -------------------------------- CSS -------------------------------- */
    $css = <<<'CSS'
.iupsur-metabox { margin-top: 4px; }
.iupsur-help { margin: 4px 0 0; color: #646970; font-size: 12px; }
.iupsur-empty {
    margin: 12px 0; padding: 16px; text-align: center;
    color: #646970; background: #f6f7f7; border: 1px dashed #c3c4c7; border-radius: 6px;
}

/* Tarjetas de sección */
.iupsur-card {
    border: 1px solid #dcdcde; border-radius: 8px; background: #fff;
    margin: 0 0 16px; overflow: hidden;
}
.iupsur-card__head {
    display: flex; align-items: center; gap: 12px; flex-wrap: wrap;
    padding: 10px 14px; background: #f6f7f7; border-bottom: 1px solid #dcdcde;
}
.iupsur-card__title { margin: 0; font-size: 13px; font-weight: 600; line-height: 1.4; }
.iupsur-card__sub { margin: 2px 0 0; flex-basis: 100%; color: #646970; font-size: 12px; font-weight: 400; }
.iupsur-card__body { padding: 14px; }

/* Campos */
.iupsur-field { margin: 0 0 14px; }
.iupsur-field:last-child { margin-bottom: 0; }
.iupsur-label { display: block; margin-bottom: 5px; font-weight: 600; font-size: 13px; }
.iupsur-check { display: inline-flex; align-items: center; gap: 8px; font-weight: 600; }
.iupsur-metabox input[type="text"].widefat,
.iupsur-metabox input[type="url"].widefat,
.iupsur-metabox textarea.widefat { max-width: 100%; }

/* Rejillas responsivas */
.iupsur-grid { display: grid; gap: 14px; }
.iupsur-grid--2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
.iupsur-grid--3 { grid-template-columns: repeat(3, minmax(0, 1fr)); }
@media (max-width: 782px) {
    .iupsur-grid--2, .iupsur-grid--3 { grid-template-columns: 1fr; }
}

/* Campo de imagen */
.iupsur-image-field__row { display: flex; gap: 8px; flex-wrap: wrap; align-items: center; }
.iupsur-image-field__input { flex: 1 1 280px; min-width: 200px; }
.iupsur-image-field__preview { margin-top: 10px; }
.iupsur-image-field__preview img {
    max-width: 180px; max-height: 140px; height: auto; display: block;
    border: 1px solid #dcdcde; border-radius: 6px; padding: 3px; background: #fff;
}

/* Repetidores */
.iupsur-repeater { margin-bottom: 12px; }
.iupsur-repeat-item .iupsur-card__head { cursor: default; }
.iupsur-handle-row { cursor: grab; }
.iupsur-drag { color: #8c8f94; }
.iupsur-cuatri-title { margin-right: auto; }
.iupsur-inline-label { font-size: 12px; color: #646970; display: inline-flex; align-items: center; gap: 6px; }
.iupsur-inline-label input { width: 80px; }
.iupsur-card__head .button-link-delete { margin-left: 8px; }

/* Materias */
.materias { padding: 14px; display: flex; flex-direction: column; gap: 8px; }
.materia { display: flex; gap: 8px; align-items: center; }
.materia input[type="text"] { flex: 1 1 auto; }
.iupsur-del {
    border: 0; background: #f0f0f1; color: #b32d2e; cursor: pointer;
    width: 28px; height: 28px; border-radius: 4px; font-size: 18px; line-height: 1;
    flex: 0 0 auto;
}
.iupsur-del:hover { background: #f6e7e7; }
.cuatrimestre > .agregar_materia { margin: 0 14px 14px; }

/* Placeholder de arrastre */
.iupsur-drop {
    border: 2px dashed #2271b1; border-radius: 8px; background: #f0f6fc;
    height: 56px; margin: 0 0 16px;
}
CSS;

    wp_register_style( 'iupsur-carrera-admin', false );
    wp_enqueue_style( 'iupsur-carrera-admin' );
    wp_add_inline_style( 'iupsur-carrera-admin', $css );

    /* --------------------------------- JS -------------------------------- */
    $js = <<<'JS'
jQuery(function ($) {

    /* ---------------- Media uploader (campos de imagen) ---------------- */
    $(document).on('click', '.upload_image_button', function (e) {
        e.preventDefault();
        var $btn     = $(this);
        var $wrap    = $btn.closest('.iupsur-image-field');
        var $input   = $wrap.find('.iupsur-image-field__input');
        var $preview = $wrap.find('.iupsur-image-field__preview');
        var $remove  = $wrap.find('.iupsur-remove-image');

        var frame = wp.media({
            title: 'Seleccionar imagen',
            button: { text: 'Usar esta imagen' },
            multiple: false
        });

        frame.on('select', function () {
            var att = frame.state().get('selection').first().toJSON();
            $input.val(att.url);
            $preview.find('img').attr('src', att.url);
            $preview.show();
            $remove.show();
            $btn.text('Cambiar');
        });

        frame.open();
    });

    $(document).on('click', '.iupsur-remove-image', function () {
        var $wrap = $(this).closest('.iupsur-image-field');
        $wrap.find('.iupsur-image-field__input').val('');
        $wrap.find('.iupsur-image-field__preview').hide().find('img').attr('src', '');
        $wrap.find('.upload_image_button').text('Subir imagen');
        $(this).hide();
    });

    /* ======================= PLAN DE ESTUDIOS ======================= */
    var $planCont = $('#plan_estudios_container');

    function reindexPlan() {
        $planCont.find('.cuatrimestre').each(function (ci) {
            var $c = $(this);
            $c.find('.iupsur-cuatri-title').text('Cuatrimestre ' + (ci + 1));
            $c.find('input[name$="[numero]"]').attr('name', 'plan_estudios[' + ci + '][numero]');
            $c.find('.materias .materia input[type="text"]').each(function (mi) {
                $(this).attr('name', 'plan_estudios[' + ci + '][materias][' + mi + ']');
            });
        });
        $('#plan_estudios_empty').toggle($planCont.find('.cuatrimestre').length === 0);
    }

    function materiaTemplate() {
        return '<div class="materia">' +
            '<input type="text" placeholder="Nombre de la materia">' +
            '<button type="button" class="iupsur-del iupsur-del-materia" title="Eliminar materia" aria-label="Eliminar materia">&times;</button>' +
            '</div>';
    }

    function cuatrimestreTemplate() {
        return '<div class="cuatrimestre iupsur-card iupsur-repeat-item">' +
            '<div class="iupsur-card__head iupsur-handle-row">' +
                '<span class="iupsur-drag dashicons dashicons-menu" title="Arrastra para reordenar"></span>' +
                '<h4 class="iupsur-card__title iupsur-cuatri-title">Cuatrimestre</h4>' +
                '<label class="iupsur-inline-label">Etiqueta ' +
                    '<input type="text" name="plan_estudios[0][numero]" value="">' +
                '</label>' +
                '<button type="button" class="button-link-delete iupsur-del-cuatrimestre">Eliminar</button>' +
            '</div>' +
            '<div class="materias"></div>' +
            '<button type="button" class="button agregar_materia">+ Agregar materia</button>' +
        '</div>';
    }

    $('#agregar_cuatrimestre').on('click', function () {
        var $new = $(cuatrimestreTemplate());
        $planCont.append($new);
        $new.find('input[name$="[numero]"]').val($planCont.find('.cuatrimestre').length);
        reindexPlan();
    });

    $planCont.on('click', '.agregar_materia', function () {
        $(this).closest('.cuatrimestre').find('.materias').append(materiaTemplate());
        reindexPlan();
    });

    $planCont.on('click', '.iupsur-del-materia', function () {
        $(this).closest('.materia').remove();
        reindexPlan();
    });

    $planCont.on('click', '.iupsur-del-cuatrimestre', function () {
        if (!window.confirm('¿Eliminar este cuatrimestre y todas sus materias?')) { return; }
        $(this).closest('.cuatrimestre').remove();
        reindexPlan();
    });

    /* ======================= HERRAMIENTAS ======================= */
    var $herrCont = $('#herramientas_container');

    function reindexHerramientas() {
        $herrCont.find('.herramienta_item').each(function (i) {
            $(this).find('[name^="herramientas"]').each(function () {
                this.name = this.name.replace(/^herramientas\[\d+\]/, 'herramientas[' + i + ']');
            });
        });
        $('#herramientas_empty').toggle($herrCont.find('.herramienta_item').length === 0);
    }

    function herramientaTemplate() {
        return '<div class="herramienta_item iupsur-card iupsur-repeat-item">' +
            '<div class="iupsur-card__head iupsur-handle-row">' +
                '<span class="iupsur-drag dashicons dashicons-menu" title="Arrastra para reordenar"></span>' +
                '<h4 class="iupsur-card__title">Bloque de herramienta</h4>' +
                '<button type="button" class="button-link-delete iupsur-del-herramienta">Eliminar</button>' +
            '</div>' +
            '<div class="iupsur-card__body">' +
                '<div class="iupsur-grid iupsur-grid--2">' +
                    '<div class="iupsur-field">' +
                        '<label class="iupsur-label">Icono (Lucide)</label>' +
                        '<input type="text" name="herramientas[0][icono]" placeholder="Ej. chef-hat" class="widefat">' +
                        '<p class="iupsur-help">Nombres en <a href="https://lucide.dev/icons/" target="_blank" rel="noopener">lucide.dev</a></p>' +
                    '</div>' +
                    '<div class="iupsur-field">' +
                        '<label class="iupsur-label">Título</label>' +
                        '<input type="text" name="herramientas[0][titulo]" placeholder="Ej. Laboratorios Culinarios" class="widefat">' +
                    '</div>' +
                '</div>' +
                '<div class="iupsur-field">' +
                    '<label class="iupsur-label">Descripción</label>' +
                    '<textarea name="herramientas[0][descripcion]" rows="2" class="widefat"></textarea>' +
                '</div>' +
            '</div>' +
        '</div>';
    }

    $('#agregar_herramienta').on('click', function () {
        $herrCont.append(herramientaTemplate());
        reindexHerramientas();
    });

    $herrCont.on('click', '.iupsur-del-herramienta', function () {
        if (!window.confirm('¿Eliminar este bloque?')) { return; }
        $(this).closest('.herramienta_item').remove();
        reindexHerramientas();
    });

    /* Mantén el título de la tarjeta sincronizado con el campo "Título" */
    $herrCont.on('input', 'input[name$="[titulo]"]', function () {
        var v = $(this).val();
        $(this).closest('.herramienta_item').find('> .iupsur-card__head .iupsur-card__title')
            .text(v ? v : 'Bloque de herramienta');
    });

    /* ======================= Reordenar (drag & drop) ======================= */
    if ($.fn.sortable) {
        $planCont.sortable({
            items: '> .cuatrimestre',
            handle: '.iupsur-handle-row',
            placeholder: 'iupsur-drop',
            axis: 'y',
            forcePlaceholderSize: true,
            update: reindexPlan
        });
        $herrCont.sortable({
            items: '> .herramienta_item',
            handle: '.iupsur-handle-row',
            placeholder: 'iupsur-drop',
            axis: 'y',
            forcePlaceholderSize: true,
            update: reindexHerramientas
        });
    }

    /* Normaliza índices al cargar (corrige posibles duplicados antiguos) */
    reindexPlan();
    reindexHerramientas();
});
JS;

    wp_add_inline_script( 'jquery-ui-sortable', $js );
}
add_action( 'admin_enqueue_scripts', 'iupsur_carrera_admin_assets' );