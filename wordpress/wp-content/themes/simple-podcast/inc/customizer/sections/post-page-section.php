<?php
/**
 * Post page settings section.
 *
 * @package Simple Podcast
 */

$defaults = simple_podcast_get_default_theme_options();
/**
 *
 * Add Section
 */
Kirki::add_section(
	'blog_options',
	array(
		'title'    => __( 'Posts Page Settings', 'simple-podcast' ),
		'priority' => 170,
	)
);

// Settings.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'blog_pagination_mode',
		'label'    => esc_html__( 'Posts page navigation', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => 'numeric',
		'choices'  => array(
			'standard' => get_template_directory_uri() . '/assets/images/standard-pagination.png',
			'numeric'  => get_template_directory_uri() . '/assets/images/numeric-pagination.png',
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'        => 'text',
		'settings'    => 'more_link',
		'label'       => __( 'Read More button', 'simple-podcast' ),
		'description' => __( 'Enter the button name which is a link to the full post. You can leave this blank if you want to hide the button.', 'simple-podcast' ),
		'section'     => 'blog_options',
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'        => 'select',
		'settings'    => 'post_dropdown_setting',
		'label'       => esc_html__( 'Featured Post', 'simple-podcast' ),
		'section'     => 'blog_options',
		'placeholder' => esc_html__( 'Select post...', 'simple-podcast' ),
		'choices'     => Kirki_Helper::get_posts( array( 'post_type' => 'post' ) ),
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_blur',
		'label'    => esc_html__( 'Post Box Shadow Blur(px)', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post,article.page, article.podcast',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px $px shadow_spreadpx shadow_color',
				'pattern_replace' => array(
					'shadow_spread' => 'post_bs_spread',
					'shadow_color'  => 'post_bs_color',
				),
			),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'slider',
		'settings' => 'post_bs_spread',
		'label'    => esc_html__( 'Post Box Shadow Spread(px)', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => 0,
		'choices'  => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1,
		),
		'output'   => array(
			array(
				'element'         => 'article.post,article.page, article.podcast',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px shadow_blurpx $px shadow_color',
				'pattern_replace' => array(
					'shadow_blur'  => 'post_bs_blur',
					'shadow_color' => 'post_bs_color',
				),
			),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'color',
		'settings' => 'post_bs_color',
		'label'    => __( 'Post Box Shadow Color', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => 'rgba(0,0,0,0)',
		'choices'  => array(
			'alpha' => true,
		),
		'output'   => array(
			array(
				'element'         => 'article.post,article.page, article.podcast',
				'property'        => 'box-shadow',
				'value_pattern'   => '0px 0px shadow_blurpx shadow_spreadpx $',
				'pattern_replace' => array(
					'shadow_blur'   => 'post_bs_blur',
					'shadow_spread' => 'post_bs_spread',
				),
			),
		),
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'radio-image',
		'settings' => 'blog_layout',
		'label'    => esc_html__( 'Layout Style', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => 'standard',
		'choices'  => array(
			'standard' => get_template_directory_uri() . '/assets/images/blog-standard.png',
			'list'     => get_template_directory_uri() . '/assets/images/blog-list.png',
		),
	)
);

// sotarble content setting
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'simple-podcast_theme_options[blog_sortable_content_sandard]',
		'label'    => esc_html__( 'Blog Content Layout(standard)', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_sandard'],
		'choices'  => array(
			'title'     => esc_html__( 'Title', 'simple-podcast' ),
			'thumbnail' => esc_html__( 'Thumbnail', 'simple-podcast' ),
			'meta'      => esc_html__( 'Meta', 'simple-podcast' ),
			'content'   => esc_html__( 'Content', 'simple-podcast' ),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'simple-podcast_theme_options[blog_sortable_content_list]',
		'label'    => esc_html__( 'Blog Content Layout(list)', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_list'],
		'choices'  => array(
			'image'       => esc_html__( 'Image', 'simple-podcast' ),
			'content-all' => esc_html__( 'Other Content', 'simple-podcast' ),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'sortable',
		'settings' => 'simple-podcast_theme_options[blog_sortable_content_list2]',
		'label'    => esc_html__( 'Blog Content Layout(list meta)', 'simple-podcast' ),
		'section'  => 'blog_options',
		'default'  => $defaults['blog_sortable_content_list2'],
		'choices'  => array(
			'title'   => esc_html__( 'Title', 'simple-podcast' ),
			'meta'    => esc_html__( 'Meta', 'simple-podcast' ),
			'content' => esc_html__( 'Content', 'simple-podcast' ),

		),
	)
);

// Entry/Post/Page Title Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'title_color',
		'label'     => __( 'Entry/Post/Page Title Color', 'simple-podcast' ),
		'section'   => 'blog_options',
		'default'   => $defaults['title_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.entry-title, .entry-title a, .page-title',
				'property' => 'color',
			),
		),
	)
);

// Entry/Post/Page Content Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'content_color',
		'label'     => __( 'Entry/Post/Page Content Color', 'simple-podcast' ),
		'section'   => 'blog_options',
		'default'   => $defaults['content_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'article.post,article.page, article.post p, article.page p, article.podcast, article.podcast p,
				.comment-respond .comment-form-comment textarea, .comment-respond input[type=email], .comment-respond input[type=text], input, select, textarea',
				'property' => 'color',
			),
			array(
				'element'  => '.comment-respond .comment-form-comment textarea, .comment-respond input[type=email], .comment-respond input[type=text], input, select, textarea',
				'property' => 'border-color',
			),
		),
	)
);

// Blog Post Background.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'entry_bgcolor',
		'label'     => __( 'Blog Post Background', 'simple-podcast' ),
		'section'   => 'blog_options',
		'default'   => $defaults['entry_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => 'article.post, article.page, article.podcast',
				'property' => 'background-color',
			),
		),
	)
);

// Blog Post: Footer Background.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'entry_footer_bgcolor',
		'label'     => __( 'Blog Post: Footer Background', 'simple-podcast' ),
		'section'   => 'blog_options',
		'default'   => $defaults['entry_footer_bgcolor'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.card-footer',
				'property' => 'background-color',
			),
		),
	)
);

// Meta Text Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'meta_color',
		'label'     => __( 'Meta Text Color', 'simple-podcast' ),
		'section'   => 'blog_options',
		'default'   => $defaults['meta_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.entry-footer, .entry-meta',
				'property' => 'color',
			),
		),
	)
);
