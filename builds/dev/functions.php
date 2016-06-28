<?php
/**
 * JLDC Theme Functions and Definitions
 *
 * Set up the theme and provide functions to support the theme.
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

/**
 * Sets up the theme defaults and activates support for WordPress features. It
 * uses the after_setup_theme hook since the init hook is too late for certain
 * features to be activated
 *
 * @since JLDC 1.0
 */
function jldc_theme_setup() {
	/*
	 * Make theme available for translation.
	 *
	 * While not really neccessary because  there are no plans to submit this
	 * theme to the WordPress repository, it still is a good practice to make
	 * the theme translatable for future reference.
	 */
	load_theme_textdomain( 'jldc', get_stylesheet_directory() . '/_lang' );

	// Add default post and comment RSS feed links to the head element.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the <title> element dynamically instead of having
	 * a hard-coded one in the <head> element.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable Post Thumbnail support for pages and posts.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 800, 250, false );

	/**
	 *  Initializes two instances for wp_nav_menu()
	 */
	function jldc_register_menus() {
		register_nav_menus(
			array(
				'main-menu'     => __( 'Main Menu', 'jldc' ),
				'footer-menu'   => __( 'Footer Menu', 'jldc' ),
			)
		);
	}
	add_action( 'init', 'jldc_register_menus' );

	/*
	 * Set default markup for search form, comment form, and comments
	 * to be valid HTML5
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

} // End of jldc_setup()
add_action( 'after_setup_theme', 'jldc_theme_setup' );

/**
 * Removes the generator metatag for security purposes. This way site
 * visitors cannot see that the site is WordPress nor know its version
 *
 * @since JLDC Theme 1.0
 */
remove_action( 'wp_head', 'wp_generator' );

/**
 * Registers and enqueues all scripts and styles for the theme
 *
 * @since JLDC Theme 1.0
 */
function jldc_enqueues() {
	/* Register Theme Styles */
	wp_register_style( 'jldc-styles', get_stylesheet_uri(), '', '1.0.0', 'screen' );

	/* Enqueue Styles */
	wp_enqueue_style( 'jldc-styles' );

	/* Register Scripts */
	wp_register_script( 'jldc-header-script', get_stylesheet_directory_uri() . '/_js/jldc-header.js', array( 'jldc-typekit-core' ), null, false );
	wp_register_script( 'jldc-script', get_stylesheet_directory_uri() . '/_js/jldc-script.js', null, null, true );
	wp_register_script( 'jldc-typekit-core', 'https://use.typekit.net/yih1lcp.js', null, null, false );
	wp_register_script( 'jldc-font-awesome', 'https://use.fontawesome.com/72d4cadbab.js', '', '4.6.3', false );
	wp_register_script( 'jldc-isotope-core', 'https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js', null, null, true);
	wp_register_script( 'jldc-isotope-settings', get_stylesheet_directory_uri() . '/_js/jldc-isotope.js', array( 'jldc-isotope-core' ), null, true );

	/* Enqueue Scripts */
	wp_enqueue_script( 'jldc-header-script' );
	wp_enqueue_script( 'jldc-font-awesome' );

	/*
	 * Conditional Enqueues
	 */
	if ( is_post_type_archive( 'jetpack-portfolio' ) ) {
		wp_enqueue_script( 'jldc-isotope-settings' );
	}

	// Enqueue Comment Reply Script if is a singular.
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jldc_enqueues' );

/**
 * Changes the default "Read More" link generated by use of <!-- more --> inside a post
 * to display "Coninue Reading..." instead
 *
 * @return string
 * @since JLDC Theme 1.0
 */
function jldc_read_more_link() {
	return '<a class="more-link" href="' . get_permalink() . '">Continue Reading&#8230;</a>';
}
add_filter( 'jldc_read_more_link', 'modify_read_more_link' );

/**
 * Replaces "[...]" links to "Continue Reading..." when the_excerpt() is used
 *
 * @return string
 * @since JLDC Theme 1.0
 */
function jldc_excerpt_read_more() {
	global $post;
	return '<p><a class="more-link" href="' . get_permalink() . '">Read the Full Article&#8230;</a></p>';
}
add_filter( 'excerpt_more', 'jldc_excerpt_read_more' );
