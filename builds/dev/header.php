<?php

/**
 * This is the template file to display the header for the theme.
 *
 * Contains all of the head elements and everything in the body up to the main element.
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */
?>

<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="wrapper">
	<header id="pageHeader" role="banner">
		<?php if ( is_singular() && ! is_front_page() ) : ?>
			<h6 id="masthead">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/_img/logoMasthead.svg" alt="<?php echo bloginfo( 'name' ); ?>">
				</a>
			</h6>
		<?php else : ?>
			<h1 id="masthead">
				<a href="<?php echo esc_url( home_url() ); ?>">
					<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/_img/logoMasthead.svg" alt="<?php echo bloginfo( 'name' ); ?>">
				</a>
			</h1>
		<?php endif; ?>

	</header>

	<nav id="siteNav" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'main-menu',
			'menu'              => 'Main Menu',
			'container'         => '',
			'menu_id'           => 'menuMain',
			'items_wrap'        => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
			'walker'            => new Walker_ARIA_Nav_Menu(),
		) )
		?>
	</nav>
