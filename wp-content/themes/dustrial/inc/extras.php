<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package dustrial
 */
add_filter( 'body_class', 'dustrial_body_classes' );
add_filter('get_search_form', 'dustrial_search_form');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function dustrial_body_classes( $classes ) {
    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }
    return $classes;
}


function dustrial_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() ) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo( 'name', 'display' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) ) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
        $title = "$title $sep " . sprintf( esc_html__( 'Page %s', 'dustrial' ), max( $paged, $page ) );
    }

    return $title;
}
add_filter( 'wp_title', 'dustrial_wp_title', 10, 2 );


/**  comments from call back function.
--------------------------------------------------------------------------------------------------- */

if(!function_exists('dustrial_comment')):

    function dustrial_comment($comment, $args, $depth) {
        
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' :
            // Display trackbacks differently than normal comments.
        ?>
        <li <?php comment_class(); ?> id="submited-comment">

            <p><?php esc_html_e( 'Pingback:', 'dustrial' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'dustrial' ), '<span class="edit-link">', '</span>' ); ?></p>
            <?php
            break;
            default :

            global $post;
            ?>

            <li <?php comment_class(); ?>>

                <div class="bs-example" data-example-id="media-list"> 
                    <ul class="comments media-list">
                        <li class="comment-box mb-30 clearfix" id="comment-<?php comment_ID(); ?>">
                            <article>
                                <div class="bd-comment-box">
                                    <div class="img">
                                        <?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
                                    </div>
                                    <div class="content">
                                        <h2 class="name"><?php comment_author(); ?> 
                                            <?php comment_reply_link( array_merge( $args, array( 'reply_text' => '<i class="ion-ios-undo-outline"></i>'.esc_html__( 'Reply', 'dustrial'), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                        </h2>
                                        <span class="ago"><?php echo (get_comment_date() . esc_html__( ' at ', 'dustrial' ) .get_comment_time()); ?></span>
                                        <div class="text"><?php comment_text(); ?></div>
                                    </div>
                                </div>
                            </article>
                        </li>
                    </ul>
                </div>
            <?php
            break;
            endswitch; 
    }
    endif;

/*------------------------------------------------------------------------------------------------------------------*/
/*  search
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_search_form($form) {

    /**
     * Search form customization.
     *
     * @link http://codex.wordpress.org/Function_Reference/get_search_form
     * @since 1.0.0
     */
    $form = '<div class="ws-input"><form role="search" method="get" action="' .esc_url( home_url('/') ) . '">
                <input type="search" placeholder="'.esc_attr__( 'Search ...', 'dustrial' ).'" name="s">
                <button><i class="fa fa-search"></i></button>
            </form></div>';
    return $form;
}


/*------------------------------------------------------------------------------------------------------------------*/
/* Category List count wrap by span
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_cat_count_span($links) {        
    $links = str_replace('(', '<span class="pull-right">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('wp_list_categories', 'dustrial_cat_count_span');


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Social Buttons
/*------------------------------------------------------------------------------------------------------------------*/

add_action('dustrial_social_media', 'dustrial_social_media_btn');
function dustrial_social_media_btn() {
    if( function_exists( 'dustrial_framework_init' ) ) {
        $social_btns = dustrial_get_option( 'dustrial_social_media' );
        if (!empty($social_btns)) { ?>
        <ul class="htr-social">
            <?php
            if (is_array($social_btns)) {
                foreach ($social_btns as $key => $value) { ?>
                    <li><a href="<?php echo esc_url($value['button_link']); ?>"><i class="<?php echo esc_attr($value['icon_class']); ?>"></i></a></li>
                <?php
                } ?>
                <?php
            } ?>
        </ul>
        <?php 
        }
    }
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Excerpt
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Add site icon.
/*------------------------------------------------------------------------------------------------------------------*/ 
function dustrial_site_icon_header() {
    if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {
        if( function_exists( 'dustrial_framework_init' ) ) {
            $site_icon = dustrial_get_option('dustrial_site_icon');
            $attachment = wp_get_attachment_image_src( $site_icon, 'full' );
            $site_fav_icon    = ($attachment) ? $attachment[0] : $site_icon;
        ?>
            <link rel="shortcut icon" type="image/png" href="<?php echo esc_url( $site_fav_icon );?>">
        <?php } else { ?>
            
        <?php
        } 
    }
}
add_action( 'wp_head', 'dustrial_site_icon_header' );
add_action( 'admin_head', 'dustrial_site_icon_header' );


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Breadcrumb
/*------------------------------------------------------------------------------------------------------------------*/

add_action('dustrial_breadcrum', 'dustrial_breadcrum_set');
function dustrial_breadcrum_set() {

    if ( has_header_image() ) {
        $bg_img = get_header_image();

        $header_v = 'header1';
        $page_404_breadcrumb_title  = esc_html__( '404 Error', 'dustrial' );
        $blog_page_breadcrumb_title = esc_html__( 'Blog Posts', 'dustrial' );
        $shop_page_breadcrumb_title = esc_html__( 'Our Products', 'dustrial' );
        $woo_bg_img = DUSTRIAL_IMG . 'breadcumb-bg.jpg';
        $dustrial_breadcrumb_meta_switch = '1';

    } elseif(function_exists( 'dustrial_framework_init' ) ) {
        $blog_page_breadcrumb_title = dustrial_get_option('blog_page_breadcrumb_title');
        $shop_page_breadcrumb_title = dustrial_get_option('shop_page_breadcrumb_title');
        $page_404_breadcrumb_title  = dustrial_get_option('404_page_name');
        $bg_img_id = dustrial_get_option('breatcrumb_bg_img');
        $attachment = wp_get_attachment_image_src( $bg_img_id, 'full' );
        $bg_img    = ($attachment) ? $attachment[0] : $bg_img_id;

        $woo_bg_img_id = dustrial_get_option('woo_breatcrumb_bg_img');
        $woo_attachment = wp_get_attachment_image_src( $woo_bg_img_id, 'full' );
        $woo_bg_img    = ($woo_attachment) ? $woo_attachment[0] : $woo_bg_img_id;

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
        $page_404_breadcrumb_title  = esc_html__( '404 Error', 'dustrial' );
        $blog_page_breadcrumb_title = esc_html__( 'Blog Posts', 'dustrial' );
        $shop_page_breadcrumb_title = esc_html__( 'Our Products', 'dustrial' );
        $bg_img = DUSTRIAL_IMG . 'breadcumb-bg.jpg';
        $woo_bg_img = DUSTRIAL_IMG . 'breadcumb-bg.jpg';
        $dustrial_breadcrumb_meta_switch = '1';
    }


    $page_breadcrumb_data = get_post_meta( get_the_ID(), '_custom_page_breadcrumb_options', true );
    if (!empty($page_breadcrumb_data['page_breadcrumb_bg_img'])) {
        $bg_img_id = $page_breadcrumb_data['page_breadcrumb_bg_img'];
        $attachment = wp_get_attachment_image_src( $bg_img_id, 'full' );
        $bg_img    = ($attachment) ? $attachment[0] : $bg_img_id;
    } else {
        $bg_img = $bg_img;
    }
    if (!empty($page_breadcrumb_data['page_breadcrumb_title'])) {
        $page_bread_title = $page_breadcrumb_data['page_breadcrumb_title'];
    } else {
        $page_bread_title = '';
    }

    if ( is_home() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5 class="page_tittle activebreadcrumbColor"><?php echo esc_html($blog_page_breadcrumb_title); ?></h5>
                <?php if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Home', 'dustrial') ?><i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </a>
                    <span class="activeColor"><?php dustrial_meta_breadcrumbs(); ?></span>
                </div>
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->

    <?php } elseif ( is_single() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5 class="page_tittle activebreadcrumbColor"><?php echo get_the_title(); ?></h5>
                <?php if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <?php dustrial_meta_breadcrumbs(); ?>
                </div> 
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->

    <?php } elseif ( is_page() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <?php if (!empty($page_bread_title)) { ?>
                    <h5 class="page_tittle activebreadcrumbColor"><?php echo esc_html( $page_bread_title ); ?></h5>
                <?php } else { ?>
                <h5 class="page_tittle activebreadcrumbColor"><?php echo get_the_title(); ?></h5>
                <?php } if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Home', 'dustrial') ?><i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </a>
                    <span class="activeColor"><?php echo get_the_title(); ?></span>
                </div>
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->

    <?php } elseif ( is_archive() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5 class="page_tittle activebreadcrumbColor"><?php dustrial_archive_page_title(); ?></h5>
                <?php if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <div class="activeColor"><?php dustrial_meta_breadcrumbs(); ?></div>
                </div>
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->


    <?php } elseif ( is_search() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5 class="page_tittle activebreadcrumbColor"><?php printf( esc_html__( 'Search for: %s', 'dustrial' ), get_search_query() ); ?></h5>
                <?php if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <?php esc_html_e( 'Home', 'dustrial') ?><i class="fa fa-angle-right pl-2" aria-hidden="true"></i>
                    </a>
                    <span class="activeColor"><?php printf( esc_html__( 'Search Results for: %s', 'dustrial' ), get_search_query() ); ?></span>
                </div>
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->

    <?php } elseif ( is_404() ) { ?>

    <div class="page_title breadcrumb-overlay <?php echo esc_attr( $header_v ); ?>" style="background-image: url(<?php echo esc_url($bg_img); ?>);">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5 class="page_tittle activebreadcrumbColor"><?php echo esc_html( $page_404_breadcrumb_title ); ?></h5>
                <?php if (!empty($dustrial_breadcrumb_meta_switch)) { ?>
                <!-- Breadcrumb -->
                <div class="bread_crumb text-lg-left">
                    <div class="activeColor"><?php dustrial_meta_breadcrumbs(); ?></div>
                </div>
                <!-- End Breadcrumb -->
                <?php } ?>
            </div>
          </div>
        </div>
    </div>
    <!-- breadcumb-area-end -->

    <?php } 
}



/*------------------------------------------------------------------------------------------------------------------*/
/*  Header Style Load
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action('dustrial_header_style', 'dustrial_header_style_load');

function dustrial_header_style_load() {

    $dustrial_header_settings = get_post_meta( get_the_ID(), '_custom_page_header_options', true );

    if(!empty($dustrial_header_settings['header_style'])) {
        if($dustrial_header_settings['header_style'] == 'style1') {
            get_template_part('headers/header', 'default' );
        } elseif ($dustrial_header_settings['header_style'] == 'style2')  {
            get_template_part('headers/header', 'style2' );
        } elseif ($dustrial_header_settings['header_style'] == 'style3')  {
            get_template_part('headers/header', 'style3' );
        } else {
            get_template_part('headers/header', 'default' );
        }
    } elseif(function_exists( 'dustrial_framework_init' ) ) {
        $default_header_style = dustrial_get_option('default_header_style');
        if($default_header_style == 'style1') {
            get_template_part('headers/header', 'default' );
        } elseif ($default_header_style == 'style2')  {
            get_template_part('headers/header', 'style2' );
        } elseif ($default_header_style == 'style3')  {
            get_template_part('headers/header', 'style3' );
        } else {
            get_template_part('headers/header', 'default' );
        }

    } else {
        get_template_part('headers/header', 'default' );
    }
}

/*------------------------------------------------------------------------------------------------------------------*/
/*  Footer Style Load
/*------------------------------------------------------------------------------------------------------------------*/

add_action('dustrial_footer_style', 'dustrial_footer_style_load');

function dustrial_footer_style_load() {

$dustrial_footer_settings = get_post_meta( get_the_ID(), '_custom_page_footer_options', true );
    if(!empty($dustrial_footer_settings['footer_style'])) {
        if($dustrial_footer_settings['footer_style'] == 'style1') {
            get_template_part('footers/footer', 'default' );
        } elseif ($dustrial_footer_settings['footer_style'] == 'style2')  {
            get_template_part('footers/footer', 'style2' );
        } else {
            get_template_part('footers/footer', 'default' );
        }
    } elseif(function_exists( 'dustrial_framework_init' ) ) {
        $default_footer_style = dustrial_get_option('default_footer_style');
        if($default_footer_style == 'style1') {
            get_template_part('footers/footer', 'default' );
        } elseif ($default_footer_style == 'style2')  {
            get_template_part('footers/footer', 'style2' );
        } else {
            get_template_part('footers/footer', 'default' );
        }

    } else {
        get_template_part('footers/footer', 'default' );
    }

}


/*------------------------------------------------------------------------------------------------------------------*/
/*  WooCommerce settings
/*------------------------------------------------------------------------------------------------------------------*/


/*  Products columns change
/-------------------------------------------------------------*/
function dustrial_wc_product_class( $class = '', $product_id = null ) {

    if( function_exists( 'dustrial_framework_init' ) ) {
        $product_col_layout       = dustrial_get_option('product_col_layout');
        $related_product_col_layout = dustrial_get_option('related_product_col_layout');

        if (!empty($product_col_layout)) {
            $col_layout = $product_col_layout ;
        } else {
            $col_layout = '4';
        }

        if (!empty($related_product_col_layout)) {
            $related_col_layout = $related_product_col_layout ;
        } else {
            $related_col_layout = '3';
        }
    } else {
      $col_layout = '4';
      $related_col_layout = '4';
    }

    if ( is_single() ){
        $bootstrap_columns = 'col-md-'. $related_col_layout . ' ' . 'col-sm-6 product-item';
    } else {
        $bootstrap_columns = 'dstcols-'. $col_layout . ' ' . ' dstcols product-item';
    }

    echo 'class="' . $bootstrap_columns . ' ' . esc_attr( join( ' ', wc_get_product_class( $class, $product_id )  ) ) . '"';
}


/*  Products per page
/-------------------------------------------------------------*/
add_filter( 'loop_shop_per_page', 'dustrial_loop_shop_per_page', 20 );

function dustrial_loop_shop_per_page( $products ) {
    // Return the number of products you wanna show per page.
    if( function_exists( 'dustrial_framework_init' ) ) {
        $shop_posts_per_page = dustrial_get_option('shop_posts_per_page');
        if (!empty($shop_posts_per_page)) {
           $shop_posts_per_page = $shop_posts_per_page;
        } else {
            $shop_posts_per_page = '8';
        }
    } else {
      $shop_posts_per_page = '8';
    }
    $products = $shop_posts_per_page;
    return $products;
}

/*  Products details page tab init
/-------------------------------------------------------------*/
function dustrial_after_single_product_tabs() { 
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
    */
    echo woocommerce_output_product_data_tabs();
}; 
add_action( 'product_details_tab', 'dustrial_after_single_product_tabs' ); 


/*  Products details page related post init
/-------------------------------------------------------------*/
function dustrial_after_single_related_product_tabs() { 
    /**
     * Hook: woocommerce_after_single_product_summary.
     *
     * @hooked woocommerce_output_product_data_tabs - 10
     * @hooked woocommerce_upsell_display - 15
     * @hooked woocommerce_output_related_products - 20
    */
    echo woocommerce_output_related_products();
}; 
add_action( 'product_details_related_post', 'dustrial_after_single_related_product_tabs' ); 


/*  Change number of related products on product page
/-------------------------------------------------------------*/

add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
  function jk_related_products_args( $args ) {
    if( function_exists( 'dustrial_framework_init' ) ) {
        $related_products_per_page = dustrial_get_option('related_products_per_page');
        if (!empty($related_products_per_page)) {
           $related_products_per_page = $related_products_per_page;
        } else {
            $related_products_per_page = '4';
        }
    } else {
      $related_products_per_page = '4';
    }
    $args['posts_per_page'] = $related_products_per_page; // Related products
    return $args;
}


/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Nav Walker
/*------------------------------------------------------------------------------------------------------------------*/ 

class Dustrial_navwalker extends Walker_Nav_Menu {
    /**
     * @see Walker::start_lvl()
     * @since 1.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of page. Used for padding.
     */
    private $Dustrial_megamenu_status = "";
    public function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat( "\t", $depth );
        if ($depth == 0 && $this->Dustrial_megamenu_status == "enabled") {
            $output .= "\n$indent\n<ul class=\"mormal-menu\">\n";
        } elseif ($depth >= 1 && $this->Dustrial_megamenu_status == "enabled") {
            $output .= "\n$indent<ul>\n";
        } elseif ($depth == 0 && $this->Dustrial_megamenu_status != "enabled") {
            $output .= "\n$indent<ul class=\"sub-menu drop\">\n";
        } elseif ($depth >= 1 && $this->Dustrial_megamenu_status != "enabled") {
            $output .= "\n$indent<ul class=\"sub-menu sub-sub-menu third\">\n";
        } else {
            $output .= "\n$indent<ul>\n";
        }
    }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        /**
         * Dividers, Headers or Disabled
         * =============================
         * Determine whether the item is a Divider, Header, Disabled or regular
         * menu item. To prevent errors we use the strcasecmp() function to so a
         * comparison that is not case sensitive. The strcasecmp() function returns
         * a 0 if the strings are equal.
         */
        if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="divider">';
        } else if ( strcasecmp( $item->attr_title, 'dropdown-header') == 0 && $depth === 1 ) {
            $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr( $item->title );
        } else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
            $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
        } else {
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            $classes[] = 'menu-item-' . $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            if ( $args->has_children )
                $class_names .= ' submenu-area';
            if ( in_array( 'current-menu-item', $classes ) )
                $class_names .= ' active';
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
            $output .= $indent . '<li' . $id . $value . $class_names .'>';

            $atts = array();
            $atts['target'] = ! empty( $item->target )  ? $item->target : '';
            $atts['rel']    = ! empty( $item->xfn )     ? $item->xfn    : '';
            $atts['href']   = ! empty( $item->url )     ? $item->url    : '';

            // If item has_children add atts to a.
            if ( $args->has_children && $depth === 0 ) {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
                $atts['data-toggle']    = 'submenu-area';
                $atts['class']          = 'dropdown-toggle';
                $atts['aria-haspopup']  = 'true';
            } else {
                $atts['href'] = ! empty( $item->url ) ? $item->url : '';
            }


            $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
            $attributes = '';
            foreach ( $atts as $attr => $value ) {
                if ( ! empty( $value ) ) {
                    $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                }
            }

            $item_output = $args->before;

            
            /*
             * Glyphicons
             * ===========
             * Since the the menu item is NOT a Divider or Header we check the see
             * if there is a value in the attr_title property. If the attr_title
             * property is NOT null we apply it as the class name for the glyphicon.
             */
            if ( ! empty( $item->attr_title ) )
                $item_output .= '<a'. $attributes .'><span class="glyphicon ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
            else
                $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= ( $args->has_children && 0 === $depth ) ? '</a>' : '</a>';
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
    }
    /**
     * Traverse elements to create list from elements.
     *
     * Display one element if the element doesn't have any children otherwise,
     * display the element and its children. Will only traverse up to the max
     * depth and no ignore elements under that depth.
     *
     * This method shouldn't be called directly, use the walk() method instead.
     *
     * @see Walker::start_el()
     * @since 2.5.0
     *
     * @param object $element Data object
     * @param array $children_elements List of elements to continue traversing.
     * @param int $max_depth Max depth to traverse.
     * @param int $depth Depth of current element.
     * @param array $args
     * @param string $output Passed by reference. Used to append additional content.
     * @return null Null on failure with no changes to parameters.
     */
    public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;
        $id_field = $this->db_fields['id'];
        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }
    /**
     * Menu Fallback
     * =============
     * If this function is assigned to the wp_nav_menu's fallback_cb variable
     * and a manu has not been assigned to the theme location in the WordPress
     * menu manager the function with display nothing to a non-logged in user,
     * and will add a link to the WordPress menu manager if logged in as an admin.
     *
     * @param array $args passed from the wp_nav_menu function.
     *
     */
    public static function fallback( $args ) {
        if ( current_user_can( 'manage_options' ) ) {
            extract( $args );
            $fb_output = null;
            if ( $container ) {
                $fb_output = '<' . $container;
                if ( $container_id )
                    $fb_output .= ' id="' . $container_id . '"';
                if ( $container_class )
                    $fb_output .= ' class="' . $container_class . '"';
                $fb_output .= '>';
            }
            $fb_output .= '<ul';
            if ( $menu_id )
                $fb_output .= ' id="' . $menu_id . '"';
            if ( $menu_class )
                $fb_output .= ' class="' . $menu_class . '"';
            $fb_output .= '>';
            $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">'.esc_html__( 'Add a menu', 'dustrial' ).'</a></li>';
            $fb_output .= '</ul>';
            if ( $container )
                $fb_output .= '</' . $container . '>';
            echo wp_kses( $fb_output );
        }
    }
}