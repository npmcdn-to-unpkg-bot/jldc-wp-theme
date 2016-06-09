<?php
/**
 * This is the template for comments
 *
 * @package WordPress
 * @subpackage JLDC_Theme
 * @since JLDC Theme 1.0
 */

?>

<section id="postComments" aria-labelledby="headerComments-<?php the_ID(); ?>">
	<?php if ( have_comments() ) : ?>
		<h3 id="headerComments-<?php the_ID(); ?>">
			<?php
				$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
					printf( esc_html_x( '1 Comment on &ldquo;%s&rdquo;', 'Comments Title', 'jldc' ), get_the_title() );
			} else {
					printf(
						esc_html(
							_nx(
								'%1$s Comment on &ldquo;%2$s&rdquo;',
								'%1$s Comments on &ldquo;%2$s&rdquo;',
								$comment_count,
								'Comments Title',
								'jldc'
							),
							number_format_i18n( $comment_count ),
							get_the_title()
						)
					);
			}
			?>
		</h3>

		<?php the_comments_navigation(); ?>

		<ol class="listComments">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 42,
				) );
			?>
		</ol>

		<?php the_comments_navigation(); ?>
	<?php endif; ?>

	<?php
		comment_form( array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		) );
	?>
</section>
