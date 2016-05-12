<?php

function jldc_enqueues() {
    // Register Theme Styles
    wp_register_style('jldc-styles', get_stylesheet_uri()); // Main style
    
    // Enqueue Styles
    wp_enqueue_style( 'jldc-styles' );
    
    // Register Scripts

    // Enqueue Scripts
    
    
}
add_action( 'wp_enqueue_scripts', 'jldc_enqueues' );