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
	wp_enqueue_script( 'isotope-images', 'https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js', array( 'jquery' ), '1.0', true );
}

function load_js_assets() {
    if( is_page( 'resources' ) ) {
        wp_enqueue_script( 'isotope-script', plugin_dir_url( __FILE__ ) . 'js/isotope.js', array( 'jquery' ), '1.0', true );
    } 
}

function removeMasonry( $query ) {
    if ( is_page( 'resources' ) ) {
        wp_dequeue_script( 'masonry-cdn', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );
	    wp_dequeue_script( 'masonry-script', plugin_dir_path( __DIR__ ) . 'masonry/js/masonry.js', array( 'jquery' ), '1.0', true );
    }
}

function isotopePlugin() {
    ob_start();
    	include(plugin_dir_path( __FILE__ ) . 'includes/sema-resource-cards-isotope.php');
    return ob_get_clean();
} 
add_shortcode( 'resource_cards', 'isotopePlugin' );
add_action( 'wp_enqueue_scripts', 'isotopeStyles' );
add_action('wp_enqueue_scripts', 'load_js_assets');
add_action('pre_get_posts','removeMasonry');