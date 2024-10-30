<?php

/**
 * Fired during plugin activation
 * @since      2.0.4
 *
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.0.4
 * @package    mini-cart-for-woocommerce
 * @subpackage mini-cart-for-woocommerce/includes

 */
class Mcfwc_Activator_Light {


	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.0.4
	 */
	public static function activate() {

		flush_rewrite_rules();
		
		add_option('whmc_option' , '');


		update_option('whmc_option' , sanitize_text_field($_POST['whmc_option']));

	}

}
