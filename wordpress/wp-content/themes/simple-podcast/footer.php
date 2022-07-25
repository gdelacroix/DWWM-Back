<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Simple Podcast
 */

?>

</div><!-- #content -->


<footer id="footer" role="contentinfo">
	<?php if ( is_active_sidebar( 'simple-podcast_newsletter' ) ) : ?>
		<div class="newsletter-widgets">
			<div class="container">
				<?php dynamic_sidebar( 'simple-podcast_newsletter' ); ?>
			</div>
		</div>
	<?php endif; ?>
	<!-- End of div newsletter -->
	<div class="overlay"></div>
	<?php
	$active = array();
	for ( $i = 1; $i <= 4; $i++ ) {
		if ( is_active_sidebar( 'footer-' . $i ) ) {
			$active[] = $i;
		}
	}
	?>
	<?php if ( 0 !== count( $active ) ) { ?>
		<div class="widget-content-wrap">
			<div class="container">
				<div id="footer-widgets" class="row content">
					<?php foreach ( $active as $footer_widget_id ) : ?>
						<div class="col-lg-3 col-sm-6 column">
							<?php dynamic_sidebar( 'footer-' . $footer_widget_id ); ?>
						</div>
					<?php endforeach; ?>
				</div><!-- #footer-widgets -->

			</div><!-- .container -->
		</div><!-- ."widget-content-wrap -->
	<?php } ?>

	<div class="footer-copyright">
		<div class="container">
			<?php if ( simple_podcast_get_theme_option( 'footer_copyright' ) ) : ?>
			<div class="site-info">
				<?php
				/* translators: %s: copyright text*/
				$simple_podcast_footercopyright = sprintf( __( '%s', 'simple-podcast' ), simple_podcast_get_theme_option( 'footer_copyright' ) );
				echo wp_kses_post( $simple_podcast_footercopyright );
				?>
			</div><!-- .site-info -->
			<?php endif; ?>

			<?php
			if ( has_nav_menu( 'social' ) ) :
				wp_nav_menu(
					array(
						'theme_location' => 'social',
						'menu_id'        => 'social-menu',
						'menu_class'     => 'footer-social-nav',
					)
				);
			endif;
			?>
		</div>
	</div><!-- .footer-copyright -->
	<button class="up-btn btn-simple-podcast" id="up-btn" title="<?php echo esc_attr_e( 'Go to top', 'simple-podcast' ); ?>" style="display: block;"><span class="screen-reader-text"><?php echo esc_attr_e( 'to the top', 'simple-podcast' ); ?></span>&uarr;</button>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
