<?php
/*<><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/* - Footer Widget
/*<><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/

/*============================================================================================================================*/
/* - About Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_about_Widget' ) ) {

    //Footer About Widget
    class DUSTRIAL_about_Widget extends WP_Widget {

        /*=====================================================
        // = Widget Register
        /*=====================================================*/
        function __construct() {

          $widget_ops     = array(
            'classname'   => 'dustrial_brandlogo_widget',
            'description' => 'About Widget.'
          );

          parent::__construct( 'address_widget', 'A::1 About Logo Widget', $widget_ops );

        }

        /*=====================================================
        // = Front-end Setting
        /*=====================================================*/
        function widget( $args, $instance ) {

          extract( $args );
          echo $before_widget; ?>

            <?php              
              if (!empty($instance['title'])) {
                $title = $instance['title'];
              } else {
                $title = '';

              } if (!empty($instance['about_address_title'])) {
                $address_title = $instance['about_address_title'];
              } else {
                $address_title = '';

              } if (!empty($instance['about_address'])) {
                $about_address = $instance['about_address'];
              } else {
                $about_address = '';

              } if (!empty($instance['about_phone_title'])) {
                $phone_title = $instance['about_phone_title'];
              } else {
                $phone_title = '';

              } if (!empty($instance['about_phone'])) {
                $about_phone = $instance['about_phone'];
              } else {
                $about_phone = '';

              } if (!empty($instance['about_mail_title'])) {
                $mail_title = $instance['about_mail_title'];
              } else {
                $mail_title = '';

              } if (!empty($instance['about_mail'])) {
                $about_mail = $instance['about_mail'];
              } else {
                $about_mail = '';

              } if (!empty($instance['about_open_time_title'])) {
                $open_time_title = $instance['about_open_time_title'];
              } else {
                $open_time_title = '';

              } if (!empty($instance['about_open_time'])) {
                $about_open_time = $instance['about_open_time'];
              } else {
                $about_open_time = '';

              } if (!empty($instance['about_social_list'])) {
                $social_list = $instance['about_social_list'];
              } else {
                $social_list = '';

              } if ( !empty($instance['about_widget_logo'])) {
                $image_id = $instance['about_widget_logo'];
                $attachment = wp_get_attachment_image_src( $image_id, 'full' );
                $image =($attachment) ? $attachment[0] : $image_id;
              } else {
                $image = '';
              }

            ?> 

            <div class="address_info mb-lg-0">
              <img class="footer-logo" src="<?php echo esc_url( $image ); ?>" alt="footer logo">
              <p class="footer-address"><span class="activeColor"><?php echo esc_html( $address_title ); ?></span> <?php echo esc_html( $about_address ); ?></p>
              <p class="footer-phone"><span class="activeColor"><?php echo esc_html( $phone_title ); ?></span> <?php echo esc_html( $about_phone ); ?></p>
              <p class="footer-email"><span class="activeColor"><?php echo esc_html( $mail_title ); ?></span> <?php echo esc_html( $about_mail ); ?></p>
              <p class="footer-open"><span class="activeColor"><?php echo esc_html( $open_time_title ); ?> </span> <?php echo esc_html( $about_open_time ); ?></p>
              <div class="block social-media">
                <?php echo $social_list; ?>
              </div>
            </div>

          <?php echo $after_widget;
        }
        /*=====================================================
        // = Widget Update Setting
        /*=====================================================*/
        function update( $new_instance, $old_instance ) {

          $instance            = $old_instance;
          $instance['title']   = $new_instance['title'];
          $instance['about_widget_logo']    = $new_instance['about_widget_logo'];

          $instance['about_address_title']    = $new_instance['about_address_title'];
          $instance['about_address']    = $new_instance['about_address'];

          $instance['about_phone_title']    = $new_instance['about_phone_title'];
          $instance['about_phone']    = $new_instance['about_phone'];

          $instance['about_mail_title']    = $new_instance['about_mail_title'];
          $instance['about_mail']    = $new_instance['about_mail'];

          $instance['about_open_time_title']    = $new_instance['about_open_time_title'];
          $instance['about_open_time']    = $new_instance['about_open_time'];

          $instance['about_social_list']    = $new_instance['about_social_list'];

          return $instance;

        }

        /*=====================================================
        // = Widget Form Setting
        /*=====================================================*/
        function form( $instance ) {

          /* -------------------------------------------------
          /* - Defaults Value Seiitng Fields
          /*------------------------------------------------- */
          $instance   = wp_parse_args( $instance, array(
            'title' => 'Free Consultation',
            'about_widget_logo' => DUSTRIAL_PLG_URL. 'assets/imgs/logo-2.png',
            'about_address_title' => 'Address:',
            'about_address' => '555 California str, Suite 100 San Francisco, LA 94107',
            'about_phone_title' => 'Phone:',
            'about_phone' => '+123-456-7890 &amp; 4567',
            'about_mail_title' => 'Mail:',
            'about_mail'            => 'support@yourcompany.com',
            'about_open_time_title' => 'Opening',
            'about_open_time'       => 'Mon-Sat: 9am-18pm',
            'about_social_list'     => 'Put the social list here',
          ));


          /* -------------------------------------------------
          /* - Widget Title Seiitng
          /*------------------------------------------------- */
          $text_value = esc_attr( $instance['title'] );
          $text_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'title' => 'Title',
          );
          echo dustrial_add_element( $text_field, $text_value );

         
          /* -------------------------------------------------
          /* - All Widget Fields Seiitng
          /*------------------------------------------------- */
          
          /* - About Widget Logo Upload Field
          /* ------------------------------------------------- */
          $about_widget_logo_value = esc_attr( $instance['about_widget_logo'] );
          $about_widget_logo_field = array(
            'id'    => $this->get_field_name('about_widget_logo'),
            'name'  => $this->get_field_name('about_widget_logo'),
            'type'  => 'image',
            'title' => 'Logo Image',
            'info'  => 'About Widghet Logo Upload Here',
          );
          echo dustrial_add_element( $about_widget_logo_field, $about_widget_logo_value );


          /* - About Widget Description
          /* ------------------------------------------------- */
          $about_address_title_value = esc_attr( $instance['about_address_title'] );
          $about_address_title_field = array(
            'id'    => $this->get_field_name('about_address_title'),
            'name'  => $this->get_field_name('about_address_title'),
            'type'  => 'text',
            'title' => 'Address Title',
          );
          echo dustrial_add_element( $about_address_title_field, $about_address_title_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_address_value = esc_attr( $instance['about_address'] );
          $about_address_field = array(
            'id'    => $this->get_field_name('about_address'),
            'name'  => $this->get_field_name('about_address'),
            'type'  => 'textarea',
            'title' => 'Address',
          );
          echo dustrial_add_element( $about_address_field, $about_address_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_phone_title_value = esc_attr( $instance['about_phone_title'] );
          $about_phone_title_field = array(
            'id'    => $this->get_field_name('about_phone_title'),
            'name'  => $this->get_field_name('about_phone_title'),
            'type'  => 'text',
            'title' => 'Phone Title',
          );
          echo dustrial_add_element( $about_phone_title_field, $about_phone_title_value );


          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_phone_value = esc_attr( $instance['about_phone'] );
          $about_phone_field = array(
            'id'    => $this->get_field_name('about_phone'),
            'name'  => $this->get_field_name('about_phone'),
            'type'  => 'text',
            'title' => 'Phone Number',
          );
          echo dustrial_add_element( $about_phone_field, $about_phone_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_mail_title_value = esc_attr( $instance['about_mail_title'] );
          $about_mail_title_field = array(
            'id'    => $this->get_field_name('about_mail_title'),
            'name'  => $this->get_field_name('about_mail_title'),
            'type'  => 'text',
            'title' => 'Mail Title',
          );
          echo dustrial_add_element( $about_mail_title_field, $about_mail_title_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_mail_value = esc_attr( $instance['about_mail'] );
          $about_mail_field = array(
            'id'    => $this->get_field_name('about_mail'),
            'name'  => $this->get_field_name('about_mail'),
            'type'  => 'text',
            'title' => 'Mail Number',
          );
          echo dustrial_add_element( $about_mail_field, $about_mail_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_open_time_title_value = esc_attr( $instance['about_open_time_title'] );
          $about_open_time_title_field = array(
            'id'    => $this->get_field_name('about_open_time_title'),
            'name'  => $this->get_field_name('about_open_time_title'),
            'type'  => 'text',
            'title' => 'Time Title',
          );
          echo dustrial_add_element( $about_open_time_title_field, $about_open_time_title_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_open_time_value = esc_attr( $instance['about_open_time'] );
          $about_open_time_field = array(
            'id'    => $this->get_field_name('about_open_time'),
            'name'  => $this->get_field_name('about_open_time'),
            'type'  => 'text',
            'title' => 'Time',
          );
          echo dustrial_add_element( $about_open_time_field, $about_open_time_value );

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $about_social_list_value = esc_attr( $instance['about_social_list'] );
          $about_social_list_field = array(
            'id'    => $this->get_field_name('about_social_list'),
            'name'  => $this->get_field_name('about_social_list'),
            'type'  => 'textarea',
            'title' => 'Socail List',
          );
          echo dustrial_add_element( $about_social_list_field, $about_social_list_value );

        }
    }
    // End Of Footer About Widget
}

if ( ! function_exists( 'dustrial_about_widget_init' ) ) {
  function dustrial_about_widget_init() {
    register_widget( 'DUSTRIAL_about_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_about_widget_init', 1 );
}


/*============================================================================================================================*/
/* - Newsletter Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_newsletter_Widget' ) ) {

    //Footer About Widget
    class DUSTRIAL_newsletter_Widget extends WP_Widget {

        /*=====================================================
        // = Widget Register
        /*=====================================================*/
        function __construct() {

          $widget_ops     = array(
            'classname'   => 'dustrial_newsletter_widget',
            'description' => 'Newsletter Widget.'
          );

          parent::__construct( 'newsletter_widget', 'A::2 Newsletter Widget', $widget_ops );

        }

        /*=====================================================
        // = Front-end Setting
        /*=====================================================*/
        function widget( $args, $instance ) {

          extract( $args );
          echo $before_widget; ?>

            <?php 
              
              if (!empty($instance['title'])) {
                $title = $instance['title'];
              } else {
                $title = '';
              } if (!empty($instance['newsletter_desc'])) {
                $newsletter_desc = $instance['newsletter_desc'];
              } else {
                $newsletter_desc = '';
              } if (!empty($instance['newsletter_shortcode'])) {
                $newsletter_shortcode = $instance['newsletter_shortcode'];
              } else {
                $newsletter_shortcode = '';
              }

            ?> 

            <div class="block footer-newsletter">
              <h5 class="footer-nav-title text-light"><?php echo esc_html( $title ); ?></h5>
              <div class="Consultation">
                <p class="text-light"><?php echo esc_html( $newsletter_desc ); ?></p>
              </div>
              <div class="subscription-form">
               <?php echo do_shortcode( $newsletter_shortcode ); ?>
              </div>
            </div>

          <?php echo $after_widget;
        }
        /*=====================================================
        // = Widget Update Setting
        /*=====================================================*/
        function update( $new_instance, $old_instance ) {

          $instance            = $old_instance;
          $instance['title']   = $new_instance['title'];
          $instance['newsletter_desc']    = $new_instance['newsletter_desc'];
          $instance['newsletter_shortcode']    = $new_instance['newsletter_shortcode'];

          return $instance;

        }

        /*=====================================================
        // = Widget Form Setting
        /*=====================================================*/
        function form( $instance ) {

          /* -------------------------------------------------
          /* - Defaults Value Seiitng Fields
          /*------------------------------------------------- */
          $instance   = wp_parse_args( $instance, array(
            'title' => 'Dustrial',
            'newsletter_desc' => 'There are many variations of passages of Lorem Ipsum available.',
            'newsletter_shortcode' => 'Pleae put the newsletter shortcode.',
          ));

          /* -------------------------------------------------
          /* - Widget Title Seiitng
          /*------------------------------------------------- */
          $text_value = esc_attr( $instance['title'] );
          $text_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'title' => 'Title',
          );
          echo dustrial_add_element( $text_field, $text_value );

         
          /* -------------------------------------------------
          /* - All Widget Fields Seiitng
          /*------------------------------------------------- */

          /* - About widget Button Link
          /* ------------------------------------------------- */
          $newsletter_desc_value = esc_attr( $instance['newsletter_desc'] );
          $newsletter_desc_field = array(
            'id'    => $this->get_field_name('newsletter_desc'),
            'name'  => $this->get_field_name('newsletter_desc'),
            'type'  => 'textarea',
            'title' => 'Newsletter Description',
          );
          echo dustrial_add_element( $newsletter_desc_field, $newsletter_desc_value );


          /* - Newsletter Form Shortcode
          /* ------------------------------------------------- */
          $newsletter_shortcode_value = esc_attr( $instance['newsletter_shortcode'] );
          $newsletter_shortcode_field = array(
            'id'    => $this->get_field_name('newsletter_shortcode'),
            'name'  => $this->get_field_name('newsletter_shortcode'),
            'type'  => 'textarea',
            'title' => 'Newsletter Form Shortcode',
          );
          echo dustrial_add_element( $newsletter_shortcode_field, $newsletter_shortcode_value );
         

        }
    }
    // End Of Footer About Widget
}

if ( ! function_exists( 'dustrial_newsletter_widget_init' ) ) {
  function dustrial_newsletter_widget_init() {
    register_widget( 'DUSTRIAL_newsletter_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_newsletter_widget_init', 2 );
}


/*============================================================================================================================*/
/* - Recent Post Widget Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_recent_post_Widget' ) ) {
  class DUSTRIAL_recent_post_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'dustrial_rp_widget',
        'description' => 'Recent Post Widget.'
      );

      parent::__construct( 'recent_post_widget', 'A::3 Recent Post', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;
        $title = $instance['title'];
        $post_no = $instance['post_per_page'];

        if (!empty($instance['popular_post'])) {
          $recent_p = $instance['popular_post'];
        } else {
          $recent_p = '';          
        }

      ?>      

      <?php echo wp_kses_stripslashes( $before_title . $title . $after_title ); ?>

      <?php

        if ($recent_p == '1') {
          $recent_or_popular = new WP_Query( array( 
            'posts_per_page'  => $post_no, 
            'meta_key'        => 'post_views_count',
            'orderby'         => 'meta_value_num',
            'order'           => 'DESC'  
          ) );
        } else {
          $query = "";  
          $recent_or_popular = new WP_Query(
            'post_type=post&posts_per_page=' . $post_no, $query
          );
        }
        while ( $recent_or_popular->have_posts() ) : $recent_or_popular->the_post();

        ?>
        <div class="wd-single-popular-post">
          <?php if(has_post_thumbnail()) { ?>
            <?php the_post_thumbnail('dustrial-thumb'); ?>
          <?php } ?>
          <div class="wd-single-popular-post-details">
            <h6 class="footer-blog-date activeColor"><a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a></h6>
            <p class="footer-blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
            </a>
          </div>
        </div>
      <?php endwhile; wp_reset_query(); ?>

    <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['post_per_page']    = $new_instance['post_per_page'];
      $instance['popular_post']    = $new_instance['popular_post'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Title Field Defaults
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'Recent Post',
        'post_cat' => 'Select Category',
        'post_per_page' => '3',
        'popular_post' => 'no',
      ));

      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo dustrial_add_element( $text_field, $text_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $post_cat_value = esc_attr( $instance['post_cat'] );
      $post_cat_field = array(
        'id'    => $this->get_field_name('post_cat'),
        'name'  => $this->get_field_name('post_cat'),
        'type'           => 'select',
        'title'          => 'Select Category Name',
        'options'        => 'categories',
        'default_option' => 'Select a tag'
      );
      echo dustrial_add_element( $post_cat_field, $post_cat_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $post_per_page_value = esc_attr( $instance['post_per_page'] );
      $post_per_page_field = array(
        'id'    => $this->get_field_name('post_per_page'),
        'name'  => $this->get_field_name('post_per_page'),
        'type'  => 'text',
        'title' => 'Post Per Page',
        'info'  => 'How post display here',
      );
      echo dustrial_add_element( $post_per_page_field, $post_per_page_value );


      /* - Recent post widget v2.
      /* ------------------------------------------------- */
      $popular_post_value = esc_attr( $instance['popular_post'] );
      $popular_post_field = array(
        'id'    => $this->get_field_name('popular_post'),
        'name'  => $this->get_field_name('popular_post'),
        'type'  => 'checkbox',
        'title' => 'Popular Post ?, Yes, Please do it.',
      );
      echo dustrial_add_element( $popular_post_field, $popular_post_value );

    }
  }
}

