<?php

/* MAIN STYLESHEET */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	
	/*wp_register_style('para-styles', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.css', array(), '1.0', 'all');
	wp_enqueue_style('para-styles');*/
	
	wp_register_style('animations', get_stylesheet_directory_uri() . '/css/animations.css', array(), '1.0', 'all');
	wp_enqueue_style('animations');
}

function footer_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_register_script('animate', get_stylesheet_directory_uri() . '/js/css3-animate-it.js', array('jquery'), null, true);
	wp_enqueue_script('animate');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
}

/* ACF OPTIONS PAGE */
if( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Call-out Box');
	
}

// CARDS IN SIDEBAR
function teamLoop() {
	ob_start();
		get_template_part('includes/loop-team');
	return ob_get_clean();
}

function posts_sidebar() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'ahbrsc' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_pb_widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');
add_option( 'my_default_pic', get_stylesheet_directory_uri() . '/img/wood-frame-bg.jpg', '', 'yes' );
add_shortcode( 'team_members', 'teamLoop' );
add_action( 'widgets_init', 'posts_sidebar' );

// SHORTCODES
//add_shortcode('content_block', 'content_blocks');