<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @link       https://wpfoxly.com/
 * @since      1.0.0
 * @package    fpwd-order-status-checker
 * @subpackage fpwd-order-status-checker/public
 * @author     fpwd <rafal@wpfoxly.com>
 */
class FpwdOrderStatusCheckerPublic {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * The settings of this plugin.
	 *
	 * @since    1.2.4
	 * @access   private
	 * @var      string $settings The current settings from wp_options table.
	 */
	private $settings;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version     The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version     = $version;

		$this->load_timber_views();
	}
	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * The FpwdOrderStatusCheckerLoader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * The FpwdOrderStatusCheckerLoader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name . "-ajax", plugin_dir_url( __FILE__ ) . 'js/fpwdorderstatuschkecker-ajax.js', array( 'jquery' ), $this->version, false );
	}


    /**
     * Register the ajax admin url.
     *
     * @since    1.0.0
     */
    public function fpwdorderstatuscheker_ajax_script() {
        echo '<script type="text/javascript">var fpwdorderstatuschekerAjaxScript = "' . admin_url('admin-ajax.php') . '"</script>';
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
