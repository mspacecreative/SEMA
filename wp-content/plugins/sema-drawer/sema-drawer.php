<?php
/*
 * Plugin Name: Sema Drawer
 * Plugin URI: http://mspacecreative.com
 * Description: Shows custom promo content above header
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function drawerstyles() {
 	wp_enqueue_style( 'drawer-css', plugin_dir_url( __FILE__ ) . 'css/drawer.css', array(), null );
 	wp_enqueue_script( 'jquery-cookie', plugin_dir_url( __FILE__ ) . 'js/jquery.cookie.js', array( 'jquery' ), '1.0', true );
 }
 
 function sema_Drawer() {
 		ob_start(); ?>
 			<div id="drawer" class="visible hide-on-click">
 				<i class="fa fa-close drawer-close"></i>
 				<div class="drawer-inner clearfix">
 					<div class="one-half-col">
 						<?php if ( get_field('drawer_content', 'options') ) :
 							the_field('drawer_content', 'options');
 						endif; ?>
 					</div>
 					<div class="one-half-col">
 						<?php if ( get_field('drawer_link', 'options') ) : ?>
 						<a href="<?php the_field('drawer_link', 'options'); ?>"><span style="text-transform: uppercase;"><?php esc_html_e('learn more'); ?></span></a>
 						<?php endif; ?>
 					</div>
 				</div>
 			</div>
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_head', 'sema_Drawer' );
 add_action( 'wp_enqueue_scripts', 'drawerstyles' );