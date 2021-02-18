<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package besonders-michelbach
 */

get_header('blank');
?>
	<main id="primary" class="site-main">

		<section class="error-404 not-found">
			<header class="page-header text-center">
				<h1 class="page-title text-primary"><?php esc_html_e( 'Leider konnten wir diese Seite nicht finden!', 'besonders-coi' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content row">
				<div class="col-12">

					<div class="text-center mt-2">
						<p class="">Bitte nutzen Sie unsere Suchfunktion oder <a href="/kontakt">kontaktieren</a> Sie uns direkt.</p>
						<a title="Startseite Michelbach" class="btn btn-primary" href="/">zurück zur Startseite</a>
					</div>
				
				</div>
					<?php
					//the_widget( 'WP_Widget_Recent_Posts' );
					?>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
