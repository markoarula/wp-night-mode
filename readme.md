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