<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include any necessary files and define constants here
include_once(plugin_dir_path(__FILE__) . 'functions.php');

// Add submenu under Products menu
add_action('admin_menu', 'woo_attribute_items_group_menu');

// Render admin page template
function woo_attribute_items_group_page() {
    // Check if the form has been submitted
    if (isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add_group') {
        // Verify nonce
        if (!isset($_POST['woo_attribute_items_group_nonce']) || !wp_verify_nonce($_POST['woo_attribute_items_group_nonce'], 'woo_attribute_items_group_nonce')) {
            // Nonce verification failed, handle accordingly
            echo 'Nonce verification failed.';
            return;
        }

        // Get form data
        $group_name = sanitize_text_field($_POST['group_name']);
        $group_description = sanitize_textarea_field($_POST['group_description']);

        // Add the group
        add_group($group_name, $group_description);
    }

    if (isset($_POST['uptsubmit'])) {
        $id         = $_POST['uptid'];
        $group_name = $_POST['group_name'];
        $group_description  =   $_POST['group_description'];
        update_group($id, $group_name, $group_description);
        wp_redirect(admin_url('admin.php?page=woo-attribute-items-group'));
        exit;
    }

    if (isset($_GET['del'])) {
        $del_id = $_GET['del'];
        delete_group($del_id);
        wp_redirect(admin_url('admin.php?page=woo-attribute-items-group'));
        exit;
    }
    // Fetch groups from the database
    $groups = read_groups();

    ?>
    <div class="wrap">
        <h1>Attribute Items Group</h1>

        <!-- Display success/error messages here if needed -->
        <?php
        if (isset($_GET['upt'])) {
            $upt_id = $_GET['upt'];
            $record = get_group($upt_id);

            foreach($record as $print) {
                $name = $print->name;
                $description = $print->description;
            }
            include_once 'admin/edit-page.php';
        }else{
            include_once 'admin/add-page.php';
        } 
        
        include_once 'admin/list-page.php'; 
        
        ?>
    </div>
    <?php
}

// Enqueue scripts
add_action('admin_enqueue_scripts', 'woo_attribute_items_group_enqueue_scripts');
