<?php

/**
 * Move some elements around.
 *
 * @action template_redirect
 * @since  1.0.0
 */
function escapade_move_elements() {

	remove_action( 'primer_header',       'primer_add_hero' );
	remove_action( 'primer_after_header', 'primer_add_page_title' );

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
 * Set the default hero image description.
 *
 * @filter primer_default_hero_images
 * @since  1.0.0
 *
 * @param  array $defaults
 *
 * @return array
 */
function escapade_default_hero_images( $defaults ) {

	$defaults['default']['description'] = esc_html__( 'Village in a mountain valley', 'escapade' );

	return $defaults;

}
add_filter( 'primer_default_hero_images', 'escapade_default_hero_images' );

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

	$font_types['header_font']['default']    = 'Oswald';
	$font_types['primary_font']['default']   = 'Droid Serif';
	$font_types['secondary_font']['default'] = 'Playfair Display';

	return $font_types;

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

	$colors = array(
		'background_color' => array(
			'label'   => esc_html__( 'Background Color', 'primer' ),
			'default' => '#fff',
		),
		'header_backgroundcolor' => array(
			'label'   => esc_html__( 'Header Background Color', 'primer' ),
			'default' => '#222',
			'css'     => array(
				'.side-masthead, header .main-navigation-container .menu li.menu-item-has-children:hover > ul' => array(
					'background-color' => '%1$s',
				),
			),
		),
		'link_color' => array(
			'label'   => esc_html__( 'Link Color', 'primer' ),
			'default' => '#8bd1e5',
			'css'     => array(
				'a, a:visited, .entry-footer a, .sticky .entry-title a:before' => array(
					'color' => '%1$s',
				)
			),
			'rgba_css' => array(
				'a:hover, a:visited:hover, .entry-footer a:hover' => array(
					'color' => 'rgba(%1$s, 0.75)',
				),
				'button:hover, a.button:hover, a.button:visited:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover, .site-info-wrapper:hover .site-info:hover .social-menu a:hover' => array(
					'background-color' => 'rgba(%1$s, 0.75)',
				),
			),
		),
		'button_color' => array(
			'label'   => esc_html__( 'Button Color', 'primer' ),
			'default' => '#55b74e',
			'css'     => array(
				'.cta, .cta:link, .cta:visited, .cta:hover, .cta:active, button, button:link, button:visited, button:hover, button:active, a.button, a.button:link, a.button:visited, a.button:hover, a.button:active, input[type="button"], input[type="reset"], input[type="submit"], input[type="submit"]:link, input[type="submit"]:visited, input[type="submit"]:hover, input[type="submit"]:active' => array(
					'background-color' => '%1$s',
				),
			),
		),
		'w_background_color' => array(
			'label'   => esc_html__( 'Widget Background Color', 'primer' ),
			'default' => '#414242',
			'css'     => array(
				'.site-footer' => array(
					'background-color' => '%1$s',
				),
			),
		),
		'footer_backgroundcolor' => array(
			'label'   => esc_html__( 'Footer Background Color', 'primer' ),
			'default' => '#191919',
			'css'     => array(
				'.site-info-wrapper' => array(
					'background-color' => '%1$s',
				),
			),
		),
	);

	return $colors;

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

	$color_schemes = array(
		'sepia' => array(
			'label'  => esc_html__( 'Sepia', 'escapade' ),
			'colors' => array(
				'header_backgroundcolor' => '#201b14',
				'background_color'       => '#efece4',
				'link_color'             => '#e54447',
				'button_color'           => '#eda246',
				'w_background_color'     => '#363027',
				'footer_backgroundcolor' => '#2d271e',
			),
		),
	);

	return $color_schemes;

}
add_filter( 'primer_color_schemes', 'escapade_color_schemes' );
