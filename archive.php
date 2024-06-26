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
			<main class="col-lg-8">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
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
			<aside class="col-lg-4">
				<div class="singe_post_sidebar bg-light p-3 d-none d-lg-block">
					<?php get_sidebar(); ?>
				</div>
			</aside>
		</div>
	</div><!-- #main -->

<?php
get_footer();
