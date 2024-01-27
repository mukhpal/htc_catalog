<?php
/**
 * Class Post Type
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
class Outbuilt_Class_Sidebar {

	/**
	 * Start things up
	 */
	public function __construct() {
		add_action( 'widgets_init', array( $this, 'class_sidebar' ), 20 );
		add_filter( 'outbuilt_get_sidebar', array( $this, 'display_sidebar' ) );
	}

	public function class_sidebar() {

		register_sidebar(
			array(
				'name'          => esc_html__( 'Class', 'outbuilt-class' ),
				'id'            => 'class-sidebar',
				'description'   => esc_html__( 'Sidebar for class page', 'outbuilt-class' ),
				'before_widget' => '<aside id="%1$s" class="widget %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title module-title">',
				'after_title'   => '</h3>',
			)
		);
	}

	/**
	 * Register class post type
	 */
	public function display_sidebar() {
		if ( is_post_type_archive( 'class' ) || is_singular( 'class' ) ) {
			return 'class-sidebar';
		}
	}

}

new Outbuilt_Class_Sidebar();
