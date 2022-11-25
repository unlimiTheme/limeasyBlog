<?php
/**
 * limeasyblog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package limeasyblog
 */

if ( ! defined( 'LIMEASYBLOG_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'LIMEASYBLOG_VERSION', '1.0.7' );
}

if ( ! defined( 'LIMEASYBLOG_DEFAULT_THEME_STYLE' ) ) {
	// Default theme style.
	define( 'LIMEASYBLOG_DEFAULT_THEME_STYLE', 'grand-retro' );
}

if ( ! defined( 'LIMEASYBLOG_DEFAULT_FOOTER_COLUMNS' ) ) {
	// Default footer columns number.
	define( 'LIMEASYBLOG_DEFAULT_FOOTER_COLUMNS', '4' );
}

if ( ! defined( 'limeasyblog_TEMPLATE_DIRECTORY_URI' ) ) {
	define( 'limeasyblog_TEMPLATE_DIRECTORY_URI', is_child_theme() ? get_theme_file_path() : get_template_directory_uri() );
}

if ( ! function_exists( 'limeasyblog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function limeasyblog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on limeasyblog, use a find and replace
		 * to change 'limeasyblog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'limeasyblog', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'limeasyblog' ),
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
				'limeasyblog_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'limeasyblog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function limeasyblog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'limeasyblog_content_width', 640 );
}
add_action( 'after_setup_theme', 'limeasyblog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function limeasyblog_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'limeasyblog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'limeasyblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header 1', 'limeasyblog' ),
			'id'            => 'header-1',
			'description'   => esc_html__( 'Add widgets here.', 'limeasyblog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'limeasyblog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function limeasyblog_scripts() {
	wp_enqueue_style( 'limeasyblog-style', get_stylesheet_uri(), array(), LIMEASYBLOG_VERSION );
	wp_style_add_data( 'limeasyblog-style', 'rtl', 'replace' );

	// bootstrap
	wp_enqueue_style( 'limeasyblog-bootstrap-style', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css', array(), 'v4.3.1', 'all' );
	wp_enqueue_script( 'limeasyblog-bootstrap-script', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), 'v4.3.1', true );

	// fonts
	wp_enqueue_style( 'limeasyblog-font-awesome', get_template_directory_uri() . '/assets/fontawesome/css/all.min.css', array(), '5.9.0' );

	// navigation
	wp_enqueue_script( 'limeasyblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), LIMEASYBLOG_VERSION, true );

	// accesibility
	wp_enqueue_script( 'limeasyblog-accesibility', get_template_directory_uri() . '/assets/js/accesibility.js', array(), LIMEASYBLOG_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// enqueue theme style
	limeasyblog_enqueue_theme_style();

	wp_enqueue_script( 'limeasyblog-scripts', get_template_directory_uri() . '/assets/js/functions.js', array('jquery'), LIMEASYBLOG_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'limeasyblog_scripts' );

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

/**
 * Footer
 */
require get_template_directory() . '/components/base/class_limeasyblog_footer.php';

/**
 * Blog
 */
require get_template_directory() . '/components/base/class_limeasyblog_blog.php';

/**
 * Archive
 */
require get_template_directory() . '/components/base/class_limeasyblog_archive.php';

/**
 * Search
 */
require get_template_directory() . '/components/base/class_limeasyblog_search.php';