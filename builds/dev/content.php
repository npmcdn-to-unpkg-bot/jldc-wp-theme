<?php
/**
 * The default template for displaying content
 *
 * Use for index/archive/search pages.
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article" aria-labelledby="headline-<?php the_ID(); ?>">
	<header class="postHeader">
		<h2 id="headline-<?php the_ID(); ?>" class="postHeadline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
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

<?php if ( ($wp_query->current_post + 1) < ($wp_query->post_count) ) : ?>
	<hr> <!-- Placeholder -->
<?php endif; ?>
