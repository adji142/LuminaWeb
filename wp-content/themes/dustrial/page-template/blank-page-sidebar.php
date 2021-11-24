<?php
/**
 * The template for displaying home page content.
 * Template Name: Blank Page with breadcrumb
 * @package dustrial
 */
get_header(); 

do_action('dustrial_breadcrum');

?>
<div class="container">
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?> 
		<?php the_content(); ?>
	<?php endwhile;endif; wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>