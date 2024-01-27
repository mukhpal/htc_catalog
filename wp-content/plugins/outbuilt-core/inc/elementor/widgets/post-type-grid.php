<?php
/**
 * Post grid widgets
 */

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Outbuilt_Core_Widget_Post_Type_Grid extends Widget_Base {

	public function get_name() {
		return 'outbuilt-core-post-type-grid';
	}

	public function get_title() {
		return esc_html__( 'Post Type Grid', 'outbuilt-core' );
	}

	public function get_icon() {
		return 'eicon-posts-grid';
	}

	public function get_keywords() {
		return [ 'blog', 'post' ];
	}

	public function get_categories() {
		return [ 'outbuilt_core_elements' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'section_post',
			[
				'label' => esc_html__( 'Post Type Grid', 'outbuilt-core' ),
			]
		);

		$this->add_control(
			'post_type',
			[
				'label'         => esc_html__( 'Post Type', 'outbuilt-core' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'post',
				'options'       => get_post_types( [
					'public' => true,
					'show_in_nav_menus' => true
				] ),
			]
		);

		$this->add_control(
			'count',
			[
				'label'         => esc_html__( 'Posts Per Page', 'outbuilt-core' ),
				'description'   => esc_html__( 'You can enter "-1" to display all items.', 'outbuilt-core' ),
				'type'          => Controls_Manager::TEXT,
				'default'       => '6',
				'label_block'   => true,
			]
		);

		$this->add_control(
			'order',
			[
				'label'         => esc_html__( 'Order', 'outbuilt-core' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''          => esc_html__( 'Default', 'outbuilt-core' ),
					'DESC'      => esc_html__( 'DESC', 'outbuilt-core' ),
					'ASC'       => esc_html__( 'ASC', 'outbuilt-core' ),
				],
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'         => esc_html__( 'Order By', 'outbuilt-core' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => '',
				'options'       => [
					''              => esc_html__( 'Default', 'outbuilt-core' ),
					'date'          => esc_html__( 'Date', 'outbuilt-core' ),
					'title'         => esc_html__( 'Title', 'outbuilt-core' ),
					'name'          => esc_html__( 'Name', 'outbuilt-core' ),
					'modified'      => esc_html__( 'Modified', 'outbuilt-core' ),
					'author'        => esc_html__( 'Author', 'outbuilt-core' ),
					'rand'          => esc_html__( 'Random', 'outbuilt-core' ),
					'ID'            => esc_html__( 'ID', 'outbuilt-core' ),
					'comment_count' => esc_html__( 'Comment Count', 'outbuilt-core' ),
					'menu_order'    => esc_html__( 'Menu Order', 'outbuilt-core' ),
				],
			]
		);

		$this->add_control(
			'columns',
			[
				'label'         => esc_html__( 'Columns', 'outbuilt-core' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'three-columns',
				'options'       => [
					'two-columns'   => esc_html__( 'Two Columns', 'outbuilt-core' ),
					'three-columns' => esc_html__( 'Three Columns', 'outbuilt-core' ),
				],
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'         => esc_html__( 'Pagination', 'outbuilt-core' ),
				'type'          => Controls_Manager::SELECT,
				'default'       => 'disable',
				'options'       => [
					'enable'  => esc_html__( 'Enable', 'outbuilt-core' ),
					'disable' => esc_html__( 'Disable', 'outbuilt-core' ),
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings();

		// Vars
		$post_type      = $settings['post_type'];
		$posts_per_page = absint( $settings['count'] );
		$order 			= $settings['order'];
		$orderby  		= $settings['orderby'];

		$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

		$args = array(
			'posts_per_page'    => $posts_per_page,
			'post_type'         => $post_type,
			'paged'             => $paged,
			'order'             => $order,
			'orderby'           => $orderby
		);

		// Build the WordPress query
		$type = new \WP_Query( $args );

		// Output posts
		if ( $type->have_posts() ) :

			// Var
			$columns = $settings['columns'];
			$paging  = $settings['pagination'];

			// Wrapper classes
			$wrap_classes = array( 'posts-grid', 'post-type-grid' );
			$wrap_classes[] = $columns;
			$wrap_classes = implode( ' ', $wrap_classes );
			?>

			<div class="<?php echo esc_attr( $wrap_classes ); ?>">

				<?php

				// Start loop
				while ( $type->have_posts() ) : $type->the_post(); ?>

					<?php get_template_part( 'partials/post-types/content', 'post-types' ); ?>

				<?php
				// End entry loop
				endwhile; ?>

			</div><!-- .posts -->

			<?php
				if ( get_query_var( 'page' ) ) {
					$paged = get_query_var( 'page' );
				} elseif ( get_query_var( 'paged' ) ) {
					$paged = get_query_var( 'paged' );
				} else {
					$paged = 1;
				}
				$pagination = paginate_links( array(
					'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
					'total'        => $type->max_num_pages,
					'current'      => max( 1, $paged ),
					'format'       => '?paged=%#%',
					'show_all'     => false,
					'prev_next'    => true,
					'add_args'     => false,
				) );

				if ( 'enable' == $paging ) :
			?>
				<nav class="navigation pagination">
					<div class="nav-links">
						<?php echo $pagination; ?>
					</div>
				</nav>
			<?php endif; ?>

			<?php
			// Reset the post data to prevent conflicts with WP globals
			wp_reset_postdata();

		else : ?>

			<?php get_template_part( 'partials/content/content', 'none' ); ?>

		<?php endif; ?>

	<?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Outbuilt_Core_Widget_Post_Type_Grid() );
