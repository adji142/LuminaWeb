<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Icon
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class DUSTRIALFramework_Option_icon extends DUSTRIALFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    $value  = $this->element_value();
    $hidden = ( empty( $value ) ) ? ' hidden' : '';

    echo '<div class="dustrial-icon-select">';
    echo '<span class="dustrial-icon-preview'. $hidden .'"><i class="'. $value .'"></i></span>';
    echo '<a href="#" class="button button-primary dustrial-icon-add">'. esc_html__( 'Add Icon', 'dustrial-framework' ) .'</a>';
    echo '<a href="#" class="button dustrial-warning-primary dustrial-icon-remove'. $hidden .'">'. esc_html__( 'Remove Icon', 'dustrial-framework' ) .'</a>';
    echo '<input type="text" name="'. $this->element_name() .'" value="'. $value .'"'. $this->element_class( 'dustrial-icon-value' ) . $this->element_attributes() .' />';
    echo '</div>';

    echo $this->element_after();

  }

}
