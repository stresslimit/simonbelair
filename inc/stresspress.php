<?php
/**
 * @author Stresslimit [@stresslimit, @jkudish]
 * this file gives a bunch of core functionality extensions for 
 * use in setting up a new Stresslimit WordPress site. Feel free 
 * to comment/uncomment/add stuff as needed.
 */

/*-----------------------------------
   Enable/Disable WordPress stuff
-------------------------------------*/

// remove junk from head
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

// we normally want these to be active
// remove_action('wp_head', 'feed_links', 2);
// remove_action('wp_head', 'index_rel_link');
// remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

// add post thumbnail support + custom menu support
add_theme_support('post-thumbnails');
register_nav_menus();


/*-----------------------------------
   wp-config.php stuff
-------------------------------------*/

// define('WP_POST_REVISIONS', 5 );		// Limit post revisions: int or false
// define( 'DISALLOW_FILE_EDIT', true );	// Disable file editor
// define( 'EMPTY_TRASH_DAYS', 1 );		// Purge trash interval
// define( 'AUTOSAVE_INTERVAL', 60 );		// Autosave every N seconds


/*-----------------------------------
   admin stuff
-------------------------------------*/

// remove unwanted core dashboard widgets
add_action('wp_dashboard_setup', 'sld_rm_dashboard_widgets');
function sld_rm_dashboard_widgets() {
	global $wp_meta_boxes;
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);         // right now [content, discussion, theme, etc]
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);              // plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);       // incoming links
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);                // wordpress blog
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);              // other wordpress news
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);            // quickpress
	// unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);          // drafts
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);      // comments
}

// who uses Links ? goodbye 2005...
add_action('admin_menu', 'sld_manage_menu_items', 99);
function sld_manage_menu_items() {
	// we can do this based on permissions too if we want
	if( !current_user_can( 'administrator' ) ) {
	}
	remove_menu_page('link-manager.php'); // Links
	// remove_menu_page('edit.php'); // Posts
	remove_menu_page('upload.php'); // Media
	// remove_menu_page('edit-comments.php'); // Comments
	// remove_menu_page('edit.php?post_type=page'); // Pages
	// remove_menu_page('plugins.php'); // Plugins
	// remove_menu_page('themes.php'); // Appearance
	// remove_menu_page('users.php'); // Users
	// remove_menu_page('tools.php'); // Tools
	// remove_menu_page('options-general.php'); // Settings
}

// remove the +NEW items from the admin bar
add_action( 'wp_before_admin_bar_render', 'sld_admin_bar' );
function sld_admin_bar() {
    global $wp_admin_bar;
    // $wp_admin_bar->remove_menu( 'new-post' );
    $wp_admin_bar->remove_menu( 'new-media' );
    $wp_admin_bar->remove_menu( 'new-link' );
    // $wp_admin_bar->remove_menu( 'comments' );
}

// remove unwanted metaboxes
// these are managed through Screen Options, but in case you want to disable them 
// entirely, here they are. Disabled for now, so post edit screen is per default.
// add_action('admin_head', 'sld_rm_post_custom_fields');
function sld_rm_post_custom_fields() {
	// pages
	remove_meta_box( 'postcustom' , 'page' , 'normal' );
	remove_meta_box( 'commentstatusdiv' , 'page' , 'normal' );
	remove_meta_box( 'commentsdiv' , 'page' , 'normal' );
	remove_meta_box( 'authordiv' , 'page' , 'normal' );

	// posts
	remove_meta_box( 'postcustom' , 'post' , 'normal' );
	remove_meta_box( 'postexcerpt' , 'post' , 'normal' );
	remove_meta_box( 'trackbacksdiv' , 'post' , 'normal' );
}

// Do not show the Editorial Calendar for yourcustomtype
// if ( is_admin() ) {
// 	add_filter('edcal_show_calendar_yourcustomtype', '__return_false');
// }



/*-----------------------------------
	Frontend functions
-------------------------------------*/

// Reduce nav classes, leaving only 'current-menu-item'
function nav_class_filter( $var, $item ) {
	$var = is_array($var) ? array_intersect($var, array('current-menu-item', 'current-menu-parent', 'current-menu-ancestor')) : '';
	if ( is_array($var) )
		$var[] = 'nav-'. sanitize_title( $item->title );
	return $var;
}
add_filter('nav_menu_css_class', 'nav_class_filter', 10, 2 );

//	Remove nav IDs
function nav_id_filter( $id, $item ) {
	return '';
}
add_filter( 'nav_menu_item_id', 'nav_id_filter', 10, 2 );


// add conditional for login page
function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// get either the featured image or first image in the post
function sld_get_post_thumbnail( $postid, $size='thumbnail' ) {
	if ( has_post_thumbnail( $postid ) ) {
		return get_the_post_thumbnail( $postid, $size );
	} else {
		// echo 'has no thumbnail';
		$post = get_post( $postid );
		if ( preg_match_all( '/<img [^>]class=["|\'][^"|\']*wp-image-([\d]+)/i', $post->post_content, $matches) ) {
			$img_id = @$matches[1][0];
			return wp_get_attachment_image( $img_id, $size );
		} else if ( preg_match_all( '/<img [^>]*src=["|\']([^"|\']+)/i', $post->post_content, $matches) ) {
			// get sizes dimensions from wp
			$img = @$matches[1][0];
			return '<img src="'.$img.'">';
		}		

	}
}
function sld_post_thumbnail( $postid, $size='thumbnail' ) {
	echo sld_get_post_thumbnail( $postid, $size );
}

// get the src of either the featured image or first image in the post
function sld_get_post_thumbnail_src( $postid, $size='thumbnail' ) {
	if ( has_post_thumbnail( $postid ) ) {
		$id = get_post_thumbnail_id( $postid );
		$image = wp_get_attachment_image_src( $id, $size );
		return $image[0];
	} else {
		// echo 'has no thumbnail';
		$post = get_post( $postid );
		if ( preg_match_all( '/<img [^>]class=["|\'][^"|\']*wp-image-([\d]+)/i', $post->post_content, $matches) ) {
			$img_id = @$matches[1][0];
			return wp_get_attachment_image_src( $img_id, $size );
		} else if ( preg_match_all( '/<img [^>]*src=["|\']([^"|\']+)/i', $post->post_content, $matches) ) {
			// todo: get sizes dimensions from wp
			$img = @$matches[1][0];
			return $img;
		}		
	}
}
function sld_post_thumbnail_src( $postid, $size='thumbnail' ) {
	echo sld_get_post_thumbnail_src( $postid, $size );
}


/*-----------------------------------
	Utility functions
-------------------------------------*/

add_filter( 'admin_body_class', 'sld_admin_body_class' );
// add post type class to body admin 
function sld_admin_body_class( $classes ) {
	global $wpdb, $post;
	$post_type = get_post_type( $post->ID );
	if ( is_admin() ) {
		$classes .= 'type-' . $post_type;
	}
	return $classes;
}

add_filter( 'body_class', 'sld_page_slug_body_class' );
function sld_page_slug_body_class( $classes ) {
    global $post;
    if ( !empty( $post ) )
        $classes[] = $post->post_type . '-' . $post->post_name;
    return $classes;
}

// add shortcode to template_url to be able to reference
add_shortcode( 'template_url', 'sld_template_url' );
function sld_template_url( $atts ) {
	return get_bloginfo('template_url');
}

