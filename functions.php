<?php

/**
 * Child theme version.
 *
 * @since 1.0.0
 *
 * @var string
 */
define( 'PRIMER_CHILD_VERSION', '1.1.3' );

/**
 * Move some elements around.
 *
 * @action template_redirect
 * @since  1.0.0
 */
function escapade_move_elements() {

	remove_action( 'primer_header',                 'primer_add_hero',              7 );
	remove_action( 'primer_after_header',           'primer_add_page_title',        12 );
	remove_action( 'primer_site_info',              'primer_add_social_navigation', 7 );
	remove_action( 'primer_before_site_navigation', 'primer_add_mobile_menu' );

	add_action( 'primer_pre_hero', 'primer_video_header' );

	if ( ! is_front_page() || ! is_active_sidebar( 'hero' ) ) {

		add_action( 'primer_hero', 'primer_add_page_title', 12 );

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
		$colors['footer_widget_content_background_color'],
		$colors['tagline_text_color']
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
		'hero_text_color' => array(
			'default' => '#ffffff',
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
		'heading_text_color' => array(
			'default' => '#353535',
		),
		'primary_text_color' => array(
			'default' => '#252525',
		),
		'secondary_text_color' => array(
			'default' => '#757575',
		),
		'footer_widget_heading_text_color' => array(
			'default' => '#757575',
		),
		'footer_widget_text_color' => array(
			'default' => '#757575',
		),
		'footer_menu_text_color' => array(
			'default' => '#757575',
		),
		'footer_text_color' => array(
			'default' => '#757575',
		),
		/**
		 * Link / Button colors
		 */
		'link_color' => array(
			'default'  => '#55b74e',
			'css'      => array(
				'.main-navigation ul li:hover, .main-navigation li.current-menu-item, .main-navigation ul li.current-menu-item > a:hover, .main-navigation ul li.current-menu-item > a:visited:hover, .woocommerce-cart-menu-item .woocommerce.widget_shopping_cart p.buttons a:hover' => array(
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
				'.main-navigation ul > li:hover > a, .main-navigation ul > li:hover > a:hover, .main-navigation ul > li:hover > a:visited, .main-navigation ul > li:hover > a:visited:hover, .main-navigation ul li.current-menu-item > a' => array(
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
			'default' => '#eeeeee',
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
				'link_color'   => $color_schemes['blush']['base'],
				'button_color' => $color_schemes['blush']['base'],
			),
		),
		'bronze' => array(
			'colors' => array(
				'link_color'   => $color_schemes['bronze']['base'],
				'button_color' => $color_schemes['bronze']['base'],
			),
		),
		'canary' => array(
			'colors' => array(
				'link_color'   => $color_schemes['canary']['base'],
				'button_color' => $color_schemes['canary']['base'],
			),
		),
		'cool' => array(
			'colors' => array(
				'link_color'   => $color_schemes['cool']['base'],
				'button_color' => $color_schemes['cool']['base'],
			),
		),
		'dark' => array(
			'colors' => array(
				// Text
				'header_textcolor'                 => '#ffffff',
				'tagline_text_color'               => '#999999',
				'menu_text_color'                  => '#ffffff',
				'heading_text_color'               => '#ffffff',
				'primary_text_color'               => '#e5e5e5',
				'secondary_text_color'             => '#c1c1c1',
				'footer_widget_heading_text_color' => '#ffffff',
				'footer_widget_text_color'         => '#ffffff',
				// Backgrounds
				'background_color'               => '#191919',
				'hero_background_color'          => '#282828',
				'menu_background_color'          => '#212121',
				'footer_widget_background_color' => '#282828',
				'footer_background_color'        => '#191919',
			),
		),
		'muted' => array(
			'colors' => array(
				// Text
				'header_textcolor'       => '#ffffff',
				'tagline_text_color'     => '#ffffff',
				'menu_text_color'        => '#ffffff',
				'heading_text_color'     => '#4f5875',
				'primary_text_color'     => '#4f5875',
				'secondary_text_color'   => '#888c99',
				'footer_menu_text_color' => $color_schemes['muted']['base'],
				'footer_text_color'      => '#4f5875',
				// Links & Buttons
				'link_color'   => $color_schemes['muted']['base'],
				'button_color' => $color_schemes['muted']['base'],
				// Backgrounds
				'background_color'               => '#ffffff',
				'hero_background_color'          => '#4f5875',
				'menu_background_color'          => '#5a6175',
				'footer_widget_background_color' => '#d5d6e0',
				'footer_background_color'        => '#ffffff',
			),
		),
		'plum' => array(
			'colors' => array(
				'link_color'   => $color_schemes['plum']['base'],
				'button_color' => $color_schemes['plum']['base'],
			),
		),
		'rose' => array(
			'colors' => array(
				'link_color'   => $color_schemes['rose']['base'],
				'button_color' => $color_schemes['rose']['base'],
			),
		),
		'tangerine' => array(
			'colors' => array(
				'link_color'   => $color_schemes['tangerine']['base'],
				'button_color' => $color_schemes['tangerine']['base'],
			),
		),
		'turquoise' => array(
			'colors' => array(
				'link_color'   => $color_schemes['turquoise']['base'],
				'button_color' => $color_schemes['turquoise']['base'],
			),
		),
	);

	return primer_array_replace_recursive( $color_schemes, $overrides );

}
add_filter( 'primer_color_schemes', 'escapade_color_schemes' );
