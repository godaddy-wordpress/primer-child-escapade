<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/template-files-section/partial-and-miscellaneous-template-files/#header-php
 *
 * @package Primer
 */
?><!DOCTYPE html>

<html <?php language_attributes() ?>>

<head>

	<meta charset="<?php bloginfo( 'charset' ) ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ) ?>">

	<?php wp_head() ?>

</head>

<body <?php body_class() ?>>

	<?php do_action( 'primer_body_inside' ) ?>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'primer' ) ?></a>

	<?php do_action( 'primer_before_header' ) ?>

	<header id="masthead" class="site-header" role="banner"<?php if( ! empty( escapade_get_header_image() ) ): ?> style="background:url('<?php echo escapade_get_header_image( ); ?>') no-repeat top center; background-size: cover;"<?php endif; ?>>


		<?php do_action( 'primer_header' ) ?>
	
		<div class="secondary-masthead">
			<?php do_action( 'primer_after_header' ) ?>
		</div>
		
		<?php if ( is_active_sidebar( 'hero' ) && is_home() ) : ?>

		<div class="hero-widget">

			<?php dynamic_sidebar( 'hero' ) ?>

		</div>

		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="page" class="hfeed site">

		<div id="content" class="site-content">
