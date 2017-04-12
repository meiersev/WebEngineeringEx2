<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fancy_Restaurant
 * @since 1.0
 * @version 1.0
 */

?>

<div class="menu-float">
	<a href="#dish<?php the_ID(); ?>" >
		<img src=<?php the_post_thumbnail_url() ?> alt="" />
		<div class="menu-title">
			<span><?php the_dish_title(); ?></span>
		</div>
	</a>
</div>
<div id="dish<?php the_ID(); ?>" class="popup">
	<article>
		<header>
			<h3><?php the_dish_title(); ?></h3>
			<a class="close-button" href="#close">x</a>
		</header>
		<img src="<?php the_post_thumbnail_url() ?>">
		<p>
			<?php the_dish_content(); ?>
		</p>
	</article>
</div>
