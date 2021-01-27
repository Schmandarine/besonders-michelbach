<?php 

$card_link = get_the_permalink();
$card_title = get_the_title();
$post_excerpt = get_the_excerpt( )?:false;
$card_description = get_field('paragraph', get_the_ID()) ?: false;

$image = get_post_thumbnail_id();
$size = 'karten-beitragsbild'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    $img_attach = wp_get_attachment_image( $image, $size );
} else {
    $img_attach = '<img width="400" height="500" alt="default card thumbnail" src="'.get_template_directory_uri().'/img/card-default.png">';
}

?>

<div class="minimal_card">

    <a href="<?php echo $card_link; ?>" class="custom_card d-block box-shadow bg-white position-relative mb-3">
        <?php echo $img_attach ?>
        <div class="content p-3 position-relative">
            <div class="card-link-chevron"></div>
            <span><?php echo $card_title; ?></span>
            <?php 
                if( $card_description ) : ?>
                    <span class="card-excerpt"><?php echo $card_description; ?></span>
                <?php endif; ?>
        </div>
    </a>

</div>