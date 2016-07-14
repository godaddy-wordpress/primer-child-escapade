<?php
/**
 * Displays the primary navigation.
 *
 * @package Primer
 */
?>

<div class="main-navigation-container">

	<div class="menu-toggle" id="menu-toggle">
		<div></div>
		<div></div>
		<div></div>
	</div>

	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ) ?>

	<?php get_template_part('templates/parts/quote'); ?>

</div>