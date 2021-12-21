<?php
/**
 === FromPolandWithDev - Order Status Checker ===
 *
 * @link              https://frompolandwithdev.com/
 * @since             1.0.0
 * @package           fpwd-order-status-checker
 *
 * @wordpress-plugin
 * Plugin Name:     FromPolandWithDev - Order Status Checker
 * Plugin URI:      https://frompolandwithdev.com/
 * Description:     Recruiment task
 * Version:         1.0.0
 * Author:          Rafał Osiński
 * Author URI:      https://wpfoxly.com/
 * License:         GPL-2.0+ License
 * URI:             http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:     fpwd-order-status-checker
 * Domain Path:     /languages
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fpwdorderstatuschecker-activator.php
 */
if ( ! function_exists( 'activateFpwdOrderStatusChecker' ) ) {
    function activateFpwdOrderStatusChecker() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-fpwdorderstatuschecker-activator.php';
        FpwdOrderStatusCheckerActivator::activate();
    }
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fpwdorderstatuschecker-deactivator.php
 */
if ( ! function_exists( 'deactivateFpwdOrderStatusChecker' ) ) {
    function deactivateFpwdOrderStatusChecker() {
        require_once plugin_dir_path( __FILE__ ) . 'includes/class-fpwdorderstatuschecker-deactivator.php';
        FpwdOrderStatusCheckerDeactivator::deactivate();
    }
}
register_activation_hook( __FILE__, 'activateFpwdOrderStatusChecker' );
register_deactivation_hook( __FILE__, 'deactivateFpwdOrderStatusChecker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fpwdorderstatuschecker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function runFpwdOrderStatusChecker() {

    $plugin = new FpwdOrderStatusChecker();
    $plugin->run();

}
runFpwdOrderStatusChecker();
