<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dustrial
 */

if ( ! is_active_sidebar( 'right-sidebar' ) ) {
	return;
} 
if( function_exists( 'dustrial_framework_init' ) ) {
    $blog_layout = dustrial_get_option('blog_layout');
    if ( $blog_layout == 'left-sidebar' ) {
        $sidebar_class = 'sidebar-left';
    } elseif ( $blog_layout == 'right-sidebar' ) {
        $sidebar_class = 'sidebar-right';
    } elseif ( $blog_layout == 'full-width' ) {
        $sidebar_class = 'sidebar-defalt';
    } else {
        $sidebar_class = 'sidebar-defalt';
    }
} else {
    $sidebar_class = 'sidebar-defalt';
}
?>

<!-- End Blog Sidebar -->
<div class="col-md-12 col-lg-4 mt-5 mt-lg-0">
    <div class="sidebar <?php echo esc_attr( $sidebar_class ); ?>">
        <?php dynamic_sidebar( 'right-sidebar' ); ?>
    </div>
</div>