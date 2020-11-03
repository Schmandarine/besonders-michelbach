<?php
/**
 * Test Block Pattern Template
 *
 * @package aquila
 */

?>

<!-- wp:group {"className":"bg-dark text-light p-5"} -->
<div class="wp-block-group bg-dark text-light p-5"><div class="wp-block-group__inner-container"><!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"container"} -->
<div class="wp-block-columns alignwide are-vertically-aligned-center container"><!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
<h2>Überschrift</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ganz schöner Text</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>Mit</li><li>einer</li><li>schönen </li><li>liste</li></ul>
<!-- /wp:list --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center"} -->
<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":37,"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="http://localhost/michelbach/wp-content/uploads/hero-banner-home-1024x566.jpg" alt="" class="wp-image-37"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div></div>
<!-- /wp:group -->