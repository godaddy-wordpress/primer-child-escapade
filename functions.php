<?php

/**
 * Move some elements around.
 *
 * @action template_redirect
 * @since  1.0.0
 */
function escapade_move_elements() {

	remove_action( 'primer_header',                 'primer_add_hero' );
	remove_action( 'primer_after_header',           'primer_add_page_title' );
	remove_action( 'primer_before_site_navigation', 'primer_add_mobile_menu' );
	remove_action( 'primer_site_info',              'primer_add_social_navigation', 7 );

	if ( ! is_front_page() ) {

		add_action( 'primer_hero', 'primer_add_page_title' );

	}

}
add_action( 'template_redirect', 'escapade_move_elements' );

/**
 * Add mobile menu to header.
 *
 * @action primer_header
 * @since  1.0.0
 */
function escapade_add_mobile_menu() {

	get_template_part( 'templates/parts/mobile-menu' );

}
add_action( 'primer_header', 'escapade_add_mobile_menu', 0 );

/**
 * Add social links to primary navigation area.
 *
 * @action primer_after_header
 * @since  1.0.0
 */
function escapade_add_social_menu() {

	if ( has_nav_menu( 'social' ) ) {

		get_template_part( 'templates/parts/social-menu' );

	}

}
add_action( 'primer_after_header', 'escapade_add_social_menu', 30 );

/**
 * Set custom logo args.
 *
 * @filter primer_custom_logo_args
 * @since  1.0.0
 *
 * @param  array $args
 *
 * @return array
 */
function escapade_custom_logo_args( $args ) {

	$args['width']  = 180;
	$args['height'] = 80;

	return $args;

}
add_filter( 'primer_custom_logo_args', 'escapade_custom_logo_args' );

/**
 * Set layouts.
 *
 * @filter primer_layouts
 * @since  1.0.0
 *
 * @param  array $layouts
 *
 * @return array
 */
function escapade_layouts( $layouts ) {

	unset(
		$layouts['three-column-default'],
		$layouts['three-column-center'],
		$layouts['three-column-reversed']
	);

	return $layouts;

}
add_filter( 'primer_layouts', 'escapade_layouts' );
add_filter( 'primer_page_widths', '__return_empty_array' );

/**
 * Set fonts.
 *
 * @filter primer_fonts
 * @since  1.0.0
 *
 * @param  array $fonts
 *
 * @return array
 */
function escapade_fonts( $fonts ) {

	$fonts[] = 'Droid Serif';
	$fonts[] = 'Oswald';

	return $fonts;

}
add_filter( 'primer_fonts', 'escapade_fonts' );

/**
 * Set font types.
 *
 * @filter primer_font_types
 * @since  1.0.0
 *
 * @param  array $font_types
 *
 * @return array
 */
function escapade_font_types( $font_types ) {

	$overrides = array(
		'site_title_font' => array(
			'default' => 'Oswald',
		),
		'navigation_font' => array(
			'default' => 'Oswald',
		),
		'heading_font' => array(
			'default' => 'Oswald',
		),
		'primary_font' => array(
			'default' => 'Droid Serif',
		),
		'secondary_font' => array(
			'default' => 'Droid Serif',
		),
	);

	return primer_array_replace_recursive( $font_types, $overrides );

}
add_filter( 'primer_font_types', 'escapade_font_types' );

/**
 * Set colors.
 *
 * @filter primer_colors
 * @since  1.0.0
 *
 * @param  array $colors
 *
 * @return array
 */
function escapade_colors( $colors ) {

	unset(
		$colors['content_background_color'],
		$colors['footer_widget_content_background_color']
	);

	$overrides = array(
		/**
		 * Text colors
		 */
		'header_textcolor' => array(
			'default' => '#757575',
		),
		'tagline_text_color' => array(
			'default' => '#757575',
		),
		'menu_text_color' => array(
			'default'  => '#757575',
			'css'      => array(
				'header .social-menu a,
				header .social-menu a:visited' => array(
					'color' => '%1$s',
				),
			),
			'rgba_css' => array(
				'header .social-menu a:hover, header .social-menu a:visited:hover' => array(
					'color' => 'rgba(%1$s, 0.8)',
				),
			),
		),
		'footer_widget_heading_text_color' => array(
			'default' => '#ffffff',
		),
		'footer_widget_text_color' => array(
			'default' => '#ffffff',
		),
		/**
		 * Link / Button colors
		 */
		'link_color' => array(
			'default'  => '#55b74e',
			'css'      => array(
				'.main-navigation ul li:hover, .main-navigation li.current-menu-item, .main-navigation ul li.current-menu-item > a:hover, .main-navigation ul li.current-menu-item > a:visited:hover' => array(
					'background-color' => '%1$s',
				),
			),
		),
		'button_color' => array(
			'default' => '#55b74e',
		),
		'button_text_color' => array(
			'default'  => '#ffffff',
			'css' => array(
				'.main-navigation ul li:hover a, .main-navigation ul li:hover a:hover, .main-navigation ul li:hover a:visited, .main-navigation ul li:hover a:visited:hover, .main-navigation ul li.current-menu-item > a' => array(
					'color' => '%1$s',
				),
			),
		),
		/**
		 * Background colors
		 */
		'background_color' => array(
			'default' => '#ffffff',
		),
		'hero_background_color' => array(
			'default' => '#414242',
		),
		'menu_background_color' => array(
			'default' => '#f5f5f5',
			'css'     => array(
				'.side-masthead' => array(
					'background-color' => '%1$s',
				),
			),
		),
		'footer_widget_background_color' => array(
			'default' => '#414242',
		),
		'footer_background_color' => array(
			'default' => '#ffffff',
		),
	);

	return primer_array_replace_recursive( $colors, $overrides );

}
add_filter( 'primer_colors', 'escapade_colors' );

/**
 * Set color schemes.
 *
 * @filter primer_color_schemes
 * @since  1.0.0
 *
 * @param  array $color_schemes
 *
 * @return array
 */
function escapade_color_schemes( $color_schemes ) {

	unset( $color_schemes['iguana'] );

	$overrides = array(
		'blush' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'bronze' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'canary' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'cool' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'dark' => array(
			'colors' => array(
				'link_color'                       => '#55b74e',
				'button_color'                     => '#55b74e',
				'background_color'                 => '#191919',
				'hero_background_color'            => '#333333',
				'menu_background_color'            => '#212121',
				'footer_background_color'          => '#191919',
			),
		),
		'muted' => array(
			'colors' => array(
				'footer_widget_heading_text_color' => '#ffffff',
				'footer_widget_text_color'         => '#ffffff',
				'menu_background_color'            => '#484e61',
				'footer_widget_background_color'   => '#767f99',
			),
		),
		'plum' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#212121', // Darker
			),
		),
		'rose' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'tangerine' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
		'turquoise' => array(
			'colors' => array(
				'hero_background_color'          => '#414242',
				'menu_background_color'          => '#f5f5f5',
				'footer_widget_background_color' => '#414242',
			),
		),
	);

	return primer_array_replace_recursive( $color_schemes, $overrides );

}
add_filter( 'primer_color_schemes', 'escapade_color_schemes' );
