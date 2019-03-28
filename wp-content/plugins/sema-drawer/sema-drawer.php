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
 						<?php 
 						$image = get_field('drawer_image', 'options');
 						$size = 'medium';
						if( $image ) {
							echo wp_get_attachment_image( $image, $size );
						}
						?>
 					</div>
 					<div class="one-half-col">
 						<?php if ( get_field('drawer_content', 'options') ) :
 						the_field('drawer_content', 'options');
 						endif;
 						if( have_rows('drawer_button', 'options') ): 
 							while( have_rows('drawer_button', 'options') ): the_row();
 							$label = get_sub_field('button_label', 'options');
 							$link = get_sub_field('button_link', 'options'); ?>
	 						<a class="cta-button" href="<?php echo $link; ?>">
	 							<span style="text-transform: uppercase;">
	 							<?php echo $label; ?>
	 							</span>
	 						</a>
 						<?php endwhile;
 						endif; ?>
 					</div>
 				</div>
 			</div>
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_head', 'sema_Drawer' );
 add_action( 'wp_enqueue_scripts', 'drawerstyles' );