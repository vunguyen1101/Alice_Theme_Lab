<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Testimonial_Widget extends \Elementor\Widget_Base {

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
		return 'testimonial-present';
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
		return __( 'Alice Testimonial', 'alice' );
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
		return 'fa fa-weixin';
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
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
		  'post_type'   => 'testimonials',
		  'post_status' => 'publish',
		  'paged'          => $paged
		);
		
		$testimonials = new WP_Query( $args );
		if( $testimonials->have_posts() ) :
			echo '<div class="testi-homedisplay">';
			while( $testimonials->have_posts() ) :
			$testimonials->the_post();
		
			get_template_part( 'template-parts/content/content','testimonial' );

			endwhile;
			wp_reset_postdata();
			echo '</div>';
		else :
		  esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
		endif;
	

	}

}
