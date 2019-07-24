<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/markoarula
 * @since             1.0.0
 * @package           Wp_Night_Mode
 *
 * @wordpress-plugin
 * Plugin Name:       WP Night Mode
 * Plugin URI:        https://github.com/markoarula/wp-night-mode
 * Description:       Allow users to change the website style while reading at night, enabling them to easily read and spend more time on your site.
 * Version:           1.0.5
 * Author:            Marko Arula
 * Author URI:        https://github.com/markoarula
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-night-mode
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'Wp_Night_Mode', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-night-mode-activator.php
 */
function activate_wp_night_mode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-night-mode-activator.php';
	Wp_Night_Mode_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-night-mode-deactivator.php
 */
function deactivate_wp_night_mode() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-night-mode-deactivator.php';
	Wp_Night_Mode_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_night_mode' );
register_deactivation_hook( __FILE__, 'deactivate_wp_night_mode' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-night-mode.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_night_mode() {

	$plugin = new Wp_Night_Mode();
	$plugin->run();

}
run_wp_night_mode();
