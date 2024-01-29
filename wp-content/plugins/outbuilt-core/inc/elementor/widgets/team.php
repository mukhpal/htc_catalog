<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Outbuilt_Core_Widget_Team extends Widget_Base {

    public function get_name() {
        return 'outbuilt-core-team';
    }

    public function get_title() {
        return esc_html__('Team Member', 'outbuilt-core');
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_keywords() {
        return ['team'];
    }

    public function get_categories() {
        return ['outbuilt_core_elements'];
    }

    public function get_script_depends() {
        return ['team-js'];
    }

    public function get_style_depends() {
        return ['team-css'];
    }

    protected function register_controls() {

        // Team Content tab Start
        $this->start_controls_section(
            'oc_teammember_content',
            [
                'label' => esc_html__('Team Member', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'oc_team_style',
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
                ],
            ]
        );

        $this->add_control(
            'oc_team_image_hover_style',
            [
                'label' => esc_html__('Image Hover Animate', 'outbuilt-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'top',
                'options' => [
                    'none'      => esc_html__('None', 'outbuilt-core'),
                    'left'      => esc_html__('Left', 'outbuilt-core'),
                    'right'     => esc_html__('Right', 'outbuilt-core'),
                    'top'       => esc_html__('Top', 'outbuilt-core'),
                    'bottom'    => esc_html__('Bottom', 'outbuilt-core'),
                ],
                'condition' => [
                    'oc_team_style' => '4',
                ],
            ]
        );

        $this->add_control(
            'oc_member_image',
            [
                'label' => esc_html__('Member image', 'outbuilt-core'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'oc_member_imagesize',
                'default' => 'large',
                'separator' => 'none',
            ]
        );

        $this->add_control(
            'oc_member_name',
            [
                'label' => esc_html__('Name', 'outbuilt-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Sams Roy', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'oc_member_designation',
            [
                'label' => esc_html__('Designation', 'outbuilt-core'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Managing director', 'outbuilt-core'),
                'condition' => [
                    'oc_team_style' => array('1', '3', '5', '6', '7'),
                ],
            ]
        );

        $this->add_control(
            'oc_member_bioinfo',
            [
                'label' => esc_html__('Bio Info', 'outbuilt-core'),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('I am web developer.', 'outbuilt-core'),
                'condition' => [
                    'oc_team_style' => array('1', '5', '6'),
                ],
            ]
        );

        $this->end_controls_section(); // End Team Content tab

        // Social Media tab
        $this->start_controls_section(
            'oc_team_member_social_link',
            [
                'label' => esc_html__('Social Media', 'outbuilt-core'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'oc_social_title',
            [
                'label'   => esc_html__('Title', 'outbuilt-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => 'Facebook',
            ]
        );

        $repeater->add_control(
            'oc_social_link',
            [
                'label'   => esc_html__('Link', 'outbuilt-core'),
                'type'    => Controls_Manager::TEXT,
                'default' => esc_html__('https://www.facebook.com/hastech.company/', 'outbuilt-core'),
            ]
        );

        $repeater->add_control(
            'oc_social_icon',
            [
                'label'   => esc_html__('Icon', 'outbuilt-core'),
                'type'    => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook-f',
                    'library' => 'solid',
                ],
            ]
        );

        $repeater->add_control(
            'oc_icon_color',
            [
                'label'     => esc_html__('Icon Color', 'outbuilt-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-social-network {{CURRENT_ITEM}} a' => 'color: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'oc_icon_background',
            [
                'label'     => esc_html__('Icon Background', 'outbuilt-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-social-network {{CURRENT_ITEM}} a' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'oc_icon_hover_color',
            [
                'label'     => esc_html__('Icon Hover Color', 'outbuilt-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-social-network {{CURRENT_ITEM}} a:hover' => 'color: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'oc_icon_hover_background',
            [
                'label'     => esc_html__('Icon Hover Background', 'outbuilt-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-social-network {{CURRENT_ITEM}} a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $repeater->add_control(
            'oc_icon_hover_border_color',
            [
                'label'     => esc_html__('Icon Hover border color', 'outbuilt-core'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-social-network {{CURRENT_ITEM}} a:hover' => 'border-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'oc_team_member_social_link_list',
            [
                'type'    => Controls_Manager::REPEATER,
                'fields'  => array_values($repeater->get_controls()),
                'default' => [

                    [
                        'oc_social_title'      => 'Facebook',
                        'oc_social_icon'       => 'fab fa-facebook-f',
                        'oc_social_link'       => esc_html__('https://www.facebook.com/hastech.company/', 'outbuilt-core'),
                    ],
                ],
                'title_field' => '{{{ oc_social_title }}}',
            ]
        );

        $this->end_controls_section(); // End Social Member tab

        // Member Item Style tab section
        $this->start_controls_section(
            'oc_team_member_style',
            [
                'label' => esc_html__('Style', 'outbuilt-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'team_member_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_member_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_member_background',
                'label' => esc_html__('Background', 'outbuilt-core'),
                'types' => ['classic', 'gradient'],
                'selector' => '{{WRAPPER}} .oc-team,{{WRAPPER}} .oc-team-style-6 .oc-team-info',
            ]
        );

        $this->add_control(
            'team_member_hover_content_bg',
            [
                'label' => esc_html__('Hover Content background color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .oc-team:hover .oc-team-hover-action' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .oc-team-style-6:hover .oc-team-info' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'oc_team_style' => array('1', '5', '6'),
                ],
            ]
        );

        $this->add_control(
            'team_member_hover_content_bg_2',
            [
                'label' => esc_html__('Hover Content background color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#18012c',
                'selectors' => [
                    '{{WRAPPER}} .oc-team-style-2 .oc-team-hover-action .oc-hover-action' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .oc-team-click-action' => 'background-color: {{VALUE}};',
                ],
                'condition' => [
                    'oc_team_style' => array('2', '3'),
                ],
            ]
        );

        $this->end_controls_section();

        // Team Member Name style tab start
        $this->start_controls_section(
            'oc_team_member_name_style',
            [
                'label'     => esc_html__('Name', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'oc_member_name!' => '',
                ],
            ]
        );

        $this->add_control(
            'team_name_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-name' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_name_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-team .oc-team-name',
            ]
        );

        $this->add_responsive_control(
            'team_name_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_name_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-name' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_name_align',
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
                    '{{WRAPPER}} .oc-team .oc-team-name' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); // Team Member Name style tab end

        // Team Member Designation style tab start
        $this->start_controls_section(
            'oc_team_member_designation_style',
            [
                'label'     => esc_html__('Designation', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'oc_member_designation!' => '',
                    'oc_team_style' => array('1', '3', '5', '6', '7'),
                ],
            ]
        );

        $this->add_control(
            'team_designation_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#343434',
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-designation' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_designation_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-team .oc-team-designation',
            ]
        );

        $this->add_responsive_control(
            'team_designation_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-designation' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_designation_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-designation' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_designation_align',
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
                    '{{WRAPPER}} .oc-team .oc-team-designation' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); // Team Member Designation style tab end

        // Team Member Bio Info style tab start
        $this->start_controls_section(
            'oc_team_member_bioinfo_style',
            [
                'label'     => esc_html__('Bio info', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'oc_member_bioinfo!' => '',
                    'oc_team_style' => array('1', '5', '6'),
                ],
            ]
        );

        $this->add_control(
            'team_bioinfo_color',
            [
                'label' => esc_html__('Color', 'outbuilt-core'),
                'type' => Controls_Manager::COLOR,
                'scheme' => [
                    'type' => \Elementor\Core\Schemes\Color::get_type(),
                    'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                ],
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-bio-info' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'team_bioinfo_typography',
                'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                'selector' => '{{WRAPPER}} .oc-team .oc-team-bio-info',
            ]
        );

        $this->add_responsive_control(
            'team_bioinfo_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-bio-info' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_bioinfo_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-team .oc-team-bio-info' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_bioinfo_align',
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
                    '{{WRAPPER}} .oc-team .oc-team-bio-info' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->end_controls_section(); // Team Member Designation style tab end

        // Team Member Social Media style tab start
        $this->start_controls_section(
            'oc_team_member_socialmedia_style',
            [
                'label'     => esc_html__('Social Media', 'outbuilt-core'),
                'tab'       => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'team_socialmedia_margin',
            [
                'label' => esc_html__('Margin', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-social-network li a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .oc-social-network li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_socialmedia_padding',
            [
                'label' => esc_html__('Padding', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .oc-social-network li a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'team_socialmedia_align',
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
                    '{{WRAPPER}} .oc-team ul.oc-social-network' => 'text-align: {{VALUE}};',
                ],
                'default' => 'center',
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'team_socialmedia_border',
                'label' => esc_html__('Border', 'outbuilt-core'),
                'selector' => '{{WRAPPER}} .oc-social-network li a',
            ]
        );

        $this->add_responsive_control(
            'team_socialmedia_radius',
            [
                'label' => esc_html__('Border Radius', 'outbuilt-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .oc-social-network li a' => 'border-radius: {{TOP}}px {{RIGHT}}px {{BOTTOM}}px {{LEFT}}px;',
                ],
            ]
        );

        $this->end_controls_section(); // Team Member Designation style tab end

    }

    protected function render($instance = []) {
        $settings   = $this->get_settings_for_display();

        $this->add_render_attribute('team_area_attr', 'class', 'oc-team');
        $this->add_render_attribute('team_area_attr', 'class', 'oc-team-style-' . $settings['oc_team_style']);
?>
        <div <?php echo $this->get_render_attribute_string('team_area_attr'); ?>>

            <?php if ($settings['oc_team_style'] == 2) : ?>
                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">
                        <div class="oc-hover-action">
                            <?php
                            if (!empty($settings['oc_member_name'])) {
                                echo '<h4 class="oc-team-name">' . esc_html__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                            }
                            ?>
                            <ul class="oc-social-network">
                                <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                    <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php elseif ($settings['oc_team_style'] == 3) : ?>
                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">

                        <div class="oc-team-click-action">
                            <div class="plus_click"></div>
                            <?php
                            if (!empty($settings['oc_member_name'])) {
                                echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                            }
                            if (!empty($settings['oc_member_designation'])) {
                                echo '<span class="oc-team-designation">' . esc_attr__($settings['oc_member_designation'], 'outbuilt-core') . '</span>';
                            }
                            ?>
                            <ul class="oc-social-network">
                                <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                    <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>

            <?php
            elseif ($settings['oc_team_style'] == 4) :
                $this->add_render_attribute('team_thumb_attr', 'class', 'oc-thumb');
                $this->add_render_attribute('team_thumb_attr', 'class', 'oc-team-image-hover-' . $settings['oc_team_image_hover_style']);
            ?>
                <div <?php echo $this->get_render_attribute_string('team_thumb_attr'); ?>>
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">
                        <div class="oc-hover-action">
                            <?php
                            if (!empty($settings['oc_member_name'])) {
                                echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                            }
                            if ($settings['oc_team_member_social_link_list']) :
                            ?>
                                <ul class="oc-social-network">
                                    <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                        <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php elseif ($settings['oc_team_style'] == 5) : ?>
                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">
                        <div class="oc-hover-action">
                            <?php
                            if (!empty($settings['oc_member_name'])) {
                                echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                            }
                            if (!empty($settings['oc_member_designation'])) {
                                echo '<span class="oc-team-designation">' . esc_attr__($settings['oc_member_designation'], 'outbuilt-core') . '</span>';
                            }
                            if (!empty($settings['oc_member_bioinfo'])) {
                                echo '<p class="oc-team-bio-info">' . esc_attr__($settings['oc_member_bioinfo'], 'outbuilt-core') . '</p>';
                            }
                            ?>
                            <?php if ($settings['oc_team_member_social_link_list']) : ?>
                                <ul class="oc-social-network">
                                    <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                        <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php elseif ($settings['oc_team_style'] == 6) : ?>
                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                </div>
                <div class="oc-team-info">
                    <div class="oc-team-content">
                        <?php
                        if (!empty($settings['oc_member_name'])) {
                            echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                        }
                        if (!empty($settings['oc_member_designation'])) {
                            echo '<span class="oc-team-designation">' . esc_attr__($settings['oc_member_designation'], 'outbuilt-core') . '</span>';
                        }
                        if (!empty($settings['oc_member_bioinfo'])) {
                            echo '<p class="oc-team-bio-info">' . esc_attr__($settings['oc_member_bioinfo'], 'outbuilt-core') . '</p>';
                        }
                        ?>
                    </div>
                    <?php if ($settings['oc_team_member_social_link_list']) : ?>
                        <ul class="oc-social-network">
                            <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

            <?php elseif ($settings['oc_team_style'] == 7) : ?>

                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">
                        <div class="oc-hover-action">
                            <?php if ($settings['oc_team_member_social_link_list']) : ?>
                                <ul class="oc-social-network">
                                    <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                        <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="oc-team-content">
                    <?php
                    if (!empty($settings['oc_member_name'])) {
                        echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                    }
                    if (!empty($settings['oc_member_designation'])) {
                        echo '<span class="oc-team-designation">' . esc_attr__($settings['oc_member_designation'], 'outbuilt-core') . '</span>';
                    }
                    ?>
                </div>

            <?php else : ?>
                <div class="oc-thumb">
                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'oc_member_imagesize', 'oc_member_image'); ?>
                    <div class="oc-team-hover-action">
                        <div class="oc-team-hover">
                            <?php if ($settings['oc_team_member_social_link_list']) : ?>
                                <ul class="oc-social-network">
                                    <?php foreach ($settings['oc_team_member_social_link_list'] as $socialprofile) : ?>
                                        <li class="elementor-repeater-item-<?php echo esc_attr($socialprofile['_id']); ?>"><a href="<?php echo esc_url($socialprofile['oc_social_link']); ?>"><?php echo Outbuil_Core_Icon_Manager::render_icon($socialprofile['oc_social_icon'], ['aria-hidden' => 'true']); ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            <?php if (!empty($settings['oc_member_bioinfo'])) {
                                echo '<p class="oc-team-bio-info">' . esc_attr__($settings['oc_member_bioinfo'], 'outbuilt-core') . '</p>';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="oc-team-content">
                    <?php
                    if (!empty($settings['oc_member_name'])) {
                        echo '<h4 class="oc-team-name">' . esc_attr__($settings['oc_member_name'], 'outbuilt-core') . '</h4>';
                    }
                    if (!empty($settings['oc_member_designation'])) {
                        echo '<p class="oc-team-designation">' . esc_attr__($settings['oc_member_designation'], 'outbuilt-core') . '</p>';
                    }
                    ?>
                </div>
            <?php endif; ?>
        </div>
<?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type(new Outbuilt_Core_Widget_Team());
