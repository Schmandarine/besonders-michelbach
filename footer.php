<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package besonders-michelbach
 */

?>

	<div class="fixed-scroll-top box-shadow">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 39">
			<path fill="none" stroke="" stroke-width="2.307" stroke-linecap="round" stroke-linejoin="round" d="M21.3 13.1L9.7 19.8l11.6 6.7"/>
		</svg>
	</div>

	<footer class="site-footer pt-5">
		
		<div class="container-fluid mb-1 p-0">
			<div class="row">
				<div class="col-md-6 col-12">
					<div class="" id="footer-map">

					</div>
				</div>
				<div class="col-md-6 col-12 pl-md-5">
					<div class="footer-anschrift py-4">
						<?php the_custom_logo(); ?>
						<div class="anschrift-content">
							<p class="text-uppercase font-weight-bold">Michelbach GmbH</p>
							<p>Lupinenstr. 7<br>
							D-90513 Zirndorf</p>
							<p>Tel. +49 9127 9006-0<br>
							Fax +49 9127 9006-10</p>
							<p>info@michelbach.net</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-primary mb-1">
			<ul class="site-footer-navi p-0 m-0">
				<li><a href="#">Impressum</a></li>
				<li><a href="#">Datenschutz</a></li>
				<li><a href="#">AGBs</a></li>
				<li><a href="#">Kontakt</a></li>
			</ul>
		</div>
		<div class="bg-dark text-center text-light p-2">2020 Michelbach Unternehmensgruppe</div>
		
	</footer>

</div><!-- #page -->	

<?php wp_footer(); ?>

<style>
	@media (min-width: 993px){
		.hero-bg-img {
			<?php 
			$thumbnail_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url(get_the_ID(),'') : get_template_directory_uri().'/img/default-img.png';
			echo 'background-image: url('.$thumbnail_url.')';
			?>
		}
	}
	@media (max-width: 992px){
		.hero-bg-img {
			<?php 
			$thumbnail_url = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url(get_the_ID(),'mobile-hero') : get_template_directory_uri().'/img/default-img.png';
			echo 'background-image: url('.$thumbnail_url.')';
			?>			
		}
	}

</style>


</body>
</html>
