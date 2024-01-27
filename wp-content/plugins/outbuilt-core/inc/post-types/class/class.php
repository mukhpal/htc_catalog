<?php

/**
 * Class Post Type
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Start Class
class Outbuilt_Core_Class_Post_Type {

    /**
     * Start things up
     */
    public function __construct() {
        add_action('init', array($this, 'class_post_type'));
        add_action('init', array($this, 'class_taxonomy'));
    }

    /**
     * Register class post type
     */
    public static function class_post_type() {

        $name = esc_html__('Classes', 'outbuilt-class');

        // Register the post type
        register_post_type('class', apply_filters('class_args', array(
            'labels' => array(
                'name'                     => $name,
                'singular_name'         => esc_html__('Class', 'outbuilt-class'),
                'add_new'                 => esc_html__('Add New', 'outbuilt-class'),
                'add_new_item'             => esc_html__('Add New Class', 'outbuilt-class'),
                'edit_item'             => esc_html__('Edit Class', 'outbuilt-class'),
                'new_item'                 => esc_html__('Add New Class', 'outbuilt-class'),
                'view_item'             => esc_html__('View Class', 'outbuilt-class'),
                'search_items'             => esc_html__('Search Class', 'outbuilt-class'),
                'not_found'             => esc_html__('No Class Found', 'outbuilt-class'),
                'not_found_in_trash'     => esc_html__('No Class Found In Trash', 'outbuilt-class'),
                'menu_name'             => $name,
            ),
            'public'                     => true,
            'show_ui'                   => true,
            'show_in_menu'                 => true,
            'show_in_nav_menus'         => true,
            'show_in_admin_bar'         => true,
            'can_export'                => true,
            'has_archive'               => true,
            'exclude_from_search'       => false,
            'publicly_queryable'        => true,
            'rewrite'                     => array('slug' => 'class'),
            'capability_type'           => 'page',
            'menu_position'             => 5,
            'menu_icon'                 => 'dashicons-welcome-learn-more',
            'show_in_rest'              => true,
            'supports'                     => array('title', 'editor', 'thumbnail', 'author', 'elementor'),
        )));
    }

    /**
     * Register taxonomy
     */
    public static function class_taxonomy() {

        $labels = array(
            'name'                       => esc_html_x('Categories', 'Taxonomy General Name', 'outbuilt-class'),
            'singular_name'              => esc_html_x('Category', 'Taxonomy Singular Name', 'outbuilt-class'),
            'menu_name'                  => esc_html__('Categories', 'outbuilt-class'),
            'all_items'                  => esc_html__('All Categories', 'outbuilt-class'),
            'parent_item'                => esc_html__('Parent Category', 'outbuilt-class'),
            'parent_item_colon'          => esc_html__('Parent Category:', 'outbuilt-class'),
            'new_item_name'              => esc_html__('New Category Name', 'outbuilt-class'),
            'add_new_item'               => esc_html__('Add New Category', 'outbuilt-class'),
            'edit_item'                  => esc_html__('Edit Category', 'outbuilt-class'),
            'update_item'                => esc_html__('Update Category', 'outbuilt-class'),
            'view_item'                  => esc_html__('View Category', 'outbuilt-class'),
            'separate_items_with_commas' => esc_html__('Separate categories with commas', 'outbuilt-class'),
            'add_or_remove_items'        => esc_html__('Add or remove categories', 'outbuilt-class'),
            'choose_from_most_used'      => esc_html__('Choose from the most used', 'outbuilt-class'),
            'popular_items'              => esc_html__('Popular Categories', 'outbuilt-class'),
            'search_items'               => esc_html__('Search Categories', 'outbuilt-class'),
            'not_found'                  => esc_html__('Not Found', 'outbuilt-class'),
            'no_terms'                   => esc_html__('No categories', 'outbuilt-class'),
            'items_list'                 => esc_html__('Categories list', 'outbuilt-class'),
            'items_list_navigation'      => esc_html__('Categories list navigation', 'outbuilt-class'),
        );
        $args = array(
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        );
        register_taxonomy('class-category', array('class'), $args);
    }
}

new Outbuilt_Core_Class_Post_Type();
