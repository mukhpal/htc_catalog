<?php

/**
 * TGM Plugin Lists
 */

/**
 * Register required and recommended plugins.
 */
function outbuilt_register_plugins() {

    $plugins = array(

        array(
            'name'     => 'One Click Demo Import',
            'slug'     => 'one-click-demo-import',
            'required' => false,
            'version'  => '3.0.2',
        ),

        array(
            'name'     => 'Outbuilt Core',
            'slug'     => 'outbuilt-core',
            'source'   => get_template_directory() . '/inc/plugins/outbuilt-core.zip',
            'required' => true,
            'version'  => '1.1.0',
        ),

    );

    $config = array(
        'id'           => 'tgmpa',
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
    );

    tgmpa($plugins, $config);
}
add_action('tgmpa_register', 'outbuilt_register_plugins');
