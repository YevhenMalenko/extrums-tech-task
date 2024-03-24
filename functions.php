<?php
/**
 * extrums_dev functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package extrums_dev
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
function extrums_dev_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on extrums_dev, use a find and replace
		* to change 'extrums_dev' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'extrums_dev', get_template_directory() . '/languages' );

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
			'primary-menu' => esc_html__( 'Primary', 'extrums_dev' ),
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
			'extrums_dev_custom_background_args',
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
add_action( 'after_setup_theme', 'extrums_dev_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function extrums_dev_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'extrums_dev_content_width', 640 );
}
add_action( 'after_setup_theme', 'extrums_dev_content_width', 0 );



/**
 * Enqueue scripts and styles.
 */
function extrums_dev_scripts() {
	wp_enqueue_style( 'extrums-dev-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'extrums-dev-bootstrap-styles', get_template_directory_uri() . '/assets/bootstrap-5.2.3-dist/css/bootstrap.min.css', array(), _S_VERSION );

	wp_enqueue_script( 'extrums-dev-bootstrap-scripts', get_template_directory_uri() . '/assets/bootstrap-5.2.3-dist/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'extrums_dev_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Added additional classes to wp_nav_menu
 */

 function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
		$atts['class'] = $args->link_class;
	}
	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

function add_menu_list_item_class($classes, $item, $args) {
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
}

add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);


/**
 * Set Last visited post ID to the cookies
 */
function set_last_visited_post_cookie() {
    if (is_single()) {
        $post_id = get_the_ID();
        setcookie('last_visited_post', $post_id, time() + 3600 * 24 * 31, '/');
    }
}
add_action('template_redirect', 'set_last_visited_post_cookie');


/**
 * Added custom metaboxes
 */
require get_template_directory() . '/inc/metaboxes.php';

/**
 * Added shortcodes
 */
require get_template_directory() . '/inc/shortcodes.php';
