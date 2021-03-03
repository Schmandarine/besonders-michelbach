<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package besonders-michelbach
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
		var stylesheet_directory_uri = "<?php echo get_stylesheet_directory_uri(); ?>";
	</script>
	<?php wp_head(); ?>
	<script type="text/javascript">
var gaProperty = 'G-8BHZT8PV65';
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) {
window[disableStr] = true;
}
function gaOptout() {
document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
window[disableStr] = true;
alert('Das Tracking durch Google Analytics wurde in Ihrem Browser für diese Website deaktiviert.');
}
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-8BHZT8PV65"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-8BHZT8PV65');
</script>
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
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page" class="site bg-light">

		<?php the_site_navigation(); ?>

		<header id="masthead" class="site-header">
			<div class="hero-wrapper hero-bg-img">
				<!--<div class="hero-bg-overlay"></div>-->
				<div class="hero-content site-navigation-container">
					<h1 class="m-0"><?php the_field('site_headline'); ?></h1>
				</div>
			</div>	
		</header><!-- #masthead -->
