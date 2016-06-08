<?php
/**
 * The template for displaying single posts
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> role="article" aria-labelledby="headline-<?php the_ID(); ?>">
	<header class="pageHeader">
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail(); ?>
		<?php } ?>
		<h1 id="headline-<?php the_ID(); ?>" class="pageHeadline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
	</header>
	<div class="pageBody">
		<?php the_content(); ?>
	</div>
	<footer class="pageFooter">
		<p class="copyright">Copyright &copy; <time datetime="<?php the_time( 'Y' ); ?>"><?php the_time( 'Y' ); ?></time> Jon Liebold. All Rights Reserved.</p>
	</footer>

	<?php comments_template(); ?>

</article>
