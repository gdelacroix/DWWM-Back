<?php
/**
 * Template part for displaying content Posts page
 *
 * @package Simple Podcast
 */


if ( get_post_type() === 'post' ) {
	?>
	<div class="entry-meta">
	<?php simple_podcast_posted_on(); ?>
		<?php simple_podcast_posted_by(); ?>
	</div>
		<?php
}
?>
