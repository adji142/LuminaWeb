<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Get icons from admin ajax
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_get_icons' ) ) {
  function dustrial_get_icons() {

    do_action( 'dustrial_add_icons_before' );

    $jsons = apply_filters( 'dustrial_add_icons_json', glob( DUSTRIAL_DIR . '/fields/icon/*.json' ) );

    if( ! empty( $jsons ) ) {

      foreach ( $jsons as $path ) {

        $object = dustrial_get_icon_fonts( 'fields/icon/'. basename( $path ) );

        if( is_object( $object ) ) {

          echo ( count( $jsons ) >= 2 ) ? '<h4 class="dustrial-icon-title">'. $object->name .'</h4>' : '';

          foreach ( $object->icons as $icon ) {
            echo '<a class="dustrial-icon-tooltip" data-dustrial-icon="'. $icon .'" data-title="'. $icon .'"><span class="dustrial-icon dustrial-selector"><i class="'. $icon .'"></i></span></a>';
          }

        } else {
          echo '<h4 class="dustrial-icon-title">'. esc_html__( 'Error! Can not load json file.', 'dustrial-framework' ) .'</h4>';
        }

      }

    }

    do_action( 'dustrial_add_icons' );
    do_action( 'dustrial_add_icons_after' );

    die();
  }
  add_action( 'wp_ajax_dustrial-get-icons', 'dustrial_get_icons' );
}

/**
 *
 * Export options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_export_options' ) ) {
  function dustrial_export_options() {

    header('Content-Type: plain/text');
    header('Content-disposition: attachment; filename=backup-options-'. gmdate( 'd-m-Y' ) .'.txt');
    header('Content-Transfer-Encoding: binary');
    header('Pragma: no-cache');
    header('Expires: 0');

    echo dustrial_encode_string( get_option( DUSTRIAL_OPTION ) );

    die();
  }
  add_action( 'wp_ajax_dustrial-export-options', 'dustrial_export_options' );
}

/**
 *
 * Set icons for wp dialog
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_set_icons' ) ) {
  function dustrial_set_icons() {

    echo '<div id="dustrial-icon-dialog" class="dustrial-dialog" title="'. esc_html__( 'Add Icon', 'dustrial-framework' ) .'">';
    echo '<div class="dustrial-dialog-header dustrial-text-center"><input type="text" placeholder="'. esc_html__( 'Search a Icon...', 'dustrial-framework' ) .'" class="dustrial-icon-search" /></div>';
    echo '<div class="dustrial-dialog-load"><div class="dustrial-icon-loading">'. esc_html__( 'Loading...', 'dustrial-framework' ) .'</div></div>';
    echo '</div>';

  }
  add_action( 'admin_footer', 'dustrial_set_icons' );
  add_action( 'customize_controls_print_footer_scripts', 'dustrial_set_icons' );
}
