<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

$dustrial_hf_option_enable = dustrial_get_option('dustrial_hf_option_enable');

if ( $dustrial_hf_option_enable == 1 ) {

// -----------------------------------------
// Page Header Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_header_options',
  'title'     => __( 'Custom Page Header Options', 'dustrial' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'page_setting',
      'fields' => array(
        // If selected color is "black or white"
        array(
          'type'    => 'subheading',
          'content' => __( 'Select your header style', 'dustrial' ),
        ),
      
        array(
          'id'          => 'header_style',
          'type'        => 'image_select',
          'title'       => __( 'Header Style', 'dustrial' ),
          'options'     => array(
            'style1'    => DUSTRIAL_PLG_URL. 'assets/imgs/header1.jpg',
            'style2'    => DUSTRIAL_PLG_URL. 'assets/imgs/header2.jpg',
            'style3'    => DUSTRIAL_PLG_URL. 'assets/imgs/header3.jpg',
          ),
        ),

      ),
    ),
    // end: a section

  ),
);

// -----------------------------------------
// Page Footer Metabox Options                    -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_footer_options',
  'title'     => __( 'Custom Page Footer Options', 'dustrial' ),
  'post_type' => 'page',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'page_setting',
      'fields' => array(
        // If selected color is "black or white"
        array(
          'type'    => 'subheading',
          'content' => __( 'Select your footer style', 'dustrial' ),
        ),
      
        array(
          'id'           => 'footer_style',
          'type'         => 'image_select',
          'title'        =>  __( 'Footer Style', 'dustrial' ),
          'options'      => array(
            'style1'    => DUSTRIAL_PLG_URL. 'assets/imgs/footer-1.jpg',
            'style2'    => DUSTRIAL_PLG_URL. 'assets/imgs/footer-2.jpg',
          ),
        ),

      ),
    ),
    // end: a section

  ),
);

}

// -----------------------------------------
// Market Setting                          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_dustrial_service',
  'title'     => __( 'Service Setting', 'dustrial' ),
  'post_type' => 'service',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'dustrial_service',
      'fields' => array(

        array(
          'id'    => 'market_icon',
          'type'  => 'icon',
          'title' => __( 'Service icon', 'dustrial' ),
        ),

      ),
    ),

  ),
);



// -----------------------------------------
// Project Setting                         -
// -----------------------------------------
$options[]    = array(
  'id'        => '_dustrial_our_project',
  'title'     => __( 'Project Setting', 'dustrial' ),
  'post_type' => 'our_project',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'dustrial_project',
      'fields' => array(

        array(
          'type'    => 'subheading',
          'content' => __( 'Project Information', 'dustrial' ),
        ),

        array(
          'id'    => 'project_client',
          'type'  => 'text',
          'title' => __( 'Project Client', 'dustrial' ),
        ),
        array(
          'id'    => 'project_location',
          'type'  => 'text',
          'title' => __( 'Project Location', 'dustrial' ),
        ),
        array(
          'id'    => 'project_date',
          'type'  => 'text',
          'title' => __( 'Project Date', 'dustrial' ),
        ),
        array(
          'id'    => 'project_website',
          'type'  => 'text',
          'title' => __( 'Project Website', 'dustrial' ),
        ),
        array(
          'id'              => 'project_socials',
          'type'            => 'group',
          'title'           => __( 'Social Button', 'dustrial' ),
          'button_title'    => __( 'Add New', 'dustrial' ),
          'accordion_title' => __( 'Add New Field', 'dustrial' ),
          'fields'          => array(

            array(
              'id'          => 'social_icon',
              'type'        => 'icon',
              'title'       => __( 'Social Icon', 'dustrial' ),
            ),
            array(
              'id'          => 'social_link',
              'type'        => 'text',
              'title'       => __( 'Link', 'dustrial' ),
            ),
          ),
        ), 

      ),
    ),

  ),
);



// -----------------------------------------
// Testimonial Setting                          -
// -----------------------------------------
$options[]    = array(
  'id'        => '_dustrial_testimonial',
  'title'     => __( 'Testimonial Setting', 'dustrial' ),
  'post_type' => 'testimonial',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'picker_service',
      'fields' => array(
        array(
          'id'    => 'testimonial_name',
          'type'  => 'text',
          'title' => __( 'Enter Name', 'dustrial' ),
        ),
        array(
          'id'       => 'rewiew_setting',
          'type'     => 'select',
          'title'    => __( 'Select Rating', 'dustrial' ),
          'options'  => array(
            '1' => __( '1 Star', 'dustrial' ),
            '2' => __( '2 Star', 'dustrial' ),
            '3' => __( '3 Star', 'dustrial' ),
            '4' => __( '4 Star', 'dustrial' ),
            '5' => __( '5 Star', 'dustrial' ),
          ),
          'default'  => '5',
        ),

      ),
    ),

  ),
);

// -----------------------------------------
// Team Setting                         -
// -----------------------------------------
$options[]    = array(
  'id'        => '_dustrial_team',
  'title'     => __( 'Team Setting', 'dustrial' ),
  'post_type' => 'team',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'dustrial_team',
      'fields' => array(

        array(
          'type'    => 'subheading',
          'content' => __( 'Team Information', 'dustrial' ),
        ),
        array(
          'id'    => 'team_designation',
          'type'  => 'text',
          'title' => __( 'Team Member Designation', 'dustrial' ),
        ),
        array(
          'id'              => 'team_socials',
          'type'            => 'group',
          'title'           => __( 'Member Social Icon', 'dustrial' ),
          'button_title'    => __( 'Add New Icon', 'dustrial' ),
          'accordion_title' => __( 'Add New Field', 'dustrial' ),
          'fields'          => array(

            array(
              'id'          => 'social_icon',
              'type'        => 'icon',
              'title'       => __( 'Social Icon', 'dustrial' ),
            ),
            array(
              'id'          => 'social_link',
              'type'        => 'text',
              'title'       => __( 'Link', 'dustrial' ),
            ),
          ),
        ), 

      ),
    ),

  ),
);


// -----------------------------------------
// Page Breadcrumb Options                 -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_breadcrumb_options',
  'title'     => __( 'This Page Breadcrumb', 'chariton' ),
  'post_type' => 'page',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'page_setting',
      'fields' => array(
        // If selected color is "black or white"
        array(
          'type'    => 'subheading',
          'content' => __( 'This page breadcrumb settings', 'chariton' ),
        ),
        array(
          'id'          => 'page_breadcrumb_bg_img',
          'type'        => 'image',
          'title'       => __( 'Breadcrumb background image', 'chariton' ),
        ),
        array(
          'id'          => 'page_breadcrumb_title',
          'type'        => 'text',
          'title'       => __( 'Breadcrumb title', 'chariton' ),
        ),

      ),
    ),
    // end: a section

  ),
);


DUSTRIALFramework_Metabox::instance( $options );