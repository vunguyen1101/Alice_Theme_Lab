<?php

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.2.0
 */
class Plugin {
	/**
	 * Instance
	 *
	 * @since 1.2.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;
	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.2.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * widget_scripts
	 *
	 * Load required plugin core files.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function widget_scripts() {
		wp_register_script( 'elementor-hello-world', plugins_url( '/disc/js/main.js', __FILE__ ), [ 'jquery' ], false, true );
	}
	/**
	 * Include Widgets files
	 *
	 * Load widgets files
	 *
	 * @since 1.2.0
	 * @access private
	 */
	private function include_widgets_files() {
		require_once( __DIR__ . '/portfolio-widget.php' );
		require_once( __DIR__ . '/service-block.php' );
		require_once( __DIR__ . '/testimonial-widget.php' );
		require_once( __DIR__ . '/alice-expert-staff.php' );
		require_once( __DIR__ . '/blog-widget.php' );
	}
	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();
		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor_Test_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Alice_Image_Box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Testimonial_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Alice_Expert_Staff_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Blogs_Display() );
    }

    
	//Create new section on elementor
	public function initiate_widget_category()
	{
		Elementor\Plugin::instance()->elements_manager->add_category(
			'my-section',
			array(
				'title' => __('Alice Theme Widgets', 'alice')
			),
			1
		);
	}
    
	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.2.0
	 * @access public
	 */
	public function __construct() {
		// Register widget scripts 
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// Register widgets
        add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );

		add_action('elementor/init', [$this, 'initiate_widget_category']);
        
	}
}
// Instantiate Plugin Class
Plugin::instance();