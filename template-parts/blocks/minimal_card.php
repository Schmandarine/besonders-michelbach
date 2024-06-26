<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'minimal_card' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'minimal_card h-100 box-shadow mb-lg-3 d-flex';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$image = get_field('img')['id'];
$size = 'karten-beitragsbild'; // (thumbnail, medium, large, full or custom size)
if( $image ) {
    $img_attach = wp_get_attachment_image( $image, $size );
}

$card_text = get_field('text') ?: "default";
$card_link = get_field('link');

?>

<div data-aos="fade-up" data-aos-offset="-50" id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <a href="<?php echo $card_link; ?>" title="<?php echo $card_text ?>" class=" position-relative w-100">
        <?php echo $img_attach ?>
        <div class="d-flex flex-row position-relative w-100 h-100 align-items-center">
            <div class="card-link-chevron"></div>
            <?php 
                if( $card_link ) : ?>
                <span class="content p-3"><?php echo $card_text ?></span>
            <?php else : ?>
                <div class="content p-3"><?php echo $card_text ?></div>
            <?php endif; ?>
        </div>
    </a>

</div>