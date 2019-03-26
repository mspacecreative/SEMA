<?php
/* 
Plugin Name: M Space Deregister WordPress Stuff
Plugin URI: http://mspacecreative.com
Description: Removes unwanted functionality in backend
Version: 1.0
Author: Matt Cyr
Author URI: http://mspacecreative.com
*/

function remove_menus(){
  
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}

// Removes Comments from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');			//Comments
	$wp_admin_bar->remove_node( 'new-post' );		//Posts
	$wp_admin_bar->remove_node( 'new-popuppress' );	//Popup Press
}

// Removes Projects CPT
function mytheme_et_project_posttype_args( $args ) {
	return array_merge( $args, array(
		'public'              => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => false,
		'show_in_nav_menus'   => false,
		'show_ui'             => false
	));
}

// REMOVE CUSTOMIZE MENU ITEM
add_action( 'admin_menu', function () {
global $submenu;
	$user = wp_get_current_user();
    if (in_array('editor',$user->roles)) {
    	if ( isset( $submenu[ 'themes.php' ] ) ) {
    		foreach ( $submenu[ 'themes.php' ] as $index => $menu_item ) {
        		foreach ($menu_item as $value) {
					if (strpos($value,'customize') !== false) {
						unset( $submenu[ 'themes.php' ][ $index ] );
					}
        		}
    		}
		}
	}
});

// REMOVE LOGIN CUSTOMIZER PAGE FROM PAGES
function jp_exclude_pages_from_admin($query) {
 
  if ( ! is_admin() )
    return $query;
 
  global $pagenow, $post_type;
 
  if ( !current_user_can( 'administrator' ) && $pagenow == 'edit.php' && $post_type == 'page' )
    $query->query_vars['post__not_in'] = array( '1647' ); // Enter your page IDs here
  
 
}

// REMOVE CUSTOM BACKGROUND MENU ITEM
function remove_custom_background_menu_item() {
	remove_theme_support( 'custom-background' );
}

add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );
add_action( 'admin_menu', 'remove_menus' );
add_filter( 'et_project_posttype_args', 'mytheme_et_project_posttype_args', 10, 1 );
// REMOVE CUSTOM BACKGROUND MENU ITEM
add_action( 'after_setup_theme','remove_custom_background_menu_item', 100 );
// REMOVE LOGIN CUSTOMIZER PAGE FROM PAGES
add_filter( 'parse_query', 'jp_exclude_pages_from_admin' );