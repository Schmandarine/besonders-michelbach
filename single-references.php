<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package besonders-michelbach
 */

get_header('blank');
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
