<?php
/*------------------------------------------------------------------------------------------------------------------*/
/*  Eventa Socials Share Buttons
/*------------------------------------------------------------------------------------------------------------------*/ 
add_action('dustrial_social_share_media', 'dustrial_social_share_media_btns');
function dustrial_social_share_media_btns() {
?>
<!-- Socials Share Button
============================================= -->

    <div class="col-md-6 p-0 mb-4 mb-xl-0">    
        <div class="block social-media d-flex justify-content-lg-right  justify-content-lg-end">

            <a class="ct-twitter d-flex justify-content-center align-items-center" href="http://twitter.com/home?status=Reading: <?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>

            <a class="ct-facebook d-flex justify-content-center align-items-center" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php the_title(); ?>" onclick="window.open(this.href); return false;"><i class="fa fa-facebook" aria-hidden="true"></i></a>

            <a class="ct-instagram d-flex justify-content-center align-items-center" href="https://plus.google.com/share?url=http://developers.google.com/%2B/" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,height=600,width=600');return false;"><i class="fa fa-google-plus" aria-hidden="true"></i></a>

        </div><!-- End block -->
    </div><!-- end Col -->

<?php }



/*------------------------------------------------------------------------------------------------------------------*/
/*  Dustrial Page Breadcrumb
/*------------------------------------------------------------------------------------------------------------------*/

function dustrial_breadcrumbs() {
    $delimiter = '/';
    $name = 'Home'; //text for the 'Home' link
    $currentBefore = '<span class="current">';
    $currentAfter = '</span>';

    if ( !is_home() && !is_front_page() || is_paged() ) {
        echo '<div id="crumbs">';
        global $post;
        $home = esc_url( home_url('/') );
        echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . ' ';

        if ( is_category() ) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $currentBefore . 'Archive by category &#39;';
        single_cat_title();
        echo '&#39;' . $currentAfter;

        } elseif ( is_day() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $currentBefore . get_the_time('d') . $currentAfter;

        } elseif ( is_month() ) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $currentBefore . get_the_time('F') . $currentAfter;

        } elseif ( is_year() ) {
        echo $currentBefore . get_the_time('Y') . $currentAfter;

        } elseif ( is_single() ) {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo $currentBefore;
        the_title();
        echo $currentAfter;

        } elseif ( is_page() && !$post->post_parent ) {
        echo $currentBefore;
        the_title();
        echo $currentAfter;

        } elseif ( is_page() && $post->post_parent ) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;

        } elseif ( is_search() ) {
        echo $currentBefore . 'Search results for &#39;' . get_search_query() . '&#39;' . $currentAfter;

        } elseif ( is_tag() ) {
        echo $currentBefore . 'Posts tagged &#39;';
        single_tag_title();
        echo '&#39;' . $currentAfter;

        } elseif ( is_author() ) {
        global $author;
        $userdata = get_userdata($author);
        echo $currentBefore . 'Articles posted by ' . $userdata->display_name . $currentAfter;

        } elseif ( is_404() ) {
            echo $currentBefore . 'Error 404' . $currentAfter;
        }
        
        if ( get_query_var('paged') ) {
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
        esc_html_e('Page', 'dustrial') . ' ' . get_query_var('paged');
        if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</div>';
    }

}



/*------------------------------------------------------------------------------------------------------------------*/
/* Set post views count using post meta
/*------------------------------------------------------------------------------------------------------------------*/ 

//Set the Post Custom Field in the WP dashboard as Name/Value pair 
function dustrial_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count;
     
    //If the the Post Custom Field value is NOT empty.
    } else {
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count;
        }
        //In all other cases return (count) Views
        else {
        return $count;
        }
    }
}


/*------------------------------------------------------------------------------------------------------------------*/
/* View column in dashboar post screen
/*------------------------------------------------------------------------------------------------------------------*/ 

function dustrial_get_PostViews($post_ID){
    $count_key = 'post_views_count';
    $count = get_post_meta($post_ID, $count_key, true);
 
    return $count;
}
 
function post_column_views($newcolumn){
    $newcolumn['post_views'] = __('Views');
    return $newcolumn;
}
add_filter('manage_posts_columns', 'post_column_views');

function post_custom_column_views($column_name, $id){
     
    if($column_name === 'post_views'){
        echo dustrial_get_PostViews(get_the_ID());
    }
}
add_action('manage_posts_custom_column', 'post_custom_column_views',10,2);


/*------------------------------------------------------------------------------------------------------------------*/
/*  Scroll to code
/*------------------------------------------------------------------------------------------------------------------*/
function dustrial_scroll_to_top() {  ?>
<!-- scroll-to-top -->
<div class="scroll-to-top">
    <i class="fa fa-angle-double-up" aria-hidden="true"></i>
</div>
<?php 
}
add_action('dustrial_scrollup', 'dustrial_scroll_to_top');



/*------------------------------------------------------------------------------------------------------------------*/
/*  W3C validator passing code
/*------------------------------------------------------------------------------------------------------------------*/
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( '<script type="text/javascript">', "<script type='text/javascript'>" ), '<script>', $buffer );
        return $buffer;
    });
});
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer = str_replace( array( "<script type='text/javascript' src" ), '<script src', $buffer );
        return $buffer;
    });
});
add_action( 'template_redirect', function(){
    ob_start( function( $buffer ){
        $buffer2 = str_replace( array( 'type="text/css"', "type='text/css'" ), '', $buffer );
        return $buffer2;
    });
});



