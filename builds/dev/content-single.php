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
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail(); ?>
		<?php } ?>
		<h1 id="headline-<?php the_ID(); ?>" class="postHeadline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
		<h2 id="byline-<?php the_ID(); ?>" class="postByline">Written by <?php the_author(); ?></h2>
		<?php if ( get_the_modified_time() === get_the_time() ) : ?>
			<p>Posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time></p>
		<?php else : ?>
			<p>Originally posted on <time datetime="<?php the_time( 'c' ); ?>"><?php the_date( 'l, F jS, Y' ); ?> at <?php the_time( 'g:ia T' ); ?></time> <br>
			and was last updated on <time datetime="<?php the_modified_time( 'c' ); ?>"><?php the_modified_date( 'l, F jS, Y' ); ?> at <?php the_modified_time( 'g:ia T' ); ?></time> </p>
		<?php endif; ?>
		<p class="listCategories"><span class="screen-reader-text">Filed under</span><?php the_category( ' ' ); ?></p>
	</header>
	<div class="postBody">
		<?php the_content(); ?>
	</div>
	<footer class="postFooter">
		<p class="listTags"><span class="screen-reader-text">This post is </span>Tagged <?php the_tags( "\040" ); ?></p>
		<p class="copyright">Copyright &copy; <time datetime="<?php the_time( 'Y' ); ?>"><?php the_time( 'Y' ); ?></time> Jon Liebold. All Rights Reserved.</p>
	</footer>

	<?php comments_template(); ?>

</article>
