<?php 
/** get the value of the setting
 * @uses $options = get_option('wordness(admin)');
 *  field content callbacks = options, fields, pages, docs
*/

/* ------------------------------------- Pages Colors ----- */
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_button_background_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = sanitize_hex_color('#ededed');

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-color-picker-1" id="%3$s-%4$s"
         data-default-color="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_button_textcolor_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = sanitize_hex_color('#46494c');

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-color-picker-2" id="%3$s-%4$s"
         data-default-color="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_page_transition_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = '.75';

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-number-value-1" id="%3$s-%4$s"
        min="%9$s" max="%10$s" step="%11$s" placeholder="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default'],
        $args['min'],
        $args['max'],
        $args['step']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_footer_position_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = '28';

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-number-value-1" id="%3$s-%4$s"
        min="%9$s" max="%10$s" step="%11$s" placeholder="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default'],
        $args['min'],
        $args['max'],
        $args['step']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_footer_width_cb($args) 
{ 
    //be safe default
    if($args['value'] == '') $args['value'] = '22';

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-number-value-1" id="%3$s-%4$s"
        min="%9$s" max="%10$s" step="%11$s" placeholder="%8$s"/>',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default'],
        $args['min'],
        $args['max'],
        $args['step']
    ); 
}
/**
 * Render page branding colors option
 * @string $args = array()
 * @since  1.0.0
 */
function homebtn_footer_text_cb($args) 
{ 

    printf( '<label>%1$s </label> <em> %7$s</em><br>
        <input type="%2$s" name="%3$s[%4$s]" value="%5$s" 
        class="%6$s homebtn-text-field" id="%3$s-%4$s"
        placeholder="%7$s" />',
        $args['label'],
        $args['type'],
        $args['option_name'],
        $args['name'],        
        $args['value'],
        $args['class'],
        $args['description'],
        $args['default']
    ); 
}

