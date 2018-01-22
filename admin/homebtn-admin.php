<?php
/*
@since ver: 1.0.0
Author: Tradesouthwest
Author URI: http://tradesouthwest.com
@package onlist
@subpackage admin/homebtn-admin
*/
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
     
function homebtn_add_options_page() 
{
    add_menu_page(
        esc_html__( 'HomeBtn Settings', 'homebtn' ),
        esc_html__( 'Home Button', 'homebtn' ),
        'manage_options',
        'homebtn',
        'homebtn_options_page',
        'dashicons-admin-tools' 
    );
}   add_action( 'admin_menu', 'homebtn_add_options_page' ); 
 
/** a.) Register new settings
 *  $option_group (page), $option_name, $sanitize_callback
 *  --------
 ** b.) Add sections
 *  $id, $title, $callback, $page
 *  --------
 ** c.) Add fields 
 *  $id, $title, $callback, $page, $section, $args = array() 
 *  --------
 ** d.) Options Form Rendering. action="options.php"
 *
 */
add_action( 'admin_init', 'homebtn_register_admin_options' ); 
// a.) register all settings groups
function homebtn_register_admin_options() 
{
    //options pg
    register_setting( 'homebtn_pages', 'homebtn_pages' );
     

/** *********************
 * b3.) pages section
 *  ******************* */        
    add_settings_section(
        'homebtn_pages_section',
        esc_html__( 'Button Specific Settings', 'homebtn' ),
        'homebtn_pages_section_cb',
        'homebtn_pages'
    );    
    // c.) settings 
    add_settings_field(
        'homebtn_button_background',
        esc_html__( 'Button Background Color', 'wordness' ),
        'homebtn_button_background_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Button Background', 'wordness' ), 
            'type'        => 'text',
            'option_name' => 'homebtn_pages', 
            'name'        => 'homebtn_button_background',
            'value'       => sanitize_hex_color(
                get_option('homebtn_pages')['homebtn_button_background']),
            'class'       => 'select-text',
            'description' => esc_html__( 'Set Background color of button.', 
                             'homebtn' ),
            'default'     => '#ededed'  
        ) );      
    // c.) settings 
    add_settings_field(
        'homebtn_button_textcolor',
        esc_html__( 'Button Text Color', 'wordness' ),
        'homebtn_button_textcolor_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Button text color', 'wordness' ), 
            'type'        => 'text',
            'option_name' => 'homebtn_pages', 
            'name'        => 'homebtn_button_textcolor',
            'value'       => sanitize_hex_color( 
                get_option('homebtn_pages')['homebtn_button_textcolor']), 
            'class'       => 'select-text',
            'description' => esc_html__( 'Set general text color to button.', 
                             'homebtn' ),
            'default'     => '#46494c'  
        ) );  
    // c.) settings #adminmenuback 
    add_settings_field(
        'homebtn_page_transition',
        esc_html__( 'Page Transition Time', 'homebtn' ),
        'homebtn_page_transition_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Set speed of transition', 'homebtn' ), 
            'type'        => 'number',
            'option_name' => 'homebtn_pages',
            'name'        => 'homebtn_page_transition',
            'value'       => hmbt_sanitize_integer(get_option('homebtn_pages')['homebtn_page_transition']),
            'class'       => 'select-text',
            'description' => esc_html__( 'Set how fast of slow the fade in out will be.', 
                             'homebtn' ),
            'default'     => '.75',
            'min'         => 0,
            'max'         => 30,
            'step'        => '.01'  
        ) );  
    // c.) settings #adminmenuback 
    add_settings_field(
        'homebtn_footer_position',
        esc_html__( 'Footer Distance Setting', 'homebtn' ),
        'homebtn_footer_position_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Set distance from bottom of page', 'homebtn' ), 
            'type'        => 'number',
            'option_name' => 'homebtn_pages',
            'name'        => 'homebtn_footer_position',
            'value'       => hmbt_sanitize_integer(get_option('homebtn_pages')['homebtn_footer_position']),
            'class'       => 'select-text',
            'description' => esc_html__( 'Measurement is in &#39;ems&#39;. 1em is approx. 16pxs.', 
                             'homebtn' ),
            'default'     => 0,
            'min'         => '-200',
            'max'         => 500,
            'step'        => '.05'  
        ) );  
            // c.) settings #adminmenuback 
    add_settings_field(
        'homebtn_footer_width',
        esc_html__( 'Width of Timer', 'homebtn' ),
        'homebtn_footer_width_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Set width of element', 'homebtn' ), 
            'type'        => 'number',
            'option_name' => 'homebtn_pages',
            'name'        => 'homebtn_footer_width',
            'value'       => hmbt_sanitize_integer(get_option('homebtn_pages')['homebtn_footer_width']),
            'class'       => 'select-text',
            'description' => esc_html__( 'Measurement is in &#39;ems&#39;. 1em is approx. 16pxs.', 
                             'homebtn' ),
            'default'     => 22,
            'min'         => '-200',
            'max'         => 500,
            'step'        => '.05'  
        ) );  
                    // c.) settings #adminmenuback 
    add_settings_field(
        'homebtn_footer_text',
        esc_html__( 'Text Above Timer', 'homebtn' ),
        'homebtn_footer_text_cb',
        'homebtn_pages',
        'homebtn_pages_section',
        array( 
            'label'       => esc_html__( 'Set text above timer', 'homebtn' ), 
            'type'        => 'text',
            'option_name' => 'homebtn_pages',
            'name'        => 'homebtn_footer_width',
            'value'       => sanitize_text_field(get_option('homebtn_pages')['homebtn_footer_text']),
            'class'       => 'select-text',
            'description' => '',
            'default'     => esc_html__( 'You will be redirected shortly', 'homebtn' ),
        ) );  
}
//sanitize integers with decimals and negative number allowed
//string $pattern , string $subject [, array &$matches [, int $flags = 0 [, int $offset = 0 ]]]
function hmbt_sanitize_integer($val)
{
    if (preg_match('/^-{0,1}\d*\.{0,1}\d+$/', $val)){
    return $val; 
        } else { 
        return false;
    }
}
// options callbacks
include 'homebtn-admin-forms.php';            
/**
 ** Section Callbacks
 *  $id, $title, $callback, $page
 */
