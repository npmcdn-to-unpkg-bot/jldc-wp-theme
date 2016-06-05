<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

get_header(); ?>

<main id="mainContent" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post();
			get_template_part( 'content', 'single' );
		endwhile; ?>
	<?php else :
		esc_html__( 'Sorry, no posts matched your criteria.', 'jldc' );
	endif; ?>
</main>
