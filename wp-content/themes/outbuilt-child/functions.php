<?php 
	 add_action( 'wp_enqueue_scripts', 'outbuilt_child_enqueue_styles' );
	 function outbuilt_child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		}
		
	/**
	 * @snippet       WooCommerce User Login Shortcode
	 * @how-to        Get CustomizeWoo.com FREE
	 * @author        Rodolfo Melogli
	 * @compatible    WooCommerce 7
	 * @community     https://businessbloomer.com/club/
	 */
	  
	add_shortcode( 'wc_login_form_bbloomer', 'bbloomer_separate_login_form' );
	  
	function bbloomer_separate_login_form() {
	   if ( is_user_logged_in() ) return '<p>You are already logged in</p>'; 
	   ob_start();
	   do_action( 'woocommerce_before_customer_login_form' );
	   woocommerce_login_form( array( 'redirect' => wc_get_page_permalink( 'myaccount' ) ) );
	   return ob_get_clean();
	}	
	 

	// Add a register link below the WooCommerce login form 
	function add_register_link_below_login_form() {
		?>
	<p class="woocommerce-LostPassword lost_password">
		Don't have an account? <a href="<?php echo esc_url(site_url('/register/')); ?>">Register here</a>.
	</p>
	<?php
	}

	add_action('woocommerce_login_form', 'add_register_link_below_login_form');


	add_action('wp_logout','auto_redirect_after_logout');

	function auto_redirect_after_logout(){
		wp_safe_redirect( home_url() );
		exit;
	}

?>