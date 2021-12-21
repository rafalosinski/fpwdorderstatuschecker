<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    fpwd-order-status-checker
 * @subpackage fpwd-order-status-checker/includes
 * @author     fpwd <rafal@wpfoxly.com>
 */

use Automattic\WooCommerce\Client;

class FpwdOrderStatusCheckerAdminAjax {

    private $post = array();
    protected $new_post;
    private $required = array( 'order_id', 'order_email' );

    public function __construct()
    {
        add_action( "wp_ajax_fpwdorderstatuschecker_check_by_ajax", [ $this, "fpwdorderstatuschecker_check_by_ajax" ] );
        add_action( "wp_ajax_nopriv_fpwdorderstatuschecker_check_by_ajax", [ $this, "fpwdorderstatuschecker_check_by_ajax" ] );
    }

    public function fpwdorderstatuschecker_check_by_ajax( $id ) {

        $this->new_post = $_POST;
        $order_status_checker_options = get_option( 'order_status_checker_option_name' );

        if ( isset( $order_status_checker_options )
            && !empty( $order_status_checker_options['woocommerce_url_2'] )
            && !empty( $order_status_checker_options['consumer_key_0'] )
            && !empty( $order_status_checker_options['consumer_secret_1'] ) ) {

            $woocommerce = new Client(
                $order_status_checker_options['woocommerce_url_2'],
                $order_status_checker_options['consumer_key_0'],
                $order_status_checker_options['consumer_secret_1'],
                [
                    'version' => 'wc/v3',
                    'query_string_auth' => true,
                    'verify_ssl' => false
                ]
            );

            $this->validate();
            if ( $this->validate() === true && $this->check_is_not_empty() === true ) {
                try {
                    $order = $woocommerce->get('orders/' . intval( $this->new_post['order_id'] ) );
                    $response['status'] = $order->status;
                } catch (Exception $e) {
                    $response['error'] = 'Caught exception: ' . $e->getMessage();
                }
                echo json_encode($response);
            }
        }
        exit();
        wp_die();
    }

    public function validate() {
        foreach ( $this->new_post as $key => $value ) {
            if ( isset( $value ) && !empty( $value ) && in_array( $key, $this->required ) ) {
                $new_post[ $key ] = sanitize_text_field( $value );
            }
        }
        $this->new_post = $new_post;
        return true;
    }

    public function check_is_not_empty() {
        if ( count( $this->new_post ) === count( $this->required ) ) {
            return true;
        }
    }
}

new FpwdOrderStatusCheckerAdminAjax();