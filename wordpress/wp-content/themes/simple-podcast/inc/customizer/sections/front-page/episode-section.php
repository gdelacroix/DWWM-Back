<?php
/**
 * episode settings section.
 *
 * @package Simple Podcast
 */

$defaults = simple_podcast_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'episode_section',
	array(
		'title' => __( 'Episodes Section', 'simple-podcast' ),
		'panel' => 'front_page_options',
	)
);

// Setting background image
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'episode_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'simple-podcast' ),
		'section'  => 'episode_section',
		'output'   => array(
			array(
				'element'  => '.latest-episode',
				'property' => 'background-image',
			),
		),

	)
);



// Setting gradient overlay.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'episode_section_overlay',
		'label'     => esc_html__( 'Section Background Overlay', 'simple-podcast' ),
		'section'   => 'episode_section',
		'default'   => $defaults['episode_section_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.latest-episode:before',
				'property' => 'background-color',
			),
		),
	)
);

// Section Text Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'episode_section_color',
		'label'     => __( 'Section Text Color', 'simple-podcast' ),
		'section'   => 'episode_section',
		'default'   => $defaults['episode_section_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.latest-episode',
				'property' => 'color',
			),
		),
	)
);

// Section preset Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'        => 'color',
		'settings'    => 'episode_section_preset_color',
		'label'       => __( 'Section Preset Color', 'simple-podcast' ),
		'description' => __( 'Includes title,button,sort colors', 'simple-podcast' ),
		'section'     => 'episode_section',
		'default'     => $defaults['episode_section_preset_color'],
		'choices'     => array(
			'alpha' => true,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.episode-title a, .episode-meta span, a.podcast-meta-download, a.podcast-meta-new-window, .episode-meta a',
				'property' => 'color',
			),

			array(
				'element'  => '.latest-episode .btn-simple-podcast',
				'property' => 'background-color',
			),
		),
	)
);



// Setting heading.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'episode_section_title',
		'label'    => __( 'Section Heading', 'simple-podcast' ),
		'section'  => 'episode_section',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'episode_section_button_label',
		'label'    => esc_html__( 'Button Label', 'simple-podcast' ),
		'section'  => 'episode_section',
	)
);


Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'link',
		'settings' => 'episode_section_button_link',
		'label'    => __( 'Button Link', 'simple-podcast' ),
		'section'  => 'episode_section',
	)
);


