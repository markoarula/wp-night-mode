(function( $ ) {
	'use strict';
// Variables
	const cookies = {
		setCookie(key, value, time, path) {
			const expires = new Date();
			expires.setTime(expires.getTime() + (time));
			let pathValue = '';

			if (typeof path !== 'undefined') {
				pathValue = `path=${path};`;
			}

			document.cookie = `${key}=${value};${pathValue}expires=${expires.toUTCString()}`;
		},
		getCookie(key) {
			const keyValue = document.cookie.match(`(^|;) ?${key}=([^;]*)(;|$)`);
			return keyValue ? keyValue[2] : null;
		},
		setHalfDay() {
			return 43200000;
		},
		setOneDay() {
			return 86400000;
		},
		setOneYear() {
			return 31540000000;
		},
		setHalfAnHour() {
			return 1800000;
		},
		setOneMonth() {
			return 2628000000;
		},
	};

// Call Functions
	$( window ).load(function() {
		wp_night_mode_element_to_button();
	});

	$( document ).on( 'click', '.wp-night-mode-button', wp_night_mode_button_click );

// Functions
	function wp_night_mode_element_to_button() {
		let buttonHtml = '';

		if ( 'true' === cookies.getCookie( 'wp-night-mode' ) ) {
			buttonHtml = '<div class="wp-night-mode-button active"><div class="wp-night-mode-slider round"></div></div>';
		} else {
			buttonHtml = '<div class="wp-night-mode-button"><div class="wp-night-mode-slider round"></div></div>';
		}

		$( 'body' ).find( '.wp-night-mode' ).html( buttonHtml );
	}

	function wp_night_mode_button_click(e) {
		e.preventDefault();
		let $this = $(this);

        if ( ! $this.hasClass( 'active' ) ) {
            $this.addClass('active');
            $( 'body' ).addClass( 'wp-night-mode-on' );
            cookies.setCookie( 'wp-night-mode', 'true', cookies.setOneMonth(), '/' );
        } else {
            $this.removeClass( 'active' );
            $( 'body ').removeClass( 'wp-night-mode-on' );
            cookies.setCookie( 'wp-night-mode', 'false', cookies.setOneMonth(), '/' );
        }
    }

})( jQuery );