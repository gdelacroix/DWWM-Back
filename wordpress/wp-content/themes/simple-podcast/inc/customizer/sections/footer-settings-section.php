<?php
/**
 * Footer settings section.
 *
 * @package Simple Podcast
 */

$defaults = simple_podcast_get_default_theme_options();

/**
 *
 * Add Section
 */
Kirki::add_section(
	'footer_options',
	array(
		'title' => __( 'Footer Settings', 'simple-podcast' ),
	)
);

// Setting background image
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'image',
		'settings' => 'footer_bg',
		'label'    => esc_html__( 'Footer Background Image', 'simple-podcast' ),
		'section'  => 'footer_options',
		'output'   => array(
			array(
				'element'  => '#footer',
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
		'settings'  => 'footer_overlay',
		'label'     => esc_html__( 'Footer Background Overlay', 'simple-podcast' ),
		'section'   => 'footer_options',
		'default'   => $defaults['footer_overlay'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#footer .overlay',
				'property' => 'background',
			),
		),
	)
);

// Footer Text Color.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'color',
		'settings'  => 'footer_color',
		'label'     => __( 'Footer Text Color', 'simple-podcast' ),
		'section'   => 'footer_options',
		'default'   => $defaults['footer_color'],
		'choices'   => array(
			'alpha' => true,
		),
		'transport' => 'auto',
		'output'    => array(
			array(
				'element'  => '#footer',
				'property' => 'color',
			),
		),
	)
);


// Setting copyright.
Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'     => 'editor',
		'settings' => 'simple-podcast_theme_options[footer_copyright]',
		'label'    => __( 'Copyright Text', 'simple-podcast' ),
		'section'  => 'footer_options',
		'default'  => $defaults['footer_copyright'],
	)
);

