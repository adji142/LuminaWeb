<?php
/**
 * The template for displaying all single posts.
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum'); ?>


<!-- blog-section - start -->
<div class="blog-single section-space-70">
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
                <div class="block blog-details">
                    <?php if ( have_posts() ) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                        <?php
                            /*
                             * Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part( 'template-parts/content', 'single' );


                            the_post_navigation( array(
                                'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'dustrial' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( '<i class="fa fa-angle-left" aria-hidden="true"></i> Previous Post', 'dustrial' ) . '</span>',
                                'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'dustrial' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next Post <i class="fa fa-angle-right" aria-hidden="true"></i>', 'dustrial' ) . '</span>',
                            ) ); 

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
            </div>
            <!-- Start Blog Sidebar -->
            <?php
                if( function_exists( 'dustrial_framework_init' ) ) {
                    if ( is_active_sidebar( 'right-sidebar') ) {
                        $blog_single_layout = dustrial_get_option('blog_single_layout');
                        if ( $blog_single_layout == 'left-sidebar' ||  $blog_single_layout == 'right-sidebar' ) {
                            get_sidebar();
                        } elseif ($blog_single_layout == 'full-width') {
                            
                        } else {
                            get_sidebar();
                        }
                    } else {
                       get_sidebar();
                    }
                }
            ?>

        </div><!-- row -->
    </div><!-- container -->
</div>
<!-- blog-section - End -->


<?php get_footer(); ?>