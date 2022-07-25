<?php
/**
 * Sanitize functions.
 *
 * @package Simple Podcast
 */

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function simple_podcast_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Sanitize the menu bar layout options.
 *
 * @param string $input Menu bar layout.
 */
function simple_podcast_sanitize_menubar_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'simple-podcast' ),
		'alt'      => __( 'Alternative', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}


/**
 * Sanitize the main menu style mode option.
 *
 * @param string $input options.
 */
function simple_podcast_sanitize_mainmenu_style( $input ) {
	$valid = array(
		'regular' => __( 'Regular', 'simple-podcast' ),
		'fixed'   => __( 'Fixed', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the sidebar position options.
 *
 * @param string $input Sidebar position options.
 */
function simple_podcast_sanitize_( $input ) {
	$valid = array(
		'right' => __( 'Right sidebar', 'simple-podcast' ),
		'left'  => __( 'Left sidebar', 'simple-podcast' ),
		'none'  => __( 'No sidebar', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the navigation mode options.
 *
 * @param string $input navigation mode options.
 */
function simple_podcast_sanitize_blog_pagination_mode( $input ) {
	$valid = array(
		'standard' => __( 'Standard', 'simple-podcast' ),
		'numeric'  => __( 'Numeric', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Sanitize the blog layout options.
 *
 * @param string $input blog layout options.
 */
function simple_podcast_sanitize_blog_layout( $input ) {
	$valid = array(
		'list'     => esc_html__( 'List', 'simple-podcast' ),
		'standard' => esc_html__( 'Standard', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Checkbox sanitization callback example.
 *
 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
 * as a boolean value, either TRUE or FALSE.
 *
 * @param bool $checked Whether the checkbox is checked.
 * @return bool Whether the checkbox is checked.
 */
function simple_podcast_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true === $checked ) ? true : false );
}

/**
 * Switch sanitization
 *
 * @param  string       Switch value
 * @return integer  Sanitized value
 */
if ( ! function_exists( 'simple_podcast_switch_sanitize' ) ) {
	function simple_podcast_switch_sanitize( $input ) {
		if ( true === $input ) {
			return 1;
		} else {
			return 0;
		}
	}
}

/**
 * Alpha Color (Hex & RGBa) sanitization
 *
 * @param  string   Input to be sanitized
 * @return string   Sanitized input
 */
if ( ! function_exists( 'simple_podcast_hex_rgba_sanitization' ) ) {
	function simple_podcast_hex_rgba_sanitization( $input, $setting ) {
		if ( empty( $input ) || is_array( $input ) ) {
			return $setting->default;
		}

		if ( false === strpos( $input, 'rgba' ) ) {
			// If string doesn't start with 'rgba' then santize as hex color
			$input = sanitize_hex_color( $input );
		} else {
			// Sanitize as RGBa color
			$input = str_replace( ' ', '', $input );
			sscanf( $input, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			$input = 'rgba(' . simple_podcast_in_range( $red, 0, 255 ) . ',' . simple_podcast_in_range( $green, 0, 255 ) . ',' . simple_podcast_in_range( $blue, 0, 255 ) . ',' . simple_podcast_in_range( $alpha, 0, 1 ) . ')';
		}
		return $input;
	}
}

/**
 * Only allow values between a certain minimum & maxmium range
 *
 * @param  number   Input to be sanitized
 * @return number   Sanitized input
 */
if ( ! function_exists( 'simple_podcast_in_range' ) ) {
	function simple_podcast_in_range( $input, $min, $max ) {
		if ( $input < $min ) {
			$input = $min;
		}
		if ( $input > $max ) {
			$input = $max;
		}
		return $input;
	}
}


/**
 * Sanitize the add to cart style mode option.
 *
 * @param string $input options.
 */
function simple_podcast_sanitize_player_atc_style( $input ) {
	$valid = array(
		'dropdown' => __( 'Dropdown', 'simple-podcast' ),
		'popup'    => __( 'Popup', 'simple-podcast' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * sortable checkboxes sanitization
 *
 * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
 * @return string   Sanitized input
 */
if ( ! function_exists( 'simple_podcast_sortable_checkboxes_sanitization' ) ) {
	function simple_podcast_sortable_checkboxes_sanitization( $input ) {
		/* Var */
		$output = array();
		/* Get valid choices */
		$valid_inputs = array(
			'thumbnail' => array(
				'id'    => 'thumbnail',
				'label' => __( 'Thumbnail', 'simple-podcast' ),
			),
			'title'     => array(
				'id'    => 'title',
				'label' => __( 'Title', 'simple-podcast' ),
			),
			'meta'      => array(
				'id'    => 'meta',
				'label' => __( 'Meta', 'simple-podcast' ),
			),
			'content'   => array(
				'id'    => 'id',
				'label' => __( 'Content', 'simple-podcast' ),
			),
		);
		/* Make array */
		$choices = explode( ',', $input );
		/* Bail. */
		if ( ! $choices ) {
			return null;
		}
		/* Loop and verify */
		foreach ( $choices as $choice ) {
			/* Separate choice and status */
			$choice = explode( ':', $choice );
			if ( isset( $choice[0] ) && isset( $choice[1] ) ) {
				if ( array_key_exists( $choice[0], $valid_inputs ) ) {
					$status   = $choice[1] ? '1' : '0';
					$output[] = trim( $choice[0] . ':' . $status );
				}
			}
		}
		return trim( esc_attr( implode( ',', $output ) ) );
	}
}

/**
 * Reapeter conterol sanitization
 *
 * @param  string   Input to be sanitized
 * @return string   Sanitized input
 */
function simple_podcast_repeater_sanitize( $input ) {
	$input_decoded = json_decode( $input, true );

	if ( ! empty( $input_decoded ) ) {
		foreach ( $input_decoded as $boxk => $box ) {
			foreach ( $box as $key => $value ) {

					$input_decoded[ $boxk ][ $key ] = wp_kses_post( force_balance_tags( $value ) );

			}
		}
		return json_encode( $input_decoded );
	}
	return $input;
}


