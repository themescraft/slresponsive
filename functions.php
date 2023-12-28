<?php
/**
 * SlResponsive functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SlResponsive
 */

if ( ! function_exists( 'slresponsive_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function slresponsive_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SlResponsive, use a find and replace
	 * to change 'slresponsive' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'slresponsive', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'slresponsive-blogroll-thumb', 825, 9999 );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'slresponsive' ),
		'mobile' => esc_html__( 'Mobile', 'slresponsive' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'slresponsive_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'slresponsive_setup' );

remove_filter( 'the_content', 'wp_make_content_images_responsive' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function slresponsive_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'slresponsive_content_width', 640 );
}
add_action( 'after_setup_theme', 'slresponsive_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function slresponsive_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'slresponsive' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'slresponsive' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Bottom Right', 'slresponsive' ),
		'id'            => 'footer-bottom-right',
		'description'   => esc_html__( 'Add widgets here.', 'slresponsive' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'slresponsive_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function slresponsive_scripts() {
	wp_enqueue_style( 'slresponsive-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '20151215', true );
	wp_enqueue_script( 'navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'slresponsive_scripts' );


/**
 * Meta-box init
 */
//require get_template_directory() . '/inc/meta-box-init.php';


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

/**
 * Register the required plugins
 */
require_once get_template_directory() . '/inc/required-plugins.php';

/**
 * Display upgrade notice on customizer page.
 */
//require get_template_directory() . '/inc/customizer-pro-link.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
 
  

		/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<div role=\"menu\" class=\" dropdown-menu\">\n";
	}
	/**
	 * Ends the list of after the elements are added.
	 *
	 * @see Walker::end_lvl()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 */
	public function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</div>\n";
	}
	/**
	 * Start the element output.
	 *
	 * @see Walker::start_el()
	 *
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item   Menu item data object.
	 * @param int    $depth  Depth of menu item. Used for padding.
	 * @param array  $args   An array of arguments. @see wp_nav_menu()
	 * @param int    $id     Current item ID.
	 */
	public function end_el( &$output, $item, $depth = 0, $args = array() ) {
		if($depth === 1){
			if(strcasecmp( $item->attr_title, 'divider' ) == 0 || strcasecmp( $item->title, 'divider') == 0) {
				$output .= '</div>';
			}else if ($depth === 1 && (strcasecmp( $item->attr_title, 'header') == 0 && $depth === 1)) {
				$output .= '</h6>';
			}
		}else{
			$output .= '</li>';
		}
	}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
		/**
		 * Dividers, Headers or Disabled
		 * =============================
		 * Determine whether the item is a Divider, Header, Disabled or regular
		 * menu item. To prevent errors we use the strcasecmp() function to so a
		 * comparison that is not case sensitive. The strcasecmp() function returns
		 * a 0 if the strings are equal.
		 */
		//( strcasecmp($item->attr_title, 'disabled' ) == 0 ) 
		
		if($depth === 1 && (strcasecmp( $item->attr_title, 'divider' ) == 0 || strcasecmp( $item->title, 'divider') == 0)) {
			$output .= $indent . '<div class="dropdown-divider">';
		}else if ((strcasecmp( $item->attr_title, 'header') == 0 && $depth === 1) && $depth === 1){
			$output .= $indent . '<h6 class="dropdown-header">' . esc_attr( $item->title );
		}else{
			$class_names = $value = '';
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
			$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			
			if ( in_array( 'current-menu-item', $classes ) )
				$classes[] = ' active';
			if($depth === 0){
				$classes[] = 'nav-item';
				$classes[] = 'nav-item-' . $item->ID;
				$atts['class']			= 'nav-link';
				if ( $args->has_children ){
					$classes[] = ' dropdown';
					$atts['href']   		= '#';
					$atts['data-toggle']	= 'dropdown';
					$atts['class']			= 'dropdown-toggle nav-link';
					$atts['role']	= 'button';
					$atts['aria-haspopup']	= 'true';
				}
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
				$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
				$output .= $indent . '<li' . $id . $value . $class_names .'>';
			}else{
				$classes[] = 'dropdown-item';
				$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
				$atts['class'] = $class_names;
				$atts['id'] = $id;
			}
			
			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}
			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			
			/*
			 * Icons
			 * ===========
			 * Since the the menu item is NOT a Divider or Header we check the see
			 * if there is a value in the attr_title property. If the attr_title
			 * property is NOT null we apply it as the class name for the icon
			 */
			if ( ! empty( $item->attr_title ) ){
				$item_output .= '<span class="' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			}
			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}
	/**
	 * Traverse elements to create list from elements.
	 *
	 * Display one element if the element doesn't have any children otherwise,
	 * display the element and its children. Will only traverse up to the max
	 * depth and no ignore elements under that depth.
	 *
	 * This method shouldn't be called directly, use the walk() method instead.
	 *
	 * @see Walker::start_el()
	 * @since 2.5.0
	 *
	 * @param object $element Data object
	 * @param array $children_elements List of elements to continue traversing.
	 * @param int $max_depth Max depth to traverse.
	 * @param int $depth Depth of current element.
	 * @param array $args
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return null Null on failure with no changes to parameters.
	 */
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
		if ( ! $element )
			return;
		$id_field = $this->db_fields['id'];
		// Display this element.
		if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
		parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
	}
	/**
	 * Menu Fallback
	 * =============
	 * If this function is assigned to the wp_nav_menu's fallback_cb variable
	 * and a manu has not been assigned to the theme location in the WordPress
	 * menu manager the function with display nothing to a non-logged in user,
	 * and will add a link to the WordPress menu manager if logged in as an admin.
	 *
	 * @param array $args passed from the wp_nav_menu function.
	 *
	 */
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {
			extract( $args );
			$fb_output = null;
			if ( $container ) {
				$fb_output = '<' . $container;
				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';
				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';
				$fb_output .= '>';
			}
			$fb_output .= '<ul';
			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';
			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';
			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
			$fb_output .= '</ul>';
			if ( $container )
				$fb_output .= '</' . $container . '>';
			echo $fb_output;
		}
	}
}