<?php
/**
 * Template Name: Gallery Page
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');


if( function_exists( 'dustrial_framework_init' ) ) {
    $columns_layout = dustrial_get_option('gallery_page_columns');
    if (!empty($columns_layout)) {
      $cl = $columns_layout;
    } else {
      $cl = '4'; 
    }

    $no_gutters = dustrial_get_option('page_columns_no_gutter');
    $padding_around = dustrial_get_option('padding_around');

    $posts_per_page = dustrial_get_option('gallery_page_posts_per_page');
    $post_excerpt = dustrial_get_option('gallery_post_content_excerpt');

    $gallery_content_switch = dustrial_get_option('gallery_content_switch');
    $gallery_style = dustrial_get_option('gallery_style');
    $page_layout = dustrial_get_option('page_layout');
    $filter_switch  = dustrial_get_option('dustrial_gallery_filter_enable');
    $filter_category = dustrial_get_option('gallery_filter_category');
} else {
  $cl = '4';
  $post_excerpt = '20';
  $posts_per_page = '3';
  $no_gutters = '';
  $padding_around = '';
  $gallery_content_switch = '';
  $gallery_style = '';
  $page_layout = '';
  $filter_switch = '';
  $$filter_category = '';
}

if ($cl == '6') {
  $crop_img = 'dustrial-570';
} elseif ($cl == '12') {
  $crop_img = 'full';
} else {
  $crop_img = 'dustrial-362';
}

if (empty($no_gutters)) {
  $bottom_margin = 'mb-30';
  $gutters = '';
  $sec_padding = 70;
} else {
  $bottom_margin = '';
  $gutters = 'no-gutters';
  $sec_padding = 100;
}

if ($gutters == 'no-gutters') {
  $margin_bottom = 'mb-0';
} else {
  $margin_bottom = 'mb-30';    
}

if ($page_layout == '1') {
  $container = '<div class="container">';
  $container_end = '</div>';
} elseif ($page_layout == '2') {
  $container = '<div class="container-fluid">';
  $container_end = '</div>';
} else {
  $container = '<div class="container">';
  $container_end = '</div>';
}

if ($no_gutters == '1') {
  $padding_around = $padding_around;
} else {
  $padding_around = ' ';
}

if ( $gallery_style == 1 ) {

?>

<div class="h1-latest-market portfolio-area image-gallery section-space-<?php echo esc_attr( $sec_padding ); ?>">
  <?php echo wp_kses_stripslashes( $container ) ?>

    <?php 
    if (!empty($filter_switch)) {
      $filters = get_terms( array(
        'taxonomy' => 'our_gallery_tax',
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
    <!-- Letest Project content -->
    <div id="image-gallery">
      <div class="row <?php echo esc_attr( $filter_class.' '.$gutters ); ?> mixitup-projects-filter">
        <?php
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ; 

            $the_query = new WP_Query( array(
              'post_type' => 'our_gallery',
              'paged' => $paged,
              'posts_per_page' => $posts_per_page,
              'taxonomy' => 'our_gallery_tax'
            ) );

          $i = 100;

          while ( $the_query->have_posts() ) :
            $the_query->the_post(); 
            $i++;
            $thumb_url = get_the_post_thumbnail_url();

            $title = get_the_title();
            $content = get_the_content();

            $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
              if ( $terms && ! is_wp_error( $terms ) ) : 
                $draught_links = array();
                foreach ( $terms as $term ) {
                  $draught_links[] = $term->slug;
                  $term_link = get_term_link( $term );
                }        
            $cat_slug = join( " ", $draught_links );

        ?>

        <div class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">    
          <div class="dustrial-gallery-item">
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php esc_attr_e( 'Images', 'dustrial' ); ?>">
            <div class="overlay"></div>  
            <div class="search ">
              <a class="sb" href="<?php echo esc_url( $thumb_url ); ?>">
                <i class="fa fa-crosshairs"></i>
              </a>          
            </div>
          </div>
          <?php if (!empty($gallery_content_switch)) { ?>
          <div class="gallery-content">
            <?php if (!empty($title)) { ?>
            <h3><a><?php the_title(); ?></a></h3>
            <?php } if (!empty($content)) { ?>
            <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
            <?php } ?>
          </div>
          <?php } ?>
        </div>

        <?php endif; endwhile; wp_reset_postdata(); ?>
      </div><!-- End project content -->

      <?php echo wp_kses_stripslashes( $container_end ) ?>
    </div>
    <?php echo dustrial_project_paging_nav(); ?>
</div><!-- End Letest Projects -->

<?php } elseif ( $gallery_style == 2 ) { ?>

<div class="gallery-style2 portfolio-area section-space-<?php echo esc_attr( $sec_padding ); ?>">
  <?php echo wp_kses_stripslashes( $container ) ?>
  <?php 
    if (!empty($filter_switch)) {
        $filters = get_terms( array(
          'taxonomy' => 'our_gallery_tax',
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
    <ul id="image-gallery" class="docs-pictures clearfix row <?php echo esc_attr( $filter_class.' '.$gutters ); ?> mixitup-projects-filter">
      <?php
        $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ;

          $the_query = new WP_Query( array(
            'post_type' => 'our_gallery',
            'paged' => $paged,
            'posts_per_page' => $posts_per_page,
            'taxonomy' => 'our_gallery_tax'
          ) );

        $i = 100;

        while ( $the_query->have_posts() ) :
          $the_query->the_post(); 
          $thumb_url = get_the_post_thumbnail_url();

          $title = get_the_title();
          $content = get_the_content();

          $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
            if ( $terms && ! is_wp_error( $terms ) ) : 
              $draught_links = array();
              foreach ( $terms as $term ) {
                $draught_links[] = $term->slug;
                $term_link = get_term_link( $term );
              }        
          $cat_slug = join( " ", $draught_links );

      ?>
      <li class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">
        <img data-original="<?php echo esc_url( $thumb_url ); ?>" src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php the_title(); ?>">
        <?php if (!empty($gallery_content_switch)) { ?>
        <div class="gallery-content text-center">
          <?php if (!empty($title)) { ?>
          <h3><a><?php the_title(); ?></a></h3>
          <?php } if (!empty($content)) { ?>
          <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
          <?php } ?>
        </div>
        <?php } ?>
      </li>
      <?php endif; endwhile; wp_reset_postdata(); ?>
    </ul>
    <?php echo dustrial_project_paging_nav(); ?>
  <?php echo wp_kses_stripslashes( $container_end ) ?>
</div>

<?php } else { ?>

<div class="h1-latest-market portfolio-area image-gallery section-space-<?php echo esc_attr( $sec_padding ); ?>">
  <?php echo wp_kses_stripslashes( $container ) ?>
    <?php 
    if (!empty($filter_switch)) {
        $filters = get_terms( array(
          'taxonomy' => 'our_gallery_tax',
          'include' => $filter_category,
          'hide_empty'  => false, 
          'orderby'  => 'include',
        ) );
      if (!empty($filters)) { ?>

        <!-- Letest Project Btn -->
        <div class="inner-mixitup-menus text-center">
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
    <!-- Letest Project content -->
    <div id="mixitup-projects">
      <div class="row <?php echo esc_attr( $filter_class.' '.$gutters ); ?> mixitup-projects-filter">
        <?php
          $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1 ; 

            $the_query = new WP_Query( array(
              'post_type' => 'our_gallery',
              'paged' => $paged,
              'posts_per_page' => $posts_per_page,
              'taxonomy' => 'our_gallery_tax'
            ) );

          $i = 100;

          while ( $the_query->have_posts() ) :
            $the_query->the_post(); 
            $i++;
            $thumb_url = get_the_post_thumbnail_url();

            $title = get_the_title();
            $content = get_the_content();

            $terms = get_the_terms(get_the_ID(), 'our_gallery_tax' );          
              if ( $terms && ! is_wp_error( $terms ) ) : 
                $draught_links = array();
                foreach ( $terms as $term ) {
                  $draught_links[] = $term->slug;
                  $term_link = get_term_link( $term );
                }        
            $cat_slug = join( " ", $draught_links );
        ?>

        <div class="<?php echo esc_attr( $grid_item.' '.$cat_slug ); ?> col-xl-<?php echo esc_attr( $cl.' '.$margin_bottom.' '.$padding_around ); ?> col-md-6">    
          <div class="dustrial-gallery-item">
            <img src="<?php echo esc_url( $thumb_url ); ?>" alt="<?php esc_attr_e( 'Images', 'dustrial' ); ?>">
            <div class="overlay"></div>  
            <div class="search ">
              <a class="sb" href="<?php echo esc_url( $thumb_url ); ?>">
                <i class="fa fa-crosshairs"></i>
              </a>          
            </div>
          </div>
          <?php if (!empty($gallery_content_switch)) { ?>
          <div class="gallery-content">
            <?php if (!empty($title)) { ?>
            <h3><a><?php the_title(); ?></a></h3>
            <?php } if (!empty($content)) { ?>
            <p><?php echo dustrial_excerpt( $post_excerpt ); ?></p>
            <?php } ?>
          </div>
          <?php } ?>
        </div>
        <?php endif; endwhile; wp_reset_postdata(); ?>
      </div><!-- End project content -->
      <?php echo wp_kses_stripslashes( $container_end ) ?>
    </div>
    <?php echo dustrial_project_paging_nav(); ?>
</div><!-- End Letest Projects -->

<?php } get_footer(); ?>