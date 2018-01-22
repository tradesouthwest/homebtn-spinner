/**
 * Ajax call for php function
 */ 
jQuery(document).ready(function() {
    jQuery(window).scroll( function(e) {
        
    	var scrollHeight = jQuery(document).height();
    	var scrollPosition = jQuery(window).height() + jQuery(window).scrollTop();
        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
	    // when scroll to bottom of the page



    //var hmbt_post_id = jQuery(this).data( 'id' );        
    var ajax_url = ajax_params.ajax_url; // access ajax_url @ajax_params object
    var data = {
        'action': 'homebtn_do_ajax_request',
        'url': $_GET['homepg'],
        'security' : 'homebtn_transition.check_nonce'
    };
 
        jQuery.post(ajax_url, data, function(response) {
            jQuery(this).data();
        });
        
        
        /* /scroll */
        }
    });
    e.prevent_default();

    /* /doc */
    });
});


