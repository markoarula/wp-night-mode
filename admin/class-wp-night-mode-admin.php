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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-night-mode-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-night-mode-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add Shortcode
	 *
	 * @since    1.0.0
	 */
	public function wp_night_mode_shortcode( $atts ) {

        $button_style = '';
        $active_class = '';
        $wp_night_mode = isset( $_COOKIE['wpNightMode'] ) ? $_COOKIE['wpNightMode'] : '';
        $atts = shortcode_atts( array(
            'style' => '',
        ), $atts, 'wp-night-mode-button' );

        if ( '' != $atts['style'] ) {
            $button_style = $atts['style'];
        } else {
            $button_style = get_theme_mod( 'wp_night_mode_toggle_style' );
        }

        if ( 'true' == $wp_night_mode ) {
		  $active_class = ' active';
        }

        switch ( $button_style ) {
            case '1':
                return '<div class="wpnm-button style-1'.$active_class.'">
                            <div class="wpnm-slider round"></div>
                        </div>';
                break;
            case '2':
                return '<div class="wpnm-button style-2'.$active_class.'">
                            <div class="wpnm-button-inner-left"></div>
                            <div class="wpnm-button-inner"></div>
                        </div>';
                break;
            case '3':
                return '<div class="wpnm-button style-3'.$active_class.'">
                            <div class="wpnm-button-circle">
                                <div class="wpnm-button-moon-spots"></div>
                            </div>
                            <div class="wpnm-button-cloud">
                                <div></div>
                                <div></div>
                            </div>
                            <div class="wpnm-button-stars">
                                <div></div>
                                <div></div>
                            </div>
                        </div>';
                break;
                case '4':
                return '<div class="wpnm-button style-4'.$active_class.'">
                            <div class="wpnm-button-inner"></div>
                        </div>';
                break;
                case '5':
                return '<div class="wpnm-button style-5'.$active_class.'">
                            <div class="wpnm-button-sun">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="dayIcon" x="0px" y="0px" viewBox="0 0 35 35" style="enable-background:new 0 0 35 35;" xml:space="preserve">
                                    <g id="Sun">
                                        <g>
                                            <path style="fill-rule:evenodd;clip-rule:evenodd;" d="M6,17.5C6,16.672,5.328,16,4.5,16h-3C0.672,16,0,16.672,0,17.5    S0.672,19,1.5,19h3C5.328,19,6,18.328,6,17.5z M7.5,26c-0.414,0-0.789,0.168-1.061,0.439l-2,2C4.168,28.711,4,29.086,4,29.5    C4,30.328,4.671,31,5.5,31c0.414,0,0.789-0.168,1.06-0.44l2-2C8.832,28.289,9,27.914,9,27.5C9,26.672,8.329,26,7.5,26z M17.5,6    C18.329,6,19,5.328,19,4.5v-3C19,0.672,18.329,0,17.5,0S16,0.672,16,1.5v3C16,5.328,16.671,6,17.5,6z M27.5,9    c0.414,0,0.789-0.168,1.06-0.439l2-2C30.832,6.289,31,5.914,31,5.5C31,4.672,30.329,4,29.5,4c-0.414,0-0.789,0.168-1.061,0.44    l-2,2C26.168,6.711,26,7.086,26,7.5C26,8.328,26.671,9,27.5,9z M6.439,8.561C6.711,8.832,7.086,9,7.5,9C8.328,9,9,8.328,9,7.5    c0-0.414-0.168-0.789-0.439-1.061l-2-2C6.289,4.168,5.914,4,5.5,4C4.672,4,4,4.672,4,5.5c0,0.414,0.168,0.789,0.439,1.06    L6.439,8.561z M33.5,16h-3c-0.828,0-1.5,0.672-1.5,1.5s0.672,1.5,1.5,1.5h3c0.828,0,1.5-0.672,1.5-1.5S34.328,16,33.5,16z     M28.561,26.439C28.289,26.168,27.914,26,27.5,26c-0.828,0-1.5,0.672-1.5,1.5c0,0.414,0.168,0.789,0.439,1.06l2,2    C28.711,30.832,29.086,31,29.5,31c0.828,0,1.5-0.672,1.5-1.5c0-0.414-0.168-0.789-0.439-1.061L28.561,26.439z M17.5,29    c-0.829,0-1.5,0.672-1.5,1.5v3c0,0.828,0.671,1.5,1.5,1.5s1.5-0.672,1.5-1.5v-3C19,29.672,18.329,29,17.5,29z M17.5,7    C11.71,7,7,11.71,7,17.5S11.71,28,17.5,28S28,23.29,28,17.5S23.29,7,17.5,7z M17.5,25c-4.136,0-7.5-3.364-7.5-7.5    c0-4.136,3.364-7.5,7.5-7.5c4.136,0,7.5,3.364,7.5,7.5C25,21.636,21.636,25,17.5,25z"></path>
                                        </g>
                                    </g>
                                </svg>
                            </div>
                            <div class="wpnm-button-toggle"></div>
                            <div class="wpnm-button-moon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="nightIcon" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve">
                                <path d="M96.76,66.458c-0.853-0.852-2.15-1.064-3.23-0.534c-6.063,2.991-12.858,4.571-19.655,4.571  C62.022,70.495,50.88,65.88,42.5,57.5C29.043,44.043,25.658,23.536,34.076,6.47c0.532-1.08,0.318-2.379-0.534-3.23  c-0.851-0.852-2.15-1.064-3.23-0.534c-4.918,2.427-9.375,5.619-13.246,9.491c-9.447,9.447-14.65,22.008-14.65,35.369  c0,13.36,5.203,25.921,14.65,35.368s22.008,14.65,35.368,14.65c13.361,0,25.921-5.203,35.369-14.65  c3.872-3.871,7.064-8.328,9.491-13.246C97.826,68.608,97.611,67.309,96.76,66.458z"></path>
                                </svg>
                            </div>
                        </div>';
                break;
            default:
                return '<div class="wpnm-button style-1'.$active_class.'">
                            <div class="wpnm-slider round"></div>
                        </div>';
                break;
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

	    $wp_customize->add_section('wp_night_mode_settings', array(
            'title'    => __('Night Mode', 'wp-night-mode'),
            'description' => __('If you want to change color in some other elements you can use the Additional CSS field. CSS example: body.wp-night-mode-on .element-class { color: #000; }', 'wp-night-mode'),
            'priority' => 1200,
        ));

        //  =============================
        //  Night Mode as Default
        //  =============================
        $wp_customize->add_setting('wp_night_mode_default', array(
            'default'           => '',
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_default', array(
            'label'    => __('Night Mode as Default', 'wp-night-mode'),
            'section'  => 'wp_night_mode_settings',
            'settings' => 'wp_night_mode_default',
            'type'     => 'checkbox',
        )));

        //  =============================
        //  Automatic Switching
        //  =============================
        // $wp_customize->add_setting('wp_night_mode_automatic_switching', array(
        //     'default'           => '',
        //     // 'sanitize_callback' => 'sanitize_hex_color',
        //     'capability'        => 'edit_theme_options',
        //     'transport'         => 'refresh',

        // ));

        // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_automatic_switching', array(
        //     'label'    => __('Automatic Switching', 'wp-night-mode'),
        //     'section'  => 'wp_night_mode_settings',
        //     'settings' => 'wp_night_mode_automatic_switching',
        //     'default'  => '0',
        //     'type'     => 'checkbox',
        // )));

        //  =============================
        //  Each Day Turn on Time
        //  =============================
        // $wp_customize->add_setting('wp_night_mode_turn_on_time', array(
        //     'default'           => '',
        //     // 'sanitize_callback' => 'sanitize_hex_color',
        //     'capability'        => 'edit_theme_options',
        //     'transport'         => 'refresh',

        // ));

        // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_turn_on_time', array(
        //     'label'    => __('Turn on Time', 'wp-night-mode'),
        //     'description' => __('If set ', 'wp-night-mode'),
        //     'section'  => 'wp_night_mode_settings',
        //     'settings' => 'wp_night_mode_turn_on_time',
        //     'type'     => 'time',
        // )));

        //  =============================
        //  Each Day Turn off Time
        //  =============================
        // $wp_customize->add_setting('wp_night_mode_turn_off_time', array(
        //     'default'           => '',
        //     // 'sanitize_callback' => 'sanitize_hex_color',
        //     'capability'        => 'edit_theme_options',
        //     'transport'         => 'refresh',

        // ));

        // $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_turn_off_time', array(
        //     'label'    => __('Turn off Time', 'wp-night-mode'),
        //     'section'  => 'wp_night_mode_settings',
        //     'settings' => 'wp_night_mode_turn_off_time',
        //     'type'     => 'time',
        // )));

        //  =============================
        //  Toggle Style
        //  =============================
        $wp_customize->add_setting('wp_night_mode_toggle_style', array(
            'default'           => '',
            // 'sanitize_callback' => 'sanitize_hex_color',
            'capability'        => 'edit_theme_options',
            'transport'   		=> 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_toggle_style', array(
            'label'    => __('Toggle Style', 'wp-night-mode'),
            'section'  => 'wp_night_mode_settings',
            'settings' => 'wp_night_mode_toggle_style',
            'default'  => '1',
            'type'     => 'select',
			'choices'  => array(
                '1'  => 'Style 1',
                '2'  => 'Style 2',
                '3'  => 'Style 3',
                '4'  => 'Style 4',
				'5'  => 'Style 5',
			),
        )));

        //  =============================
        //  Toggle Size
        //  =============================
        $wp_customize->add_setting('wp_night_mode_toggle_size', array(
            'default'           => '14',
            'sanitize_callback' => 'absint',
            'capability'        => 'edit_theme_options',
            'transport'         => 'refresh',

        ));

        $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'wp_night_mode_toggle_size', array(
            'label'         => __('Toggle Size', 'wp-night-mode'),
            'section'       => 'wp_night_mode_settings',
            'settings'      => 'wp_night_mode_toggle_size',
            'type'          => 'range',
            'input_attrs' => array(
                'min' => 0,
                'max' => 40,
                'step' => 1,
            ),
        )));

        //  =============================
        //  Toggle Off Color
        //  =============================
        // $wp_customize->add_setting('wp_night_mode_toggle_off_color', array(
        //     'default'           => '',
        //     'sanitize_callback' => 'sanitize_hex_color',
        //     'capability'        => 'edit_theme_options',
        //     'transport'   		=> 'refresh',

        // ));

        // $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_toggle_off_color', array(
        //     'label'    => __('Toggle Off Color', 'wp-night-mode'),
        //     'section'  => 'wp_night_mode_settings',
        //     'settings' => 'wp_night_mode_toggle_off_color',
        // )));

        //  =============================
        //  Toggle On Color
        //  =============================
        // $wp_customize->add_setting('wp_night_mode_toggle_on_color', array(
        //     'default'           => '',
        //     'sanitize_callback' => 'sanitize_hex_color',
        //     'capability'        => 'edit_theme_options',
        //     'transport'   		=> 'refresh',

        // ));

        // $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'wp_night_mode_toggle_on_color', array(
        //     'label'    => __('Toggle On Color', 'wp-night-mode'),
        //     'section'  => 'wp_night_mode_settings',
        //     'settings' => 'wp_night_mode_toggle_on_color',
        // )));

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
            'section'  => 'wp_night_mode_settings',
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
            'section'  => 'wp_night_mode_settings',
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
            'section'  => 'wp_night_mode_settings',
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
            'section'  => 'wp_night_mode_settings',
            'settings' => 'wp_night_mode_link_hover_color',
        )));

	}

}
