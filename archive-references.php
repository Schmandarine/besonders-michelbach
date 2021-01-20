<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package besonders-michelbach
 */

get_header('blank');
?>

	<div id="primary" class="site-search container">
		<div class="row">
			<main class="col-12">

		<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo '<div class="">';
				get_template_part( 'template-parts/content', get_post_type() );
				echo '</div>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</main>
		</div>
	</div><!-- #main -->

<?php
get_footer();
