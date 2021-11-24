<?php
/**
 * The template for displaying all single posts.
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');

?>

  <div class="service-details-pages">
    <div class="container">
      <div class="row">
        <?php
        if ( is_active_sidebar( 'market-widgets') ) {

          $content_column = '8';
          ?>
          <div class="col-md-12 col-lg-4 order-1 order-lg-0">
            <div class="market-single-widgets-area">
              <?php dynamic_sidebar( 'market-widgets' ); ?>
            </div>
          </div>
        <?php } else {
            $content_column = '12';
        } ?>

        <div class="col-md-12 col-lg-<?php echo esc_attr( $content_column ); ?> order-0 order-lg-1">
          <div class="market-single-widgets-details">
            <div class="tab-content" id="nav-tabContent">
              <div class="tab-pane fade show active" id="market-<?php the_ID(); ?>" role="tabpanel">
                <div class="block">
                  <?php if ( have_posts() ) : ?>
                  <?php while ( have_posts() ) : the_post(); 
                    $dustrial_service = get_post_meta(get_the_ID(), '_dustrial_service', true );

                    if (!empty($dustrial_service['service_accordion_title'] )) {
                      $service_accordion_title = $dustrial_service['service_accordion_title'];
                    } else {
                      $service_accordion_title = '';
                    }
                    
                    if (!empty($dustrial_service['service_accordion'] )) {
                      $service_accordion = $dustrial_service['service_accordion'];
                    } else {
                      $service_accordion = '';
                    }
                  ?>
                  <div class="text-img-block">
                    <?php if(has_post_thumbnail()) { ?>
                      <?php the_post_thumbnail( 'full', array('class' => 'img-fluid')); ?>
                    <?php } ?>
                      <h3 class="services-right-title"><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                  </div><!-- end text image block -->
                </div>
              </div><!-- end row -->

              <?php endwhile; ?>
              <?php else : ?>

              <?php get_template_part( 'template-parts/content', 'none' ); ?>

              <?php endif; ?>
            </div>
          </div>
        </div> <!-- col-md-12 col-lg-7 -->
      </div> <!-- row -->
    </div> <!-- end container -->
  </div> <!-- service-details-pages -->

<?php
  if( function_exists( 'dustrial_framework_init' ) ) {

    $call_action_switch       = dustrial_get_option('call_action_switch');
    $call_action_text         = dustrial_get_option('call_action_text');
    $call_action_textdetails  = dustrial_get_option('call_action_textdetails');
    $call_action_btn_text     = dustrial_get_option('call_action_btn_text');
    $call_action_btn_link     = dustrial_get_option('call_action_btn_link');

    $bg_img_id                = dustrial_get_option('call_action_bg_img');
    $attachment               = wp_get_attachment_image_src( $bg_img_id, 'full' );
    $bg_img                   = ($attachment) ? $attachment[0] : $bg_img_id;
    

    if (!empty($call_action_switch)){
    if (!empty($call_action_text)) {
    ?>

    <!-- Call To Action -->
    <div class="call-to-action bg-black-overlay pt-75 ptb-80" style="background-image: url( <?php echo esc_url( $bg_img ) ?> );">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="call_to_action_title text-center wow fadeInDown">
              <?php if(!empty($call_action_text)){ ?>
                <h2><?php echo esc_html( $call_action_text ) ?></h2>
              <?php } if(!empty($call_action_textdetails)){ ?> 
                <p><?php echo esc_html( $call_action_textdetails ) ?></p>
              <?php } ?>
            </div>
            <?php if(!empty($call_action_btn_link)){ ?> 
              <div class="call_to_action_btns wow fadeInUp">
                <a href="<?php echo esc_url( $call_action_btn_link ) ?>" class="btn call_to_action_btn"><?php echo esc_html( $call_action_btn_text ) ?></a>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <!-- End Call To Action -->

  <?php } }
} ?>

<?php get_footer(); ?>