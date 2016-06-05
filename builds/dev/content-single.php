<?php
/**
 * The template for displaying single posts
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" aria-labelledby="headline-<?php the_ID(); ?>">
	<header class="postHeader">
		<h1 id="headline-<?php the_ID(); ?>" class="postHeadline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<?php if ( get_the_modified_time() === get_the_time() ) : ?>
			<p>Posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time></p>
		<?php else : ?>
			<p>Originally posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time> <br>
			and was last updated on <time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_date( 'l, F jS, Y' ); ?> at <?php the_modified_time( 'g:ia T' ); ?></time> </p>
		<?php endif; ?>
	</header>
	<div class="postBody">
		<?php the_content(); ?>
	</div>
	<footer class="postFooter">
		<p class="copyright">Copyright &copy; <time datetime="<?php the_time( 'Y' ); ?>"><?php the_time( 'Y' ); ?></time> Jon Liebold. All Rights Reserved.</p>
	</footer>
</article>