/*------------------------------------------------------------------------------------------------------------------*/
/*  Inline Style code
/*------------------------------------------------------------------------------------------------------------------*/
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Enqueue Inline Styles */
if ( ! function_exists( 'dustrial_enqueue_inline_styles' ) ) {
  function dustrial_enqueue_inline_styles() {

    global $all_inline_styles;

    if ( ! empty( $all_inline_styles ) ) {
      echo '<style id="dustrial-inline-style">'. join( '', $all_inline_styles ) .'</style>';
    }

  }
  add_action( 'wp_footer', 'dustrial_enqueue_inline_styles' );
}


/*------------------------------------------------------------------------------------------------------------------*/
/* Remove VC animate css file
/*------------------------------------------------------------------------------------------------------------------*/ 

add_action( 'wp_enqueue_scripts', 'remove_default_stylesheet', 20 );
function remove_default_stylesheet() {
    wp_deregister_style( 'animate-css' );
}



function dustrialWooCart(){
    ob_start();
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        do_action( 'dustrial_woo_cart_icon' );
    }
    $woo_cart_out = ob_get_clean();
    
    $woo_cart_out = '<ul class="nav"><li class="menu-item dropdown mini-cart-items">'. $woo_cart_out ."</li></ul>";
    
    return $woo_cart_out;
}


/**
 * Add Cart icon and count to header if WC is active
 */
function dustrial_cart_items(){
    $empty_cart = '<li class="cart-item"><p class="text-center no-cart-items">'. apply_filters( 'dustrial_woo_mini_cart_empty', esc_html__('No items in cart', 'dustrial') ) .'</p></li>';
    if ( WC()->cart->get_cart_contents_count() == 0 ) return $empty_cart;
    ob_start();
    
    $shop_page_url = get_permalink( wc_get_page_id( 'cart' ) );
    $remove_loader = apply_filters('woo_mini_cart_loader', DUSTRIAL_PLG_URL . 'assets/imgs/cart-remove.gif');
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
        ?>
            <li class="cart-item">
            <?php
                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
                <div class="product-thumbnail">
                    <?php
                        $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                        if ( ! $product_permalink ) {
                            echo ( ''. $thumbnail );
                        } else {
                            printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
                        }
                    ?>
                    <span class="remove-item-overlay text-center"><img src="<?php echo esc_url($remove_loader); ?>" alt="<?php esc_attr_e('Loader..', 'dustrial') ?>" /></span>
                </div>
                <div class="product-name" data-title="<?php esc_attr_e( 'Product', 'dustrial' ); ?>">
                    <?php echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_title() ), $cart_item, $cart_item_key ); ?>
                    <p>
                        <span><?php echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); ?> &#9747; <?php echo esc_attr( $cart_item['quantity'] ); ?></span>
                    </p>
                </div>
                <div class="product-remove">
                    <?php
                        echo 
                        sprintf(
                            '<a href="%s" class="remove-cart-item" title="%s" data-product_id="%s" data-product_sku="%s" data-url="%s"><i class="fa fa-trash"></i></a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            __( 'Remove this item', 'dustrial' ),
                            esc_attr( $product_id ),
                            esc_attr( $_product->get_sku() ),
                            esc_url($remove_loader)
                        );
                    ?>
                </div>
            <?php
                }//if
            ?>
            </li>
            <?php
            }//foreach
        ?>
    <li class="text-center mini-view-cart"><a href="<?php echo esc_url( $shop_page_url ); ?>" title="<?php esc_attr_e('Cart', 'dustrial'); ?>"><?php esc_html_e('View Cart', 'dustrial'); ?></a></li>
    <?php 
    $out = ob_get_clean();
    return $out;
}


function dustrial_wc_cart_count() {
 
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
        $count = WC()->cart->cart_contents_count;
        $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
        ?>
        <a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dustrial' ); ?>"><i class="fa fa-cart-arrow-down"></i> <?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a>
        <ul class="dropdown-menu cart-dropdown-menu">
        <?php
            echo ( dustrial_cart_items() );
        ?>
        </ul>
        <?php
    }
}
add_action( 'dustrial_woo_cart_icon', 'dustrial_wc_cart_count' ); 

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function dustrial_header_add_to_cart_fragment( $fragments ) {
    ob_start();
    $count = WC()->cart->cart_contents_count;
    $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
    ?>
        <li class="menu-item dropdown mini-cart-items">
            <a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dustrial' ); ?>"><i class="fa fa-cart-arrow-down"></i> <?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a>
            <ul class="dropdown-menu cart-dropdown-menu">
            <?php
            echo ( dustrial_cart_items() );
            ?>
            </ul>
        </li>
    <?php
    $fragments['li.mini-cart-items'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'dustrial_header_add_to_cart_fragment' );


function dustrial_wc_cart_ajax() {
    $output = '';
    if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
        $count = WC()->cart->cart_contents_count;
        $cart_link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
        ob_start();
        ?>
        <a class="cart-contents" href="<?php echo esc_url( $cart_link ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'dustrial' ); ?>"><i class="fa fa-cart-arrow-down"></i> <?php if ( $count > 0 ) echo '(' . $count . ')'; ?></a>
        <ul class="dropdown-menu cart-dropdown-menu">
        <?php
            echo ( dustrial_cart_items() );
        ?>
        </ul>
        <?php
        $output = ob_get_clean();
    }
    return  $output;
}



add_action( 'wp_ajax_dustrial_product_remove', 'dustrial_product_remove' );
add_action( 'wp_ajax_nopriv_dustrial_product_remove', 'dustrial_product_remove' );
function dustrial_product_remove() {
    global $wpdb, $woocommerce;
    session_start();
    foreach ($woocommerce->cart->get_cart() as $cart_item_key => $cart_item){
        if($cart_item['product_id'] == $_POST['product_id'] ){
            $woocommerce->cart->remove_cart_item($cart_item_key);
        }
    }
    $return["mini_cart"] = dustrial_wc_cart_ajax();
    echo json_encode($return);
    exit();
}