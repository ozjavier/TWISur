<?php
/**
 * Redes sociales del tema: definición + renderizado.
 */

function iup_social_networks() {
    return array(
        'facebook' => array(
            'label' => 'Facebook',
            'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
        ),
        'instagram' => array(
            'label' => 'Instagram',
            'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>',
        ),
        'tiktok' => array(
            'label' => 'TikTok',
            'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V8.69a8.18 8.18 0 0 0 4.78 1.52V6.74a4.85 4.85 0 0 1-1.01-.05z"/></svg>',
        ),
        'x' => array(
            'label' => 'X (Twitter)',
            'svg'   => '<svg xmlns="http://www.w3.org/2000/svg" class="%s" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.737-8.835L2.25 2.25h6.988l4.265 5.638 4.741-5.638Zm-1.161 17.52h1.833L7.084 4.126H5.117L17.083 19.77Z"/></svg>',
        ),
    );
}

/**
 * Renderiza los enlaces sociales que tengan URL en el Personalizador.
 * Omite los que estén vacíos. Las clases son configurables para reutilizar
 * en header, footer, etc.
 */
function iup_render_social_links( $args = array() ) {
    $args = wp_parse_args( $args, array(
        'wrapper'       => true,
        'wrapper_class' => 'hidden lg:flex items-center space-x-4',
        'link_class'    => 'text-white hover:text-up-green transition-colors',
        'icon_class'    => 'w-5 h-5',
    ) );

    $items = '';
    foreach ( iup_social_networks() as $key => $net ) {
        $url = get_theme_mod( 'iup_social_' . $key, '' );
        if ( empty( $url ) ) {
            continue;
        }
        $items .= sprintf(
            '<a href="%1$s" aria-label="%2$s" target="_blank" rel="noopener noreferrer" class="%3$s">%4$s</a>',
            esc_url( $url ),
            esc_attr( $net['label'] ),
            esc_attr( $args['link_class'] ),
            sprintf( $net['svg'], esc_attr( $args['icon_class'] ) )
        );
    }

    if ( '' === $items ) {
        return;
    }

    if ( $args['wrapper'] ) {
        printf( '<div class="%s">%s</div>', esc_attr( $args['wrapper_class'] ), $items );
    } else {
        echo $items;
    }
}