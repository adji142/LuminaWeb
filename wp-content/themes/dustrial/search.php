<?php
/**
 * The template for displaying search results pages.
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');

?>

<!-- blog-section - start -->
<div id="blog" class="blog-page section-space-70">
    <div class="container">
        <div class="row">

            <?php 
                if ( is_active_sidebar( 'right-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $blog_layout = dustrial_get_option('blog_layout');
                        if ( $blog_layout == 'left-sidebar' ) {
                            $col   = '8';
                            $class = 'order-12';
                        } elseif ( $blog_layout == 'right-sidebar' ) {
                            $col   = '8';
                            $class = '';
                        } elseif ( $blog_layout == 'full-width' ) {
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
            <div class="col-lg-<?php echo esc_attr($col); ?> col-sm-12 <?php echo esc_attr($class); ?>">
                <?php 
                    if( function_exists( 'dustrial_framework_init' ) ) {

                        $blog_post_style        = dustrial_get_option('blog_post_display_variation');
                        $blog_post_col_layout   = dustrial_get_option('blog_post_col_layout');

                        if ( $blog_post_style == 'style1' ) {
                            $blog_column_class = '';
                        } elseif ( $blog_post_style == 'style2' ) {
                            $blog_column_class = 'page-blog-two-column';
                        } elseif ( $blog_post_style == 'style3' && $blog_post_col_layout == 'col_2' ) {
                            $blog_column_class = 'blog-chess-two-column';
                        } elseif ( $blog_post_style == 'style3' && $blog_post_col_layout == 'col_4' ) {
                            $blog_column_class = 'blog-chess-four-column';
                        } else {
                            $blog_column_class = '';
                        }
                    } else {
                       $blog_column_class = ''; 
                    }
                ?>

                <div class="<?php echo esc_attr( $blog_column_class ); ?> page-blog">
                    <div class="row">
                        <!-- ========== blog - start ========== -->
                        <?php if ( have_posts() ) : ?>
                            
                        <?php
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', get_post_format() );
                        ?>

                        <?php echo dustrial_paging_nav(); ?>
                        <?php else : ?>
                            <?php get_template_part( 'template-parts/content', 'none' ); ?>
                        <?php endif; ?>
                        <!-- ========== blog - end ========== -->
                    </div>
                </div>
            </div>
            <!-- Start Blog Sidebar -->
            <?php
                if ( is_active_sidebar( 'right-sidebar') ) {
                    if( function_exists( 'dustrial_framework_init' ) ) {
                        $blog_layout = dustrial_get_option('blog_layout');
                        if ( $blog_layout == 'left-sidebar' ||  $blog_layout == 'right-sidebar' ) {
                            get_sidebar('right');
                        } elseif ($blog_layout == 'full-width') {
                            
                        } else {
                            get_sidebar('right');
                        }
                    } else {
                       get_sidebar('right');
                    }
                }
            ?>

        </div><!-- row -->
    </div><!-- container -->
</div>
<!-- blog-section - End -->

<?php get_footer(); ?>