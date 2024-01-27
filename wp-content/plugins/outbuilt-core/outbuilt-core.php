<?php

/**
 * Plugin Name: Outbuilt Core
 * Plugin URI: https://www.theme-junkie.com/
 * Description: Add extra features like widgets, metaboxes, and custom Elementor widgets.
 * Version: 1.2.0
 * Author: Theme Junkie
 * Author URI: https://www.theme-junkie.com/
 * Requires at least: 4.6.0
 * Tested up to: 5.9
 *
 * Text Domain: outbuilt-core
 * Domain Path: /languages/
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Outbuilt_Core')) {
    /**
     * Main Outbuilt_Core Class
     *
     * @since  1.0.0
     * @access public
     */
    final class Outbuilt_Core {

        /**
         * The token.
         *
         * @var     string
         * @access  public
         * @since   1.0.0
         */
        public $token = '';

        /**
         * The version number.
         *
         * @var     string
         * @access  public
         * @since   1.0.0
         */
        public $version = '';

        /**
         * Directory path to the plugin folder.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $path = '';

        /**
         * Directory URI to the plugin folder.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $uri = '';

        /**
         * Returns the instance.
         *
         * @since  1.0.0
         * @access public
         * @return object
         */
        public static function get_instance() {

            static $instance = null;

            if (is_null($instance)) {
                $instance = new self;
                $instance->setup();
                $instance->includes();
                $instance->setup_actions();
            }

            return $instance;
        }

        /**
         * Constructor function.
         * @access  public
         * @since   1.0.0
         * @return  void
         */
        private function __construct() {
        }

        /**
         * Initial plugin setup.
         *
         * @since  1.0.0
         * @access private
         * @return void
         */
        private function setup() {

            $this->token   = 'outbuilt-core';
            $this->path    = trailingslashit(plugin_dir_path(__FILE__));
            $this->uri     = trailingslashit(plugin_dir_url(__FILE__));
            $this->version = '1.1.0';

            // Use it all over the plugin files.
            define('OC_URL', $this->uri);
            define('OC_PATH', $this->path);
        }

        /**
         * Loads include and admin files for the plugin.
         *
         * @since  1.0.0
         * @access private
         * @return void
         */
        private function includes() {

            // Settings
            $classes = get_theme_mod('classes_post_type', 1);

            // Load plugin functions.
            require_once(OC_PATH . 'inc/functions.php');

            // Class post type
            if ($classes) {
                require_once(OC_PATH . 'inc/post-types/class/class.php');
                require_once(OC_PATH . 'inc/post-types/class/sidebar.php');
            }

            // Elementor files
            if (class_exists('Elementor\Plugin')) {
                require_once(OC_PATH . 'inc/elementor/elementor.php');
                require_once(OC_PATH . 'inc/elementor/icon-manager.php');
            }

            // ACF fields
            if (class_exists('ACF')) {
                require_once(OC_PATH . 'inc/acf/acf-fields.php');
            }
        }

        /**
         * Setup all the things.
         * @return void
         */
        private function setup_actions() {

            // Method that runs only when the plugin is activated.
            register_activation_hook(__FILE__, array($this, 'install'));

            // Internationalize the text strings used.
            add_action('init', array($this, 'load_plugin_textdomain'));

            // Load custom widgets
            add_action('widgets_init', array($this, 'custom_widgets'), 10);

            // Allow shortcodes in text widgets
            add_filter('widget_text', 'do_shortcode');
        }

        /**
         * Load the localisation file.
         *
         * @access  public
         * @since   1.0.0
         * @return  void
         */
        public function load_plugin_textdomain() {
            load_plugin_textdomain('outbuilt-core', false, dirname(plugin_basename(__FILE__)) . '/languages/');
        }

        /**
         * Cloning is forbidden.
         *
         * @since 1.0.0
         */
        public function __clone() {
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
        }

        /**
         * Unserializing instances of this class is forbidden.
         *
         * @since 1.0.0
         */
        public function __wakeup() {
            _doing_it_wrong(__FUNCTION__, __('Cheatin&#8217; huh?'), '1.0.0');
        }

        /**
         * Installation.
         * Runs on activation. Logs the version number and assigns a notice message to a WordPress option.
         *
         * @access  public
         * @since   1.0.0
         * @return  void
         */
        public function install() {
            $this->_log_version_number();
        }

        /**
         * Log the plugin version number.
         *
         * @access  private
         * @since   1.0.0
         * @return  void
         */
        private function _log_version_number() {
            update_option($this->token . '-version', $this->version);
        }

        /**
         * Custom widgets
         */
        public static function custom_widgets() {

            if (!version_compare(PHP_VERSION, '5.6', '>=')) {
                return;
            }

            // Define array of custom widgets for the theme
            $widgets = apply_filters('outbuilt_core_custom_widgets', array(
                'facebook',
                'recent-posts',
                'social',
                'twitter',
            ));

            // Loop through widgets and load their files
            if ($widgets && is_array($widgets)) {
                foreach ($widgets as $widget) {
                    $file = OC_PATH . 'inc/widgets/class-widget-' . $widget . '.php';
                    if (file_exists($file)) {
                        require_once($file);
                    }
                }
            }
        }
    } // End Class

    Outbuilt_Core::get_instance();
}
