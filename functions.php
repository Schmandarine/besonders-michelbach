<?php
/**
 * besonders-michelbach functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package besonders-michelbach
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'besonders_brombach_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function besonders_brombach_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on besonders-michelbach, use a find and replace
		 * to change 'besonders-michelbach' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'besonders-michelbach', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'besonders-michelbach' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'besonders_brombach_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'besonders_brombach_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function besonders_brombach_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'besonders_brombach_content_width', 640 );
}
add_action( 'after_setup_theme', 'besonders_brombach_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function besonders_brombach_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'besonders-michelbach' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'besonders-michelbach' ),
			'before_widget' => '<section id="%1$s" class="p-4 my-4 widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'besonders_brombach_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function besonders_brombach_scripts() {

	wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
	//wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS


	if ( is_admin() ){
		 //wp_enqueue_style( 'besonders-michelbach-gutenberg', get_template_directory_uri(  ) . '/assets/dist/css/custom-gutenberg.css' );
	}
	wp_style_add_data( 'besonders-michelbach-style', 'rtl', 'replace' );

	wp_enqueue_style( 'besonders-michelbach-abovethefold', get_template_directory_uri( ) . '/assets/dist/css/above-the-fold.css' );
	wp_enqueue_style( 'besonders-michelbach-bootstrap', get_template_directory_uri( ) . '/assets/dist/css/custom-bootstrap.css' );
	
	wp_enqueue_script( 'custom-scripts-bundle', get_template_directory_uri() . '/assets/dist/main.bundle.js', array('jquery'), '' , true );
	wp_enqueue_style( 'leaflet-vendor-style', 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css' );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'besonders_brombach_scripts' );


function add_gutenberg_in_footer() {
	wp_enqueue_style( 'besonders-michelbach-main-style', get_template_directory_uri( ) . '/assets/dist/css/style.css' );

	wp_enqueue_style( 'wp-block-library' );
	wp_enqueue_style( 'wp-block-library-theme' );
};
add_action( 'get_footer', 'add_gutenberg_in_footer' );




/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Guternberg Functions
 */
require get_template_directory() . '/inc/gutenberg.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/register-wp-assets.php';


add_action('after_setup_theme', function() {
	add_image_size('karten-beitragsbild', 500, 400, true);
	add_image_size('mobile-hero', 800, 400, true);
	remove_theme_support( 'core-block-patterns' );
});



function jba_disable_editor_fullscreen_by_default() {
	$script = "window.onload = function() { const isFullscreenMode = wp.data.select( 'core/edit-post' ).isFeatureActive( 'fullscreenMode' ); if ( isFullscreenMode ) { wp.data.dispatch( 'core/edit-post' ).toggleFeature( 'fullscreenMode' ); } }";
	wp_add_inline_script( 'wp-blocks', $script );
}
add_action( 'enqueue_block_editor_assets', 'jba_disable_editor_fullscreen_by_default' );


function  markers_endpoint( $request_data ) {
    $args = array(
        'post_type' => 'post',
        'posts_per_page'=>-1, 
        'numberposts'=>-1
    );
    
    $posts = get_posts($args);
    foreach ($posts as $key => $post) {
        $posts[$key]->acf = get_fields($post->ID);
    }
    return  $posts;
}
    
add_action( 'rest_api_init', function () {
    register_rest_route( 'markers/v1', '/post/', array(
        'methods' => 'GET',
        'callback' => 'markers_endpoint'
    ));
});