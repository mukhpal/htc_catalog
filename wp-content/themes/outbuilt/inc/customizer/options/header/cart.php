<?php

/**
 * Cart section
 */
Kirki::add_section('cart', array(
    'title'          => esc_attr__('Cart Icon', 'outbuilt'),
    'priority'       => 30,
    'panel'          => 'header'
));

/**
 * Search
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'toggle',
    'settings'    => 'cart_icon',
    'label'       => esc_attr__('Cart Icon', 'outbuilt'),
    'description' => esc_attr__('Enable cart icon in header.', 'outbuilt'),
    'section'     => 'cart',
    'default'     => '1'
));

/**
 * Search color
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'color',
    'settings'    => 'cart_color',
    'label'       => esc_attr__('Cart Icon Color', 'outbuilt'),
    'section'     => 'cart',
    'default'     => '#212121',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element'  => '.site-header-cart .cart-contents',
            'property' => 'color',
            'exclude'  => array('#212121'),
        ),
    ),
    'transport'   => 'auto',
    'required'    => array(
        array(
            'setting'  => 'cart_icon',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
));

/**
 * Search color: hover
 */
Kirki::add_field('outbuilt_options', array(
    'type'        => 'color',
    'settings'    => 'cart_color_hover',
    'label'       => esc_attr__('Cart Icon Color: Hover', 'outbuilt'),
    'section'     => 'cart',
    'default'     => '#212121',
    'choices'     => array(
        'alpha' => true,
    ),
    'output'      => array(
        array(
            'element'  => '.site-header-cart .cart-contents:hover',
            'property' => 'color',
            'exclude'  => array('#212121'),
            'suffix'   => '!important'
        ),
        array(
            'element'  => '.search-icon .search-toggle:visited:hover',
            'property' => 'color',
            'exclude'  => array('#212121'),
            'suffix'   => '!important'
        ),
    ),
    'transport'   => 'auto',
    'required'    => array(
        array(
            'setting'  => 'cart_icon',
            'operator' => '==',
            'value'    => '1',
        ),
    ),
));
