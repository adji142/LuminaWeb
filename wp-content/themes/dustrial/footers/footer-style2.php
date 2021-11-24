<?php if ( is_active_sidebar( 'footer2-widgets') ) {

    if ( function_exists( 'dustrial_framework_init' )) {
      $bg_img_id    = dustrial_get_option('footer_2_bg');
      $attachment = wp_get_attachment_image_src( $bg_img_id, 'full' );
      $bg_img     = ($attachment) ? $attachment[0] : $bg_img_id;
    } else {
      $bg_img = DUSTRIAL_IMG . 'bind_footer_bg_dark.png';
    }

  ?>

  <div class="bind_footer footer-2 bg-black-overlay-footer" style="background-image: url(<?php echo esc_url( $bg_img ); ?>)">
    <footer class="footer">
      <div class="container">
        <div class="row">
          <?php dynamic_sidebar( 'footer2-widgets' ); ?>
        </div>
      </div>
    </footer>
  </div>

<?php } ?>

<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="copyright-content">
          <p>
            <?php if ( function_exists( 'dustrial_framework_init' )) { ?>
              <?php echo wp_kses_stripslashes( dustrial_get_option('copyright_text') ); ?>
            <?php } else { ?>
              <?php esc_html_e( '&copy; Copyright 2019 by - Dustrial', 'dustrial' ); ?>
            <?php } ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>