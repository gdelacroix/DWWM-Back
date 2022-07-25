<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

if ( post_password_required() ) {
	/*
	 * If the current post is protected by a password and
	 * the visitor has not yet entered the password we will
	 * return early without loading the comments.
	 */
	return;
}
?>
<?php
	// You can start editing here -- including this comment!
if ( have_comments() ) :
	?>
<div id="comments" class="comments-area">


	<h2 class="comments-title">
		<?php
			$simple_podcast_comment_count = get_comments_number();
			printf( // WPCS: XSS OK.
				/* translators: 1: comment count number, 2: title. */
				esc_html( _nx( '%1$s comment', '%1$s comments', $simple_podcast_comment_count, 'comments title', 'simple-podcast' ) ),
				number_format_i18n( $simple_podcast_comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
		?>
	</h2><!-- .comments-title -->

	<ul class="comment-list">
		<?php
		wp_list_comments(
			array(
				'callback'    => 'simple_podcast_comment',
				'avatar_size' => 55,
			)
		);
		?>
	</ul>


	<?php if ( ! empty( get_query_var( 'cpage' ) ) ) : ?>
	<div class="comment_pagination">
		<?php
			paginate_comments_links(
				array(
					'mid_size'  => 2,
					'prev_text' => '<span class="previous">' . __( 'Prev', 'simple-podcast' ),
					'next_text' => '<span class="next">' . __( 'Next', 'simple-podcast' ),
				)
			);
		?>
	</div>
	<?php endif; ?>

	<?php

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( ! comments_open() ) :
		?>
	<p class="no-comment Simple-Podcast-notice"><?php esc_html_e( 'Comments are closed.', 'simple-podcast' ); ?></p>
		<?php
		endif;
	?>
</div><!-- #comments -->

	<?php
	endif; // Check for have_comments().
	comment_form(
		array(
			'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
			'title_reply_after'  => '</h2>',
		)
	);
?>
