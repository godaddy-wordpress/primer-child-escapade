<?php
/**
 * Displays the site title.
 *
 * @package ascension
 */
?>

<?php if ( has_custom_logo() ) : ?>

	<div class="site-logo"><?php the_custom_logo(); ?></div>

<?php endif; ?>

<h1 class="site-title">

	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text" rel="home"> <?php bloginfo( 'name' ); ?></a>

</h1>

<div class="site-description"><?php bloginfo( 'description' ) ?></div>
