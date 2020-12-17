<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package besonders-michelbach
 */

get_header('blank');
?>


<div class="container">
  <div class="row">
    <div class="col-12 my-5">



        <div class="postArchive" id="filterablePosts">
          <?php $terms = get_terms( [
              'taxonomy' => 'post_tag',
              'hide_empty' => true,
              'fields' => 'names'
          ] );

          if(!empty($terms)): ?>
            <div class="postArchive__filters">
              Filter: 
              <ul class="postArchive__filterList filters d-flex flex-wrap">
                <li class="filters__item"><button class="filters__button" :class="{'filters__button--active': tag === ''}" @click="tag = ''" aria-controls="postArchive__posts">All</button></li>
  
                <?php foreach($terms as $term): ?>
                  <li class="filters__item">
                    <button class="filters__button" :class="{'filters__button--active': tag === '<?php echo $term; ?>'}" @click="tag = '<?php echo $term; ?>'" aria-controls="postArchive__posts"><?php echo $term; ?></button>
                  </li>
                <?php endforeach; ?>
  
              </ul>
            </div>
          <?php endif; ?>

		  <div class="posts">
      <?php
      // Start the Loop.
	  while ( have_posts() ) : the_post(); ?>
    
        <article id="post-<?php the_ID(); ?>" >
          <header class="entry-header">
            <h2><?php the_title(); ?></h2>
          </header>
    
          <div class="entry-content">
            <?php the_excerpt(); ?>
          </div>
        </article>
    

     <?php endwhile; ?>
    </div>

        </div> 

</div>
  </div>
</div>

        <?php
get_footer();
