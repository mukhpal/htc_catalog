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
	
	/**
	 * @snippet       WooCommerce User Registration Shortcode 
	 */
	   
	add_shortcode( 'wc_reg_form_bbloomer', 'bbloomer_separate_registration_form' );
		 
	function bbloomer_separate_registration_form() {
	   if ( is_user_logged_in() ) return '<p>You are already registered</p>';
	   ob_start();
	   do_action( 'woocommerce_before_customer_login_form' );
	   $html = wc_get_template_html( 'myaccount/form-login.php' );
	   $dom = new DOMDocument();
	   $dom->encoding = 'utf-8';
	   $dom->loadHTML( utf8_decode( $html ) );
	   $xpath = new DOMXPath( $dom );
	   $form = $xpath->query( '//form[contains(@class,"register")]' );
	   $form = $form->item( 0 );
	   echo $dom->saveXML( $form );
	   return ob_get_clean();
	}

?>
 
 
 