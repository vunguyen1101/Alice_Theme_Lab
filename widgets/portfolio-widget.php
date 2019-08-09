<?php

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_Test_Widget extends \Elementor\Widget_Base {

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
		return 'feature-project';
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
		return __( 'FEATURED PROJECTS', 'alice' );
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
		return 'fa fa-image';
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
			'portfolio-post-amount',
			[
				'label' => __( 'Number of posts', 'alice' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'number',
				'default' => 15
			]
		);
		$this->end_controls_section();

		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Apperance Categories', 'alice' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_elements',
			[
				'label' => __( 'Show Categories', 'alice' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options' => cateList(),
				// [
				// 	'carpet'  => __( 'Carpet', 'alice' ),
				// 	'construction ' => __( 'Construction ', 'alice' ),
				// 	'house' => __( 'House', 'alice' ),
				// 	'move-in-out' => __( 'Move-in-out', 'alice' ),
				// ],
				'default' => [ 'carpet', 'description' ],
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

		echo '<div class="tagProject">';
			foreach ( $settings['show_elements'] as $element ) {
			
				echo '<span data-filter=".'.$element.'">' .$element.' CLEANING</span>'; 
			}	
		echo '</div>';


		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		$args = array(
		  'post_type'   => 'portfolio',
		  'post_status' => 'publish',
		  'posts_per_page' => $settings['portfolio-post-amount'],
		  'paged'          => $paged
		);
		
		$portfolio = new WP_Query( $args );
		if( $portfolio->have_posts() ) :
		?>
		
		<div class="ProjectImg">
			<?php
			while( $portfolio->have_posts() ) :
			$portfolio->the_post();
			?>
			<div class="<?php 
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo esc_html( $categories[0]->slug );   
				}
			?>">
				<a href="<?php the_permalink(); ?>" class="ExpertTagHover"><span class="ion-ios-eye"></span></a>
				<?php
				the_post_thumbnail('portfolio_thumb');
				?>
			</div>
	
			<?php
			endwhile;
			wp_reset_postdata();
  
		  	?>
		</div>
		<?php
		else :
		  esc_html_e( 'No testimonials in the diving taxonomy!', 'alice' );
		endif;
	

	}


}
function cateList(){
	$cats = get_categories('child_of='.get_query_var('portfolio'));
	$cate_list = array(); 
	foreach ($cats as $cat) :
	$args = array(
	'post_type'   => 'portfolio',
	'category__in' => array($cat->term_id)
	);

	$my_query = new WP_Query($args); 
	
	if ($my_query->have_posts()  ):
		$cate_list[$cat->slug] = $cat->name;

	endif;
	endforeach;

	return $cate_list;
}