<?php
/**
 * Simple Podcast Theme Customizer
 *
 * @param WP_Customize_Manager $wp_customize the Customizer object.
 *
 * @package Simple Podcast
 */

/**
 * Register different customizer features.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function simple_podcast_customize_register( $wp_customize ) {

	/**
	 *
	 * Add postMessage support for site title and description for the Theme Customizer.
	 */
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.navbar-brand',
				'render_callback' => 'simple_podcast_customize_partial_blogname',
			)
		);
	}

	// END Options.
}
add_action( 'customize_register', 'simple_podcast_customize_register' );



/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function simple_podcast_customize_preview_js() {
	wp_enqueue_script( 'simple-podcast-customizer', get_template_directory_uri() . '/js/customizer.min.js', array( 'customize-preview' ), '25032018', true );
}
add_action( 'customize_preview_init', 'simple_podcast_customize_preview_js' );


function simple_podcast_post_page_setting_js() {
	wp_enqueue_script( 'simple-podcast-post-page-setting-js', get_template_directory_uri() . '/assets/admin/customizer/js/post-page-setting.min.js', array( 'customize-controls' ), wp_get_theme()->get( 'Version' ), true );
}
add_action( 'customize_controls_enqueue_scripts', 'simple_podcast_post_page_setting_js' );

function simple_podcast_kirki_multicheck_css() {
	wp_enqueue_style( 'simple-podcast-multickeck', get_template_directory_uri() . '/assets/admin/customizer/css/kirki-multicheck.min.css', array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'customize_controls_print_styles', 'simple_podcast_kirki_multicheck_css' );



/**
 *
 * Add Panel Typography Settings
 */
Kirki::add_panel(
	'typography_options',
	array(
		'priority' => 190,
		'title'    => esc_html__( 'Typography', 'simple-podcast' ),
	)
);

/**
* Typography general section.
*/
require get_template_directory() . '/inc/customizer/sections/typography-general-section.php';

/**
* Typography headings section.
*/
require get_template_directory() . '/inc/customizer/sections/typography-headings-section.php';

/**
* Typography slider and banner section.
*/
require get_template_directory() . '/inc/customizer/sections/typography-slider-banner.php';


/**
* Header slider section.
*/
require get_template_directory() . '/inc/customizer/sections/header-background.php';

/**
 *
 * Add Panel Front page Settings
 */
Kirki::add_panel(
	'front_page_options',
	array(
		'title' => esc_html__( 'Front Page Settings', 'simple-podcast' ),
	)
);
/**
* Front page sections.
*/
require get_template_directory() . '/inc/customizer/sections/front-page/episode-section.php';
require get_template_directory() . '/inc/customizer/sections/front-page/users-section.php';

/**
* Additional color settings.
*/
require get_template_directory() . '/inc/customizer/colors.php';

/**
* General settings section.
*/
require get_template_directory() . '/inc/customizer/sections/general-settings-section.php';

/**
* Header banner section.
*/
require get_template_directory() . '/inc/customizer/sections/head-banner-section.php';

/**
* Post page section.
*/
require get_template_directory() . '/inc/customizer/sections/post-page-section.php';

/**
* Footer section.
*/
require get_template_directory() . '/inc/customizer/sections/footer-settings-section.php';


