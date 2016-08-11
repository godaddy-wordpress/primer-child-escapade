<?php if ( primer_has_hero_image() ) : ?>

	<div class="hero-widget">

	<?php if ( is_front_page() && is_active_sidebar( 'hero' ) ) : ?>

		<?php dynamic_sidebar( 'hero' ); ?>

	<?php else : ?>

		<?php do_action( 'primer_hero_content' ); ?>

	<?php endif; ?>

	</div>

<?php endif; ?>
