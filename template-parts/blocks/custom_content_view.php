<?php

/**
 * Cards View Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


 // GRID View Einstellungen.
$layout = get_field('layout');
$columns = get_field('columns');
$slider_einstellungen = get_field('slider_einstellungen');
// Content Einstellungen.
$content = get_field('content'); // Auswahl zw custom_post_types oder eigenen Karten
$eigene_wiederholung = get_field('eigene_wiederholung');

$show_all_cpt = get_field('show_all_cpt');
$choose_cpt = get_field('choose_cpt') ?: 'references'; 
$cpt_wiederholung = get_field('cpt_wiederholung');

if( $content == 'post_types' ) {
    $view_repeater = 'cpt_wiederholung';
} elseif( $content == 'custom' ) {
    $view_repeater = 'eigene_wiederholung';
}


// Create Logic

$id = 'cardsview-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Grid oder Slider Klasse
$className = 'cardsview-wrapper cards-'.$layout.' cards-'.$choose_cpt;
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
// Wenn Grid berechne die Spaltenbreite
if( $columns ) {
    $cols = 12 / $columns;
    $colWidth = " col-lg-$cols col-12 col-md-6";
    /*
    switch ($count_slides) {
        case 1:
            break;
        case 3:
            break;            
    }
    */
} else {
    $colWidth = "";
}

?>




<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="row" data-slick='<?php the_field("slider_einstellungen"); ?>'>


<?php
 // Query Build

// Alle Beiträge einer Kategorie anzeigen.
if($show_all_cpt) {

    $args = array(
        'post_type' => $choose_cpt, 
        'posts_per_page' => -1 
    );
    $query = new WP_Query( $args );


} else {
    // Manuell ausgewählte Beiträge anzeigen.

    if( $view_repeater == 'cpt_wiederholung' ) {

        $cpt_id_array = array();
        while ( have_rows( $view_repeater ) ) : the_row();
            $cpt_id_array[] = get_sub_field('inhaltselement');    
        endwhile;
        $args = array(
            'post_type' => array('references', 'post'),
            'post__in' => $cpt_id_array
         );
         $query = new WP_Query( $args );

    } elseif( $view_repeater == 'eigene_wiederholung' ) {

        while ( have_rows( $view_repeater ) ) : the_row(); 

            // LOGIC

            $image = get_sub_field('img')['id'] ?: false;
            $size = 'full';
            if( $image ) {
                $img_attach = wp_get_attachment_image( $image, $size );
            } else {
                $img_attach = false;
            }
            $card_text = get_sub_field('text')?:false;
            $card_link = get_sub_field('link');
            ?>


            <!-- VIEW -->
            <div class="h-100 p-2">

                <a href="<?php echo $card_link; ?>" class="custom_card d-block box-shadow position-relative mb-3">
                    <?php echo $img_attach;
                    if($card_text): ?>
                        <div class="d-flex flex-row">
                            <span class="content d-block p-3 lead"><?php echo $card_text ?></span>
                        </div>
                    <?php endif; ?>
                </a>

            </div>

        <?php endwhile;       


    }

}
?>


            <?php
                if($query):
                while( $query->have_posts() ) : $query->the_post();
                    echo "<div class=\"{$colWidth} p-2 \">";
                        get_template_part( 'template-parts/view', 'cards' );
                    echo "</div>";
                endwhile;
                endif;
                wp_reset_postdata();
            ?>

        </div>

        <!-- Slick Slider Pfeile -->
        <div class="row" id="custom-slider-arrows">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <div class="prev-slick slick-arrow-custom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 39">
                        <path fill="#58595b" d="M17.1 0L0 9.9v19.7l17.1 9.9 17.1-9.9V9.9z"/>
                        <path fill="none" stroke="#fff" stroke-width="2.307" stroke-linecap="round" stroke-linejoin="round" d="M21.3 13.1L9.7 19.8l11.6 6.7"/>
                    </svg>
                </div>
                <div class="next-slick slick-arrow-custom">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 34 39">
                        <path fill="#58595b" d="M17.1 0L0 9.9v19.7l17.1 9.9 17.1-9.9V9.9z"/>
                        <path fill="none" stroke="#fff" stroke-width="2.307" stroke-linecap="round" stroke-linejoin="round" d="M21.3 13.1L9.7 19.8l11.6 6.7"/>
                    </svg>
                </div>
            </div>
        </div>

    </div><!--container -->



</section>
