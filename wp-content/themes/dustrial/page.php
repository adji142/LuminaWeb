<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package dustrial
 */
get_header(); 

do_action('dustrial_breadcrum'); 

?>

<!-- blog section start -->
<div id="blog" class="blog-page section-space">
    <div class="container">
        <div class="row">
            <?php 
                if( function_exists( 'dustrial_framework_init' ) ) {
                    if ( is_active_sidebar( 'right-sidebar') ) {
                        $blog_single_layout = dustrial_get_option('blog_single_layout');
                        if ( $blog_single_layout == 'left-sidebar' ) {
                            $col   = '8';
                            $class = 'order-12';
                        } elseif ( $blog_single_layout == 'right-sidebar' ) {
                            $col   = '8';
                            $class = '';
                        } elseif ( $blog_single_layout == 'full-width' ) {
                            $class = '';
                            $col   = '10 mx-auto';
                        } else {
                            $class = '';
                            $col   = '8';
                        }
                    } else {
                        $col   = '8';
                        $class = '';
                    }
                } else {
                    $col   = '10 mx-auto';
                    $class = '';
                }
            ?>
            <div class="col-lg-<?php echo esc_attr($col); ?> col-md-12 col-sm-12 col-12 <?php echo esc_attr($class); ?>">
                <?php if ( have_posts() ) : ?>

                    <?php while ( have_posts() ) : the_post(); ?>

                    <?php
                        /*
                         * Include the Post-Format-specific template for the content.
                         * If you want to override this in a child theme, then include a file
                         * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                         */
                        get_template_part( 'template-parts/content', 'page' );

                        // If comments are open or we have at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) :
                            ?>
                            <div class="no-padding comment-area-page">
                                <?php comments_template(); ?>
                            </div>
                            <?php
                        endif;
                        
                    ?>
                    <?php endwhile; ?>

                <?php else : ?>

                    <?php get_template_part( 'template-parts/content', 'none' ); ?>

                <?php endif; ?>
            </div>

            <?php
                if( function_exists( 'dustrial_framework_init' ) ) {
                    if ( is_active_sidebar( 'right-sidebar') ) {
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
<!-- blog section End -->

<?php get_footer(); ?>