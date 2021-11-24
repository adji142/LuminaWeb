<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header(); ?>

<?php do_action( 'dustrial_breadcrum' ); ?>

<!-- Start Blog Section -->
<div id="blog" class="blog-page products-page section-space-70">
    <div class="container">
        <div class="row">
            <?php 
                if ( is_active_sidebar( 'shop-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $shop_layout = dustrial_get_option('shop_layout');
                        if ( $shop_layout == 'left-sidebar' ) {
                            $col   = '8';
                            $class = 'order-12';
                        } elseif ( $shop_layout == 'right-sidebar' ) {
                            $col   = '8';
                            $class = '';
                        } elseif ( $shop_layout == 'full-width' ) {
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
                <div class="block row no-marginLR">
					<?php
						if ( woocommerce_product_loop() ) { ?>
							<div class="product-page-header">
							<?php /**
								 * Hook: woocommerce_before_shop_loop.
								 *
								 * @hooked woocommerce_output_all_notices - 10
								 * @hooked woocommerce_result_count - 20
								 * @hooked woocommerce_catalog_ordering - 30
								 */
								do_action( 'woocommerce_before_shop_loop' );
							?>
							</div>
							<?php woocommerce_product_loop_start();

							if ( wc_get_loop_prop( 'total' ) ) {
								while ( have_posts() ) {
									the_post();

									/**
									 * Hook: woocommerce_shop_loop.
									 *
									 * @hooked WC_Structured_Data::generate_product_data() - 10
									 */
									do_action( 'woocommerce_shop_loop' );

									wc_get_template_part( 'content', 'product' );
								}
							}

							woocommerce_product_loop_end();

							/**
							 * Hook: woocommerce_after_shop_loop.
							 *
							 * @hooked woocommerce_pagination - 10
							 */
							do_action( 'woocommerce_after_shop_loop' );
						} else {
							/**
							 * Hook: woocommerce_no_products_found.
							 *
							 * @hooked wc_no_products_found - 10
							 */
							do_action( 'woocommerce_no_products_found' );
						}
					?>
				</div>
			</div>

			 <?php
                if ( is_active_sidebar( 'shop-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $shop_layout = dustrial_get_option('shop_layout');

                        if ( $shop_layout == 'left-sidebar' ||  $shop_layout == 'right-sidebar' ) { 
                        	if ( $shop_layout == 'left-sidebar' ) {
                        		$sidebar_class = 'left-sidebar';
                        	} elseif ( $shop_layout == 'right-sidebar' ) {
                        		$sidebar_class = 'right-sidebar';
                        	} else {
                        		$sidebar_class = 'right-sidebar';
                        	}
                        ?>
                    		<!-- End Shhop Sidebar -->
							<div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
							    <div class="sidebar shop-sidebar <?php echo esc_attr($sidebar_class); ?>">
							        <?php dynamic_sidebar( 'shop-sidebar' ); ?>
							    </div>
							</div>
                		<?php } elseif ($shop_layout == 'full-width') {
                            
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

<?php get_footer(); ?>