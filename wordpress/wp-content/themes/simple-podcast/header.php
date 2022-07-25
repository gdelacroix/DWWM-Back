<?php

/**
 * The site header
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple Podcast
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="top-header" class="site-header" role="banner">
			<div class="header-wrap">
				<?php if ( simple_podcast_get_theme_option( 'skip_to_content_toggle' ) ) : ?>
				<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'To the content', 'simple-podcast' ); ?></a>
				<?php endif; ?>

				<?php
				if ( simple_podcast_get_theme_option( 'menubar_mode' ) === 'alt' ) {
					// alternative navigation bar:
					// left: logo, main menu - right: search form or something.
					get_template_part( 'template-parts/navigation/main-navbar', 'alt' );
				} else {
					// standard navigation bar:
					// left: logo - right: main menu.
					get_template_part( 'template-parts/navigation/main-navbar' );
				}

				//header page title.
				simple_podcast_header_page_title();
				?>
				<?php
				if ( is_front_page() && ! is_home() && get_theme_mod( 'banner_toggle' ) ) {
					// head banner on the front page if it enabled.
					get_template_part( 'template-parts/jumbotron' );
				}
				?>

			</div>

		</header><!-- #masthead -->

		<div id="content" class="content-wrap">
