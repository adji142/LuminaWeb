<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Fieldset
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class DUSTRIALFramework_Option_fieldset extends DUSTRIALFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();

    echo '<div class="dustrial-inner">';

    foreach ( $this->field['fields'] as $field ) {

      $field_id      = ( isset( $field['id'] ) ) ? $field['id'] : '';
      $field_default = ( isset( $field['default'] ) ) ? $field['default'] : '';
      $field_value   = ( isset( $this->value[$field_id] ) ) ? $this->value[$field_id] : $field_default;
      $unique_id     = $this->unique .'['. $this->field['id'] .']';

      if ( ! empty( $this->field['un_array'] ) ) {
        echo dustrial_add_element( $field, dustrial_get_option( $field_id ), $this->unique );
      } else {
        echo dustrial_add_element( $field, $field_value, $unique_id );
      }

    }

    echo '</div>';

    echo $this->element_after();

  }

}
