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
				<h1 class="text-primary mb-4">Referenzanlagen im Überblick:</h1>
				<div class="row cards-references">

		<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				echo '<div class="col-md-6 col-lg-4 col-12 mb-3">';
				get_template_part( 'template-parts/view', 'cards' );
				echo '</div>';

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		</div>
			</main>
		</div>
	</div><!-- #main -->

<?php
get_footer();