if ( ! function_exists( 'dustrial_recent_post_widget_init' ) ) {
  function dustrial_recent_post_widget_init() {
    register_widget( 'DUSTRIAL_recent_post_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_recent_post_widget_init', 3 );
}



/*<><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/
/* - Sidebar Widget
/*<><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><><>*/



/*============================================================================================================================*/
/* - Market Post Widget Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_market_post_Widget' ) ) {
  class DUSTRIAL_market_post_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'dustrial_market_rp_widget',
        'description' => 'Service Recent Post Widget.'
      );

      parent::__construct( 'market_post_widget', 'A::4 Service Recent Post', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;
        if (!empty($instance['title'])) {
          $title = $instance['title'];
        } else {
          $title = '';
        } if (!empty($instance['markets_post_cat'])) {
          $markets_post_cat = $instance['markets_post_cat'];
        } else {
          $markets_post_cat = '';
        } if (!empty($instance['post_per_page'])) {
          $post_no = $instance['post_per_page'];
        } else {
          $post_no = '';
        }

        global $post;
        setup_postdata( $post );
        $current_post = get_the_ID();

      ?>
      <div id="tab-list-block">
        <div class="market-list-group">
              <ul>
          <?php
          if (!empty($markets_post_cat)) {
            $args = array(
              'post_type'      => 'service',
              'post_status'    => 'publish',
              'posts_per_page' => $post_no,
              'orderby'        => 'date',
              'tax_query' => array(
                array(
                  'taxonomy' => 'service_cat',
                  'field' => 'id',
                  'terms' => $markets_post_cat
                )
              ),
            );
          } else {
            $args = array(
              'post_type'      => 'service',
              'post_status'    => 'publish',
              'posts_per_page' => $post_no,
              'orderby'        => 'date',
              'taxonomy' => 'service_cat',
            );
          }

            $markets_query = new WP_Query( $args );
            $i = 0;
            while($markets_query->have_posts()) : $markets_query->the_post();
            $i++;

            if ($current_post === get_the_ID()) {
             $active = 'active';
            } else {
             $active = '';             
            }
          ?>
         
          <li><a class="<?php echo esc_attr( $active ); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
             
          <?php endwhile; ?>
            </ul>
        </div>
      </div>

    <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['markets_post_cat']    = $new_instance['markets_post_cat'];
      $instance['post_per_page']    = $new_instance['post_per_page'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Field Defaults
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'Recent Post',
        'post_per_page' => '3',
        'markets_post_cat' => 'markets',
      ));


      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo dustrial_add_element( $text_field, $text_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $markets_post_cat_value = esc_attr( $instance['markets_post_cat'] );
      $markets_post_cat_field = array(
        'id'    => $this->get_field_name('markets_post_cat'),
        'name'  => $this->get_field_name('markets_post_cat'),
        'type'           => 'select',
        'title'          => 'Select Category Name',
        'options'        => 'categories',
        'query_args'     => array(
          'post_type'  => 'service',
          'taxonomy'   => 'service_cat',
        ),
        'default_option' => 'Select a Cat'
      );
      echo dustrial_add_element( $markets_post_cat_field, $markets_post_cat_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $post_per_page_value = esc_attr( $instance['post_per_page'] );
      $post_per_page_field = array(
        'id'    => $this->get_field_name('post_per_page'),
        'name'  => $this->get_field_name('post_per_page'),
        'type'  => 'text',
        'title' => 'Post Per Page',
        'info'  => 'How post display here',
      );
      echo dustrial_add_element( $post_per_page_field, $post_per_page_value );

    }
  }
}

if ( ! function_exists( 'dustrial_market_post_widget_init' ) ) {
  function dustrial_market_post_widget_init() {
    register_widget( 'DUSTRIAL_market_post_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_market_post_widget_init', 4 );
}




/*============================================================================================================================*/
/* - Market download button widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_download_btn_Widget' ) ) {
  class DUSTRIAL_download_btn_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'dustrial_market_rp_widget',
        'description' => 'Download button widget.'
      );

      parent::__construct( 'download_btn_widget', 'A::5 Download button', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;
        if (!empty($instance['button_text'])) {
          $button_text = $instance['button_text'];
        } else {
          $button_text = '';
        } if (!empty($instance['button_link'])) {
          $button_link = $instance['button_link'];
        } else {
          $button_link = '';
        } if (!empty($instance['button_icon'])) {
          $button_icon = $instance['button_icon'];
        } else {
          $button_icon = '';
        }

      ?>

        <div id="brochures-block">
          <div class="list-group mt-3 mb-3 mt-lg-5 mb-lg-5 d-flex ">
              <a class="list-group-item list-group-item-action download-brochures d-flex justify-content-between" href="<?php echo esc_url( $button_link ); ?>">
                <span><?php echo esc_html( $button_text ); ?></span>
                <i class="<?php echo esc_attr( $button_icon ); ?>"></i>
              </a>
            
          </div> <!-- End list group -->
        </div>

    <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance                = $old_instance;
      $instance['button_text'] = $new_instance['button_text'];
      $instance['button_link'] = $new_instance['button_link'];
      $instance['button_icon'] = $new_instance['button_icon'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Field Defaults
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'button_text' => 'Download Brochures',
        'button_link' => '#',
        'button_icon' => 'flaticon-handout',
      ));


      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['button_text'] );
      $text_field = array(
        'id'    => $this->get_field_name('button_text'),
        'name'  => $this->get_field_name('button_text'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo dustrial_add_element( $text_field, $text_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $button_link_value = esc_attr( $instance['button_link'] );
      $button_link_field = array(
        'id'    => $this->get_field_name('button_link'),
        'name'  => $this->get_field_name('button_link'),
        'type'  => 'text',
        'title' => 'Button link',
      );
      echo dustrial_add_element( $button_link_field, $button_link_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $button_icon_value = esc_attr( $instance['button_icon'] );
      $button_icon_field = array(
        'id'    => $this->get_field_name('button_icon'),
        'name'  => $this->get_field_name('button_icon'),
        'type'  => 'icon',
        'title' => 'Button icon',
        'info'  => 'Please select your button icon',
      );
      echo dustrial_add_element( $button_icon_field, $button_icon_value );

    }
  }
}

if ( ! function_exists( 'dustrial_download_btn_widget_init' ) ) {
  function dustrial_download_btn_widget_init() {
    register_widget( 'DUSTRIAL_download_btn_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_download_btn_widget_init', 5 );
}




/*============================================================================================================================*/
/* - Contact Info Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_contact_info_Widget' ) ) {

    //Footer Newsletter Widget
    class DUSTRIAL_contact_info_Widget extends WP_Widget {

        /*=====================================================
        // = Widget Register
        /*=====================================================*/
        function __construct() {

          $widget_ops     = array(
            'classname'   => 'dustrial_contact_info_widget',
            'description' => 'Contact Info List Widget.'
          );
          parent::__construct( 'contact_info_widget', 'A::6 Contact Info List Widget', $widget_ops );

        }

        /*=====================================================
        // = Front-end Setting
        /*=====================================================*/
        function widget( $args, $instance ) {

          extract( $args );
          echo $before_widget; ?>

            <?php 
              $title = $instance['title'];
              $desc = $instance['desc'];
              $contact_info1_title = $instance['contact_info1_title'];
              $contact_info1_text  = $instance['contact_info1_text'];
              $contact_info1_icon  = $instance['contact_info1_icon'];

              $contact_info2_title = $instance['contact_info2_title'];
              $contact_info2_text  = $instance['contact_info2_text'];
              $contact_info2_icon  = $instance['contact_info2_icon'];

            ?>

            <div class="block">
              <div class="contact-service">
                <h3><?php echo esc_html( $title ); ?></h3>
                <p> <?php echo esc_html( $desc ); ?> </p>
                <?php if (!empty($contact_info1_title) || !empty($contact_info1_text)) { ?>
                <p><span class="font-weight-bold"><i class="<?php echo esc_attr( $contact_info1_icon ); ?> fw-size" aria-hidden="true"></i> <?php echo esc_html( $contact_info1_title ); ?></span> <?php echo esc_html( $contact_info1_text ); ?></p>
                 <?php } if (!empty($contact_info2_title) || !empty($contact_info2_text)) { ?>
                <p class="mb-0"><span class="font-weight-bold"><i class="<?php echo esc_attr( $contact_info2_icon ); ?> fw-size" aria-hidden="true"></i> <?php echo esc_html( $contact_info2_title ); ?></span> <?php echo esc_html( $contact_info2_text ); ?></p>
                <?php } ?>
              </div>
            </div>

          <?php echo $after_widget;

        }
        /*=====================================================
        // = Widget Update Setting
        /*=====================================================*/
        function update( $new_instance, $old_instance ) {

          $instance          = $old_instance;

          $instance['title'] = $new_instance['title'];
          $instance['desc']  = $new_instance['desc'];

          $instance['contact_info1_title'] = $new_instance['contact_info1_title'];
          $instance['contact_info1_text']  = $new_instance['contact_info1_text'];
          $instance['contact_info1_icon']  = $new_instance['contact_info1_icon'];

          $instance['contact_info2_title'] = $new_instance['contact_info2_title'];
          $instance['contact_info2_text']  = $new_instance['contact_info2_text'];
          $instance['contact_info2_icon']  = $new_instance['contact_info2_icon'];

          return $instance;

        }

        /*=====================================================
        // = Widget Form Setting
        /*=====================================================*/
        function form( $instance ) {

          /* -------------------------------------------------
          /* - Defaults Value Setting Fields
          /*------------------------------------------------- */
          $instance   = wp_parse_args( $instance, array(

            'title'   => 'Contact Our Team',
            'desc'    => 'Please feel free to contact us. We will get back to you with 1-2 business days. Or just call us now.',

            'contact_info1_title' => 'Call Us:',
            'contact_info1_text' => '+(321) 45 678 901 & 902',
            'contact_info1_icon' => 'fa fa-phone',

            'contact_info2_title' => 'Mail Us:',
            'contact_info2_text' => 'example@domain.com',
            'contact_info2_icon' => 'fa fa-envelope-o',

          ));

          /* -------------------------------------------------
          /* - Widget Title Setting
          /*------------------------------------------------- */
          $text_value = esc_attr( $instance['title'] );
          $text_field = array(
            'id'    => $this->get_field_name('title'),
            'name'  => $this->get_field_name('title'),
            'type'  => 'text',
            'title' => 'Title',
          );
          echo dustrial_add_element( $text_field, $text_value );


          /* -------------------------------------------------
          /* - Widget Title Setting
          /*------------------------------------------------- */
          $text_value = esc_attr( $instance['desc'] );
          $text_field = array(
            'id'    => $this->get_field_name('desc'),
            'name'  => $this->get_field_name('desc'),
            'type'  => 'textarea',
            'title' => 'Description',
          );
          echo dustrial_add_element( $text_field, $text_value );

         
          /* -------------------------------------------------
          /* - All Widget Fields Seiitng
          /*------------------------------------------------- */

          /* - Contact Info 1 Title
          /* ------------------------------------------------- */
          $contact_info1_title_value = esc_attr( $instance['contact_info1_title'] );
          $contact_info1_title_field = array(
            'id'    => $this->get_field_name('contact_info1_title'),
            'name'  => $this->get_field_name('contact_info1_title'),
            'type'  => 'text',
            'title' => 'Contact Info 1 Title',
          );
          echo dustrial_add_element( $contact_info1_title_field, $contact_info1_title_value );

          /* - Contact Info 1 Text
          /* ------------------------------------------------- */
          $contact_info1_text_value = esc_attr( $instance['contact_info1_text'] );
          $contact_info1_text_field = array(
            'id'    => $this->get_field_name('contact_info1_text'),
            'name'  => $this->get_field_name('contact_info1_text'),
            'type'  => 'textarea',
            'title' => 'Contact Info 1 Text',
          );
          echo dustrial_add_element( $contact_info1_text_field, $contact_info1_text_value );

          /* - Contact Info 1 Icon
          /* ------------------------------------------------- */
          $contact_info1_icon_value = esc_attr( $instance['contact_info1_icon'] );
          $contact_info1_icon_field = array(
            'id'    => $this->get_field_name('contact_info1_icon'),
            'name'  => $this->get_field_name('contact_info1_icon'),
            'type'  => 'icon',
            'title' => 'Contact Info 1 Icon',
          );
          echo dustrial_add_element( $contact_info1_icon_field, $contact_info1_icon_value );



          /* - Contact Info 2 Title
          /* ------------------------------------------------- */
          $contact_info2_title_value = esc_attr( $instance['contact_info2_title'] );
          $contact_info2_title_field = array(
            'id'    => $this->get_field_name('contact_info2_title'),
            'name'  => $this->get_field_name('contact_info2_title'),
            'type'  => 'text',
            'title' => 'Contact Info 2 Title',
          );
          echo dustrial_add_element( $contact_info2_title_field, $contact_info2_title_value );

          /* - Contact Info 2 Text
          /* ------------------------------------------------- */
          $contact_info2_text_value = esc_attr( $instance['contact_info2_text'] );
          $contact_info2_text_field = array(
            'id'    => $this->get_field_name('contact_info2_text'),
            'name'  => $this->get_field_name('contact_info2_text'),
            'type'  => 'textarea',
            'title' => 'Contact Info 2 Text',
          );
          echo dustrial_add_element( $contact_info2_text_field, $contact_info2_text_value );

          /* - Contact Info 2 Icon
          /* ------------------------------------------------- */
          $contact_info2_icon_value = esc_attr( $instance['contact_info2_icon'] );
          $contact_info2_icon_field = array(
            'id'    => $this->get_field_name('contact_info2_icon'),
            'name'  => $this->get_field_name('contact_info2_icon'),
            'type'  => 'icon',
            'title' => 'Contact Info 2 Icon',
          );
          echo dustrial_add_element( $contact_info2_icon_field, $contact_info2_icon_value );


        }
    }
    // End Of Footer About Widget
}

