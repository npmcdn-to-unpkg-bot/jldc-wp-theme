<?php

function jldc_enqueues() {
	// Register Theme Styles
	wp_register_style( 'jldc-styles', get_stylesheet_uri() ); // Main style

	// Enqueue Styles
	wp_enqueue_style( 'jldc-styles' );

	// Register Scripts
	wp_register_script( 'jldc-header-script', get_stylesheet_directory_uri() . '/_js/jldc-header.js', null, null, false );
	wp_register_script( 'jldc-script', get_stylesheet_directory_uri() . '/_js/jldc-script.js', null, null, true );
	wp_register_script( 'jldc-typekit-core', 'https://use.typekit.net/yih1lcp.js', null, null, false );

	// Enqueue Scripts
	wp_enqueue_script( 'jldc-typekit-core' );
	wp_enqueue_script( 'jldc-header-script' );
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
