<?php
/**
 * The template for displaying all pages
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

get_header(); ?>

<main id="pageContent" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', 'page' );
		endwhile; ?>
	<?php else :
		esc_html__( 'Sorry, no posts matched your criteria.', 'jldc' );
	endif; ?>
</main>

<?php get_footer(); ?>
