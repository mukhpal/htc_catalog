<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Outbuilt_Core_Widget_Testimonial extends Widget_Base {

    public function get_name() {
        return 'outbuilt-core-testimonial';
    }

    public function get_title() {
        return esc_html__('Testimonial', 'outbuilt-core');
    }

    public function get_icon() {
        return 'eicon-comments';
    }

    public function get_keywords() {
        return ['testimonial', 'testi'];
    }

    public function get_categories() {
        return ['outbuilt_core_elements'];
    }

    public function get_script_depends() {
        return ['slick-js', 'testimonial-js'];
    }

    public function get_style_depends() {
        return ['slick-css', 'testimonial-css'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'testimonial_content_section',
            [
                'label' => esc_html__('Testimonial', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'testimonial_style',
            [
                'label' => esc_html__('Style', 'outbuilt-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'   => esc_html__('Style One', 'outbuilt-core'),
                    '2'   => esc_html__('Style Two', 'outbuilt-core'),
                    '3'   => esc_html__('Style Three', 'outbuilt-core'),
                    '4'   => esc_html__('Style Four', 'outbuilt-core'),
                    '5'   => esc_html__('Style Five', 'outbuilt-core'),
                    '6'   => esc_html__('Style Six', 'outbuilt-core'),
                    '7'   => esc_html__('Style Seven', 'outbuilt-core'),
                    '8'   => esc_html__('Style Eight', 'outbuilt-core'),
                    '9'   => esc_html__('Style Nine', 'outbuilt-core'),
                ],
            ]
        );

        $this->add_control(
            'slider_on',
            [
                'label' => esc_html__('Slider', 'outbuilt-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'client_name',
            [
                'label'   => esc_html__('Name', 'outbuilt-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('Ahnaf Abid Al', 'outbuilt-core'),
            ]
        );

        $repeater->add_control(
            'client_image',
            [
                'label' => esc_html__('Image', 'outbuilt-core'),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'client_imagesize',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $repeater->add_control(
            'client_designation',
            [
                'label'   => esc_html__('Designation', 'outbuilt-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('Developer', 'outbuilt-core'),
            ]
        );

        $repeater->add_control(
            'client_say',
            [
                'label'   => esc_html__('Client Say', 'outbuilt-core'),
                'type'    => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur Excepteur sint occaecat.', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'testimonial_list',
            [
                'type'    => Controls_Manager::REPEATER,
                'fields'  => array_values($repeater->get_controls()),
                'default' => [
                    [
                        'client_name'           => esc_html__('John Doe', 'outbuilt-core'),
                        'client_designation'    => esc_html__('Founder', 'outbuilt-core'),
                        'client_say'            => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus at officiis, ad labore quaerat incidunt ea praesentium veniam repellendus iste dolorem, commodi totam tenetur eligendi autem sunt sed? Quidem, sint.', 'outbuilt-core'),
                    ],
                    [
                        'client_name'           => esc_html__('John Smith', 'outbuilt-core'),
                        'client_designation'    => esc_html__('Manager', 'outbuilt-core'),
                        'client_say'            => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla in dolores, quisquam architecto reprehenderit sunt inventore ad reiciendis sed laudantium id quos omnis. Suscipit, quis recusandae! Architecto, tempore? Eveniet, odit?', 'outbuilt-core'),
                    ],
                    [
                        'client_name'           => esc_html__('Jane Doe', 'outbuilt-core'),
                        'client_designation'    => esc_html__('Director', 'outbuilt-core'),
                        'client_say'            => esc_html__('Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi in deleniti, non assumenda porro animi dolores odio quae perferendis doloribus aperiam pariatur ducimus mollitia tenetur, vero eos velit nesciunt sit.', 'outbuilt-core'),
                    ],
                ],
                'title_field' => '{{{ client_name }}}',
            ]
        );

        $this->add_control(
            'client_image_divider',
            [
                'label' => esc_html__('Divider image', 'outbuilt-core'),
                'type' => Controls_Manager::MEDIA,
                'separator' => 'before',
                'condition' => [
                    'testimonial_style!' => '4'
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'client_image_divider_size',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        // Slider setting
        $this->start_controls_section(
            'testimonial-slider-option',
            [
                'label' => esc_html__('Slider Option', 'outbuilt-core'),
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slitems',
            [
                'label' => esc_html__('Slider Items', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slarrows',
            [
                'label' => esc_html__('Slider Arrow', 'outbuilt-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slprevicon',
            [
                'label' => esc_html__('Previous icon', 'outbuilt-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'solid',
                ],
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slnexticon',
            [
                'label' => esc_html__('Next icon', 'outbuilt-core'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'sldots',
            [
                'label' => esc_html__('Slider dots', 'outbuilt-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slpause_on_hover',
            [
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__('No', 'outbuilt-core'),
                'label_on' => esc_html__('Yes', 'outbuilt-core'),
                'return_value' => 'yes',
                'default' => 'yes',
                'label' => esc_html__('Pause on Hover?', 'outbuilt-core'),
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slcentermode',
            [
                'label' => esc_html__('Center Mode', 'outbuilt-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slcenterpadding',
            [
                'label' => esc_html__('Center padding', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 0,
                'max' => 500,
                'step' => 1,
                'default' => 50,
                'condition' => [
                    'slider_on' => 'yes',
                    'slcentermode' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slautolay',
            [
                'label' => esc_html__('Slider auto play', 'outbuilt-core'),
                'type' => Controls_Manager::SWITCHER,
                'return_value' => 'yes',
                'separator' => 'before',
                'default' => 'no',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slautoplay_speed',
            [
                'label' => esc_html__('Autoplay speed', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3000,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slanimation_speed',
            [
                'label' => esc_html__('Autoplay animation speed', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 300,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slscroll_columns',
            [
                'label' => esc_html__('Slider item to scroll', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 10,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'heading_tablet',
            [
                'label' => esc_html__('Tablet', 'outbuilt-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'sltablet_display_columns',
            [
                'label' => esc_html__('Slider Items', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 8,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'sltablet_scroll_columns',
            [
                'label' => esc_html__('Slider item to scroll', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 8,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'sltablet_width',
            [
                'label' => esc_html__('Tablet Resolution', 'outbuilt-core'),
                'description' => esc_html__('The resolution to tablet.', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 750,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'heading_mobile',
            [
                'label' => esc_html__('Mobile Phone', 'outbuilt-core'),
                'type' => Controls_Manager::HEADING,
                'separator' => 'after',
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slmobile_display_columns',
            [
                'label' => esc_html__('Slider Items', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slmobile_scroll_columns',
            [
                'label' => esc_html__('Slider item to scroll', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 4,
                'step' => 1,
                'default' => 1,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->add_control(
            'slmobile_width',
            [
                'label' => esc_html__('Mobile Resolution', 'outbuilt-core'),
                'description' => esc_html__('The resolution to mobile.', 'outbuilt-core'),
                'type' => Controls_Manager::NUMBER,
                'default' => 480,
                'condition' => [
                    'slider_on' => 'yes',
                ]
            ]
        );

        $this->end_controls_section();
        // Slider Option end

        // Style Testimonial area tab section
        $this->start_controls_section(
            'testimonial_style_area',
            [
                'label' => esc_html__('Style', 'outbuilt-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_section_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_section_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        // Style Testimonial image style start
        $this->start_controls_section(
            'testimonial_image_style',
            [
                'label'     => esc_html__('Image', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_image_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .testimonal-image img',
            ]
        );

        $this->add_responsive_control(
            'testimonial_image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .testimonal-image img' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_image_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonal img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-style-5 .oc-testimonal-nav .slick-track' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_image_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonal img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Testimonial image style end

        // Style Testimonial name style start
        $this->start_controls_section(
            'testimonial_name_style',
            [
                'label'     => esc_html__('Name', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_name_align',
            [
                'label' => esc_html__('Alignment', 'outbuilt-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'outbuilt-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'outbuilt-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'outbuilt-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'outbuilt-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content h4' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info h4' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'testimonial_name_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#3e3e3e',
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content h4' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info h4' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_name_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-testimonial-area .testimonal .content h4, {{WRAPPER}} .oc-testimonial-area .testimonal .clint-info h4',
            ]
        );

        $this->add_responsive_control(
            'testimonial_name_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} {{WRAPPER}} .oc-testimonial-area .testimonal .clint-info h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_name_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} {{WRAPPER}} .oc-testimonial-area .testimonal .clint-info h4' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Testimonial name style end

        // Style Testimonial designation style start
        $this->start_controls_section(
            'testimonial_designation_style',
            [
                'label'     => esc_html__('Designation', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_designation_align',
            [
                'label' => esc_html__('Alignment', 'outbuilt-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'outbuilt-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'outbuilt-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'outbuilt-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'outbuilt-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'testimonial_designation_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#3e3e3e',
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content span' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info span' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_designation_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-testimonial-area .testimonal .content span, {{WRAPPER}} .oc-testimonial-area .testimonal .clint-info span',
            ]
        );

        $this->add_responsive_control(
            'testimonial_designation_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_designation_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .clint-info span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Testimonial designation style end

        // Style Testimonial designation style start
        $this->start_controls_section(
            'testimonial_clientsay_style',
            [
                'label'     => esc_html__('Client say', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_clientsay_align',
            [
                'label' => esc_html__('Alignment', 'outbuilt-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'outbuilt-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'outbuilt-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'outbuilt-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'outbuilt-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content p' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .oc-testimonial-for .testimonial-desc p' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'testimonial_clientsay_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#3e3e3e',
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content p' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .oc-testimonial-area .oc-testimonial-for .testimonial-desc p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'testimonial_clientsay_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-testimonial-area .testimonal .content p, {{WRAPPER}} .oc-testimonial-area .oc-testimonial-for .testimonial-desc p',
            ]
        );

        $this->add_responsive_control(
            'testimonial_clientsay_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-area .oc-testimonial-for .testimonial-desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_clientsay_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-testimonial-area .oc-testimonial-for .testimonial-desc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Testimonial designation style end

        // Style Content style start
        $this->start_controls_section(
            'testimonial_cntntbx_style',
            [
                'label'     => esc_html__('Content Box', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_cntntbx_align',
            [
                'label' => esc_html__('Alignment', 'outbuilt-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'outbuilt-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'outbuilt-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'outbuilt-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'outbuilt-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_cntntbx_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_cntntbx_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .testimonal .content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Content style end

        // Style Divider Shape style start
        $this->start_controls_section(
            'testimonial_dvdrshp_style',
            [
                'label'     => esc_html__('Divider/Shape Style', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'testimonial_dvdrshp_align',
            [
                'label' => esc_html__('Alignment', 'outbuilt-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'outbuilt-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'outbuilt-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'outbuilt-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'outbuilt-core'),
                        'icon' => 'fa fa-align-justify',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .testimonal .shape img' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .testimonal .shape' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_dvdrshp_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonal .shape img' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonal .shape' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'testimonial_dvdrshp_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .testimonal .shape img' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .testimonal .shape' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();
        // Style Divider Shape style end

        // Style Testimonial arrow style start
        $this->start_controls_section(
            'testimonial_arrow_style',
            [
                'label'     => esc_html__('Arrow', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_on' => 'yes',
                    'slarrows'  => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('testimonial_arrow_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'testimonial_arrow_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'testimonial_arrow_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#7d7d7d',
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_arrow_fontsize',
            [
                'label' => esc_html__('Font Size', 'outbuilt-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testimonial_arrow_background',
                'label' => esc_html__('Background', 'outbuilt-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-arrow',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_arrow_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-arrow',
            ]
        );

        $this->add_responsive_control(
            'testimonial_arrow_border_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_control(
            'testimonial_arrow_height',
            [
                'label' => esc_html__('Height', 'outbuilt-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 36,
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_arrow_width',
            [
                'label' => esc_html__('Width', 'outbuilt-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 36,
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'testimonial_arrow_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_tab();
        // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'testimonial_arrow_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'testimonial_arrow_hover_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testimonial_arrow_hover_background',
                'label' => esc_html__('Background', 'outbuilt-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-arrow:hover',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_arrow_hover_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-arrow:hover',
            ]
        );

        $this->add_responsive_control(
            'testimonial_arrow_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-arrow:hover' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover tab end

        $this->end_controls_tabs();

        $this->end_controls_section(); // Style Testimonial arrow style end


        // Style Testimonial Dots style start
        $this->start_controls_section(
            'testimonial_dots_style',
            [
                'label'     => esc_html__('Pagination', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'slider_on' => 'yes',
                    'sldots'  => 'yes',
                ],
            ]
        );

        $this->start_controls_tabs('testimonial_dots_style_tabs');

        // Normal tab Start
        $this->start_controls_tab(
            'testimonial_dots_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'outbuilt-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testimonial_dots_background',
                'label' => esc_html__('Background', 'outbuilt-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-dots li button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_dots_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-dots li button',
            ]
        );

        $this->add_responsive_control(
            'testimonial_dots_border_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-dots li button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->add_control(
            'testimonial_dots_height',
            [
                'label' => esc_html__('Height', 'outbuilt-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-dots li button' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'testimonial_dots_width',
            [
                'label' => esc_html__('Width', 'outbuilt-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 12,
                ],
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-dots li button' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        // Normal tab end

        // Hover tab Start
        $this->start_controls_tab(
            'testimonial_dots_style_hover_tab',
            [
                'label' => esc_html__('Active', 'outbuilt-core'),
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testimonial_dots_hover_background',
                'label' => esc_html__('Background', 'outbuilt-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-dots li.slick-active button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'testimonial_dots_hover_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .oc-testimonial-area .slick-dots li.slick-active button',
            ]
        );

        $this->add_responsive_control(
            'testimonial_dots_hover_border_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .oc-testimonial-area .slick-dots li.slick-active button' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_tab(); // Hover tab end

        $this->end_controls_tabs();

        $this->end_controls_section(); // Style Testimonial dots style end

    }

    protected function render($instance = []) {

        $settings   = $this->get_settings_for_display();

        $slider_settings = [
            'arrows' => ('yes' === $settings['slarrows']),
            'arrow_prev_txt' => Outbuil_Core_Icon_Manager::render_icon($settings['slprevicon'], ['aria-hidden' => 'true']),
            'arrow_next_txt' => Outbuil_Core_Icon_Manager::render_icon($settings['slnexticon'], ['aria-hidden' => 'true']),
            'dots' => ('yes' === $settings['sldots']),
            'autoplay' => ('yes' === $settings['slautolay']),
            'autoplay_speed' => absint($settings['slautoplay_speed']),
            'animation_speed' => absint($settings['slanimation_speed']),
            'pause_on_hover' => ('yes' === $settings['slpause_on_hover']),
            'center_mode' => ('yes' === $settings['slcentermode']),
            'center_padding' => absint($settings['slcenterpadding']),
            'testimonial_style_ck' => absint($settings['testimonial_style']),
        ];

        $slider_responsive_settings = [
            'display_columns' => $settings['slitems'],
            'scroll_columns' => $settings['slscroll_columns'],
            'tablet_width' => $settings['sltablet_width'],
            'tablet_display_columns' => $settings['sltablet_display_columns'],
            'tablet_scroll_columns' => $settings['sltablet_scroll_columns'],
            'mobile_width' => $settings['slmobile_width'],
            'mobile_display_columns' => $settings['slmobile_display_columns'],
            'mobile_scroll_columns' => $settings['slmobile_scroll_columns'],

        ];

        $slider_settings = array_merge($slider_settings, $slider_responsive_settings);


        $this->add_render_attribute('testimonial_area_attr', 'class', 'oc-testimonial-area');
        $this->add_render_attribute('testimonial_area_attr', 'class', 'oc-testimonial-style-' . $settings['testimonial_style']);

        if ($settings['slider_on'] == 'yes') {
            $this->add_render_attribute('testimonial_area_attr', 'class', 'oc-testimonial-activation');
            $this->add_render_attribute('testimonial_area_attr', 'data-settings', wp_json_encode($slider_settings));
        }

        if (($settings['testimonial_style'] == 3 || $settings['testimonial_style'] == 9) && $settings['slider_on'] != 'yes') {
            $this->add_render_attribute('testimonial_area_attr', 'class', 'htb-row');
        }

?>
        <div <?php echo $this->get_render_attribute_string('testimonial_area_attr'); ?>>

            <?php if ($settings['testimonial_style'] == 5) : ?>

                <div class="oc-testimonial-for">
                    <?php
                    foreach ($settings['testimonial_list'] as $testimonial) {
                        if (!empty($testimonial['client_say'])) {
                            echo '<div class="testimonial-desc"><p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p></div>';
                        }
                    }
                    ?>
                </div>

                <!-- Start Testimonial Nav -->
                <div class="oc-testimonal-nav">
                    <?php foreach ($settings['testimonial_list'] as $testimonial) : ?>
                        <div class="testimonal-img testimonal">
                            <?php
                            if (!empty($testimonial['client_image']['url'])) {
                                echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                            }
                            ?>
                            <div class="content">
                                <?php
                                if (!empty($testimonial['client_name'])) {
                                    echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                }
                                if (!empty($testimonial['client_designation'])) {
                                    echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                }
                                ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- End Testimonial Nav -->
                <div class="testimonial-shape">
                    <?php
                    if (!empty($settings['client_image_divider']['url'])) {
                        echo Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider');
                    }
                    ?>
                </div>

                <?php
            else :
                foreach ($settings['testimonial_list'] as $testimonial) :
                    if (($settings['testimonial_style'] == 3) && $settings['slider_on'] != 'yes') {
                        echo '<div class="htb-col-lg-6 htb-col-xl-6 htb-col-sm-12 htb-col-12">';
                    }
                ?>
                    <?php if ($settings['testimonial_style'] == 6) : ?>
                        <div class="testimonal">
                            <div class="content">
                                <?php
                                if (!empty($testimonial['client_say'])) {
                                    echo '<p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p>';
                                }
                                ?>
                                <div class="triangle"></div>
                            </div>
                            <div class="clint-info">
                                <?php
                                if (!empty($testimonial['client_image']['url'])) {
                                    echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                                }

                                if (!empty($settings['client_image_divider']['url'])) {
                                    echo '<div class="shape">' . Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider') . '</div>';
                                }

                                if (!empty($testimonial['client_name'])) {
                                    echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                }
                                if (!empty($testimonial['client_designation'])) {
                                    echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                }
                                ?>
                            </div>
                        </div>

                    <?php elseif ($settings['testimonial_style'] == 7) : ?>
                        <div class="testimonal">
                            <?php
                            if (!empty($testimonial['client_image']['url'])) {
                                echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                            }

                            if (!empty($settings['client_image_divider']['url'])) {
                                echo '<div class="shape">' . Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider') . '</div>';
                            }
                            if (!empty($testimonial['client_say'])) {
                                echo ' <div class="content"><p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p></div>';
                            }
                            ?>
                            <div class="clint-info">
                                <?php
                                if (!empty($testimonial['client_name'])) {
                                    echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                }
                                if (!empty($testimonial['client_designation'])) {
                                    echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                }
                                ?>
                            </div>
                        </div>

                    <?php elseif ($settings['testimonial_style'] == 8) : ?>
                        <div class="testimonal">
                            <div class="content">
                                <?php
                                if (!empty($testimonial['client_image']['url'])) {
                                    echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                                }

                                if (!empty($settings['client_image_divider']['url'])) {
                                    echo '<div class="shape">' . Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider') . '</div>';
                                }
                                ?>
                                <div class="clint-info">
                                    <?php
                                    if (!empty($testimonial['client_name'])) {
                                        echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                    }
                                    if (!empty($testimonial['client_designation'])) {
                                        echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if (!empty($testimonial['client_say'])) {
                                echo '<div class="content"><p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p></div>';
                            }
                            ?>
                        </div>

                    <?php elseif (($settings['testimonial_style'] == 9) && $settings['slider_on'] != 'yes') : ?>
                        <div class="htb-col-xl-4 htb-col-lg-4 htb-col-sm-6 htb-col-12">
                            <div class="testimonal">
                                <div class="content">
                                    <?php
                                    if (!empty($testimonial['client_image']['url'])) {
                                        echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                                    }

                                    if (!empty($settings['client_image_divider']['url'])) {
                                        echo '<div class="shape">' . Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider') . '</div>';
                                    }
                                    ?>
                                    <div class="clint-info">
                                        <?php
                                        if (!empty($testimonial['client_name'])) {
                                            echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                        }
                                        if (!empty($testimonial['client_designation'])) {
                                            echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                if (!empty($testimonial['client_say'])) {
                                    echo '<div class="content"><p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p></div>';
                                }
                                ?>
                            </div>
                        </div>

                    <?php else : ?>
                        <div class="testimonal">
                            <?php
                            if (!empty($testimonial['client_image']['url'])) {
                                echo '<div class="testimonal-image">' . Group_Control_Image_Size::get_attachment_image_html($testimonial, 'client_imagesize', 'client_image') . '</div>';
                            }

                            if (!empty($settings['client_image_divider']['url'])) {
                                echo '<div class="shape">' . Group_Control_Image_Size::get_attachment_image_html($settings, 'client_image_divider_size', 'client_image_divider') . '</div>';
                            }
                            ?>

                            <?php if ($settings['testimonial_style'] == 3) : ?>
                                <div class="content">
                                    <?php
                                    if (!empty($testimonial['client_say'])) {
                                        echo '<p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p>';
                                    }
                                    ?>
                                    <div class="clint-info">
                                        <?php
                                        if (!empty($testimonial['client_name'])) {
                                            echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                        }
                                        if (!empty($testimonial['client_designation'])) {
                                            echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php else : ?>
                                <div class="content">
                                    <?php
                                    if (!empty($testimonial['client_say'])) {
                                        echo '<p>' . esc_html__($testimonial['client_say'], 'outbuilt-core') . '</p>';
                                    }
                                    if (!empty($testimonial['client_name'])) {
                                        echo '<h4>' . esc_html__($testimonial['client_name'], 'outbuilt-core') . '</h4>';
                                    }
                                    if (!empty($testimonial['client_designation'])) {
                                        echo '<span>' . esc_html__($testimonial['client_designation'], 'outbuilt-core') . '</span>';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

            <?php
                    if (($settings['testimonial_style'] == 3) && $settings['slider_on'] != 'yes') {
                        echo '</div>';
                    }
                endforeach;
            endif;
            ?>
        </div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Outbuilt_Core_Widget_Testimonial());
