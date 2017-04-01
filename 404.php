<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WordPress
 * @subpackage Fancy_Restaurant
 * @since 1.0
 * @version 1.0
 */

get_header(); 
get_template_part( 'nav' );
?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( '404', 'fancyrestaurant' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p> Nope, not what you were looking for.</p>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();
