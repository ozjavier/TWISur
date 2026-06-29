<?php
function iupmodern_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    register_nav_menus(array(
        'primary' => __('Menú principal', 'iupmodern'),
        'footer'  => __('Menú footer', 'iupmodern'),
    ));
}
add_action('after_setup_theme', 'iupmodern_theme_setup');