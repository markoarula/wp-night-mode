(function ($) {
	'use strict';
	// Variables

	var wnmCookies = {
		setCookie: function setCookie(key, value, time, path) {
			var expires = new Date();
			expires.setTime(expires.getTime() + time);
			var pathValue = '';

			if (typeof path !== 'undefined') {
				pathValue = 'path=' + path + ';';
			}

			document.cookie = key + '=' + value + ';' + pathValue + 'expires=' + expires.toUTCString();
		},
		getCookie: function getCookie(key) {
			var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
			return keyValue ? keyValue[2] : null;
		}
	};

	// Call Functions
	document.addEventListener("DOMContentLoaded", function(event) {
		// wp_night_mode_turn_on_time();
		wp_night_mode_default();
		wp_night_mode_element_to_button();
		wp_night_mode_button_click();
		wp_night_mode_load_cookie();
	});

	function wp_night_mode_default() {
		if ('1' === wpnmObject.default && null === wnmCookies.getCookie('wpNightMode')) {
			wnmCookies.setCookie('wpNightMode', 'true', 2628000000, '/');
		}
	}

	// Functions
	function wp_night_mode_turn_on_time() {
		var server_time = wpnmObject.server_time;
		var turn_on_time = wpnmObject.turn_on_time;
		var turn_off_time = wpnmObject.turn_off_time;
		// var h = new Date().getHours();
		// var m = new Date().getMinutes();
		// var time = h + ':' + m;
		// console.log(wpnmObject);
		// console.log(server_time);

		// turn on
		if ( server_time >= turn_on_time && server_time <= turn_off_time ) {
			wnmCookies.setCookie('wpNightMode', 'true', 2628000000, '/');
		}
		// turn off
		// if ( server_time >= turn_off_time && server_time <= turn_on_time ) {
		// 	wnmCookies.setCookie('wpNightMode', 'false', 2628000000, '/');
		// }
	}

	function wp_night_mode_element_to_button() {
		var buttonHtml = '';
		var buttonClass = document.querySelectorAll('.wp-night-mode');

		buttonHtml = wpnmObject.button_html;

		for (var i = 0; i < buttonClass.length; i++) {
			buttonClass[i].innerHTML = buttonHtml;
		}
	}

	function wp_night_mode_button_click() {
		var nightModeButton = document.querySelectorAll('.wpnm-button');

		for (var i = 0; i < nightModeButton.length; i++) {
			nightModeButton.item(i).onclick = function (event) {
				event.preventDefault();
				document.body.classList.toggle('wp-night-mode-on');
				for (var i = 0; i < nightModeButton.length; i++) {
					nightModeButton[i].classList.toggle('active');
				}

				if (this.classList.contains('active')) {
					wnmCookies.setCookie('wpNightMode', 'true', 2628000000, '/');
				} else {
					wnmCookies.setCookie('wpNightMode', 'false', 2628000000, '/');
				}
			};
		}
	}

	function wp_night_mode_load_cookie() {
		var nightModeButton = document.querySelectorAll('.wpnm-button');

		if ('true' === wnmCookies.getCookie('wpNightMode')) {
			document.body.classList.add('wp-night-mode-on');
			for (var i = 0; i < nightModeButton.length; i++) {
				nightModeButton[i].classList.add('active');
			}
		} else {
			document.body.classList.remove('wp-night-mode-on');
			for (var i = 0; i < nightModeButton.length; i++) {
				nightModeButton[i].classList.remove('active');
			}
		}
	}
})(jQuery);
