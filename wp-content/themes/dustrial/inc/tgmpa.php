<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme dustrial for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require get_parent_theme_file_path('inc/class-tgm-plugin-activation.php');

add_action( 'tgmpa_register', 'dustrial_register_required_plugins' );


function dustrial_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
	 	array(
			'name'               => esc_html__('Dustrial Master','dustrial'), // The plugin name.
			'slug'               => 'dustrial-master', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/dustrial-master.zip', // The plugin
			'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'required'  => true,	
		),
		array(
			'name'               => esc_html__('Visual Composer','dustrial'), // The plugin name.
			'slug'               => 'js_composer', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/js_composer.zip', // The plugin
			'version'            => '6.0.3', // E.g. 5.6 If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'required'  => true,	
		),
		array(
			'name'               => esc_html__('Slider Revolution','dustrial'), // The plugin name.
			'slug'               => 'revslider', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/inc/plugins/revslider.zip', // The plugin
			'version'            => '6.0.2', // E.g. 5.6 If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'required'  => true,	
		),

		// This is an example of how to include a plugin from the WordPress Plugin Repository.	
		array(
			'name'      => esc_html__('WooCommerce','dustrial'),
			'slug'      => 'woocommerce',
			'required'  => true,
		),	
		array(
			'name'      => esc_html__('Contact Form 7','dustrial'),
			'slug'      => 'contact-form-7',
			'required'  => true,
		),
		array(
			'name'      => esc_html__('MailChimp for WordPress','dustrial'),
			'slug'      => 'mailchimp-for-wp',
			'required'  => true,
		),
		array(
			'name'      => 'One Click Demo Import',
			'slug'      => 'one-click-demo-import',
			'required'  => false,
		),

	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'dustrial',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}