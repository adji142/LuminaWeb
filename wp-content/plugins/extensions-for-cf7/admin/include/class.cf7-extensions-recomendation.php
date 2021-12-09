<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class Extensions_Cf7_Recomendation{

	// Get Instance
    private static $_instance = null;
    public static function instance(){
        if( is_null( self::$_instance ) ){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    function __construct(){
    	add_action( 'admin_menu', [ $this, 'admin_menu' ], 224 );
    	add_action( 'admin_enqueue_scripts', [ $this, 'add_scripts' ] );
    	add_action( 'wp_ajax_extcf7_ajax_plugin_activation', [ $this, 'ajax_plugin_activation' ] );
    }

    public function admin_menu() {
        add_submenu_page(
            'contat-form-list', 
            esc_html__( 'Recommendation', 'cf7-extensions' ),
            esc_html__( 'Recommendation', 'cf7-extensions' ), 
            'manage_options', 
            'cf7-extensions-recomendation', 
            [ $this, 'render_layout' ] 
        );
    }

    public function add_scripts($hook){
    	if('ht-cf7-extension_page_cf7-extensions-recomendation' == $hook){
    		wp_enqueue_script( 'ht-cf7-recomendation-script', CF7_EXTENTIONS_PL_URL.'admin/assets/js/recomendation-page.js', array('jquery'), '1.0.1', true);
    		wp_enqueue_script( 'ht-cf7-plugin-install-manager-script', CF7_EXTENTIONS_PL_URL.'admin/assets/js/install-manager.js', array('jquery', 'wp-util', 'updates'), '1.0.1', true);

    		$localize_data = [
                'ajaxurl'          => admin_url( 'admin-ajax.php' ),
                'buttontxt'      =>[
                    'installing' => esc_html__( 'Installing..', 'cf7-extensions' ),
                    'activating' => esc_html__( 'Activating..', 'cf7-extensions' ),
                    'active'     => esc_html__( 'Active', 'cf7-extensions' ),
                ],
            ];
            wp_localize_script( 'ht-cf7-plugin-install-manager-script', 'EXTCF7', $localize_data );
    	}
    }

    public function ajax_plugin_activation(){

    	if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['location'] ) || ! $_POST['location'] ) {
            wp_send_json_error(
                array(
                    'success' => false,
                    'message' => esc_html__( 'Plugin Not Found', 'cf7-extensions' ),
                )
            );
        }

        $plugin_location = ( isset( $_POST['location'] ) ) ? esc_attr( $_POST['location'] ) : '';
        $activate    = activate_plugin( $plugin_location, '', false, true );

        if ( is_wp_error( $activate ) ) {
            wp_send_json_error(
                array(
                    'success' => false,
                    'message' => $activate->get_error_message(),
                )
            );
        }

        wp_send_json_success(
            array(
                'success' => true,
                'message' => esc_html__( 'Plugin Successfully Activated', 'cf7-extensions' ),
            )
        );

    }

   	public function render_layout(){

   		if ( ! function_exists('plugins_api') ){ include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' ); }

   		$htplugins_plugins_list = $this->get_plugins();
    	$palscode_plugins_list = $this->get_plugins( 'palscode' );

    	$org_plugins_list = array_merge( $htplugins_plugins_list, $palscode_plugins_list );

    	$prepare_plugin = array();
    	foreach ( $org_plugins_list as $key => $plugin ) {
    		$prepare_plugin[$plugin['slug']] = $plugin;
    	}

    	$plugins_list = array(

    		'recomendation' =>array(
    			array(
	    			'slug'		=> 'ht-contactform',
	    			'location'	=> 'contact-form-widget-elementor.php',
	    			'name'		=> esc_html__( 'Contact Form 7 Widget For Elementor Page Builder', 'cf7-extensions' )
	    		)
    		),

    		'others-plugin' => array(

    			array(
	    			'slug'		=> 'woolentor-addons',
	    			'location'	=> 'woolentor_addons_elementor.php',
	    			'name'		=> esc_html__( 'WooLentor - WooCommerce Elementor Addons + Builder', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'ht-mega-for-elementor',
	    			'location'	=> 'htmega_addons_elementor.php',
	    			'name'		=> esc_html__( 'HT Mega - Absolute Addons for Elementor Page Builder', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'quickswish',
	    			'location'	=> 'quickswish.php',
	    			'name'		=> esc_html__( 'QuickSwish', 'cf7-extensions' )
	    		),
    			array(
	    			'slug'		=> 'wishsuite',
	    			'location'	=> 'wishsuite.php',
	    			'name'		=> esc_html__( 'WishSuite', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'ever-compare',
	    			'location'	=> 'ever-compare.php',
	    			'name'		=> esc_html__( 'EverCompare', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'whols',
	    			'location'	=> 'whols.php',
	    			'name'		=> esc_html__( 'Whols', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'just-tables',
	    			'location'	=> 'just-tables.php',
	    			'name'		=> esc_html__( 'JustTables', 'cf7-extensions' )
	    		),
	    		array(
	    			'slug'		=> 'wc-multi-currency',
	    			'location'	=> 'wcmilticurrency.php',
	    			'name'		=> esc_html__( 'Multi Currency', 'cf7-extensions' )
	    		)
    		)
    	)

   		?>
   			<div class="wrap">
   				<style>
   					.riecomendation-admin-tab-pane{
					  display: none;
					}
					.riecomendation-admin-tab-pane.ext-active{
					  display: block;
					}
   					.recomendation-admin-tab-area .filter-links li>a:focus, .recomendation-admin-tab-area .filter-links li>a:hover {
					    color: inherit;
					    box-shadow: none;
					}
					.filter-links .ext-active{
					    box-shadow: none;
					    border-bottom: 4px solid #646970;
					    color: #1d2327;
					}
   				</style>
   				<h2><?php echo esc_html__('Recomendation','cf7-extensions'); ?></h2>
   				<div class="recomendation-admin-tab-area wp-filter">
	                <ul class="recomendation-admin-tabs filter-links">
	                    <li><a href="#recomendation-tab" class="ext-active"><?php echo esc_html__( 'Recommendation', 'cf7-extensions' ); ?></a></li>
	                    <li><a href="#other-plugins-tab"><?php echo esc_html__( 'Other Plugins', 'cf7-extensions' ); ?></a></li>
	                </ul>
	            </div>
	            <div id="recomendation-tab" class="riecomendation-admin-tab-pane ext-active">
	            	<?php
	            	foreach ( $plugins_list['recomendation'] as $key => $plugin ):

			            $data = array(
			                'slug'      => isset( $plugin['slug'] ) ? $plugin['slug'] : '',
			                'location'  => isset( $plugin['location'] ) ? $plugin['slug'].'/'.$plugin['location'] : '',
			                'name'      => isset( $plugin['name'] ) ? $plugin['name'] : '',
			            );

			            if ( ! is_wp_error( $data ) ):

			                // Installed but Inactive.
			                if ( file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) && is_plugin_inactive( $data['location'] ) ) {

			                    $button_classes = 'button activate-now button-primary';
			                    $button_text    = esc_html__( 'Activate', 'cf7-extensions' );

			                // Not Installed.
			                } elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) ) {

			                    $button_classes = 'button install-now';
			                    $button_text    = esc_html__( 'Install Now', 'cf7-extensions' );

			                // Active.
			                } else {
			                    $button_classes = 'button disabled';
			                    $button_text    = esc_html__( 'Activated', 'cf7-extensions' );
			                }

			                ?>

		                    <div class="plugin-card htwptemplata-plugin-<?php echo $data['slug']; ?>">

								<div class="plugin-card-top">
									<div class="name column-name" style="margin-right: 0;">
										<h3>
											<a href="<?php echo esc_url( admin_url() ) ?>/plugin-install.php?tab=plugin-information&plugin=<?php echo $data['slug']; ?>&TB_iframe=true&width=772&height=577" class="thickbox open-plugin-details-modal">
												<?php echo $prepare_plugin[$data['slug']]['name']; ?>
												<img src="<?php echo $prepare_plugin[$data['slug']]['icons']['1x']; ?>" class="plugin-icon" alt="<?php echo $prepare_plugin[$data['slug']]['name']; ?>">
											</a>
										</h3>
									</div>
									<div class="desc column-description" style="margin-right: 0;">
										<p><?php echo wp_trim_words( $prepare_plugin[$data['slug']]['description'], 23, '....'); ?></p>
										<p class="authors"> <cite><?php echo esc_html__( 'By ', 'cf7-extensions' ).$prepare_plugin[$data['slug']]['author']; ?></cite></p>
									</div>
								</div>

								<div class="plugin-card-bottom">
									<div class="column-updated">
										<button class="<?php echo $button_classes; ?>" data-pluginopt='<?php echo wp_json_encode( $data ); ?>'><?php echo $button_text; ?></button>
									</div>
									<div class="column-downloaded">
										<a href="<?php echo esc_url( admin_url() ) ?>/plugin-install.php?tab=plugin-information&plugin=<?php echo $data['slug']; ?>&TB_iframe=true&width=772&height=577" class="thickbox open-plugin-details-modal"><?php echo esc_html__( 'More Details', 'cf7-extensions' ); ?></a>
									</div>
								</div>

							</div>

			            <?php endif; ?>
		            <?php endforeach; ?>
	            </div>
	            <div id="other-plugins-tab" class="riecomendation-admin-tab-pane">
	            	<?php
	            	foreach ( $plugins_list['others-plugin'] as $key => $plugin ):

			            $data = array(
			                'slug'      => isset( $plugin['slug'] ) ? $plugin['slug'] : '',
			                'location'  => isset( $plugin['location'] ) ? $plugin['slug'].'/'.$plugin['location'] : '',
			                'name'      => isset( $plugin['name'] ) ? $plugin['name'] : '',
			            );

			            if ( ! is_wp_error( $data ) ):

			                // Installed but Inactive.
			                if ( file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) && is_plugin_inactive( $data['location'] ) ) {

			                    $button_classes = 'button activate-now button-primary';
			                    $button_text    = esc_html__( 'Activate', 'cf7-extensions' );

			                // Not Installed.
			                } elseif ( ! file_exists( WP_PLUGIN_DIR . '/' . $data['location'] ) ) {

			                    $button_classes = 'button install-now';
			                    $button_text    = esc_html__( 'Install Now', 'cf7-extensions' );

			                // Active.
			                } else {
			                    $button_classes = 'button disabled';
			                    $button_text    = esc_html__( 'Activated', 'cf7-extensions' );
			                }

			                ?>

		                    <div class="plugin-card htwptemplata-plugin-<?php echo $data['slug']; ?>">

								<div class="plugin-card-top">
									<div class="name column-name" style="margin-right: 0;">
										<h3>
											<a href="<?php echo esc_url( admin_url() ) ?>/plugin-install.php?tab=plugin-information&plugin=<?php echo $data['slug']; ?>&TB_iframe=true&width=772&height=577" class="thickbox open-plugin-details-modal">
												<?php echo $prepare_plugin[$data['slug']]['name']; ?>
												<img src="<?php echo $prepare_plugin[$data['slug']]['icons']['1x']; ?>" class="plugin-icon" alt="<?php echo $prepare_plugin[$data['slug']]['name']; ?>">
											</a>
										</h3>
									</div>
									<div class="desc column-description" style="margin-right: 0;">
										<p><?php echo wp_trim_words( $prepare_plugin[$data['slug']]['description'], 23, '....'); ?></p>
										<p class="authors"> <cite><?php echo esc_html__( 'By ', 'cf7-extensions' ).$prepare_plugin[$data['slug']]['author']; ?></cite></p>
									</div>
								</div>

								<div class="plugin-card-bottom">
									<div class="column-updated">
										<button class="<?php echo $button_classes; ?>" data-pluginopt='<?php echo wp_json_encode( $data ); ?>'><?php echo $button_text; ?></button>
									</div>
									<div class="column-downloaded">
										<a href="<?php echo esc_url( admin_url() ) ?>/plugin-install.php?tab=plugin-information&plugin=<?php echo $data['slug']; ?>&TB_iframe=true&width=772&height=577" class="thickbox open-plugin-details-modal"><?php echo esc_html__( 'More Details', 'cf7-extensions' ); ?></a>
									</div>
								</div>

							</div>

			            <?php endif; ?>
		            <?php endforeach; ?>
	            </div>
   			</div>
   		<?php 
   	}

   	public function get_plugins( $username = 'htplugins' ){
   		$transient_var = 'extcf7_htplugins_list_'.$username;
    	$org_plugins_list = get_transient( $transient_var );
    	if ( false === $org_plugins_list ) {
    		$plugins_list_by_authoir = plugins_api( 'query_plugins', array( 'author' => $username, 'per_page'=>100 ) );
    		set_transient( $transient_var, $plugins_list_by_authoir->plugins, 1 * DAY_IN_SECONDS );
    		$org_plugins_list = $plugins_list_by_authoir->plugins;
    	}
    	return $org_plugins_list;
   	}

}

Extensions_Cf7_Recomendation::instance();

?>