<?php
/**
 * The template for displaying home page content.
 * Template Name: Blank Page - Full Width
 * @package dustrial
 */
get_header(); 

?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php if(have_posts()) : while(have_posts()) : the_post(); ?> 

				<?php the_content(); ?>

			<?php endwhile;endif; wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>