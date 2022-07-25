<?php

/**
 * Template part for displaying main navigation top-bar
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Simple Podcast
 */

?>
	<nav class="navbar navbar-expand-lg main-navigation navbar-drop" role="navigation">
		<div class="container">
			<div class="site-branding">
				<?php if ( ! has_custom_logo() ) { ?>

					<?php if ( ( is_front_page() || is_home() ) && ! is_page() ) : ?>

				<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
						title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

				<?php else : ?>

				<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
					title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
					itemprop="url"><?php bloginfo( 'name' ); ?></a>

				<?php endif; ?>
				<span><?php echo esc_html( get_bloginfo( 'description', 'display' ) ); /* WPCS: xss ok. */ ?></span>

					<?php
				} else {
						if ( ( is_front_page() || is_home() ) && ! is_page() ) : ?>
							<h1 class="navbar-brand mb-0">
								<?php the_custom_logo(); ?>
							</h1>
						<?php else :
								the_custom_logo();
							endif;
				}
				?>
			</div>

			<button id="menu" class="navbar-toggler collapsed" type="button" data-toggle="collapse"
				data-target="#navbarmenus">
				<span class="screen-reader-text"><?php echo esc_html__( 'Menu', 'simple-podcast' ); ?></span>
				<span></span>
				<span></span>
				<span></span>
			</button>

			<?php
			if ( has_nav_menu( 'primary' ) ) :
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container'       => 'div',
						'container_id'    => 'navbarmenus',
						'container_class' => 'collapse navbar-collapse justify-content-end',
						'menu_id'         => false,
						'depth'           => 8,
						'menu_class'      => 'navbar-nav',
						'fallback_cb'     => 'simple_podcast_WP_Bootstrap_Navwalker::fallback',
					)
				);
			endif;
			?>
		</div>
	</nav>
