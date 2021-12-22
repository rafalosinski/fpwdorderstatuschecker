<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    fpwd-order-status-checker
 * @subpackage fpwd-order-status-checker/includes
 * @author     fpwd <rafal@wpfoxly.com>
 */
class FpwdOrderStatusChecker {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      FpwdOrderStatusCheckerLoader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->version     = "1.0.0";
		$this->plugin_name = 'fpwd-order-status-checker';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

        global $wp;

		/**
		 * Widget Registration Action
		 */

		add_action( 'widgets_init', function() {
			return register_widget( "FpwdOrderStatusCheckerWidget" );
		} );
	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - FpwdOrderStatusCheckerLoader. Orchestrates the hooks of the plugin.
	 * - FpwdOrderStatusCheckerLoader_i18n. Defines internationalization functionality.
	 * - FpwdOrderStatusCheckerLoader_Admin. Defines all hooks for the admin area.
	 * - FpwdOrderStatusCheckerLoader_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'vendor/autoload.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-fpwdorderstatuschecker-ajax.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fpwdorderstatuschecker-admin.php';
		$this->loader = new FpwdOrderStatusCheckerLoader();
	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the FpwdOrderStatusCheckerLoader_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {
		$pluginI18n = new FpwdOrderStatusCheckerI18n();
		$this->loader->add_action( 'plugins_loaded', $pluginI18n, 'load_plugin_fpwd_order_status_checker_loader' );
	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {
		$plugin_admin       = new FpwdOrderStatusCheckerAdmin( $this->get_plugin_name(), $this->get_version() );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {
		$plugin_public = new FpwdOrderStatusCheckerPublic( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );

//        add_action( 'wp_head',  ) );
        $this->loader->add_action( 'wp_head', $plugin_public, 'fpwdorderstatuscheker_ajax_script' );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    FpwdOrderStatusCheckerLoader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}
}