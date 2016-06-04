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
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body>

<div id="wrapper">

	<header id="pageHeader" role="banner">
		<h1 id="masthead">
			<a href="<?php bloginfo( 'url' ); ?>">
				<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/_img/logoMasthead.svg" alt="<?php echo bloginfo( 'name' ); ?>">
			</a>
		</h1>
	</header>

	<nav id="siteNave" role="navigation">
		<?php
		wp_nav_menu( array(
			'theme_location'    => 'main-menu',
			'menu'              => 'Main Menu',
			'container'         => '',
			'menu_id'           => 'menuMain',
			'items_wrap'        => '<ul id="%1$s" class="%2$s" role="menubar">%3$s</ul>',
			'before'            => '',
			'after'             => '',
			'link_before'       => '<b>',
			'link_after'        => '</b>',
		) )
		?>
	</nav>

	<nav id="siteNav" role="navigation">
		<ul id="menuMain" role="menubar">
			<!-- To be replaced with a WP function to generate page list -->
			<li role="menuitem" class="menuItem">Home</li>
			<li role="menuitem" class="menuItem">About</li>
			<li role="menuitem" class="menuItem">Blog</li>
			<li role="menuitem" class="menuItem">Portfolio</li>
			<li role="menuitem" class="menuItem">Contact</li>
		</ul>

	</nav>
