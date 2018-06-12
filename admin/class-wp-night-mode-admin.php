<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/markoarula
 * @since      1.0.0
 *
 * @package    Wp_Night_Mode
 * @subpackage Wp_Night_Mode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Night_Mode
 * @subpackage Wp_Night_Mode/admin
 * @author     Marko Arula <marko.arula21@gmail.com>
 */
class Wp_Night_Mode_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-night-mode-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-night-mode-admin.js', array( 'jquery' ), $this->version, false );

		wp_localize_script( $this->plugin_name, 'ajax_login_object', array(
			'ajaxurl'          => admin_url( 'admin-ajax.php' ),
			'logouturl'        => wp_logout_url( home_url() ),
			'redirecturl'      => esc_url( home_url() ),
			'success_register' => esc_html__( 'User created. Activate via email', 'wp-night-mode' ),
		));

	}

	/**
	 * Add Shortcode
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_shortcode() {

		$wp_night_mode = isset( $_COOKIE['wpNightMode'] ) ? $_COOKIE['wpNightMode'] : '';

	    if ( 'true' == $wp_night_mode ) {
			return '<div class="wp-night-mode-button active"><div class="wp-night-mode-slider round"></div></div>';
	    } else {
			return '<div class="wp-night-mode-button"><div class="wp-night-mode-slider round"></div></div>';
	    }

	}


	/**
	 * Register Customizer.
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_customize_register($wp_customize) {

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

	    $wp_customize->add_section('wp_night_mode_color_scheme', array(
            'title'    => __('Night Mode', 'wp-night-mode'),
            'description' => __('If you want to change color in some other elements you can use the Additional CSS field. CSS example: body.wp-night-mode-on .element-class { color: #000; }', 'wp-night-mode'),
            'priority' => 1200,
        ));

        //  =============================
        //  Toggle Off Color
        //  =============================
        $wp_customize->add_setting('wp_night_mode_toggle_off_color', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_toggle_off_color', array(
            'label'    => __('Toggle Off Color', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_toggle_off_color',
        )));

        //  =============================
        //  Toggle On Color
        //  =============================
        $wp_customize->add_setting('wp_night_mode_toggle_on_color', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_toggle_on_color', array(
            'label'    => __('Toggle On Color', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_toggle_on_color',
        )));

        //  =============================
        //  Body Backgrpund
        //  =============================
        $wp_customize->add_setting('wp_night_mode_body_background', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_body_background', array(
            'label'    => __('Body Background', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_body_background',
        )));

        //  =============================
        //  Text Color
        //  =============================
        $wp_customize->add_setting('wp_night_mode_text_color', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_text_color', array(
            'label'    => __('Text Color', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_text_color',
        )));

        //  =============================
        //  Link Color
        //  =============================
        $wp_customize->add_setting('wp_night_mode_link_color', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_link_color', array(
            'label'    => __('Link Color', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_link_color',
        )));

        //  =============================
        //  Link Hover Color
        //  =============================
        $wp_customize->add_setting('wp_night_mode_link_hover_color', array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_link_hover_color', array(
            'label'    => __('Link Hover Color', 'wp-night-mode'),
            'section'  => 'wp_night_mode_color_scheme',
            'settings' => 'wp_night_mode_link_hover_color',
        )));

	}

}
