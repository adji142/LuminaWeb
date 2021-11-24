<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Email validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_validate_email' ) ) {
  function dustrial_validate_email( $value, $field ) {

    if ( ! sanitize_email( $value ) ) {
      return esc_html__( 'Please write a valid email address!', 'dustrial-framework' );
    }

  }
  add_filter( 'dustrial_validate_email', 'dustrial_validate_email', 10, 2 );
}

/**
 *
 * Numeric validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_validate_numeric' ) ) {
  function dustrial_validate_numeric( $value, $field ) {

    if ( ! is_numeric( $value ) ) {
      return esc_html__( 'Please write a numeric data!', 'dustrial-framework' );
    }

  }
  add_filter( 'dustrial_validate_numeric', 'dustrial_validate_numeric', 10, 2 );
}

/**
 *
 * Required validate
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if( ! function_exists( 'dustrial_validate_required' ) ) {
  function dustrial_validate_required( $value ) {
    if ( empty( $value ) ) {
      return esc_html__( 'Fatal Error! This field is required!', 'dustrial-framework' );
    }
  }
  add_filter( 'dustrial_validate_required', 'dustrial_validate_required' );
}
