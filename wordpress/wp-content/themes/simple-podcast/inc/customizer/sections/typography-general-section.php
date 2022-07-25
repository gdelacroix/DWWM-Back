<?php
/**
 * Typography general settings section.
 *
 * @package Simple Podcast
 */

/**
 *
 * Add Section
 */
Kirki::add_section(
	'typography_general_options',
	array(
		'title' => __( 'General', 'simple-podcast' ),
		'panel' => 'typography_options',
	)
);

Kirki::add_field(
	'simple-podcast_kirki_config',
	array(
		'type'      => 'typography',
		'settings'  => 'typography_general',
		'label'     => esc_html__( 'Typography(body)', 'simple-podcast' ),
		'section'   => 'typography_general_options',
		'default'   => array(
			'font-family'    => 'Roboto',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
		),
		'output'    => array(
			array(
				'element' => 'body',
			),
		),
		'transport' => 'auto',

	)
);
