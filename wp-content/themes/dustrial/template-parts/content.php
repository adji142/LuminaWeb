<?php
/**
 * Template part for displaying posts.
 *
 * @package dustrial
 */
$i = 0;
while ( have_posts() ) : the_post();
$i++;
$content = get_the_content(get_the_ID());

if( function_exists( 'dustrial_framework_init' ) ) {

    $content_excerpt      = dustrial_get_option('blog_post_excerpt_length');
    $blog_post_col_layout = dustrial_get_option('blog_post_col_layout');
    $blog_post_comments   = dustrial_get_option('blog_post_comments');

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
  $blog_post_comments = 'true';
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

<div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $col_layout ); ?>">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="single-blog">
      <?php if(has_post_thumbnail()) { ?>
        <div class="single-blog-thumb">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
            <span class="icon"><i class="fa fa-link"></i></span>
          </a>
        </div>
      <?php } ?>
      <div class="content">
        <div class="entry-meta">
          <div class="author">
            <?php esc_html_e('By ', 'dustrial'); ?><?php the_author_posts_link(); ?>
          </div>
          <div class="month">
            <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
          </div>
        </div>
        <h3><a href="<?php the_permalink(); ?>" class="entry-title"><?php the_title(); ?></a></h3>
        <div class="entry-content"><?php echo dustrial_excerpt( $content_excerpt );?></div>
        <?php
           wp_link_pages( array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'dustrial' ),
            'after'  => '</div>',
            ) );
        ?>
      </div>
      <div class="entry-meta-footer">
        <ul>
          <li class="read-more-btn">
            <a href="<?php esc_url(the_permalink()); ?>"><?php esc_html_e('Read More', 'dustrial'); ?> <i class="fa fa-angle-right" aria-hidden="true"></i></a>
          </li>
          <li class="comments-area">
            <?php if (!empty($blog_post_comments)) { ?>
              <a href="<?php comments_link(); ?>"> <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number(esc_html__( 'Comments: 0', "dustrial" ), esc_html__( 'Comments: 1', "dustrial" ),esc_html__( '% Comments', "dustrial" )); ?></a>
            <?php } ?>
          </li>
        </ul>
      </div>
    </div>
  </article>
</div>

<?php endwhile; ?>