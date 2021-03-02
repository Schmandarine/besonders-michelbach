<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package besonders-michelbach
 */

get_header('blank');
?>

	<div id="primary" class="site-search container">
		<div class="row">
			<div class="col-12">
				<header class="page-header">
					<h1 class="page-title text-secondary">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Suchergebnisse für: %s', 'besonders-michelbach' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->
			</div>
		</div>
		<div class="row">
			<main class="col-md-8">

		<?php if ( have_posts() ) : ?>



			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
			</main>
			<aside class="col-md-4">
				<div class="bg-lightblue p-4 my-4" style="    position: sticky;    top: 120px;">
					<span class="lead">Nicht dabei was Sie suchen?</span><hr>
					<p>Wir beraten Sie gerne individuell.</p>
					<div style="clear:both"></div>
					<a href="/kontakt" class="btn btn-primary btn-small">Kontakt</a>
				</div>
			</aside>
		</div>
	</div><!-- #main -->

<?php
get_footer();
