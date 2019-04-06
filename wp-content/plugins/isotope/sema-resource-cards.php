<?php
/*
 * Plugin Name: Sema Resource Cards
 * Plugin URI: http://mspacecreative.com
 * Description: Filterable resource cards in masonry layout
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */

function isotopeStyles() {
	wp_enqueue_style( 'isotope-css', plugin_dir_url( __FILE__ ) . 'css/isotope.css', array(), null );
	wp_enqueue_script( 'isotope-cdn', 'https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'isotope-script', plugin_dir_url( __FILE__ ) . 'js/isotope.js', array( 'jquery' ), '1.0', true );
}

function isotopePlugin() {
    ob_start();
    	include(plugin_dir_path( __FILE__ ) . 'includes/sema-resource-cards-isotope.php');
    return ob_get_clean();
} 
add_shortcode( 'resource_cards', 'isotopePlugin' );
add_action( 'wp_enqueue_scripts', 'isotopeStyles' );