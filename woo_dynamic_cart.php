<?php
/**
 * Plugin Name: Dynamic Cart Quantity for WooCommerce
 * Plugin URI: https://www.tannich.com/plugins
 * Description: This plugin will hide the WooCommerce "Update Cart" button and reload the quantity changes dynamic over jQuery. You don't need this extra click anymore!
 * Version: 1.1
 * Author: Marcel Tannich
 * Author URI: https://www.tannich.com
 *
 * @package Woo Dynamic Cart Quantity Update
 * License: GPL2+
 * License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: woo-update-cart-qty-dynamic
 *
 * Woo Update Cart Qty Dynamic plugin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Woo Update Cart Qty Dynamic plugin is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Woo Update Cart Qty Dynamic. If not, see https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) || die( 'No script kiddies please!' );  // prevent direct access

/* Init for Translation ready */
function dcqfw_init() {
	load_plugin_textdomain( 'woo-update-cart-qty-dynamic', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/* Update Cart */
add_action( 'wp_footer', 'dcqfw_update_cart' ); 
function dcqfw_update_cart() { 
    if (is_cart()) : 
    ?> 
    <script> 
    jQuery('div.woocommerce').on('change', '.qty', function(){ 
        jQuery("[name='update_cart']").trigger("click");
         }); 
    </script> 
    <?php 
    endif; 
}

/* CSS to hide Update Button */
function dcqfw_hide_button() {

global $value;
$num = $value/2;

echo '
        <style type="text/css">
        button[name="update_cart"] {
        display: none !important;   
        </style>
    ';
}
add_action( 'wp_print_styles', 'dcqfw_hide_button' );