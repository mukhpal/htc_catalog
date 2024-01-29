<?php

/**
 * Archive section
 */
Kirki::add_section('archive_header', array(
    'title'          => esc_attr__('Archive', 'outbuilt'),
    'priority'       => 30,
    'panel'          => 'header'
));

/**
 * Background color
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'color',
    'settings'    => 'archive_header_bg',
    'label'       => esc_attr__('Background Color', 'outbuilt'),
    'section'     => 'archive_header',
    'default'     => '#efefef',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element'  => '.archive-header',
            'property' => 'background-color',
            'exclude'  => array('#efefef'),
        ),
    ),
    'transport'   => 'auto',
));

/**
 * Browse color
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'color',
    'settings'    => 'archive_header_browse',
    'label'       => esc_attr__('Browse color', 'outbuilt'),
    'section'     => 'archive_header',
    'default'     => '#999999',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element'  => '.archive-header .browse',
            'property' => 'color',
            'exclude'  => array('#999999'),
        ),
    ),
    'transport'   => 'auto',
));

/**
 * Typography title
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'typography',
    'settings'    => 'archive_header_title',
    'label'       => esc_attr__('Title', 'outbuilt'),
    'section'     => 'archive_header',
    'default'     => array(
        'font-family'    => 'Rubik',
        'variant'        => '500',
        'font-size'      => '40px',
        'letter-spacing' => '0',
        'color'          => '#212121',
        'text-transform' => 'uppercase'
    ),
    'output'       => array(
        array(
            'element'  => '.archive-header .archive-title',
        ),
    ),
));

/**
 * Typography Description
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'typography',
    'settings'    => 'archive_header_desc',
    'label'       => esc_attr__('Description', 'outbuilt'),
    'section'     => 'archive_header',
    'default'     => array(
        'font-family'    => 'Rubik',
        'variant'        => '400',
        'font-size'      => '16px',
        'letter-spacing' => '0',
        'color'          => '#212121',
        'text-transform' => 'none'
    ),
    'output'       => array(
        array(
            'element'  => '.archive-header .archive-desc',
        ),
    ),
));
