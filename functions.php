<?php

function add_theme_scripts() {
    wp_enqueue_style( 'fa', "https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" );
    wp_enqueue_style( 'bootsrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" );
    wp_enqueue_style( 'remixicon', "https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" );
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_script( 'highlight', get_template_directory_uri() . '/vendor/highlightjs/highlight.js', array ( 'jquery' ), 1.1, false);
    wp_enqueue_script( 'reveal', get_template_directory_uri() . '/vendor/scrollreveal/app.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'style', get_template_directory_uri() . '/js/style.js', array ( 'jquery' ), 1.1, false   );
    wp_enqueue_script( 'hyphens1', get_template_directory_uri() . '/js/hyphenopoly.app.js', array ( 'jquery' ), 1.1, false);
    wp_enqueue_script( 'hyphens2', get_template_directory_uri() . '/vendor/hyphenopoly/Hyphenopoly_Loader.js', array ( 'jquery' ), 1.1, false);
}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );


function co2_customize_register( $wp_customize ){
    $wp_customize->add_section(
        'co2_lang_setting', 
        array(
            'title'    => __('Language Settings', 'co2'),
            'capability' => 'edit_theme_options',
            'description' => 'Change language settings here',
            'priority' => 120,
        )
    );
    $wp_customize->add_setting(
        'co2_lang_options[general]', 
        array(
            'default'        => 'de',
            'capability'     => 'edit_theme_options',
            'type'           => 'option',
        )
    );
    $wp_customize->add_control(
        'co2_lang_gen', 
        array(
            'label'      => __('Language picker', 'co2'),
            'section'    => 'co2_lang_setting',
            'settings'   => 'co2_lang_options[general]',
            'type'       => 'radio',
            'choices'    => array(
                'de' => 'Deutsch',
                'fr' => 'Français',
                'it' => 'Italiano',
            ),
        )
    );
}

add_action( 'customize_register', 'co2_customize_register' );



/* ACF REASON SUBFIELD TITLE */
add_filter('acf/fields/flexible_content/layout_title/name=reasons', 'my_acf_fields_flexible_content_layout_title', 10, 4);
function my_acf_fields_flexible_content_layout_title( $title, $field, $layout, $i ) {

    // Remove layout name from title.
    $title = '';

    // load text sub field
    if( $text = get_sub_field('r_title')) {
        $title .= '<b>' . esc_html($text) . '</b>';
    }
    return $title;
}

/* NAV MENU */
register_nav_menu( "main", "Top header");

/* ELEMENTS SHORTCODE */
function elements_shortcode($atts) {
$atts = shortcode_atts(
    array(
        'element' => 'NULL',
        'lang' => 'nolang'
    ), $atts, 'elements' );
    ob_start();
    get_template_part("partials/{$atts['lang']}/{$atts['element']}");
    return ob_get_clean();
}
add_shortcode('elements', 'elements_shortcode');

add_theme_support( 'title-tag' );