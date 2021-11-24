<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Framework Class
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class DUSTRIALFramework extends DUSTRIALFramework_Abstract {

  /**
   *
   * option database/data name
   * @access public
   * @var string
   *
   */
  public $unique = DUSTRIAL_OPTION;

  /**
   *
   * settings
   * @access public
   * @var array
   *
   */
  public $settings = array();

  /**
   *
   * options tab
   * @access public
   * @var array
   *
   */
  public $options = array();

  /**
   *
   * options section
   * @access public
   * @var array
   *
   */
  public $sections = array();

  /**
   *
   * options store
   * @access public
   * @var array
   *
   */
  public $get_option = array();

  /**
   *
   * instance
   * @access private
   * @var class
   *
   */
  private static $instance = null;

  // run framework construct
  public function __construct( $settings, $options ) {

    $this->settings = apply_filters( 'dustrial_framework_settings', $settings );
    $this->options  = apply_filters( 'dustrial_framework_options', $options );

    if( ! empty( $this->options ) ) {

      $this->sections   = $this->get_sections();
      $this->get_option = get_option( DUSTRIAL_OPTION );
      $this->addAction( 'admin_init', 'settings_api' );
      $this->addAction( 'admin_menu', 'admin_menu' );

    }

  }

  // instance
  public static function instance( $settings = array(), $options = array() ) {
    if ( is_null( self::$instance ) && DUSTRIAL_ACTIVE_FRAMEWORK ) {
      self::$instance = new self( $settings, $options );
    }
    return self::$instance;
  }

  // get sections
  public function get_sections() {

    $sections = array();

    foreach ( $this->options as $key => $value ) {

      if( isset( $value['sections'] ) ) {

        foreach ( $value['sections'] as $section ) {

          if( isset( $section['fields'] ) ) {
            $sections[] = $section;
          }

        }

      } else {

        if( isset( $value['fields'] ) ) {
          $sections[] = $value;
        }

      }

    }

    return $sections;

  }

  // wp settings api
  public function settings_api() {

    $defaults = array();

    register_setting( $this->unique, $this->unique, array( &$this,'validate_save' ) );

    foreach( $this->sections as $section ) {

      if( isset( $section['fields'] ) ) {

        foreach( $section['fields'] as $field_key => $field ) {

          // set default option if isset
          if( isset( $field['default'] ) ) {
            $defaults[$field['id']] = $field['default'];
            if( ! empty( $this->get_option ) && ! isset( $this->get_option[$field['id']] ) ) {
              $this->get_option[$field['id']] = $field['default'];
            }
          }

        }
      }

    }

    // set default variable if empty options and not empty defaults
    if( empty( $this->get_option )  && ! empty( $defaults ) ) {
      update_option( $this->unique, $defaults );
      $this->get_option = $defaults;
    }

  }

  // section fields validate in save
  public function validate_save( $request ) {

    $add_errors = array();
    $section_id = dustrial_get_var( 'dustrial_section_id' );

    // ignore nonce requests
    if( isset( $request['_nonce'] ) ) { unset( $request['_nonce'] ); }

    // import
    if ( isset( $request['import'] ) && ! empty( $request['import'] ) ) {
      $decode_string = dustrial_decode_string( $request['import'] );
      if( is_array( $decode_string ) ) {
        return $decode_string;
      }
      $add_errors[] = $this->add_settings_error( esc_html__( 'Success. Imported backup options.', 'dustrial-framework' ), 'updated' );
    }

    // reset all options
    if ( isset( $request['resetall'] ) ) {
      $add_errors[] = $this->add_settings_error( esc_html__( 'Default options restored.', 'dustrial-framework' ), 'updated' );
      return;
    }

    // reset only section
    if ( isset( $request['reset'] ) && ! empty( $section_id ) ) {
      foreach ( $this->sections as $value ) {
        if( $value['name'] == $section_id ) {
          foreach ( $value['fields'] as $field ) {
            if( isset( $field['id'] ) ) {
              if( isset( $field['default'] ) ) {
                $request[$field['id']] = $field['default'];
              } else {
                unset( $request[$field['id']] );
              }
            }
          }
        }
      }
      $add_errors[] = $this->add_settings_error( esc_html__( 'Default options restored for only this section.', 'dustrial-framework' ), 'updated' );
    }

    // option sanitize and validate
    foreach( $this->sections as $section ) {
      if( isset( $section['fields'] ) ) {
        foreach( $section['fields'] as $field ) {

          // ignore santize and validate if element multilangual
          if ( isset( $field['type'] ) && ! isset( $field['multilang'] ) && isset( $field['id'] ) ) {

            // sanitize options
            $request_value = isset( $request[$field['id']] ) ? $request[$field['id']] : '';
            $sanitize_type = $field['type'];

            if( isset( $field['sanitize'] ) ) {
              $sanitize_type = ( $field['sanitize'] !== false ) ? $field['sanitize'] : false;
            }

            if( $sanitize_type !== false && has_filter( 'dustrial_sanitize_'. $sanitize_type ) ) {
              $request[$field['id']] = apply_filters( 'dustrial_sanitize_' . $sanitize_type, $request_value, $field, $section['fields'] );
            }

            // validate options
            if ( isset( $field['validate'] ) && has_filter( 'dustrial_validate_'. $field['validate'] ) ) {

              $validate = apply_filters( 'dustrial_validate_' . $field['validate'], $request_value, $field, $section['fields'] );

              if( ! empty( $validate ) ) {
                $add_errors[] = $this->add_settings_error( $validate, 'error', $field['id'] );
                $request[$field['id']] = ( isset( $this->get_option[$field['id']] ) ) ? $this->get_option[$field['id']] : '';
              }

            }

          }

          if( ! isset( $field['id'] ) || empty( $request[$field['id']] ) ) {
            continue;
          }

        }
      }
    }

    $request = apply_filters( 'dustrial_validate_save', $request );

    do_action( 'dustrial_validate_save_after', $request );

    // set transient
    $transient_time = ( dustrial_language_defaults() !== false ) ? 30 : 10;
    set_transient( 'dustrial-framework-transient', array( 'errors' => $add_errors, 'section_id' => $section_id ), $transient_time );

    return $request;
  }

  // field callback classes
  public function field_callback( $field ) {
    $value = ( isset( $field['id'] ) && isset( $this->get_option[$field['id']] ) ) ? $this->get_option[$field['id']] : '';
    echo dustrial_add_element( $field, $value, $this->unique );
  }

  public function add_settings_error( $message, $type = 'error', $id = 'global' ) {
    return array( 'setting' => 'dustrial-errors', 'code' => $id, 'message' => $message, 'type' => $type );
  }

  // adding option page
  public function admin_menu() {

    $defaults = array(
      'menu_type'       => '',
      'menu_parent'     => '',
      'menu_title'      => '',
      'menu_slug'       => '',
      'menu_capability' => 'manage_options',
      'menu_icon'       => null,
      'menu_position'   => null,
    );

    $args = wp_parse_args( $this->settings, $defaults );

    extract( $args );

    if( $menu_type === 'submenu' ) {
      add_submenu_page( $menu_parent, $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ) );
    } else if( $menu_type === 'management' ) {
      add_management_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    } else if( $menu_type === 'dashboard' ) {
      add_dashboard_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    } else if( $menu_type === 'options' ) {
      add_options_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    } else if( $menu_type === 'plugins' ) {
      add_plugins_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    } else if( $menu_type === 'theme' ) {
      add_theme_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    } else {
      add_menu_page( $menu_title, $menu_title, $menu_capability, $menu_slug, array( &$this, 'admin_page' ), $menu_icon, $menu_position );
    }

  }

  // option page html output
  public function admin_page() {

    $transient  = get_transient( 'dustrial-framework-transient' );
    $has_nav    = ( count( $this->options ) <= 1 ) ? ' dustrial-show-all' : '';
    $section_id = ( ! empty( $transient['section_id'] ) ) ? $transient['section_id'] : $this->sections[0]['name'];
    $section_id = dustrial_get_var( 'dustrial-section', $section_id );

    echo '<div class="dustrial-framework dustrial-option-framework">';

      echo '<form method="post" action="options.php" enctype="multipart/form-data" id="csframework_form">';
      echo '<input type="hidden" class="dustrial-reset" name="dustrial_section_id" value="'. $section_id .'" />';

      if( $this->settings['ajax_save'] !== true && ! empty( $transient['errors'] ) ) {

        global $dustrial_errors;

        $dustrial_errors = $transient['errors'];

        if ( ! empty( $dustrial_errors ) ) {
          foreach ( $dustrial_errors as $error ) {
            if( in_array( $error['setting'], array( 'general', 'dustrial-errors' ) ) ) {
              echo '<div class="dustrial-settings-error '. $error['type'] .'">';
              echo '<p><strong>'. $error['message'] .'</strong></p>';
              echo '</div>';
            }
          }
        }

      }

      settings_fields( $this->unique );

      echo '<header class="dustrial-header">';
      echo '<h1>'. $this->settings['framework_title'] .'</h1>';
      echo '<fieldset>';

      echo ( $this->settings['ajax_save'] ) ? '<span id="dustrial-save-ajax">'. esc_html__( 'Settings saved.', 'dustrial-framework' ) .'</span>' : '';

      submit_button( esc_html__( 'Save', 'dustrial-framework' ), 'primary dustrial-save', 'save', false, array( 'data-save' => esc_html__( 'Saving...', 'dustrial-framework' ) ) );
      submit_button( esc_html__( 'Restore', 'dustrial-framework' ), 'secondary dustrial-restore dustrial-reset-confirm', $this->unique .'[reset]', false );

      // if( $this->settings['show_reset_all'] ) {
      //   submit_button( esc_html__( 'Reset All Options', 'dustrial-framework' ), 'secondary dustrial-restore dustrial-warning-primary dustrial-reset-confirm', $this->unique .'[resetall]', false );
      // }

      if( $this->settings['show_reset_all'] ) {
        submit_button( esc_html__( 'Reset All Options', 'cs-framework' ), 'secondary cs-restore cs-warning-primary cs-reset-confirm', $this->unique .'[resetall]', false );
      }

      echo '</fieldset>';
      echo ( empty( $has_nav ) ) ? '<a href="#" class="dustrial-expand-all"><i class="fa fa-eye-slash"></i> '. esc_html__( 'show all options', 'dustrial-framework' ) .'</a>' : '';
      echo '<div class="clear"></div>';
      echo '</header>'; // end .dustrial-header

      echo '<div class="dustrial-body'. $has_nav .'">';

        echo '<div class="dustrial-nav">';

          echo '<ul>';
          foreach ( $this->options as $key => $tab ) {

            if( ( isset( $tab['sections'] ) ) ) {

              $tab_active   = dustrial_array_search( $tab['sections'], 'name', $section_id );
              $active_style = ( ! empty( $tab_active ) ) ? ' style="display: block;"' : '';
              $active_list  = ( ! empty( $tab_active ) ) ? ' dustrial-tab-active' : '';
              $tab_icon     = ( ! empty( $tab['icon'] ) ) ? '<i class="dustrial-icon '. $tab['icon'] .'"></i>' : '';

              echo '<li class="dustrial-sub'. $active_list .'">';

                echo '<a href="#" class="dustrial-arrow">'. $tab_icon . $tab['title'] .'</a>';

                echo '<ul'. $active_style .'>';
                foreach ( $tab['sections'] as $tab_section ) {

                  $active_tab = ( $section_id == $tab_section['name'] ) ? ' class="dustrial-section-active"' : '';
                  $icon = ( ! empty( $tab_section['icon'] ) ) ? '<i class="dustrial-icon '. $tab_section['icon'] .'"></i>' : '';

                  echo '<li><a href="#"'. $active_tab .' data-section="'. $tab_section['name'] .'">'. $icon . $tab_section['title'] .'</a></li>';

                }
                echo '</ul>';

              echo '</li>';

            } else {

              $icon = ( ! empty( $tab['icon'] ) ) ? '<i class="dustrial-icon '. $tab['icon'] .'"></i>' : '';

              if( isset( $tab['fields'] ) ) {

                $active_list = ( $section_id == $tab['name'] ) ? ' class="dustrial-section-active"' : '';
                echo '<li><a href="#"'. $active_list .' data-section="'. $tab['name'] .'">'. $icon . $tab['title'] .'</a></li>';

              } else {

                echo '<li><div class="dustrial-seperator">'. $icon . $tab['title'] .'</div></li>';

              }

            }

          }
          echo '</ul>';

        echo '</div>'; // end .dustrial-nav

        echo '<div class="dustrial-content">';

          echo '<div class="dustrial-sections">';

          foreach( $this->sections as $section ) {

            if( isset( $section['fields'] ) ) {

              $active_content = ( $section_id == $section['name'] ) ? ' style="display: block;"' : '';
              echo '<div id="dustrial-tab-'. $section['name'] .'" class="dustrial-section"'. $active_content .'>';
              echo ( isset( $section['title'] ) && empty( $has_nav ) ) ? '<div class="dustrial-section-title"><h3>'. $section['title'] .'</h3></div>' : '';

              foreach( $section['fields'] as $field ) {
                $this->field_callback( $field );
              }

              echo '</div>';

            }

          }

          echo '</div>'; // end .dustrial-sections

          echo '<div class="clear"></div>';

        echo '</div>'; // end .dustrial-content

        echo '<div class="dustrial-nav-background"></div>';

      echo '</div>'; // end .dustrial-body

      echo '<footer class="dustrial-footer">';
      echo '<div class="dustrial-block-left">Developed By <a class="ifinger-class" target="_blank" href="https://ifingerstudio.com">Ifinger Studio</a></div>';
      echo '<div class="dustrial-block-right">Version '. DUSTRIAL_VERSION .'</div>';
      echo '<div class="clear"></div>';
      echo '</footer>'; // end .dustrial-footer

      echo '</form>'; // end form

      echo '<div class="clear"></div>';

    echo '</div>'; // end .dustrial-framework

  }

}
