<?php 
// Custom Post Type Referenzen mit Kategorien und Filterbar im Backend
function add_cpt_references() {
	$labels = array(
		'name'                => __( 'Referenzen' ),
  );
  $rewrite = array(
		'slug'                  => 'referenzen',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
        'label'               => __( 'references'),
        'labels'              => $labels,
        'rewrite'              => $rewrite,
        'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions'),
        'public'              => true,
        'hierarchical'        => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_icon' => 'dashicons-category',
        'show_in_nav_menus'   => true,
        'show_in_rest'		=> true,
        'show_in_admin_bar'   => true,
        'has_archive'         => true,
        'can_export'          => true,
        'exclude_from_search' => false,
        'yarpp_support'       => true,
        'taxonomies'            => array( 'branchen', 'loesungen' ),
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
);
	register_post_type( 'references', $args );
}
add_action( 'init', 'add_cpt_references', 0 );