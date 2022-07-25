<?php
/**
 * Customizer default options
 *
 * @package Simple Podcast
 * @return array An array of default values
 */

if ( ! function_exists( 'simple_podcast_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function simple_podcast_get_default_theme_options() {

		$defaults = array();

		$defaults['menu_bar_bgcolor']                    = 'rgba(0,0,0,1)';        //Main Menu Bar Background.
		$defaults['menu_bar_scroll_bgcolor']             = 'rgba(0,0,0,1)';        //Main Menu Bar Fixed Scroll Background.
		$defaults['menu_color']                          = 'rgba(255,255,255,1)';        //Main Menu Color.
		$defaults['menu_hover_color']                    = 'rgba(243,202,122,1)';      //Main Menu Hover Color.
		$defaults['site_title_color']                    = 'rgba(255,255,255,1)';      //Site Title Color.
		$defaults['title_color']                         = '#ffffff';       //Entry/Post/Page Title Color
		$defaults['content_color']                       = '#eeeeee';       //Entry/Post/Page content Color
		$defaults['entry_bgcolor']                       = '#212121';     //Entry Card Background.
		$defaults['entry_footer_bgcolor']                = '#212121';      //Entry Card: Footer Background.
		$defaults['wgt_title_color']                     = '#020407';       //Widget Title Color.
		$defaults['body_color']                          = '#ffffff';        //body color Color.
		$defaults['header_title_color']                  = '#ffffff';        //header title color Color.
		$defaults['link_color']                          = '#20aa73';        //Text Link Color.
		$defaults['link_hover_color']                    = '#f3ca7a';      //Text Link Hover Color.
		$defaults['meta_color']                          = '#20aa73';        //Meta Text Color.
		$defaults['simple-podcast_btn_color']            = '#20aa73';     //simple-podcast Button Background Color.
		$defaults['simple-podcast_btn_hover_color']      = '#f3ca7a';      //simple-podcast Button Background: Hover Color.
		$defaults['simple-podcast_btn_text_color']       = 'rgba(0, 0, 0, 1)';       //simple-podcast Button Text Color.
		$defaults['simple-podcast_btn_text_hover_color'] = 'rgba(0, 0, 0, 1)';     //simple-podcast Button Text: Hover Color.
		$defaults['footer_overlay']                      = '#232323';      //Footer Background.
		$defaults['footer_color']                        = 'rgba(255, 255, 255, 1)';       //Footer Text Color.

		// Latest Episode Color Settings

		$defaults['episode_section_overlay']      = 'rgba(0, 0, 0, 1)';       //Section Episode Overlay Default color
		$defaults['episode_section_color']        = 'rgba(255, 255, 255, 1)';       //Section Episode Section color
		$defaults['episode_section_preset_color'] = '#20aa73';       //Section Episode Preset color

		// FEature Post Guest Color Settings

		$defaults['users_section_overlay'] = 'rgba(0, 0, 0, 1)';       // Section uSER Overlay Default color
		$defaults['users_section_color']   = 'rgba(255, 255, 255, 1)';       //Section User Section color

		//blog defaults

		$defaults['blog_sortable_content_sandard'] = array( 'thumbnail', 'title', 'meta', 'content' );   //blod content sortable defaults standard
		$defaults['blog_sortable_content_list']    = array( 'image', 'content-all' );   //blod content sortable defaults list
		$defaults['blog_sortable_content_list2']   = array( 'title', 'meta', 'content' );   //blod content sortable defaults list secontd

		// skip link default
		$defaults['skip_to_content_toggle'] = '1';

		//menu mode default.
		$defaults['menubar_mode'] = 'standard';

		//sidebar position default.
		$defaults['sidebar_position'] = 'right';

		//footer copyright text default.
		$defaults['footer_copyright'] = esc_html__( 'Here lies copyright text', 'simple-podcast' );

		//footer copyright text default.
		$defaults['banner_toggle'] = '0';

		// Pass through filter.
		$defaults = apply_filters( 'simple_podcast_get_default_theme_options', $defaults );
		return $defaults;
	}

endif;
