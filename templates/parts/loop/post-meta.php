<?php
/**
 * Template part for displaying the post meta inside The Loop.
 *
 * @package Primer
 */
?>
<ul class="entry-meta">
	<li><span class="genericon genericon-user"></span> <?php the_author(); ?></li>
	<li><span class="genericon genericon-time"></span> <?php the_time('F j, Y'); ?></li>
</ul><!-- .entry-meta -->
