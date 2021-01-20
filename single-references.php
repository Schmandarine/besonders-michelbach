<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package besonders-michelbach
 */

get_header();
?>

	<div id="primary" class="site-single container">
		<div class="row">
			<main class="col-12">
			<?php
			while ( have_posts() ) :
				the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="entry-content">
						<?php
						the_content();
						?>
					</div><!-- .entry-content -->


				</article>

				<?php the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Vorheriger Beitrag:', 'besonders-michelbach' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Nächster Beiträg:', 'besonders-michelbach' ) . '</span> <span class="nav-title">%title</span>',
					)
				);

			endwhile; // End of the loop.
			?>
			</main>
		</div>
	</div><!-- #main -->

<?php
get_footer();
