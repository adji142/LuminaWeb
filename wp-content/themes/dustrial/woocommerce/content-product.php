<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div <?php dustrial_wc_product_class(); ?>>
	<div class="shop-product-single">
        <div class="product-img">
            <a href="<?php the_permalink();?>">
        	<?php woocommerce_show_product_loop_sale_flash(); ?> 
            <?php woocommerce_template_loop_product_thumbnail(); ?>
            </a>
            <div class="product-price-in-thumb">
               <?php woocommerce_template_loop_price(); ?> 
            </div>
        </div>
        <?php //woocommerce_template_loop_rating(); ?>
        <div class="product-content">
	        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	        <?php woocommerce_template_loop_add_to_cart(); ?>
        </div>
    </div>
</div>

