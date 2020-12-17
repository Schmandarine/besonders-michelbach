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
