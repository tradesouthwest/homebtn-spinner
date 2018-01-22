<?php 
/** 
 * @since ver 1.0.1 shortcode omitted
 * @uses do_shortcode( '[homebtn_postcount]' ).
 * + get_post_type, is_single
 */
function homebtn_get_shorty_activated() 
{
    return false;
}

function homebtn_display_button_afterpost() {
        //validate + check
  if ( is_single() && 'post' == get_post_type() ) 
  {     
  $optionstxt = (empty($options['homebtn_footer_text'])) ? 
    "You will be redirected shortly" : $options['homebtn_footer_text'];
        $homepg = get_home_url();
        $mySEC = 5;
        //$shorty = do_shortcode("[hmbt_redirect url='" . $homepg . "' sec='5']");
        ?>
        <script type="text/javascript">
        
    jQuery(window).scroll(function() 
    {
        var ten = 50;
         
    if(jQuery(window).scrollTop() + jQuery(window).height() > jQuery(document).height() - ten ) 
    {
	    if (jQuery("#HomeBtn").css("display") !== "none") {
            jQuery("#HomeBtn").css("display", "none");
        }
            else { 
                jQuery("#HomeBtn").css("display", "block");  
            }
        if (jQuery("#timer").css("display") !== "none") {
            jQuery("#timer").css("display", "none");
        }
            else { 
                jQuery("#timer").css("display", "block");  
            }  
       
            var count=6;
            var counter=setInterval(timer, 1000); 
                function timer() {
                    count=count-1;
                    if (count <= 0)
                    {
                    clearInterval(counter);
                    return;
                    }
                    document.getElementById("timer").innerHTML=count + " secs"; 
                }    
                setTimeout(function() { 
                var htmlString= "<?php echo $homepg; ?>";
                    window.location.href = htmlString;
                }, 6000);
              window.prevent_default();
        }
    });
    </script>
    
    <div id="HomeBtn" style="display:none;">
         <h5><?php echo esc_html($optionstxt); ?></h5>
        <div class="homebtn-section">
            <div class="loader-text">
               
               <span id="timer" style="display:none;"></span>

             </div> 
         </div>
             <div class="loader"></div>

     </div>
        
        <?php 
    } 
  else {
      return false;
  }
}
add_action( 'wp_footer', 'homebtn_display_button_afterpost' );  
/*                  <a href="<?php echo esc_url($homepg); ?>" class="homebtn-button" 
title="">5, 4, 3, 2, 1</a>
 */
//shortcode use in function only - init at bottom of page
//usage: [redirect url='http://somesite.com' sec='5']
//do_shortcode("[hmbt_redirect url='{$homepg}' sec='5']"); 
function homebtn_scr_do_redirect($atts)
{
    if(empty($atts['url']) ) $atts['url'] = get_home_url();

	$myURL = (isset($atts['url']) && !empty($atts['url']))?esc_url($atts['url']):"";
	$mySEC = (isset($atts['sec']) && !empty($atts['sec']))?esc_attr($atts['sec']):"5";
	if(!empty($myURL))
    { 
    $redir = '';
    $redir .= '
    <meta http-equiv="refresh" content="' . $mySEC . '; url=' . $myURL . '">';    
	}
    	return $redir; 
        exit();
}    
    
// body class           
function homebtn_plugin_homebody_class($classes) {
    
        $classes[] = 'homebtn fadeInRight';
            return $classes;
}
    add_filter('body_class', 'homebtn_plugin_homebody_class');   

/**
 * css head inline rendering 
 *
 * @since             1.0.1
 */
function homebtn_button_placement_css() 
{   
    //wp_register_style( $handle, $src, $deps, $ver, $media );
    //colors
    $options = get_option( 'homebtn_pages' );
    $options2 = (empty($options['homebtn_button_background'])) ? 
    "#ededed" : $options['homebtn_button_background'];
    $options3 = (empty($options['homebtn_button_textcolor'])) ? 
    "#46494c" : $options['homebtn_button_textcolor'];
    $options4 = (empty($options['homebtn_page_transition'])) ? 
    ".75" : $options['homebtn_page_transition'];
    $options5 = (empty($options['homebtn_footer_position'])) ? 
    "0" : $options['homebtn_footer_position'];
    $options6 = 4;
    $options7 = (empty($options['homebtn_footer_width'])) ? 
    "59" : $options['homebtn_footer_width'];
    //add styles inline
    ob_start(); 
echo '.homebtn-button{background-color:' . $options2 . '!important; color:' . $options3 . '!important}.home.homebtn.fadeInRight{animation-duration: ' . $options4 . 's;}#HomeBtn{bottom:' . $options5 . 'em;padding-top: ' . $options6 . 'em;width:' . $options7 . 'em;}';
    $output = ob_get_clean();
    wp_enqueue_style(    'homebtn-style', HOMEBTN_URL . 'lib/homebtn-style.css' );
    wp_add_inline_style( 'homebtn-style', $output );
}  
    add_action( 'wp_enqueue_scripts', 'homebtn_button_placement_css' ); 
    
// shortcode init
function homebtn_register_shortcodes() 
{
    add_shortcode('hmbt_redirect', 'homebtn_scr_do_redirect');
} 
