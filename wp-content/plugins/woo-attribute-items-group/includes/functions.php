<?php

function woo_attribute_items_group_menu() {
    add_submenu_page(
        'edit.php?post_type=product', // Parent menu slug
        'Attribute Items Group',       // Page title
        'Attribute Items Group',       // Menu title
        'manage_options',              // Capability
        'woo-attribute-items-group',   // Menu slug
        'woo_attribute_items_group_page' // Callback function
    );
}

// CRUD functions for managing groups

// Create a new group
function add_group($name, $description) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'description' => $description
        )
    );
}

// Read all groups
function read_groups() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    return $wpdb->get_results("SELECT * FROM $table_name");
}

// Read single groups id
function get_group($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    return $wpdb->get_results("SELECT * FROM $table_name where id = $id");
}
// Read single groups id
function get_group_name($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    $query = $wpdb->prepare("SELECT * FROM $table_name WHERE id = %d", $id);
    $result = $wpdb->get_row($query);
    // var_dump($result);
    // Verify if the result exists and has a name column
    if ($result && isset($result->name)) {
        // The record exists and has a name column
        return $result->name;
    } else {
        // The record does not exist or does not have a name column
        return false;
    }
}

// Update an existing group
function update_group($id, $name, $description) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    $wpdb->update(
        $table_name,
        array(
            'name' => $name,
            'description' => $description
        ),
        array('id' => $id)
    );
}

// Delete a group
function delete_group($id) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'attribute_groups';
    $wpdb->delete(
        $table_name,
        array('id' => $id)
    );
}

function woo_attribute_items_group_enqueue_scripts() {
    // Enqueue script for admin pages
    wp_enqueue_script('woo-attribute-items-group-admin', plugin_dir_url(__FILE__) . '../js/woo-attribute-items-group-admin.js', array('jquery'), '1.0', true);
    wp_localize_script('woo-attribute-items-group-admin', 'woo_attribute_items_group_ajax', array('plugin_url' => admin_url('admin.php?page=woo-attribute-items-group')));

}
