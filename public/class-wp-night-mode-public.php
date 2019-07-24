<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/markoarula
 * @since      1.0.0
 *
 * @package    Wp_Night_Mode
 * @subpackage Wp_Night_Mode/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Night_Mode
 * @subpackage Wp_Night_Mode/public
 * @author     Marko Arula <marko.arula21@gmail.com>
 */
class Wp_Night_Mode_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Night_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Night_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( is_rtl() ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-night-mode-public-rtl.css', array(), $this->version, 'all' );
		} else {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-night-mode-public.css', array(), $this->version, 'all' );
		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Night_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Night_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

        $plugin_admin = new Wp_Night_Mode_Admin( $this->plugin_name, $this->version );
        $button_html = $plugin_admin->wp_night_mode_shortcode( '' );
        $wp_night_mode_default = get_theme_mod( 'wp_night_mode_default' );

        // print_r('time()');
        // print_r(time());

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-night-mode-public.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name, 'wpnmObject', array(
            'button_html' => $button_html,
            'default' => $wp_night_mode_default,
            'server_time' => time(),
            'turn_on_time' => strtotime( get_theme_mod('wp_night_mode_turn_on_time') ),
            'turn_off_time' => strtotime( get_theme_mod('wp_night_mode_turn_off_time') ),
        ) );

	}

	/**
	 * Add classes to body.
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_body_classes( $classes ) {

		$wp_night_mode = isset( $_COOKIE['wpNightMode'] ) ? $_COOKIE['wpNightMode'] : '';

	    if ( 'true' === $wp_night_mode ) {
	        $classes[] = 'wp-night-mode-on';
	    }

	    return $classes;

	}

	/**
	 * Customizer CSS.
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_customizer_css() {

		$wp_night_mode_toggle_size = get_theme_mod('wp_night_mode_toggle_size', '');
		$toggle_size_css = '';
		if ('' !== $wp_night_mode_toggle_size && '14' !== $wp_night_mode_toggle_size) {
			$toggle_size_css = '
				.wpnm-button.style-1,
				.wpnm-button.style-2,
				.wpnm-button.style-3,
				.wpnm-button.style-4,
				.wpnm-button.style-5 {
					font-size: ' . $wp_night_mode_toggle_size . 'px;
				}
			';
		}

		$output_css =
		' ' . $toggle_size_css . '
			.wp-night-mode-slider {
				background-color: ' . get_theme_mod('wp_night_mode_toggle_off_color', '') . ';
			}

			.wp-night-mode-button.active .wp-night-mode-slider {
				background-color: ' . get_theme_mod('wp_night_mode_toggle_on_color', '') . ';
			}

			body.wp-night-mode-on * {
				background: ' . get_theme_mod('wp_night_mode_body_background', '') . ';
			}

			body.wp-night-mode-on .customize-partial-edit-shortcut button,
			body.wp-night-mode-on .customize-partial-edit-shortcut button svg,
			body.wp-night-mode-on #adminbarsearch,
			body.wp-night-mode-on span.display-name,
			body.wp-night-mode-on span.ab-icon,
			body.wp-night-mode-on span.ab-label {
			    background: transparent;
			}

			body.wp-night-mode-on * {
				color: ' . get_theme_mod('wp_night_mode_text_color', '') . ';
			}

			body.wp-night-mode-on a {
				color: ' . get_theme_mod('wp_night_mode_link_color', '') . ';
			}

			body.wp-night-mode-on a:hover,
			body.wp-night-mode-on a:visited,
			body.wp-night-mode-on a:active {
				color: ' . get_theme_mod('wp_night_mode_link_hover_color', '') . ';
			}
		}';

		?>
			<style type="text/css">
				<?php echo $output_css; ?>
				@media (prefers-color-scheme: dark) {
					<?php echo $output_css; ?>
				}
			</style>
		<?php
	}

}
