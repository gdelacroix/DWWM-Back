<?php
/**
 * Load files
 *
 * @package Simple Podcast
 */

/**
 * Load WordPress nav walker.
 */
require get_template_directory() . '/inc/class-simple-podcast-wp-bootstrap-navwalker.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


if ( ! class_exists( 'Kirki' ) ) {
	/**
	 * Kirki configs.
	 */
	require get_template_directory() . '/kirki/kirki.php';
}

/**
 * Kirki configs.
 */
require get_template_directory() . '/inc/kirki-config.php';

/**
 * Dynamic styles.
 */
require get_template_directory() . '/inc/customizer/defaults.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';


/**
 * Dynamic styles.
 */
require get_template_directory() . '/inc/dynamic-styles.php';

/**
 * Sanitize functions.
 */
require get_template_directory() . '/inc/sanitize.php';

/**
 * Sanitize functions.
 */
require get_template_directory() . '/inc/helpers.php';

/**
 * Include tgm required plaugins functionality.
 */
require get_template_directory() . '/inc/tgm-plugins/tgm-required-plugins.php';


/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
