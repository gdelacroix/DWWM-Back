<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-wrap">
		<?php
		$simple_podcast_standard_sortables = simple_podcast_get_theme_option( 'blog_sortable_content_sandard' );
		foreach ( $simple_podcast_standard_sortables as $simple_podcast_standard_sortable ) {
			get_template_part( 'template-parts/post/sortable/standard/' . $simple_podcast_standard_sortable );
		}
		?>
	</div>

	<?php if ( get_post_type() === 'post' ) { ?>

	<footer class="entry-footer card-footer">
		<?php simple_podcast_entry_footer(); ?>
	</footer>


		<?php
	}
	?>

</article><!-- #post-<?php the_ID(); ?> -->
