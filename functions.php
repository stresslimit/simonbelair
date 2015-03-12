<?php


// Includes ! important
include_once( 'inc/stresspress.php' );
// include_once( 'inc/types.php' );
// include_once( 'inc/ajax.php' );

// Main init function
add_action( 'init', 'sld_init' );
function sld_init() {
	
	define( 'SITE_VERSION', '0.1' );
	
	add_image_size( 'main-image', 560, 350, true );

	if ( !is_admin() && !is_login_page() ) {
		// scripts
		wp_deregister_script( 'l10n' );
		wp_deregister_script( 'jquery');
		wp_register_script( 'jquery', '//code.jquery.com/jquery-2.1.1.min.js', false, SITE_VERSION );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'site', get_bloginfo('template_url').'/js/site.js', 'jquery', SITE_VERSION );

		// stylesheets
		wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), SITE_VERSION );
		wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css' );
	}
}


function content_dev($c){
	return str_replace( 'simonbelair.ca', 'new.simonbelair.ca', $c );
}
// add_filter( 'the_content', 'content_dev' );

// remove grunion contact forms styles
function remove_grunion_style() {
	wp_dequeue_style('grunion.css');
	wp_deregister_style('grunion.css');
}
add_action('wp_print_styles', 'remove_grunion_style');

// localization

add_action('after_setup_theme', 'simonbelair_theme_setup');
function simonbelair_theme_setup(){
    load_theme_textdomain('simonbelair', get_template_directory() . '/languages');
}