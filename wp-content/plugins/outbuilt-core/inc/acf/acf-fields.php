<?php
if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(array(
        'key' => 'group_5f5db916858aa',
        'title' => 'Hide Title',
        'fields' => array(
            array(
                'key' => 'field_5f5db9ad49df5',
                'label' => 'Hide title',
                'name' => '_outbuilt_hide_title',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f5dbb7c7d71f',
        'title' => 'Layouts',
        'fields' => array(
            array(
                'key' => 'field_5f5dbba85b19c',
                'label' => 'Page Layouts',
                'name' => '_outbuilt_page_layout',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'default' => 'Default',
                    'right-sidebar' => 'Right Sidebar',
                    'left-sidebar' => 'Left Sidebar',
                    'full-width' => 'Full Width',
                    'full-width-narrow' => 'Full Width Narrow',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'default',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'class',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_5f5dc613de818',
        'title' => 'Post Styles',
        'fields' => array(
            array(
                'key' => 'field_5f5dc61f562f8',
                'label' => 'Style',
                'name' => '_outbuilt_post_style',
                'type' => 'radio',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    'default' => 'Default',
                    'full-width-title' => 'Full Width Title',
                    'side-by-side' => 'Side By Side',
                    'full-width-side-by-side' => 'Full Width Side By Side',
                    'thumbnail-overlay' => 'Thumbnail Overlay',
                    'full-width-thumbnail-overlay' => 'Full Width Thumbnail Overlay',
                    'thumbnail-on-top' => 'Thumbnail On Top',
                    'full-width-thumbnail-on-top' => 'Full Width Thumbnail on Top',
                ),
                'allow_null' => 0,
                'other_choice' => 0,
                'default_value' => 'default',
                'layout' => 'vertical',
                'return_format' => 'value',
                'save_other_choice' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));

endif;
