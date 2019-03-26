<?php
/*
 * Plugin Name: Matt's Masonry Grid
 * Plugin URI: http://mspacecreative.com
 * Description: Shortcodes for masonry functionality
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */

function masonry_css() {
	wp_enqueue_style( 'masonry', plugin_dir_url( __FILE__ ) . 'css/masonry.css', array(), null );
	wp_enqueue_script( 'masonry-cdn', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'masonry-script', plugin_dir_url( __FILE__ ) . 'js/masonry.js', array( 'jquery' ), '1.0', true );
}

function masonry() {
    ob_start();
    	include(plugin_dir_path( __FILE__ ) . 'includes/masonry.php');
    return ob_get_clean();
} 
add_shortcode( 'masonry', 'masonry' );
add_action( 'wp_enqueue_scripts', 'masonry_css' );