<?php
/**
 *
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Simple Podcast
 */

get_header();

?>

<?php if ( simple_podcast_is_active_ssp() ) : ?>
	<?php
	// WP_Query arguments
	$args = array(
		'post_type'           => array( 'podcast' ),
		'post_status'         => array( 'publish' ),
		'posts_per_page'      => '4',
		'ignore_sticky_posts' => true,
		'order'               => 'DESC',
		'orderby'             => 'date',
	);

	// The Query
	$simple_podcast_podcasts = new WP_Query( $args );
	if ( $simple_podcast_podcasts->have_posts() ) :
		?>
<section class="latest-episode">
	<div class="container">
		<?php if ( get_theme_mod( 'episode_section_title' ) ) : ?>
		<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'episode_section_title' ) ); ?></h2>
		<?php endif; ?>
		<div class="action to-right-align">
			<button class="active view-grid">
				<span class="screen-reader-text"><?php echo esc_html__( 'grid view', 'simple-podcast' ); ?></span>
				<i class="fas fa-th-large"></i>
			</button>
			<button class="view-list">
				<span class="screen-reader-text"><?php echo esc_html__( 'list view', 'simple-podcast' ); ?></span>
				<i class="fas fa-th-list"></i>
			</button>
		</div>

		<div class="episode-grid show-grid">
			<div class="grid-wrap row">
				<?php
				while ( $simple_podcast_podcasts->have_posts() ) :
					$simple_podcast_podcasts->the_post();
					?>
				<div class="column-grid col-sm-6">
					<?php if ( has_post_thumbnail() ) : ?>
					<figure>
						<?php the_post_thumbnail(); ?>
					</figure>
					<?php endif; ?>

					<div class="grid-content">
						<?php the_title( sprintf( '<h2 class="episode-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<div class="episode-meta">
							<?php simple_podcast_posted_on(); ?>
							<?php simple_podcast_posted_by(); ?>

							<?php
							$simple_podcast_terms = get_the_term_list( $post->ID, 'series', '', ', ' );
							if ( $simple_podcast_terms ) :
								?>
						<span class="episode-category">
								<?php echo wp_kses_post( $simple_podcast_terms ); ?>
							</span>
							<?php endif; ?>

							<?php
							$simple_podcast_duration = get_post_meta( get_the_id(), 'duration', true );
							if ( $simple_podcast_duration ) :
								?>
						<span class="duration">
								<?php
								echo esc_html( $simple_podcast_duration );
								?>
							</span>
							<?php endif; ?>
						</div>

						<div class="episode-summary">
							<?php simple_podcast_entry_summary(); ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
			<?php if ( get_theme_mod( 'episode_section_button_link' ) || get_theme_mod( 'episode_section_button_label' ) ) : ?>
				<a href="<?php echo esc_url( get_theme_mod( 'episode_section_button_link' ) ); ?>" class="more-link-btn btn-simple-podcast"><?php echo esc_html( get_theme_mod( 'episode_section_button_label' ) ); ?></a>
			<?php endif; ?>
		</div>

		<div class="episode-list">
			<?php
			while ( $simple_podcast_podcasts->have_posts() ) :
				$simple_podcast_podcasts->the_post();
				?>
			<div class="list-wrap">
				<?php if ( has_post_thumbnail() ) : ?>
				<figure class="column m-0">
					<?php the_post_thumbnail(); ?>
				</figure>
				<?php endif; ?>

				<div class="column list-content">
				<?php the_title( sprintf( '<h2 class="episode-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
					<div class="episode-meta">
						<?php simple_podcast_posted_on(); ?>
						<?php simple_podcast_posted_by(); ?>

						<?php
							$simple_podcast_terms = get_the_term_list( $post->ID, 'series', '', ', ' );
						if ( $simple_podcast_terms ) :
							?>
						<span class="episode-category">
							<?php echo wp_kses_post( $simple_podcast_terms ); ?>
							</span>
							<?php endif; ?>

							<?php
							$simple_podcast_duration = get_post_meta( get_the_id(), 'duration', true );
							if ( $simple_podcast_duration ) :
								?>
						<span class="duration">
								<?php
								echo esc_html( $simple_podcast_duration );
								?>
							</span>
							<?php endif; ?>
					</div>

					<div class="episode-summary">
						<?php simple_podcast_entry_summary(); ?>
					</div>
				</div>
			</div>
			<?php endwhile; ?>

		<?php if ( get_theme_mod( 'episode_section_button_link' ) || get_theme_mod( 'episode_section_button_label' ) ) : ?>
			<a href="<?php echo esc_url( get_theme_mod( 'episode_section_button_link' ) ); ?>" class="more-link-btn btn-simple-podcast"><?php echo esc_html( get_theme_mod( 'episode_section_button_label' ) ); ?></a>
		<?php endif; ?>
		</div>
	</div>
</section>
<?php endif; ?>
	<?php wp_reset_postdata(); ?>
<?php endif; ?>

<section class="featured-guest">
<?php
	$simple_podcast_users = get_users(
		array(
			'orderby'      => 'user_registered',
			'order'        => 'DESC',
			'role__not_in' => array( 'administrator' ),

		)
	);
	?>
	<div class="container">
	<?php if ( get_theme_mod( 'users_section_title' ) ) : ?>
		<h2 class="section-heading"><?php echo esc_html( get_theme_mod( 'users_section_title' ) ); ?></h2>
		<?php endif; ?>
		<div class="row featured-guest-row">
		<?php foreach ( $simple_podcast_users as $simple_podcast_user ) : ?>
			<?php
			$simple_podcast_user_meta  = get_user_meta( $simple_podcast_user->ID );
			$simple_podcast_user_roles = $simple_podcast_user->roles;
			?>
			<div class="col-lg-3 col-md-6">
				<div class="column">
					<figure>
						<img src="<?php echo esc_url( get_avatar_url( $simple_podcast_user->ID ) ); ?>" alt="<?php echo esc_url( get_avatar_url( $simple_podcast_user->ID ) ); ?>" />
					</figure>
					<span class="guest-name"><?php echo esc_html( $simple_podcast_user->display_name ); ?></span>
					<?php foreach ( $simple_podcast_user_roles as $posmandu_user_role ) : ?>
					<span class="guest-post"><?php echo esc_html( $posmandu_user_role ); ?></span>
					<?php endforeach; ?>
					<p class="guest-content"><?php echo esc_html( $simple_podcast_user_meta['description'][0] ); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
			</div>
	</div>
</section>

<?php

get_footer();
