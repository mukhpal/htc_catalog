<?php

/**
 * Post carousel widgets
 */

namespace Elementor;

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Outbuilt_Core_Widget_Post_Carousel extends Widget_Base {

    public function get_name() {
        return 'outbuilt-core-post-type-carousel';
    }

    public function get_title() {
        return esc_html__('Post Type Carousel', 'outbuilt-core');
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_keywords() {
        return ['blog', 'post', 'carousel'];
    }

    public function get_categories() {
        return ['outbuilt_core_elements'];
    }

    public function get_script_depends() {
        return ['slick-js', 'carousel-js'];
    }

    public function get_style_depends() {
        return ['slick-css'];
    }

    protected function register_controls() {

        $this->start_controls_section(
            'post_carousel',
            [
                'label' => esc_html__('Post Type Carousel', 'outbuilt-core'),
            ]
        );

        $this->add_control(
            'post_type',
            [
                'label'         => esc_html__('Post Type', 'outbuilt-core'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'post',
                'options'       => get_post_types([
                    'public' => true,
                    'show_in_nav_menus' => true
                ]),
            ]
        );

        $this->add_control(
            'count',
            [
                'label'         => esc_html__('Posts Per Page', 'outbuilt-core'),
                'description'   => esc_html__('You can enter "-1" to display all items.', 'outbuilt-core'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '6',
                'label_block'   => true,
            ]
        );

        $this->add_control(
            'order',
            [
                'label'         => esc_html__('Order', 'outbuilt-core'),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''          => esc_html__('Default', 'outbuilt-core'),
                    'DESC'      => esc_html__('DESC', 'outbuilt-core'),
                    'ASC'       => esc_html__('ASC', 'outbuilt-core'),
                ],
            ]
        );

        $this->add_control(
            'orderby',
            [
                'label'         => esc_html__('Order By', 'outbuilt-core'),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    ''              => esc_html__('Default', 'outbuilt-core'),
                    'date'          => esc_html__('Date', 'outbuilt-core'),
                    'title'         => esc_html__('Title', 'outbuilt-core'),
                    'name'          => esc_html__('Name', 'outbuilt-core'),
                    'modified'      => esc_html__('Modified', 'outbuilt-core'),
                    'author'        => esc_html__('Author', 'outbuilt-core'),
                    'rand'          => esc_html__('Random', 'outbuilt-core'),
                    'ID'            => esc_html__('ID', 'outbuilt-core'),
                    'comment_count' => esc_html__('Comment Count', 'outbuilt-core'),
                    'menu_order'    => esc_html__('Menu Order', 'outbuilt-core'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings();

        // Vars
        $post_type      = $settings['post_type'];
        $posts_per_page = absint($settings['count']);
        $order             = $settings['order'];
        $orderby          = $settings['orderby'];

        $args = array(
            'posts_per_page' => $posts_per_page,
            'post_type'      => $post_type,
            'order'          => $order,
            'orderby'        => $orderby
        );

        // Build the WordPress query
        $carousel = new \WP_Query($args);

        // Output posts
        if ($carousel->have_posts()) :

            // Wrapper classes
            $wrap_classes = array('posts', 'post-carousel', 'post-type-grid');
            $wrap_classes = implode(' ', $wrap_classes);
?>

            <div class="<?php echo esc_attr($wrap_classes); ?>">

                <?php

                // Start loop
                while ($carousel->have_posts()) : $carousel->the_post(); ?>

                    <?php get_template_part('partials/post-types/content', 'post-types'); ?>

                <?php
                // End entry loop
                endwhile; ?>

            </div><!-- .posts -->

        <?php
            // Reset the post data to prevent conflicts with WP globals
            wp_reset_postdata();

        else : ?>

            <?php get_template_part('partials/content/content', 'none'); ?>

        <?php endif; ?>

<?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Outbuilt_Core_Widget_Post_Carousel());
