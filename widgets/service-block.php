<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Alice_Image_Box extends \Elementor\Widget_Base {

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
		return 'service-block';
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
		return __( 'Service Block', 'alice' );
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
		return 'fa fa-home';
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
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'service-post-amount',
			[
				'label' => __( 'Number of posts', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'number',
				'default' => 4
			]
		);

		$this->end_controls_section();

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
        ?>
        <div class="container">
            <div class="row">
        <?php    
            $args = array(
            'post_type'   => 'service',
            'post_status' => 'publish',
            'posts_per_page' => $settings['service-post-amount']
            );
            
            $service = new WP_Query( $args );
            if( $service->have_posts() ) :
            ?>
        
            <?php
                while( $service->have_posts() ) :
                $service->the_post();
                echo '<div class="col-lg-3 col-sm-4">';
                get_template_part( 'template-parts/content/service','homedisplay' );
                echo '</div>';
            ?>

            <?php
                endwhile;
                wp_reset_postdata();
            ?>
            <?php
            else :
            esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
            endif;
            
            printf(
                '<div class="getSchedule homebtn"><span><a id="schedule-btn" href="%1$s">'.__('GET FREE SCHEDULE','alice').'</a></span></div>',
                get_permalink( get_page_by_title('Service') )
            );
            
        ?>
            </div>
        </div>  
        <?php
    }
}