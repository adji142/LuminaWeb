<?php
function dustrial_custom_styles(){

  if(function_exists( 'dustrial_framework_init' ) ) {

    $body_typo_data = dustrial_get_option('dustrial_body_font');
    $body_font = $body_typo_data['family'];

    $dustrial_base_color = dustrial_get_option('dustrial_base_color');

    $dustrial_btn_bg_color = dustrial_get_option('dustrial_btn_bg_color');
    $dustrial_btn_text_color = dustrial_get_option('dustrial_btn_text_color');
    $dustrial_btn_bg_hover_color = dustrial_get_option('dustrial_btn_bg_hover_color');
    $dustrial_btn_hover_text_color = dustrial_get_option('dustrial_btn_hover_text_color');

    $dustrial_menus_bg_color = dustrial_get_option('dustrial_menus_bg_color');
    $dustrial_menus_hover_bg_color = dustrial_get_option('dustrial_menus_hover_bg_color');
    $dustrial_menus_text_color = dustrial_get_option('dustrial_menus_text_color');
    $dustrial_menus_hover_text_color = dustrial_get_option('dustrial_menus_hover_text_color');

    $dustrial_top_hv1_bg_color            = dustrial_get_option('dustrial_top_hv1_bg_color');
    $dustrial_top_hv1_font_color          = dustrial_get_option('dustrial_top_hv1_font_color');
    $dustrial_top_hv1_icon_font_color     = dustrial_get_option('dustrial_top_hv1_icon_font_color');
    $dustrial_top_hv1_social_font_color   = dustrial_get_option('dustrial_top_hv1_social_font_color');
    $dustrial_top_hv1_socialhover_color   = dustrial_get_option('dustrial_top_hv1_socialhover_color');
    $dustrial_top_hv1_linkhover_color     = dustrial_get_option('dustrial_top_hv1_linkhover_color');

    $dustrial_top_hv2_bg_color            = dustrial_get_option('dustrial_top_hv2_bg_color');
    $dustrial_top_hv2_font_color          = dustrial_get_option('dustrial_top_hv2_font_color');
    $dustrial_top_hv2_icon_font_color     = dustrial_get_option('dustrial_top_hv2_icon_font_color');
    $dustrial_top_hv2_social_font_color   = dustrial_get_option('dustrial_top_hv2_social_font_color');
    $dustrial_top_hv2_socialhover_color   = dustrial_get_option('dustrial_top_hv2_socialhover_color');
    $dustrial_top_hv2_linkhover_color     = dustrial_get_option('dustrial_top_hv2_linkhover_color');

    $dustrial_top_hv3_bg_color            = dustrial_get_option('dustrial_top_hv3_bg_color');
    $dustrial_top_hv3_font_color          = dustrial_get_option('dustrial_top_hv3_font_color');
    $dustrial_top_hv3_border_color        = dustrial_get_option('dustrial_top_hv3_border_color');
    $dustrial_top_hv3_icon_font_color     = dustrial_get_option('dustrial_top_hv3_icon_font_color');
    $dustrial_top_hv3_social_font_color   = dustrial_get_option('dustrial_top_hv3_social_font_color');
    $dustrial_top_hv3_linkhover_color     = dustrial_get_option('dustrial_top_hv3_linkhover_color');

    $breatcrumb_overlay_color = dustrial_get_option('breatcrumb_overlay_color');
    if (!empty($breatcrumb_overlay_color)) {
      $breatcrumb_overlay_color = $breatcrumb_overlay_color;
    } else {
      $breatcrumb_overlay_color = '#061538';
    }
    $breatcrumb_overlay_opacity = dustrial_get_option('breatcrumb_overlay_opacity');
    if (!empty($breatcrumb_overlay_opacity)) {
      $breatcrumb_overlay_opacity = $breatcrumb_overlay_opacity;
    } else {
      $breatcrumb_overlay_opacity = '0.6';
    }
    $breatcrumb_text_transform = dustrial_get_option('breatcrumb_text_transform');
    if (!empty($breatcrumb_text_transform)) {
      $breatcrumb_text_transform = $breatcrumb_text_transform;
    } else {
      $breatcrumb_text_transform = 'capitalize';
    }
    $menu_text_transform = dustrial_get_option('menu_text_transform');
    if (!empty($menu_text_transform)) {
      $menu_text_transform = $menu_text_transform;
    } else {
      $menu_text_transform = 'uppercase';
    }
    $menu_drop_transform = dustrial_get_option('menu_drop_transform');
    if (!empty($menu_drop_transform)) {
      $menu_drop_transform = $menu_drop_transform;
    } else {
      $menu_drop_transform = 'capitalize';
    }
    $menu_font_size = dustrial_get_option('menu_font_size');
    if (!empty($menu_font_size)) {
      $menu_font_size = $menu_font_size;
    } else {
      $menu_font_size = '15';
    }
    $menu_font_weight = dustrial_get_option('menu_font_weight');
    if (!empty($menu_font_weight)) {
      $menu_font_weight = $menu_font_weight;
    } else {
      $menu_font_weight = '600';
    }


    $cta_overlay_color = dustrial_get_option('cta_overlay_color');
    if (!empty($cta_overlay_color)) {
      $cta_overlay_color = $cta_overlay_color;
    } else {
      $cta_overlay_color = '#061538';
    }
    $cta_overlay_opacity = dustrial_get_option('cta_overlay_opacity');
    if (!empty($cta_overlay_opacity)) {
      $cta_overlay_opacity = $cta_overlay_opacity;
    } else {
      $cta_overlay_opacity = '0.8';
    }

    $shop_base_color = dustrial_get_option('shop_base_color');
    if (!empty($shop_base_color)) {
      $shop_base_color = $shop_base_color;
    } else {
      $shop_base_color = '#ff5e14';
    }

    $dustrial_logo_img_width = dustrial_get_option('dustrial_logo_img_width');
    if (!empty($dustrial_logo_img_width)) {
      $dustrial_logo_img_width = $dustrial_logo_img_width;
    } else {
      $dustrial_logo_img_width = '165px';
    }

    $dustrial_mobile_img_width = dustrial_get_option('dustrial_mobile_img_width');
    if (!empty($dustrial_mobile_img_width)) {
      $dustrial_mobile_img_width = $dustrial_mobile_img_width;
    } else {
      $dustrial_mobile_img_width = '';
    }

    $dst_breadcrumb_padding = dustrial_get_option('dst_breadcrumb_padding');
    if (!empty($dst_breadcrumb_padding)) {
      $dst_breadcrumb_padding = $dst_breadcrumb_padding;
    } else {
      $dst_breadcrumb_padding = '75px';
    }

    $dustrial_sticky_bg_color = dustrial_get_option('dustrial_sticky_bg_color');
    if (!empty($dustrial_sticky_bg_color)) {
      $dustrial_sticky_bg_color = $dustrial_sticky_bg_color;
    } else {
      $dustrial_sticky_bg_color = '#fff';
    }

    $dustrial_sticky_text_color = dustrial_get_option('dustrial_sticky_text_color');
    if (!empty($dustrial_sticky_text_color)) {
      $dustrial_sticky_text_color = $dustrial_sticky_text_color;
    } else {
      $dustrial_sticky_text_color = '#242424';
    }

    $dustrial_sticky_woo_color = dustrial_get_option('dustrial_sticky_woo_color');
    if (!empty($dustrial_sticky_woo_color)) {
      $dustrial_sticky_woo_color = $dustrial_sticky_woo_color;
    } else {
      $dustrial_sticky_woo_color = '';
    }

    $dustrial_sticky_search_color = dustrial_get_option('dustrial_sticky_search_color');
    if (!empty($dustrial_sticky_search_color)) {
      $dustrial_sticky_search_color = $dustrial_sticky_search_color;
    } else {
      $dustrial_sticky_search_color = '';
    }

    $dustrial_sticky_quote_bg_color = dustrial_get_option('dustrial_sticky_quote_bg_color');
    if (!empty($dustrial_sticky_quote_bg_color)) {
      $dustrial_sticky_quote_bg_color = $dustrial_sticky_quote_bg_color;
    } else {
      $dustrial_sticky_quote_bg_color = '';
    }

    $dustrial_sticky_quote_text_color = dustrial_get_option('dustrial_sticky_quote_text_color');
    if (!empty($dustrial_sticky_quote_text_color)) {
      $dustrial_sticky_quote_text_color = $dustrial_sticky_quote_text_color;
    } else {
      $dustrial_sticky_quote_text_color = '';
    }

    $dustrial_sticky_quote_border_color = dustrial_get_option('dustrial_sticky_quote_border_color');
    if (!empty($dustrial_sticky_quote_border_color)) {
      $dustrial_sticky_quote_border_color = $dustrial_sticky_quote_border_color;
    } else {
      $dustrial_sticky_quote_border_color = '';
    }

    $dustrial_sticky2_bg_color = dustrial_get_option('dustrial_sticky2_bg_color');
    if (!empty($dustrial_sticky2_bg_color)) {
      $dustrial_sticky2_bg_color = $dustrial_sticky2_bg_color;
    } else {
      $dustrial_sticky2_bg_color = '#061538';
    }

    $dustrial_sticky2_text_color = dustrial_get_option('dustrial_sticky2_text_color');
    if (!empty($dustrial_sticky2_text_color)) {
      $dustrial_sticky2_text_color = $dustrial_sticky2_text_color;
    } else {
      $dustrial_sticky2_text_color = '#fff';
    }

    $dustrial_sticky2_woo_color = dustrial_get_option('dustrial_sticky2_woo_color');
    if (!empty($dustrial_sticky2_woo_color)) {
      $dustrial_sticky2_woo_color = $dustrial_sticky2_woo_color;
    } else {
      $dustrial_sticky2_woo_color = '#ff5e14';
    }

    $dustrial_sticky2_search_color = dustrial_get_option('dustrial_sticky2_search_color');
    if (!empty($dustrial_sticky2_search_color)) {
      $dustrial_sticky2_search_color = $dustrial_sticky2_search_color;
    } else {
      $dustrial_sticky2_search_color = '#ff5e14';
    }

    $dustrial_sticky2_quote_bg_color = dustrial_get_option('dustrial_sticky2_quote_bg_color');
    if (!empty($dustrial_sticky2_quote_bg_color)) {
      $dustrial_sticky2_quote_bg_color = $dustrial_sticky2_quote_bg_color;
    } else {
      $dustrial_sticky2_quote_bg_color = '#ff5e14';
    }

    $dustrial_sticky2_quote_text_color = dustrial_get_option('dustrial_sticky2_quote_text_color');
    if (!empty($dustrial_sticky2_quote_text_color)) {
      $dustrial_sticky2_quote_text_color = $dustrial_sticky2_quote_text_color;
    } else {
      $dustrial_sticky2_quote_text_color = '#fff';
    }

    $dustrial_sticky2_quote_border_color = dustrial_get_option('dustrial_sticky2_quote_border_color');
    if (!empty($dustrial_sticky2_quote_border_color)) {
      $dustrial_sticky2_quote_border_color = $dustrial_sticky2_quote_border_color;
    } else {
      $dustrial_sticky2_quote_border_color = '#ff5e14';
    }

    $footer_copy_background_color = dustrial_get_option('footer_copy_background_color');
    if (!empty($footer_copy_background_color)) {
      $footer_copy_background_color = $footer_copy_background_color;
    } else {
      $footer_copy_background_color = '#141414';
    }

    $footer_copy_text_color = dustrial_get_option('footer_copy_text_color');
    if (!empty($footer_copy_text_color)) {
      $footer_copy_text_color = $footer_copy_text_color;
    } else {
      $footer_copy_text_color = '#ffffff';
    }

    $footer_social_icon_color   = dustrial_get_option('footer_social_icon_color');
    $footer_social_border_color = dustrial_get_option('footer_social_border_color');
    $footer_newsbg_color        = dustrial_get_option('footer_newsbg_color');
    $footer2_overlay_opacity    = dustrial_get_option('footer2_overlay_opacity');
    $footer2_overlay_color      = dustrial_get_option('footer2_overlay_color');
    $footer2_text_color         = dustrial_get_option('footer2_text_color');
    $footer2_font_color         = dustrial_get_option('footer2_font_color');
    $footer2_item_before_color  = dustrial_get_option('footer2_item_before_color');
    $footer_background_color    = dustrial_get_option('footer_background_color');
    $footer_text_color          = dustrial_get_option('footer_text_color');
    $footer_font_color          = dustrial_get_option('footer_font_color');
    $footer_item_before_color   = dustrial_get_option('footer_item_before_color');

    $dustrial_back_to_top_bg_color = dustrial_get_option('dustrial_back_to_top_bg_color');
    if (!empty($dustrial_back_to_top_bg_color)) {
      $dustrial_back_to_top_bg_color = $dustrial_back_to_top_bg_color;
    } else {
      $dustrial_back_to_top_bg_color = '#ff5e14';
    } 
    $dustrial_back_to_top_icon_color = dustrial_get_option('dustrial_back_to_top_icon_color');
    if (!empty($dustrial_back_to_top_icon_color)) {
      $dustrial_back_to_top_icon_color = $dustrial_back_to_top_icon_color;
    } else {
      $dustrial_back_to_top_icon_color = '#ffffff';
    }
    $preloader_bg_color = dustrial_get_option('preloader_bg_color');
    if (!empty($preloader_bg_color)) {
      $preloader_bg_color = $preloader_bg_color;
    } else {
      $preloader_bg_color = '#ffffff';
    }
    $preloader_anim_color = dustrial_get_option('preloader_anim_color');
    if (!empty($preloader_anim_color)) {
      $preloader_anim_color = $preloader_anim_color;
    } else {
      $preloader_anim_color = '#FF5E14';
    }

    echo "<style>
       body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        h1 a,
        h2 a,
        h3 a,
        h4 a,
        h5 a,
        h6 a{
          font-family: '".$body_font."', sans-serif !important;
        }
        
        .main-menu ul li:hover> a{
          color: $dustrial_menus_hover_bg_color;
        }
        .main-menu ul li a{
          text-transform: $menu_text_transform;
          font-size:$menu_font_size;
          font-weight: $menu_font_weight;
        }
        .main-menu ul li ul.sub-menu li a{
          text-transform: $menu_drop_transform;
        }
        .main-menu ul li a:before{
          background-color: $dustrial_menus_hover_bg_color;
        }
        .main-menu ul li ul.sub-menu{
          background-color: $dustrial_menus_bg_color;
        }
        
        .main-menu ul ul a:hover,
        .main-menu ul ul ul a:hover{
          background-color: $dustrial_menus_hover_bg_color;
        }

        .main-menu ul li ul.sub-menu li a{
          color: $dustrial_menus_text_color !important;
        }
        .main-menu ul li ul.sub-menu li a:hover{
          color: $dustrial_menus_hover_text_color !important;
        }
        .logo-for-responsive-only, .logo a img {
          width: $dustrial_logo_img_width;
        }
        .h2-navigation-area.navbar-fixed-top .logo-for-responsive-only a img,
        .h2-navigation-area .logo-for-responsive-only a img {
          width: $dustrial_logo_img_width;
        }
        .page_title.breadcrumb-overlay {
          padding: $dst_breadcrumb_padding 0px;
        }
        .h1-navigation-area.navbar-fixed-top{
          background-color: $dustrial_sticky_bg_color;
        }
        .h1-navigation-area.navbar-fixed-top .main-menu ul li a{
          color: $dustrial_sticky_text_color;
        }
        .h1-navigation-area.navbar-fixed-top a.header-cart i {
          color: $dustrial_sticky_woo_color !important;
        }
        .h1-navigation-area.navbar-fixed-top a.header-cart span.cart-badge {
            color: $dustrial_sticky_woo_color !important;
        }
        .h1-navigation-area.navbar-fixed-top a.header-search i {
            color: $dustrial_sticky_search_color !important;
        }
        .h1-navigation-area.navbar-fixed-top a.get_quote.btn {
          background-color: $dustrial_sticky_quote_bg_color !important;
          color: $dustrial_sticky_quote_text_color !important;
          border: 1px solid $dustrial_sticky_quote_border_color !important;
        }

        .h3-navigation-area.navbar-fixed-top .main-menu ul li a,
        .h2-navigation-area.navbar-fixed-top .main-menu ul li a{
            color: $dustrial_sticky2_text_color;
        }
        .h3-navigation-area.navbar-fixed-top,
        .h2-navigation-area.navbar-fixed-top{
          background-color: $dustrial_sticky2_bg_color !important;
        }
        .h3-navigation-area.navbar-fixed-top .nav-serch-area .header-cart span.cart-badge,
        .h3-navigation-area.navbar-fixed-top .header-cart i,
        .h2-navigation-area.navbar-fixed-top span.cart-badge,
        .h2-navigation-area.navbar-fixed-top .header-cart i{
          color: $dustrial_sticky2_woo_color !important;
        }
        .h2-navigation-area.navbar-fixed-top a.header-search i{
          color: $dustrial_sticky2_search_color !important;
        }
        .h3-navigation-area.navbar-fixed-top a.header-search i{
          color: $dustrial_sticky2_search_color !important;
        }
        .h2-navigation-area.navbar-fixed-top a.get_quote.btn {
          background-color: $dustrial_sticky2_quote_bg_color !important;
          color: $dustrial_sticky2_quote_text_color !important;
          border: 1px solid $dustrial_sticky2_quote_border_color !important;
        }

        @media screen and (max-width: 575px) {
          .logo-for-responsive-only, .logo a img {
            width: $dustrial_mobile_img_width !important;
          }
        }

        .service-all-btn .btn-default,
        button.default_button.dustrial-btn,
        .subscription-form .subscription .btn,
        button.get_quote_btn,
        .h2-blog-single-item .blog-img .overlay-btn a,
        a.get_quote.btn,
        .btn{
          background-color: $dustrial_btn_bg_color;
          border-color: $dustrial_btn_bg_color;
          color: $dustrial_btn_text_color !important;
        }

        a.link.btn.btn-primary.activeBorder{
          border-color: $dustrial_btn_bg_color;
          background-color: transparent !important;
        }

        a.link.btn.btn-primary.activeBorder:hover{
          border-color: $dustrial_btn_bg_hover_color !important;
          background-color: $dustrial_btn_bg_hover_color !important;
          color: $dustrial_btn_text_color !important;
        }

        .service-all-btn .btn-default:hover,
        .h2-blog-single-item:hover .blog-img .overlay-btn a,
        #blog-list-2 .owl-prev:hover, #blog-list-2 .owl-next:hover,
        #testimonial-items .owl-nav i:hover,
        #blog-list .owl-nav i:hover,
        .subscription-form .subscription .btn:hover,
        button.default_button.dustrial-btn:hover,
        a.get_quote.btn:hover,
        .h2-blog-single-item .blog-img .overlay-btn a:hover,
        button.get_quote_btn:hover,
        .btn:hover {
          border-color: $dustrial_btn_bg_hover_color;
          background-color: $dustrial_btn_bg_hover_color;
          color: $dustrial_btn_hover_text_color !important;
        }

        .blog-content a,
        .blog-content p a,
        .activeColor,
        .featured-icon i,
        .single-blog:hover .entry-title,
        .company-icon i:before,
        .h2-single-projects-thumbnail a span,
        .bread_crumb a:hover,
        .bind_footer .social-media a:hover,
        .h2-single-projects-item:hover .h2-single-projects-title a,
        .h2-blog-single-item:hover a.entry-title,
        .h2-blog-single-item .article-content .entry-meta a:hover,
        .h2-blog-single-item .entry-meta-footer a:hover,
        .single-blog .content .entry-meta a:hover,
        .single-blog .entry-meta-footer a:hover,
        h6.footer-blog-date.activeColor a,
        p.logged-in-as a:hover,
        .blog-comment-area .comment-title small a:hover,
        span.info-icon,
        footer.footer .footer-blog-title a:hover,
        .featured_svg i:before,
        .h2-single-featured .card:hover .card-title,
        .single-blog span.icon,
        .featured-item:hover .featured-item-title,
        .single-counter h5.activeColor,
        #brochures-block .download-brochures i:before,
        h6.inspiring-author-role.activeColor,
        .isotop-projects-filter .mix h5 a:hover,
        .market-single-items:hover .market-item-details a,
        .market-single-items i.fa-link,
        .single_project_widgets a:hover,
        .ws-input button:hover,
        .h1-single-top-block i.fa, #header-bottom i,
        .h2-header-top-area .h1-single-top-block a:hover,
        .h3-header-top-area .h1-single-top-block a:hover,
        #h2-testimonial-items .quotation i.fa.fa-quote-left,
        .h3-navigation-area .nav-serch-area .header-cart span.cart-badge,
        .header-search i,
        .header-cart i,
        .nav-links a:hover,
        .bind_footer.footer-2 .footer ul.menu li a:hover,
        .footer ul.menu li a:hover,
        .widget_categories ul li a:hover, 
        .widget_archive ul li:hover a, 
        .widget_archive ul li:hover, 
        .widget_archive ul li a:hover,
        .sidebar-widget a:hover,
        .widget_categories ul li:hover span, 
        .widget_categories ul li:hover > a,
        .blog-mata ul li a:hover,
        .header-cart span.cart-badge,
        .blog-inner-tag .tags-list a:hover,
        span.breadcrumb-info a:hover span,
        li.menu-item.dropdown.mini-cart-items a.cart-contents,
        .cart-dropdown-menu .product-name a,
        .product-remove a.remove-cart-item,
        .dropdown-menu.cart-dropdown-menu .mini-view-cart a:hover,
        .contact-page .contact_address .contact-media a,
        li.menu-item.dropdown.mini-cart-items a.cart-contents i.fa,
        .section-title .section-body .sub-title{
          color: $dustrial_base_color !important;
        }

        .slider-area-wrap .slider-activee .slick-arrow{
          border: 2px solid $dustrial_base_color !important;
        }
        .client-carousel-area .owl-prev i.fa,
        .client-carousel-area .owl-next i.fa {
          color: $dustrial_base_color !important;
        }

        .market-single-items:hover .market-item2-icons,
        .vc_progress_bar .vc_single_bar .vc_bar,
        .pagination_waper .page-item.active .page-link,
        .pagination_waper li.page-item .page-link:hover,
        .inner-mixitup-menus .btn.active,
        .inner-mixitup-menus .btn:hover,
        .single_project_widgets.activebgcolor,
        .contact-service,
        .contact-social-info a:hover,
        .video-play-button-two,
        .video-play-button-two::before,
        .market-style-3 .shape-style-2,
        .h3-mixitup-menus .btn.active,
        .h3-mixitup-menus button:hover,
        .mixitup-menus,
        blockquote p,
        .second-slider-content .intro::after,
        .footer ul.menu li a:hover:before,
        a.video-play-button,
        a.video-play-button::before,
        .bd-comment-box .content .name a.comment-reply-link:hover,
        .technical-solutions li::before{
          background-color: $dustrial_base_color !important;
        }

        .pagination_waper .page-item.active .page-link,
        .pagination_waper li.page-item .page-link:hover,
        #h3-testimonial-items .owl-dots .active,
        .market-single-items .style-1:before,
        .technical-solutions li::before{
          border-color: $dustrial_base_color !important;
        }
		
		.woocommerce table.my_account_orders td a,
		.woocommerce-account .addresses .title .edit,
		.woocommerce-info a.showlogin,
		.woocommerce-error::before,
		span.woocommerce-terms-and-conditions-checkbox-text a.woocommerce-terms-and-conditions-link,
		form.woocommerce-form p.lost_password a,
		.woocommerce-account .woocommerce-MyAccount-content p a,
        li.woocommerce-MyAccount-navigation-link.is-active a {
        	color: $dustrial_base_color !important;
        }
		
		.woocommerce-error {
		    border-top-color: $dustrial_base_color !important;
		}
			
        li.woocommerce-MyAccount-navigation-link a:hover {
        	color: $dustrial_base_color !important;
        }

        span.info-icon,
        .contact-social-info a:hover,
        .bd-comment-box .content .name a.comment-reply-link,
        .market-single-items:hover .market-item2-icons {
          border: 1px solid $dustrial_base_color !important;
        }

        .widget_tag_cloud a:hover{
          background-color: $dustrial_base_color !important;
          border-color: $dustrial_base_color !important;
          color: #fff !important;
        }

        .market-list-group ul li a.active:before {
          border-right: 5px solid $dustrial_base_color !important;
        }

        blockquote p {
          border-left: 2px solid $dustrial_base_color !important;
        }

        .market-single-items:hover .shape {
          border-top: 110px solid $dustrial_base_color !important;
        }

        .isotop-projects-filter .card:hover .shape {
          border-bottom: 110px solid $dustrial_base_color !important;
        }

        .second-slider-content .intro::after,
        #h2-testimonial-items .owl-dots .owl-dot.active,
        #h3-testimonial-items .owl-dots .active,
        .slider-activee .slick-dots li.slick-active button {
          background-color: $dustrial_base_color;
        }

        .h1-header-top-area {
          background-color: $dustrial_top_hv1_bg_color;
        }
        .h1-header-top-area .h1-single-top-block strong,
        .h1-header-top-area .h1-single-top-block span, 
        .h1-header-top-area .h1-social-media ul li a,
        .h1-header-top-area .h1-single-top-block a {
          color: $dustrial_top_hv1_font_color;
        }
        .h1-header-top-area .h1-single-top-block i.fa {
          color: $dustrial_top_hv1_icon_font_color !important;
        }
        .h1-header-top-area .h1-social-media ul li a i.fa {
          color: $dustrial_top_hv1_social_font_color !important;
        }
        .h1-header-top-area .h1-social-media ul li a:hover i.fa {
          color: $dustrial_top_hv1_socialhover_color !important;
        }
        .h1-header-top-area .h1-single-top-block a:hover {
          color: $dustrial_top_hv1_linkhover_color !important;
        }

        .h2-header-top-area {
          background-color: $dustrial_top_hv2_bg_color;
        }
        .h2-header-top-area .h1-single-top-block strong,
        .h2-header-top-area .h1-single-top-block span,
        .h2-header-top-area .h1-single-top-block a {
          color: $dustrial_top_hv2_font_color;
        }
        .h2-header-top-area .h1-single-top-block i.fa {
          color: $dustrial_top_hv2_icon_font_color !important;
        }
        .h2-header-top-area .h1-social-media ul li a i.fa {
          color: $dustrial_top_hv2_social_font_color !important;
        }
        .h2-header-top-area .h1-social-media ul li a:hover i.fa {
          color: $dustrial_top_hv2_socialhover_color !important;
        }
        .h2-header-top-area .h1-single-top-block a:hover{
          color: $dustrial_top_hv2_linkhover_color !important; 
        }

        .h3-header-top-area{
          background: $dustrial_top_hv3_bg_color;
        }
        .h3-header-top-area .h1-single-top-block strong,
        .h3-header-top-area .h1-single-top-block span,
        .h3-header-top-area .h1-single-top-block a {
          color: $dustrial_top_hv3_font_color;
        }
        .h3-header-top-area .h1-single-top-block i.fa {
          color: $dustrial_top_hv3_icon_font_color !important;
        }
        .h3-header-top-area .h1-social-media ul li a i.fa {
          color: $dustrial_top_hv3_social_font_color !important;
        }
        .h3-header-top-area .h1-single-top-block a:hover,
        .h3-header-top-area .h1-social-media ul li a i.fa:hover {
          color: $dustrial_top_hv3_linkhover_color !important;
        }
        .h3-header-top-area .h1-single-top-block{
          border-color: $dustrial_top_hv3_border_color !important;
        }


        .breadcrumb-overlay:before {
          background: $breatcrumb_overlay_color none repeat scroll 0 0;
          opacity: $breatcrumb_overlay_opacity;
        }
        .page_title .page_tittle {
          text-transform: $breatcrumb_text_transform !important;
        }
        .call-to-action:before {
          background: $cta_overlay_color !important;
          opacity: $cta_overlay_opacity !important;
        }
        
        table.woocommerce-table.woocommerce-table--order-details.shop_table.order_details a,
        .cross-sells .shop-product-single .product-price-in-thumb span.price,
        .woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
        .summary.entry-summary span.woocommerce-Price-amount.amount,
        .woocommerce nav.woocommerce-pagination ul li span,
        .woocommerce nav.woocommerce-pagination ul li a,
        .woocommerce-cart .woocommerce-cart-form td a,
        .summary.entry-summary .product_meta a,
        a.woocommerce-privacy-policy-link,
        .product-content .added_to_cart,
        .woocommerce-info a.showcoupon,
        .woocommerce-info::before,
        .comment-form-rating a,
        .product-content h2 a,
        a.restore-item,
        .group_table td a,
        a.reset_variations {
          color: $shop_base_color !important;
        }
        #add_payment_method #payment .payment_method_paypal .about_paypal, .woocommerce-cart #payment .payment_method_paypal .about_paypal, .woocommerce-checkout #payment .payment_method_paypal .about_paypal,
        #add_payment_method .cart-collaterals .shipping-calculator-button, .woocommerce-cart .cart-collaterals .shipping-calculator-button, .woocommerce-checkout .cart-collaterals .shipping-calculator-button {
          color: $shop_base_color !important;
        }

        .woocommerce a.remove:hover {
          background: $shop_base_color !important;
        }

        .shop-sidebar .sidebar-widget.woo-siebar ul.product-categories li a:hover,
        .shop-sidebar ul.product_list_widget li a:hover,
        .wcppec-checkout-buttons__button,
        .woocommerce-message::before,
        .summary.entry-summary p.price {
          color: $shop_base_color !important;
        }
        .products-page .product-item.product .product-img .product-price-in-thumb,
        .cross-sells .shop-product-single .product-content a.button:hover,
        .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, 
        .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
        .checkout_coupon.woocommerce-form-coupon button.button:hover,
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .products-page .product-item.product .product-img .onsale,
        .woocommerce-checkout-payment button#place_order:hover,
        .sidebar-widget.woo-siebar.widget_price_filter button,
        .products-page .product-item.product a.button:hover,
        .sidebar-widget.woo-siebar .tagcloud a:hover,
        p.return-to-shop a.button.wc-backward:hover,
        .products-page .product .onsale {
          background: $shop_base_color;
          background-color: $shop_base_color;
        }
        .woocommerce-cart .woocommerce-cart-form button.button:hover,
        .summary.entry-summary .single_add_to_cart_button:hover,
        .woocommerce .woocommerce-message a.button:hover,
        .woocommerce-Reviews #respond input#submit:hover,
        .cart-collaterals a.checkout-button:hover {
          background: $shop_base_color !important;
          background-color: $shop_base_color !important;
        }
        .cross-sells .shop-product-single .product-content a.button:hover,
        .checkout_coupon.woocommerce-form-coupon button.button:hover,
        .woocommerce-cart .woocommerce-cart-form button.button:hover,
        .woocommerce nav.woocommerce-pagination ul li span.current,
        .summary.entry-summary .single_add_to_cart_button:hover,
        .woocommerce-checkout-payment button#place_order:hover,
        .products-page .product-item.product a.button:hover,
        .woocommerce-Reviews #respond input#submit:hover,
        .woocommerce .woocommerce-message a.button:hover,
        p.return-to-shop a.button.wc-backward:hover,
        .cart-collaterals a.checkout-button:hover,
        .sidebar-widget.woo-siebar .tagcloud a:hover {
          border-color: $shop_base_color !important;
        }
        .woocommerce-message,
        .woocommerce-info {
          border-top-color: $shop_base_color;
        }
        .scroll-to-top {
          color: $dustrial_back_to_top_icon_color;
          background-color: $dustrial_back_to_top_bg_color;
        }
        #loader-wrapper {
          background: $preloader_bg_color;
        }
        #noTrespassingOuterBarG {
          border:1px solid $preloader_anim_color;
        }
        .noTrespassingBarLineG {
          background-color: $preloader_anim_color;
        }

        .subscription {
          background-color: $footer_newsbg_color;
        }
        .footer {
          background-color: $footer_background_color;
        }
        .footer h4.footer-nav-title{
          color: $footer_text_color !important;
        }
        .footer ul.menu li a{
          color: $footer_font_color !important;
        }
        .footer ul.menu li a{
          border-left:2px solid $footer_item_before_color !important;
        }
        .footer ul.menu li a:before{
          background-color: $footer_item_before_color !important;
        }
        footer.footer .footer-blog-title a{
          color: $footer_font_color !important;
        }

        .bind_footer.footer-2.bg-black-overlay-footer:before {
          opacity: $footer2_overlay_opacity;
          background-color: $footer2_overlay_color;
        }
        .bind_footer.footer-2 .footer .footer-nav-title{
          color: $footer2_text_color !important;
        }
        .bind_footer.footer-2 .address_info p,
        .bind_footer.footer-2 .block.footer-newsletter p,
        .bind_footer.footer-2 .footer ul.menu li a{
          color: $footer2_font_color !important;
        }
        .bind_footer.footer-2 .footer ul.menu li a:before{
          background-color: $footer2_item_before_color !important;
        }
        .bind_footer .subscription-form input{
          border:1px solid $footer2_item_before_color !important;
        }

        .copyright {
          background-color: $footer_copy_background_color;
        }
        .copyright-content p{
          color: $footer_copy_text_color;
        }
        .social-media a{
          border-color: $footer_social_border_color;
          color: $footer_social_icon_color;
        }


    </style>";
  }
}
add_filter('wp_head', 'dustrial_custom_styles');