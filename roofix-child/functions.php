<?php
add_action( 'wp_enqueue_scripts', 'roofix_child_styles', 18 );
function roofix_child_styles() {
	wp_enqueue_style( 'roofix-child-style', get_stylesheet_uri() );
}
add_action( 'after_setup_theme', 'roofix_child_theme_setup' );

function roofix_child_theme_setup() {
    load_child_theme_textdomain( 'roofix', get_stylesheet_directory() . '/languages' );

}