if ( ! function_exists( 'dustrial_contact_info_widget_init' ) ) {
  function dustrial_contact_info_widget_init() {
    register_widget( 'DUSTRIAL_contact_info_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_contact_info_widget_init', 6 );
}



/*============================================================================================================================*/
/* - Project Post Widget Widget
/*============================================================================================================================*/ 
if( ! class_exists( 'DUSTRIAL_project_post_Widget' ) ) {
  class DUSTRIAL_project_post_Widget extends WP_Widget {

    function __construct() {

      $widget_ops     = array(
        'classname'   => 'dustrial_project_rp_widget',
        'description' => 'Project Recent Post Widget.'
      );

      parent::__construct( 'project_post_widget', 'A::7 Project Recent Post', $widget_ops );

    }

    function widget( $args, $instance ) {

      extract( $args );

      echo $before_widget;
        if (!empty($instance['title'])) {
          $title = $instance['title'];
        } else {
          $title = '';
        } if (!empty($instance['projects_post_cat'])) {
          $projects_post_cat = $instance['projects_post_cat'];
        } else {
          $projects_post_cat = '';
        } if (!empty($instance['post_per_page'])) {
          $post_no = $instance['post_per_page'];
        } else {
          $post_no = '';
        }

        global $post;
        setup_postdata( $post );
        $current_post = get_the_ID();

      ?>
      <div id="tab-list-block">
        <div class="market-list-group">
          <ul>
            <?php
              if (!empty($projects_post_cat)) {
                $args = array(
                  'post_type'      => 'our_project',
                  'post_status'    => 'publish',
                  'posts_per_page' => $post_no,
                  'orderby'        => 'date',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'our_project_tax',
                      'field' => 'id',
                      'terms' => $projects_post_cat
                    )
                  ),
                );
              } else {
                $args = array(
                  'post_type'      => 'our_project',
                  'post_status'    => 'publish',
                  'posts_per_page' => $post_no,
                  'orderby'        => 'date',
                  'taxonomy' => 'our_project_tax',
                );
              }

              $projects_query = new WP_Query( $args );
              $i = 0;
              while($projects_query->have_posts()) : $projects_query->the_post();
              $i++;

              if ($current_post === get_the_ID()) {
               $active = 'active';
              } else {
               $active = '';             
              }
            ?>
             
              <li><a class="<?php echo esc_attr( $active ); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                 
              <?php endwhile; ?>
          </ul>
        </div>
      </div>

    <?php echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

      $instance            = $old_instance;
      $instance['title']   = $new_instance['title'];
      $instance['projects_post_cat']    = $new_instance['projects_post_cat'];
      $instance['post_per_page']    = $new_instance['post_per_page'];
      return $instance;

    }

    function form( $instance ) {

      //
      // Field Defaults
      // -------------------------------------------------
      $instance       = wp_parse_args( $instance, array(
        'title'       => 'Recent Post',
        'post_per_page' => '3',
        'projects_post_cat' => 'our_project_tax',
      ));


      //
      // Title Field
      // -------------------------------------------------
      $text_value = esc_attr( $instance['title'] );
      $text_field = array(
        'id'    => $this->get_field_name('title'),
        'name'  => $this->get_field_name('title'),
        'type'  => 'text',
        'title' => 'Title',
      );
      echo dustrial_add_element( $text_field, $text_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $projects_post_cat_value = esc_attr( $instance['projects_post_cat'] );
      $projects_post_cat_field = array(
        'id'    => $this->get_field_name('projects_post_cat'),
        'name'  => $this->get_field_name('projects_post_cat'),
        'type'           => 'select',
        'title'          => 'Select Category Name',
        'options'        => 'categories',
        'query_args'     => array(
          'post_type'  => 'our_project',
          'taxonomy'   => 'our_project_tax',
        ),
        'default_option' => 'Select a Cat'
      );
      echo dustrial_add_element( $projects_post_cat_field, $projects_post_cat_value );

      //
      // Post Per Page
      // -------------------------------------------------
      $post_per_page_value = esc_attr( $instance['post_per_page'] );
      $post_per_page_field = array(
        'id'    => $this->get_field_name('post_per_page'),
        'name'  => $this->get_field_name('post_per_page'),
        'type'  => 'text',
        'title' => 'Post Per Page',
        'info'  => 'How post display here',
      );
      echo dustrial_add_element( $post_per_page_field, $post_per_page_value );

    }
  }
}

if ( ! function_exists( 'dustrial_project_post_widget_init' ) ) {
  function dustrial_project_post_widget_init() {
    register_widget( 'DUSTRIAL_project_post_Widget' );
  }
  add_action( 'widgets_init', 'dustrial_project_post_widget_init', 4 );
}



