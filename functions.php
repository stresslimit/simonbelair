<?php


// Includes ! important
// include_once( 'inc/stresspress.php' );
// include_once( 'inc/types.php' );
// include_once( 'inc/ajax.php' );

// Main init function
add_action( 'init', 'sld_init' );
function sld_init() {
	
	define( 'SITE_VERSION', SITE_VERSION );

	if ( !is_admin() && !is_login_page() ) {
		// scripts
		wp_deregister_script( 'l10n' );
		wp_deregister_script( 'jquery');
		wp_register_script( 'jquery', '//code.jquery.com/jquery.min.js', false, SITE_VERSION );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'site', get_bloginfo('template_url').'/js/site.js', 'jquery', SITE_VERSION );

		// stylesheets
		wp_enqueue_style( 'style', get_bloginfo('stylesheet_url'), SITE_VERSION );
	}
}

