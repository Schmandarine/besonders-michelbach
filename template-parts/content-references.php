<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package besonders-brombach
 */

?>
<div class="col-6">
	
	<div class="bg-white p-4 my-4 box-shadow">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header mb-3">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->
		<?php the_post_thumbnail( ) ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-primary">weiterlesen</a>
		</footer><!-- .entry-footer -->
	</article><!-- #post-<?php the_ID(); ?> -->
	</div>

</div>
