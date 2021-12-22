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

/**
 * create widget
 */
class FpwdOrderStatusCheckerWidget extends WP_Widget {

    /**
     * The content is responsible for handling generated view content
     * of the widget.
     *
     * @since    1.0.0
     * @access   protected
     * @var      FpwdOrderStatusCheckerWidget $content Maintains all view content which is generated.
     */
    protected $content;

	/**
	 * __construct
     *
     * Generating first instance of a widget in admin dashboard.
     *
     * @since    1.0.0
	 */
	function __construct() {
		parent::__construct(
			'fpwdorderstatuschecker',
			__( 'Order Status Checker Widget', 'fpwdorderstatuschecker' ),
			array( 'description' => __( 'Widget on Sidebar', 'fpwdorderstatuschecker' ), )
		);
	}

	/**
     * The core view plugin method.
     *
     * Generate view of the form on public-facing side. User use that form
     * for requests to the WooCommerce API
     *
     * @since    1.0.0
	 */
	public function widget( $args, $instance ) {
		echo $args[ 'before_widget' ];
		if ( ! empty( $instance['title'] ) ) {
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
		}

        $message = ! empty( $instance['message'] ) ? $instance['message'] : esc_html__( 'Your current order status:', 'fpwdorderstatuschecker' );
        $btn = ! empty( $instance['btn'] ) ? $instance['btn'] : esc_html__( 'Check order status', 'fpwdorderstatuschecker' );

        $this->content['message'] = $message;
        $this->content['btn'] = $btn;
        $this->content['html_prefix'] = "fpwdorderstatuscheker";

        echo Timber::compile( basename(__FILE__, '.php') . '.twig', $this->content );
		echo $args[ 'after_widget' ];
	}

	/**
	 * The core view plugin method.
     *
     * Generate data for the form in a dashboard. Customizing all fields on a plugin view, generated
     * on the website as a widget.
     *
     * @since    1.0.0
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Order Status', 'fpwdorderstatuschecker' );
        $message = ! empty( $instance['message'] ) ? $instance['btn'] : esc_html__( 'Your current order status:', 'fpwdorderstatuschecker' );
		$btn = ! empty( $instance['btn'] ) ? $instance['btn'] : esc_html__( 'Check order status', 'fpwdorderstatuschecker' );
		?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Widget name', 'fpwdorderstatuschecker' ) ?></label>
            <input type="text" value="<?php echo esc_attr( $title ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" id="<?php echo $this->get_field_id( 'title' ); ?>" style="width: 100%">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'message' ); ?>"><?php _e( 'Prefix message before status', 'fpwdorderstatuschecker' ) ?></label>
            <input type="text" value="<?php echo esc_attr( $message ); ?>" name="<?php echo $this->get_field_name( 'message' ); ?>" id="<?php echo $this->get_field_id( 'message' ); ?>" style="width: 100%">
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'btn' ); ?>"><?php _e( 'Button text', 'fpwdorderstatuschecker' ) ?></label>
            <input type="text" value="<?php echo esc_attr( $btn ); ?>" name="<?php echo $this->get_field_name( 'btn' ); ?>" id="<?php echo $this->get_field_id( 'btn' ); ?>" style="width: 100%">
        </p>
		<?php
	}

	/**
	 * Data update method for widget
     *
     * @since    1.0.0
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['btn'] = (!empty($new_instance['btn'])) ? strip_tags($new_instance['btn']) : '';
        $instance['message'] = (!empty($new_instance['message'])) ? strip_tags($new_instance['message']) : '';

		return $instance;
	}
}
