<?php
/**
 * Helper functions.
 *
 * @package Simple Podcast
 */


/**
 *
 * Helper function for Contextual Control
 * Whether the static page is set to a front displays
 * https://developer.wordpress.org/reference/classes/wp_customize_control/active_callback/
 */
function simple_podcast_set_front_page() {
	if ( 'page' === get_option( 'show_on_front' ) ) {
		return true;
	}
}

/**
 *
 * Helper function for checking plugin status
 */
function simple_podcast_is_active_ssp() {
	// check for plugin using plugin name.
	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	if ( is_plugin_active( 'seriously-simple-podcasting/seriously-simple-podcasting.php' ) ) {
		return true;
	}
}


if ( ! function_exists( 'simple_podcast_header_page_title' ) ) :

	/**
	 * Display page title on header.
	 *
	 * @since 1.0.0
	 */
	function simple_podcast_header_page_title() {
		if ( is_front_page() ) :
			return;
		elseif ( is_home() || is_singular() ) :
			?>
<div class="page-content">
	<div class="container">
			<?php if ( is_single() ) : ?>
		<h1 class="header-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="header-title"><?php single_post_title(); ?></h1>
		<?php endif; ?>
			<?php
			if ( get_post_type() === 'post' && is_single() ) {
				?>
		<div class="entry-meta">
				<?php
				simple_podcast_posted_on();
				simple_podcast_posted_by();
				simple_podcast_entry_footer();
				?>

		</div>
				<?php
			}
			?>
	</div>
</div>
			<?php
		elseif ( is_archive() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title"><?php the_archive_title(); ?></h1>
	</div>
</div>
			<?php
		elseif ( is_search() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title">
			<?php /* translators: %s: search query. */ ?>
			<?php printf( esc_html__( 'Search Results for: %s', 'simple-podcast' ), get_search_query() ); ?></h1>
	</div>
</div>
			<?php
		elseif ( is_404() ) :
			?>
<div class="page-content">
	<div class="container">
		<h1 class="header-title">
			<?php /* translators: %s: search query. */ ?>
			<span><?php echo esc_html__( 'Oops!', 'simple-podcast' ); ?></span><?php echo esc_html__( ' That page can&#39;t be found.', 'simple-podcast' ); ?>
		</h1>

		<div class="error-404 not-found">
			<?php get_search_form(); ?>
		</div>
	</div>
</div>
			<?php
		endif;
	}

endif;

if ( ! function_exists( 'simple_podcast_get_theme_option' ) ) :

	/**
	 * Get theme option.
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function simple_podcast_get_theme_option( $key = '' ) {

		$default_options = simple_podcast_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array) get_theme_mod( 'simple-podcast_theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;
	}

endif;

