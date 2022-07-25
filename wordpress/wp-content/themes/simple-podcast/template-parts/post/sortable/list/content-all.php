<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Simple Podcast
 */

?>
<div class="col-md-8">
    <div class="column">

        <?php
	$simple_podcast_list2_sortables = simple_podcast_get_theme_option( 'blog_sortable_content_list2' );
foreach ( $simple_podcast_list2_sortables as $simple_podcast_list2_sortable ) {
	get_template_part( 'template-parts/post/sortable/list/' . $simple_podcast_list2_sortable );
}
?>
    </div>
</div>