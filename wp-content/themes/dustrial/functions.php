<?php
/**
 * dustrial functions and definitions
 *
 * @package dustrial
 */
/*------------------------------------------------------------------------------------------------------------------*/
/*	Define
/*------------------------------------------------------------------------------------------------------------------*/

define("DUSTRIAL_CSS", get_template_directory_uri() . '/assets/css/');
define("DUSTRIAL_IMG", get_template_directory_uri() . '/assets/img/');
define("DUSTRIAL_JS", get_template_directory_uri() . '/assets/js/');
define("DUSTRIAL_INC", get_template_directory() . '/inc/');
define("DUSTRIAL_CORE", get_template_directory() . '/inc/core/');

/*------------------------------------------------------------------------------------------------------------------*/
/*	Require file list
/*------------------------------------------------------------------------------------------------------------------*/

require_once DUSTRIAL_CORE .'xtl-bs-themesetup.php';
require_once DUSTRIAL_CORE .'xtl-bs-scripts.php';


/*------------------------------------------------------------------------------------------------------------------*/
/*	Custom functions that act independently of the theme templates.
/*------------------------------------------------------------------------------------------------------------------*/
require_once DUSTRIAL_INC .'extras.php';
require_once DUSTRIAL_INC .'template-tags.php';
require_once DUSTRIAL_INC .'jetpack.php';
require_once DUSTRIAL_INC .'custom-header.php';
require_once DUSTRIAL_INC . 'tgmpa.php';