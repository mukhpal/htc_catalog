<?php

/**
 * Helper functions
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// The Metabox class
if (!class_exists('Outbuilt_Core_Functions')) {

    /**
     * Helper functions.
     *
     * @since  1.0.0
     * @access public
     */
    final class Outbuilt_Core_Functions {

        /**
         * Sets up initial actions.
         *
         * @since 1.0.0
         */
        private function setup_actions() {

            // Add extra user fields
            add_filter('user_contactmethods', array($this, 'user_fields'));
        }

        /**
         * Add new user fields.
         */
        public function user_fields($contactmethods) {

            $contactmethods['twitter']     = esc_html__('Twitter URL', 'outbuilt-core');
            $contactmethods['facebook']    = esc_html__('Facebook URL', 'outbuilt-core');
            $contactmethods['gplus']       = esc_html__('Google Plus URL', 'outbuilt-core');
            $contactmethods['instagram']   = esc_html__('Instagram URL', 'outbuilt-core');
            $contactmethods['pinterest']   = esc_html__('Pinterest URL', 'outbuilt-core');
            $contactmethods['linkedin']    = esc_html__('Linkedin URL', 'outbuilt-core');
            $contactmethods['dribbble']    = esc_html__('Dribbble URL', 'outbuilt-core');

            return $contactmethods;
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

    Outbuilt_Core_Functions::get_instance();
}
