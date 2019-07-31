<?php

if ( ! function_exists( 'alice_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function alice_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Nineteen, use a find and replaces
		 * to change 'alice' to the name of your theme in all the template files.
		 */
		add_theme_support( 'title-tag' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'custom-background' );
		
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus(
			array(
				'primary-menu' => __( 'Primary', 'alice' ),
				'DeskTopNav' => __( 'DeskTop Nav Menu', 'alice' ),
				'mobile-menu' => __( 'Mobile Nav Menu', 'alice' ),
				'footer-menu' => __( 'Footer Menu', 'alice' ),
				'social-menu' => __( 'Social Links Menu', 'alice' ),
				'usefull-link-menu' => __( 'Usefull Links Menu', 'alice' ),
			)
		);


		add_theme_support( 'html5', array( 'search-form' ) );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			)
		);

		/*
		* Thêm chức năng post format
		*/
		add_theme_support( 'post-formats',
			array(
					'video',
					'image',
					'link',
					'gallery',
					'quote',
					'audio'
	
			)
		);
		
		//woocommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );


	}
endif;
add_action( 'after_setup_theme', 'alice_setup' );

////-----------------------------------------------------------------------------------------PAGINATION---------------------------------------------------------------------------------

function pagination_bar( $custom_query ) {

    $total_pages = $custom_query->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));

        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}



////-----------------------------------------------------------------------------------------LOAD MENU---------------------------------------------------------------------------------

if ( ! function_exists( 'alice_menu' ) ) {
	function alice_menu( $slug ) {
	$menu = array(
		'theme_location' => $slug,
		'container' => 'nav',
		'container_class' => $slug,
		'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</s>'
	);
	wp_nav_menu( $menu );
	}
}

////-----------------------------------------------------------------------------------------Tạo sidebar cho theme----------------------------------------------------------------------------------

/* Add Multiple sidebar 
*/
if ( function_exists('register_sidebar') ) {
    $sidebar1 = array(
		'name' => 'Blog sidebar',
		'id' => 'blog-sidebar',
		'description' => 'Appears in the Blog Page',
		'before_widget' => '<div id="%1$s" class="Blogcategories">',
		'after_widget' => '</div>',
		'before_title' => '<div class="ThreeDots">
		<div class="sidebardot sbdot1"></div>
		<div class="sidebardot sbdot1"></div>
		<div class="sidebardot sbdot1"></div>
		</div><p class="getaprice">',
		'after_title' => '</p>', 
    );    
	register_sidebar($sidebar1);

	$sidebar2 = array(
		'name' => 'Footer sidebar',
		'id' => 'footer-sidebar',
		'description' => 'Appears in the Footer',
		'before_widget' => '<div class="col-lg-3 col-sm-6">',
		'after_widget' => '</div>',
		'before_title' => '<p class="Location">',
		'after_title' => '</p>'
    );    
	register_sidebar($sidebar2);

	$sidebar3 = array(
		'name' => 'Service Sidebar',
		'id' => 'service-sidebar',
		'description' => 'Appears in the Service Page',
		'before_title' => '<p class="service-sidebar__tittle">',
		'after_title' => '</p>'
    );    
	register_sidebar($sidebar3);

}


////-----------------------------------------------------------------------------------------Tạo Custom post type----------------------------------------------------------------------------------
///------------------------------------------------------------------------------ Service------------------------------------------------

function Create_custom_post_type()
{
	/*
	* Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
	*/
	$label = array(
		'name' => 'Services', //Tên post type dạng số nhiều
		'singular_name' => 'Service' //Tên post type dạng số ít
	);
	/*
	* Biến $args là những tham số quan trọng trong Post Type
	*/
	$args = array(
		'labels' => $label, //Gọi các label trong biến $label ở trên
		'description' => 'Services of Alcie Maid', //Mô tả của post type
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields'
		), //Các tính năng được hỗ trợ trong post type
		'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
		'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
		'public' => true, //Kích hoạt post type
		'show_ui' => true, //Hiển thị khung quản trị như Post/Page
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'dashicons-heart', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post' //
	);
	register_post_type('service', $args);

