<?php

/**
 * Elementor functions
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// The Metabox class
if (!class_exists('Outbuilt_Core_Elementor')) {

    /**
     * Elementor functions.
     *
     * @since  1.0.0
     * @access public
     */
    final class Outbuilt_Core_Elementor {

        /**
         * Sets up initial actions.
         */
        private function setup_actions() {

            // Add new category for Elementor
            add_action('elementor/init', array($this, 'elementor_init'), 1);

            // Add the action here so that the widgets are always visible
            add_action('elementor/widgets/widgets_registered', array($this, 'widgets_registered'));

            // Front-end Scripts
            add_action('elementor/frontend/after_register_scripts', array($this, 'register_scripts'));
            add_action('elementor/frontend/after_register_styles', array($this, 'register_styles'));

            // Preview Styles
            add_action('elementor/preview/enqueue_styles', array($this, 'preview_styles'));
        }

        /**
         * Add new category for Elementor.
         */
        public function elementor_init() {

            $elementor = \Elementor\Plugin::$instance;

            // Add element category in panel
            $elementor->elements_manager->add_category(
                'outbuilt_core_elements',
                [
                    'title' => esc_attr__('Outbuilt Core', 'outbuilt-core'),
                    'icon' => 'font',
                ],
                1
            );
        }

        /**
         * Register the custom Elementor widgets
         */
        public function widgets_registered() {

            // We check if the Elementor plugin has been installed / activated.
            if (defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base')) {

                // Define dir
                $dir = OC_PATH . 'inc/elementor/widgets/';

                // Array of new widgets
                $build_widgets = apply_filters('outbuilt_core_widgets', array(
                    'post'               => $dir . 'post.php',
                    'post_grid'          => $dir . 'post-grid.php',
                    'post_list'          => $dir . 'post-list.php',
                    'post_alt'           => $dir . 'post-alt.php',
                    'events'             => $dir . 'events.php',
                    'product'            => $dir . 'product.php',
                    'post_type_carousel' => $dir . 'post-type-carousel.php',
                    'post_type_grid'     => $dir . 'post-type-grid.php',
                    'testimonial'        => $dir . 'testimonial.php',
                    'team'               => $dir . 'team.php',
                ));

                // Load files
                foreach ($build_widgets as $widget_filename) {
                    include $widget_filename;
                }
            }
        }

        /**
         * Register scripts
         */
        public function register_scripts() {
            wp_register_script('slick-js', OC_URL . 'assets/js/slick.min.js', array('jquery'), false, true);
            wp_register_script('carousel-js', OC_URL . 'assets/js/carousel.js', array('jquery'), false, true);
            wp_register_script('testimonial-js', OC_URL . 'assets/js/testimonial.js', array('jquery'), false, true);
        }

        /**
         * Register styles
         */
        public function register_styles() {
            wp_register_style('slick-css', OC_URL . 'assets/css/slick.min.css');
            wp_register_style('testimonial-css', OC_URL . 'assets/css/testimonial.css');
            wp_register_style('team-css', OC_URL . 'assets/css/team.css');
        }

        /**
         * Enqueue styles in the editor
         */
        public function preview_styles() {
            wp_enqueue_style('slick-css');
            wp_enqueue_style('testimonial-css');
            wp_enqueue_style('team-css');
        }

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
                $instance->setup_actions();
            }
            return $instance;
        }

        /**
         * Constructor method.
         *
         * @since  1.0.0
         * @access private
         * @return void
         */
        private function __construct() {
        }
    }

    Outbuilt_Core_Elementor::get_instance();
}
