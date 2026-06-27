<?php
function iupmodern_enqueue_assets() {
    $theme = wp_get_theme();

    wp_enqueue_style(
        'iupmodern-style',
        get_theme_file_uri('/assets/css/app.css'),
        array(),
        $theme->get('Version')
    );

    // Blaze Slider — CSS
    wp_enqueue_style(
        'blaze-slider',
        'https://unpkg.com/blaze-slider@1.9.3/dist/blaze.css',
        array(),
        '1.9.3'
    );

    wp_enqueue_script(
        'iupmodern-script',
        get_theme_file_uri('/assets/js/app.js'),
        array(),
        $theme->get('Version'),
        true
    );

    // Blaze Slider — JS (expone el global BlazeSlider)
    wp_enqueue_script(
        'blaze-slider',
        'https://unpkg.com/blaze-slider@1.9.3/dist/blaze-slider.min.js',
        array(),
        '1.9.3',
        true
    );


    wp_enqueue_script(
        'lucide-icons',
        'https://unpkg.com/lucide@latest/dist/umd/lucide.min.js',
        array(),
        $theme->get('Version'),
        true
    );

    wp_add_inline_script('lucide-icons', 'lucide.createIcons();');
}
add_action('wp_enqueue_scripts', 'iupmodern_enqueue_assets');