<?php
/**
 * The main template file
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dustrial
 */

    get_header();

    do_action('dustrial_breadcrum');
?>

<!-- Start Blog Section -->
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
            
            <div class="col-lg-<?php echo esc_attr($col); ?> col-md-12 <?php echo esc_attr($class); ?>">
                <div class="block row">
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
                </div>
            </div>

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
		</div>
	</div>
</div>
<!-- End Blog Section -->

<?php get_footer(); ?>