<?php 
/** 
 * Plugin Name: HomeBtn
 * Description:  Creates a back to home buuton at bottom of posts.
 * Version: 1.0.0
 * Author: Tradesouthwest @codeable.io
 * Author URI: http://tradesouthwest.com
 * Filters and Actions hooks are loaded on this page.
 */
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if (!defined('HOMEBTN_VER')) { define('HOMEBTN_VER', '1.0.0'); } 
if (!defined('HOMEBTN_URL')) { define( 'HOMEBTN_URL', plugin_dir_url(__FILE__)); }
/** 
 * activate/deactivate hooks
 */
function homebtn_plugin_activation()
{
   //return false;
} 
/**
 * house keeeping fallback
 */
function homebtn_plugin_deactivation()
{ 
    if ( ! current_user_can( 'activate_plugins' ) )
        return;
        $plugin = isset( $_REQUEST['plugin'] ) ? $_REQUEST['plugin'] : '';
        check_admin_referer( "deactivate-plugin_{$plugin}" );
} 
/**
 * enqueue text-domain
 * example usage: German MO and PO files should be named
 * homebtn-de_DE.mo and homebtn-de_DE.po.
 */
function homebtn_load_plugin_textdomain()
{
    load_plugin_textdomain( 'homebtn', FALSE,
                            plugins_url( basename( __DIR__ )) . '/languages/'
                      );
}
    add_action( 'init', 'homebtn_load_plugin_textdomain' );
/** 
 * enqueue scripts specific to admin side
 * wp_enqueue_style( $handle, $src, 'name-styles', $ver, $media ); 
 */
if( is_admin() ) : 
function homebtn_plugin_enqueue_admin_scripts()
{   
    //color
    wp_register_script( 'homebtn-color-script',                         
                        plugin_dir_url(__FILE__) . 'lib/homebtn-color-picker.js', 
                        array( 'jquery', 'wp-color-picker' ), 
                        '1.0', true ); 
    //put scripts to head
    wp_enqueue_style ( 'wp-color-picker' ); 
	wp_enqueue_script( 'wp-color-picker');
    wp_enqueue_script( 'homebtn-color-script' );

}
    add_action( 'admin_enqueue_scripts', 
                'homebtn_plugin_enqueue_admin_scripts' );
    require_once( plugin_dir_path(__FILE__) . '/admin/homebtn-admin.php' );
endif;

//enqueue or localise scripts to public side of site
function homebtn_enqueue_public_style() 
{   
    wp_register_style( 'homebtn-public', 
                        HOMEBTN_URL . 'lib/homebtn-public.css' );
    wp_enqueue_style( 'homebtn-public' );
    
    wp_register_script( 'homebtn-scripts', 
                        plugin_dir_url(__FILE__) . 'lib/homebtn-scripts.js', 
                        array( 'jquery' ), 
                        '', 
                        true); 
    
    wp_enqueue_script('homebtn-scripts' );
}
    add_action( 'wp_enqueue_scripts', 'homebtn_enqueue_public_style' );
    //add_action( 'wp_ajax_homebtn_do_ajax_request', 'homebtn_do_ajax_request' );
    //add_action( 'wp_ajax_nopriv_homebtn_do_ajax_request', 'homebtn_do_ajax_request' );
    
    //load shortcode functions
    require_once( plugin_dir_path(__FILE__) . '/public/homebtn-shortcode.php' );
    //register shortcodes
    add_action( 'init', 'homebtn_register_shortcodes' );
    
    //plugin inits
    register_activation_hook( __FILE__,   'homebtn_plugin_activation' );
    register_deactivation_hook( __FILE__, 'homebtn_plugin_deactivation' ); 
?>
