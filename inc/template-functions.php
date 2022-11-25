<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package limeasyblog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function limeasyblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// style class
	$classes[] = limeasyblog_get_body_style_class();

	return $classes;
}
add_filter( 'body_class', 'limeasyblog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function limeasyblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'limeasyblog_pingback_header' );

/**
 * Get body classes
 */
if ( ! function_exists( 'limeasyblog_get_body_style_class' ) ) :

	function limeasyblog_get_body_style_class() {

		$design = get_theme_mod( 'limeasyblog_theme_setting_design' );
		$design = $design ? $design : UNLIMIBLOG_DEFAULT_THEME_STYLE;

		switch ( $design ) {
			case 'grand-retro':
				$class = '_ulmt__grand-retro';
			break;
			case 'blu-retro':
				$class = '_ulmt__dos-theme';
			break;
			default:
				$class = $design;
		}

		return $class;
	}
endif;

/**
 * Enqueue theme styles
 */
if ( ! function_exists( 'limeasyblog_enqueue_theme_style' ) ) :

	function limeasyblog_enqueue_theme_style() {

		$style = get_theme_mod( 'limeasyblog_theme_setting_design' );		
		$style = $style ? $style : UNLIMIBLOG_DEFAULT_THEME_STYLE;

		wp_enqueue_style( 'limeasyblog-structure', get_template_directory_uri() . '/assets/styles/structure/structure.css', array(), UNLIMIBLOG_VERSION );
		wp_enqueue_style( "limeasyblog-styles-$style", get_template_directory_uri() . "/assets/styles/style/$style/styles.css", array(), UNLIMIBLOG_VERSION );
	}
endif;