<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * The admin-facing functionality of the plugin.
 *
 * This is used to define all dashboard details as menus, admin-specific hooks site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    fpwd-order-status-checker
 * @subpackage fpwd-order-status-checker/includes
 * @author     fpwd <rafal@wpfoxly.com>
 */

class FpwdOrderStatusCheckerAdmin {
	private $order_status_checker_options;

	public function __construct() {

		add_action( 'admin_menu', array( $this, 'order_status_checker_add_plugin_page' ) );
		add_action( 'admin_init', array( $this, 'order_status_checker_page_init' ) );

        $this->load_timber_views();
	}

	public function order_status_checker_add_plugin_page() {
		add_options_page(
			'Order Status Checker', // page_title
			'Order Status Checker', // menu_title
			'manage_options', // capability
			'order-status-checker', // menu_slug
			array( $this, 'order_status_checker_create_admin_page' ) // function
		);
	}

	public function order_status_checker_create_admin_page() {
		$this->order_status_checker_options = get_option( 'order_status_checker_option_name' ); ?>

		<div class="wrap">
			<h2>Order Status Checker Settings</h2>
            <p><?php _e('More info about API Keys: ', 'fpwd-order-status-checker') ?><a href="https://woocommerce.com/document/woocommerce-rest-api/" target="_blank">https://woocommerce.com/document/woocommerce-rest-api/</a></p>
			<?php settings_errors(); ?>

			<form method="post" action="options.php">
				<?php
					settings_fields( 'order_status_checker_option_group' );
					do_settings_sections( 'order-status-checker-admin' );
					submit_button();
				?>
			</form>
		</div>
	<?php }

	public function order_status_checker_page_init() {
		register_setting(
			'order_status_checker_option_group', // option_group
			'order_status_checker_option_name', // option_name
			array( $this, 'order_status_checker_sanitize' ) // sanitize_callback
		);

		add_settings_section(
			'order_status_checker_setting_section', // id
			'Settings', // title
			array( $this, 'order_status_checker_section_info' ), // callback
			'order-status-checker-admin' // page
		);

		add_settings_field(
			'consumer_key_0', // id
			'Consumer Key', // title
			array( $this, 'consumer_key_0_callback' ), // callback
			'order-status-checker-admin', // page
			'order_status_checker_setting_section' // section
		);

        add_settings_field(
            'consumer_secret_1', // id
            'Consumer Secret', // title
            array( $this, 'consumer_secret_1_callback' ), // callback
            'order-status-checker-admin', // page
            'order_status_checker_setting_section' // section
        );

        add_settings_field(
            'woocommerce_url_2', // id
            'WooCommerce Website URL', // url
            array( $this, 'woocommerce_url_2_callback' ), // callback
            'order-status-checker-admin', // page
            'order_status_checker_setting_section' // section
        );
	}

	public function order_status_checker_sanitize($input) {
		$sanitary_values = array();
		if ( isset( $input['consumer_key_0'] ) ) {
			$sanitary_values['consumer_key_0'] = sanitize_text_field( $input['consumer_key_0'] );
		}

        if ( isset( $input['consumer_secret_1'] ) ) {
            $sanitary_values['consumer_secret_1'] = sanitize_text_field( $input['consumer_secret_1'] );
        }

        if ( isset( $input['woocommerce_url_2'] ) ) {
            $sanitary_values['woocommerce_url_2'] = sanitize_text_field( $input['woocommerce_url_2'] );
        }

		return $sanitary_values;
	}

	public function order_status_checker_section_info() {

	}

	public function consumer_key_0_callback() {
		printf(
			'<input class="regular-text" type="text" name="order_status_checker_option_name[consumer_key_0]" id="consumer_key_0" value="%s">',
			isset( $this->order_status_checker_options['consumer_key_0'] ) ? esc_attr( $this->order_status_checker_options['consumer_key_0']) : ''
		);
	}

    public function consumer_secret_1_callback() {
        printf(
            '<input class="regular-text" type="text" name="order_status_checker_option_name[consumer_secret_1]" id="consumer_secret_1" value="%s">',
            isset( $this->order_status_checker_options['consumer_secret_1'] ) ? esc_attr( $this->order_status_checker_options['consumer_secret_1']) : ''
        );
    }

    public function woocommerce_url_2_callback() {
        printf(
            '<input class="regular-text" type="text" name="order_status_checker_option_name[woocommerce_url_2]" id="woocommerce_url_2" value="%s">',
            isset( $this->order_status_checker_options['woocommerce_url_2'] ) ? esc_attr( $this->order_status_checker_options['woocommerce_url_2']) : ''
        );
    }

    /**
     * Call the Timber Instance Class.
     * Twig template engine for WordPress
     *
     * @since    1.0.0
     */
    public function load_timber_views() {
        $timber = new \Timber\Timber();
        Timber::$locations = array(
            realpath( dirname( __FILE__ ) ) . '/partials/views'
        );
    }
}