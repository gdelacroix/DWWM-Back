<?php
/**
 * Head banner section settings.
 *
 * @package Simple Podcast
 */

$defaults = simple_podcast_get_default_theme_options();
/**
 *
 * Add Section
 */
Kirki::add_section(
	'frontpage_banner',
	array(
		'title' => __( 'Header Banner Settings', 'simple-podcast' ),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'toggle',
		'settings' => 'banner_toggle',
		'label'    => esc_html__( 'Show Header Banner', 'simple-podcast' ),
		'section'  => 'frontpage_banner',
		'default'  => '0',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_title',
		'label'    => esc_html__( 'Heading', 'simple-podcast' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_subtitle',
		'label'    => esc_html__( 'Sub-Heading', 'simple-podcast' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'banner_button_label',
		'label'    => esc_html__( 'Button Label', 'simple-podcast' ),
		'section'  => 'frontpage_banner',
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'link',
		'settings' => 'banner_button_link',
		'label'    => __( 'Button Link', 'simple-podcast' ),
		'section'  => 'frontpage_banner',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_bg_color',
		'label'     => __( 'Background Color', 'simple-podcast' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.front-page .header-banner',
				'property' => 'background-color',
			),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'banner_color',
		'label'     => __( 'Color', 'simple-podcast' ),
		'section'   => 'frontpage_banner',
		'default'   => '#ffffff',
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.front-page .header-banner',
				'property' => 'color',
			),
		),
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'        => 'cropped_image',
		'settings'    => 'banner_bg_image',
		'label'       => esc_html__( 'Background Image', 'simple-podcast' ),
		'section'     => 'frontpage_banner',
		'width'       => 1900,
		'height'      => 1080,
		'flex-width'  => true,
		'flex-height' => true,
		'output'      => array(
			array(
				'element'  => '.header-banner',
				'property' => 'background-image',
			),
		),
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'dimensions',
		'settings'  => 'banner_padding',
		'label'     => esc_html__( 'Banner Paddings', 'simple-podcast' ),
		'section'   => 'frontpage_banner',
		'default'   => array(
			'padding-top'    => '0px',
			'padding-right'  => '0px',
			'padding-bottom' => '0px',
			'padding-left'   => '0px',
		),
		'choices'   => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'simple-podcast' ),
				'padding-right'  => esc_html__( 'Padding Right', 'simple-podcast' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'simple-podcast' ),
				'padding-left'   => esc_html__( 'Padding Left', 'simple-podcast' ),
			),
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'choice'   => 'padding-top',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-top',
			),
			array(
				'choice'   => 'padding-right',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-right',
			),
			array(
				'choice'   => 'padding-bottom',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-bottom',
			),
			array(
				'choice'   => 'padding-left',
				'element'  => '.front-page .header-banner',
				'property' => 'padding-left',
			),
		),
	)
);

