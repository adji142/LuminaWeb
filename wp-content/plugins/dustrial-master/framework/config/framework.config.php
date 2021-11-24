<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings           = array(
  'menu_title'      => __( 'Theme Options', 'dustrial' ),
  'menu_type'       => 'menu', // menu, submenu, options, theme, etc.
  'menu_slug'       => 'dustrial',
  'ajax_save'       => false,
  'show_reset_all'  => false,
  'framework_title' => __( 'Dustrial <small> by Johanspond v:4.0.0 </small>', 'dustrial' ),
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();



/*-----------------------------------------------------------------------------------------*
*   Genaral Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'genaral',
  'title'       => __( 'General Settings', 'dustrial' ),
  'icon'        => 'fa fa-home',
   // begin: fields
  'fields'      => array(
    array(
      'type'    => 'heading',
      'content' => __( 'Site Icon Settings', 'dustrial' ),
    ),
    array(
      'id'         => 'dustrial_site_icon',
      'type'       => 'image',
      'title'      => __( 'Upload Favicon Icon', 'dustrial' ),
      'default'    => DUSTRIAL_PLG_URL. 'assets/imgs/favicon.png',
      'desc'       => __( 'Recommended size is 80x80 .png file', 'dustrial' ),
    ),
    array(
      'type'    => 'heading',
      'content' => __( 'Logo Settings', 'dustrial' ),
    ),
    array(
      'id'          => 'dustrial_logo_img',
      'type'        => 'image',
      'title'       => __( 'Upload Main Header Logo', 'dustrial' ),
      'default'     => DUSTRIAL_PLG_URL. 'assets/imgs/logo-1.png',
      'desc'        => __( 'Upload your Best size logo for main header', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_logo_img_width',
      'type'    => 'text',
      'title'   => __( 'Logo image width', 'dustrial' ),
      'default' => __( '165px', 'dustrial' ),
      'desc'        => __( 'Manage your default logo image width.', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_mobile_img_width',
      'type'    => 'text',
      'title'   => __( 'Mobile Logo image width', 'dustrial' ),
      'desc'        => __( 'Manage your logo size in mobile device. Example:165px', 'dustrial' ),
    ),
    array(
      'id'          => 'dustrial_logo2_img',
      'type'        => 'image',
      'title'       => __( 'Upload Secondary Header Logo', 'dustrial' ),
      'default'     => DUSTRIAL_PLG_URL. 'assets/imgs/logo-2.png',
      'desc'        => __( 'Upload your Best size Transparent logo for secondary header', 'dustrial' ),
    ),
    array(
      'type'    => 'heading',
      'content' => __( 'Default Header/Footer Settings', 'dustrial' ),
    ),
    array(
      'id'          => 'default_header_style',
      'type'        => 'image_select',
      'title'       => __( 'Choose Default Header Style', 'dustrial' ),
      'desc'        => __( 'Choose Default Header Style.', 'dustrial' ),
      'options'     => array(
        'style1'    => DUSTRIAL_PLG_URL. 'assets/imgs/header1.jpg',
        'style2'    => DUSTRIAL_PLG_URL. 'assets/imgs/header2.jpg',
        'style3'    => DUSTRIAL_PLG_URL. 'assets/imgs/header3.jpg',
      ),
      'attributes'       => array(
        'data-depend-id' => 'default_header_style',
      ),
    ),
    array(
      'id'           => 'default_footer_style',
      'type'         => 'image_select',
      'title'        =>  __( 'Choose Default Footer Style', 'dustrial' ),
      'desc'         => __( 'Choose Default Footer Style.', 'dustrial' ),
      'options'      => array(
        'style1'     => DUSTRIAL_PLG_URL. 'assets/imgs/footer-1.jpg',
        'style2'     => DUSTRIAL_PLG_URL. 'assets/imgs/footer-2.jpg',
      ),
    ),
    array(
      'id'         => 'dustrial_hf_option_enable',
      'type'       => 'switcher',
      'title'      => __( 'Header Footer On/Off Page Option', 'dustrial' ),
      'desc'       => __( 'If you want to hide header footer image select option from page create option', 'dustrial' ),
      'default'    => true,
    ),

    array(
      'type'    => 'heading',
      'content' => __( 'Breadcrumb Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'dst_breadcrumb_padding',
      'type'    => 'text',
      'title'   => __( 'Breadcrumb Area Padding', 'dustrial' ),
      'default' => __( '75px', 'dustrial' ),
      'desc'    => __( 'Breadcrumb Area Padding. default padding:75px', 'dustrial' ),
    ),
    array(
      'id'             => 'breatcrumb_bg_img',
      'type'           => 'image',
      'title'          => __( 'Breadcrumb Background Image', 'dustrial' ),
      'default'        => DUSTRIAL_PLG_URL. 'assets/imgs/breadcumb-bg.jpg',
      'desc'           => __( 'Upload Breadcrumb background image. Recommended image size is 1920x320 jpg/png file. upload compress image for better performance.', 'dustrial' ),
    ),
    array(
      'id'             => 'breatcrumb_overlay_color',
      'type'           => 'color_picker',
      'title'          => __( 'Breadcrumb Overlay Color', 'dustrial' ),
      'default'        => '#061538',
      'desc'           => __( 'Choose Breadcrumb Overlay Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'breatcrumb_overlay_opacity',
      'type'           => 'select',
      'title'          => 'Breadcrumb Overlay Opacity',
      'desc'           => __( 'Choose Breadcrumb Overlay Opacity.', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        '0.1'          => '0.1',
        '0.2'          => '0.2',
        '0.3'          => '0.3',
        '0.4'          => '0.4',
        '0.5'          => '0.5',
        '0.6'          => '0.6',
        '0.7'          => '0.7',
        '0.8'          => '0.8',
        '0.9'          => '0.9',
      ),
      'default_option' => '0.6',
      'info'           => 'Choose your overlay opacity.',
      'attributes'     => array(
        'style'        => 'width: 84px;'
      ),
    ),
    array(
      'id'             => 'breatcrumb_text_transform',
      'type'           => 'select',
      'title'          => 'Breadcrumb Text Transform',
      'desc'           => __( 'Choose breadcrumb text transform', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        'none'         => 'Default',
        'uppercase'    => 'Uppercase',
        'lowercase'    => 'Lowercase',
        'capitalize'   => 'Capitalized',
      ),
      'default_option' => 'Select text transform',
      'attributes'     => array(
        'style'        => 'width: 150px;'
      ),
    ),
    array(
      'id'         => 'dustrial_breadcrumb_meta_switch',
      'type'       => 'switcher',
      'title'      => __( 'Breadcrumb meta switch', 'dustrial' ),
      'desc'       => __( 'If you want to hide breadcrumb meta option, please do it.', 'dustrial' ),
      'default'    => true,
    ),


    array(
      'type'           => 'heading',
      'content'        => __( 'Switcher Settings', 'dustrial' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Preloader', 'dustrial' ),
    ),
    array(
      'id'             => 'dustrial_preloader_enable',
      'type'           => 'switcher',
      'title'          => __( 'Preloader on?', 'dustrial' ),
      'desc'           => __( 'Enable/Disable Site Preloader.', 'dustrial' ),
    ),
    array(
      'id'             => 'preloader_anim_color',
      'type'           => 'color_picker',
      'title'          => __( 'Preloader Animation Color', 'dustrial' ),
      'desc'           => __( 'Choose your favorite Preloader color.', 'dustrial' ),
      'default'        => '#FF5E14',
      'dependency'     => array( 'dustrial_preloader_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'preloader_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Preloader Background Color', 'dustrial' ),
      'desc'       => __( 'Choose your favorite Preloader background color.', 'dustrial' ),
      'default'    => '#ffffff',
      'dependency' => array( 'dustrial_preloader_enable', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Sticky Menu Settings', 'dustrial' ),
    ),
    array(
      'id'         => 'dustrial_strick_menu_enable',
      'type'       => 'switcher',
      'title'      => __( 'Sticky Menu Off?', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Sticky Menu.', 'dustrial' ),
      'default'    => true,
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Sticky Menu One Options', 'dustrial' ),
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Menu background color', 'dustrial' ),
      'desc'       => __( 'Choose sticky menu background color.', 'dustrial' ),
      'default'    => '#fff',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_text_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Menu Text color', 'dustrial' ),
      'desc'       => __( 'Choose sticky menu text color.', 'dustrial' ),
      'default'    => '#242424',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_woo_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Cart Icon color', 'dustrial' ),
      'desc'       => __( 'Choose sticky cart icon color.', 'dustrial' ),
      'default'    => '',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_search_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Search Icon color', 'dustrial' ),
      'desc'       => __( 'Choose sticky Search icon color.', 'dustrial' ),
      'default'    => '',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_quote_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Background Color', 'dustrial' ),
      'desc'       => __( 'Sticky Quote Background Color.', 'dustrial' ),
      'default'    => '',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_quote_text_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Text Color', 'dustrial' ),
      'desc'       => __( 'Choose Sticky Quote Text Color.', 'dustrial' ),
      'default'    => '',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky_quote_border_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Border Color', 'dustrial' ),
      'desc'       => __( 'Choose Sticky Quote Border Color.', 'dustrial' ),
      'default'    => '',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),



    array(
      'type'    => 'subheading',
      'content' => __( 'Sticky Menu Two & Three Options', 'dustrial' ),
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Menu background color', 'dustrial' ),
      'desc'       => __( 'Choose sticky menu background color.', 'dustrial' ),
      'default'    => '#061538',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),

    array(
      'id'         => 'dustrial_sticky2_text_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Menu Text color', 'dustrial' ),
      'desc'       => __( 'Choose sticky menu text color.', 'dustrial' ),
      'default'    => '#fff',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_woo_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Cart Icon color', 'dustrial' ),
      'desc'       => __( 'Choose sticky cart icon color.', 'dustrial' ),
      'default'    => '#ff5e14',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_search_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Search Icon color', 'dustrial' ),
      'desc'       => __( 'Choose sticky Search icon color.', 'dustrial' ),
      'default'    => '#ff5e14',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_quote_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Background Color', 'dustrial' ),
      'desc'       => __( 'Sticky Quote Background Color.', 'dustrial' ),
      'default'    => '#ff5e14',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_quote_text_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Text Color', 'dustrial' ),
      'desc'       => __( 'Choose Sticky Quote Text Color.', 'dustrial' ),
      'default'    => '#fff',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_sticky2_quote_border_color',
      'type'       => 'color_picker',
      'title'      => __( 'Sticky Quote Border Color', 'dustrial' ),
      'desc'       => __( 'Choose Sticky Quote Border Color.', 'dustrial' ),
      'default'    => '#ff5e14',
      'dependency' => array( 'dustrial_strick_menu_enable', '==', 'true' ),
    ),


    array(
      'type'    => 'subheading',
      'content' => __( 'Back To Top Settings', 'dustrial' ),
    ),
    array(
      'id'         => 'dustrial_back_to_top',
      'type'       => 'switcher',
      'title'      => __( 'Back To Top Button Switch', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Scroll To Top Button', 'dustrial' ),
      'default'    => true,
    ),
    array(
      'id'         => 'dustrial_back_to_top_bg_color',
      'type'       => 'color_picker',
      'title'      => __( 'Back To Top background color', 'dustrial' ),
      'desc'       => __( 'Back to top background color plate.', 'dustrial' ),
      'default'    => '#ff5e14',
      'dependency' => array( 'dustrial_back_to_top', '==', 'true' ),
    ),
    array(
      'id'         => 'dustrial_back_to_top_icon_color',
      'type'       => 'color_picker',
      'title'      => __( 'Back To Top icon color', 'dustrial' ),
      'desc'       => __( 'Back to top icon color plate.', 'dustrial' ),
      'default'    => '#ffffff',
      'dependency' => array( 'dustrial_back_to_top', '==', 'true' ),
    ),
  
  )
);



/*-----------------------------------------------------------------------------------------*
*   Typography Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'typography',
  'title'       => __( 'Typography Settings', 'dustrial' ),
  'icon'        => 'fa fa-font',
   // begin: fields
  'fields'      => array(

    array(
      'type'    => 'heading',
      'content' => __( 'Font Family Settings', 'dustrial' ),
    ),
    array(
      'id'        => 'dustrial_body_font',
      'type'      => 'typography',
      'title'     => 'Choose Body Font',
      'desc'      => __( 'Choose website font family.', 'dustrial' ),
      'default'   => array(
        'family'  => 'Hind',
        'variant' => '400',
        'font'    => 'google', // this is helper for output
      ),
      'variant'   => false,
    ),

    array(
      'type'    => 'heading',
      'content' => __( 'Theme Base Color', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_base_color',
      'type'    => 'color_picker',
      'title'   => __( 'Theme Base Color', 'dustrial' ),
      'desc'       => __( 'Change theme default Base color with your favourite color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),

    array(
      'type'    => 'heading',
      'content' => __( 'Top Header Color', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_top_hv1_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Background Color', 'dustrial' ),
      'desc'       => __( 'Change top header 1 background color with your favourite color.', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'      => 'dustrial_top_hv1_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Font Color', 'dustrial' ),
      'desc'       => __( 'Change top header 1 font color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv1_icon_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Icon Font Color', 'dustrial' ),
      'desc'       => __( 'Change top header 1 icon font color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv1_social_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Social Icon Color', 'dustrial' ),
      'desc'       => __( 'Change top header 1 social icon color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv1_socialhover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Social Hover Color', 'dustrial' ),
      'desc'    => __( 'Change top header 1 social icon hover color with your favourite color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
    array(
      'id'      => 'dustrial_top_hv1_linkhover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 1 Link Hover Color', 'dustrial' ),
      'desc'       => __( 'Change top header 1 link hover color with your favourite color.', 'dustrial' ),
      'default' => '#f76b2b',
    ),





    array(
      'type'    => 'heading',
      'content' => __( 'Header Two Top Part Color Settings', 'dustrial' ),
    ),

    array(
      'id'      => 'dustrial_top_hv2_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Background Color', 'dustrial' ),
      'desc'       => __( 'Change top header 2 background color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv2_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Font Color', 'dustrial' ),
      'desc'       => __( 'Change top header 2 font color with your favourite color.', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'      => 'dustrial_top_hv2_icon_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Icon Font Color', 'dustrial' ),
      'desc'    => __( 'Change top header 2 icon font color with your favourite color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
    array(
      'id'      => 'dustrial_top_hv2_social_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Social Icon Color', 'dustrial' ),
      'desc'    => __( 'Change top header 2 social icon color with your favourite color.', 'dustrial' ),
      'default' => '#868686',
    ),
    array(
      'id'      => 'dustrial_top_hv2_socialhover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Social Hover Color', 'dustrial' ),
      'desc'    => __( 'Change top header 2 social icon hover color with your favourite color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
    array(
      'id'      => 'dustrial_top_hv2_linkhover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 2 Link Hover Color', 'dustrial' ),
      'desc'       => __( 'Change top header 2 link hover color with your favourite color.', 'dustrial' ),
      'default' => '#f76b2b',
    ),


    array(
      'type'    => 'heading',
      'content' => __( 'Header Three Top Part Color Settings', 'dustrial' ),
    ),

    array(
      'id'      => 'dustrial_top_hv3_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Background Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 background color with your favourite color.', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'      => 'dustrial_top_hv3_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Font Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 font color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv3_border_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Item Border Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 item border color with your favourite color.', 'dustrial' ),
      'default' => '#c7c5c5',
    ),
    array(
      'id'      => 'dustrial_top_hv3_icon_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Icon Font Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 icon font color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv3_social_font_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Social Icon Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 social font color with your favourite color.', 'dustrial' ),
      'default' => '#fff',
    ),
    array(
      'id'      => 'dustrial_top_hv3_linkhover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Top Header 3 Link Hover Color', 'dustrial' ),
      'desc'       => __( 'Change top header 3 link hover color with your favourite color.', 'dustrial' ),
      'default' => '#f76b2b',
    ),

    array(
      'type'    => 'heading',
      'content' => __( 'Menu Color Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'menu_font_size',
      'type'    => 'text',
      'title'   => __( 'Menu Font Size', 'dustrial' ),
      'default' => __( '15px', 'dustrial' ),
      'desc'    => __( 'Default Menu Font Size. default font-size:15px', 'dustrial' ),
      'attributes'     => array(
        'style'        => 'width: 150px;'
      ),
    ),
    array(
      'id'             => 'menu_font_weight',
      'type'           => 'select',
      'title'          => 'Menu Font Weight',
      'desc'           => __( 'Choose default menu font weight', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        '600'        => '600',
        '500'        => '500',
        '400'        => '400',
        '300'        => '300',
      ),
      'attributes'     => array(
        'style'        => 'width: 150px;'
      ),
    ),
    array(
      'id'             => 'menu_text_transform',
      'type'           => 'select',
      'title'          => 'Menu Text Transform',
      'desc'           => __( 'Choose default menu text transform', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        'uppercase'    => 'Uppercase',
        'lowercase'    => 'Lowercase',
        'capitalize'   => 'Capitalized',
        'unset'        => 'Default',
      ),
      'attributes'     => array(
        'style'        => 'width: 150px;'
      ),
    ),
    array(
      'id'             => 'menu_drop_transform',
      'type'           => 'select',
      'title'          => 'Menu Dropdown Text Transform',
      'desc'           => __( 'Choose dropdown menu text transform', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        'capitalize'   => 'Capitalized',
        'uppercase'    => 'Uppercase',
        'lowercase'    => 'Lowercase',
        'unset'        => 'Default',
      ),
      'attributes'     => array(
        'style'        => 'width: 150px;'
      ),
    ),
    array(
      'id'      => 'dustrial_menus_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Menu background color', 'dustrial' ),
      'desc'    => __( 'Change your theme dropdown menu background color.', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'      => 'dustrial_menus_hover_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Menu hover background color', 'dustrial' ),
      'desc'    => __( 'Change your theme menu hover background color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
    array(
      'id'      => 'dustrial_menus_text_color',
      'type'    => 'color_picker',
      'title'   => __( 'Menu text color', 'dustrial' ),
      'desc'    => __( 'Change your theme menu text color.', 'dustrial' ),
      'default' => '#ffffff',
    ),
    array(
      'id'      => 'dustrial_menus_hover_text_color',
      'type'    => 'color_picker',
      'title'   => __( 'Menu hover text color', 'dustrial' ),
      'desc'    => __( 'Change your theme menu hover text color.', 'dustrial' ),
      'default' => '#ffffff',
    ),


    array(
      'type'    => 'heading',
      'content' => __( 'Button Color Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_btn_bg_color',
      'type'    => 'color_picker',
      'title'   => __( 'Button background color', 'dustrial' ),
      'desc'       => __( 'Change theme all button bg color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
    array(
      'id'      => 'dustrial_btn_text_color',
      'type'    => 'color_picker',
      'title'   => __( 'Button text color', 'dustrial' ),
      'desc'       => __( 'Change theme all button text color.', 'dustrial' ),
      'default' => '#ffffff',
    ),
    array(
      'id'      => 'dustrial_btn_bg_hover_color',
      'type'    => 'color_picker',
      'title'   => __( 'Button background hover color', 'dustrial' ),
      'desc'       => __( 'Change theme all button background hover color.', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'      => 'dustrial_btn_hover_text_color',
      'type'    => 'color_picker',
      'title'   => __( 'Button hover text color', 'dustrial' ),
      'desc'       => __( 'Change theme all button hover text color.', 'dustrial' ),
      'default' => '#ffffff',
    ),
    array(
      'type'    => 'heading',
      'content' => __( 'Call to action overlay color', 'dustrial' ),
    ),
    array(
      'id'      => 'cta_overlay_color',
      'type'    => 'color_picker',
      'title'   => __( 'Overlay color', 'dustrial' ),
      'desc'       => __( 'Change call to action overlay color', 'dustrial' ),
      'default' => '#061538',
    ),
    array(
      'id'             => 'cta_overlay_opacity',
      'type'           => 'select',
      'title'          => 'Choose overlay opacity',
      'desc'       => __( 'Choose call to action overlay opacity', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        '0.1'        => '0.1',
        '0.2'        => '0.2',
        '0.3'        => '0.3',
        '0.4'        => '0.4',
        '0.5'        => '0.5',
        '0.6'        => '0.6',
        '0.7'        => '0.7',
        '0.8'        => '0.8',
        '0.9'        => '0.9',
      ),
      'default_option' => '0.8',
      'info'           => 'Choose overlay opacity.',
      'attributes'         => array(
        'style'            => 'width: 84px;'
      ),
    ),

  
  )
);



/*-----------------------------------------------------------------------------------------*
*   Header Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'header_setting',
  'title'       => __( 'Header Settings', 'dustrial' ),
  'icon'        => 'fa fa-header',
   // begin: fields
  'fields'      => array(

    // Menu button set
    array(
      'type'    => 'heading',
      'content' => __( 'Menu elements settings', 'dustrial' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Menu Cart Button', 'dustrial' ),
    ),
    array(
      'id'    => 'menu_cart_switch',
      'type'  => 'switcher',
      'title' => __( 'Menu Cart Button', 'dustrial' ),
      'label' => __( 'Do you want to on it ?', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Menu Cart Button', 'dustrial' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Menu Search Button', 'dustrial' ),
    ),
    array(
      'id'    => 'menu_search_btn',
      'type'  => 'switcher',
      'title' => __( 'Menu Search Button', 'dustrial' ),
      'label' => __( 'Do you want to on it ?', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Menu Search Button', 'dustrial' ),
    ),
    array(
      'id'      => 'menu_search_title',
      'type'    => 'text',
      'title'   => __( 'Search Box Title', 'dustrial' ),
      'default' => __( 'Search', 'dustrial' ),
      'dependency'   => array( 'menu_search_btn', '==', 'true' ),
      'desc'       => __( 'Input Search Box Title', 'dustrial' ),
    ),
    array(
      'id'      => 'menu_search_btn_txt',
      'type'    => 'text',
      'title'   => __( 'Search Box Button Title', 'dustrial' ),
      'default' => __( 'Submit', 'dustrial' ),
      'dependency'   => array( 'menu_search_btn', '==', 'true' ),
      'desc'       => __( 'Input search box button text', 'dustrial' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Menu Quote Button', 'dustrial' ),
    ),
    array(
      'id'    => 'menu_right_btn',
      'type'  => 'switcher',
      'title' => __( 'Menu Quote Button', 'dustrial' ),
      'label' => __( 'Do you want to on it ?', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Menu Quote Button', 'dustrial' ),
    ),
    array(
      'id'      => 'menu_right_btn_text',
      'type'    => 'text',
      'title'   => __( 'Menu Quote Button Text', 'dustrial' ),
      'default' => __( 'Get A Quote', 'dustrial' ),
      'dependency' => array( 'menu_right_btn', '==', 'true' ),
      'desc'       => __( 'Input menu quote button text', 'dustrial' ),
    ),
    array(
      'id'      => 'menu_right_btn_link',
      'type'    => 'text',
      'title'   => __( 'Menu Quote Button Link', 'dustrial' ),
      'default' => '#',
      'dependency' => array( 'menu_right_btn', '==', 'true' ),
      'desc'       => __( 'Input menu quote button link', 'dustrial' ),
    ),

    array(
      'type'    => 'heading',
      'content' => __( 'Header Top Elements Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'top_header',
      'type'    => 'switcher',
      'title'   => __( 'Header Top Part On?', 'dustrial' ),
      'desc'       => __( 'Enable/Disable Header Top Part.', 'dustrial' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Phone', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_phone_title',
      'type'    => 'text',
      'default'    => __( 'Call:', 'dustrial' ),
      'title' => __( 'Set your phone title', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_phone',
      'type'    => 'text',
      'title' => __( 'Set your phone number', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'phone_icon',
      'type'    => 'icon',
      'default'    => 'fa fa-phone',
      'title' => __( 'Select your phone icon', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Address', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_addtess_title',
      'type'    => 'text',
      'default'    => __( 'Address:', 'dustrial' ),
      'title' => __( 'Set your address title', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_address',
      'type'    => 'textarea',
      'title' => __( 'Set your address', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'address_icon',
      'type'    => 'icon',
      'default'    => 'fa fa-clock-o',
      'title' => __( 'Setlect your address icon', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Mail', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_mail_title',
      'type'    => 'text',
      'default'    => __( 'Email:', 'dustrial' ),
      'title' => __( 'Set your mail title', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'header_mail_no',
      'type'    => 'text',
      'title' => __( 'Set your main address', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'mail_icon',
      'type'    => 'icon',
      'default'    => 'fa fa-envelope-o',
      'title' => __( 'Select your mail icon', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Social button', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'              => 'header_social_btn',
      'type'            => 'group',
      'title'           => __( 'Header Social Button', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
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

    array(
      'id'           => 'header_social_btn_target_blank',
      'type'         => 'switcher',
      'title'        => __( 'Open Social Link in new Window', 'dustrial' ),
      'default'      => false,
    ),

    // Header 2 Elements
    array(
      'type'    => 'heading',
      'content' => __( 'Header 2 element settings', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Office Location:', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'address_title',
      'type'    => 'text',
      'default'    => __( 'Office Location:', 'dustrial' ),
      'title' => __( 'Location title', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'office_address',
      'type'    => 'textarea',
      'title' => __( 'Office address', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'office_address_icon',
      'type'    => 'icon',
      'default'    => 'flaticon-maps-and-location',
      'title' => __( 'Select address icon', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Leading Industry:', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'      => 'industrial_title',
      'type'    => 'text',
      'default' => __( 'Leading Industry:', 'dustrial' ),
      'title'   => __( 'Set Industry Title', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'industrial_name',
      'type'  => 'text',
      'title' => __( 'Leading Industry Name', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'      => 'industry_icon',
      'type'    => 'icon',
      'default' => 'flaticon-oil-platform',
      'title'   => __( 'Select your industry icon', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Factory Loaction:', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'      => 'factory_title',
      'type'    => 'text',
      'default' => __( 'Leading Industrial:', 'dustrial' ),
      'title'   => __( 'Set your factory title', 'dustrial' ),
      'dependency' => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'    => 'factory_name',
      'type'  => 'text',
      'title' => __( 'Set your factory Name', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
    array(
      'id'      => 'factory_icon',
      'type'    => 'icon',
      'default' => 'flaticon-factory',
      'title'   => __( 'Select your factory icon', 'dustrial' ),
      'dependency'   => array( 'top_header', '==', 'true' ),
    ),
  
  )
);



/*-----------------------------------------------------------------------------------------*
*   Dustrial Blog Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'blog_setting',
  'title'       => __( 'Blog Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-pencil-square-o',
   // begin: fields
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( 'Blog Page Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_page_breadcrumb_title',
      'type'    => 'text',
      'title'   => __( 'Breadcrumb Title', 'dustrial' ),
      'default' => 'Blog Posts',
      'desc'    => __( 'Change your default breadcrumb title.', 'dustrial' ),
    ),
    array(
      'id'           => 'blog_layout',
      'type'         => 'image_select',
      'title'        => __( 'Page Layout Style', 'dustrial' ),
      'options'      => array(
        'left-sidebar'  => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_l.jpg',
        'right-sidebar' => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_r.jpg',
        'full-width'    => DUSTRIAL_PLG_URL. 'assets/imgs/fullwidth.jpg',
        ),
      'desc'       => __( 'Choose page layout style.', 'dustrial' ),
    ),
    array(
      'id'           => 'blog_post_col_layout',
      'type'         => 'image_select',
      'title'        => __( 'Post Layout Style', 'dustrial' ),
      'options'      => array(
        'col_2' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        'col_3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        'col_4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
        ),
      'desc'       => __( 'Choose blog post column layout style.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_post_excerpt_length',
      'type'    => 'text',
      'title'   => __( 'Blog Post Content Excerpt Length', 'dustrial' ),
      'default' => '35',
      'desc'       => __( 'Insert blog post content excerpt lenght.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_post_comments',
      'type'    => 'switcher',
      'title'   => __( 'Post Comment Meta On?', 'dustrial' ),
      'default' => true,
      'desc'    => __( 'Enable/Disable Blog Meta Comment.', 'dustrial' ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Blog Single Page Settings', 'dustrial' ),
    ),
    array(
      'id'           => 'blog_single_layout',
      'type'         => 'image_select',
      'title'        => __( 'Page Layout Style', 'dustrial' ),
      'options'      => array(
        'left-sidebar'  => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_l.jpg',
        'right-sidebar' => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_r.jpg',
        'full-width'    => DUSTRIAL_PLG_URL. 'assets/imgs/fullwidth.jpg',
        ),
      'desc'       => __( 'Choose blog single page layout style.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_single_post_admin',
      'type'    => 'switcher',
      'title'   => __( 'Post Meta Admin On?', 'dustrial' ),
      'default' => true,
      'desc'    => __( 'Enable/Disable Blog Single Post Admin.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_single_post_date',
      'type'    => 'switcher',
      'title'   => __( 'Post Meta Date On?', 'dustrial' ),
      'default' => true,
      'desc'    => __( 'Enable/Disable Blog Single Post Date.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_single_post_categories',
      'type'    => 'switcher',
      'title'   => __( 'Post Meta Categories On?', 'dustrial' ),
      'default' => true,
      'desc'    => __( 'Enable/Disable Blog Single Post Categories.', 'dustrial' ),
    ),
    array(
      'id'      => 'blog_single_post_comments',
      'type'    => 'switcher',
      'title'   => __( 'Post Meta Comment On?', 'dustrial' ),
      'default' => true,
      'desc'    => __( 'Enable/Disable Blog Single Meta Comment.', 'dustrial' ),
    ),


    array(
      'id'           => 'dustrial_social_share_enable',
      'type'         => 'switcher',
      'title'        => __( 'Single Page Share Button On/Off', 'dustrial' ),
      'default'      => false,
      'desc'       => __( 'Enable/Disable Single page social share button.', 'dustrial' ),
    ),
  
  )
);




/*-----------------------------------------------------------------------------------------*
*   Dustrial Project Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'project_setting',
  'title'       => __( 'Project Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-gears',
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( 'Project Page Settings', 'dustrial' ),
    ),

    array(
      'id'    => 'project_post_slug',
      'type'  => 'text',
      'title' => __( 'Change Project Slug', 'dustrial' ),
      'desc'    => __( 'Change Project post type slug.', 'dustrial' ),
      'default' => 'our_project',
    ),
    
    array(
      'id'           => 'dustrial_project_filter_enable',
      'type'         => 'switcher',
      'title'        => __( 'Project Filter Enable', 'dustrial' ),
      'default'      => false,
      'desc'    => __( 'Enable/Disable project filter menu.', 'dustrial' ),
    ),
    array(
      'id'          => 'choose_filter_category',
      'type'        => 'select',
      'title'       => __( 'Select Project Categories', 'dustrial' ),
      'desc'    => __( 'Select project categories single or multiple.', 'dustrial' ),
      'options'     => 'categories',
      'query_args'  => array(
        'type'      => 'our_project',
        'taxonomy'  => 'our_project_tax',
      ),
      'attributes'  => array(
        'multiple' => 'multiple',
      ),
      'dependency'   => array( 'dustrial_project_filter_enable', '==', 'true' ),
    ),
    array(
      'id'    => 'dustrial_project_page_posts_per_page',
      'type'  => 'text',
      'title' => __( 'Project Posts per page', 'dustrial' ),
      'default' => '6',
      'desc'    => __( 'Display total project items per page.', 'dustrial' ),
    ),
    array(
      'id'    => 'project_post_excerpt',
      'type'  => 'text',
      'title' => __( 'Project Post content excerpt', 'dustrial' ),
      'default' => '20',
      'desc'    => __( 'Choose project content excerpt lenght.', 'dustrial' ),
    ),
    array(
      'id'           => 'project_page_columns',
      'type'         => 'image_select',
      'title'        => __( 'Project Post Layout Style', 'dustrial' ),
      'desc'    => __( 'Choose project post layout style.', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
        ),
    ),
    array(
      'type'    => 'subheading',
      'content' => __( 'Project Single Page Setting', 'dustrial' ),
    ),

    array(
      'id'           => 'dustrial_project_bigimage_enable',
      'type'         => 'switcher',
      'title'        => __( 'Project Big Image Enable', 'dustrial' ),
      'default'      => true,
      'desc'    => __( 'Enable/Disable Project single page preview image.', 'dustrial' ),
    ),

    array(
      'id'           => 'dustrial_project_toppart_enable',
      'type'         => 'switcher',
      'title'        => __( 'Project Details Enable', 'dustrial' ),
      'default'      => true,
      'desc'    => __( 'Enable/Disable Project single page sidebar item.', 'dustrial' ),
    ),

    array(
      'id'      => 'dustrial_project_widget_title',
      'type'    => 'text',
      'title'   => __( 'Project Widget Title', 'dustrial' ),
      'default' => __( 'Project Details', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_project_catg_title',
      'type'    => 'text',
      'title'   => __( 'Project Category Title', 'dustrial' ),
      'default' => __( 'Category', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_project_clients_title',
      'type'    => 'text',
      'title'   => __( 'Project Client Title', 'dustrial' ),
      'default' => __( 'Client', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_project_locats_title',
      'type'    => 'text',
      'title'   => __( 'Project Location Title', 'dustrial' ),
      'default' => __( 'Location', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_project_dates_title',
      'type'    => 'text',
      'title'   => __( 'Project Date Title', 'dustrial' ),
      'default' => __( 'Date', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_project_urls_title',
      'type'    => 'text',
      'title'   => __( 'Project URL Title', 'dustrial' ),
      'default' => __( 'Link', 'dustrial' ),
    ),


    array(
      'id'           => 'dustrial_project_contact_enable',
      'type'         => 'switcher',
      'title'        => __( 'Contact Info Enable', 'dustrial' ),
      'default'      => false,
      'desc'    => __( 'Enable/Disable Project single page sidebar item.', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_contact_info_title',
      'type'    => 'text',
      'title'   => __( 'Contact Widget Title', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_contact_info_location',
      'type'    => 'text',
      'title'   => __( 'Contact Location', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_contact_info_number',
      'type'    => 'text',
      'title'   => __( 'Contact Number', 'dustrial' ),
    ),
    array(
      'id'      => 'dustrial_contact_info_email',
      'type'    => 'text',
      'title'   => __( 'Contact Email', 'dustrial' ),
    ),
  
  )
);



/*-----------------------------------------------------------------------------------------*
*   Dustrial Service Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'market_setting',
  'title'       => __( 'Service Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-briefcase',
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( 'Service Page Settings', 'dustrial' ),
    ),

    array(
      'id'    => 'service_post_slug',
      'type'  => 'text',
      'title' => __( 'Service Slug', 'dustrial' ),
      'default' => 'service',
      'desc'    => __( 'Change Service post type slug.', 'dustrial' ),
    ),
    array(
      'id'    => 'market_page_posts_per_page',
      'type'  => 'text',
      'title' => __( 'Service Posts per page', 'dustrial' ),
      'default' => '6',
      'desc'    => __( 'Display total services items per page.', 'dustrial' ),
    ),
    array(
      'id'    => 'post_content_excerpt',
      'type'  => 'text',
      'title' => __( 'Service Post content excerpt', 'dustrial' ),
      'default' => '20',
      'desc'    => __( 'Choose service content excerpt lenght.', 'dustrial' ),
    ),
    array(
      'id'           => 'service_page_columns',
      'type'         => 'image_select',
      'title'        => __( 'Service Post Layout Style', 'dustrial' ),
      'desc'    => __( 'Choose service post layout style.', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
        ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Service single page', 'dustrial' ),
    ),

    array(
      'id'           => 'call_action_switch',
      'type'         => 'switcher',
      'title'        => __( 'Enable/Disable Call To Action Area', 'dustrial' ),
      'default'      => true,
      'desc'    => __( 'Enable/Disable service single page call to action area.', 'dustrial' ),
    ),
    array(
      'id'      => 'call_action_bg_img',
      'type'    => 'image',
      'title'   => __( 'Call to action background image', 'dustrial' ),
      'desc'    => __( 'Choose call to action background image.', 'dustrial' ),
      'dependency'   => array( 'call_action_switch', '==', 'true' ),
    ),
    array(
      'id'      => 'call_action_text',
      'type'    => 'text',
      'title'   => __( 'Call to action title', 'dustrial' ),
      'desc'    => __( 'Input call to action title.', 'dustrial' ),
      'dependency'   => array( 'call_action_switch', '==', 'true' ),
    ),
    array(
      'id'      => 'call_action_textdetails',
      'type'    => 'textarea',
      'title'   => __( 'Call to action details', 'dustrial' ),
      'desc'    => __( 'Input call to action details.', 'dustrial' ),
      'dependency'   => array( 'call_action_switch', '==', 'true' ),
    ),
    array(
      'id'      => 'call_action_btn_text',
      'type'    => 'text',
      'title'   => __( 'Call to action button text', 'dustrial' ),
      'desc'    => __( 'Input call to action button text.', 'dustrial' ),
      'dependency'   => array( 'call_action_switch', '==', 'true' ),
    ),
    array(
      'id'      => 'call_action_btn_link',
      'type'    => 'text',
      'title'   => __( 'Call to action button link', 'dustrial' ),
      'desc'    => __( 'Input call to action button link.', 'dustrial' ),
      'dependency'   => array( 'call_action_switch', '==', 'true' ),
    ),
  
  )
);



/*-----------------------------------------------------------------------------------------*
*   Dustrial Shop Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'shop_setting',
  'title'       => __( 'Shop Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-shopping-bag',
  'fields'      => array(

    array(
      'type'    => 'heading',
      'content' => __( 'Shop Page Settings', 'dustrial' ),
    ),
    array(
      'id'    => 'shop_posts_per_page',
      'type'  => 'text',
      'title' => __( 'Products per page', 'dustrial' ),
      'default' => '8',
    ),
    array(
      'id'           => 'shop_layout',
      'type'         => 'image_select',
      'title'        => __( 'Page Layout Style', 'dustrial' ),
      'options'      => array(
        'left-sidebar'  => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_l.jpg',
        'right-sidebar' => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_r.jpg',
        'full-width'    => DUSTRIAL_PLG_URL. 'assets/imgs/fullwidth.jpg',
        ),
      'desc'       => __( 'Choose page layout style.', 'dustrial' ),
    ),
    array(
      'id'           => 'product_col_layout',
      'type'         => 'image_select',
      'title'        => __( 'Product column layout', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
        ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Shop Single Page Settings', 'dustrial' ),
    ),
    array(
      'id'           => 'shop_single_layout',
      'type'         => 'image_select',
      'title'        => __( 'Page Layout Style', 'dustrial' ),
      'options'      => array(
        'left-sidebar'  => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_l.jpg',
        'right-sidebar' => DUSTRIAL_PLG_URL. 'assets/imgs/sidebar_r.jpg',
        'full-width'    => DUSTRIAL_PLG_URL. 'assets/imgs/fullwidth.jpg',
        ),
      'desc'       => __( 'Choose page layout style.', 'dustrial' ),
    ),
    array(
      'id'           => 'single_page_tab_switch',
      'type'         => 'switcher',
      'title'        => __( 'Single page tab switch', 'dustrial' ),
      'default'      => true,
      'desc'    => __( 'Enable/Disable Single page tab on off switch', 'dustrial' ),
    ),
    array(
      'id'           => 'related_products',
      'type'         => 'switcher',
      'title'        => __( 'Related product tab switch', 'dustrial' ),
      'default'      => false,
      'desc'    => __( 'Enable/Disable related product on product details page.', 'dustrial' ),
    ),
    array(
      'id'           => 'related_product_col_layout',
      'type'         => 'image_select',
      'title'        => __( 'Related product column layout', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
      ),
    ),
    array(
      'id'           => 'related_products_per_page',
      'type'         => 'text',
      'title'        => __( 'Related product per page', 'dustrial' ),
      'default'      => 4,
      'desc'    => __( 'How much related product display in single page', 'dustrial' ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Shop Global Settings', 'dustrial' ),
    ),
    array(
      'id'      => 'shop_base_color',
      'type'    => 'color_picker',
      'title'   => __( 'Shop base color', 'dustrial' ),
      'desc'    => __( 'Change your all shop base color.', 'dustrial' ),
      'default' => '#ff5e14',
    ),
  
  )
);


/*-----------------------------------------------------------------------------------------*
*   Dustrial Gallery Settings
* -----------------------------------------------------------------------------------------*/

$options[]      = array(
  'name'        => 'gallery_settings',
  'title'       => __( 'Gallery Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-picture-o',
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( 'Gallery Page Settings', 'dustrial' ),
    ),
    array(
      'id'             => 'page_layout',
      'type'           => 'select',
      'title'          => 'Select page layout',
      'options'        => array(
        '1'            => 'Box',
        '2'            => 'fullwidth',
      ),
      'default_option' => 'Page Layout',
    ),
    array(
      'id'           => 'dustrial_gallery_filter_enable',
      'type'         => 'switcher',
      'title'        => __( 'Filter Enable', 'dustrial' ),
      'default'      => false,
      'desc'    => __( 'Enable/Disable gallery filter menu.', 'dustrial' ),
    ),
    array(
      'id'          => 'gallery_filter_category',
      'type'        => 'select',
      'title'       => __( 'Select Gallery Categories', 'dustrial' ),
      'desc'    => __( 'Select gallery categories single or multiple.', 'dustrial' ),
      'options'     => 'categories',
      'query_args'  => array(
        'type'      => 'our_gallery',
        'taxonomy'  => 'our_gallery_tax',
      ),
      'attributes'  => array(
        'multiple' => 'multiple',
      ),
      'dependency'   => array( 'dustrial_gallery_filter_enable', '==', 'true' ),
    ),
    array(
      'id'           => 'gallery_page_columns',
      'type'         => 'image_select',
      'title'        => __( 'Gallery page layout', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
      ),
    ),
    array(
      'id'      => 'page_columns_no_gutter',
      'type'    => 'checkbox',
      'title'   => 'No Gutters?',
      'label'   => 'If you need no gutter, check it',
    ),
    array(
      'id'      => 'gallery_content_switch',
      'type'    => 'switcher',
      'title'   => 'Content enable/disable',
      'label'   => 'If you need to display content, please on it.',
    ),
    array(
      'id'             => 'padding_around',
      'type'           => 'select',
      'title'          => 'Padding around item',
      'options'        => array(
        'pa-1'         => 'Padding around 1px',
        'pa-2'         => 'Padding around 2px',
        'pa-3'         => 'Padding around 3px',
        'pa-5'         => 'Padding around 5px',
        'pa-7'         => 'Padding around 7px',
        'pa-10'        => 'Padding around 10px',
        'pa-15'        => 'Padding around 15px',
      ),
      'default_option' => 'Select padding around',
      'dependency'     => array( 'page_columns_no_gutter', '==', 'true' ),
    ),

    array(
      'id'    => 'gallery_post_slug',
      'type'  => 'text',
      'title' => __( 'Gallery Slug', 'dustrial' ),
      'default' => 'gallery',
      'desc'    => __( 'Change Gallery post type slug.', 'dustrial' ),
    ),
    array(
      'id'    => 'gallery_page_posts_per_page',
      'type'  => 'text',
      'title' => __( 'Gallery Posts per page', 'dustrial' ),
      'default' => '9',
      'desc'    => __( 'Display total gallery items per page.', 'dustrial' ),
    ),
    array(
      'id'    => 'gallery_post_content_excerpt',
      'type'  => 'text',
      'title' => __( 'Gallery Post content excerpt', 'dustrial' ),
      'default' => '20',
      'desc'    => __( 'Choose gallery content excerpt lenght.', 'dustrial' ),
    ),
    array(
      'id'             => 'gallery_style',
      'type'           => 'select',
      'title'          => 'Select gallery style',
      'options'        => array(
        '1'            => 'Style 1',
        '2'            => 'Style 2',
      ),
      'default_option' => 'Select style',
    ),

  )
);



