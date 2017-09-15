<?php

/*
@package asns theme
	======================================
		ADMIN ENQUEUE FUNCTIONS
	======================================
*/

function asns_load_admin_scripts( $hook ) {

	// if ( 'toplevel_page_asns_left_settings' || 'asns-option_page_asns_right_settings' || 'asns-option_page_asns_theme_option_settings'  != $hook) {
	// 	return;
	// }


	//admin page style
	wp_register_style( 'asns_admin', get_template_directory_uri() . '/css/asns.admin.css' , array(), '1.0.0', 'all' );
	wp_enqueue_style('asns_admin' );

	// wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0', 'all' ); // Inside a parent theme
	
	
		wp_register_script('jqueryui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/ui/1.12.0/jquery-ui.min.js", false, null);
		wp_enqueue_script('jqueryui');

		// wp_register_script('bootstrapjs', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", false, null);
		// wp_enqueue_script('bootstrapjs');


	//admin page enqueue media liberary box
	if(function_exists( 'wp_enqueue_media' )){
	    wp_enqueue_media();
	}else{
	    wp_enqueue_style('thickbox');
	    wp_enqueue_script('media-upload');
	    wp_enqueue_script('thickbox');
	}

	//admin page js
	wp_register_script( 'asns_admin_script', get_template_directory_uri() . '/js/asns.admin.js' , array('jquery','wp-color-picker'), '1.0.0', true );
	wp_enqueue_script('asns_admin_script' );

	wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'asns_admin_color_picker');

	//admin page nicescroll js
	wp_register_script( 'asns_admin_jquery.nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js' , array('jquery'), '1.0.0', true );
	wp_enqueue_script('asns_admin_jquery.nicescroll' );



}
add_action('admin_enqueue_scripts','asns_load_admin_scripts');

//============================================================
//wp-color-picker enqueue

// function color_picker_assets($hook_suffix) {
//     // $hook_suffix to apply a check for admin page.
//     wp_enqueue_style( 'wp-color-picker' );
//     wp_enqueue_script( 'asns_admin_color_picker', plugins_url('/js/asns.admin.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
// }
// add_action( 'admin_enqueue_scripts', 'color_picker_assets' );