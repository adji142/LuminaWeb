<?php if(function_exists( 'dustrial_framework_init' ) ) {
    $top_header = dustrial_get_option('top_header');

    $header_social_btn_target_blank = dustrial_get_option('header_social_btn_target_blank');

    if  ( $header_social_btn_target_blank == 1 ) {
      $target = '_blank';
    } else {
      $target = '_self';
    }

    if (!empty($top_header)) {

    $header_phone_title   = dustrial_get_option('header_phone_title');
    $header_phone         = dustrial_get_option('header_phone');
    $phone_icon           = dustrial_get_option('phone_icon');
    $header_addtess_title = dustrial_get_option('header_addtess_title');
    $header_address       = dustrial_get_option('header_address');
    $address_icon         = dustrial_get_option('address_icon');
    $header_mail_title    = dustrial_get_option('header_mail_title');
    $header_mail_no       = dustrial_get_option('header_mail_no');
    $mail_icon            = dustrial_get_option('mail_icon');
    $header_social_btn    = dustrial_get_option('header_social_btn'); 


    if(!empty($header_social_btn) ){
        $headcols = '9';
    } else {
        $headcols = '12';
    }

  ?>
    <!-- H1 header top -->
    <header class="h1-header-top-area d-none d-sm-block">
      <div class="container">
        <div class="row">

          <div class="col-xl-<?php echo esc_attr($headcols);?> col-lg-12 text-center text-xl-left h1-header-info-area">
            <?php if (!empty($header_phone)) { ?>
              <div class="h1-single-top-block text-center">
                <i class="<?php echo esc_attr( $phone_icon ); ?>" aria-hidden="true"></i>
                <strong><?php echo esc_html( $header_phone_title ); ?></strong>
                <a href="tel:<?php echo esc_attr( $header_phone ); ?>" target="_top"><?php echo esc_html( $header_phone ); ?> </a>
              </div>
            <?php } if (!empty($header_address)) { ?>
              <div class="h1-single-top-block text-center">
                <i class="<?php echo esc_attr( $address_icon ); ?>" aria-hidden="true"></i>
                <strong><?php echo esc_html( $header_addtess_title ); ?></strong>
                <span> <?php echo esc_html( $header_address ); ?></span>
              </div>
            <?php } if (!empty($header_mail_no)) { ?>
              <div class="h1-single-top-block text-center">
                <i class="<?php echo esc_attr( $mail_icon ); ?>" aria-hidden="true"></i>
                <strong><?php echo esc_html( $header_mail_title ); ?></strong>
                <a href="mailto:<?php echo esc_attr( $header_mail_no ); ?>" target="_top"> <?php echo esc_html( $header_mail_no ); ?></a>
              </div>
            <?php } ?>
          </div>

          <?php if (is_array($header_social_btn)) { ?>
            <div class="col-xl-3 col-lg-12 text-center text-xl-right">
              <div class="h1-social-media">
                <ul>
                  <?php foreach ($header_social_btn as $key => $value) { ?>
                    <li><a href="<?php echo esc_url( $value['social_link'] ); ?>" target="<?php echo esc_attr( $target ); ?>"><i class="<?php echo esc_attr( $value['social_icon'] ); ?>"></i></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </header>
    <!-- End H1 header top -->
  <?php }
} 

if ( display_header_text() == true ) {
  $auto_class = ' have-site-desc';
} else {
  $auto_class = ' none-site-desc';
} 

?>
  <!-- H1 Navigation -->
  <div class="h1-navigation-area <?php echo esc_attr( $auto_class ); ?>">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-3 col-sm-6">
          <div class="logo">
            <?php
              $custom_logo_id = get_theme_mod( 'custom_logo' );
              $logo           = wp_get_attachment_image_src( $custom_logo_id , 'full' );
              if ( has_custom_logo() ) {
                echo '<a href="'.esc_url(home_url('/')).'" class="brand-logo"><img src="'. esc_url( $logo[0] ) .'" alt="'.esc_attr__( 'Dustrial logo', 'dustrial' ).'"></a>';
              } elseif(function_exists( 'dustrial_framework_init' ) ) {
                $site_logo_id = dustrial_get_option('dustrial_logo_img');
                $attachment   = wp_get_attachment_image_src( $site_logo_id, 'full' );
                $site_logo    = ($attachment) ? $attachment[0] : $site_logo_id;
                echo'<a href="'.esc_url(home_url('/')).'" class="navbar-brand brand-logo"><img alt="'.esc_attr__( 'Dustrial logo', 'dustrial' ).'" src="'.esc_url( $site_logo ).'"></a>';
              } else {
                echo '<div class="default-logo"><a href="'.esc_url(home_url('/')).'" class="navbar-brand brand-logo">'. get_bloginfo( 'name' ) .'</a></div>';
              }
            ?>
          </div>
          <?php 
            if ( display_header_text() == true ) {
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <div class="site-description"><?php echo esc_attr( $description ); ?></div>
              <?php endif; 
            }
          ?>
        </div>
        <div class="col-lg-9 d-none d-lg-block">
          <div class="main-menu-area">
            <div class="main-menu">
              <div id="mobile-menu">
                  <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'container'       => false,
                        'menu_class'      => '',
                        'echo'            => true,
                        'depth'             => 3,
                        'items_wrap'      => '<ul class="dustrial-main-menu">%3$s</ul>',
                        'walker' => new Dustrial_navwalker()
                    ));
                  } else {
                    echo '<ul id="menu" class="nav navbar-nav navbar-right nav-sideb fallbackcd-menu-item"><li><a class="fallbackcd" href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Add a menu', 'dustrial' ) . '</a></li></ul>';
                  } ?>
              </div>
            </div>

          <?php if(function_exists( 'dustrial_framework_init' ) ) {

            $menu_cart_switch       = dustrial_get_option ('menu_cart_switch');
            $menu_search_btn        = dustrial_get_option ('menu_search_btn');
            $menu_search_title      = dustrial_get_option ('menu_search_title');
            $menu_search_btn_txt    = dustrial_get_option ('menu_search_btn_txt');
            $menu_right_btn         = dustrial_get_option ('menu_right_btn');
            $menu_right_btn_text    = dustrial_get_option ('menu_right_btn_text');
            $menu_right_btn_link    = dustrial_get_option ('menu_right_btn_link');

            if ( !empty($menu_search_btn)) {
              $search_btn = 'search-btn';
            } else {
              $search_btn = '';
            }
            if ( !empty($menu_cart_switch)) {
              $cart_btn = 'cart-btn';
            } else {
              $cart_btn = '';
            }
            if ( !empty($menu_right_btn)) {
              $quote_btn = 'quote-btn';
              $ext_class = '';
            } else {
              $quote_btn = '';
              $ext_class = 'quote-btn-none';
            }

            $all_btn  = $search_btn . ' ' . $cart_btn . ' ' . $quote_btn;
            

            if ( !empty($menu_cart_switch) || !empty($menu_search_btn) || !empty($menu_right_btn)) { ?>
              <div class="nav-serch-area <?php echo esc_attr( $ext_class );?>">
                <div id="inline-popups" class="form-inline <?php echo esc_attr( $all_btn ); ?> my-2 my-lg-0">

                  <?php 
                  if ( !empty($menu_cart_switch) ) {
                    if (function_exists( 'is_woocommerce' )) { ?>
                      <?php echo do_shortcode(dustrialWooCart() );?>
                  <?php } 
                  } if ( !empty($menu_search_btn) ) { ?>
                    <a class="header-search" href="#test-popup" data-effect="mfp-zoom-in">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </a>
                  <?php }

                  if ( !empty($menu_right_btn) ) { ?>
                    <a href="<?php echo esc_url( $menu_right_btn_link ); ?>" class="get_quote btn text-light my-2 my-sm-0"><?php echo esc_html( $menu_right_btn_text ); ?></a>
                  <?php } ?>
                  <div id="test-popup" class="white-popup mfp-with-anim mfp-hide">
                    <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                      <div class="form-group">
                        <label for="Search"><?php echo esc_html( $menu_search_title ); ?></label>
                        <input type="text" class="form-control" name="s" id="Search" placeholder="<?php esc_attr_e( 'Enter Search Key', 'dustrial' ); ?>">
                      </div>
                      <button type="submit" class="btn btn-primary"><?php echo esc_html( $menu_search_btn_txt ); ?></button>
                    </form>
                  </div>
                </div>
              </div>
            <?php }
          } ?>
          </div>
        </div>
        <div class="col-12">
          <div class="mobile-menu"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Navigation -->

  <?php 
  if(function_exists( 'dustrial_framework_init' ) ) {
    $dustrial_strick_menu_enable = dustrial_get_option('dustrial_strick_menu_enable');
    if ( $dustrial_strick_menu_enable == 1 ) {?>
      <div id="menufix"></div>
  <?php } } ?>