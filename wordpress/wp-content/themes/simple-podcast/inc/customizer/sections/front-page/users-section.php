<?php
/**
 * users settings section.
 *
 * @package Simple Podcast
 */

$defaults = simple_podcast_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'users_section',
	array(
		'title' => __( 'Guests Section', 'simple-podcast' ),
		'panel' => 'front_page_options',
	)
);

// Setting background image
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'users_section_bg',
		'label'    => esc_html__( 'Section Background Image', 'simple-podcast' ),
		'section'  => 'users_section',
		'output'   => array(
			array(
				'element'  => '.featured-guest',
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
		'settings'  => 'users_section_overlay',
		'label'     => esc_html__( 'Section Background Overlay', 'simple-podcast' ),
		'section'   => 'users_section',
		'default'   => $defaults['users_section_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.featured-guest:before',
				'property' => 'background',
			),
		),
	)
);

// Section Text Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'users_section_color',
		'label'     => __( 'Section Text Color', 'simple-podcast' ),
		'section'   => 'users_section',
		'default'   => $defaults['users_section_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '.featured-guest',
				'property' => 'color',
			),
		),
	)
);



// Setting heading.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'text',
		'settings' => 'users_section_title',
		'label'    => __( 'Section Heading', 'simple-podcast' ),
		'section'  => 'users_section',
	)
);


