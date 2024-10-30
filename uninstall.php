<?php

/**
 * Fired when the plugin is uninstalled.
  *
 * @link       https://sharabindu.com
 * @since      2.0.4
 *
 * @package    mini-cart-for-woocommerce
 */

// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}


delete_option('whmc_option' );