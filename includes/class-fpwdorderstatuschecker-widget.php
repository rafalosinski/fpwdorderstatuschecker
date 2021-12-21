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
	 * construct function
	 */
	function __construct() {
		parent::__construct(
			'fpwdorderstatuschecker',
			__( 'Order Status Checker Widget', 'fpwdorderstatuschecker' ),
			array( 'description' => __( 'Widget on Sidebar', 'fpwdorderstatuschecker' ), )
		);
	}

	/**
	 * display widget content
	 */
	public function widget( $args, $instance ) {

		echo $args[ 'before_widget' ];
		if ( ! empty( $instance['title'] ) ) {
			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];
		}

        $message = ! empty( $instance['message'] ) ? $instance['message'] : esc_html__( 'Your current order status:', 'fpwdorderstatuschecker' );
        $btn = ! empty( $instance['btn'] ) ? $instance['btn'] : esc_html__( 'Check order status', 'fpwdorderstatuschecker' );

        ?>
        <form method="post">
            <p>
                <label for="fpwdorderstatuscheker-order-number" style="display: block;"><?php _e( 'Order ID', 'fpwdorderstatuschecker' ) ?></label>
                <input type="text" value="" name="fpwdorderstatuscheker-order-number" id="fpwdorderstatuscheker-order-number" required />
            </p>
            <p>
                <label for="fpwdorderstatuscheker-order-email" style="display: block;"><?php _e( 'Order E-mail', 'fpwdorderstatuschecker' ) ?></label>
                <input type="email" value="" name="fpwdorderstatuscheker-order-email" id="fpwdorderstatuscheker-order-email" required />
            </p>
            <p id='fpwdorderstatuscheker-status'>
                <?php _e( $message, 'fpwdorderstatuschecker' ) ?>
            </p>
            <p>
                <label for="fpwdorderstatuscheker-save">
                    <input type="submit" name="fpwdorderstatuscheker-save" id="fpwdorderstatuscheker-save" value="<?php echo $btn ?>"/>
                </label>
            </p>
        </form>
        <?php
		echo $args[ 'after_widget' ];
	}


	/**
	 * widget form
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
	 * widget update
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['btn'] = (!empty($new_instance['btn'])) ? strip_tags($new_instance['btn']) : '';
        $instance['message'] = (!empty($new_instance['message'])) ? strip_tags($new_instance['message']) : '';

		return $instance;
	}
}
