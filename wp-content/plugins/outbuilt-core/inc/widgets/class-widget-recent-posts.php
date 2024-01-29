<?php

/**
 * Recent Posts Widget.
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class Outbuilt_Addon_Recent_Posts_Thumbnails_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     *
     * @since 1.0.0
     */
    public function __construct() {
        parent::__construct(
            'outbuilt_recent_posts',
            esc_html__('&rarr;  Recent Posts Thumbnail', 'outbuilt-core'),
            array(
                'classname'   => 'widget-outbuilt-recent-posts recent-posts-widget',
                'description' => esc_html__('Shows a listing of your recent or random posts with thumbnail.', 'outbuilt-core'),
                'customize_selective_refresh' => true,
            )
        );

        $this->defaults = array(
            'title'      => esc_html__('Recent Posts', 'outbuilt-core'),
            'thumbnail'  => 1,
            'number'     => '3',
            'post_type'  => 'post',
            'taxonomy'   => '',
            'terms'      => '',
            'order'      => 'DESC',
            'orderby'    => 'date',
            'style'      => 'classic',
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     * @since 1.0.0
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {

        // Parse instance
        extract(wp_parse_args($instance, $this->defaults));

        // Apply filters to the title
        $title = isset($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';

        // Before widget WP hook
        echo $args['before_widget'];

        // Show widget title
        if ($title) {
            echo $args['before_title'] . esc_html($title) . $args['after_title'];
        }

        // Wrapper classes
        $wrap_classes   = array('outbuilt-recent-posts');
        $wrap_classes[] = $style;
        $wrap_classes   = implode(' ', $wrap_classes); ?>

        <ul class="<?php echo esc_attr($wrap_classes); ?>">

            <?php
            // Query args
            $query_args = array(
                'post_type'      => $post_type,
                'posts_per_page' => $number,
                'no_found_rows'  => true,
            );

            // Order params - needs FALLBACK don't ever edit!
            if (!empty($orderby)) {
                $query_args['order']   = $order;
                $query_args['orderby'] = $orderby;
            } else {
                $query_args['orderby'] = $order; // THIS IS THE FALLBACK
            }

            // Taxonomy args
            if (!empty($taxonomy) && !empty($terms)) {

                // Sanitize terms and convert to array
                $terms = str_replace(', ', ',', $terms);
                $terms = explode(',', $terms);

                // Add to query arg
                $query_args['tax_query']  = array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => $terms,
                    ),
                );
            }

            // Query posts
            $outbuilt_query = new WP_Query($query_args);

            if ($outbuilt_query->have_posts()) :

                while ($outbuilt_query->have_posts()) : $outbuilt_query->the_post(); ?>

                    <li class="clr">

                        <?php if (has_post_thumbnail() && (1 == $thumbnail)) { ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="recent-posts-thumbnail">
                                <?php
                                // Display post thumbnail
                                the_post_thumbnail('thumbnail', array(
                                    'alt'        => get_the_title(),
                                )); ?>
                            </a>
                        <?php } ?>

                        <div class="recent-posts-details clr">

                            <div class="recent-posts-details-inner clr">

                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="recent-posts-title"><?php the_title(); ?></a>

                                <div class="recent-posts-info clr">
                                    <div class="recent-posts-date"><?php echo human_time_diff(get_the_time('U'), current_time('timestamp')); ?></div>
                                    <?php if ($post_type == 'post') : ?>
                                        <div class="recent-posts-comments"><span class="sep">/</span><a href="<?php comments_link(); ?>"><?php comments_number(esc_html__('0 Comments', 'outbuilt-core'), esc_html__('1 Comment',  'outbuilt'), esc_html__('% Comments', 'outbuilt-core')); ?></a></div>
                                    <?php endif; ?>
                                </div>

                            </div>

                        </div>

                    </li>

                <?php endwhile; ?>

            <?php else : ?>

                <p class="not-found">
                    <?php esc_html_e('No posts found.', 'outbuilt-core'); ?>
                </p>

            <?php endif; ?>

        </ul>

        <?php wp_reset_postdata(); ?>

    <?php
        // After widget WP hook
        echo $args['after_widget'];
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     * @since 1.0.0
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance                 = $old_instance;
        $instance['title']      = !empty($new_instance['title']) ? strip_tags($new_instance['title']) : '';
        $instance['thumbnail']  = !empty($new_instance['thumbnail']) ? strip_tags($new_instance['thumbnail']) : '';
        $instance['post_type']  = !empty($new_instance['post_type']) ? strip_tags($new_instance['post_type']) : '';
        $instance['taxonomy']   = !empty($new_instance['taxonomy']) ? strip_tags($new_instance['taxonomy']) : '';
        $instance['terms']      = !empty($new_instance['terms']) ? strip_tags($new_instance['terms']) : '';
        $instance['number']     = !empty($new_instance['number']) ? strip_tags($new_instance['number']) : '';
        $instance['order']      = !empty($new_instance['order']) ? strip_tags($new_instance['order']) : '';
        $instance['orderby']    = !empty($new_instance['orderby']) ? strip_tags($new_instance['orderby']) : '';
        $instance['style']    = !empty($new_instance['style']) ? strip_tags($new_instance['style']) : '';
        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {

        extract(wp_parse_args((array) $instance, $this->defaults)); ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'outbuilt-core'); ?></label>
            <input class="widefat" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <input class="widefat" name="<?php echo esc_attr($this->get_field_name('thumbnail')); ?>" id="<?php echo esc_attr($this->get_field_id('thumbnail')); ?>" type="checkbox" value="1" <?php checked($thumbnail, 1); ?> />
            <label for="<?php echo esc_attr($this->get_field_id('thumbnail')); ?>"><?php esc_html_e('Enable thumbnail?', 'outbuilt-core'); ?></label>
        </p>

        <p><?php esc_html_e('Post style', 'outbuilt-core'); ?></p>
        <p>
            <input class="widefat" name="<?php echo $this->get_field_name('style'); ?>" type="radio" value="classic" <?php checked($style, 'classic'); ?> id="<?php echo $this->get_field_id('style_classic'); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('style_classic')); ?>"><?php esc_html_e('Classic style', 'outbuilt-core'); ?></label>
        </p>
        <p>
            <input class="widefat" name="<?php echo $this->get_field_name('style'); ?>" type="radio" value="grid" <?php checked($style, 'grid'); ?> id="<?php echo $this->get_field_id('style_grid'); ?>" />
            <label for="<?php echo esc_attr($this->get_field_id('style_grid')); ?>"><?php esc_html_e('Grid style', 'outbuilt-core'); ?></label>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number', 'outbuilt-core'); ?></label>
            <input class="widefat" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="number" min="0" step="1" value="<?php echo esc_attr($number); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('post_type')); ?>"><?php esc_html_e('Post Type', 'outbuilt-core'); ?></label>
            <br />
            <select class='outbuilt-select' name="<?php echo esc_attr($this->get_field_name('post_type')); ?>" style="width:100%;">
                <option value="post" <?php selected($post_type, 'post'); ?>><?php esc_html_e('Post', 'outbuilt-core'); ?></option>
                <?php
                // Get Post Types
                $get_post_types = get_post_types(array(
                    'public'   => true,
                    '_builtin' => false,
                ), 'objects', 'and');
                foreach ($get_post_types as $key => $val) : ?>
                    <?php if ($key != 'post') { ?>
                        <option value="<?php echo esc_attr($key); ?>" <?php selected($post_type, $key); ?>><?php echo esc_html($val->labels->name); ?></option>
                    <?php } ?>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>"><?php esc_html_e('Query By Taxonomy', 'outbuilt-core'); ?></label>
            <br />
            <select class='outbuilt-select' name="<?php echo esc_attr($this->get_field_name('taxonomy')); ?>" style="width:100%;">
                <option value="" <?php if (!$taxonomy) { ?>selected="selected" <?php } ?>><?php esc_html_e('No', 'outbuilt-core'); ?></option>
                <?php
                // Get Taxonomies
                $get_taxonomies = get_taxonomies(array(
                    'public' => true,
                ), 'objects'); ?>
                <?php foreach ($get_taxonomies as $get_taxonomy) : ?>
                    <option value="<?php echo esc_attr($get_taxonomy->name); ?>" <?php selected($taxonomy, $get_taxonomy->name); ?>><?php echo esc_html(ucfirst($get_taxonomy->labels->singular_name)); ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('terms')); ?>"><?php esc_html_e('Terms', 'outbuilt-core'); ?></label>
            <br />
            <input class="widefat" name="<?php echo esc_attr($this->get_field_name('terms')); ?>" type="text" value="<?php echo esc_attr($terms); ?>" />
            <small><?php esc_html_e('Enter the term slugs to query by seperated by a "comma"', 'outbuilt-core'); ?></small>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('order')); ?>"><?php esc_html_e('Order', 'outbuilt-core'); ?></label>
            <br />
            <select class='outbuilt-select' name="<?php echo esc_attr($this->get_field_name('order')); ?>" style="width:100%;">
                <option value="DESC" <?php selected($order, 'DESC', true); ?>><?php esc_html_e('Descending', 'outbuilt-core'); ?></option>
                <option value="ASC" <?php selected($order, 'ASC', true); ?>><?php esc_html_e('Ascending', 'outbuilt-core'); ?></option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('orderby')); ?>"><?php esc_html_e('Order By', 'outbuilt-core'); ?>:</label>
            <br />
            <select class='outbuilt-select' name="<?php echo esc_attr($this->get_field_name('orderby')); ?>" id="<?php echo esc_attr($this->get_field_id('orderby')); ?>" style="width:100%;">
                <?php
                // Orderby options
                $orderby_array = array(
                    'date'          => esc_html__('Date', 'outbuilt-core'),
                    'title'         => esc_html__('Title', 'outbuilt-core'),
                    'modified'      => esc_html__('Modified', 'outbuilt-core'),
                    'author'        => esc_html__('Author', 'outbuilt-core'),
                    'rand'          => esc_html__('Random', 'outbuilt-core'),
                    'comment_count' => esc_html__('Comment Count', 'outbuilt-core'),
                );
                foreach ($orderby_array as $key => $value) { ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected($orderby, $key); ?>>
                        <?php echo esc_attr(strip_tags($value)); ?>
                    </option>
                <?php } ?>
            </select>
        </p>

<?php

    }
}
register_widget('Outbuilt_Addon_Recent_Posts_Thumbnails_Widget');
