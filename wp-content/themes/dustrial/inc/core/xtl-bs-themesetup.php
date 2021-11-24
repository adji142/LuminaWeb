<?php 
/**  add action with call back function .
--------------------------------------------------------------------------------------------------- */
add_action('after_setup_theme', 'dustrial_content_width', 0);
add_action('after_setup_theme', 'dustrial_setup');

/*------------------------------------------------------------------------------------------------------------------*/
/*	dustrial setup
/*------------------------------------------------------------------------------------------------------------------*/

if ( !function_exists('dustrial_setup') ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
	function dustrial_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dustrial, use a find and replace
		 * to change 'dustrial' to the name of your theme in all the template files
		 */
		load_theme_textdomain('dustrial', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		add_editor_style();


		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );


		/** // Add WooCommerce Support.
		--------------------------------------------------------------------------------------------------- */
		add_theme_support( 'dustrial' );


		/** // Add Custom Image Size.
		--------------------------------------------------------------------------------------------------- */
		add_image_size( 'dustrial-570', 570, 430, TRUE );
		add_image_size( 'dustrial-362', 362, 262, TRUE );
		add_image_size( 'dustrial-350', 350, 215, TRUE );
		add_image_size( 'dustrial-thumb', 100, 80, TRUE );

		//Different ration img for featured market
		add_image_size( 'dustrial-363', 363, 443, TRUE );
		
		/** // This theme uses wp_nav_menu() in one location..
		--------------------------------------------------------------------------------------------------- */
		register_nav_menus(array(
			'primary' => esc_html__('Primary Menu', 'dustrial'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support('post-formats', array(
			'image',
			'video',
			'quote',
			'link',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('dustrial_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));


		//enable custom logo support
		// set up the WordPress custome Logo support
		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 245,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );


		/* - For Woocommerce
		======================================================================================*/
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}
endif; // dustrial_setup


/*------------------------------------------------------------------------------------------------------------------*/
/*	sidebar register
/*------------------------------------------------------------------------------------------------------------------*/
/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 *
 *
**/

function dustrial_widgets_init() {
	register_sidebar(array(
		'name' 			=> esc_html__('Right Sidebar', 'dustrial'),
		'id' 			=> 'right-sidebar',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h6 class="sidebar-recent-blog-title">',
		'after_title'   => '</h6>',
	));
	register_sidebar(array(
		'name' 			=> esc_html__('Footer Widgets 1', 'dustrial'),
		'id' 			=> 'footer-widgets',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s block footer-widget mb-4 mb-lg-0">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h4 class="footer-nav-title text-light">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'name' 			=> esc_html__('Footer Widgets 2', 'dustrial'),
		'id' 			=> 'footer-widgets2',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s block footer-widget mb-4 mb-lg-0">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h4 class="footer-nav-title text-light">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'name' 			=> esc_html__('Footer Widgets 3', 'dustrial'),
		'id' 			=> 'footer-widgets3',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s block footer-widget mb-4 mb-lg-0">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h4 class="footer-nav-title text-light">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'name' 			=> esc_html__('Footer Widgets 4', 'dustrial'),
		'id' 			=> 'footer-widgets4',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s block footer-widget mb-4 mb-lg-0">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h4 class="footer-nav-title text-light">',
		'after_title'   => '</h4>',
	));

	if( function_exists( 'dustrial_framework_init' ) ) {
	    $footer_widget_cols = dustrial_get_option('footer_widget_cols');
	    if (!empty($footer_widget_cols)) {
	      $fw2v = $footer_widget_cols;
	    } else {
	      $fw2v = '3';
	    }
	} else {
	    $fw2v = '3';
	}
	register_sidebar(array(
		'name' 			=> esc_html__('Home Two Footer Widgets', 'dustrial'),
		'id' 			=> 'footer2-widgets',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s col-lg-'.$fw2v.' col-md-6"><div class="block footer-widget2 mb-4 mb-lg-0">',
		'after_widget' 	=> '</div></div>',
		'before_title'  => '<h4 class="footer-nav-title text-light">',
		'after_title'   => '</h4>',
	));
	register_sidebar(array(
		'name' 			=> esc_html__('Service Single Page Widgets', 'dustrial'),
		'id' 			=> 'market-widgets',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s market-widget">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h6 class="sidebar-recent-blog-title">',
		'after_title'   => '</h6>',
	));

	register_sidebar(array(
		'name' 			=> esc_html__('Project Single Page Widgets', 'dustrial'),
		'id' 			=> 'project-widgets',
		'description' 	=> '',
		'before_widget' => '<div id="%1$s" class="%2$s project-widget">',
		'after_widget' 	=> '</div>',
		'before_title'  => '<h6 class="sidebar-recent-blog-title">',
		'after_title'   => '</h6>',
	));

	if ( class_exists( 'woocommerce' ) ) {
		register_sidebar(array(
			'name' 			=> esc_html__('Shop Sidebar', 'dustrial'),
			'id' 			=> 'shop-sidebar',
			'description' 	=> '',
			'before_widget' => '<div id="%1$s" class="sidebar-widget woo-siebar %2$s">',
			'after_widget' 	=> '</div>',
			'before_title'  => '<h6 class="sidebar-recent-blog-title">',
			'after_title'   => '</h6>',
		));
	}
	
}
add_action('widgets_init', 'dustrial_widgets_init');


/*------------------------------------------------------------------------------------------------------------------*/
/*	  $content_width
/*------------------------------------------------------------------------------------------------------------------*/ 
  
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dustrial_content_width() {
	$GLOBALS['content_width'] = apply_filters('dustrial_content_width', 1140);
}