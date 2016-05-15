<!doctype html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body>

<header id="pageHeader" role="banner">
	<h1 id="masthead">
		<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/_img/logoMasthead.svg" alt="<?php echo bloginfo( 'name' ); ?>">
	</h1>
</header>

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

<main role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="blogPost">
				<header class="postHeader">
					<h2><?php the_title(); ?></h2>
					<?php if ( get_the_modified_time() === get_the_time() ) : ?>
						<p>Posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time></p>
					<?php else : ?>
						<p>Originally posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time></p>
					<?php endif; ?>
				</header>
				<div class="postBody">
					<?php the_excerpt(); ?>
				</div>
				<footer class="postFooter">

				</footer>
			</article>
		<?php endwhile; ?>
		<?php else :
			esc_html__( 'Sorry, no posts matched your criteria.', 'jldc' );
	endif; ?>
</main>

<footer id="pageFooter" role="contentinfo">
	<!-- Footer Stuff will go here. Thinking Menu -->
</footer>

<?php wp_footer(); ?>
</body>
</html>
