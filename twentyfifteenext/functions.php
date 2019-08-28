<?php
/**
 * Twenty Fifteen Ext functions and definitions
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

define( 'TFEXT_THEME_NAME', 'twentyfifteenext' );
define( 'TFEXT_THEME_PATH', get_theme_root() . '/' . TFEXT_THEME_NAME );

/**
 * Add localization
 */
function tsext_setup_theme() {
	load_child_theme_textdomain( 'twentyfifteenext', TFEXT_THEME_PATH . '/languages' );
}

add_action( 'after_setup_theme', 'tsext_setup_theme' );

/**
 * Add scripts
 */
function twentyfifteenext_scripts() {
	wp_enqueue_script( 'twentyfifteenext-script', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ) );
	wp_localize_script( 'twentyfifteenext-script', 'bet_msg', [
		'ajaxurl'           => admin_url('admin-ajax.php'),
		'submit_error'      => __( 'Error creating a bet', 'twentyfifteenext' ),
		'submit_success'    => __( 'Bet created successfully', 'twentyfifteenext' ),
		'empty_bet'         => __( 'Bet field must not be empty', 'twentyfifteenext' ),
		'empty_title'       => __( 'Title field must not be empty', 'twentyfifteenext' ),
		'empty_description' => __( 'Description field must not be empty', 'twentyfifteenext' ),
		'empty_type'        => __( 'Bet type is not selected', 'twentyfifteenext' ),
	] );
}

add_action( 'wp_enqueue_scripts', 'twentyfifteenext_scripts' );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteenext_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyfifteenext' ),
		'id'            => 'sidebar-footer',
		'description'   => __( 'Footer sidebar.', 'twentyfifteenext' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteenext_widgets_init' );
