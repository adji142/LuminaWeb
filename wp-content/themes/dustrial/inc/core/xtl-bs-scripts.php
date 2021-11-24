<?php 
add_action('wp_enqueue_scripts', 'dustrial_scripts');
/**
 * Enqueue scripts and styles.
 */

/* Enqueue Custom Fonts Script */
function dustrial_fonts_url() {
  $fonts_url = '';
  $subsets = '';
   
  /* Translators: If there are characters in your language that are not
  * supported by fonts, translate this to 'off'. Do not translate
  * into your own language.
  */
  $dustrial_fonts = _x( 'on', 'Hind font: on or off', 'dustrial' );
   
  if ( 'off' !== $dustrial_fonts ) {
    $font_families = array();
     
    if ( 'off' !== $dustrial_fonts ) {

      if(function_exists( 'dustrial_framework_init' ) ) {
        
        $body_typo_data = dustrial_get_option('dustrial_body_font');
        $body_font = $body_typo_data;

        $font_families[] = esc_attr($body_font['family'].':300,400,500,600,700' );
      } else {
        $font_families[] = 'Hind:300,400,500,600,700';
      }
    }
    $query_args = array(
    'family' => urlencode( implode( '|', $font_families ) ),
    'subset' => urlencode($subsets),
    );
    $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

  }
   
  return esc_url_raw( $fonts_url );
}



/** Gutenberg optimization enqueue files.
--------------------------------------------------------------------------------------------------- */
add_action('enqueue_block_editor_assets', 'caros_action_enqueue_block_editor_assets' );
function caros_action_enqueue_block_editor_assets() {
  wp_enqueue_style( 'dustrial-body-fonts', dustrial_fonts_url(), array(), null );
  wp_enqueue_style('dustrial-gutenberg-editor-custom', DUSTRIAL_CSS . '/gutenberg/gutenberg-editor-custom.css' );
  wp_enqueue_style('dustrial-gutenberg-custom', DUSTRIAL_CSS . '/gutenberg/gutenberg-custom.css' );
}

function dustrial_scripts() {
  wp_enqueue_style( 'dustrial-fonts', dustrial_fonts_url(), array(), null );

  /**  css include.
  --------------------------------------------------------------------------------------------------- */
  wp_enqueue_style('bootstrap', DUSTRIAL_CSS . 'bootstrap.min.css');
  wp_enqueue_style('font-awesome', DUSTRIAL_CSS . 'font-awesome.min.css');
  wp_enqueue_style('owl-carousel', DUSTRIAL_CSS . 'owl.carousel.min.css');
  wp_enqueue_style('magnific-popup', DUSTRIAL_CSS . 'magnific-popup.css');
  wp_enqueue_style('flaticon-font', DUSTRIAL_CSS . 'flaticon.css');
  wp_enqueue_style('meanmenu', DUSTRIAL_CSS . 'meanmenu.css');
  wp_enqueue_style('slick', DUSTRIAL_CSS . 'slick.css');
  wp_enqueue_style('animate', DUSTRIAL_CSS . 'animate.min.css');

  wp_enqueue_style('dustrial-gutenberg-custom', DUSTRIAL_CSS . '/gutenberg/gutenberg-custom.css');
  wp_enqueue_style('dustrial-main', DUSTRIAL_CSS . 'dustrial-style.css');
  wp_enqueue_style('dustrial-responsive', DUSTRIAL_CSS . 'dustrial-responsive.css');
  wp_enqueue_style('dustrial-default', DUSTRIAL_CSS . 'dustrial-default.css');

  //Dustrial Core style
  wp_enqueue_style('dustrial-style', get_stylesheet_uri() );

  /**  js include.
  --------------------------------------------------------------------------------------------------------------------*/
  wp_enqueue_script('slick.min', DUSTRIAL_JS . 'slick.min.js', array('jquery'), '1.9.0', true);
  wp_enqueue_script('owl-carousel', DUSTRIAL_JS . 'owl.carousel.min.js', array('jquery'), '2.3.4', true);
  wp_enqueue_script('counterup', DUSTRIAL_JS . 'jquery.counterup.min.js', array('jquery'), '1.0', true);
  wp_enqueue_script('magnific-popup', DUSTRIAL_JS . 'jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true);
  wp_enqueue_script('barfiller', DUSTRIAL_JS . 'jquery.barfiller.js', array('jquery'), '1.0.1', true);
  wp_enqueue_script('waypoints', DUSTRIAL_JS . 'jquery.waypoints.min.js', array('jquery'), '4.0.1', true);
  wp_enqueue_script('wow', DUSTRIAL_JS . 'wow.min.js', array('jquery'), '1.1.2', true);  
  wp_enqueue_script('jquery-meanmenu', DUSTRIAL_JS . 'jquery.meanmenu.min.js', array('jquery'), '2.0.7', true);  
  wp_enqueue_script('bootstrap', DUSTRIAL_JS . 'bootstrap.min.js', array('jquery'), '4.1.3', true);
  wp_enqueue_script('dustrial-script', DUSTRIAL_JS . 'dustrial-script.js', array('jquery'), '1.0.0', true);

  //Localize Script
  wp_localize_script('dustrial-script', 'dustrial_ajax_var', array(
    'admin_ajax_url' => esc_url( admin_url('admin-ajax.php') ),
    'cart_update_pbm' => esc_html__('Cart Update Problem.', 'dustrial')   
  ));

  if(function_exists( 'dustrial_framework_init' ) ) {
   
    $dustrial_strick_menu_enable = dustrial_get_option('dustrial_strick_menu_enable');

    if ( $dustrial_strick_menu_enable == 1 ) {
      wp_add_inline_script( 'dustrial-script', "jQuery(document).ready(function(){
        'use strict';
        // home 1 sticky
        if (jQuery('.h1-navigation-area').length) {
          jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 100) {
              jQuery('.h1-navigation-area').addClass('navbar-fixed-top');
            } else {
              jQuery('.h1-navigation-area').removeClass('navbar-fixed-top');
            }
          });
        }

        // home 2 sticky
        if (jQuery('.h2-navigation-area').length) {
          jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 100) {
              jQuery('.h2-navigation-area').addClass('navbar-fixed-top');
            } else {
              jQuery('.h2-navigation-area').removeClass('navbar-fixed-top');
            }
          });
        }

        // home 3 sticky
        if (jQuery('.h3-navigation-area').length) {
          jQuery(window).on('scroll', function () {
            if (jQuery(window).scrollTop() > 100) {
              jQuery('.h3-navigation-area').addClass('navbar-fixed-top');
            } else {
              jQuery('.h3-navigation-area').removeClass('navbar-fixed-top');
            }
          });
        }

      });" );

    }
  }

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

}

?>