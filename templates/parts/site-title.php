<?php
/**
 * Displays the site title.
 *
 * @package ascension
 */
?>
<?php if ( has_custom_logo() ) : ?>

	<h1 class="site-title">
		<?php the_custom_logo(); ?>
	</h1>

<?php else : ?>

	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

<?php endif; ?>