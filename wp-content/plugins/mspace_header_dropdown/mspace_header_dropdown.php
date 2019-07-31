<?php
/*
 * Plugin Name: Header Dropdown Bar
 * Plugin URI: https://semasoftware.com
 * Description: Shows info on the use of cookies
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: https://mspacecreative.com
 */
 
 function dropdown_Styling() {
 	wp_enqueue_style( 'dropdown-css', plugin_dir_url( __FILE__ ) . 'css/dropdown.css', array(), null );
	 //wp_enqueue_script( 'js-cookie', 'https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js', array('jquery'), null, true );
 	wp_enqueue_script( 'dropdown-script', plugin_dir_url( __FILE__ ) . 'js/dropdown.js', array('jquery'), null, true );
 }
 
 function dropdown_Plugin() {
 		ob_start(); ?>
		<div class="cookies-dropdown">
			<div class="header-dropdown">
 				<div class="dropdown_close"><i class="fa fa-close"></i></div>
 				<div class="dropdown_inner">
					<?php if ( get_field('show_dropdown', 'options') ): ?>
 					<?php the_field('dropdown_content', 'options'); ?>
					<?php endif; ?>
 				</div>
 			</div>
		</div> 			
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_head', 'dropdown_Plugin' );
 add_action( 'wp_enqueue_scripts', 'dropdown_Styling' );