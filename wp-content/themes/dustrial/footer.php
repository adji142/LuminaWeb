<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Dustrial
 */
?>

	<!-- start footer section -->
	<?php do_action( 'dustrial_footer_style' ); ?> 
	<!-- footer section end -->  

	<?php 
	  if( function_exists( 'dustrial_framework_init' ) ) {
	      $scrollup = dustrial_get_option('dustrial_back_to_top');
	      if (!empty($scrollup)) {
	        do_action( 'dustrial_scrollup' );
	      } 
	  } 
	?>
	<?php wp_footer();?>

	</body>
</html>