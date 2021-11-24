<?php
/**
 * Template Name: Service Page
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');


if( function_exists( 'dustrial_framework_init' ) ) {
    $columns_layout = dustrial_get_option('service_page_columns');
    if (!empty($columns_layout)) {
      $cl = $columns_layout;
    } else {
      $cl = '4'; 
    }

    $posts_per_page = dustrial_get_option('market_page_posts_per_page');
    $post_excerpt = dustrial_get_option('service_post_content_excerpt');

} else {
  $cl = '4';
  $post_excerpt = '20';
  $posts_per_page = '3';
}

if ($cl == '6') {
  $crop_img = 'dustrial-570';
} elseif ($cl == '12') {
  $crop_img = 'full';
} else {
  $crop_img = 'dustrial-362';
}

?>

  <div class="h1-latest-market section-space-70">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <!-- Letest Project content -->
          <div class="row">
            <?php
              $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; 

                $the_query = new WP_Query( array(
                  'post_type' => 'service',
                  'paged' => $paged,
                  'posts_per_page' => $posts_per_page,
                  'taxonomy' => 'service_tax'
                ) );

              $i = 100;

              while ( $the_query->have_posts() ) :
                $the_query->the_post(); 

                $i++;

                $thumb_url        = get_the_post_thumbnail_url();
                $market_meta_data = get_post_meta(get_the_ID(), '_dustrial_service', true);

                if (!empty($market_meta_data['market_icon'])) {
                  $icon = $market_meta_data['market_icon'];
                } else {
                   $icon = '';
                }

            ?>

            <div class="col-12 col-md-6 col-lg-<?php echo esc_attr( $cl ); ?>">
               <div class="market-single-items">
                <div class="market-item-thumb">
                  <?php if(has_post_thumbnail()) { ?>
                    <a href="<?php the_permalink(); ?>">
                      <div class="img-overlay style-1 activeColor">
                        <i class="fa fa-link" aria-hidden="true"></i>
                      </div>
                      <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>
                    </a>
                  <?php } if (!empty($icon)) { ?>
                    <a href="<?php the_permalink(); ?>">
                      <div class="shape"></div>
                      <div class="categories">
                        <i class="<?php echo esc_attr( $icon ); ?>"></i>
                      </div>
                    </a>
                  <?php } ?>
                </div>
                <div class="market-item-details">
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  <p class="card-text"><?php echo get_the_excerpt();?></p>
                </div>
              </div>
            </div><!-- End Col -->

            <?php endwhile; wp_reset_postdata(); ?>
          </div><!-- End Project content -->

          <?php echo dustrial_project_paging_nav(); ?>

        </div><!-- End Col -->
      </div><!-- End Row -->
    </div>
  </div><!-- End Letest Projects -->

<?php get_footer(); ?>