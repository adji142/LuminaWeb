<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Add framework element
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_add_element' ) ) {
  function dustrial_add_element( $field = array(), $value = '', $unique = '' ) {

    $output     = '';
    $depend     = '';
    $sub        = ( isset( $field['sub'] ) ) ? 'sub-': '';
    $unique     = ( isset( $unique ) ) ? $unique : '';
    $languages  = dustrial_language_defaults();
    $class      = 'DUSTRIALFramework_Option_' . $field['type'];
    $wrap_class = ( isset( $field['wrap_class'] ) ) ? ' ' . $field['wrap_class'] : '';
    $el_class   = ( isset( $field['title'] ) ) ? sanitize_title( $field['title'] ) : 'no-title';
    $hidden     = ( isset( $field['show_only_language'] ) && ( $field['show_only_language'] != $languages['current'] ) ) ? ' hidden' : '';
    $is_pseudo  = ( isset( $field['pseudo'] ) ) ? ' dustrial-pseudo-field' : '';

    if ( isset( $field['dependency'] ) ) {
      $hidden  = ' hidden';
      $depend .= ' data-'. $sub .'controller="'. $field['dependency'][0] .'"';
      $depend .= ' data-'. $sub .'condition="'. $field['dependency'][1] .'"';
      $depend .= ' data-'. $sub .'value="'. $field['dependency'][2] .'"';
    }

    $output .= '<div class="dustrial-element dustrial-element-'. $el_class .' dustrial-field-'. $field['type'] . $is_pseudo . $wrap_class . $hidden .'"'. $depend .'>';

    if( isset( $field['title'] ) ) {
      $field_desc = ( isset( $field['desc'] ) ) ? '<p class="dustrial-text-desc">'. $field['desc'] .'</p>' : '';
      $output .= '<div class="dustrial-title"><h4>' . $field['title'] . '</h4>'. $field_desc .'</div>';
    }

    $output .= ( isset( $field['title'] ) ) ? '<div class="dustrial-fieldset">' : '';

    $value   = ( !isset( $value ) && isset( $field['default'] ) ) ? $field['default'] : $value;
    $value   = ( isset( $field['value'] ) ) ? $field['value'] : $value;

    if( class_exists( $class ) ) {
      ob_start();
      $element = new $class( $field, $value, $unique );
      $element->output();
      $output .= ob_get_clean();
    } else {
      $output .= '<p>'. esc_html__( 'This field class is not available!', 'dustrial-framework' ) .'</p>';
    }

    $output .= ( isset( $field['title'] ) ) ? '</div>' : '';
    $output .= '<div class="clear"></div>';
    $output .= '</div>';

    return $output;

  }
}

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_encode_string' ) ) {
  function dustrial_encode_string( $string ) {
    return serialize( $string );
  }
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_decode_string' ) ) {
  function dustrial_decode_string( $string ) {
    return unserialize( $string );
  }
}

/**
 *
 * Get google font from json file
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_get_google_fonts' ) ) {
  function dustrial_get_google_fonts() {

    global $dustrial_google_fonts;

    if( ! empty( $dustrial_google_fonts ) ) {

      return $dustrial_google_fonts;

    } else {

      ob_start();
      dustrial_locate_template( 'fields/typography/google-fonts.json' );
      $json = ob_get_clean();

      $dustrial_google_fonts = json_decode( $json );

      return $dustrial_google_fonts;
    }

  }
}

/**
 *
 * Get icon fonts from json file
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_get_icon_fonts' ) ) {
  function dustrial_get_icon_fonts( $file ) {

    ob_start();
    dustrial_locate_template( $file );
    $json = ob_get_clean();

    return json_decode( $json );

  }
}

/**
 *
 * Array search key & value
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_array_search' ) ) {
  function dustrial_array_search( $array, $key, $value ) {

    $results = array();

    if ( is_array( $array ) ) {
      if ( isset( $array[$key] ) && $array[$key] == $value ) {
        $results[] = $array;
      }

      foreach ( $array as $sub_array ) {
        $results = array_merge( $results, dustrial_array_search( $sub_array, $key, $value ) );
      }

    }

    return $results;

  }
}

/**
 *
 * Getting POST Var
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_get_var' ) ) {
  function dustrial_get_var( $var, $default = '' ) {

    if( isset( $_POST[$var] ) ) {
      return $_POST[$var];
    }

    if( isset( $_GET[$var] ) ) {
      return $_GET[$var];
    }

    return $default;

  }
}

/**
 *
 * Getting POST Vars
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_get_vars' ) ) {
  function dustrial_get_vars( $var, $depth, $default = '' ) {

    if( isset( $_POST[$var][$depth] ) ) {
      return $_POST[$var][$depth];
    }

    if( isset( $_GET[$var][$depth] ) ) {
      return $_GET[$var][$depth];
    }

    return $default;

  }
}

/**
 *
 * Load options fields
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'dustrial_load_option_fields' ) ) {
  function dustrial_load_option_fields() {

    $located_fields = array();

    foreach ( glob( DUSTRIAL_DIR .'/fields/*/*.php' ) as $dustrial_field ) {
      $located_fields[] = basename( $dustrial_field );
      dustrial_locate_template( str_replace(  DUSTRIAL_DIR, '', $dustrial_field ) );
    }

    $override_name = apply_filters( 'dustrial_framework_override', 'dustrial-framework-override' );
    $override_dir  = get_template_directory() .'/'. $override_name .'/fields';

    if( is_dir( $override_dir ) ) {

      foreach ( glob( $override_dir .'/*/*.php' ) as $override_field ) {

        if( ! in_array( basename( $override_field ), $located_fields ) ) {

          dustrial_locate_template( str_replace( $override_dir, '/fields', $override_field ) );

        }

      }

    }

    do_action( 'dustrial_load_option_fields' );

  }
}
