<?php
require_once( 'ycb-minicart-widget.php' );

add_action( 'widgets_init', 'ycb_register_widgets', 50 );
//* Registers a widget
function ycb_register_widgets() {
  //* Register Minicart widget
  register_widget( 'YCB_Minicart_Widget' );
}

function ycb_wc_add_to_cart_fragment( $fragments ) {
  global $woocommerce, $theme_options;
  
    //$cart_icon = '<i class="ion-ios-cart-outline"></i>';
    $cart_icon = '<i class="icon ycb-cart"></i>';
    
  ob_start();
?>
  <span class="widget_shopping_cart cart-contents">
    <span class="minicart">
      <?php echo $cart_icon; ?> 
      <span class="total-items">
        <?php echo sprintf(_n( '%d', '%d', WC()->cart->cart_contents_count, 'woothemes' ), WC()->cart->cart_contents_count ); ?>
      </span>
    </span>           
  </span>
      
<?php
  $fragments['span.cart-contents'] = ob_get_clean();
  return $fragments;
}
add_filter('add_to_cart_fragments', 'ycb_wc_add_to_cart_fragment' );