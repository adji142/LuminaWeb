<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dustrial
 */
if( function_exists( 'dustrial_framework_init' ) ) {

    $content_excerpt        = dustrial_get_option('blog_post_excerpt_length');
    $blog_post_col_layout   = dustrial_get_option('blog_post_col_layout');

    if ( $blog_post_col_layout == 'col_2' ) {
        $col_layout = '6';
    } elseif ( $blog_post_col_layout == 'col_3' ) {
        $col_layout = '4';
    } elseif ( $blog_post_col_layout == 'col_4' ) {
        $col_layout = '3';
    } else {
        $col_layout = '12';
    }
} else {
   $col_layout = '12'; 
   $content_excerpt = '20';
}

if ($col_layout == '6') {
    $crop_img = 'dustrial-570';
} elseif ($col_layout == '4') {
    $crop_img = 'dustrial-362';
} elseif ($col_layout == '3') {
    $crop_img = 'dustrial-362';
} else {
    $crop_img = 'full';
}
?>

<div <?php post_class( 'single-page-blog style-1 col-md-'.$col_layout ); ?>>

    <?php if(has_post_thumbnail()) { ?>
        <div class="bimg">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                <span class="icon"><i class="fas fa-link"></i></span>
            </a>
            <?php the_tags( '<ul class="type"><li>', '</li><li>', '</li></ul>' ); ?>
        </div>
    <?php } ?>
    <div class="content">
        <h4 class="title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
        <div class="meta">
            <div class="author">
                <div class="img">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                </div>
                <div class="name">
                    <p><?php esc_html_e( 'by', 'dustrial' );  echo get_the_author(); ?></p>
                </div>
            </div>
            <div class="date">
                <p><span><i class="far fa-calendar-alt"></i></span> <?php echo get_the_date(); ?> </p>
            </div>
            <div class="comment">
                <p><span><i class="fas fa-comments"></i></span> <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?> </p>
            </div>
            <div class="business">
                <p><span><i class="fas fa-chart-bar"></i></span> <?php the_category(','); ?></p>
            </div>
        </div>
        <p class="text"><?php echo dustrial_excerpt( $content_excerpt ); ?></p>
        <a class="more" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'dustrial' ); ?> <span><i class="fas fa-angle-right"></i></span></a>
    </div>
</div>