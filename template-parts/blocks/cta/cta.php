<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'cta' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'cta container-fluid bg-light p-5 my-5 d-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <img src="<?php echo get_template_directory_uri(); ?>/img/cta-thumbsup.png" class="cta-img" alt="">
                
                <div class="my-4 d-none">
                    <small> Für den reibungslosen Ablauf,</small>
                    <div class="lead">füllen Sie bitte unsere Checkliste vorab aus.</div>
                </div>
                <div class="d-flex flex-column flex-sm-row justify-content-center">
                    <a href="#" class="btn btn-primary mx-2 mb-2 mb-sm-0">Checkliste anfordern</a>
                    <a href="#" class="btn btn-dark mx-2">Kontakt aufnehmen</a>
                </div>
                
                <?php // the_field('content'); ?>
            </div>
        </div>
    </div>

</div>