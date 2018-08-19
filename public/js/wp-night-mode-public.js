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
	window.onload = function () {
		wp_night_mode_element_to_button();
		wp_night_mode_button_click();
	};

	// Functions
	function wp_night_mode_element_to_button() {
		var buttonHtml = '';
		var buttonClass = document.querySelectorAll('.wp-night-mode');

		if ('true' === wnmCookies.getCookie('wpNightMode')) {
			buttonHtml = '<div class="wp-night-mode-button active"><div class="wp-night-mode-slider round"></div></div>';
		} else {
			buttonHtml = '<div class="wp-night-mode-button"><div class="wp-night-mode-slider round"></div></div>';
		}

		for (var i = 0; i < buttonClass.length; i++) {
			buttonClass[i].innerHTML = buttonHtml;
		}
	}

	function wp_night_mode_button_click() {
		var nightModeButton = document.querySelectorAll('.wp-night-mode-button');

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
})(jQuery);