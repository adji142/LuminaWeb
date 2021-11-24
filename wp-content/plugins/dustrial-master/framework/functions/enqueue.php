<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework admin enqueue style and scripts
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_admin_enqueue_scripts' ) ) {
  function dustrial_admin_enqueue_scripts() {

    // admin utilities
    wp_enqueue_media();

    // wp core styles
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_style( 'wp-jquery-ui-dialog' );

    // framework core styles
    wp_enqueue_style( 'dustrial-framework', DUSTRIAL_URI .'/assets/css/dustrial-framework.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'font-awesome', DUSTRIAL_URI .'/assets/css/font-awesome.css', array(), '4.7.0', 'all' );

    if ( DUSTRIAL_ACTIVE_LIGHT_THEME ) {
      wp_enqueue_style( 'dustrial-framework-theme', DUSTRIAL_URI .'/assets/css/dustrial-framework-light.css', array(), "1.0.0", 'all' );
    }

    if ( is_rtl() ) {
      wp_enqueue_style( 'dustrial-framework-rtl', DUSTRIAL_URI .'/assets/css/dustrial-framework-rtl.css', array(), '1.0.0', 'all' );
    }

    // wp core scripts
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-dialog' );
    wp_enqueue_script( 'jquery-ui-sortable' );
    wp_enqueue_script( 'jquery-ui-accordion' );

    // framework core scripts
    wp_enqueue_script( 'dustrial-plugins',    DUSTRIAL_URI .'/assets/js/dustrial-plugins.js',    array(), '1.0.0', true );
    wp_enqueue_script( 'dustrial-framework',  DUSTRIAL_URI .'/assets/js/dustrial-framework.js',  array( 'dustrial-plugins' ), '1.0.0', true );

  }
  add_action( 'admin_enqueue_scripts', 'dustrial_admin_enqueue_scripts' );
}
