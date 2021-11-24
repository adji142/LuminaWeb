<?php
/**
 * The template for displaying all single posts.
 *
 * @package dustrial
 */

get_header(); 

do_action('dustrial_breadcrum');

?>


<div class="project-single-page">
    <div class="container">
      <div class="row">

        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
            $post_thumb = get_the_post_thumbnail_url();
        ?>
        <?php
            $dustrial_project_bigimage_enable = dustrial_get_option('dustrial_project_bigimage_enable');
            if(!empty($dustrial_project_bigimage_enable)){
                $pcmargins = '';
            }else{
                $pcmargins = 'nobigimg';
            }
        ?>

        <?php if(!empty($dustrial_project_bigimage_enable)){?>
            <div class="col-md-12 single-project-thumbnail">
              <img src="<?php echo esc_url( $post_thumb ); ?>" class="img-fluid" alt="<?php esc_attr_e( 'single page feature image', 'dustrial' ); ?>">
            </div>
        <?php } ?>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php
            $dustrial_project_info = get_post_meta(get_the_ID(), '_dustrial_our_project', true);

            if (!empty($dustrial_project_info['project_client'] )) {
                $project_client = $dustrial_project_info['project_client'];
            } else {
                $project_client = '';
            }
            if (!empty($dustrial_project_info['project_location'] )) {
                $project_location = $dustrial_project_info['project_location'];
            } else {
                $project_location = '';
            }
            if (!empty($dustrial_project_info['project_date'] )) {
                $project_date = $dustrial_project_info['project_date'];
            } else {
                $project_date = '';
            }
            if (!empty($dustrial_project_info['project_website'] )) {
                $project_website = $dustrial_project_info['project_website'];
            } else {
                $project_website = '';
            }
            if (!empty($dustrial_project_info['project_socials'] )) {
                $project_socials = $dustrial_project_info['project_socials'];
            } else {
                $project_socials = '';
            }

            $dustrial_project_toppart_enable = dustrial_get_option('dustrial_project_toppart_enable');
            $dustrial_project_contact_enable = dustrial_get_option('dustrial_project_contact_enable');

            if(!empty($dustrial_project_toppart_enable) || !empty($dustrial_project_contact_enable) || is_active_sidebar( 'project-widgets') ){
                $pcols = '8';
            } else {
                $pcols = '12';
            }
        ?>


        <div class="col-lg-4 col-12 order-1 order-lg-0">
            <div class="market-single-widgets-area project-single-widgets">
            <?php
                if ( is_active_sidebar( 'project-widgets') ) { ?>
                    <?php dynamic_sidebar( 'project-widgets' ); ?>
                <?php } ?>
            </div>

            <?php
            if(!empty($dustrial_project_toppart_enable)){
            ?>
            <div class="single_project_widgets <?php echo esc_attr($pcmargins);?>">
                <ul>
                    <div class="project-details-title">
                        <?php $project_widgets_title = dustrial_get_option('dustrial_project_widget_title'); ?>
                        <h2><?php echo esc_html($project_widgets_title);?></h2>
                    </div>
                    <?php $dustrial_project_catg_title = dustrial_get_option('dustrial_project_catg_title'); ?>
                    <?php if(!empty($dustrial_project_catg_title)){ ?>
                    <li>
                        <span class="font-weight-bold"><?php echo esc_html($dustrial_project_catg_title); ?>:</span>
                        <?php echo get_the_term_list(get_the_ID(), 'our_project_tax', '', ', ', ''); ?>
                    </li>
                	<?php } ?>
                    <?php $dustrial_project_clients_title = dustrial_get_option('dustrial_project_clients_title'); ?>
                    <?php if(!empty($dustrial_project_clients_title)){ ?>
	                    <?php if(!empty($project_client)){ ?>
	                    <li>
	                        <span class="font-weight-bold"><?php echo esc_html($dustrial_project_clients_title); ?>:</span>
	                        <?php echo esc_html( $project_client ); ?>
	                    </li>
	                    <?php } ?>
                    <?php } ?>
                    <?php $dustrial_project_locats_title = dustrial_get_option('dustrial_project_locats_title'); ?>
	                <?php if(!empty($dustrial_project_locats_title)){ ?>
	                    <?php if(!empty($project_location)){ ?>
	                    <li>
	                        <span class="font-weight-bold"><?php echo esc_html($dustrial_project_locats_title); ?>:</span>
	                        <?php echo esc_html( $project_location ); ?>
	                    </li>
	                    <?php } ?>
	                <?php } ?>

	                <?php $dustrial_project_dates_title = dustrial_get_option('dustrial_project_dates_title'); ?>
                    <?php if(!empty($dustrial_project_dates_title)){ ?>
	                    <?php if(!empty($project_date)){ ?>
	                    <li>
	                        <span class="font-weight-bold"><?php echo esc_html($dustrial_project_dates_title); ?>:</span>
	                        <?php echo esc_html( $project_date ); ?>
	                    </li>
	                    <?php } ?>
                    <?php } ?>

                    <?php $dustrial_project_urls_title = dustrial_get_option('dustrial_project_urls_title'); ?>
                    <?php if(!empty($dustrial_project_urls_title)){ ?>
	                    <?php if(!empty($project_website)){ ?>
	                    <li>
	                        <span class="font-weight-bold"><?php echo esc_html($dustrial_project_urls_title); ?>:</span>
	                        <a href="<?php echo esc_url( $project_website ); ?>"> <?php echo esc_attr( $project_website ); ?> </a>
	                    </li>
	                    <?php } ?>
                    <?php } ?>
                </ul>

                <?php if (is_array($project_socials )) { ?>
                    <div class="block social-media d-flex">
                        <?php foreach ($project_socials as $key => $value) { ?>
                            <a class="<?php echo esc_attr($value['social_icon']); ?> d-flex justify-content-center align-items-center" href="<?php echo esc_url($value['social_link']); ?>"></a>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
            <?php } ?>

            <?php
            
            if (!empty($dustrial_project_contact_enable)) { ?>
                <div class="single_project_widgets activebgcolor">
                    <ul>
                        <div class="project-details-title">
                        <?php $dustrial_contact_info_title = dustrial_get_option('dustrial_contact_info_title'); ?>
                            <h2><?php echo esc_html($dustrial_contact_info_title);?></h2>
                        </div>
                        <?php $dustrial_contact_info_location = dustrial_get_option('dustrial_contact_info_location'); 
                        if (!empty($dustrial_contact_info_location)) {?>
                            <li><span><i class="fa fa-map-marker"></i></span>
                                <?php echo esc_html($dustrial_contact_info_location);?>
                            </li>
                        <?php
                        } ?>
                        <?php $dustrial_contact_info_number = dustrial_get_option('dustrial_contact_info_number');
                        if (!empty($dustrial_contact_info_number)) {?>
                            <li><span><i class="fa fa-phone"></i></span>
                                <?php echo esc_html($dustrial_contact_info_number);?>
                            </li>
                        <?php
                        } ?>
                        <?php $dustrial_contact_info_email = dustrial_get_option('dustrial_contact_info_email');
                        if (!empty($dustrial_contact_info_email)) {?>
                            <li><span><i class="fa fa-envelope"></i></span>
                                <?php echo esc_html($dustrial_contact_info_email);?>
                            </li>
                        <?php
                        } ?>
                    </ul>
                </div>
            <?php } ?>

        </div>
        <?php 
            if ( have_posts() ) : while ( have_posts() ) : the_post();
        ?>
        <div class="col-lg-<?php echo esc_attr($pcols);?> col-12 order-0 order-lg-1">
          <div class="project-info <?php echo esc_attr($pcmargins);?>">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>

        <?php endwhile; ?>

        <?php else : ?>

        <?php get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>

      </div> <!-- End Row -->
    </div>
  </div> <!-- End project section -->

<?php get_footer(); ?>