<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'flip-box_repeater' . $block['id'];
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






?>
<div data-aos="fade-up" id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="container">
        <div class="row">
            <?php
            $i = 0;
            // loop through the rows of data
            while ( have_rows('repeater') ) : the_row(); 

            $card_icon = get_sub_field("icon");
            $card_style = get_sub_field('hintergrundfarbe') ?: "primary";
            $card_thumbnail_id = get_sub_field('thumbnail') ?: "default";
            $card_button_link = get_sub_field('button') ?: "default";
            if( get_sub_field('back_content') ) {
                $flipbox_class = "is_flipbox";
            } else {
                $flipbox_class = "no_flipbox";
            }

            ?>

                <div class="card mb-5 col-12 col-md-6 col-lg-4 <?php echo $flipbox_class; ?>">
                    <?php if( get_sub_field('back_content') ) {
                        echo '<input type="checkbox" id="card'.$id.'-'.$i.'" class="more" aria-hidden="true">';
                    } ?>
                    <div class="content">
                        <div class="front">
                            <div class="inner h-100">
                                <label for="card<?php echo $id.'-'.$i; ?>" class="btn-text text-light lead flipbox_label" aria-hidden="true">

                                    <?php if($card_icon) : ?>
                                        <div class="icon-bg-rounded">
                                            <img
                                            src="<?php echo $card_icon; ?>"
                                            alt=""
                                            class="icon" 
                                            />
                                        </div>
                                    <?php endif;?>

                                    <div class="position-relative w-100 h-100 d-flex">
                                        <div class="position-absolute w-100 h-100 d-flex align-items-center justify-content-center">
                                            <img src="<?php echo $card_thumbnail_id; ?>" class="hexagon-icon card-hexagon-hover" alt="">
                                        </div>
                                    </div>
                                    <div class="flipbox-title text-light <?php echo $card_style; ?>"><?php echo $card_button_link;  ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 37 55">
                                            <path id="a" d="M0 .1V55h19l18-18z"/>
                                        </svg> 
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="back">
                            <div class="inner bg-light h-100 p-2 align-items-start">
                                    <?php echo get_sub_field('back_content') ?>
                                    <label for="card<?php echo $id.'-'.$i; ?>" class="return d-inline mt-3" aria-hidden="true">
                                        <span>X</span> 
                                    </label>
                            </div>
                        </div>
                    </div>
                </div>

            <?php
            $i++;
            endwhile;
            ?>
        </div>
    </div>

</div>