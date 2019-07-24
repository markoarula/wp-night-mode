# WP Night Mode

This is a simple wordpress plugin for registration and logging via modal windows. You can use it, test it, expand it etc. What ever works for you.

## How to use

You can download this repo and then just install plugin to your theme.

After that, it's pretty easy to use it:

1. Upload `wp-night-mode` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use `wp-night-mode` class on any element (for example Menu item) or `[wp-night-mode-button]` shortcode to show Night Mode toggle button
4. Shortcode options:
	- "style" option, for Toggle Style. Use it like this: `[wp-night-mode-button style="4"]`
5. Go to Customizer and set styles for Night Mode

## Changelog

### Ver 1.0.0

* Initial release

### Ver 1.0.1

* Tested on WordPress 4.9.8
* Fixed issue: toggle button does not work on mobiles and tablet
* Added cookies so that browsers can know whether the user has switched to night mode or not

### Ver 1.0.2

* Added Toggle Style selector in Customizer and 5 different styles of toggle switcher are availabled now

### Ver 1.0.3

* Fixed small CSS error

### Ver 1.0.4

* Tested on WordPress 5.1.1
* Tested with Gutenberg
* Fixed cache issue and tested with plugins: Comet Cache, WP Rocket and Autoptimize

### Ver 1.0.5

* Tested on WordPress 5.2.2
* Added "Night Mode as Default" option (on first website visit user will see Night Mode and can switch to Light Mode)
* Added `prefers-color-scheme` media query (media query to detect if the user has set their system to use a light or dark color theme)
* Added "Toggle Size" option (easily change the size of the toggle button)
