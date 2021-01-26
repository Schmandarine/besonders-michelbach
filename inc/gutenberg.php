<?php

add_action( 'init', 'register_block_patterns' );
function register_block_patterns(){
	if( function_exists( 'register_block_pattern' ) ) {

		/**
		* Parallax Cover Pattern
		*/
		$parallax_cover_content = get_pattern_content( 'template-parts/patterns/parallax-cover' );

		register_block_pattern( 
			'besonders/parallax-cover', 
			[
				'title' => __( 'Parallax Cover' , 'besonders-michelbach' ),
				'categories' => [ 'design-system' ],
				'content' => $parallax_cover_content,
			] );


		/**
		* Hero Cards Fastnavigation Pattern
		*/
		$hero_cards_pattern = get_pattern_content( 'template-parts/patterns/hero-cards-pattern' );

		register_block_pattern( 
			'besonders/hero-cards', 
			[
				'title' => __( 'Hero Cards' , 'besonders-michelbach' ),
				'categories' => [ 'design-system' ],
				'content' => $hero_cards_pattern,
			] );


		/**
		* Product Cards Slider Pattern
		*/
		$product_cards_slider_pattern = get_pattern_content( 'template-parts/patterns/products-cards-slider-pattern' );

		register_block_pattern( 
			'besonders/product-cards-slider', 
			[
				'title' => __( 'Product Cards Slider' , 'besonders-michelbach' ),
				'categories' => [ 'design-system' ],
				'content' => $product_cards_slider_pattern,
			] );

		/**
		* CTA Cover Pattern
		*/
		$cta_cover_pattern = get_pattern_content( 'template-parts/patterns/cta-cover-pattern' );

		register_block_pattern( 
			'besonders/cta-cover', 
			[
				'title' => __( 'CTA Cover' , 'besonders-michelbach' ),
				'categories' => [ 'design-system' ],
				'content' => $cta_cover_pattern,
			] );


	}
}
add_action( 'init', 'register_block_pattern_categorys' );

function get_pattern_content( $template_path ){
	ob_start();
	get_template_part( $template_path );
	$pattern_content = ob_get_contents();
	ob_end_clean();
	return $pattern_content;
}

function register_block_pattern_categorys(){
	$pattern_categorys = [
		'design-system' => __('Design System', 'besonders-michelbach')
	];
	if(!empty($pattern_categorys) && is_array($pattern_categorys)){
		foreach ( $pattern_categorys as $pattern_category => $pattern_category_label ){
			register_block_pattern_category(
				$pattern_category,
				[ 'label' => $pattern_category_label]
			);
		}
	}
}


/**
 * Disable the custom color picker.
 */
function gutenberg_colors_setup() {
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Primary', 'besonders-michelbach' ),
			'slug'  => 'primary',
			'color'	=> '#007ab9',
		),
		array(
			'name'  => __( 'Secondary', 'besonders-michelbach' ),
			'slug'  => 'secondary',
			'color' => '#a7c6e2',
		),
		array(
			'name'  => __( 'Dark', 'besonders-michelbach' ),
			'slug'  => 'dark',
			'color' => '#646567',
		),
		array(
			'name'	=> __( 'Light', 'besonders-michelbach' ),
			'slug'	=> 'light',
			'color'	=> '#FFFFFF',
		),
	) );
}
add_action( 'after_setup_theme', 'gutenberg_colors_setup' );

/**
 * Registers support for editor styles & Enqueue it.
 */
function design_system_gutenberg_styles() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'align-wide' );
  
	// Enqueue editor styles.
	add_editor_style( get_template_directory_uri(  ) . '/assets/dist/css/custom-gutenberg.css' );
	
}
add_action( 'after_setup_theme', 'design_system_gutenberg_styles' );



add_action('acf/init', 'register_acf_gutenberg');
function register_acf_gutenberg() {
	
	// check function exists
	if( function_exists('acf_register_block_type') ) {


		acf_register_block_type(array(
			'name'				=> 'accordeon',
			'title'				=> __('Akkordeon'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/accordeon/accordeon.php',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/accordeon/accordeon.js',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));

		acf_register_block_type(array(
			'name'				=> 'minimal_card',
			'title'				=> __('Mini Karte'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/minimal_card/minimal_card.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));


		acf_register_block_type(array(
			'name'				=> 'custom_content_view',
			'title'				=> __('Eigenen Inhalt anzeigen'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/custom_content_view/custom_content_view.php',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));
		
	}
}