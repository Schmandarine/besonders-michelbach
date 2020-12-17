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
		* Test Pattern
		*/
		$hero_cards_pattern = get_pattern_content( 'template-parts/patterns/hero-cards-pattern' );

		register_block_pattern( 
			'besonders/test-pattern', 
			[
				'title' => __( 'Hero Cards' , 'besonders-michelbach' ),
				'categories' => [ 'design-system' ],
				'content' => $hero_cards_pattern,
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
 * Registers support for editor styles & Enqueue it.
 */
function design_system_gutenberg_styles() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'align-wide' );
  
	// Enqueue editor styles.
	add_editor_style( 'style-gutenberg-editor.css' );
	
}
add_action( 'after_setup_theme', 'design_system_gutenberg_styles' );



add_action('acf/init', 'register_acf_gutenberg');
function register_acf_gutenberg() {
	
	// check function exists
	if( function_exists('acf_register_block') ) {

		
		acf_register_block(array(
			'name'				=> 'flip_box_single',
			'title'				=> __('Flip Box Einzeln'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/flip_box_single/flip_box_single.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/flip_box_single/flip_box_single.css',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => true ,'align' => true )
		));
		
/*
		acf_register_block(array(
			'name'				=> 'flip_box_repeater',
			'title'				=> __('Flip Box Wiederholung'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/flip_box_repeater/flip_box_repeater.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/flip_box_repeater/flip_box_repeater.css',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => true ,'align' => true )
		));
*/

		acf_register_block(array(
			'name'				=> 'minimal_card',
			'title'				=> __('Mini Karte'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/minimal_card/minimal_card.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/minimal_card/minimal_card.css',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));

		acf_register_block(array(
			'name'				=> 'accordeon',
			'title'				=> __('Akkordeon'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/accordeon/accordeon.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/accordeon/accordeon.css',
			'enqueue_script'    => get_template_directory_uri() . '/template-parts/blocks/accordeon/accordeon.js',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));

		acf_register_block(array(
			'name'				=> 'cta',
			'title'				=> __('call to action'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/cta/cta.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/cta/cta.css',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));

		acf_register_block(array(
			'name'				=> 'section-headline',
			'title'				=> __('Sektion Headline'),
			'description'		=> __(''),
			'render_template'   => get_template_directory() . '/template-parts/blocks/section-headline/section-headline.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/section-headline/section-headline.css',
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'mode'				=> 'edit',
			'supports' => array( 'mode' => false ,'align' => false )
		));
		
	}
}