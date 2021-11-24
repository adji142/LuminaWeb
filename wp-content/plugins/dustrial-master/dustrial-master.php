<?php 
/*
Plugin Name: Dustrial Master
Plugin URI: http://pluginspoint.com/dustrialwp/
Author: Johanspond
Description: After installing the Dustrial Theme, you need to install the "Dustrial Master" plugin first to get all features.
Author URI: http://pluginspoint.com/
Version: 4.0.0
Text Domain: dustrial
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit;

/*------------------------------------------------------------------------------------------------------------------*/
/*  Plugin define.
/*------------------------------------------------------------------------------------------------------------------*/
define( 'DUSTRIAL_PLG_URL', plugin_dir_url( __FILE__ ) );
define( 'DUSTRIAL_PLG_DIR', dirname( __FILE__ ) );
define( 'DUSTRIAL_PLG_DEMO_PATH', dirname( __FILE__ ) . '/demo-importer/' );
define( 'DUSTRIAL_PLG_DEMO_URL', plugin_dir_url( __FILE__ ) . 'demo-importer/' );


  # load plugin textdomain
  function dustrial_master_load_textdomain(){
    load_plugin_textdomain('dustrial', false, dirname(plugin_basename( __FILE__ )) . '/languages/');
  }
  add_action('plugins_loaded', 'dustrial_master_load_textdomain');


/*------------------------------------------------------------------------------------------------------------------*/
/*  Plugin action and filter hook.
/*------------------------------------------------------------------------------------------------------------------*/
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'dustrial_plugin_action_links' );
add_filter( 'plugin_row_meta', 'custom_plugin_row_meta', 10, 2 );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Plugin include files.
/*------------------------------------------------------------------------------------------------------------------*/
require_once DUSTRIAL_PLG_DIR . '/inc/dm-admin.php';
require_once DUSTRIAL_PLG_DIR . '/inc/custom-style.php';
require_once DUSTRIAL_PLG_DIR . '/inc/custom-widgets.php';
require_once DUSTRIAL_PLG_DIR . '/inc/custom-posttype.php';
require_once DUSTRIAL_PLG_DIR . '/inc/helper.php';


/*------------------------------------------------------------------------------------------------------------------*/
/*  Theme option framework.
/*------------------------------------------------------------------------------------------------------------------*/
require_once DUSTRIAL_PLG_DIR . '/framework/dustrial-framework.php';


/* Visual composer addons style
=====================================================*/
add_action( 'wp_enqueue_scripts', 'dustrial_extra_master_scripts' );
function dustrial_extra_master_scripts() {
  // Css
  wp_enqueue_style('dustrial-visual-composer-css', DUSTRIAL_PLG_URL . 'assets/admin/visual-composer.css' , array(), '' );
  wp_enqueue_style('smoothbox', DUSTRIAL_PLG_URL . 'assets/css/smoothbox-min.css' , array(), '' );
  wp_enqueue_style('viewer', DUSTRIAL_PLG_URL . 'assets/css/viewer.css' , array(), '' );
  wp_enqueue_style('dustrial-master-css', DUSTRIAL_PLG_URL . 'assets/css/dustrial-master.css' , array(), '' );

  // Js
  wp_enqueue_script('imagesloaded');
  wp_enqueue_script('smoothbox', DUSTRIAL_PLG_URL . 'assets/js/smoothbox-min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('viewer', DUSTRIAL_PLG_URL . 'assets/js/viewer.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('isotope', DUSTRIAL_PLG_URL . 'assets/js/isotope.pkgd.min.js', array('jquery'), '1.0.0', true);
  wp_enqueue_script('dustrial-master', DUSTRIAL_PLG_URL . 'assets/js/dustrial-master.js', array('jquery'), '1.0.0', true);
}

/* Visual composer addons style
=====================================================*/
add_action( 'admin_enqueue_scripts', 'dustrial_master_scripts' );
function dustrial_master_scripts() {
  wp_enqueue_style('dustrial-visual-composer', DUSTRIAL_PLG_URL . 'assets/admin/visual-composer.css' , array(), '' );
  wp_enqueue_style('dustrial-admin-style', DUSTRIAL_PLG_URL . 'assets/admin/dustrial-admin-style.css' , array(), '' );
  wp_enqueue_style('dustrial-flaticon', DUSTRIAL_PLG_URL . '/assets/css/flaticon.css');
}


/**  shortcode.
--------------------------------------------------------------------------------------------------- */
require_once DUSTRIAL_PLG_DIR . '/shortcodes/xtl-shortcode-action.php';


/*------------------------------------------------------------------------------------------------------------------*/
/* Dustrial Demo Import
/*------------------------------------------------------------------------------------------------------------------*/ 

require_once DUSTRIAL_PLG_DIR . '/demo-importer/demo-import.php';