<?php
/**
 * Displays the site title.
 *
 * @package ascension
 */
?>
<?php if ( has_custom_logo() ) : ?>

	<h1 class="site-title">
		<div class="menu-toggle" id="menu-toggle">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<?php the_custom_logo(); ?>
	</h1>

<?php else : ?>
	<h1 class="site-title">
		<div class="menu-toggle" id="menu-toggle">
			<div></div>
			<div></div>
			<div></div>
		</div>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text" rel="home"><?php echo file_get_contents( get_bloginfo('stylesheet_directory') . '/img/travel-globe.svg' ); ?> <?php bloginfo( 'name' ); ?></a>
	</h1>

<?php endif; ?>