<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>

<?php do_action( 'dustrial_breadcrum' ); ?>

<!-- Start Blog Section -->
<div id="blog" class="blog-page products-page single-product-page section-space-70">
    <div class="container">
        <div class="row">
            <?php 
                if ( is_active_sidebar( 'shop-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $shop_single_layout = dustrial_get_option('shop_single_layout');
                        if ( $shop_single_layout == 'left-sidebar' ) {
                            $col   = '8';
                            $class = 'order-12';
                        } elseif ( $shop_single_layout == 'right-sidebar' ) {
                            $col   = '8';
                            $class = '';
                        } elseif ( $shop_single_layout == 'full-width' ) {
                            $class = '';
                            $col   = '12';
                        } else {
                            $class = '';
                            $col   = '8';
                        }
                    } else {
                        $col   = '8';
                        $class = '';
                    }
                } else {
                    $col   = '12';
                    $class = '';
                }
            ?>
            
            <div class="col-lg-<?php echo esc_attr($col); ?> col-md-12 <?php echo esc_attr($class); ?>">
                <div class="block">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php wc_get_template_part( 'content', 'single-product' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>

			 <?php
                if ( is_active_sidebar( 'shop-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $shop_single_layout = dustrial_get_option('shop_single_layout');
                        if ( $shop_single_layout == 'left-sidebar' ||  $shop_single_layout == 'right-sidebar' ) { ?>
                    		<!-- End Shhop Sidebar -->
							<div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
							    <div class="sidebar shop-sidebar mmm">
							        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
							    </div>
							</div>
                		<?php } elseif ($shop_single_layout == 'full-width') {
                            
                        } else { ?>
                            <!-- End Shhop Sidebar -->
							<div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
							    <div class="sidebar shop-sidebar">
							        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
							    </div>
							</div>
                        <?php }
                    } else { ?>
                       	<!-- End Shhop Sidebar -->
						<div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
						    <div class="sidebar shop-sidebar">
						        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
						    </div>
						</div>
                    <?php }
                }
            ?>

		</div>
	</div>
</div>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
