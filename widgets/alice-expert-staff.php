<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alice_Expert_Staff_Widget extends \Elementor\Widget_Base {

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
		return 'expert-staff-carousel';
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
		return __( 'Expert_Staffs', 'alice' );
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
		return 'fa fa-vcard';
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
		  'post_type'   => 'staffs',
		  'post_status' => 'publish',
		  'paged'          => $paged
		);
		
		$staff = new WP_Query( $args );
		if( $staff->have_posts() ) :
		?>
		<div class="row CarouselStaff">
            
			<?php
			while( $staff->have_posts() ) :
			$staff->the_post();
		
			get_template_part( 'template-parts/content/staffs','homedisplay' );

			endwhile;
			wp_reset_postdata();
  
		  	?>
			
		</div>
		<?php
		else :
		  esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
		endif;

		printf(
			'<div class="getSchedule VIewallstaff"><span><a href="%1$s">'.__('VIEW ALL STAFFS','alice').'</a></span></div>',
			get_permalink( get_page_by_title('Blog') )
		);

	}

}
