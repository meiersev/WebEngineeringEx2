<?php
/**
 * Displays the content of a page 
 * In the standard themes I found this to be loaded once within the page.php file,
 * but in our case, we don't need that since we have a single-page website. 
 * Instead, we load this several times from our index.php
 * Maybe we can add a page.php later and use it to scroll to the correct section, idk
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Fancy_Restaurant
 * @since 1.0
 * @version 1.0
 */

?>

<section id="<?php the_section_id(); ?>" class="<?php the_section_class(); ?>">
    <?php 
		/*TODO: Right now all titles load the move-to-left animation*/
		the_title( '<h2 class="move-to-left move-back-to-default">', '</h2>' ); 
		the_content(); 
	?>
</section>