///------------------------------------------------------------------------------ Porfolio------------------------------------------------
	$label2 = array(
		'name' => 'Portfolios', //Tên post type dạng số nhiều
		'singular_name' => 'Portfolio' //Tên post type dạng số ít
	);
	$args2 = array(
		'labels' => $label2, //Gọi các label trong biến $label ở trên
		'description' => 'Portfolios of Alcie Maid', //Mô tả của post type
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields'
		), //Các tính năng được hỗ trợ trong post type
		'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
		'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
		'public' => true, //Kích hoạt post type
		'show_ui' => true, //Hiển thị khung quản trị như Post/Page
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'dashicons-list-view', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post' //
	);
	register_post_type('portfolio', $args2);

	///------------------------------------------------------------------------------ Testimonials ------------------------------------------------
	$label3 = array(
		'name' => 'Testimonials', //Tên post type dạng số nhiều
		'singular_name' => 'Testimonial' //Tên post type dạng số ít
	);
	$args3 = array(
		'labels' => $label3, //Gọi các label trong biến $label ở trên
		'description' => 'Testimonials of Alcie Maid', //Mô tả của post type
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'author',
			'thumbnail',
			'comments',
			'revisions',
			'custom-fields'
		), //Các tính năng được hỗ trợ trong post type
		'taxonomies' => array( 'category', 'post_tag' ), //Các taxonomy được phép sử dụng để phân loại nội dung
		'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
		'public' => true, //Kích hoạt post type
		'show_ui' => true, //Hiển thị khung quản trị như Post/Page
		'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
		'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
		'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
		'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
		'menu_icon' => 'dashicons-format-quote', //Đường dẫn tới icon sẽ hiển thị
		'can_export' => true, //Có thể export nội dung bằng Tools -> Export
		'has_archive' => true, //Cho phép lưu trữ (month, date, year)
		'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
		'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
		'capability_type' => 'post' //
	);
	register_post_type('testimonials', $args3);
}
/* Kích hoạt hàm tạo custom post type */
add_action('init', 'Create_custom_post_type');


//--------------------------------------------------------------------------------Register and load the Custom widget-----------------------------------------------------------------


class My_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'my-text',  // Base ID
			'My Testimonials'  // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'My_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
		echo '<div class="Testimonial">';
	
		$args = array(
		'post_type'   => 'testimonials',
		'post_status' => 'publish',
		);
		
		$testimonial = new WP_Query( $args );
		while( $testimonial->have_posts() ) :
			$testimonial->the_post();
			get_template_part( 'template-parts/content/content','widget-testimonial' );
		endwhile;
		echo '</div>';
		
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'alice' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tittle:', 'alice' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
 
}
$my_widget = new My_Widget();


//--------------------------------------------------------------------- Service_Cate_Widget
class Service_Cate_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'my-service-tittle',  // Base ID
			'Service Tittles'  // Name
        );
 
        add_action( 'widgets_init', function() {
            register_widget( 'Service_Cate_Widget' );
        });
 
    }
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
 
		echo '<div class="service-tittles">';
	
		$args = array(
		'post_type'   => 'service',
		'post_status' => 'publish',
		);
		
		$servicetit = new WP_Query( $args );
		?>
		<p>All Services</p>
		<?php
		while( $servicetit->have_posts() ) :
			$servicetit->the_post();
			?>
			<p><?php the_title(); ?></p>
			<?php
		endwhile;
		echo '</div>';
		
		
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'alice' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Tittle:', 'alice' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

        return $instance;
    }
 
}
$my_widget = new Service_Cate_Widget();


//-------------------------------------------------------------------------------- Header Cútomizer-----------------------------------------------------------------

function Header_customize_register( $wp_customize ) {
	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	
	$wp_customize->add_section('site-tittle', array(
		'title'    => __('Site tittle', 'alice'),
		'description' => '',
		'priority' => 10,
	));


	$wp_customize->add_setting('site-setting-right', array(
		'default'        => 'alice',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	$wp_customize->add_control('site-control-right', array(
		'label'      => __('Right color', 'alice'),
		'section'    => 'site-tittle',
		'settings'   => 'site-setting-right',
	));

	
	$wp_customize->add_setting('site-setting-left', array(
		'default'        => 'maid',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	$wp_customize->add_control('site-control', array(
		'label'      => __('Left color', 'alice'),
		'section'    => 'site-tittle',
		'settings'   => 'site-setting-left',
	));
}
add_action( 'customize_register', 'Header_customize_register' );

//-------------------------------------------------------------------------------- Footer Cútomizer-----------------------------------------------------------------

function Footer_customize_register( $wp_customize ) {
	// Do stuff with $wp_customize, the WP_Customize_Manager object.
	
	$wp_customize->add_section('menulink-tittle', array(
		'title'    => __('Footer Customizer', 'alice'),
		'description' => 'Mene Office',
		'priority' => 200,
	));

	///--------------------------Copyright message
	$wp_customize->add_setting('copyright-setting', array(
		'default'        => 'Design by who?',
		'capability'     => 'edit_theme_options',
		'type'           => 'theme_mod',
	
	));
	$wp_customize->add_control('copyright-control', array(
		'label'      => __('Message', 'alice'),
		'section'    => 'menulink-tittle',
		'settings'   => 'copyright-setting',
	));
}
add_action( 'customize_register', 'Footer_customize_register' );

///----------------------------------------------------------------------------------------Load mini cart--------------------------------------

/*Woocommerce minicart*/
add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	ob_start();
	?>
	<span class="cart-contents"><?php echo $woocommerce->cart->cart_contents_count;?> </span>
	<?php
	$fragments['span.cart-contents'] = ob_get_clean();
	return $fragments;
}


// add_action( 'after_setup_theme', 'yourtheme_setup' );

// function yourtheme_setup() {

// }

////-----------------------------------------------------------------------------------------Post view count----------------------------------------------------------------------------------

function bac_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' View';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' View';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Views';
        }
    }
}


