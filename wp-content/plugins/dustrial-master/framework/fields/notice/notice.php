<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: Notice
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class DUSTRIALFramework_Option_notice extends DUSTRIALFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output() {

    echo $this->element_before();
    echo '<div class="dustrial-notice dustrial-'. $this->field['class'] .'">'. $this->field['content'] .'</div>';
    echo $this->element_after();

  }

}
