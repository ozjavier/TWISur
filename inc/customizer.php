<?php
/**
 * Personalizador: redes sociales + datos de contacto.
 */
function iup_customize_register( $wp_customize ) {

    /* ===== Banner Principal (Inicio) ===== */
    $wp_customize->add_section( 'iup_hero_banner', array(
        'title'       => __( 'Banner Principal (Inicio)', 'iupmodern' ),
        'description' => __( 'Configura el video y la imagen de carga (poster) del inicio.', 'iupmodern' ),
        'priority'    => 150, // Aparecerá antes de las Redes sociales
    ) );

    // URL del Video
    $wp_customize->add_setting( 'iup_hero_video_url', array(
        'default'           => '', 
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'iup_hero_video_url', array(
        'label'       => __( 'URL del Video (MP4)', 'iupmodern' ),
        'description' => __( 'Ingresa la ruta o URL directa al archivo .mp4', 'iupmodern' ),
        'section'     => 'iup_hero_banner',
        'type'        => 'url',
    ) );

    // Imagen Poster
    $wp_customize->add_setting( 'iup_hero_video_poster', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'iup_hero_video_poster', array(
        'label'    => __( 'Imagen Poster (Carga)', 'iupmodern' ),
        'section'  => 'iup_hero_banner',
        'settings' => 'iup_hero_video_poster',
    ) ) );

    /* ===== Redes sociales ===== */
    $wp_customize->add_section( 'iup_social', array(
        'title'       => __( 'Redes sociales', 'iupmodern' ),
        'description' => __( 'Pega la URL de cada red. Si dejas un campo vacío, esa red no se mostrará.', 'iupmodern' ),
        'priority'    => 160,
    ) );

    foreach ( iup_social_networks() as $key => $net ) {
        $wp_customize->add_setting( 'iup_social_' . $key, array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ) );
        $wp_customize->add_control( 'iup_social_' . $key, array(
            'label'   => $net['label'],
            'section' => 'iup_social',
            'type'    => 'url',
        ) );
    }

    /* ===== Contacto ===== */
    $wp_customize->add_section( 'iup_contact', array(
        'title'       => __( 'Contacto', 'iupmodern' ),
        'description' => __( 'Datos que se muestran en el footer. Deja vacío para ocultar.', 'iupmodern' ),
        'priority'    => 161,
    ) );

    // Dirección (acepta varias líneas)
    $wp_customize->add_setting( 'iup_contact_address', array(
        'default'           => 'Atlixco, Puebla, México.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'iup_contact_address', array(
        'label'   => __( 'Dirección', 'iupmodern' ),
        'section' => 'iup_contact',
        'type'    => 'textarea',
    ) );

    // Teléfono
    $wp_customize->add_setting( 'iup_contact_phone', array(
        'default'           => '+52 244 144 9783',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'iup_contact_phone', array(
        'label'   => __( 'Teléfono', 'iupmodern' ),
        'section' => 'iup_contact',
        'type'    => 'text',
    ) );

    // WhatsApp (número con código de país, ej. 522441449783)
    $wp_customize->add_setting( 'iup_contact_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'iup_contact_whatsapp', array(
        'label'       => __( 'WhatsApp (número con lada, ej. 522441449783)', 'iupmodern' ),
        'description' => __( 'Solo se usan los dígitos. Déjalo vacío para ocultar el botón.', 'iupmodern' ),
        'section'     => 'iup_contact',
        'type'        => 'text',
    ) );

    // Mensaje predefinido de WhatsApp (opcional)
    $wp_customize->add_setting( 'iup_contact_whatsapp_msg', array(
        'default'           => 'Hola, me gustaría recibir información.',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'iup_contact_whatsapp_msg', array(
        'label'   => __( 'Mensaje predefinido de WhatsApp', 'iupmodern' ),
        'section' => 'iup_contact',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'iup_customize_register' );