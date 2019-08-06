<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Blogs_Display extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'blog-display';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Blogs Display', 'alice' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-book';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'my-section' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		
		$this->start_controls_section(
			'content_tab',
			[
				'label' => __( 'Tab', 'alice' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'blog-post-amount',
			[
				'label' => __( 'Number of posts', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'number',
				'default' => 4
			]
		);


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

		$args = array(
		'post_type'   => 'post',
		'post_status' => 'publish',
		'posts_per_page' => $settings['blog-post-amount']
		);
		
		$post = new WP_Query( $args );
		if( $post->have_posts() ){
			echo '<div class="row">';
			while( $post->have_posts() ) :
			$post->the_post();

			get_template_part( 'template-parts/content/blog','homedisplay' );

			endwhile;
			echo '</div>';
		}
		printf(
			'<div class="ViewallPost"><span><a id="schedule-btn" href="%1$s">'.__('VIEW ALL POSTS','alice').'</a></span></div>',
			get_permalink( get_page_by_title('Blog') )
		);
	}

}
