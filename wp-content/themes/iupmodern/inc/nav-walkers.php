<?php
/**
 * Walkers de navegación compatibles con los menús de WordPress.
 * Reproducen los estilos Tailwind ya usados en el tema.
 */

/* ============================================================
 * DESKTOP: links planos + dropdowns en hover (group-hover)
 * ============================================================ */
class IUP_Desktop_Walker extends Walker_Nav_Menu {

    // Abre un submenú (panel flotante)
    function start_lvl( &$output, $depth = 0, $args = null ) {
        $pos = ( $depth === 0 ) ? 'left-0 top-full pt-3' : 'left-full top-0 pl-2';
        $vis = ( $depth === 0 )
            ? 'invisible opacity-0 translate-y-1 group-hover:visible group-hover:opacity-100 group-hover:translate-y-0'
            : 'invisible opacity-0 group-hover/sub:visible group-hover/sub:opacity-100';

        $output .= '<div class="absolute ' . $pos . ' min-w-[14rem] z-50 ' . $vis . ' transition-all duration-200">';
        $output .= '<ul class="bg-up-blue-dark/95 backdrop-blur-md border border-up-green/30 rounded-xl shadow-2xl p-2 space-y-0.5">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul></div>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', (array) $item->classes, true );
        $is_current   = in_array( 'current-menu-item', (array) $item->classes, true )
                     || in_array( 'current-menu-ancestor', (array) $item->classes, true );
        $url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $title = esc_html( $item->title );

        if ( $depth === 0 ) {
            $output  .= '<li class="relative group">';
            $color    = $is_current ? 'text-up-green' : 'text-white hover:text-up-green';
            $a_class  = 'text-lg ' . $color . ' transition-colors flex items-center gap-1';
            $icon     = 'chevron-down';
        } else {
            $output  .= '<li class="relative ' . ( $has_children ? 'group/sub' : '' ) . '">';
            $a_class  = 'flex items-center justify-between gap-2 px-3 py-2 rounded-lg text-sm font-medium text-slate-200 hover:text-up-green hover:bg-white/5 transition-colors';
            $icon     = 'chevron-right';
        }

        $output .= '<a href="' . $url . '" class="' . $a_class . '"><span>' . $title . '</span>';
        if ( $has_children ) {
            $output .= '<i data-lucide="' . $icon . '" class="w-4 h-4 text-up-green" stroke-width="2"></i>';
        }
        $output .= '</a>';
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

/* ============================================================
 * MÓVIL: acordeón con .submenu-toggle / .submenu / .submenu-inner
 * (markup idéntico al que ya espera tu JS en header.php)
 * ============================================================ */
class IUP_Mobile_Walker extends Walker_Nav_Menu {

    function start_lvl( &$output, $depth = 0, $args = null ) {
        $space = ( $depth === 0 ) ? 'space-y-1' : 'space-y-0.5';
        $output .= '<div class="submenu"><div class="submenu-inner">';
        $output .= '<ul class="ml-3 my-1 pl-3 border-l border-white/10 ' . $space . '">';
    }

    function end_lvl( &$output, $depth = 0, $args = null ) {
        $output .= '</ul></div></div>';
    }

    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $has_children = in_array( 'menu-item-has-children', (array) $item->classes, true );
        $url   = ! empty( $item->url ) ? esc_url( $item->url ) : '#';
        $title = esc_html( $item->title );
        $color = ( $depth === 0 ) ? 'text-white' : 'text-slate-200';

        $output .= '<li>';

        if ( $has_children ) {
            if ( $depth === 0 ) {
                $btn = 'text-lg font-bold px-3 py-3'; $chev = 'w-5 h-5';
            } elseif ( $depth === 1 ) {
                $btn = 'text-base font-semibold px-3 py-2.5'; $chev = 'w-4 h-4';
            } else {
                $btn = 'text-sm px-3 py-2'; $chev = 'w-4 h-4';
            }
            $output .= '<button type="button" class="submenu-toggle w-full flex items-center justify-between ' . $btn . ' ' . $color . ' hover:text-up-green rounded-lg hover:bg-white/5 transition-colors" aria-expanded="false">';
            $output .= '<span>' . $title . '</span>';
            $output .= '<i data-lucide="chevron-down" class="submenu-chevron ' . $chev . ' text-up-green" stroke-width="2"></i>';
            $output .= '</button>';
        } else {
            if ( $depth === 0 ) {
                $a = 'text-lg font-bold px-3 py-3';
            } elseif ( $depth === 1 ) {
                $a = 'text-base font-medium px-3 py-2.5';
            } else {
                $a = 'text-sm px-3 py-2';
            }
            $output .= '<a href="' . $url . '" class="block ' . $a . ' ' . $color . ' hover:text-up-green rounded-lg hover:bg-white/5 transition-colors">' . $title . '</a>';
        }
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}