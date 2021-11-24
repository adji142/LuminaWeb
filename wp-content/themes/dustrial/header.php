<?php
/**
 * The header for our theme.
 *
 * @package dustrial
 */
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class();?>>
    <?php 
        if ( ! function_exists( 'wp_body_open' ) ) {
            function wp_body_open() {
                do_action( 'wp_body_open' );
            }
        }
    ?>
    
    <?php 
    if( function_exists( 'dustrial_framework_init' ) ) {
        $preloader = dustrial_get_option('dustrial_preloader_enable');
        if (!empty($preloader)) { ?>
            <div id="loader-wrapper">
                <div id="loader">
                    <div id="noTrespassingOuterBarG">
                        <div id="noTrespassingFrontBarG" class="noTrespassingAnimationG">
                            <div class="noTrespassingBarLineG"></div>
                            <div class="noTrespassingBarLineG"></div>
                            <div class="noTrespassingBarLineG"></div>
                            <div class="noTrespassingBarLineG"></div>
                            <div class="noTrespassingBarLineG"></div>
                            <div class="noTrespassingBarLineG"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        }
    } ?>
    
    <!-- Start Header -->
    <?php do_action( 'dustrial_header_style' ); ?> 
    <!-- End Header -->