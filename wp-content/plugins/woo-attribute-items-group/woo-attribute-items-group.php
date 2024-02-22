<?php
    /**
     * Plugin Name: WooCommerce Attribute Items Grouping
     * Plugin URI: local
     * Description: Allowing users to group the items of the Attributes and display them on frontend with expected label.
     * Author: Mukhpal Singh
     * Version: 1.0.0
     * Author URI: https://mukhpal.online
     */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register activation hook to call woo_attribute_items_group_install function
register_activation_hook(__FILE__, 'woo_attribute_items_group_install');


function woo_attribute_items_group_install() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'attribute_groups';

    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name varchar(255) NOT NULL,
        description text,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    $result = dbDelta($sql);

    if ($wpdb->last_error) {
        // Display or log the error
        error_log('Error creating table: ' . $wpdb->last_error);
    }
}

// Include admin functionality
require_once plugin_dir_path(__FILE__) . 'includes/main.php';
