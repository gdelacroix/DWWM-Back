<?php
/**
 * Template part for displaying posts preview on the Posts page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'list-view' ); ?>>
	<div class="row">
	<?php
		$simple_podcast_list_sortables = simple_podcast_get_theme_option( 'blog_sortable_content_list' );
	foreach ( $simple_podcast_list_sortables as $simple_podcast_list_sortable ) {
			get_template_part( 'template-parts/post/sortable/list/' . $simple_podcast_list_sortable );
	}
	?>


	</div>
</article><!-- #post-<?php the_ID(); ?> -->