// ===================================================================
// 404 Page Settings =
// ===================================================================

$options[]      = array(
  'name'        => '404_page',
  'title'       => __( '404 Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-frown-o',
  // begin: fields
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( '404 Page Settings', 'dustrial' ),
    ),

    array(
      'id'    => '404_page_name',
      'type'  => 'text',
      'title' => __( '404 Page Name', 'dustrial' ),
      'default' => '404 Page'
    ),
    array(
      'id'    => '404_title',
      'type'  => 'text',
      'title' => __( '404 Title', 'dustrial' ),
      'default' => 'Sorry, The Page your are looking for, could not be found.'
    ),
    array(
      'id'    => 'dustrial_404_btn_txt',
      'type'  => 'text',
      'title' => __( 'Button Text', 'dustrial' ),
      'default' => __( 'Go To Home', 'dustrial' ),
    ),
    array(
      'id'    => 'dustrial_404_img',
      'type'  => 'image',
      'title' => __( '404 Image', 'dustrial' ),
      'default' => DUSTRIAL_PLG_URL. '/assets/imgs/404.png',
    ),
    array(
      'id'    => 'dustrial_404_bg_img',
      'type'  => 'image',
      'title' => __( 'Backgroud Image', 'dustrial' ),
      'default' => DUSTRIAL_PLG_URL. '/assets/imgs/404_bg.png',
    ),
  
  )
);


// ===================================================================
// Search Page Settings =
// ===================================================================

$options[]      = array(
  'name'        => 'search_page',
  'title'       => __( 'Search Page Settings', 'dustrial' ),
  'icon'        => 'fa fa-search-plus',
  // begin: fields
  'fields'      => array(
    array(
      'type'  => 'heading',
      'content' => __( 'No Search Reasult Page', 'dustrial' ),
    ),
    array(
      'id'    => 'search_none_page_title',
      'type'  => 'text',
      'title' => __( 'Search none page title', 'dustrial' ),
      'default' => 'Nothing Found'
    ),
    array(
      'id'    => 'search_none_page_desc',
      'type'  => 'textarea',
      'title' => __( 'Page Sub Title', 'dustrial' ),
      'default' => 'Sorry, but nothing matched your search terms. Please try again with some different keywords.'
    ),
  
  )
);


// ===================================================================
// Footer Options =
// ===================================================================

$options[]      = array(
  'name'        => 'footer_setting',
  'title'       => __( 'Footer Settings', 'dustrial' ),
  'icon'        => 'fa fa-rub',
  // begin: fields
  'fields'      => array(

    array(
      'type'    => 'subheading',
      'content' => __( 'Footer Settings', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_newsbg_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Newsletter Background Color', 'dustrial' ),
      'default'        => '#0b0b0b',
      'desc'           => __( 'Choose Footer Newsletter Background Color.', 'dustrial' ),
    ),

    array(
      'id'        => 'footer_logo',
      'type'      => 'image',
      'title'     => __( 'Footer Newsletter Logo Image', 'dustrial' ),
      'default'   => DUSTRIAL_PLG_URL. 'assets/imgs/logo-2.png',
      'desc'    => __( 'Upload footer top newsletter section logo.', 'dustrial' ),
    ),
    array(
      'id'        => 'footer_newsletter_shortcode',
      'type'      => 'textarea',
      'title'     => __( 'Footer Newsletter Shortcode', 'dustrial' ),
      'desc'      => __( 'Input footer newsletter Shortcode.', 'dustrial' ),
      'sanitize'  => false,
    ),
    array(
      'id'        => 'copyright_text',
      'type'      => 'textarea',
      'title'     => __( 'Copyright Text', 'dustrial' ),
      'default'   => 'Copyrights © 2021 All Rights Reserved by DUSTRIAL.',
      'sanitize'  => false,
      'desc'      => __( 'Change Copyright Text.', 'dustrial' ),
    ),
    array(
      'id'              => 'footer_social_btn',
      'type'            => 'group',
      'title'           => __( 'Footer Social Icons', 'dustrial' ),
      'desc'            => __( 'Add Footer Social Icons.', 'dustrial' ),
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
    array(
      'id'           => 'footer_social_btn_target_blank',
      'type'         => 'switcher',
      'title'        => __( 'Open Social Link in new Window', 'dustrial' ),
      'default'      => false,
      'desc'    => __( 'Open footer social link in a new Window or same Window.', 'dustrial' ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Footer Style Two Settings', 'dustrial' ),
    ),
    array(
      'id'        => 'footer_2_bg',
      'type'      => 'image',
      'title'     => __( 'Footer Style Two Backgroud Image.', 'dustrial' ),
      'default'   => DUSTRIAL_PLG_URL. 'assets/imgs/bind_footer_bg.png',
      'desc'    => __( 'Change footer style to background image.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer2_overlay_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Two Overlay Color', 'dustrial' ),
      'default'        => '#0b0b0b',
      'desc'           => __( 'Choose Footer Two Overlay Background Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer2_overlay_opacity',
      'type'           => 'select',
      'title'          => 'Footer Two Overlay Opacity',
      'desc'           => __( 'Choose Footer Overlay Opacity.', 'dustrial' ),
      'class'          => 'chosen',
      'options'        => array(
        '0.1'          => '0.1',
        '0.2'          => '0.2',
        '0.3'          => '0.3',
        '0.4'          => '0.4',
        '0.5'          => '0.5',
        '0.6'          => '0.6',
        '0.7'          => '0.7',
        '0.8'          => '0.8',
        '0.9'          => '0.9',
      ),
      'default_option' => '0.5',
      'info'           => 'Choose your overlay opacity.',
      'attributes'     => array(
        'style'        => 'width: 84px;'
      ),
    ),
    array(
      'id'             => 'footer2_text_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Two Widget Title Color', 'dustrial' ),
      'default'        => '#ffffff',
      'desc'           => __( 'Choose Footer Two WIdget Text Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer2_font_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Two Text Color', 'dustrial' ),
      'default'        => '#a5a5a5',
      'desc'           => __( 'Choose Footer Two Text Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer2_item_before_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Item Two Before Color', 'dustrial' ),
      'default'        => '#6f6c6c',
      'desc'           => __( 'Choose Footer Item Two Before Text Color.', 'dustrial' ),
    ),




    array(
      'type'    => 'subheading',
      'content' => __( 'Footer Columns Settings', 'dustrial' ),
    ),
    array(
      'id'           => 'footer_widget_cols',
      'type'         => 'image_select',
      'title'        => __( 'Footer Widget Columns', 'dustrial' ),
      'options'      => array(
        '6' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-2.png',
        '4' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-3.png',
        '3' => DUSTRIAL_PLG_URL. 'assets/imgs/columns-4.png',
        ),
      'desc'       => __( 'Choose footer widget column layout style.', 'dustrial' ),
    ),


    array(
      'type'    => 'subheading',
      'content' => __( 'Footer Color Settings', 'dustrial' ),
    ),

    array(
      'id'             => 'footer_background_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Background Color', 'dustrial' ),
      'default'        => '#0b0b0b',
      'desc'           => __( 'Choose Footer Background Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_text_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Widget Title Color', 'dustrial' ),
      'default'        => '#f8f9fa',
      'desc'           => __( 'Choose Footer Text Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_font_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Text Color', 'dustrial' ),
      'default'        => '#a5a5a5',
      'desc'           => __( 'Choose Footer Text Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_item_before_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Item Before Color', 'dustrial' ),
      'default'        => '#6f6c6c',
      'desc'           => __( 'Choose Footer Item Before Text Color.', 'dustrial' ),
    ),

    array(
      'type'    => 'subheading',
      'content' => __( 'Footer Copyright Color Settings', 'dustrial' ),
    ),

    array(
      'id'             => 'footer_copy_background_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Copyright Background Color', 'dustrial' ),
      'default'        => '#141414',
      'desc'           => __( 'Choose Footer Copyright Background Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_copy_text_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Copyright Text Color', 'dustrial' ),
      'default'        => '#ffffff',
      'desc'           => __( 'Choose Footer Copyright Text Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_social_icon_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Copyright Icon Color', 'dustrial' ),
      'default'        => '#ffffff',
      'desc'           => __( 'Choose Footer Copyright Icon Color.', 'dustrial' ),
    ),
    array(
      'id'             => 'footer_social_border_color',
      'type'           => 'color_picker',
      'title'          => __( 'Footer Copyright Icon Border Color', 'dustrial' ),
      'default'        => '#ffffff',
      'desc'           => __( 'Choose Footer Copyright Icon Border Color.', 'dustrial' ),
    ),


  ),
  // end: fields
);

// ------------------------------
// a seperator                  -
// ------------------------------
$options[] = array(
  'name'   => 'seperator_1',
  'title'  => __( 'A Seperator', 'dustrial' ),
  'icon'   => 'fa fa-bookmark'
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => __( 'Backup', 'dustrial' ),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => __( 'You can save your current options. Download a Backup and Import.', 'dustrial' ),
    ),
    array(
      'type'    => 'backup',
    ),

  )
);









DUSTRIALFramework::instance( $settings, $options );