<?php

// Remove Generator Tag for Security Purposes
remove_action( 'wp_head', 'wp_generator' );

function jldc_enqueues() {
	// Register Theme Styles
	wp_register_style( 'jldc-styles', get_stylesheet_uri(), '', '1.0.0', 'screen' ); // Main style

	// Enqueue Styles
	wp_enqueue_style( 'jldc-styles' );

	// Register Scripts
	wp_register_script( 'jldc-header-script', get_stylesheet_directory_uri() . '/_js/jldc-header.js', array( 'jldc-typekit-core' ), null, false );
	wp_register_script( 'jldc-script', get_stylesheet_directory_uri() . '/_js/jldc-script.js', null, null, true );
	wp_register_script( 'jldc-typekit-core', 'https://use.typekit.net/yih1lcp.js', null, null, false );
	wp_register_script( 'jldc-font-awesome', 'https://use.fontawesome.com/72d4cadbab.js', '', '4.6.3', false );

	// Enqueue Scripts
	wp_enqueue_script( 'jldc-header-script' );
	wp_enqueue_script( 'jldc-font-awesome' );
}

add_action( 'wp_enqueue_scripts', 'jldc_enqueues' );

function jldc_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Continue Reading&#8230;</a>';
}
add_filter( 'jldc_read_more_link', 'modify_read_more_link' );

function jldc_excerpt_read_more() {
	global $post;
	return '<p><a class="more-link" href="' . get_permalink() . '">Read the Full Article&#8230;</a></p>';
}

add_filter( 'excerpt_more', 'jldc_excerpt_read_more' );

function jldc_register_menus() {
	register_nav_menus(
		array(
			'main-menu'     => __( 'Main Menu' ),
			'footer-menu'   => __( 'Footer Menu' ),
		)
	);
}
add_action( 'init', 'jldc_register_menus' );
