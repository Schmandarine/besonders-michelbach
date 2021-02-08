<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package besonders-michelbach
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function besonders_brombach_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'besonders_brombach_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function besonders_brombach_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'besonders_brombach_pingback_header' );




function get_cpt_tax( $post_type, $tax_object_names ) {

	// Apply this to a specific CPT
	if ( 'references' !== $post_type )
		return;
	
	// A list of custom taxonomy slugs to filter by
	$taxonomies = $tax_object_names;
	
	foreach ( $taxonomies as $taxonomy_slug ) {
	
		// Retrieve taxonomy data
		$taxonomy_obj = get_taxonomy( $taxonomy_slug );
		$taxonomy_name = $taxonomy_obj->labels->name;
	
		// Retrieve taxonomy terms
		$terms = get_terms( $taxonomy_slug );

		// Display filter HTML
		echo "<div class=\"checker-wrapper\">";
		echo "<select name='{$taxonomy_slug}_filter' id='{$taxonomy_slug}' class='custom-select m-1'>";
		echo '<option value="all">' . sprintf( esc_html__( 'Alle %s', 'text_domain' ), $taxonomy_name ) . '</option>';
		foreach ( $terms as $term ) {
			printf(
				'<option value="%1$s" %2$s>%3$s (%4$s)</option>',
				$term->slug,
				( ( isset( $_GET[$taxonomy_slug] ) && ( $_GET[$taxonomy_slug] == $term->slug ) ) ? ' selected="selected"' : '' ),
				$term->name,
				$term->count
			);
		}
		echo '</select>';
		echo "</div>";
	}
	
	}


	/**
 * Get taxonomies terms links.
 *
 * @see get_object_taxonomies()
 */
function wpdocs_custom_taxonomies_terms_links() {
    // Get post by post ID.
    if ( ! $post = get_post() ) {
        return '';
    }
 
    // Get post type by post.
    $post_type = $post->post_type;
 
    // Get post type taxonomies.
    $taxonomies = get_object_taxonomies( $post_type, 'objects' );
 
    $out = array();
 
    foreach ( $taxonomies as $taxonomy_slug => $taxonomy ){
 
        // Get the terms related to post.
        $terms = get_the_terms( $post->ID, $taxonomy_slug );
 
        if ( ! empty( $terms ) ) {
            $out[] = "<h2>" . $taxonomy->label . "</h2>\n<ul>";
            foreach ( $terms as $term ) {
                $out[] = sprintf( '<li><a href="%1$s">%2$s</a></li>',
                    esc_url( get_term_link( $term->slug, $taxonomy_slug ) ),
                    esc_html( $term->name )
                );
            }
            $out[] = "\n</ul>\n";
        }
    }
    return implode( '', $out );
}


function filter_references_archive_query( $query ) {

if(! is_admin() ){

    if ( ! $query->is_main_query() ) {
        return $query;
    } else {
        if ( is_post_type_archive( 'references' ) ) {
            $query->set( 'post_status', 'publish' );
        }
        return $query;
    }

}

}
add_filter( 'pre_get_posts', 'filter_references_archive_query' );