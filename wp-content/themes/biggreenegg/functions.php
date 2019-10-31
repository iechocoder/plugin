<?php
/**
 * Big Green Egg functions and definitions
 */

if ( ! function_exists( 'biggreenegg_setup' ) ) :
	function biggreenegg_setup() {

		load_theme_textdomain( 'biggreenegg' );

		add_theme_support( 'title-tag' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 240,
				'width'       => 240,
				'flex-height' => true,
			)
		);

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 9999 );

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'biggreenegg' ),
				'social'  => __( 'Social Links Menu', 'biggreenegg' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		// Load default block styles.
		add_theme_support( 'wp-block-styles' );

	}
endif; // biggreenegg_setup
add_action( 'after_setup_theme', 'biggreenegg_setup' );



/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Big Green Egg 1.0
 */
function biggreenegg_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'biggreenegg' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar.', 'biggreenegg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 1', 'biggreenegg' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'biggreenegg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Content Bottom 2', 'biggreenegg' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'biggreenegg' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'biggreenegg_widgets_init' );



/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 */
function biggreenegg_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'biggreenegg_javascript_detection', 0 );

/**
 * Enqueues styles.
 *
 */
function biggreenegg_styles() {

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0' );

	wp_enqueue_style( 'fontsstyle', get_template_directory_uri() . '/fonts/stylesheet.css', array(), '1.0' );

	wp_enqueue_style( 'iconstyle', get_template_directory_uri() . '/icomoon/style.css', array(), '1.0' );

	wp_enqueue_style( 'pluginstyle', get_template_directory_uri() . '/css/plugin.css', array(), '1.0' );

	wp_enqueue_style( 'generalstyle', get_template_directory_uri() . '/css/style.css', array(), '1.0' );

	wp_enqueue_style( 'menustyle', get_template_directory_uri() . '/css/jquery.mmenu.all.css', array(), '1.0' );

	wp_enqueue_style( 'responsivestyle', get_template_directory_uri() . '/css/responsive.css', array(), '1.0' );

	wp_enqueue_style( 'animatestyle', get_template_directory_uri() . '/css/animate.css', array(), '1.0' );

	wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css', array(), '1.0' );
	
}
add_action( 'wp_enqueue_scripts', 'biggreenegg_styles' );

/**
 * Enqueues scripts.
 *
 */
function biggreenegg_scripts() {

	wp_enqueue_script( 'jquerylatest', get_template_directory_uri() . '/js/jquery-1.11.3.min.js', array(), '1.0' );

	wp_enqueue_script( 'menu', get_template_directory_uri() . '/js/jquery.mmenu.all.js', array(), '1.0' );

	wp_enqueue_script( 'aos', get_template_directory_uri() . '/js/aos.js', array(), '1.0' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), '1.0' );
	
}
add_action( 'wp_footer', 'biggreenegg_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function biggreenegg_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 840 <= $width ) {
		$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	}

	if ( 'page' === get_post_type() ) {
		if ( 840 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	} else {
		if ( 840 > $width && 600 <= $width ) {
			$sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		} elseif ( 600 > $width ) {
			$sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'biggreenegg_content_image_sizes_attr', 10, 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function biggreenegg_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		if ( is_active_sidebar( 'sidebar-1' ) ) {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		} else {
			$attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
		}
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'biggreenegg_post_thumbnail_sizes_attr', 10, 3 );

/* Create Header and Footer Options page for ACF*/
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
	acf_add_options_sub_page('Header');
	acf_add_options_sub_page('Footer');
	
}



/* CPT for the Recipe*/

/*
* Creating a function to create our CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Recipes', 'Post Type General Name', 'biggreenegg' ),
        'singular_name'       => _x( 'Recipe', 'Post Type Singular Name', 'biggreenegg' ),
        'menu_name'           => __( 'Recipes', 'biggreenegg' ),
        'parent_item_colon'   => __( 'Parent Recipe', 'biggreenegg' ),
        'all_items'           => __( 'All Recipes', 'biggreenegg' ),
        'view_item'           => __( 'View Recipe', 'biggreenegg' ),
        'add_new_item'        => __( 'Add New Recipe', 'biggreenegg' ),
        'add_new'             => __( 'Add New', 'biggreenegg' ),
        'edit_item'           => __( 'Edit Recipe', 'biggreenegg' ),
        'update_item'         => __( 'Update Recipe', 'biggreenegg' ),
        'search_items'        => __( 'Search Recipe', 'biggreenegg' ),
        'not_found'           => __( 'Not Found', 'biggreenegg' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'biggreenegg' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Recipes', 'biggreenegg' ),
        'description'         => __( 'Recipe news and reviews', 'biggreenegg' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */ 
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
     
    // Registering your Custom Post Type
    register_post_type( 'Recipes', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );