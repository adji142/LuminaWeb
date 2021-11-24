<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**  shortcode.
--------------------------------------------------------------------------------------------------- */
require_once DUSTRIAL_PLG_DIR . '/shortcodes/wpb-helper.php';
/**  Shortcodes | Image compatibility.
--------------------------------------------------------------------------------------------------- */

function get_vc_image( $image = false ){
  if( $image && is_numeric( $image ) ){
    $image = wp_get_attachment_image_src( $image, 'full' );
    $image = $image[0];
  }
  return $image;
};


add_action ( 'vc_before_init', 'dustrial_visual_composer_plugin_addons' );
function dustrial_visual_composer_plugin_addons() {
    require_once DUSTRIAL_PLG_DIR . '/shortcodes/vc-extend.php';
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Section Head
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_section_head_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'section_icon_img'      => '',
      'section_title'         => '',
      'section_sub_title'     => '',
      'sec_head_style'        => '',
      'sec3_desc'             => '',
      'sec_head_text_align'   => '',
      'sec_animation_disable' => '',
      'title_color'           => '',
      'subtitle_color'        => '',
      'sub_content_color'     => '',
      'sec_animation'         => '',
      ), $atts )
  );
  ob_start();

  $e_uniqid     = uniqid();
  $inline_style = '';

  if($sec_head_style == 'style1' ){

      // Title Color
      if ( $title_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .main-title {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= '}';
      }
      // Sub Title Color
      if ( $subtitle_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .sub-title{';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
        $inline_style .= '}';
      }
  }elseif($sec_head_style == 'style2'){

      // Title Color
      if ( $title_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title-two .section-two-body h3.main-title {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= '}';
      }
      // Sub Title Color
      if ( $subtitle_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title-two .section-two-body h6.sub-title{';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
        $inline_style .= '}';
      }

  }elseif($sec_head_style == 'style3'){

      // Title Color
      if ( $title_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title-three h2 {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= '}';
      }

      // Content text Color
      if ( $sub_content_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title-three p{';
        $inline_style .= ( $sub_content_color ) ? 'color:'. $sub_content_color .' !important;' : '';
        $inline_style .= '}';
      }

  }else{
      // Title Color
      if ( $title_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .main-title {';
        $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
        $inline_style .= '}';
      }

      // Sub Title Color
      if ( $subtitle_color ) {
        $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .sub-title{';
        $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
        $inline_style .= '}';
      }
  }

  add_inline_style( $inline_style );
  $styled_class  = ' dustrial-stitle-'. $e_uniqid;


  $icon_img = get_vc_image( $section_icon_img );

  if($sec_animation_disable == 1){
    $sec_anim_name = '';
  } else {
    $sec_anim_name = $sec_animation;
  }

  if ($sec_head_style == 'style1') {

  ?>

    <div class="<?php echo esc_attr($styled_class); ?> section-title <?php echo esc_attr( $sec_head_text_align );?> wow <?php echo esc_attr($sec_anim_name);?>">
      <div class="section-thumb"><img src="<?php echo esc_url( $icon_img ); ?>" alt="title icon"></div>
      <div class="section-body">
        <h6 class="sub-title activeColor"><?php echo esc_html($section_sub_title); ?></h6>
        <h3 class="m-0 main-title"><?php echo esc_html($section_title); ?></h3>
      </div>
    </div>

    <?php } elseif ($sec_head_style == 'style2') { ?>

    <div class="row d-flex justify-content-center wow <?php echo esc_attr($sec_anim_name);?>">
      <div class="col-lg-12">
        <div class="<?php echo esc_attr($styled_class); ?> section-title-two <?php echo esc_attr( $sec_head_text_align ); ?>">
          <div class="section-two-body">
            <h6 class="sub-title activeColor"><?php echo esc_html($section_sub_title); ?></h6>
           <h3 class="main-title"><?php echo esc_html($section_title); ?></h3>
          </div>
          <div class="stock">
            <img src="<?php echo esc_url( $icon_img ); ?>" alt="stock">
          </div>
        </div>
      </div>
    </div>

    <?php } elseif ($sec_head_style == 'style3') { ?>

    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-12">
      <div class="<?php echo esc_attr($styled_class); ?> section-title-three <?php echo esc_attr( $sec_head_text_align ); ?> wow <?php echo esc_attr($sec_anim_name);?>">
        <h2><?php echo wp_kses_stripslashes($section_title); ?></h2>
        <p><?php echo esc_html($sec3_desc); ?></p>
      </div>
    </div>

    <?php } elseif ($sec_head_style == 'style4') { ?>

    <div class="<?php echo esc_attr($styled_class); ?> section-title-four <?php echo esc_attr( $sec_head_text_align );?> wow <?php echo esc_attr($sec_anim_name);?>">
      <div class="section-title-four-area">
        <h6 class="section-title-four-sub"><?php echo esc_html($section_sub_title); ?></h6>
        <h3 class="section-title-four-title"><?php echo esc_html($section_title); ?></h3>
      </div>
    </div>

    <?php } else { ?>

    <div class="<?php echo esc_attr($styled_class); ?> section-title <?php echo esc_attr( $sec_head_text_align );?> wow <?php echo esc_attr($sec_anim_name);?>">
      <div class="section-thumb"><img src="<?php echo esc_url( $icon_img ); ?>" alt="title icon"></div>
      <div class="section-body">
        <h6 class="sub-title activeColor"><?php echo esc_html($section_sub_title); ?></h6>
        <h3 class="m-0 main-title"><?php echo esc_html($section_title); ?></h3>
      </div>
    </div>

  <?php }
  return ob_get_clean();
}
add_shortcode( 'dustrial_section_head', 'dustrial_section_head_shortcode' );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Button
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_button', 'dustrial_button_shortcode' );
function dustrial_button_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'button_text'             => '',
      'button_link'             => '',
      'pretty_icon1'            => '',
      'pretty_icon2'            => '',
      'pretty_icon3'            => '',
      'btn_animation_disable'   => '',
      'btn_animation_style'     => '',
      ), $atts )
  );
  ob_start();

  if (!empty($pretty_icon1)) {
    $icon = $pretty_icon1;
  } elseif(!empty($pretty_icon2)) {
    $icon = $pretty_icon2;
  } elseif(!empty($pretty_icon3)) {
    $icon = $pretty_icon3;
  } else {
    $icon = '';
  }

  if($btn_animation_disable == 1){
    $btn_anim_name = '';
  }else{
    $btn_anim_name = $btn_animation_style;
  }

?>
  <a href="<?php echo esc_url($button_link); ?>" class="btn btn-default wow <?php echo esc_attr($btn_anim_name);?>">
    <?php echo esc_html($button_text); ?>
    <i class="<?php echo esc_attr( $icon ); ?>"></i>
  </a>

<?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  dustrial_pretty_icon_box
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_pretty_icon_box', 'dustrial_pretty_icon_box_shortcode' );
function dustrial_pretty_icon_box_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'pretty_icon1'            => '',
      'pretty_icon2'            => '',
      'box_icon_bg_img'         => '',
      'box_title'               => '',
      'box_desc'                => '',
      'item_text_align'         => '',
      'animation_disable'       => '1',
      'animation'               => '',
      'pretty_box_style'        => '',
      'prety_icon_color'        => '',
      'prety_icon_hover_color'  => '',
      'icon_title_color'        => '',
      'icon_title_hover_color'  => '',
      'icon_content_color'      => '',
      'pretty_box_custom_class' => '',
      ), $atts )
  );
  ob_start();


  $e_uniqid     = uniqid();
  $inline_style = '';

  if($pretty_box_style == 'style1' ){

      // Prety icon Color
      if ( $prety_icon_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item .featured-icon i {';
        $inline_style .= ( $prety_icon_color ) ? 'color:'. $prety_icon_color .' !important;' : '';
        $inline_style .= '}';
      }

      // Prety icon hover Color
      if ( $prety_icon_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item:hover .featured-icon i {';
        $inline_style .= ( $prety_icon_hover_color ) ? 'color:'. $prety_icon_hover_color .' !important;' : '';
        $inline_style .= '}';
      }

      // Prety icon Title Color
      if ( $icon_title_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item h5.featured-item-title {';
        $inline_style .= ( $icon_title_color ) ? 'color:'. $icon_title_color .' !important;' : '';
        $inline_style .= '}';
      }

      // Prety icon Title hover Color
      if ( $icon_title_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item:hover .featured-item-title {';
        $inline_style .= ( $icon_title_hover_color ) ? 'color:'. $icon_title_hover_color .' !important;' : '';
        $inline_style .= '}';
      }

      // Prety icon content Color
      if ( $icon_content_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item .featured-content {';
        $inline_style .= ( $icon_content_color ) ? 'color:'. $icon_content_color .';' : '';
        $inline_style .= '}';
      }

  }elseif($pretty_box_style == 'style2'){

      // Prety icon Color
      if ( $prety_icon_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.h2-single-featured .featured_svg i:before {';
        $inline_style .= ( $prety_icon_color ) ? 'color:'. $prety_icon_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon hover Color
      if ( $prety_icon_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.h2-single-featured .card:hover .featured_svg i:before {';
        $inline_style .= ( $prety_icon_hover_color ) ? 'color:'. $prety_icon_hover_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon Title Color
      if ( $icon_title_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.h2-single-featured .card-title {';
        $inline_style .= ( $icon_title_color ) ? 'color:'. $icon_title_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon Title hover Color
      if ( $icon_title_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.h2-single-featured .card:hover .card-title {';
        $inline_style .= ( $icon_title_hover_color ) ? 'color:'. $icon_title_hover_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon content Color
      if ( $icon_content_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.h2-single-featured .card-text {';
        $inline_style .= ( $icon_content_color ) ? 'color:'. $icon_content_color .';' : '';
        $inline_style .= '}';
      }

  }elseif($pretty_box_style == 'style3'){



  }else{

      // Prety icon Color
      if ( $prety_icon_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item .featured-icon i {';
        $inline_style .= ( $prety_icon_color ) ? 'color:'. $prety_icon_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon hover Color
      if ( $prety_icon_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item:hover .featured-icon i {';
        $inline_style .= ( $prety_icon_hover_color ) ? 'color:'. $prety_icon_hover_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon Title Color
      if ( $icon_title_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item h5.featured-item-title {';
        $inline_style .= ( $icon_title_color ) ? 'color:'. $icon_title_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon Title hover Color
      if ( $icon_title_hover_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item:hover .featured-item-title {';
        $inline_style .= ( $icon_title_hover_color ) ? 'color:'. $icon_title_hover_color .';' : '';
        $inline_style .= '}';
      }

      // Prety icon content Color
      if ( $icon_content_color ) {
        $inline_style .= '.dustrial-picons-'. $e_uniqid .'.featured-item .featured-content {';
        $inline_style .= ( $icon_content_color ) ? 'color:'. $icon_content_color .';' : '';
        $inline_style .= '}';
      }

  }

  add_inline_style( $inline_style );
  $styled_class  = 'dustrial-picons-'. $e_uniqid;


  if (!empty($pretty_icon1)) {
    $icon = $pretty_icon1;
  } elseif(!empty($pretty_icon2)) {
    $icon = $pretty_icon2;
  } else {
    $icon = '';
  }

  if($animation_disable == 1){
    $anim_name = '';
  }else{
    $anim_name = $animation;
  }

  $image = get_vc_image( $box_icon_bg_img );

  if ($pretty_box_style == 'style1') { ?>

    <div class="<?php echo esc_attr($styled_class.' '.$item_text_align); ?> featured-item wow <?php echo esc_attr($anim_name);?>">
      <?php if (!empty($icon)) { ?>
      <div class="featured-icon">
        <i class="<?php echo esc_attr( $icon ); ?>"></i>
      </div>
      <?php } ?>
      <h5 class="featured-item-title"><?php echo rawurldecode(base64_decode($box_title)); ?></h5>
      <p class="featured-content"><?php echo esc_html($box_desc); ?></p>
    </div>

  <?php } elseif ( $pretty_box_style == 'style2' ) { ?>

    <div class="<?php echo esc_attr($styled_class.' '.$item_text_align); ?> h2-single-featured wow <?php echo esc_attr($anim_name);?>">
      <div class="card">
        <div class="card-body">
          <?php if (!empty($icon)) { ?>
          <div class="featured_svg pb-2"> 
            <i class="<?php echo esc_attr( $icon ); ?>"></i>
          </div>
          <?php } ?>
          <h5 class="card-title mb-2 mt-2"><?php echo rawurldecode(base64_decode($box_title)); ?></h5>
          <p class="card-text"><?php echo esc_html($box_desc); ?></p>
        </div>
      </div>
    </div>

  <?php } elseif ( $pretty_box_style == 'style3' ) { ?>

    <div class="<?php echo esc_attr($styled_class.' '.$item_text_align);?> media wow <?php echo esc_attr($anim_name);?>">
      <?php if (!empty($icon)) { 
        if ($item_text_align != 'text-right') {
      ?>
      <div class="company-icon">
        <i class="<?php echo esc_attr( $icon ); ?>"></i>
      </div>
      <?php } } ?>
      <div class="media-body">
        <div>
          <h6 class="mb-1 sub-title"><?php echo rawurldecode(base64_decode($box_title)); ?></h6>
          <p class="m-0"><?php echo esc_html($box_desc); ?></p>
        </div>
      </div>
      <?php if (!empty($icon)) { 
        if ($item_text_align == 'text-right') {
      ?>
      <div class="company-icon ml-25 mr-0">
        <i class="<?php echo esc_attr( $icon ); ?>"></i>
      </div>
      <?php } } ?>
    </div>
    
  <?php } else { ?>

    <div class="<?php echo esc_attr($styled_class.' '.$item_text_align);?> featured-item wow <?php echo esc_attr($animation);?>">
      <?php if (!empty($icon)) { ?>
      <div class="featured-icon">
        <i class="<?php echo esc_attr( $icon ); ?>"></i>
      </div>
      <?php } ?>
      <h5 class="featured-item-title"><?php echo rawurldecode(base64_decode($box_title)); ?></h5>
      <p class="featured-content"><?php echo esc_html($box_desc); ?></p>
    </div>

  <?php } ?>

  <?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial video section
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_video', 'dustrial_video_shortcode' );
function dustrial_video_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'section_icon_img'   => '',
      'section_title'      => '',
      'section_sub_title'  => '',
      'section_desc'       => '',
      'sign_img'           => '',
      'author_name'        => '',
      'author_designation' => '',
      'video_link'         => '',
      'sec_bg_img'         => '',
      'video_style'        => '',
      'video_animation_style'   => '',
      'video_animation_disable' => '',
      'title_color'             => '',
      'subtitle_color'          => '',
      'video_content_color'     => '',
      'video_buttonbg_color'    => '',
      'video_buttonicon_color'  => '',
      ), $atts )
  );
  ob_start();


  $e_uniqid     = uniqid();
  $inline_style = '';

  if ($video_style == 'style1') {

    // Title Color
    if ( $title_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .main-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .sub-title{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Content text Color
    if ( $video_content_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-content p{';
      $inline_style .= ( $video_content_color ) ? 'color:'. $video_content_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-author-role{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $video_buttonbg_color ) {
      $inline_style .= 'a.dustrial-stitle-'. $e_uniqid .'.video-play-button{';
      $inline_style .= ( $video_buttonbg_color ) ? 'background:'. $video_buttonbg_color .' !important;' : '';
      $inline_style .= '}';
    }
    // Author Role Color
    if ( $video_buttonbg_color ) {
      $inline_style .= 'a.dustrial-stitle-'. $e_uniqid .'.video-play-button::before{';
      $inline_style .= ( $video_buttonbg_color ) ? 'background:'. $video_buttonbg_color .' !important;' : '';
      $inline_style .= '}';
    }

  }elseif ($video_style == 'style2') {

    // Title Color
    if ( $title_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-section-title h1.inspiring-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-section-title .subtitle{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Content text Color
    if ( $video_content_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.content.text-light{';
      $inline_style .= ( $video_content_color ) ? 'color:'. $video_content_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-author-role{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }
  
  }else{

    // Title Color
    if ( $title_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .main-title {';
      $inline_style .= ( $title_color ) ? 'color:'. $title_color .';' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.section-title .section-body .sub-title{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-author-role{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Content text Color
    if ( $video_content_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-content p{';
      $inline_style .= ( $video_content_color ) ? 'color:'. $video_content_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $subtitle_color ) {
      $inline_style .= '.dustrial-stitle-'. $e_uniqid .'.inspiring-author-role{';
      $inline_style .= ( $subtitle_color ) ? 'color:'. $subtitle_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $video_buttonbg_color ) {
      $inline_style .= 'a.dustrial-stitle-'. $e_uniqid .'.video-play-button{';
      $inline_style .= ( $video_buttonbg_color ) ? 'background:'. $video_buttonbg_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Author Role Color
    if ( $video_buttonbg_color ) {
      $inline_style .= 'a.dustrial-stitle-'. $e_uniqid .'.video-play-button::before{';
      $inline_style .= ( $video_buttonbg_color ) ? 'background:'. $video_buttonbg_color .' !important;' : '';
      $inline_style .= '}';
    }

  }  


  add_inline_style( $inline_style );
  $styled_class  = ' dustrial-stitle-'. $e_uniqid;



  $icon_img   = get_vc_image( $section_icon_img );
  $sign_img   = get_vc_image( $sign_img );
  $sec_bg_img = get_vc_image( $sec_bg_img );

  if($video_animation_disable == 1){
    $video_anim_animate = '';
  }else{
    $video_anim_animate = $video_animation_style;
  }

  if ($video_style == 'style1') {

?>

  <!-- h1 Inspiring Solution Section -->
  <div class="inspiring-section">
    <div class="inspiring-section-bg">
      <img src="<?php echo esc_url( $sec_bg_img ); ?>" alt="<?php esc_attr_e( 'background image', 'dustrial' ); ?>">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="inspiring-content-area">
            <div class="<?php echo esc_attr($styled_class); ?> section-title wow <?php echo esc_attr($video_anim_animate);?>">
              <div class="section-thumb"><img src="<?php echo esc_url( $icon_img ); ?>" alt="<?php esc_attr_e( 'title icon', 'dustrial' ); ?>"></div>
              <div class="section-body">
                <h6 class="sub-title activeColor"><?php echo esc_html($section_sub_title); ?></h6>
                <h3 class="m-0 main-title"><?php echo esc_html($section_title); ?></h3>
              </div>
            </div>
            <div class="<?php echo esc_attr($styled_class); ?> inspiring-content wow <?php echo esc_attr($video_anim_animate);?>">
              <p><?php echo wp_kses_stripslashes($section_desc); ?></p>
            </div>
            <div class="inspiring-by">
              <img src="<?php echo esc_url( $sign_img ); ?>" alt="<?php esc_attr_e( 'signature', 'dustrial' ); ?>">
              <h5 class="inspiring-author"><?php echo esc_html($author_name); ?></h5>
              <h6 class="<?php echo esc_attr($styled_class); ?> inspiring-author-role activeColor"><?php echo esc_html($author_designation); ?></h6>
            </div>
          </div>
          <div class="business-video-icon">
            <a class="<?php echo esc_attr($styled_class); ?> video-play-button popup-vimeo" href="<?php echo esc_url( $video_link ); ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End h1 Inspiring Solution Section -->

  <?php } elseif ($video_style == 'style2') { ?> 

  <!-- h3 Inspiring Solution Section -->
  <div class="h3-inspiring bg-black-overlay" style="background-image: url( <?php echo esc_url( $sec_bg_img ); ?> );">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex justify-content-center mb-4 mt-4">
          <div class="block">
              <a class="video-play-button-two popup-vimeo" href="<?php echo esc_url( $video_link ); ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="block">
            <div class="<?php echo esc_attr($styled_class); ?> inspiring-section-title wow <?php echo esc_attr($video_anim_animate);?>">
              <h3 class="subtitle activeColor"><?php echo esc_html($section_sub_title); ?></h3>
              <h1 class="inspiring-title text-light"><?php echo esc_html($section_title); ?></h1>
            </div>
            <p class="<?php echo esc_attr($styled_class); ?> content text-light mb-4 mt-4 mb-lg-5 wow <?php echo esc_attr($video_anim_animate);?>"><?php echo wp_kses_stripslashes($section_desc); ?></p>
            <div class="inspiring-by">
              <img src="<?php echo esc_url( $sign_img ); ?>" alt="<?php esc_attr_e( 'signature', 'dustrial' ); ?>">
              <h5 class="inspiring-author text-light"><?php echo esc_html($author_name); ?></h5>
              <h6 class="<?php echo esc_attr($styled_class); ?> inspiring-author-role activeColor"><?php echo esc_html($author_designation); ?></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End h3 Inspiring Solution Section -->

  <?php } else { ?> 

  <!-- h1 Inspiring Solution Section -->
  <div class="inspiring-section">
    <div class="inspiring-section-bg">
      <img src="<?php echo esc_url( $sec_bg_img ); ?>" alt="<?php esc_attr_e( 'background image', 'dustrial' ); ?>">
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="inspiring-content-area">
            <div class="<?php echo esc_attr($styled_class); ?> section-title wow <?php echo esc_attr($video_anim_animate);?>">
              <div class="section-thumb"><img src="<?php echo esc_url( $icon_img ); ?>" alt="<?php esc_attr_e( 'title icon', 'dustrial' ); ?>"></div>
              <div class="section-body">
                <h6 class="sub-title activeColor"><?php echo esc_html($section_sub_title); ?></h6>
                <h3 class="m-0 main-title"><?php echo esc_html($section_title); ?></h3>
              </div>
            </div>
            <div class="<?php echo esc_attr($styled_class); ?> inspiring-content wow <?php echo esc_attr($video_anim_animate);?>">
              <p><?php echo wp_kses_stripslashes($section_desc); ?></p>
            </div>
            <div class="inspiring-by">
              <img src="<?php echo esc_url( $sign_img ); ?>" alt="<?php esc_attr_e( 'signature', 'dustrial' ); ?>">
              <h5 class="inspiring-author"><?php echo esc_html($author_name); ?></h5>
              <h6 class="<?php echo esc_attr($styled_class); ?> inspiring-author-role activeColor"><?php echo esc_html($author_designation); ?></h6>
            </div>
          </div>
          <div class="business-video-icon">
              <a class="<?php echo esc_attr($styled_class); ?> video-play-button popup-vimeo" href="<?php echo esc_url( $video_link ); ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End h1 Inspiring Solution Section -->

<?php }
  return ob_get_clean();
}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Market Section
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_market_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'posts_per_page'        => '3',
      'content_expcerpt'      => '', 
      'posts_cat_id'          => '',
      'select_post_column'    => '4',
      'no_gurters'            => '',
      'select_market_style'   => '',
      'service_opacity'       => '',
      'service_overlay_color' => '',
      ), $atts )
  );
  ob_start();

  if (!empty($no_gurters)) {
    $no_gurters = 'no-gutters';
  } else {
    $no_gurters = '';
  }

  if ($select_post_column == '6') {
    $crop_img = 'dustrial-570';
  } elseif ($select_post_column == '12') {
    $crop_img = 'full';
  } else {
    $crop_img = 'dustrial-362';
  }

  if (!empty($posts_cat_id)) {
    $smallcase = strtolower($posts_cat_id);
    $string = str_replace(" ", "-", $smallcase);
    $str_arr = explode (",", $string);  

    $exclude_slugs      = $str_arr;                               
    $include_ids        = array();

    foreach( $exclude_slugs as $slug ) { 
      $mfm_term = get_term_by( 'slug', $slug, 'service_cat' );
      if( is_object( $mfm_term ) ) {
        $include_ids[] = $mfm_term->term_id;
      }
    }
  } else {
    $include_ids[] = '';
  }

  $service_uniqid     = uniqid();
  $service_box_inline = '';

  // Title Color
  if ( $service_overlay_color ) {
    $service_box_inline .= '.market-single-items .service-overlay'. $service_uniqid .'{';
    $service_box_inline .= ( $service_overlay_color ) ? 'background-color:'. $service_overlay_color  .' !important;' : '';
    $service_box_inline .= '}';
  } 
  if ( $service_opacity ) {
    $service_box_inline .= '.market-single-items:hover .service-overlay'. $service_uniqid .'{';
    $service_box_inline .= ( $service_opacity ) ? 'opacity:'. $service_opacity  .' !important;' : '';
    $service_box_inline .= '}';
  }

  add_inline_style( $service_box_inline );
  $styled_class  = 'service-overlay'. $service_uniqid;

?>
<div class="row">

    <?php

    if (!empty($posts_cat_id)) {
      $args = array(
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'tax_query' => array(
          array(
            'taxonomy' => 'service_cat',
            'field' => 'id',
            'terms' => $include_ids
          )
        ),
      );
    } else {
      $args = array(
        'post_type'      => 'service',
        'post_status'    => 'publish',
        'posts_per_page' => $posts_per_page,
        'orderby'        => 'date',
        'taxonomy' => 'service_cat',
      );
    }

    $loop = new WP_Query( $args );
    while ( $loop->have_posts() ) : $loop->the_post();

    $market_meta_data = get_post_meta(get_the_ID(), '_dustrial_service', true);
    if (!empty($market_meta_data['market_icon'])) {
      $icon = $market_meta_data['market_icon'];
    } else {
      $icon = '';
    }

    if (!empty($content_expcerpt)) {
      $content_expcerpt = $content_expcerpt;
    } else {
      $content_expcerpt = '25';
    }

    $market_excerpt = dustrial_excerpt($content_expcerpt);


    if ($select_market_style == '1') {

    ?>

      <div class="col-lg-<?php echo esc_attr( $select_post_column . ' ' . $no_gurters ); ?> col-md-6">
        <div class="market-single-items">
          <div class="market-item-thumb">
            <?php if(has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>">
                <div class="img-overlay <?php echo esc_attr( $styled_class ); ?> style-1 activeColor">
                  <i class="fa fa-link" aria-hidden="true"></i>
                </div>
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              </a>
              <?php } if (!empty($icon)) { ?>
                <a href="<?php the_permalink(); ?>">
                  <div class="shape"></div>
                  <div class="categories">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                  </div>
                </a>
              <?php } ?>
          </div>
          <div class="market-item-details">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p class="card-text"><?php echo $market_excerpt; ?></p>
          </div>
        </div>
      </div>

      <?php } elseif ($select_market_style == '2') { ?>

      <div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $select_post_column . ' ' . $no_gurters ); ?>">
        <div class="market-single-items">
          <div class="market-item-thumb market-style-2">
            <?php if(has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>">
                <div class="img-overlay <?php echo esc_attr( $styled_class ); ?> activeColor">
                    <i class="fa fa-link" aria-hidden="true"></i>
                </div>
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              </a>
            <?php } ?>
          </div>
          <div class="market-item-details">
            <?php if (!empty($icon)) { ?>
            <div class="market-item2-icons">
              <i class="<?php echo esc_attr( $icon ); ?>"></i>
            </div>
            <?php } ?>
            <div class="market-item2-content">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              <p class="card-text"><?php echo $market_excerpt; ?></p>
            </div>
          </div>
        </div>
      </div>

      <?php } elseif ($select_market_style == '3') { ?>

      <div class="col-lg-<?php echo esc_attr( $select_post_column . ' ' . $no_gurters ); ?> col-md-6">
        <div class="market-single-items">
          <div class="market-item-thumb market-style-3">
            <?php if(has_post_thumbnail()) { ?>
            <a href="<?php the_permalink(); ?>">
              <div class="img-overlay <?php echo esc_attr( $styled_class ); ?> activeColor d-flex align-items-center justify-content-center">
                  <i class="fa fa-link" aria-hidden="true"></i>
              </div>
              <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
            </a>
            <?php } if (!empty($icon)) { ?>
            <a href="<?php the_permalink(); ?>">
              <div class="shape-style-2"></div>
              <div class="categories">
                <i class="<?php echo esc_attr( $icon ); ?>"></i>
              </div>
            </a>
            <?php } ?>
          </div>
          <div class="market-item-details">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p class="card-text"><?php echo $market_excerpt; ?></p>
          </div>
        </div>
      </div>

      <?php } else { ?>

      <div class="col-lg-<?php echo esc_attr( $select_post_column . ' ' . $no_gurters ); ?> col-md-6">
        <div class="market-single-items">
          <div class="market-item-thumb">
            <?php if(has_post_thumbnail()) { ?>
              <a href="<?php the_permalink(); ?>">
                <div class="img-overlay <?php echo esc_attr( $styled_class ); ?> style-1 activeColor">
                  <i class="fa fa-link" aria-hidden="true"></i>
                </div>
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              </a>
              <?php } if (!empty($icon)) { ?>
                <a href="<?php the_permalink(); ?>">
                  <div class="shape"></div>
                  <div class="categories">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                  </div>
                </a>
              <?php } ?>
          </div>
          <div class="market-item-details">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <p class="card-text"><?php echo $market_excerpt; ?></p>
          </div>
        </div>
      </div>

    <?php } ?>

  <?php endwhile; ?>
</div>

<?php
  return ob_get_clean();
}
add_shortcode( 'dustrial_market_posts', 'dustrial_market_posts_shortcode' );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Project Section
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_project_posts', 'dustrial_project_posts_shortcode' );
function dustrial_project_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'no_filter'                  => '',
      'posts_per_page'             => '6',
      'content_expcerpt'           => '',  
      'posts_cat_id'               => '',
      'select_post_column'         => '',
      'no_gutters'                 => '',
      'select_layout_style'        => '',
      'select_filter_button_style' => '',
      'project_opacity'            => '',
      'project_overlay_color'      => '',
      ), $atts )
  );
  ob_start();

  if (!empty($no_gutters)) {
    $no_gutters = 'no-gutter';
  } else {
    $no_gutters = '';
  }

  if (!empty($select_post_column)) {
    $cl = $select_post_column;
  } else {
    $cl = '4';
  }

  if ($select_post_column == '6') {
    $crop_img = 'dustrial-570';
  } elseif ($select_post_column == '12') {
    $crop_img = 'full';
  } else {
    $crop_img = 'dustrial-362';
  }
  if (!empty($posts_cat_id)) {
    $smallcase = strtolower($posts_cat_id);
    $string = str_replace(" ", "-", $smallcase);
    $str_arr = explode (",", $string);  

    $exclude_slugs      = $str_arr;                               
    $include_ids        = array();

    foreach( $exclude_slugs as $slug ) { 
      $mfm_term = get_term_by( 'slug', $slug, 'our_project_tax' );
      if( is_object( $mfm_term ) ) {
        $include_ids[] = $mfm_term->term_id;
      }
    }
  } else {
    $include_ids[] = '';
  }

  $e_uniqid     = uniqid();
  $inline_style = '';

  // Title Color
  if ( $project_overlay_color ) {
    $inline_style .= '.project-overlay'. $e_uniqid .'{';
    $inline_style .= ( $project_overlay_color ) ? 'background-color:'. $project_overlay_color  .' !important;' : '';
    $inline_style .= '}';
  } 
  if ( $project_opacity ) {
    $inline_style .= 'isotop-projects-filter .card:hover .project-overlay'. $e_uniqid .'{';
    $inline_style .= ( $project_opacity ) ? 'opacity:'. $project_opacity  .' !important;' : '';
    $inline_style .= '}';
  }

  add_inline_style( $inline_style );
  $styled_class  = 'project-overlay'. $e_uniqid;

  // $data_control = "data-mixitup-control-$e_uniqid";

?>

<script>
  jQuery(window).on('load', function () {

    jQuery('.portfolio-area').imagesLoaded( function() {
        // portfolio - active
        var $grid = jQuery('.portfolio-active-<?php echo esc_attr($e_uniqid); ?>').isotope({
            itemSelector: '.grid-item',
            layoutMode: 'fitRows',
            percentPosition: true,
            masonry: {
                // use outer width of grid-sizer for columnWidth
                columnWidth: 1
            }
        })

        // filter items on button click
        jQuery('.portfolio-menu-<?php echo esc_attr($e_uniqid); ?>').on('click', 'button', function () {
            var filterValue = jQuery(this).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });
        //for menu active class
        jQuery('.portfolio-menu-<?php echo esc_attr($e_uniqid); ?> button').on('click', function (event) {
            jQuery(this).siblings('.active').removeClass('active');
            jQuery(this).addClass('active');
            event.preventDefault();
        });

    });

  });
</script>  

<div class="our-latest-project portfolio-area">
  <?php 
  if (empty($no_filter)) {
      $grid_item = 'grid-item';
      $filter_class = 'portfolio-active-'.$e_uniqid;
      $filters = get_terms( array(
        'taxonomy' => 'our_project_tax',
        'include' => $include_ids,
        'hide_empty'  => false, 
        'orderby'  => 'include',
      ) );
      if (!empty($filters)) {

        if ( $select_filter_button_style == '1' ) { ?>
          <!-- Letest Project Btn  -->
          <div class="mixitup-menus portfolio-menu-<?php echo esc_attr($e_uniqid); ?>">
            <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
            <?php if ( $filters && ! is_wp_error( $filters ) ) {
              foreach ($filters as $filter) {
                echo "<button class=\"btn\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
              }
            }
            ?>
          </div><!-- End Project Btn -->

        <?php } elseif ($select_filter_button_style == '2') { ?>
          <div class="h3-mixitup-menus portfolio-menu-<?php echo esc_attr($e_uniqid); ?>">
            <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
            <?php if ( $filters && ! is_wp_error( $filters ) ) {
              foreach ($filters as $filter) {
                echo "<button class=\"btn\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
              }
            }
            ?>
          </div>

        <?php } elseif ($select_filter_button_style == '3') { ?>
          <!-- Letest Project Btn -->
          <div class="inner-mixitup-menus portfolio-menu-<?php echo esc_attr($e_uniqid); ?> text-center">
            <button class="btn btn-primary active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
            <?php if ( $filters && ! is_wp_error( $filters ) ) {
              foreach ($filters as $filter) {
                echo "<button class=\"btn btn-primary mb-2 mb-md-0\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
              }
            }
            ?>
          </div><!-- End Project Btn -->

        <?php } else { ?>
            <!-- Letest Project Btn -->
            <div class="inner-mixitup-menus portfolio-menu-<?php echo esc_attr($e_uniqid); ?> text-center">
              <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
              <?php if ( $filters && ! is_wp_error( $filters ) ) {
                foreach ($filters as $filter) {
                  echo "<button class=\"btn mb-2 mb-md-0\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
                }
              }
              ?>
            </div><!-- End Project Btn -->
          <?php 
        }
      } 
  } else {
    $grid_item = '';
    $filter_class = '';
  } ?>

  <!-- Letest Project content -->
  <div id="dustrial-projects" class="row <?php echo esc_attr($filter_class); ?> isotop-projects-filter
">
    <?php

      if (!empty($posts_cat_id)) {
        $args = array(
          'post_type'      => 'our_project',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
          'orderby'        => 'date',
          'tax_query' => array(
            array(
              'taxonomy' => 'our_project_tax',
              'field' => 'id',
              'terms' => $include_ids
            )
          ),
        );
      } else {
        $args = array(
          'post_type'      => 'our_project',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
          'orderby'        => 'date',
          'taxonomy' => 'our_project_tax',
        );
      }

      $the_query = new WP_Query( $args );

      while ( $the_query->have_posts() ) :
        $the_query->the_post(); 

        $terms = get_the_terms(get_the_ID(), 'our_project_tax' );  
                
        if ( $terms && ! is_wp_error( $terms ) ) :

          $draught_links = array();
          foreach ( $terms as $term ) {
            $draught_links[] = $term->slug;

            $term_link = get_term_link( $term );
          }        
          $cat_slug = join( " ", $draught_links );

          if (!empty($content_expcerpt)) {
            $excerpt_lenght = $content_expcerpt;
          } else {
            $excerpt_lenght = '20';
          }

          $content = get_the_content(get_the_ID());

          $project_info_data = get_post_meta(get_the_ID(), '_dustrial_our_project', true);
          if (!empty($project_info_data['project_location'])) {
            $location = $project_info_data['project_location'];
          } else {
            $location = '';
          }
    ?>

      <div class="grid-item <?php echo esc_attr( $cat_slug.' '.$no_gutters ); ?> col-lg-<?php echo esc_attr( $cl ); ?> col-12 col-md-6">

        <?php if ($select_layout_style == '1') { ?>

          <div class="card border-0 rounded-0">
            <div class="card-img position-relative">
              <?php if(has_post_thumbnail()) { ?>
                <div class="img-overlay style-1 activeColor d-flex align-items-center justify-content-center text-center <?php echo esc_attr( $styled_class ); ?>">
                  <div class="col-md-10">
                    <h5 class="text-light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="text-light"><?php echo dustrial_excerpt($excerpt_lenght); ?></div>
                  </div>
                </div>
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              <?php } ?>

              <div class="shape"></div>
              <div class="categories">
                <a href="<?php the_permalink(); ?>">
                  <img class="img-fluid" src="<?php echo DUSTRIAL_IMG . '/big-arrow.png' ?>" alt="cat img">
                </a>
              </div>
            </div>
          </div>

        <?php } elseif ($select_layout_style == '2') { ?>

          <div class="h2-single-projects-item">
            <?php if(has_post_thumbnail()) { ?>
              <div class="h2-single-projects-thumbnail">
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                  <span><i class="fa fa-link"></i></span>
                </a>
              </div>
            <?php } ?>
            <div class="h2-single-projects-content">
              <div class="h2-single-projects-title">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </div>
              <div class="h2-single-projects-meta">
                <p><?php echo esc_html( $cat_slug ); if(!empty($location )){ esc_html_e( ' / ', 'dustrial' ); echo esc_html( $location ); } ?></p>
              </div>
            </div>
          </div>

        <?php } elseif ($select_layout_style == '3') { ?>

          <div class="card border-0 rounded-0">
            <div class="card-img position-relative">
              <?php if(has_post_thumbnail()) { ?>                
                <div class="img-overlay style-1 activeColor d-flex align-items-center justify-content-center text-center">
                  <div class="col-md-10">
                    <h5 class="text-light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <div class="text-light"><?php echo dustrial_excerpt($excerpt_lenght); ?></div>
                  </div>
                </div>
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              <?php } ?>
              <div class="shape"></div>
              <div class="categories">
                <a href="<?php the_permalink(); ?>">
                  <img class="img-fluid" src="<?php echo DUSTRIAL_IMG . '/big-arrow.png' ?>" alt="cat img">
                </a>
              </div>
            </div>
          </div>

        <?php } else { ?>

          <div class="card border-0 rounded-0">
            <div class="card-img position-relative">
              <?php if(has_post_thumbnail()) { ?>
                <div class="img-overlay style-1 activeColor d-flex align-items-center justify-content-center text-center <?php echo esc_attr( $styled_class ); ?>">
                  <div class="col-md-10">
                      <h5 class="text-light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                      <div class="text-light"><?php echo dustrial_excerpt($excerpt_lenght); ?></div>
                  </div>
                </div>
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
              <?php } ?>
              <div class="shape"></div>
              <div class="categories">
                <a href="<?php the_permalink(); ?>">
                  <img class="img-fluid" src="<?php echo DUSTRIAL_IMG . '/big-arrow.png' ?>" alt="cat img">
                </a>
              </div>
            </div>
          </div>

        <?php } ?>
      </div>
    <?php endif; endwhile; wp_reset_postdata(); ?>
  </div>
</div>

<?php
  return ob_get_clean();
}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Testimonial Element
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_testimonial_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'posts_per_page'      => '',
      'enable_loop'         => 'true',
      'enable_autoplay'     => 'true',
      'enable_navigation'   => 'true',
      'enable_pagination'   => 'true',
      'desktop_count'       => '2',
      'mobile_count'        => '1',
      'tablet_count'        => '1',
      'enable_speed'        => '1000',
      'enable_mousedrag'    => 'true',
      'select_style'        => '1',
      'enable_ratings'      => '1',
      ), $atts )
  );
  ob_start();


if($select_style == 1){
  $testimonial_loop = 'testimonial-items';
}elseif($select_style == 2){
  $testimonial_loop = 'h2-testimonial-items';
}elseif($select_style == 3){
  $testimonial_loop = 'h3-testimonial-items';
}else{
  $testimonial_loop = 'testimonial-items';
}


?>
  <script>
    jQuery(document).ready(function($) {
      $("#<?php echo esc_attr($testimonial_loop);?>").owlCarousel({
        loop: <?php echo esc_attr($enable_loop);?>,
        margin: 30,
        responsiveClass: true,
        navigation: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        nav: <?php echo esc_attr($enable_navigation);?>,
        items: <?php echo esc_attr($desktop_count);?>,
        dots: <?php echo esc_attr($enable_pagination);?>,
        autoplay: <?php echo esc_attr($enable_autoplay);?>,
        smartSpeed: 1000,
        autoplayTimeout: <?php echo esc_attr($enable_speed);?>,
        mouseDrag:<?php echo esc_attr($enable_mousedrag);?>,
        center: false,
        responsive: {
            0: {
                items: <?php echo esc_attr($mobile_count);?>
            },
            766: {
                items: <?php echo esc_attr($mobile_count);?>
            },
            767: {
                items: <?php echo esc_attr($tablet_count);?>
            },
            990: {
                items: <?php echo esc_attr($tablet_count);?>
            },
            991: {
                items: <?php echo esc_attr($desktop_count);?>
            }
        }
      });
    });
  </script>
<?php

  if ($select_style == '1') {
?>

  <div id="testimonial-items" class="owl-carousel">
    <?php 
    $loop = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => $posts_per_page, ) );
    while ( $loop->have_posts() ) : $loop->the_post();
      $testimonial_meta = get_post_meta(get_the_ID(), '_dustrial_testimonial', true);
      if (!empty($testimonial_meta['testimonial_name'])) {
        $testimonial_name = $testimonial_meta['testimonial_name'];
      } else {
        $testimonial_name = '';
      }

      if (!empty($testimonial_meta['rewiew_setting'])) {
        $rewiew_setting = $testimonial_meta['rewiew_setting'];
      } else {
        $rewiew_setting = '';
      }
    ?>
      <div class="single-testimonial-items">
        <div class="single-testimonial-items-title">
          <h3><?php the_title(); ?></h3>
        </div>
        <div class="single-testimonial-items-content">
          <?php the_content(); ?>
        </div>
        <div class="single-testimonial-items-meta">
          <h5 class="testimonial-author-name"><?php echo esc_html( $testimonial_name ); ?></h5>
          <?php if($enable_ratings == 1){?>
            <div class="testimonial-star-ratings">
            <?php 
              for ($i=0; $i <=4 ; $i++) {
                if ($i < $rewiew_setting) {
                  $full = '';
                } else {
                  $full = '-o';
                }
                echo "<i class=\"fa fa-star".$full." activeColor mr-1\" aria-hidden=\"true\"></i>";
              }
            ?>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php endwhile; ?>
  </div>

<?php } elseif ($select_style == '2') { ?>

  <div id="h2-testimonial-items" class="owl-carousel owl-theme">
    <?php 
      $loop = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => $posts_per_page, ) );
      while ( $loop->have_posts() ) : $loop->the_post();

      $testimonial_meta = get_post_meta(get_the_ID(), '_dustrial_testimonial', true);

      if (!empty($testimonial_meta['testimonial_name'])) {
        $testimonial_name = $testimonial_meta['testimonial_name'];
      } else {
        $testimonial_name = '';
      }

      if (!empty($testimonial_meta['rewiew_setting'])) {
        $rewiew_setting = $testimonial_meta['rewiew_setting'];
      } else {
        $rewiew_setting = '';
      }
    ?>

    <div class="item text-center">
      <div class="item-content">
        <div class="testimonial-author">
          <div class="testimonial-author-img mb-3">
            <?php the_post_thumbnail(); ?>
          </div>
          <h6 class="testimonial-author-name mb-1 text-light"><?php echo esc_html( $testimonial_name ); ?></h6>
          <?php if($enable_ratings == 1){?>
          <div class="testimonial-reating">
            <?php 
              for ($i=0; $i <=4 ; $i++) {
                if ($i < $rewiew_setting) {
                  $full = '';
                } else {
                  $full = '-o';
                }
                echo "<i class=\"fa fa-star".$full." activeColor mr-1\" aria-hidden=\"true\"></i>";
              }
            ?>
          </div>
        <?php } ?>
        </div>
        <div class="testimonial-content text-light text-center">
          <?php the_content(); ?>
        </div>
        <div class="quotation">
          <i class="fa fa-quote-left" aria-hidden="true"></i>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

<?php } elseif ($select_style == '3') { ?>

  <div id="h3-testimonial-items" class="owl-carousel owl-theme">
    <?php
    $loop = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => $posts_per_page, ) );
    while ( $loop->have_posts() ) : $loop->the_post();

    $testimonial_meta = get_post_meta(get_the_ID(), '_dustrial_testimonial', true);

    if (!empty($testimonial_meta['testimonial_name'])) {
      $testimonial_name = $testimonial_meta['testimonial_name'];
    } else {
      $testimonial_name = '';
    }

    if (!empty($testimonial_meta['rewiew_setting'])) {
      $rewiew_setting = $testimonial_meta['rewiew_setting'];
    } else {
      $rewiew_setting = '';
    }
    ?>

    <div class="item text-center">
      <div class="testimonial-content mb-5">
        <?php the_content(); ?>
      </div>
      <div class="testimonial-author pt-2">
        <div class="testimonial-author-img mb-3">
          <?php the_post_thumbnail(); ?>
        </div>
        <h5 class="testimonial-author-name mb-0"><?php echo esc_html( $testimonial_name ); ?></h5>
        <?php if($enable_ratings == 1){?>
          <div class="testimonial-star-ratings">
          <?php 
            for ($i=0; $i <=4 ; $i++) {
              if ($i < $rewiew_setting) {
                $full = '';
              } else {
                $full = '-o';
              }
              echo "<i class=\"fa fa-star".$full." activeColor mr-1\" aria-hidden=\"true\"></i>";
            }
          ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

<?php } else { ?>

  <div id="testimonial-items" class="owl-carousel owl-theme">
    <?php 
    $loop = new WP_Query( array( 'post_type' => 'testimonial', 'posts_per_page' => $posts_per_page, ) );
    while ( $loop->have_posts() ) : $loop->the_post();  

    $testimonial_meta = get_post_meta(get_the_ID(), '_dustrial_testimonial', true);

    if (!empty($testimonial_meta['testimonial_name'])) {
      $testimonial_name = $testimonial_meta['testimonial_name'];
    } else {
      $testimonial_name = '';
    }

    if (!empty($testimonial_meta['rewiew_setting'])) {
      $rewiew_setting = $testimonial_meta['rewiew_setting'];
    } else {
      $rewiew_setting = '';
    }
    ?>
    <div class="single-testimonial-items">
      <div class="single-testimonial-items-title">
        <h3><?php the_title(); ?></h3>
      </div>
      <div class="single-testimonial-items-content">
        <?php the_content(); ?>
      </div>
      <div class="single-testimonial-items-meta">
        <h5 class="testimonial-author-name"><?php echo esc_html( $testimonial_name ); ?></h5>
        <?php if($enable_ratings == 1){?>
          <div class="testimonial-star-ratings">
          <?php 
            for ($i=0; $i <=4 ; $i++) {
              if ($i < $rewiew_setting) {
                $full = '';
              } else {
                $full = '-o';
              }
              echo "<i class=\"fa fa-star".$full." activeColor mr-1\" aria-hidden=\"true\"></i>";
            }
          ?>
          </div>
        <?php } ?>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
<?php }

  return ob_get_clean();
}
add_shortcode( 'dustrial_testimonial_posts', 'dustrial_testimonial_posts_shortcode' );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial company section
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_company', 'dustrial_company_shortcode' );
function dustrial_company_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'section_bg_img'        => '',
      'section_side_img'      => '',
      'section_title'         => '',
      'section_sub_title'     => '',
      'section_icon_img'      => '',
      'section_desc_title'    => '',
      'section_desc'          => '',
      'company_service'       => '',
      'company_service_item'  => '',
      ), $atts )
  );
  ob_start();


  $section_bg_img   = get_vc_image( $section_bg_img );
  $section_side_img = get_vc_image( $section_side_img );
  $section_icon_img = get_vc_image( $section_icon_img );

  $company_service  = vc_param_group_parse_atts($atts['company_service_item']);

?>

  <div class="h2-company-area" style="background-image: url(<?php echo esc_url( $section_bg_img ); ?>);">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="section-title-two text-center">
            <div class="section-two-body">
              <h6 class="sub-title activeColor"><?php echo esc_html( $section_sub_title ); ?></h6>
              <h3 class="main-title"><?php echo esc_html( $section_title ); ?></h3>
            </div>
            <div class="stock">
              <img src="<?php echo esc_url( $section_icon_img ); ?>" alt="<?php esc_attr_e( 'stock', 'dustrial' ); ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-5 col-sm-12 col-12">
          <div class="block text-center">
            <img class="img-fluid mb-4" src="<?php echo esc_url( $section_side_img ); ?>" alt="<?php esc_attr_e( 'company img', 'dustrial' ); ?>">
          </div>
        </div>
        <div class="col-lg-7 col-sm-12 col-12">
          <div class="block">
            <h3 class="company-title"><?php echo esc_html( $section_desc_title ); ?></h3>
            <p class="m-0"><?php echo esc_html( $section_desc ); ?></p>
            <div class="company-featured">

              <?php foreach ($company_service as $key => $value) {

                if (!empty($value['pretty_icon1'])) {
                  $icon = $value['pretty_icon1'];
                } elseif(!empty($value['pretty_icon2'])) {
                  $icon = $value['pretty_icon2'];
                } else {
                  $icon = '';
                }

              ?>
              <div class="media">
                <?php if (!empty($icon)) { ?>
                <div class="company-icon">
                  <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
                <?php } ?>
                <div class="media-body">
                  <div>
                    <?php if (!empty($value['company_service_title'])) { ?>
                    <h6 class="mb-1 sub-title"><?php echo esc_html($value['company_service_title']); ?></h6>
                    <?php } if (!empty($value['company_service_desc'])) { ?>
                      <p class="m-0"><?php echo esc_html($value['company_service_desc']); ?></p>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Call to action
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_call_to_action_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'call_toaction_style'   => '',
      'section_title'         => '',
      'section_description'   => '',
      'type'                  => '1',
      'link_to_page'          => '',
      'external_links'        => '',
      'link_text'             => 'Purchase Now',
      'call_to_action_video'  => '',
      'call_toaction_position'=> '',
      ), $atts )
  );
  ob_start();


  if($type == 1){
    $link_source = get_page_link($link_to_page);
  }else{
    $link_source = $external_links;
  }

  if ($call_toaction_position == 'style1') {
    $testp = 'text-center';
  } elseif($call_toaction_position == 'style2') {
    $testp = 'text-left';
  } elseif($call_toaction_position == 'style3') { 
    $testp = 'text-right';
  }else{
    $testp = 'text-center';
  }



  if ($call_toaction_style == 'style1') {
?>
    <div class="call-to-action-sections default-style <?php echo esc_attr($testp);?>">
      <div class="call_to_action_title wow fadeInUp">
        <h2><?php echo esc_html( $section_title ); ?></h2>
        <p><?php echo esc_html( $section_description ); ?></p>
      </div>
      <div class="call_to_action_btns wow fadeInUp">
        <a href="<?php echo esc_url( $link_source ); ?>" class="btn call_to_action_btn"><?php echo esc_html( $link_text ); ?></a>
      </div>
    </div>
  <?php } elseif($call_toaction_style == 'style2') { ?>
    <div class="call-to-action-sections style-two <?php echo esc_attr($testp);?>">
      <?php if( !empty( $call_to_action_video) ) { ?>
        <div class="call_to_action_video_btn fadeInUp">
            <a class="video-play-button popup-vimeo" href="<?php echo esc_url( $call_to_action_video ); ?>"><i class="fa fa-play"></i></a>
        </div>
      <?php } ?>
      <div class="call_to_action_title wow fadeInUp">
        <h2><?php echo esc_html( $section_title ); ?></h2>
        <p><?php echo esc_html( $section_description ); ?></p>
      </div>
      <?php if(!empty($link_source) ){ ?>
        <div class="call_to_action_btns wow fadeInUp">
          <a href="<?php echo esc_url( $link_source ); ?>" class="btn call_to_action_btn"><?php echo esc_html( $link_text ); ?></a>
        </div>
      <?php } ?>
    </div>
  <?php } elseif($call_toaction_style == 'style3') { ?>

  <?php } elseif($call_toaction_style == 'style4') { ?>

  <?php } else{ ?> 
    <div class="call-to-action-sections default-style <?php echo esc_attr($testp);?>">
      <div class="call_to_action_title wow fadeInUp">
        <h2><?php echo esc_html( $section_title ); ?></h2>
        <p><?php echo esc_html( $section_description ); ?></p>
      </div>
      <div class="call_to_action_btns wow fadeInUp">
        <a href="<?php echo esc_url( $link_source ); ?>" class="btn call_to_action_btn"><?php echo esc_html( $link_text ); ?></a>
      </div>
    </div>
  <?php } ?>

<?php
  return ob_get_clean();
}
add_shortcode( 'dustrial_call_to_action', 'dustrial_call_to_action_shortcode' );



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Video Button
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_video_button_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'external_links'  => '',
      ), $atts )
  );
  ob_start();
?>

<div class="business-video">
  <div class="business-video-icon">
    <a class="video-play-button popup-vimeo" href="<?php echo esc_url( $external_links ); ?>"><i class="fa fa-play" aria-hidden="true"></i></a>
  </div>
</div>

<?php
  return ob_get_clean();
}
add_shortcode( 'dustrial_videobtn', 'dustrial_video_button_shortcode' );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Blog Section
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_blog_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'posts_per_page'      => '12',
      'content_expcerpt'    => '15',
      'hide_post_author'    => '',
      'hide_post_date'      => '',
      'hide_post_comment'   => '',
      'select_blog_style'   => '',
      'no_post_thumb'       => '',
      'no_post_slider'      => '',
      'blog_post_column'    => '3',
      'enable_autoplay'     => 'true',
      'enable_loop'         => 'true',
      'enable_navigation'   => 'true',
      'enable_pagination'   => 'true',
      'desktop_count'       => '3',
      'tablet_count'        => '2',
      'mobile_count'        => '1',
      'enable_speed'        => '1000',
      'enable_mousedrag'    => '1000',
      ), $atts )
  );
  ob_start();


  if (!empty($content_expcerpt)) {
    $excerpt_length = $content_expcerpt;
  } else {
    $excerpt_length = '15';
  }

  if ($blog_post_column == '6') {
    $crop_img = 'dustrial-570';
  } elseif ($blog_post_column == '4') {
    $crop_img = 'dustrial-362';
  } elseif ($blog_post_column == '3') {
    $crop_img = 'dustrial-362';
  } else {
    $crop_img = 'full';
  }

  if($select_blog_style == 1){
    $choose_blog_lay = 'blog-list';
  }elseif($select_blog_style == 2){
    $choose_blog_lay = 'blog-list-2';
  }else{
    $choose_blog_lay = 'blog-list';
  }

  ?>


  <?php if(($select_blog_style == 1) || ($select_blog_style == 2)){?>

  <script>
    jQuery(document).ready(function($) {
      $("#<?php echo esc_attr($choose_blog_lay);?>").owlCarousel({
        loop: <?php echo esc_attr($enable_loop);?>,
        margin: 0,
        responsiveClass: true,
        navigation: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        nav: <?php echo esc_attr($enable_navigation);?>,
        items: <?php echo esc_attr($desktop_count);?>,
        smartSpeed: <?php echo esc_attr($enable_speed);?>,
        dots: <?php echo esc_attr($enable_pagination);?>,
        autoplay: <?php echo esc_attr($enable_autoplay);?>,
        mouseDrag:<?php echo esc_attr($enable_mousedrag);?>,
        autoplayTimeout: 4000,
        center: false,
        responsive: {
            0: {
                items: <?php echo esc_attr($mobile_count);?>
            },
            766: {
                items: <?php echo esc_attr($mobile_count);?>
            },
            767: {
                items: <?php echo esc_attr($tablet_count);?>
            },
            990: {
                items: <?php echo esc_attr($tablet_count);?>
            },
            991: {
                items: <?php echo esc_attr($desktop_count);?>
            }
        }
      });
    });
  </script>

<?php } ?>


  <?php if($select_blog_style == 1){?>
    <div id="blog-list" class="owl-carousel">
      <?php 
        $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, ) );
        while ( $loop->have_posts() ) : $loop->the_post();
        $the_excerpt = get_the_excerpt($excerpt_length);
      ?>

      <div class="single-blog-wrapper">
        <div class="single-blog">
          <?php
          if ($no_post_thumb == '' ) {
            if(has_post_thumbnail()) { ?>
              <div class="single-blog-thumb">
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                  <span class="icon"><i class="fa fa-link"></i></span>
                </a>
              </div>
              <?php
            }
          }
          ?>
          <div class="content">
            <div class="entry-meta">
              <?php if (empty($hide_post_author)) { ?>
                <div class="author">
                  <?php esc_html_e( 'By ', 'dustrial' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                </div>
              <?php } if (empty($hide_post_date)) { ?>
                <div class="month">
                  <a href="<?php esc_url(the_permalink()); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </div>
              <?php } ?>
            </div>
            <a href="<?php esc_url(the_permalink()); ?>" class="entry-title"><?php the_title(); ?></a>
            <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
          </div>
          <div class="entry-meta-footer">
            <ul>
              <li class="read-more-btn">
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
              <li class="comments-area">
              <?php if ($hide_post_comment == ''){ ?>
                <a href="<?php comments_link(); ?>"> <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Comments: 0', "dustrial" ), esc_html__( 'Comments: 1', "dustrial" ),esc_html__( '% Comments', "dustrial" )); ?></a>
              <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <?php endwhile; ?>
    </div>

  <?php }elseif($select_blog_style == 2){ ?>
    <div id="blog-list-2" class="owl-carousel">
      <?php 
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, ) );
      while ( $loop->have_posts() ) : $loop->the_post();
      $the_excerpt = get_the_excerpt($excerpt_length);
      ?>
      <div class="h2-single-blog-wrapper">
        <div class="h2-blog-single-item">
          <?php 
            if ($no_post_thumb == '' ) {
              if(has_post_thumbnail()) { ?>
              <div class="blog-img">
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                <div class="overlay-btn">
                  <?php
                  $category = get_the_category(get_the_ID());
                  foreach($category as $cat) { ?>
                    <a href="<?php echo get_category_link($cat->cat_ID); ?>" class="btn btn-primary"><?php echo $cat->name ?></a>
                  <?php } ?>
                </div>
              </div>
              <?php
              }
            }
          ?>
          <div class="card rounded-0">
            <div class="card-body">
              <div class="article-content">
                <div class="entry-meta d-flex">
                  <?php if (empty($hide_post_author)) { ?>
                    <div class="author"><?php esc_html_e( 'By', 'dustrial' ); ?> <?php  the_author(); ?></div>
                  <?php } if (empty($hide_post_date)) { ?>
                    <div class="month"><a href="<?php echo get_day_link('', '', ''); ?>"><?php echo get_the_date(); ?></a></div>
                  <?php } ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a>
                <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
                <?php
                   wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dustrial' ),
                    'after'  => '</div>',
                    ) );
                ?>
              </div>
              <div class="entry-meta-footer m-0">
                <ul>
                  <li class="read-more-btn">
                    <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                  </li>
                  <li class="comments-area">
                  <?php if ($hide_post_comment == ''){ ?>
                    <a href="<?php comments_link(); ?>"> <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Comments: 0', "dustrial" ), esc_html__( 'Comments: 1', "dustrial" ),esc_html__( '% Comments', "dustrial" )); ?></a>
                  <?php } ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  <?php }elseif($select_blog_style == 3){ ?>
    <div class="row">
      <?php
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page ) );
      while ( $loop->have_posts() ) : $loop->the_post();
      $the_excerpt = get_the_excerpt($excerpt_length);
      ?>

      <div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $blog_post_column ); ?>">
        <div class="single-blog">
          <?php
          if ($no_post_thumb == '' ) {
            if(has_post_thumbnail()) { ?>
              <div class="single-blog-thumb">
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                  <span class="icon"><i class="fa fa-link"></i></span>
                </a>
              </div>
              <?php
            }
          }
          ?>
          <div class="content">
            <div class="entry-meta">
              <?php if (empty($hide_post_author)) { ?>
                <div class="author">
                  <?php esc_html_e( 'By ', 'dustrial' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                </div>
              <?php } if (empty($hide_post_date)) { ?>
                <div class="month">
                  <a href="<?php esc_url(the_permalink()); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </div>
              <?php } ?>
            </div>
            <a href="<?php esc_url(the_permalink()); ?>" class="entry-title"><?php the_title(); ?></a>
            <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
          </div>
          <div class="entry-meta-footer">
            <ul>
              <li class="read-more-btn">
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
              <li class="comments-area">
                <?php if ($hide_post_comment == ''){ ?>
                  <a href="<?php comments_link(); ?>"> <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Comments: 0', "dustrial" ), esc_html__( 'Comments: 1', "dustrial" ),esc_html__( '% Comments', "dustrial" )); ?></a>
                <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php }elseif($select_blog_style == 4){ ?>    

    <div class="row">
      <?php
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page ) );
      while ( $loop->have_posts() ) : $loop->the_post();
      $the_excerpt = get_the_excerpt($excerpt_length);
      ?>

      <div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $blog_post_column ); ?>">
        <div class="blog-style-four-item">
          <?php
          if ($no_post_thumb == '' ) {
            if(has_post_thumbnail()) { ?>
              <div class="single-blog-thumb">
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                </a>
              </div>
              <?php
            }
          }
          ?>
          <div class="blog-style-four-item-content">
            <div class="entry-meta">
              <ul>
              <?php if (empty($hide_post_author)) { ?>
                <li class="author">
                   <i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                </li>
              <?php } if (empty($hide_post_date)) { ?>
                <li class="month">
                  <i class="fa fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
              <?php } ?>
              </ul>
            </div>
            <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
            <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
            <div class="entry-meta-footer">
              <a href="<?php esc_url(the_permalink()); ?>" class="read-more"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-long-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php }elseif($select_blog_style == 5){ ?>    

    <div class="row">
      <?php
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page ) );
      while ( $loop->have_posts() ) : $loop->the_post();
      $the_excerpt = get_the_excerpt($excerpt_length);
      ?>

      <div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $blog_post_column ); ?>">
        <div class="blog-style-five-item">
          <?php
          if ($no_post_thumb == '' ) {
            if(has_post_thumbnail()) { ?>
              <div class="single-blog-thumb">
                <a href="<?php esc_url(the_permalink()); ?>">
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                </a>
              </div>
              <?php
            }
          }
          ?>
          <div class="blog-style-five-item-content">
            <div class="entry-meta">
              <ul>
              <?php if (empty($hide_post_author)) { ?>
                <li class="author">
                   <i class="fa fa-user"></i><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                </li>
              <?php } if (empty($hide_post_date)) { ?>
                <li class="month">
                  <i class="fa fa-calendar"></i><a href="<?php esc_url(the_permalink()); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </li>
              <?php } ?>
              </ul>
            </div>
            <h3 class="entry-title"><a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a></h3>
            <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
            <div class="entry-meta-footer">
              <a href="<?php esc_url(the_permalink()); ?>" class="read-more"><?php esc_html_e('Read More', 'dustrial'); ?></a>
              <div class="arrow-style"><a href="<?php esc_url(the_permalink()); ?>"><i class="fa fa-long-arrow-right"></i></a></div>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php } else { ?>

    <div id="blog-list" class="owl-carousel">
      <?php 
      $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => $posts_per_page, ) );
      while ( $loop->have_posts() ) : $loop->the_post();
      $the_excerpt = get_the_excerpt($excerpt_length);
      ?>

      <div class="single-blog-wrapper">
        <div class="single-blog">
          <?php
          if ($no_post_thumb == '' ) {
              if(has_post_thumbnail()) { ?>
                <div class="single-blog-thumb">
                  <a href="<?php esc_url(the_permalink()); ?>">
                    <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                    <span class="icon"><i class="fa fa-link"></i></span>
                  </a>
                </div>
              <?php
            }
          }
          ?>
          <div class="content">
            <div class="entry-meta">
              <?php if ($hide_post_author == ''){ ?>
                <div class="author">
                  <?php esc_html_e( 'By ', 'dustrial' ); ?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author(); ?></a>
                </div>
              <?php } ?>
              <?php if ($hide_post_date == ''){ ?>
                <div class="month">
                  <a href="<?php esc_url(the_permalink()); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
                </div>
              <?php } ?>
            </div>
            <a href="<?php esc_url(the_permalink()); ?>" class="entry-title"><?php the_title(); ?></a>
            <p class="entry-content"><?php echo dustrial_excerpt( $excerpt_length );?></p>
          </div>
          <div class="entry-meta-footer">
            <ul>
              <li class="read-more-btn">
                <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
              </li>
              <li class="comments-area">
              <?php if ($hide_post_comment == ''){ ?>
                <a href="<?php comments_link(); ?>"> <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Comments: 0', "dustrial" ), esc_html__( 'Comments: 1', "dustrial" ),esc_html__( '% Comments', "dustrial" )); ?></a>
              <?php } ?>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <?php endwhile; ?>
    </div>

  <?php }
  return ob_get_clean();
}
add_shortcode( 'dustrial_blog_posts', 'dustrial_blog_posts_shortcode' );



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Counter Element
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_counter', 'dustrial_counter_shortcode' );
function dustrial_counter_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'counter_title1'       => '',
      'counter_title2'       => '',
      'count_number'         => '',
      'counter_desc'         => '',
      'select_counter_style' => '',
      'count_number_color'   => '',
      'count_small_text_color' => '',
      'count_big_text_color' => '',
      ), $atts )
  );
  ob_start();


  $e_uniqid     = uniqid();
  $inline_style = '';

  if ($select_counter_style == 1) {

    // Title Color
    if ( $count_number_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h2.counter.counter-up {';
      $inline_style .= ( $count_number_color ) ? 'color:'. $count_number_color .';' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $count_small_text_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h5{';
      $inline_style .= ( $count_small_text_color ) ? 'color:'. $count_small_text_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $count_big_text_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h5.activeColor{';
      $inline_style .= ( $count_big_text_color ) ? 'color:'. $count_big_text_color .' !important;' : '';
      $inline_style .= '}';
    }

  }elseif ($select_counter_style == 2) {
  
  }else{

    // Title Color
    if ( $count_number_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h2.counter.counter-up {';
      $inline_style .= ( $count_number_color ) ? 'color:'. $count_number_color .';' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $count_small_text_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h5{';
      $inline_style .= ( $count_small_text_color ) ? 'color:'. $count_small_text_color .' !important;' : '';
      $inline_style .= '}';
    }

    // Sub Title Color
    if ( $count_big_text_color ) {
      $inline_style .= '.dustrial-scount-'. $e_uniqid .'.single-counter .content h5.activeColor{';
      $inline_style .= ( $count_big_text_color ) ? 'color:'. $count_big_text_color .' !important;' : '';
      $inline_style .= '}';
    }

  }  


  add_inline_style( $inline_style );
  $styled_class  = 'dustrial-scount-'. $e_uniqid;



if ($select_counter_style == '1') { ?>

 <div class="<?php echo esc_attr($styled_class); ?> single-counter">
    <div class="content">
      <h2 class="counter counter-up"><?php echo esc_attr( $count_number ); ?></h2>
      <h5 class="m-0"><?php echo esc_html( $counter_title1 ); ?></h5>
      <h5 class="m-0 activeColor"><?php echo esc_html( $counter_title2 ); ?></h5>
    </div>
  </div>

<?php } elseif ($select_counter_style == '2') { ?>

  <div class="features-item-border">
    <div class="h2-single-featured-box">
      <div class="process_count activeColor"><?php echo esc_attr( $count_number ); ?></div>
      <h5 class="featured-item-title"><?php echo esc_html( $counter_title1 ); ?></h5>
      <p class="featured-content"><?php echo esc_html( $counter_desc ); ?></p>
    </div>
  </div>
 
<?php } else { ?>

  <div class="<?php echo esc_attr($styled_class); ?> single-counter">
    <div class="content">
      <h2 class="counter counter-up"><?php echo esc_attr( $count_number ); ?></h2>
      <h5 class="m-0"><?php echo esc_html( $counter_title1 ); ?></h5>
      <h5 class="m-0 activeColor"><?php echo esc_html( $counter_title2 ); ?></h5>
    </div>
  </div>

<?php }
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Counter Element
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_client_slider', 'dustrial_client_slider_shortcode' );
function dustrial_client_slider_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'client_brand_img'  => '',
      'desktop_count'     => '5',
      'tablet_count'      => '3',
      'mobile_count'      => '2',
      'enable_loop'       => 'true',
      'enable_autoplay'   => 'true',
      'enable_navigation' => 'true',
      'enable_speed'      => '1000',
      'enable_pagination' => 'true',
      'enable_mousedrag'  => 'true',
      ), $atts )
  );
  ob_start();

  $slide_images = explode(',', $client_brand_img);

  $randdon_id = md5(uniqid(rand(), true));

?>

  <script>
    jQuery(document).ready(function($) {
      $("#client-carousel-items<?php echo esc_attr($randdon_id); ?>").owlCarousel({
        loop: <?php echo esc_attr($enable_loop);?>,
        margin: 30,
        responsiveClass: true,
        navigation: true,
        navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
        nav: <?php echo esc_attr($enable_navigation);?>,
        items: <?php echo esc_attr($desktop_count);?>,
        smartSpeed: <?php echo esc_attr($enable_speed);?>,
        dots: <?php echo esc_attr($enable_pagination);?>,
        autoplay: <?php echo esc_attr($enable_autoplay);?>,
        mouseDrag:<?php echo esc_attr($enable_mousedrag);?>,
        autoplayTimeout: 4000,
        center: false,
        responsive: {
            0: {
                items: <?php echo esc_attr($mobile_count);?>
            },
            480: {
                items: <?php echo esc_attr($tablet_count);?>
            },
            760: {
                items: <?php echo esc_attr($desktop_count);?>
            }
        }
      });
    });
  </script>

  <div id="client-carousel-items<?php echo esc_attr($randdon_id); ?>" class="owl-carousel client-carousel-area">
    <?php foreach ($slide_images as $key => $value) { 
      $image_id = $value;
      $attachment = wp_get_attachment_image_src( $image_id, 'full' );
      $image = $attachment['0'];
    ?>
      <div class="client-logo-table">
        <div class="client-logo-tablecell">
          <img src="<?php echo esc_url($image); ?>" alt="sponsored-img">
        </div>
      </div>
    <?php } ?>
  </div>
<?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Team Member 
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'team_member', 'team_member_shortcode' );
function team_member_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'member_name'        => '',
      'member_designation' => '',
      'social_media'       => '',
      'member_picture'     => '',
      'team_box_style'     => '',
      'box_custom_class'   => '',
      ), $atts )
  );
  ob_start();

  $image = get_vc_image( $member_picture );

  if (!empty($atts['social_media'])) {
    $social_media = vc_param_group_parse_atts($atts['social_media']);
  } else {
    $social_media = '';
  }

?>
  <div class="team-item <?php echo esc_attr( $box_custom_class ); ?>">
    <div class="team-single-item">
      <div class="team-item-thumbnail-area">
        <img src="<?php echo esc_url( $image ); ?>" alt="Team Image">
        <div class="team-single-social">
          <?php
            foreach ($social_media as $key => $value) {
              $icon = $value['social_icon'];
              $a = explode(' ',$icon);
              $b = explode('-',$icon);
          ?>
          <a href="<?php echo esc_url($value['social_link']); ?>"> <i class="<?php echo esc_attr($value['social_icon']); ?>"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="team-item-content">
        <h5 class="team-title"><?php echo esc_html($member_name); ?></h5>
        <p class="team-designation"><?php echo esc_html($member_designation); ?></p>
      </div>
    </div>
  </div>

  <?php
  return ob_get_clean();
}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Team Section
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_team_posts', 'dustrial_team_posts_shortcode' );
function dustrial_team_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'posts_per_page'     => '',
      'select_post_column' => '',
      ), $atts )
  );
  ob_start();

?>
<div class="row">
  <?php

  global $post;
  $args = array( 'post_type'=>'team', 'posts_per_page' => $posts_per_page );
  $myposts = get_posts( $args );
  foreach( $myposts as $post ) :  setup_postdata($post);

    $team_meta = get_post_meta(get_the_ID(), '_dustrial_team', true);

    if (!empty($team_meta['team_designation'])) {
      $team_designation = $team_meta['team_designation'];
    } else {
      $team_designation = '';
    }

    if (!empty($team_meta['team_socials'])) {
      $team_socials = $team_meta['team_socials'];
    } else {
      $team_socials = '';
    }

    $thumb_img = get_the_post_thumbnail_url();

    ?>
    <div class="team-item col-12 col-md-6 col-lg-<?php echo esc_attr( $select_post_column ); ?>">
      <div class="team-single-item">
        <div class="team-item-thumbnail-area">
          <img src="<?php echo esc_url( $thumb_img ); ?>" alt="Team Image">
          <div class="team-single-social">
            <?php 
            if (is_array($team_socials)) {
              foreach ($team_socials as $key => $value) {
                $icon = $value['social_icon'];
                $a = explode(' ',$icon);
                $b = explode('-',$icon);
            ?>
            <a href="<?php echo esc_url($value['social_link']); ?>"> <i class="<?php echo esc_attr($value['social_icon']); ?>"></i></a>
            <?php } ?>
            <?php } ?>
          </div>
        </div>
        <div class="team-item-content">
          <h5 class="team-title"><?php the_title(); ?></h5>
          <p class="team-designation"><?php echo esc_html($team_designation); ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Featured Market Item
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'featured_market', 'featured_market_shortcode' );
function featured_market_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'post_img'          => '',
      'post_title'        => '',
      'post_description'  => '',
      'post_link'         => '',
      ), $atts )
  );
  ob_start();

  $image = get_vc_image( $post_img );

?>
  <div class="h3-single-featured">
    <div class="h3-single-featured-thumb">
      <img class="img-fluid" src="<?php echo esc_url($image); ?>" alt="Featured Img">
      <div class="h3-single-featured-overlay">
        <div class="h3-single-featured-details">
          <h4 class="h3-single-featured-title">
            <?php echo esc_html($post_title); ?>
          </h4>
          <p><?php echo esc_html($post_description); ?></p>
          <?php if (!empty($post_link)) { ?>
            <a href="<?php echo esc_url($post_link); ?>" class="btn btn-primary"><?php esc_html_e( 'Read More', 'dustrial' ); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <?php
  return ob_get_clean();
}

/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial contact info
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'contact_info', 'contact_info_shortcode' );
function contact_info_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'title_line1' => '',
      'title_line2' => '',
      'info_list'   => '',
      'social_info' => '',
      ), $atts )
  );
  ob_start();

  $info_list    = vc_param_group_parse_atts($atts['info_list']);
  $social_info  = vc_param_group_parse_atts($atts['social_info']);

?>
  <div class="block contact_address">
    <div class="title">
      <h4><?php echo esc_html($title_line1); ?></h4>
      <h1><?php echo esc_html($title_line2); ?></h1>
    </div>

    <?php foreach ($info_list as $key => $value) {

      if ( $value['type'] == 'flaticons' ) {
        $icon = $value['pretty_icon1'];
      } elseif( $value['type'] == 'fontawesome4' ) {
        $icon = $value['pretty_icon2'];
      } elseif( $value['type'] == 'typicons' ) {
        $icon = $value['pretty_icon3'];
      } else {
        $icon = '';
      }

      $data_type = $value['info_text'];
      if(filter_var($data_type, FILTER_VALIDATE_EMAIL)){
        $href_value = 'email';
      } elseif( preg_match('/^[0-9\-\(\)\/\+\s]*$/', $data_type ) ){
        $href_value = 'phone';
      } elseif (filter_var($data_type, FILTER_VALIDATE_URL)) {
        $href_value = 'url';
      } else {
        $href_value = '';
      }

      ?>

      <div class="media border-bottom contact-media">
        <span class="info-icon"><i class="<?php echo esc_attr( $icon ); ?>"></i></span>
        <div class="media-body">
          <h5 class="mt-0 mb-0"><?php echo esc_html($value['info_title']); ?></h5>
          <?php
          if (!empty($href_value == 'email')) { ?>
          <a href="mailto:<?php echo sanitize_email($value['info_text']); ?>"><?php echo esc_html($value['info_text']); ?></a>
          <?php } elseif (!empty($href_value == 'phone')) { ?>
            <a href="tel:<?php echo esc_attr($value['info_text']); ?>"><?php echo esc_html($value['info_text']); ?></a>
          <?php } elseif (!empty($href_value == 'url')) { ?>
            <a href="<?php echo esc_url($value['info_text']); ?>"><?php echo esc_html($value['info_text']); ?></a>
          <?php } else {
            echo esc_html($value['info_text']); 
          } ?>
        </div>
      </div>
    <?php } if (is_array($social_info)) { ?>
    <div class="contact-social-info">
      <?php foreach ($social_info as $key => $value) { 
        $icon = $value['social_icon'];
        $a = explode(' ',$icon);
        $b = explode('-',$icon);
      ?>
        <a href="<?php echo esc_url($value['social_link']); ?>"><i class="<?php echo esc_attr($value['social_icon']); ?>" aria-hidden="true"></i></a>
      <?php } ?>
    </div>
    <?php } ?>

  </div>

  <?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Slider
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_slider', 'dustrial_slider_shortcode' );
function dustrial_slider_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'slide_item'           => '',
      'slide_item2'          => '',
      'slider_bg_img'        => '',
      'banner_bg_img'        => '',
      'banner_title_line1'   => '',
      'banner_title_line2'   => '',
      'banner_desc'          => '',
      'banner_btn1'          => '',
      'banner_btn2'          => '',
      'enable_autoplay'      => 'true',
      'enable_speed'         => '10000',
      'enable_fade'          => 'true',
      'enable_pagination'    => 'true',
      'enable_navigation'    => 'true',
      'select_slider_style'  => '',
      'slider_opacity'       => '0.8',
      'slider_overlay_color' => '#061538',
      ), $atts )
  );
  ob_start();

  ?>

<script>
  jQuery(document).ready(function() {
    // mainSlider
    function mainSlider() {
        var BasicSlider = jQuery('.slider-activee');
        BasicSlider.on('init', function (e, slick) {
            var $firstAnimatingElements = jQuery('.single-slider:first-child').find('[data-animation]');
            doAnimations($firstAnimatingElements);
        });
        BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
            var $animatingElements = jQuery('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
            doAnimations($animatingElements);
        });
        BasicSlider.slick({
            autoplay: <?php echo esc_attr($enable_autoplay);?>,
            autoplaySpeed: <?php echo esc_attr($enable_speed);?>,
            dots: <?php echo esc_attr($enable_pagination);?>,
            fade: <?php echo esc_attr($enable_fade);?>,
            arrows: <?php echo esc_attr($enable_navigation);?>,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
            responsive: [
                { breakpoint: 767, settings: { dots: false, arrows: false } }
            ]
        });

        function doAnimations(elements) {
            var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
            elements.each(function () {
                var $this = jQuery(this);
                var $animationDelay = $this.data('delay');
                var $animationType = 'animated ' + $this.data('animation');
                $this.css({
                    'animation-delay': $animationDelay,
                    '-webkit-animation-delay': $animationDelay
                });
                $this.addClass($animationType).one(animationEndEvents, function () {
                    $this.removeClass($animationType);
                });
            });
        }
    }
    mainSlider();

  });
</script>


<style type="text/css">
  .bg-black-overlay:before{
    background: <?php echo esc_attr($slider_overlay_color);?>;
    opacity: <?php echo esc_attr($slider_opacity);?>;
  }
  .bg-black-overlay-two:before{
    background: <?php echo esc_attr($slider_overlay_color);?>;
    opacity: <?php echo esc_attr($slider_opacity);?>;
  }
  .bg-black-overlay-three:before{
    background: <?php echo esc_attr($slider_overlay_color);?>;
    opacity: <?php echo esc_attr($slider_opacity);?>;
  }
</style>

<?php 

if ($select_slider_style == '1') {

  $slider_items   = (array) vc_param_group_parse_atts( $slide_item );
  $get_each_lists = array();

  foreach ( $slider_items as $slider_item ) {
    $each_list = $slider_item;
    $each_list['slide_bg_img']        = isset( $slider_item['slide_bg_img'] ) ? $slider_item['slide_bg_img'] : '';
    $each_list['subtitle_part1']      = isset( $slider_item['subtitle_part1'] ) ? $slider_item['subtitle_part1'] : '';
    $each_list['subtitle_part2']      = isset( $slider_item['subtitle_part2'] ) ? $slider_item['subtitle_part2'] : '';
    $each_list['slide_title']         = isset( $slider_item['slide_title'] ) ? $slider_item['slide_title'] : '';
    $each_list['slide_desc']          = isset( $slider_item['slide_desc'] ) ? $slider_item['slide_desc'] : '';
    $each_list['slide_btn1']          = isset( $slider_item['slide_btn1'] ) ? $slider_item['slide_btn1'] : '';
    $each_list['slider_btone_text']   = isset( $slider_item['slider_btone_text'] ) ? $slider_item['slider_btone_text'] : '';
    $each_list['slide_btn2']          = isset( $slider_item['slide_btn2'] ) ? $slider_item['slide_btn2'] : '';
    $each_list['slider_bttwo_text']   = isset( $slider_item['slider_bttwo_text'] ) ? $slider_item['slider_bttwo_text'] : '';
    $each_list['slide_content_align'] = isset( $slider_item['slide_content_align'] ) ? $slider_item['slide_content_align'] : '';
    $get_each_lists[] = $each_list;
  }

  ?>
  <!-- h1 slider area -->
  <section class="slider-area-wrap">
    <div class="slider-activee">
      <?php
        foreach ( $get_each_lists as $each_list ) {
        $image_url = wp_get_attachment_url( $each_list['slide_bg_img'] );

        if (!empty($each_list['slide_btn1']) || !empty($each_list['slider_btone_text'] )) {
          $slide_btn_one_enable = '<a class="link btn btn-primary" href="'.esc_url($each_list['slide_btn1']).'" data-animation="fadeInUp" data-delay=".8s">'.esc_html($each_list['slider_btone_text']).'</a>';
        }else{
          $slide_btn_one_enable = '';
        }

        if (!empty($each_list['slide_btn2']) || !empty($each_list['slider_bttwo_text'] )) {
          $slide_btn_two_enable = '<a class="link btn btn-primary activeBorder" href="'.esc_url($each_list['slide_btn2']).'" data-animation="fadeInUp" data-delay="1s">'.esc_html($each_list['slider_bttwo_text']).'</a>';
        }else{
          $slide_btn_two_enable = '';
        }

        if (!empty($each_list['subtitle_part1'])) {
          $caption_title = '<h3 data-animation="fadeInUp" data-delay=".2s"><span class="activeColor">'.esc_html($each_list['subtitle_part1']).'</span> '.esc_html($each_list['subtitle_part2']).'</h3>';
        } else {
          $caption_title = '<h3 data-animation="fadeInUp" data-delay=".2s">'.esc_html($each_list['subtitle_part2']).'</h3>';
        }

      ?>

      <div class="single-slider bg-black-overlay d-flex align-items-center" style="background-image:url(<?php echo esc_url ( $image_url ); ?>)">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 col-12 <?php echo esc_attr($each_list['slide_content_align'])?>">
              <div class="slider-content">
                <?php echo wp_kses_stripslashes($caption_title);?>
                <h2 data-animation="fadeInUp" data-delay=".4s"><?php echo esc_html($each_list['slide_title']); ?></h2>
                <p data-animation="fadeInUp" data-delay=".6s"><?php echo wp_kses_stripslashes($each_list['slide_desc']); ?></p>
              </div>
              <div class="slider-buttons">
                <?php echo $slide_btn_one_enable;?>
                <?php echo $slide_btn_two_enable;?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php } ?>
    </div>
  </section>
  <!-- End h1 slider area -->

<?php } elseif ($select_slider_style == 2) {

  $slide_item2    = (array) vc_param_group_parse_atts( $slide_item2 );
  $get_each_lists = array();

  foreach ( $slide_item2 as $slider_item ) {
    $each_list = $slider_item;
    $each_list['subtitle_part1']      = isset( $slider_item['subtitle_part1'] ) ? $slider_item['subtitle_part1'] : '';
    $each_list['subtitle_part2']      = isset( $slider_item['subtitle_part2'] ) ? $slider_item['subtitle_part2'] : '';
    $each_list['slide_title']         = isset( $slider_item['slide_title'] ) ? $slider_item['slide_title'] : '';
    $each_list['slide_desc']          = isset( $slider_item['slide_desc'] ) ? $slider_item['slide_desc'] : '';
    $each_list['slide_btn1']          = isset( $slider_item['slide_btn1'] ) ? $slider_item['slide_btn1'] : '';
    $each_list['slider_btone_text']   = isset( $slider_item['slider_btone_text'] ) ? $slider_item['slider_btone_text'] : '';
    $each_list['slide_btn2']          = isset( $slider_item['slide_btn2'] ) ? $slider_item['slide_btn2'] : '';
    $each_list['slider_bttwo_text']   = isset( $slider_item['slider_bttwo_text'] ) ? $slider_item['slider_bttwo_text'] : '';
    $each_list['slide_content_align'] = isset( $slider_item['slide_content_align'] ) ? $slider_item['slide_content_align'] : '';
    $get_each_lists[] = $each_list;
  }
  $banner_bg = wp_get_attachment_url( $slider_bg_img );

  ?>
  <div class="slider-loader">
    <div class="spinner">
    </div>
  </div>

  <!-- h1 slider area -->
  <section class="slider-area-wrap slider-three-height" style="background-image:url(<?php echo esc_url ( $banner_bg ); ?>)">
    <div class="slider-activee">
      <?php
      foreach ( $get_each_lists as $each_list ) {
        if (!empty($each_list['slide_btn1']) || !empty($each_list['slider_btone_text'] )) {
          $slide_btn_one_enable = '<a class="link btn btn-primary" href="'.esc_url($each_list['slide_btn1']).'" data-animation="fadeInUp" data-delay=".8s">'.esc_html($each_list['slider_btone_text']).'</a>';
        }else{
          $slide_btn_one_enable = '';
        }

        if (!empty($each_list['slide_btn2']) || !empty($each_list['slider_bttwo_text'] )) {
          $slide_btn_two_enable = '<a class="link btn btn-primary activeBorder" href="'.esc_url($each_list['slide_btn2']).'" data-animation="fadeInUp" data-delay="1s">'.esc_html($each_list['slider_bttwo_text']).'</a>';
        }else{
          $slide_btn_two_enable = '';
        }

       ?>
        <div class="single-slider bg-black-overlay-three third-slider d-flex align-items-center">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-12 <?php echo esc_attr($each_list['slide_content_align'])?>">
                <div class="third-slider-content">
                  <h3 class="intro" data-animation="fadeInUp" data-delay=".2s"><?php echo esc_html($each_list['subtitle_part1']);?></h3>
                  <h2 class="title" data-animation="fadeInUp" data-delay=".4s"><?php echo esc_html($each_list['slide_title']);?></h2>
                  <p class="text" data-animation="fadeInUp" data-delay=".6s"><?php echo wp_kses_stripslashes($each_list['slide_desc']);?></p>
                </div>
                <div class="slider-buttons">
                  <?php echo $slide_btn_one_enable;?>
                  <?php echo $slide_btn_two_enable;?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </section>
  <!-- End h1 slider area -->

<?php } elseif ($select_slider_style == 3) {

  $banner_bg_img = get_vc_image( $banner_bg_img );
  $a1_link = $a1_title = $a1_target = $a2_link = $a2_title = $a2_target = '';


  if ($banner_btn1) {
    //Link construct 1 
    $url1 = $banner_btn1;
    $link1 = vc_build_link( $url1 );
    $link1 = ($link1=='||') ? '' : $link1;
    $a1_link = $link1['url'];
    $a1_title = ($link1['title'] == '') ? '' : $link1['title'];
    $a1_target = ($link1['target'] == '') ? '' : 'target="'.$link1['target'].'"';

  } if ($banner_btn2) {
    //Link construct 2
    $url2 = $banner_btn2;
    $link2 = vc_build_link( $url2 );
    $link2 = ($link2=='||') ? '' : $link2;
    $a2_link = $link2['url'];
    $a2_title = ($link2['title'] == '') ? '' : $link2['title'];
    $a2_target = ($link2['target'] == '') ? '' : 'target="'.$link2['target'].'"';
  }

  ?>


  <section class="slider-area-wrap">
    <div class="slider-activee second-slider-active">
      <div class="single-slider bg-black-overlay-two second-slider d-flex align-items-center" style="background-image:url(<?php echo esc_url( $banner_bg_img ); ?>)">
        <div class="container">
          <div class="row">
            <div class="col-xl-10">
              <div class="second-slider-content">
                <h3 class="intro" data-animation="fadeInUp" data-delay=".2s"><?php echo esc_html( $banner_title_line1 ); ?></h3>
                <h2 class="title" data-animation="fadeInUp" data-delay=".4s"><?php echo esc_html( $banner_title_line2 ); ?></h2>
                <p class="text" data-animation="fadeInUp" data-delay=".6s"><?php echo wp_kses_stripslashes($banner_desc); ?></p>
              </div>
              <?php if ( !empty( $a1_link ) || !empty ($a2_link ) ) { ?>
              <div class="slider-buttons">
                <?php if (!empty($a1_link)) { ?>
                <a class="link btn btn-primary" data-animation="fadeInUp" data-delay=".8s" href="<?php echo esc_url($a1_link); ?>" <?php echo wp_kses_stripslashes($a1_target); ?>><?php echo esc_html($a1_title); ?></a>
                <?php } if (!empty($a2_link)) { ?>
                <a class="link btn btn-primary activeBorder" data-animation="fadeInUp" data-delay="1s" href="<?php echo esc_url($a2_link); ?>" <?php echo wp_kses_stripslashes($a2_target); ?>><?php echo esc_html($a2_title); ?></a>
                <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php } else {

    $slider_items = (array) vc_param_group_parse_atts( $slide_item );
    $get_each_lists = array();

    foreach ( $slider_items as $slider_item ) {
      $each_list = $slider_item;
      $each_list['slide_bg_img']        = isset( $slider_item['slide_bg_img'] ) ? $slider_item['slide_bg_img'] : '';
      $each_list['subtitle_part1']      = isset( $slider_item['subtitle_part1'] ) ? $slider_item['subtitle_part1'] : '';
      $each_list['subtitle_part2']      = isset( $slider_item['subtitle_part2'] ) ? $slider_item['subtitle_part2'] : '';
      $each_list['slide_title']         = isset( $slider_item['slide_title'] ) ? $slider_item['slide_title'] : '';
      $each_list['slide_desc']          = isset( $slider_item['slide_desc'] ) ? $slider_item['slide_desc'] : '';
      $each_list['slide_btn1']          = isset( $slider_item['slide_btn1'] ) ? $slider_item['slide_btn1'] : '';
      $each_list['slider_btone_text']   = isset( $slider_item['slider_btone_text'] ) ? $slider_item['slider_btone_text'] : '';
      $each_list['slide_btn2']          = isset( $slider_item['slide_btn2'] ) ? $slider_item['slide_btn2'] : '';
      $each_list['slider_bttwo_text']   = isset( $slider_item['slider_bttwo_text'] ) ? $slider_item['slider_bttwo_text'] : '';
      $each_list['slide_content_align'] = isset( $slider_item['slide_content_align'] ) ? $slider_item['slide_content_align'] : '';
      $get_each_lists[] = $each_list;
    }

    ?>

    <!-- h1 slider area -->
    <section class="slider-area-wrap">
      <div class="slider-activee">
        <?php
          foreach ( $get_each_lists as $each_list ) {
          $image_url = wp_get_attachment_url( $each_list['slide_bg_img'] );

          if (!empty($each_list['slide_btn1']) || !empty($each_list['slider_btone_text'] )) {
            $slide_btn_one_enable = '<a class="link btn btn-primary" href="'.esc_url($each_list['slide_btn1']).'" data-animation="fadeInUp" data-delay=".8s">'.esc_html($each_list['slider_btone_text']).'</a>';
          } else {
            $slide_btn_one_enable = '';
          }

          if (!empty($each_list['slide_btn2']) || !empty($each_list['slider_bttwo_text'] )) {
            $slide_btn_two_enable = '<a class="link btn btn-primary activeBorder" href="'.esc_url($each_list['slide_btn2']).'" data-animation="fadeInUp" data-delay="1s">'.esc_html($each_list['slider_bttwo_text']).'</a>';
          } else {
            $slide_btn_two_enable = '';
          }

          if (!empty($each_list['subtitle_part1'])) {
            $caption_title = '<h3 data-animation="fadeInUp" data-delay=".2s"><span class="activeColor">'.esc_html($each_list['subtitle_part1']).'</span> '.esc_html($each_list['subtitle_part2']).'</h3>';
          } else {
            $caption_title = '<h3 data-animation="fadeInUp" data-delay=".2s">'.esc_html($each_list['subtitle_part2']).'</h3>';
          }

        ?>

        <div class="single-slider bg-black-overlay d-flex align-items-center" style="background-image:url(<?php echo esc_url ( $image_url ); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 col-12 <?php echo esc_attr($each_list['slide_content_align'])?>">
                <div class="slider-content">
                  <?php echo wp_kses_stripslashes($caption_title);?>
                  <h2 data-animation="fadeInUp" data-delay=".4s"><?php echo esc_html($each_list['slide_title']); ?></h2>
                  <p data-animation="fadeInUp" data-delay=".6s"><?php echo wp_kses_stripslashes($each_list['slide_desc']); ?></p>
                </div>
                <div class="slider-buttons">
                  <?php echo $slide_btn_one_enable;?>
                  <?php echo $slide_btn_two_enable;?>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php } ?>
      </div>
    </section>
    <!-- End h1 slider area -->
    <?php
}

  return ob_get_clean();

}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial h3 featured group
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_h3_featured', 'dustrial_h3featured_shortcode' );
function dustrial_h3featured_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'h3featured_item'     => '',
      'featured_group_column'     => '4',
      ), $atts )
  );
  ob_start();

  $h3featured_item = (array) vc_param_group_parse_atts( $h3featured_item );
  $get_h3featured_lists = array();

  foreach ( $h3featured_item as $h3featured_list_item ) {
    $each_list = $h3featured_list_item;
    $each_list['h3featured_img']    = isset( $h3featured_list_item['h3featured_img'] ) ? $h3featured_list_item['h3featured_img'] : '';
    $each_list['h3featured_title']  = isset( $h3featured_list_item['h3featured_title'] ) ? $h3featured_list_item['h3featured_title'] : '';
    $each_list['h3featured_desc']   = isset( $h3featured_list_item['h3featured_desc'] ) ? $h3featured_list_item['h3featured_desc'] : '';
    $each_list['h3featured_text']   = isset( $h3featured_list_item['h3featured_text'] ) ? $h3featured_list_item['h3featured_text'] : '';
    $each_list['h3featured_link']   = isset( $h3featured_list_item['h3featured_link'] ) ? $h3featured_list_item['h3featured_link'] : '';
    $each_list['h3featured_animation']   = isset( $h3featured_list_item['h3featured_animation'] ) ? $h3featured_list_item['h3featured_animation'] : '';
    $get_h3featured_lists[]  = $each_list;
  }

  ?>
    <div class="row">
      <?php
        foreach ( $get_h3featured_lists as $each_list ) {
        $image_url = wp_get_attachment_url( $each_list['h3featured_img'] );
        ?>
        <div class="col-lg-<?php echo esc_attr($featured_group_column);?> col-md-6 col-12">
          <div class="h3-single-featured wow <?php echo esc_attr($each_list['h3featured_animation']);?>">
            <div class="h3-single-featured-thumb">
              <img class="img-fluid" src="<?php echo esc_url ( $image_url ); ?>" alt="<?php echo esc_html($each_list['h3featured_title']);?>">
              <div class="h3-single-featured-overlay">
                <div class="h3-single-featured-details">
                  <h4 class="h3-single-featured-title"><?php echo esc_html($each_list['h3featured_title']);?></h4>
                  <p><?php echo esc_html($each_list['h3featured_desc']);?></p>
                  <?php if (!empty($each_list['h3featured_link'])) { ?>
                  <a href="<?php echo esc_url($each_list['h3featured_link']);?>" class="btn btn-primary"><?php echo esc_html($each_list['h3featured_text']);?></a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  <?php
  return ob_get_clean();

}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial h3 featured group
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_h3_featured_single', 'dustrial_h3featured_single_shortcode' );
function dustrial_h3featured_single_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'h3_single_featured_img'      => '',
      'h3_single_featured_title'    => '',
      'h3_single_featured_desc'     => '',
      'h3_single_featured_text'     => '',
      'h3_single_featured_link'     => '',
      ), $atts )
  );
  ob_start();

  $h3_single_item_img = get_vc_image( $h3_single_featured_img );

?>
  <div class="h3-single-featured">
    <div class="h3-single-featured-thumb">
      <img class="img-fluid" src="<?php echo esc_url ( $h3_single_item_img ); ?>" alt="Image">
      <div class="h3-single-featured-overlay">
        <div class="h3-single-featured-details">
          <?php if (!empty($h3_single_featured_title)) { ?>
            <h4 class="h3-single-featured-title"><?php echo esc_html($h3_single_featured_title); ?></h4>
          <?php } if (!empty($h3_single_featured_desc)) { ?>
            <p><?php echo esc_html($h3_single_featured_desc); ?></p>
          <?php } if (!empty($h3_single_featured_link)) { ?>
          <a href="<?php echo esc_url($h3_single_featured_link);?>" class="btn btn-primary"><?php echo esc_html($h3_single_featured_text); ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Gallery Item Shortcode
/*------------------------------------------------------------------------------------------------------------------*/
add_shortcode( 'dustrial_gallery', 'dustrial_gallery_shortcode' );
function dustrial_gallery_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'galleries_image'   => '',
      'animation'         => '',
      'grid_columns'      => '4',
      'no_gutters'        => '',
      'padding_around'    => '',
      'gallery_variation' => '',
      'custom_class'      => '',
      ), $atts )
  );
  ob_start();

  $gallery_images = explode( ',', $galleries_image );

  if (empty($no_gutters)) {
    $bottom_margin = 'mb-30';
    $gutters = '';
  } else {
    $bottom_margin = '';
    $gutters = 'no-gutters';
  }

  if ($gutters == 'no-gutters') {
    $margin_bottom = 'mb-0';
  } else {
    $margin_bottom = 'mb-30';    
  }

  if ($no_gutters == 'true') {
    $padding_around = $padding_around;
  } else {
    $padding_around = ' ';
  }
  if ( $gallery_variation == 1 ) {
?>

<div class="image-gallery">
  <div class="row <?php echo esc_attr( $gutters ); ?>">
    <?php foreach ($gallery_images as $key => $value) { 
      $image_id = $value;
      $attachment = wp_get_attachment_image_src( $image_id, 'full' );
      $image = $attachment['0'];
    ?>
    <div class="col-xl-<?php echo esc_attr( $grid_columns.' '.$padding_around ); ?> col-md-6">    
      <div class="dustrial-gallery-item wow <?php echo esc_attr( $animation.' '.$margin_bottom ); ?>">
          <img src="<?php echo esc_url( $image ); ?>" alt="Images" />
          <div class="overlay"></div>  
          <div class="search ">
            <a class="sb" href="<?php echo esc_url( $image ); ?>">
              <i class="fa fa-crosshairs"></i>
            </a>          
          </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div><!-- /.image-gallery -->
<?php } elseif ( $gallery_variation == 2 ) { ?>
<div class="gallery-style2">
  <ul class="docs-pictures clearfix row <?php echo esc_attr( $gutters ); ?>">
    <?php foreach ($gallery_images as $key => $value) { 
      $image_id = $value;
      $attachment = wp_get_attachment_image_src( $image_id, 'full' );
      $image = $attachment['0'];
    ?>
    <li class="col-xl-<?php echo esc_attr( $grid_columns.' wow '.$animation.' '.$padding_around.' '.$margin_bottom ); ?> col-md-6"><img data-original="<?php echo esc_url( $image ); ?>" src="<?php echo esc_url( $image ); ?>" alt="Cuo Na Lake"></li>
    <?php } ?>
  </ul>
</div>
<?php } else { ?>
<div class="image-gallery">
  <div class="row <?php echo esc_attr( $gutters ); ?>">
    <?php foreach ($gallery_images as $key => $value) { 
      $image_id = $value;
      $attachment = wp_get_attachment_image_src( $image_id, 'full' );
      $image = $attachment['0'];
    ?>
    <div class="col-xl-<?php echo esc_attr( $grid_columns.' '.$padding_around ); ?> col-md-6">    
      <div class="dustrial-gallery-item wow <?php echo esc_attr( $animation.' '.$margin_bottom ); ?>">
          <img src="<?php echo esc_url( $image ); ?>" alt="Images" />
          <div class="overlay"></div>  
          <div class="search ">
            <a class="sb" href="<?php echo esc_url( $image ); ?>">
              <i class="fa fa-crosshairs"></i>
            </a>          
          </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div><!-- /.image-gallery -->
<?php }
  return ob_get_clean();
}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Gallery Section
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'dustrial_gallery_posts', 'dustrial_gallery_posts_shortcode' );
function dustrial_gallery_posts_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'no_filter'                  => '',
      'posts_per_page'             => '6',
      'content_expcerpt'           => '',
      'posts_cat_id'               => '',
      'select_post_column'         => '',
      'no_gutters'                 => '',
      'padding_around'             => '',
      'select_layout_style'        => '',
      'select_filter_button_style' => '',
      'gallery_opacity'            => '',
      'gallery_overlay_color'      => '',
      ), $atts )
  );
  ob_start();


  if (empty($no_gutters)) {
    $bottom_margin = 'mb-30';
    $gutters = '';
  } else {
    $bottom_margin = '';
    $gutters = 'no-gutters';
  }

  if ($gutters == 'no-gutters') {
    $margin_bottom = 'mb-0';
  } else {
    $margin_bottom = 'mb-30';    
  }

  if (!empty($select_post_column)) {
    $cl = $select_post_column;
  } else {
    $cl = '4';
  }

  if ($select_post_column == '6') {
    $crop_img = 'dustrial-570';
  } elseif ($select_post_column == '12') {
    $crop_img = 'full';
  } else {
    $crop_img = 'dustrial-362';
  }

  if (!empty($posts_cat_id)) {
    $smallcase = strtolower($posts_cat_id);
    $string = str_replace(" ", "-", $smallcase);
    $str_arr = explode (",", $string);  

    $exclude_slugs      = $str_arr;                               
    $include_ids        = array();

    foreach( $exclude_slugs as $slug ) { 
      $mfm_term = get_term_by( 'slug', $slug, 'our_gallery_tax' );
      if( is_object( $mfm_term ) ) {
        $include_ids[] = $mfm_term->term_id;
      }
    }
  } else {
    $include_ids[] = '';
  }

  $e_uniqid     = uniqid();
  $inline_style = '';

  // Title Color
  if ( $gallery_overlay_color ) {
    $inline_style .= '.gallery-overlay'. $e_uniqid .'{';
    $inline_style .= ( $gallery_overlay_color ) ? 'background-color:'. $gallery_overlay_color  .' !important;' : '';
    $inline_style .= '}';
  } 
  if ( $gallery_opacity ) {
    $inline_style .= '.dustrial-gallery-item:hover .gallery-overlay'. $e_uniqid .'{';
    $inline_style .= ( $gallery_opacity ) ? 'opacity:'. $gallery_opacity  .' !important;' : '';
    $inline_style .= '}';
  }

  add_inline_style( $inline_style );
  $styled_class  = 'gallery-overlay'. $e_uniqid;
?>

<script>
  jQuery(window).on('load', function () {

    jQuery('.gallery-area').imagesLoaded( function() {
      // gallery - active
      var $grid = jQuery('.gallery-active-<?php echo esc_attr($e_uniqid); ?>').isotope({
          itemSelector: '.grid-item',
          layoutMode: 'fitRows',
          percentPosition: true,
          masonry: {
              // use outer width of grid-sizer for columnWidth
              columnWidth: 1
          }
      })
      // filter items on button click
      jQuery('.gallery-menu-<?php echo esc_attr($e_uniqid); ?>').on('click', 'button', function () {
          var filterValue = jQuery(this).attr('data-filter');
          $grid.isotope({ filter: filterValue });
      });
      //for menu active class
      jQuery('.gallery-menu-<?php echo esc_attr($e_uniqid); ?> button').on('click', function (event) {
          jQuery(this).siblings('.active').removeClass('active');
          jQuery(this).addClass('active');
          event.preventDefault();
      });
    });

  });
</script>  

<div class="our-latest-project gallery-area">
  <?php 
    if (empty($no_filter)) {

      $grid_item = 'grid-item';
      $filter_class = 'gallery-active-'.$e_uniqid;

      $filters = get_terms( array(
        'taxonomy' => 'our_gallery_tax',
        'include' => $include_ids,
        'hide_empty'  => false, 
        'orderby'  => 'include',
      ) );
      if (!empty($filters)) {

        if ( $select_filter_button_style == '1' ) { ?>
          <!-- Letest Project Btn -->
          <div class="mixitup-menus gallery-menu-<?php echo esc_attr($e_uniqid); ?>">
            <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
            <?php if ( $filters && ! is_wp_error( $filters ) ) {
              foreach ($filters as $filter) {
                echo "<button class=\"btn\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
              }
            }
            ?>
          </div><!-- End Project Btn -->

        <?php } elseif ($select_filter_button_style == '2') { ?>
          <!-- Letest Project Btn -->
          <div class="inner-mixitup-menus gallery-menu-<?php echo esc_attr($e_uniqid); ?> text-center">
            <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
            <?php if ( $filters && ! is_wp_error( $filters ) ) {
              foreach ($filters as $filter) {
                echo "<button class=\"btn mb-2 mb-md-0\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
              }
            }
            ?>
          </div><!-- End Project Btn -->

        <?php } else { ?>
            <!-- Letest Project Btn -->
            <div class="inner-mixitup-menus gallery-menu-<?php echo esc_attr($e_uniqid); ?> text-center">
              <button class="btn active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
              <?php if ( $filters && ! is_wp_error( $filters ) ) {
                foreach ($filters as $filter) {
                  echo "<button class=\"btn mb-2 mb-md-0\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
                }
              }
              ?>
            </div><!-- End Project Btn -->
          <?php 
        }
      } 
  }else{
      $grid_item = '';
      $filter_class = '';
  }

 if ($select_layout_style == 1 ) {
?>
  <div class="image-gallery">
    <div class="row <?php echo esc_attr( $filter_class.' '.$gutters ); ?>">
      <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ; 
          
        if (!empty($posts_cat_id)) {
          $args = array(
            'post_type'      => 'our_gallery',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => 'date',
            'tax_query' => array(
              array(
                'taxonomy' => 'our_gallery_tax',
                'field' => 'id',
                'terms' => $include_ids
              )
            ),
          );
        } else {
          $args = array(
            'post_type'      => 'our_gallery',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => 'date',
            'taxonomy' => 'our_gallery_tax',
          );
        }

        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) :
          $the_query->the_post();
          $thumb_url = get_the_post_thumbnail_url();

          $title = get_the_title();
          $content = get_the_content();

          $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
            if ( $terms && ! is_wp_error( $terms ) ) : 
              $draught_links = array();
              foreach ( $terms as $term ) {
                $draught_links[] = $term->slug;
                $term_link = get_term_link( $term );
              }        
          $cat_slug = join( " ", $draught_links );

      ?>

      <div class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">    
        <div class="dustrial-gallery-item">
          <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php esc_attr_e( 'Images', 'dustrial' ); ?>">
          <div class="overlay <?php echo esc_attr( $styled_class ); ?>"></div>  
          <div class="search">
            <a class="sb" href="<?php echo esc_url( $thumb_url ); ?>">
              <i class="fa fa-crosshairs"></i>
            </a>          
          </div>
        </div>
        <?php if (!empty($gallery_content_switch)) { ?>
        <div class="gallery-content">
          <?php if (!empty($title)) { ?>
          <h3><a><?php the_title(); ?></a></h3>
          <?php } if (!empty($content)) { ?>
          <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
      <?php endif; endwhile; wp_reset_postdata(); ?>
    </div><!-- End project content -->
  </div>
<?php } elseif ($select_layout_style == 2 ) { ?>
  <ul id="images-gallery" class="docs-pictures clearfix row <?php echo esc_attr( $filter_class.' '.$gutters ); ?>">
      <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ;

        if (!empty($posts_cat_id)) {
          $args = array(
            'post_type'      => 'our_gallery',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => 'date',
            'tax_query' => array(
              array(
                'taxonomy' => 'our_gallery_tax',
                'field' => 'id',
                'terms' => $include_ids
              )
            ),
          );
        } else {
          $args = array(
            'post_type'      => 'our_gallery',
            'post_status'    => 'publish',
            'posts_per_page' => $posts_per_page,
            'orderby'        => 'date',
            'taxonomy' => 'our_gallery_tax',
          );
        }

        $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) :
          $the_query->the_post(); 
          $thumb_url = get_the_post_thumbnail_url();

          $title = get_the_title();
          $content = get_the_content();

          $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
            if ( $terms && ! is_wp_error( $terms ) ) : 
              $draught_links = array();
              foreach ( $terms as $term ) {
                $draught_links[] = $term->slug;
                $term_link = get_term_link( $term );
              }        
          $cat_slug = join( " ", $draught_links );

      ?>
      <li class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">
        <img data-original="<?php echo esc_url( $thumb_url ); ?>" src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title(); ?>">
        <?php if (!empty($gallery_content_switch)) { ?>
        <div class="gallery-content text-center">
          <?php if (!empty($title)) { ?>
          <h3><a><?php the_title(); ?></a></h3>
          <?php } if (!empty($content)) { ?>
          <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
          <?php } ?>
        </div>
        <?php } ?>
      </li>
      <?php endif; endwhile; wp_reset_postdata(); ?>
  </ul>
<?php } else { ?>
  <div id="images-gallery" class="image-gallery">
    <div class="row <?php echo esc_attr( $filter_class.' '.$gutters ); ?>">
      <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ; 

        if (!empty($posts_cat_id)) {
        $args = array(
          'post_type'      => 'our_gallery',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
          'orderby'        => 'date',
          'tax_query' => array(
            array(
              'taxonomy' => 'our_gallery_tax',
              'field' => 'id',
              'terms' => $include_ids
            )
          ),
        );
      } else {
        $args = array(
          'post_type'      => 'our_gallery',
          'post_status'    => 'publish',
          'posts_per_page' => $posts_per_page,
          'orderby'        => 'date',
          'taxonomy' => 'our_gallery_tax',
        );
      }

      $the_query = new WP_Query( $args );

        while ( $the_query->have_posts() ) :
          $the_query->the_post();
          $thumb_url = get_the_post_thumbnail_url();

          $title = get_the_title();
          $content = get_the_content();

          $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
            if ( $terms && ! is_wp_error( $terms ) ) : 
              $draught_links = array();
              foreach ( $terms as $term ) {
                $draught_links[] = $term->slug;
                $term_link = get_term_link( $term );
              }        
          $cat_slug = join( " ", $draught_links );

      ?>

      <div class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">    
        <div class="dustrial-gallery-item">
          <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php esc_attr_e( 'Images', 'dustrial' ); ?>">
          <div class="overlay <?php echo esc_attr( $styled_class ); ?>"></div>  
          <div class="search">
            <a class="sb" href="<?php echo esc_url( $thumb_url ); ?>">
              <i class="fa fa-crosshairs"></i>
            </a>          
          </div>
        </div>
        <?php if (!empty($gallery_content_switch)) { ?>
        <div class="gallery-content">
          <?php if (!empty($title)) { ?>
          <h3><a><?php the_title(); ?></a></h3>
          <?php } if (!empty($content)) { ?>
          <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
          <?php } ?>
        </div>
        <?php } ?>
      </div>

      <?php endif; endwhile; wp_reset_postdata(); ?>
    </div><!-- End project content -->
  </div>
<?php } ?>
</div>

<?php
  return ob_get_clean();
}

/*------------------------------------------------------------------------------------------------------------------*/
/*  Pricing Item Shortcode
/*------------------------------------------------------------------------------------------------------------------*/
add_shortcode( 'dustrial_pricing_table', 'dustrial_pricing_table_shortcode' );
function dustrial_pricing_table_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'select_price_style'    => '',
      'pricing_title'         => '',
      'pricing_currency'      => '',
      'pricing_price'         => '',
      'pricing_time'          => '',
      'table_list'            => '',
      'inactive_priceitem'    => '',
      'pricing_btn_text'      => '',
      'pricing_btn_link'      => '',
      'custom_class'          => '',
      'title_color'           => '',
      'pricing_color'         => '',
      'pricing_radius'        => '5px',
      'active_bg_color'       => '',
      ), $atts )
  );
  ob_start();

  if (!empty($atts['table_list'])) {
    $table_list = vc_param_group_parse_atts($atts['table_list']);
  } else {
    $table_list = '';
  }

  $e_uniqid     = uniqid();
  $inline_style = '';

  // Title Color
  if ( $title_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .card-title {';
    $inline_style .= ( $title_color ) ? 'color:'. $title_color  .' !important;' : '';
    $inline_style .= '}';
  } 
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .card-price {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  } 
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .title {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  } 
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .currency {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  }
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .price {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  }
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' .period {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  }
  if ( $pricing_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' li.pricing-items {';
    $inline_style .= ( $pricing_color ) ? 'color:'. $pricing_color  .' !important;' : '';
    $inline_style .= '}';
  }
  if ( $pricing_radius || $active_bg_color ) {
    $inline_style .= '.pricing-style'. $e_uniqid .' {';
    $inline_style .= ( $pricing_radius ) ? 'border-radius:'. $pricing_radius  .' !important;' : '';
    $inline_style .= ( $active_bg_color ) ? 'background-color:'. $active_bg_color  .' !important;' : '';
    $inline_style .= '}';
  }
  add_inline_style( $inline_style );
  $styled_class  = 'pricing-style'. $e_uniqid;

  if($select_price_style == 1){
?>
<div class="pricing">
  <div class="card mb-30 <?php echo esc_attr( $styled_class ); ?>">
    <div class="card-body">
      <h5 class="card-title text-muted text-uppercase text-center"><?php echo esc_html( $pricing_title ); ?></h5>
      <h6 class="card-price text-center"><?php echo esc_html( $pricing_price ); ?><span class="period"><?php echo esc_html( $pricing_time ); ?></span></h6>
      <hr>
      <ul class="fa-ul">
        <?php 
        if (is_array($table_list)) {
        foreach ($table_list as $key => $value) {
          if (!empty($value['list_text'])) {
            $text = $value['list_text'];
          } else {
            $text = '';
          }
          if (!empty($value['type'])) {
            if ( $value['type'] == 'flaticons' ) {
              $icon = $value['pricing_icon1'];
            } elseif( $value['type'] == 'fontawesome4' ) {
              $icon = $value['pricing_icon2'];
            } elseif( $value['type'] == 'typicons' ) {
              $icon = $value['pricing_icon3'];
            } else {
              $icon = '';
            }
          }
          if (!empty($value['list_variation'])) {
            if ( $value['list_variation'] == 2 ) {
              $icon = '<i class="'.$icon.'"></i>';
            } else {
              $icon = '';
            }
          } else {
            $icon = '';
          }

          if (!empty($value['inactive_item'])) {
            $inactive_item = $value['inactive_item'];
          } else {
            $inactive_item = '';
          }

          if ($inactive_item == 'yes') {
            $class = 'text-muted';
          } else {
            $class = 'text-active';            
          }

        ?>
        <li class="<?php echo esc_attr($class); ?>"><span class="fa-li"><?php echo wp_kses_stripslashes( $icon ); ?></span><?php echo esc_html( $text ); ?></li>
        <?php } } ?>
      </ul> 
      <?php if (!empty($pricing_btn_link)) { ?>
      <div class="price-btn text-center">
        <a href="<?php echo esc_url($pricing_btn_link); ?>" class="btn btn-block btn-primary text-uppercase"><?php echo esc_html($pricing_btn_text); ?></a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php } elseif( $select_price_style == 2 ){


  if ($inactive_priceitem == 'yes') {
    $actclass = 'activate-pricing';
  } else {
    $actclass = '';            
  }

  ?>

<div class="pricing-style-two <?php echo esc_attr( $actclass ); ?>">
  <div class="pricing-style-two-items <?php echo esc_attr( $styled_class ); ?>">
      <div class="pricing-style-two-header">
        <h5 class="title"><?php echo esc_html( $pricing_title ); ?></h5>
        <div class="price-wrap">
          <div class="currency"><?php echo esc_html( $pricing_currency ); ?></div>
          <div class="price"><?php echo esc_html( $pricing_price ); ?></div>
          <div class="period"><?php echo esc_html( $pricing_time ); ?></div>
        </div>
      </div>
      <div class="pricing-style-two-content">
        <ul class="pricing-style-two-content-list">
          <?php 
            if (is_array($table_list)) {
            foreach ($table_list as $key => $value) {
              if (!empty($value['list_text'])) {
                $text = $value['list_text'];
              } else {
                $text = '';
              }
          ?>
          <li class="pricing-items"><?php echo esc_html( $text ); ?></li>
          <?php } } ?>
        </ul>
      </div>
      <div class="pricing-style-two-footer">
        <?php if (!empty($pricing_btn_link)) { ?>
          <div class="price-btn text-center">
            <a href="<?php echo esc_url($pricing_btn_link); ?>" class="btn btn-block btn-primary text-uppercase"><?php echo esc_html($pricing_btn_text); ?></a>
          </div>
        <?php } ?>
    </div>
  </div>
</div>

<?php } else {?>

<div class="pricing">
  <div class="card mb-30 <?php echo esc_attr( $styled_class ); ?>">
    <div class="card-body">
      <h5 class="card-title text-muted text-uppercase text-center"><?php echo esc_html( $pricing_title ); ?></h5>
      <h6 class="card-price text-center"><?php echo esc_html( $pricing_price ); ?><span class="period"><?php echo esc_html( $pricing_time ); ?></span></h6>
      <hr>
      <ul class="fa-ul">
        <?php 
        if (is_array($table_list)) {
        foreach ($table_list as $key => $value) {
          if (!empty($value['list_text'])) {
            $text = $value['list_text'];
          } else {
            $text = '';
          }
          if (!empty($value['type'])) {
            if ( $value['type'] == 'flaticons' ) {
              $icon = $value['pricing_icon1'];
            } elseif( $value['type'] == 'fontawesome4' ) {
              $icon = $value['pricing_icon2'];
            } elseif( $value['type'] == 'typicons' ) {
              $icon = $value['pricing_icon3'];
            } else {
              $icon = '';
            }
          }
          if (!empty($value['list_variation'])) {
            if ( $value['list_variation'] == 2 ) {
              $icon = '<i class="'.$icon.'"></i>';
            } else {
              $icon = '';
            }
          } else {
            $icon = '';
          }

          if (!empty($value['inactive_item'])) {
            $inactive_item = $value['inactive_item'];
          } else {
            $inactive_item = '';
          }

          if ($inactive_item == 'yes') {
            $class = 'text-muted';
          } else {
            $class = 'text-active';            
          }

        ?>
        <li class="<?php echo esc_attr($class); ?>"><span class="fa-li"><?php echo wp_kses_stripslashes( $icon ); ?></span><?php echo esc_html( $text ); ?></li>
        <?php } } ?>
      </ul> 
      <?php if (!empty($pricing_btn_link)) { ?>
      <div class="price-btn text-center">
        <a href="<?php echo esc_url($pricing_btn_link); ?>" class="btn btn-block btn-primary text-uppercase"><?php echo esc_html($pricing_btn_text); ?></a>
      </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php } ?>
<?php
  return ob_get_clean();
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Dustrial Breadcrumb
/*------------------------------------------------------------------------------------------------------------------*/

add_shortcode( 'breadcrumb_shortcode', 'breadcrumb_shortcode_shortcode' );
function breadcrumb_shortcode_shortcode($atts, $content = null) {
  extract( shortcode_atts(
    array(
      'breadcrumb_bd_img'     => '',
      'breadcrumb_title'      => '',
      ), $atts )
  );
  ob_start();


  $breadcrumb_bd_img   = get_vc_image( $breadcrumb_bd_img );

  if ( has_header_image() ) {
    $bg_img = get_header_image();
    $header_v = 'header1';
    $dustrial_breadcrumb_meta_switch = '1';
  } elseif(function_exists( 'dustrial_framework_init' ) ) {
    $bg_img_id = dustrial_get_option('breatcrumb_bg_img');
    $attachment = wp_get_attachment_image_src( $bg_img_id, 'full' );
    $bg_img    = ($attachment) ? $attachment[0] : $bg_img_id;

    $dustrial_breadcrumb_meta_switch = dustrial_get_option('dustrial_breadcrumb_meta_switch');
    // Header Variation
    $default_header_style = dustrial_get_option('default_header_style');

    if($default_header_style == 'style1') {
        $header_v = 'header1';
    } elseif ($default_header_style == 'style2')  {
        $header_v = 'header2';
    } elseif ($default_header_style == 'style3')  {
        $header_v = 'header3';
    } else {
        $header_v = 'header1';
    }
  } else {
    $header_v = 'header1';
    $bg_img = DUSTRIAL_IMG . 'breadcumb-bg.jpg';
    $dustrial_breadcrumb_meta_switch = '1';
  }

  if (!empty($breadcrumb_bd_img)) {
    $bg_img = $breadcrumb_bd_img;
  } else {
    $bg_img = $bg_img;
  }
?>

  <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <?php if ($breadcrumb_title) { ?>
              <h5 class="page_tittle activebreadcrumbColor"><?php echo esc_html($breadcrumb_title); ?></h5>
            <?php } else { ?>
              <h5 class="page_tittle activebreadcrumbColor"><?php the_title(); ?></h5>
            <?php } if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
              <!-- Breadcrumb -->
              <div class="bread_crumb">
                  <span class="activeColor"><?php dustrial_meta_breadcrumbs(); ?></span>
              </div>
              <!-- End Breadcrumb -->
            <?php } ?>
          </div>
        </div>
      </div>
  </div>
  <!-- breadcumb-area-end -->

  <?php
  return ob_get_clean();
}