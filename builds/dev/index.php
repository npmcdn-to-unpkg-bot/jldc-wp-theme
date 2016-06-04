<?php
/**
 * The primary template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files. It is used to display a page
 * when nothing specific matches a query. It is also the final fallback
 * for any other page such as single, page, etc.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

get_header(); ?>
	
	<main id="mainContent" role="main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post();
				get_template_part( 'content', get_post_format() );
			endwhile; ?>
			<?php else :
				esc_html__( 'Sorry, no posts matched your criteria.', 'jldc' );
		endif; ?>
	
		<div class="nav_pagination">
			<?php
				the_posts_pagination( array(
					'type'              => 'list',
					'prev_test'         => __( 'Previous page', 'jldc' ),
					'next_text'         => __( 'Next page', 'jldc' ),
					'before_page_numer' => '<span class="screen-reader-text">' . __( 'Page', 'jldc' ) . '</span>',
				) );
			?>
		</div>
	</main>
	
<?php get_footer(); ?>
