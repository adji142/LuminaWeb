<?php
/**
 * Template Name: Projects Page
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');


if( function_exists( 'dustrial_framework_init' ) ) {
  $columns_layout = dustrial_get_option('project_page_columns');
  if (!empty($columns_layout)) {
      $cl = $columns_layout;
  } else {
     $cl = '4'; 
  }

  $filter_switch        = dustrial_get_option('dustrial_project_filter_enable');
  $posts_per_page       = dustrial_get_option('dustrial_project_page_posts_per_page');
  $project_post_excerpt = dustrial_get_option('project_post_excerpt');
  $filter_category      = dustrial_get_option('choose_filter_category');
} else {
  $cl = '4';
  $filter_switch = '';
  $posts_per_page = '6';
  $project_post_excerpt = '20';
}


if ($cl == '6') {
  $crop_img = 'dustrial-570';
} elseif ($cl == '12') {
  $crop_img = 'full';
} else {
  $crop_img = 'dustrial-362';
}

?>

  <div class="h1-latest-project">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <?php 
          if (!empty($filter_switch)) {
              $filters = get_terms( array(
                'taxonomy' => 'our_project_tax',
                'include' => $filter_category,
                'hide_empty'  => false, 
                'orderby'  => 'include',
              ) );
            if (!empty($filters)) { ?>

              <!-- Letest Project Btn -->
              <div class="inner-mixitup-menus portfolio-menu text-center">
                <button class="btn mb-2 mb-md-0 active" type="button" data-filter="*"><?php esc_html_e('View All', 'dustrial'); ?></button>
                  <?php if ( $filters && ! is_wp_error( $filters ) ) {
                    foreach ($filters as $filter) {
                      echo "<button class=\"btn mb-2 mb-md-0\" type=\"button\" data-filter=\".$filter->slug\">$filter->name</button>";
                    }
                  }
                ?>
              </div><!-- End Project Btn -->
              
            <?php }
              $grid_item = 'grid-item';
              $filter_class = 'portfolio-active';
            } else {
              $grid_item = '';
              $filter_class = '';
            }
            ?>

          <div id="dustrial-projects" class="row <?php echo esc_attr($filter_class); ?> isotop-projects-filter">
            <?php
              $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1; 

              if (!empty($filter_category) && !empty( $filter_switch)) {

                $the_query = new WP_Query( array(
                  'post_type' => 'our_project',
                  'paged' => $paged,
                  'posts_per_page' => $posts_per_page,
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'our_project_tax',
                        'field' => 'term_id',
                        'terms' => $filter_category
                    ))
                ) );

              } else {

                $the_query = new WP_Query( array(
                  'post_type' => 'our_project',
                  'paged' => $paged,
                  'posts_per_page' => $posts_per_page,
                  'taxonomy' => 'our_project_tax'
                ) );

              }

              while ( $the_query->have_posts() ) :
                $the_query->the_post(); 

                $terms = get_the_terms(get_the_ID(), 'our_project_tax' );          
                if ( $terms && ! is_wp_error( $terms ) ) : 
                  $draught_links = array();
                  foreach ( $terms as $term ) {
                    $draught_links[] = $term->slug;
                    $term_link = get_term_link( $term );
                  }        
                $cat_slug = join( ", ", $draught_links );

                $content = get_the_content(get_the_ID());
            ?>

            <div class="grid-item <?php echo esc_attr( $cat_slug ); ?> col-lg-<?php echo esc_attr( $cl ); ?> col-12 col-md-6">
              <div class="card border-0 rounded-0">
                <div class="card-img position-relative">
                  <div class="img-overlay style-1 activeColor d-flex align-items-center justify-content-center text-center">
                    <div class="col-md-10">
                      <h5 class="text-light"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                      <div class="text-light"><?php echo dustrial_excerpt($project_post_excerpt); ?></div>
                    </div>
                  </div>
                  <?php the_post_thumbnail( $crop_img, array('class' => 'img-fluid')); ?>

                  <div class="shape"></div>
                  <div class="categories">
                    <a href="<?php the_permalink(); ?>">
                      <img class="img-fluid" src="<?php echo DUSTRIAL_IMG . '/big-arrow.png' ?>" alt="<?php esc_attr_e( 'cat img', 'dustrial' ) ?>">
                    </a>
                  </div>

                </div>
              </div>
            </div>
            <?php endif; endwhile; wp_reset_postdata(); ?>
          </div>

          <?php echo dustrial_project_paging_nav(); ?>

        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>