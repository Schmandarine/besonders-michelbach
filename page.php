<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package besonders-michelbach
 */
if(is_page( [303, 355, 346, 349, 351, 353, 359, 357, 361, 334, 363, 307, 179, 1875] )){
	get_header('blank');
}else {
	get_header();
}

?>
	
	<main id="primary" class="site-main">
				<?php
				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile; // End of the loop.
				?>
	</main><!-- #main -->

<?php
get_footer();
