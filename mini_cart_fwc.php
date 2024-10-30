<?php

/**
 * Plugin Name:       Mini Cart for WooCommerce
 * Plugin URI:        https://wordpress.org/plugins/mini-cart-for-woocommerce/
 * Description:        This plugin adds a cart icon to users' websites and has a clickable side cart feature
 * Version:           2.0.4
 * Author:            Sharabindu
 * Author URI:        https://sharabindu.com/plugins/woo-header-mini-cart/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mini-cart-for-woocommerce
 * Domain Path:       /languages
 */


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if (! defined('WHMC_PLUGIN_ID')) {
	define( 'WHMC_PLUGIN_ID', 'mini-cart-for-woocommerce' ); // unique prefix (same plugin ID name for 'lite' and 'pro')
}



/**
 * Currently plugin version.
 * 
 */
define( 'MCFWC_LIGHT_VERSION', '2.0.4' );

/**
 * Currently plugin path.
 * 
 */
define( 'MCFWC_LIGHT_PATH', plugin_dir_path( __FILE__ ) );



define( 'MCFWC_LIGHT_URL', plugin_dir_url( __FILE__ ) );


if (! defined('MCFWC_LIGHT_PLUGIN_ID')) {
   define( 'MCFWC_LIGHT_PLUGIN_ID', 'whmc_menu' ); // unique prefix (same plugin ID name for 'lite' and 'pro')
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require MCFWC_LIGHT_PATH . 'inc/class-whmc-light.php';

/**
 * This is used to define regiter activation/deactivation hooks, 
 * version of the plugin.
 */
require MCFWC_LIGHT_PATH . 'inc/regiter_hook_light.php';



include_once(ABSPATH.'wp-admin/includes/plugin.php');
if( is_plugin_active('woo_header_mini_cart/woo_header_mini_cart.php') ){
     add_action('update_option_active_plugins', 'mcfwc_deactivate');
}
function mcfwc_deactivate(){
   deactivate_plugins('woo_header_mini_cart/woo_header_mini_cart.php');
}


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    2.0.4
 */

function mcfwc_run_light() {

	$plugin = new WHMC_LIGHT_H();
	$plugin->run();

}


mcfwc_run_light();




