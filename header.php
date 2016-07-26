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

<!--[if lt IE 9]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/ie.css">
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/respond.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/nwmatcher.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/html5shiv.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/selectivizr.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/rem.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/assets/js/jquery.backgroundSize.min.js"></script>
	<script type="text/javascript">
	$( document ).ready( function( $ ) {
		$( 'body .hero' ).css( { backgroundSize: "cover" } );
	});
	</script>
<![endif] -->
</head>

<body <?php body_class() ?>>

	<?php do_action( 'primer_body_inside' ) ?>

	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'primer' ) ?></a>

	<?php do_action( 'primer_before_header' ) ?>

	<header id="masthead" class="site-header" role="banner"<?php if( escapade_get_header_image() && is_front_page() ): ?> style="background:url('<?php echo escapade_get_header_image(); ?>') no-repeat top center; background-size: cover;"<?php elseif( has_post_thumbnail() ): ?> style="background:url('<?php echo the_post_thumbnail_url("full"); ?>') no-repeat top center; background-size: cover;"<?php endif; ?>>
<?php echo get_header_image(); ?><?php header_image(); ?>
		<div class="side-masthead">
			<?php do_action( 'primer_header' ) ?>
			<div class="menu-toggle" id="menu-toggle">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<div class="mobile-container">
				<?php do_action( 'primer_after_header' ) ?>
			</div>
		</div>

		<?php if ( is_active_sidebar( 'hero' ) && is_front_page() ) : ?>

		<div class="hero-widget">

			<?php dynamic_sidebar( 'hero' ) ?>

		</div>

		<?php endif; ?>

	</header><!-- #masthead -->

	<div id="page" class="hfeed site">

		<div id="content" class="site-content">
