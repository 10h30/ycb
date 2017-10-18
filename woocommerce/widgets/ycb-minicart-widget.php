<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shopping Cart Widget
 *
 * Displays shopping cart widget
 *
 * @author   Chinmoy Paul
 * @category Widgets
 * @version  1.0
 * @extends  WC_Widget
 */
 
class YCB_Minicart_Widget extends WC_Widget {
  /**
	 * Constructor
	 */
	public function __construct() {
		$this->widget_cssclass    = 'woocommerce widget_minicart';
		$this->widget_description = __( "Display the user's Cart.", 'ycb' );
		$this->widget_id          = 'woocommerce_widget_minicart';
		$this->widget_name        = __( 'YCB Mini Cart', 'ycb' );
		$this->settings           = array();

		parent::__construct();
	}
  
  /**
	 * widget function.
	 *
	 * @see WP_Widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
    global $theme_options;
  
    $cart_icon = '<i class="icon ycb-cart"></i>';
                          
		$this->widget_start( $args, $instance );
    
    echo '<div class="minicart-wrapper clearfix">' . "\n";
      
      echo '<span class="widget_shopping_cart cart-contents">';
      
      echo ' <span class="minicart">' . $cart_icon . 
                '<span class="total-items">' . sprintf(_n( '%d', '%d', WC()->cart->cart_contents_count, 'woothemes' ), WC()->cart->cart_contents_count ) . '</span>' .
           ' </span>' . "\n";
           
		  echo '</span>' . "\n";
      
    echo '</div>'; 
      
    // Insert cart widget placeholder - code in woocommerce.js will update this on page load
	  echo '<div class="widget_shopping_cart_content"></div>';

		$this->widget_end( $args );
    
	}
}