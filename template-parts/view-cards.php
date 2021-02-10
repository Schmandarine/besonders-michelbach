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
    $img_attach = '<img width="400" height="500" alt="default card thumbnail" src="'.get_template_directory_uri().'/assets/dist/img/card-default.png">';
}
$terms_anwendungsbereiche = get_the_terms( get_the_ID(), 'anwendungsbereiche' );
$terms_funktionen = get_the_terms( get_the_ID(), 'funktionen' );
?>

<div class="minimal_card box-shadow h-100">

    <a href="<?php echo $card_link; ?>" class="custom_card d-flex flex-column position-relative h-100">
        <?php echo $img_attach ?>

            
                <?php 
                    if ( ! empty( $terms_anwendungsbereiche ) ) {
                        echo '<div class="card-flags-wrapper">';
                        foreach ($terms_anwendungsbereiche as $term) {
                            echo "<span class=\"card-flag-item bg-{$term->slug}\">";
                            echo $term->name;
                            echo '</span>';                
                        }
                        echo '</div>';
                    }
                ?>
            

        <div class="content p-3 position-relative h-100">
            <div class="card-link-chevron"></div>
            <span><?php echo $card_title; ?></span>
            <?php 
                if( $card_description ) : ?>
                    <span class="card-excerpt"><?php echo $card_description; ?></span>
                <?php endif; ?>
            
                <?php 
                
                    if ( ! empty( $terms_funktionen ) ) {
                        echo '<div class="funktionen-icons-wrapper">';
                        foreach ($terms_funktionen as $term) {
                            echo '<img src="'.get_template_directory_uri(  ).'/assets/dist/img/'.$term->slug.'.svg" class="funktion-icon-item">';
                        }
                        echo '</div>';
                    }
                ?>

        </div>
    </a>

</div>
