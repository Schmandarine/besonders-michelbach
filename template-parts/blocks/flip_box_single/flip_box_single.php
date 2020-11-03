<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'flip-box' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'flip-box-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$card_style = get_field('hintergrundfarbe') ?: "primary";
$card_thumbnail = get_field('thumbnail') ?: "default";


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <!-- <img src="https://picsum.photos/800/640"> -->


        <div class="card mb-3">
            <?php if( get_field('back_content') ) {
                echo '<input type="checkbox" id="card'.$id.'" class="more" aria-hidden="true">';
            } ?>
            <div class="content">
                <div class="front">
                    <div class="inner h-100">
                        <label for="card<?php echo $id ?>" class="btn-text text-light lead flipbox_label" aria-hidden="true">
                            <div class="position-relative w-100 h-100 d-flex">
                                <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                    <img src="<?php echo $card_thumbnail; ?>" class="hexagon-icon card-hexagon-hover" alt="">
                                </div>
                            </div>
                            <div class="flipbox-title text-light <?php echo $card_style; ?>"><?php echo get_field('button') ?></div>
                        </label>
                    </div>
                </div>
                <div class="back">
                    <div class="inner bg-light h-100 p-2 align-items-start">
                            <?php echo get_field('back_content') ?>
                            <label for="card<?php echo $id ?>" class="btn btn-dark return d-block w-100 mt-3" aria-hidden="true">
                                <span>X</span> 
                            </label>
                    </div>
                </div>
            </div>
        </div>

</div>