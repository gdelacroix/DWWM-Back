<?php
/**
 * Template part for displaying Single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	the_post_thumbnail();
	?>

	<div class="content">

		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					/* translators: %s: Name of current post. Only visible to screen readers */
					esc_html__( 'Continue reading%s', 'simple-podcast' ),
					'<span class="screen-reader-text">' . get_the_title() . '</span>'
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'simple-podcast' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->



	</div><!-- .content -->
</article><!-- #post-<?php the_ID(); ?> -->