////-----------------------------------------------------------------------------------------//load stylesheet----------------------------------------------------------------------------------

function load_stylesheet()
{

	wp_register_style('fontawsome','https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css','all');
	wp_enqueue_style('fontawsome'); 
	
	wp_register_style('ioicon','https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css','all');
    wp_enqueue_style('ioicon'); 

	wp_register_style('bootstrap-min', get_template_directory_uri() . '/disc/css/bootstrap.min.css','all');
	wp_enqueue_style('bootstrap-min');

	wp_register_style('bootstrap', get_template_directory_uri() . '/disc/css/bootstrap-grid.min.css','all');
	wp_enqueue_style('bootstrap');
	
	wp_register_style('slick-theme', get_template_directory_uri() . '/disc/css/slick-theme.css','all');
	wp_enqueue_style('slick-theme');

	wp_register_style('slick', get_template_directory_uri() . '/disc/css/slick.css','all');
	wp_enqueue_style('slick');
	
	wp_register_style('datepicker-css', get_template_directory_uri() . '/disc/css/jquery.datepicker2.css','all');
    wp_enqueue_style('datepicker-css'); 
    
    wp_register_style('main-style', get_template_directory_uri() . '/disc/css/style.css','all');
	wp_enqueue_style('main-style');

	wp_register_style('normalize', get_template_directory_uri() . '/disc/css/normalize.css','all');
	wp_enqueue_style('normalize');

	wp_register_style('lightslider-css', get_template_directory_uri() . '/disc/css/lightslider.css','all');
	wp_enqueue_style('lightslider-css');

	wp_register_style('custom', get_template_directory_uri() . '/style.css','all');
	wp_enqueue_style('custom');

	wp_register_style('gijgo-css','https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css','all');
	wp_enqueue_style('gijgo-css');
	

}
add_action('wp_enqueue_scripts','load_stylesheet');


////=--------------------------------------load js
function include_jquery() {

	wp_register_script( 'gijgo-js', 'https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'gijgo-js' );
	
	wp_register_script( 'bootrap-js', get_template_directory_uri() . '/disc/js/bootstrap.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'bootrap-js' );
	
	wp_register_script( 'datepicker-js', get_template_directory_uri() . '/disc/js/jquery.datepicker2.js', array('jquery'), NULL, true );
    wp_enqueue_script( 'datepicker-js' );

    wp_register_script( 'isotope', get_template_directory_uri() . '/disc/js/isotope.pkgd.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'isotope' );

	wp_register_script( 'slick-js', get_template_directory_uri() . '/disc/js/slick.min.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'slick-js' );

	wp_register_script( 'lightslider-js', get_template_directory_uri() . '/disc/js/lightslider.js', array('jquery'), NULL, true );
	wp_enqueue_script( 'lightslider-js' );
	
	wp_enqueue_media();
    
    wp_register_script( 'main-js', get_template_directory_uri() . '/disc/js/main.js', array('jquery'), NULL, true);
	wp_enqueue_script( 'main-js');
}
add_action('wp_enqueue_scripts', 'include_jquery');



////-----------------------------------------------------------------------------------------remove action----------------------------------------------------------------------------------


function remove_coupon_text() {
	remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
	remove_action('woocommerce_after_single_product_summary','woocommerce_output_related_products',20);
} 
add_action('init','remove_coupon_text');

////-----------------------------------------------------------------------------------------add plus minus button----------------------------------------------------------------------------------

add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );
function bbloomer_display_quantity_plus() {
   echo '<button type="button" id="sub" class="fa fa-caret-down"></button>';
}
 
add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );
function bbloomer_display_quantity_minus() {
   echo '<button type="button" id="add" class="fa fa-caret-up"></button>';
}