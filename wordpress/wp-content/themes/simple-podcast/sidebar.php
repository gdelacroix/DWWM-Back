<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple Podcast
 */

if ( ! is_active_sidebar( 'sidebar-1' ) || simple_podcast_get_theme_option( 'sidebar_position' ) === 'none' ) {
	return;
}

if ( simple_podcast_get_theme_option( 'sidebar_position' ) === 'right' ) {
	$simple_podcast_sidebar_order = 'order-last';
} elseif ( simple_podcast_get_theme_option( 'sidebar_position' ) === 'left' ) {
	$simple_podcast_sidebar_order = 'order-first';
} else {
	$simple_podcast_sidebar_order = 'order-last';
}
?>

<aside id="sidebar" class="widget-area col-lg-4 <?php echo esc_attr( $simple_podcast_sidebar_order ); ?>" role="complementary">
	<div class="sidebar">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</aside>
