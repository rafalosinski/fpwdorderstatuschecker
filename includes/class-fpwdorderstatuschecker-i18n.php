<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    fpwd-order-status-checker
 * @subpackage fpwd-order-status-checker/includes
 * @author     fpwd <rafal@wpfoxly.com>
 */
class FpwdOrderStatusCheckerI18n {

	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_fpwd_order_status_checker_loader() {
		load_plugin_textdomain(
			'fpwdorderstatuschecker',
			false,
			basename( dirname ( dirname( __FILE__ ) ) ) . '/languages/'
		);
	}
}