// section heading cb
function homebtn_pages_section_cb()
{    
    print( '<hr><div id="HBPages">' );
    print( homebtn_get_wpdb_prefix() );
}    

// d.) render admin page
function homebtn_options_page() 
{
    // check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) return;
    // check if the user have submitted the settings
    // wordpress will add the "settings-updated" $_GET parameter to the url
    if ( isset( $_GET['settings-updated'] ) ) {
    // add settings saved message with the class of "updated"
    add_settings_error( 'homebtn_messages', 'homebtn_message', 
                        esc_html__( 'Settings Saved', 'homebtn' ), 'updated' );
    }
    // show error/update messages
    settings_errors( 'homebtn_messages' );
    ?>
    <div class="wrap wrap-homebtn-admin">
    
    <h1><span id="HomebtnOptions" class="dashicons dashicons-admin-tools"></span></h1>
         
    <form action="options.php" method="post">
    <?php
        settings_fields( 'homebtn_pages' );
        do_settings_sections( 'homebtn_pages' ); 
        submit_button( 'Save Settings' ); 
    ?>
    </form>
    
    </div>
<?php 
} 

/**
 * WordPress Database Table prefix.
 * @display at very bottom of last options page.
 * You can have multiple installations in one database if you give each a unique
 * prefix. 
 */ 
function homebtn_get_wpdb_prefix() 
{
    global $wpdb;
		$prefx = $wpdb->prefix;
		return $prefx;
}

?>
