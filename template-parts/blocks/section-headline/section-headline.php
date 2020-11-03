<?php

// Create id attribute allowing for custom "anchor" value.
$id = 'section-headline' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'section-headline_block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$headline = get_field('content');
$number = get_field('nummer');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-row justify-content-between align-items-center w-100 h100">
                    <div data-aos="zoom-in" class="sektion_counter" id="sektion-<?php echo esc_attr($id); ?>"><?php echo $number; ?></div>
                    <hr data-aos="fade-right"
                        data-aos-easing="ease-in-sine" class="mx-3">
                    <h2 data-aos="fade-right"
                        data-aos-easing="ease-in-sine" class="m-0 flex-shrink-0"><?php echo $headline; ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div data-aos="zoom-in" class="bg-sektion-healdine">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 569 598">
            <path d="M641 188.6l-72.1-72.1-136.1 136.2 72.1 72.1L641 188.6zM418 259l129.9-129.9L475.8 57 345.9 186.9 418 259zm-65.5-87.2L433 91.3l-72.1-72.1-80.5 80.5 72.1 72.1zM81.7 289.6L297.3 74 225.2 1.9 9.7 217.5l72 72.1zm54.2-45.4L-.2 380.3l72.1 72.1L208 316.2l-72.1-72zm135.2 17.5L135 397.8l72.1 72.1 136.1-136.1-72.1-72.1zM212 312.2l136.1-136.1-72-72.1L140 240.1l72 72.1zm201.7-48.9l-72.1-72.1-66.2 66.2 72.1 72.1 66.2-66.2zm15.1-6.6L275.6 409.9l72.1 72.1 153.2-153.2-72.1-72.1zm22.4 130.1L315.1 522.9l72.1 72.1 136.1-136.1-72.1-72.1zm4.9-4.8l72.1 72.1 80.5-80.5-72.1-72.1-80.5 80.5z"/>
        </svg>
    </div>
</div>