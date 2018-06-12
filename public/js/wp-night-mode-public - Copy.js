(function( $ ) {
	'use strict';

	$( window ).load(function() {
		wp_night_mode_element_to_button();
	});

	$( document ).on( 'click', '.wp-night-mode-button', wp_night_mode_button_click );

	function wp_night_mode_set_cookie(cname, cvalue, exdays) {
	    // var d = new Date();
	    // d.setTime(d.getTime() + (exdays*24*60*60*1000));
	    // var expires = "expires="+ d.toUTCString();
	    // document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
	    document.cookie = cname + "=" + cvalue + "";
	}

	function wp_night_mode_get_cookie(cname) {
	    var name = cname + "=";
	    var decodedCookie = decodeURIComponent(document.cookie);
	    var ca = decodedCookie.split(';');
	    for(var i = 0; i <ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) == ' ') {
	            c = c.substring(1);
	        }
	        if (c.indexOf(name) == 0) {
	            return c.substring(name.length, c.length);
	        }
	    }
	    return "";
	}

	function wp_night_mode_element_to_button() {
		var buttonHtml = '';
		var nightModeCookie = wp_night_mode_get_cookie( 'wp-night-mode' );

		if ( 'true' === nightModeCookie ) {
			buttonHtml = '<div class="wp-night-mode-button active"><div class="wp-night-mode-slider round"></div></div>';
		} else {
			buttonHtml = '<div class="wp-night-mode-button"><div class="wp-night-mode-slider round"></div></div>';
		}

		$( 'body' ).find( '.wp-night-mode' ).html( buttonHtml );
	}

	function wp_night_mode_button_click(e) {
		e.preventDefault();
		var $this = $(this);

        if ( ! $this.hasClass( 'active' ) ) {
            $this.addClass('active');
            $( 'body' ).addClass( 'wp-night-mode-on' );
            wp_night_mode_set_cookie( 'wp-night-mode', 'true' );
        	// Cookies.set( 'wp-night-mode', 'night-mode-active', { expires: 1 } );
        } else {
            $this.removeClass( 'active' );
            $( 'body ').removeClass( 'wp-night-mode-on' );
            wp_night_mode_set_cookie( 'wp-night-mode', 'false' );
            // Cookies.remove( 'wp-night-mode' );
        }
    }

})( jQuery );
