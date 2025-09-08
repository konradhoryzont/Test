<?php
/**
 * coach functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package coach
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function coach_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on coach, use a find and replace
		* to change 'coach' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'coach', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'coach' ),
		)
	);

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
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'coach_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'coach_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function coach_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'coach_content_width', 640 );
}
add_action( 'after_setup_theme', 'coach_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function coach_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'coach' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'coach' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'coach_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function coach_scripts() {
	wp_enqueue_style( 'coach-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'coach-style', 'rtl', 'replace' );

	wp_enqueue_script( 'coach-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'coach_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



function coach_enqueue_styles() {
    $theme_uri = get_template_directory_uri() . '/assets/css/';
    $fonts_uri = get_template_directory_uri() . '/assets/fonts/';

    // Fonts
    wp_enqueue_style( 'coach-fonts', $fonts_uri . 'fonts.css' );
    wp_enqueue_style( 'coach-icons', $fonts_uri . 'font-icons.css' );

    // CSS
    wp_enqueue_style( 'coach-bootstrap', $theme_uri . 'bootstrap.min.css' );
    wp_enqueue_style( 'coach-bootstrap-select', $theme_uri . 'bootstrap-select.min.css' );
    wp_enqueue_style( 'coach-drift', $theme_uri . 'drift-basic.min.css' );
    wp_enqueue_style( 'coach-animate', $theme_uri . 'animate.css' );
    wp_enqueue_style( 'coach-compare', $theme_uri . 'image-compare-viewer.min.css' );
    wp_enqueue_style( 'coach-fancybox', $theme_uri . 'jquery.fancybox.min.css' );
    wp_enqueue_style( 'coach-photoswipe', $theme_uri . 'photoswipe.css' );
    wp_enqueue_style( 'coach-swiper', $theme_uri . 'swiper-bundle.min.css' );

    // Główny stylesheet (na końcu, żeby nadpisał inne)
    wp_enqueue_style( 'coach-style', $theme_uri . 'styles.css' );
}
add_action( 'wp_enqueue_scripts', 'coach_enqueue_styles' );


function coach_enqueue_scripts() {
    $theme_uri = get_template_directory_uri() . '/assets/js/';

    // jQuery (WordPress ma swoją, ale jeśli chcesz użyć lokalnej wersji)
    wp_enqueue_script( 'coach-jquery', $theme_uri . 'jquery.min.js', array(), null, true );

    // Bootstrap
    wp_enqueue_script( 'coach-bootstrap', $theme_uri . 'bootstrap.min.js', array('coach-jquery'), null, true );
    wp_enqueue_script( 'coach-bootstrap-select', $theme_uri . 'bootstrap-select.min.js', array('coach-jquery'), null, true );

    // Swiper
    wp_enqueue_script( 'coach-swiper', $theme_uri . 'swiper-bundle.min.js', array(), null, true );

    // Inne skrypty
    wp_enqueue_script( 'coach-carousel', $theme_uri . 'carousel.js', array(), null, true );
    wp_enqueue_script( 'coach-lazysize', $theme_uri . 'lazysize.min.js', array(), null, true );
    wp_enqueue_script( 'coach-countdown', $theme_uri . 'count-down.js', array(), null, true );
    wp_enqueue_script( 'coach-wow', $theme_uri . 'wow.min.js', array(), null, true );
    wp_enqueue_script( 'coach-multiple-modal', $theme_uri . 'multiple-modal.js', array(), null, true );
    wp_enqueue_script( 'coach-infinityslide', $theme_uri . 'infinityslide.js', array(), null, true );
    wp_enqueue_script( 'coach-drift', $theme_uri . 'drift.min.js', array(), null, true );
    wp_enqueue_script( 'coach-zoom', $theme_uri . 'zoom.js', array(), null, true );
    wp_enqueue_script( 'coach-validate', $theme_uri . 'jquery-validate.js', array('coach-jquery'), null, true );
    wp_enqueue_script( 'coach-nouislider', $theme_uri . 'nouislider.min.js', array(), null, true );
    wp_enqueue_script( 'coach-parallax', $theme_uri . 'paralaxei.js', array(), null, true );
    wp_enqueue_script( 'coach-simple-parallax', $theme_uri . 'simpleParallaxVanilla.umd.js', array(), null, true );

    // Photoswipe
    wp_enqueue_script( 'coach-photoswipe', $theme_uri . 'photoswipe.umd.min.js', array(), null, true );
    wp_enqueue_script( 'coach-photoswipe-lightbox', $theme_uri . 'photoswipe-lightbox.umd.min.js', array('coach-photoswipe'), null, true );

    // Model viewer
    wp_enqueue_script( 'coach-model-viewer', $theme_uri . 'model-viewer.min.js', array(), null, true );

    // Shop logic
    wp_enqueue_script( 'coach-shop', $theme_uri . 'shop.js', array(), null, true );

    // Główny skrypt (na końcu)
    wp_enqueue_script( 'coach-main', $theme_uri . 'main.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'coach_enqueue_scripts' );

// Rejestracja menu nawigacyjnego
function coach_register_menus() {
    register_nav_menus( array(
        'primary_menu' => __( 'Menu Główne', 'coach' ),
    ) );
}
add_action( 'after_setup_theme', 'coach_register_menus' );


// Menu footera
function coach_register_footer_menu() {
    register_nav_menus( array(
        'footer_menu' => __( 'Menu footera', 'coach' ),
    ) );
}
add_action( 'after_setup_theme', 'coach_register_footer_menu' );


// Custom walker do menu w stopce
class Coach_Footer_Walker extends Walker_Nav_Menu {
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $output .= "<ul class=\"footer-menu-list\">\n";
    }

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $output .= '<li>';
        $output .= '<a href="' . esc_url( $item->url ) . '" class="footer-link">';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }
}


// Dodaj to do functions.php BEZ znaczników <?php na początku
// (bo functions.php już jest plikiem PHP)

class Simple_Menu_Walker extends Walker_Nav_Menu {
    
    // Start the list before the elements are added
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth == 0 ) {
            $output .= "\n<div class=\"sub-menu mega-menu\"><div class=\"wrapper-sub-menu\">\n";
        } else {
            $output .= "\n<ul class=\"menu-list\">\n";
        }
    }

    // End the list after the elements are added
    public function end_lvl( &$output, $depth = 0, $args = null ) {
        if ( $depth == 0 ) {
            $output .= "\n</div></div>\n";
        } else {
            $output .= "\n</ul>\n";
        }
    }

    // Start the element output
    public function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {
        
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        // Check if menu item has children
        $has_children = in_array('menu-item-has-children', $classes);
        
        if ( $depth == 0 ) {
            // Top level menu item
            $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
            $class_names = $class_names ? ' class="menu-item"' : '';
            
            $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
            $id = $id ? ' id="' . esc_attr($id) . '"' : '';
            
            $output .= $indent . '<li' . $id . $class_names .'>';
            
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
            $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
            $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
            
            $item_output = isset($args->before) ? $args->before ?? '' : '';
            $item_output .= '<a class="item-link"' . $attributes .'>';
            $item_output .= (isset($args->link_before) ? $args->link_before ?? '' : '') . apply_filters('the_title', $item->title, $item->ID) . (isset($args->link_after) ? $args->link_after ?? '' : '');
            
            if ( $has_children ) {
                $item_output .= '<i class="icon icon-arr-down"></i>';
            }
            
            $item_output .= '</a>';
            $item_output .= isset($args->after) ? $args->after ?? '' : '';
            
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            
        } elseif ( $depth == 1 ) {
            // Mega menu section header
            $output .= $indent . '<div class="mega-menu-item">';
            $output .= '<div class="menu-heading">' . esc_attr(strtolower($item->title)) . '</div>';
            
        } else {
            // Regular submenu item
            $output .= $indent . '<li>';
            
            $attributes = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
            $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target     ) .'"' : '';
            $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn        ) .'"' : '';
            $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url        ) .'"' : '';
            
            $item_output = '<a class="menu-link-text link"' . $attributes .'>';
            $item_output .= apply_filters('the_title', $item->title, $item->ID);
            $item_output .= '</a>';
            
            $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
        }
    }

    // End the element output
    public function end_el( &$output, $item, $depth = 0, $args = array() ) {
        if ( $depth == 0 ) {
            $output .= "</li>\n";
        } elseif ( $depth == 1 ) {
            $output .= "</div>\n";
        } else {
            $output .= "</li>\n";
        }
    }
}

// Rejestracja menu
function register_navigation_menu() {
    register_nav_menus( array(
        'primary' => 'Primary Menu',
    ) );
}
add_action( 'after_setup_theme', 'register_navigation_menu' );
?>

<?php
function example_function() {
    remove_action(" woocommerce_after_shop_loop", "Woocommerce_catalog_ordering", 10);
}
