<?php
/**
 * The template for displaying search forms
 *
 * @package Simple Podcast
 */

?>

<!-- Search Form Widget -->
<div class="simple-podcast-search">
	<h2 class="form-title"><?php esc_html_e( 'Search ', 'simple-podcast' ); ?></h2>
	<div class="content">
		<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
			<div class="input-group">
				<label for='search' class='screen-reader-text'><?php _e( 'Search', 'simple-podcast' ); ?></label> 
				<input class="field form-control" id="s" name="s" type="text"
					placeholder="<?php esc_attr_e( 'Search &hellip;', 'simple-podcast' ); ?>"
					value="<?php the_search_query(); ?>">
				<span class="input-group-append">
					<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
						value="<?php esc_attr_e( 'Search', 'simple-podcast' ); ?>">
				</span>
			</div>
		</form>
	</div>
</div>
