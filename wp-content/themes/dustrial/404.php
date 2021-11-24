<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');

if( function_exists( 'dustrial_framework_init' ) ) {

  $img_id              = dustrial_get_option('dustrial_404_img');
  $attachment1         = wp_get_attachment_image_src( $img_id, 'full' );
  $dustrial_404_img    = ($attachment1) ? $attachment1[0] : $img_id;
  $bg_img_id           = dustrial_get_option('dustrial_404_bg_img');
  $attachment2         = wp_get_attachment_image_src( $bg_img_id, 'full' );
  $bg_img              = ($attachment2) ? $attachment2[0] : $bg_img_id;

?>

  <div class="error_404" style="background-image: url(<?php echo esc_url( $bg_img ); ?>);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="error_content text-center">
            <img src="<?php echo esc_url($dustrial_404_img); ?>" class="img-fluid" alt="<?php esc_attr_e( '404 error image', 'dustrial' ); ?>">
            <p><?php echo esc_html( dustrial_get_option( '404_title' ) ); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php echo esc_html( dustrial_get_option( 'dustrial_404_btn_txt' ) ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } else {

  $dustrial_404_img = DUSTRIAL_IMG . '404.png';

?>

  <div class="error_404">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="error_content text-center">
            <img src="<?php echo esc_url($dustrial_404_img); ?>" class="img-fluid" alt="<?php esc_attr_e( '404 error image', 'dustrial' ); ?>">
            <p><?php esc_html( 'Sorry, Page Not Found', 'dustrial' ); ?></p>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary"><?php esc_html__( 'Go To Home', 'dustrial' ); ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<?php get_footer(); ?>