<?php

/*
@package asns theme
	======================================
		ADMIN PAGE
	======================================
*/


							//===================================//
							//			REGISTRATIONS 			 //
							//===================================//


function asns_add_admin_page() {

	//add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
	//add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );

	//Generate admin page & sub pages
	add_menu_page( 'ASNS THEME OPTION', __( 'ASNS OPTION', 'asns' ) , 'manage_options', 'asns_left_settings', 'asns_theme_create_page', get_template_directory_uri() . '/img/asns-11-icon.png' , 110 );
	add_submenu_page( 'asns_left_settings', 'ASNS THEME OPTION', __( 'Left Author', 'asns' ), 'manage_options', 'asns_left_settings', 'asns_theme_create_page' );
	add_submenu_page( 'asns_left_settings', 'ASNS OPTION', __( 'Right Author', 'asns' ), 'manage_options', 'asns_right_settings', 'asns_theme_settings' );
	add_submenu_page( 'asns_left_settings', 'ASNS OPTION', __( 'Theme Option', 'asns' ), 'manage_options', 'asns_theme_option_settings', 'asns_theme_support_option' );
	//add_submenu_page( 'asns_left_settings', 'ASNS OPTION', 'Contact Form', 'manage_options', 'asns_contact_form_settings', 'asns_theme_contact' );

add_action('admin_init','asns_left_author_settings' );
add_action('admin_init','asns_right_author_settings' );
add_action('admin_init','asns_theme_option_page' );
//add_action('admin_init','asns_theme_contact_form' );

}
add_action('admin_menu','asns_add_admin_page' );

//**************
	//register_setting( $option_group, $option_name, $sanitize_callback );
	//add_settings_section( $id, $title, $callback, $page );
	//add_settings_field( $id, $title, $callback, $page, $section, $args );

//********************
//activate the left author settings
//********************

function asns_left_author_settings() {
	register_setting( 'asns-settings-left-user-group', 'left_user_pic' );
	register_setting( 'asns-settings-left-user-group', 'left_first_name' );
	register_setting( 'asns-settings-left-user-group', 'left_last_name' );
	register_setting( 'asns-settings-left-user-group', 'left_user_description' );
	register_setting( 'asns-settings-left-user-group', 'left_twitter_handler' ,'asns_twitter_sanitize');
	register_setting( 'asns-settings-left-user-group', 'left_facebook_handler' );
	register_setting( 'asns-settings-left-user-group', 'left_color_picker_handler' );
	register_setting( 'asns-settings-left-user-group', 'left_bg_handler' );
	register_setting( 'asns-settings-left-user-group', 'left_video_src' );
	register_setting( 'asns-settings-left-user-group', 'left_video_start' );
	register_setting( 'asns-settings-left-user-group', 'left_video_end' );
	//register_setting( 'asns-settings-left-user-group', 'left_github_handler' );

	add_settings_section( 'asns-left-user-options', 'Left Author Option', 'asns_left_options', 'asns_left_settings' );
	
	add_settings_field( 'pic', '<span class="dashicons dashicons-id-alt"></span> Picture', 'asns_left_picture', 'asns_left_settings', 'asns-left-user-options');	
	add_settings_field( 'name', '<span class="dashicons dashicons-admin-users"></span> Full Name', 'asns_left_name', 'asns_left_settings', 'asns-left-user-options');
	add_settings_field( 'description', '<span class="dashicons dashicons-edit"></span> Description', 'asns_left_description', 'asns_left_settings', 'asns-left-user-options');
	add_settings_field( 'twitter', '<span class="dashicons dashicons-twitter"></span> Twitter@', 'asns_left_twitter', 'asns_left_settings', 'asns-left-user-options');	
	add_settings_field( 'facebook', '<span class="dashicons dashicons-facebook-alt"></span> Facebook', 'asns_left_facebook', 'asns_left_settings', 'asns-left-user-options');	
	add_settings_field( 'color-picker', '<span class="dashicons dashicons-admin-customizer"></span> Side Color', 'asns_left_color_picker', 'asns_left_settings', 'asns-left-user-options');	
	add_settings_field( 'side-bg', '<span class="dashicons dashicons-format-image"></span> Side Background Image', 'asns_left_bg_img', 'asns_left_settings', 'asns-left-user-options');	
	add_settings_field( 'side-video', '<span class="dashicons dashicons-video-alt3"></span> Side Background Video', 'asns_left_bg_video', 'asns_left_settings', 'asns-left-user-options');	
	// add_settings_field( 'video-start', '<span class="dashicons dashicons-video-alt3"></span> Video Start', 'asns_left_video_start', 'asns_left_settings', 'asns-left-user-options');	
	// add_settings_field( 'video-end', '<span class="dashicons dashicons-video-alt3"></span> Video End', 'asns_left_video_end', 'asns_left_settings', 'asns-left-user-options');	
	// add_settings_field( 'github', 'Github', 'asns_left_github', 'asns_left_settings', 'asns-left-user-options');	
}


//********************
//activate the right author settings
//********************


function asns_right_author_settings() {
	register_setting( 'asns-settings-right-user-group', 'right_user_pic' );
	register_setting( 'asns-settings-right-user-group', 'right_first_name' );
	register_setting( 'asns-settings-right-user-group', 'right_last_name' );
	register_setting( 'asns-settings-right-user-group', 'right_user_description' );
	register_setting( 'asns-settings-right-user-group', 'right_twitter_handler' ,'asns_twitter_sanitize');
	register_setting( 'asns-settings-right-user-group', 'right_facebook_handler' );
	register_setting( 'asns-settings-right-user-group', 'right_color_picker_handler' );
	register_setting( 'asns-settings-right-user-group', 'right_bg_handler' );
	register_setting( 'asns-settings-right-user-group', 'right_video_src' );
	register_setting( 'asns-settings-right-user-group', 'right_video_start' );
	register_setting( 'asns-settings-right-user-group', 'right_video_end' );
	//register_setting( 'asns-settings-right-user-group', 'right_github_handler' );

	add_settings_section( 'asns-right-user-options', 'Right Author Option', 'asns_right_options', 'asns_right_settings' );

	add_settings_field( 'pic', '<span class="dashicons dashicons-id-alt"></span> Picture', 'asns_right_picture', 'asns_right_settings', 'asns-right-user-options');	
	add_settings_field( 'name', '<span class="dashicons dashicons-admin-users"></span> Full Name', 'asns_right_name', 'asns_right_settings', 'asns-right-user-options');
	add_settings_field( 'description', '<span class="dashicons dashicons-edit"></span> Description', 'asns_right_description', 'asns_right_settings', 'asns-right-user-options');
	add_settings_field( 'twitter', '<span class="dashicons dashicons-twitter"></span> Twitter@', 'asns_right_twitter', 'asns_right_settings', 'asns-right-user-options');	
	add_settings_field( 'facebook', '<span class="dashicons dashicons-facebook-alt"></span> Facebook', 'asns_right_facebook', 'asns_right_settings', 'asns-right-user-options');	
	add_settings_field( 'color-picker', '<span class="dashicons dashicons-admin-customizer"></span> Side Color', 'asns_right_color_picker', 'asns_right_settings', 'asns-right-user-options');	
	add_settings_field( 'side-bg', '<span class="dashicons dashicons-format-image"></span> Side Background Image', 'asns_right_bg_img', 'asns_right_settings', 'asns-right-user-options');	
	add_settings_field( 'side-video', '<span class="dashicons dashicons-video-alt3"></span> Side Background Video', 'asns_right_bg_video', 'asns_right_settings', 'asns-right-user-options');	
	//add_settings_field( 'github', 'Github', 'asns_right_github', 'asns_right_settings', 'asns-right-user-options');	

}

//********************
//Theme Support Option
//********************

function asns_theme_option_page() {
	register_setting( 'asns-theme-option-page', 'fav_icon' );
	// register_setting( 'asns-theme-option-page', 'post_formats', 'asns_post_formats_callback');
	register_setting( 'asns-theme-option-page', 'custom_header' );
	register_setting( 'asns-theme-option-page', 'custom_background' );

	add_settings_section( 'asns-theme-option-section', 'Manage Theme Support Option', 'asns_theme_option_section', 'asns_theme_support_option' );
	
	add_settings_field( 'fav-icon', 'Fav Icon', 'asns_fav_icon_fields', 'asns_theme_support_option', 'asns-theme-option-section');
	// add_settings_field( 'post-formats', 'Post Formats', 'asns_post_formats_fields', 'asns_theme_support_option', 'asns-theme-option-section');
	add_settings_field( 'custom-header', 'Custom Header', 'asns_custom_header_fields', 'asns_theme_support_option', 'asns-theme-option-section' );
	add_settings_field( 'custom-background', 'Custom Background', 'asns_custom_background_fields', 'asns_theme_support_option', 'asns-theme-option-section' );

}



//********************
//Contact Form Option
//********************
function asns_theme_contact_form() {
	register_setting( 'asns-contact-options', 'activate_contact');

	add_settings_section( 'asns-contact-section', '<span class="dashicons dashicons-email-alt"></span> Contact Form', 'asns_contact_section', 'asns_theme_contact' );

	add_settings_field( 'activate-form', 'Activate Contact Form', 'contact_form', 'asns_theme_contact', 'asns-contact-section');
}

//*********************************************************************************************
//*********************************************************************************************

							//===================================//
							//		ACTIVATION FUNCTIONS 		 //
							//===================================//


//****** Activate the left author theme option
//===============================

//section title
function asns_left_options() {
	echo "customize left author information";
}


//**************
//activat the pic field
function asns_left_picture() {
	$get_left_picture = esc_attr( get_option('left_user_pic') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );
	if (empty($get_left_picture)) {
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="left_user_pic"  value="browsing" />
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</small></p>
	<input id="pic-upload-handler" type="hidden" name="left_user_pic"  value="'.$get_left_picture.'" placeholder="set your picture" /> ';
	}else{
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="left_user_pic"  value="browsing" />
	<button id="pic-upload-reset" class="button button-secondary" type="button" name="left_user_pic"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</small></p>
	<input id="pic-upload-handler" type="hidden" name="left_user_pic"  value="'.$get_left_picture.'" placeholder="set your picture" /> ';
	}

}

//**************
//activat the name field
function asns_left_name() {
	$leftFirstName = esc_attr( get_option('left_first_name' ) );
	$leftLastName = esc_attr( get_option('left_last_name' ) );
	echo '<input id="first-name" type="text" name="left_first_name"  value="'.$leftFirstName.'" placeholder="first name" /> 
			<input id="last-name" type="text" name="left_last_name"  value="'.$leftLastName.'" placeholder="last name" />';

}

//**************
//activat the description field
function asns_left_description() {
	$leftDescription = esc_attr( get_option('left_user_description' ) );
	echo '<input id="user-description" type="text" name="left_user_description"  value="'.$leftDescription.'" placeholder="description" size="45" /> ';

}

//**************
//activat the twitter field
function asns_left_twitter() {
	$leftTwitter = esc_attr( get_option('left_twitter_handler' ) );
	echo '<input type="text" name="left_twitter_handler"  value="'.$leftTwitter.'" placeholder="twitter_handler" /> 
			<br><p class="description"><small>write your twitter name without @　charachter.</small>
			<br><small>ツィター名前の前に @　マークを書かないで、自分のツイターの名前を書いてください。</small></p>';
}

//**************
//activat the facebook field
function asns_left_facebook() {
	$leftFacebook = esc_attr( get_option('left_facebook_handler' ) );
	echo '<input type="text" name="left_facebook_handler"  value="'.$leftFacebook.'" placeholder="facebook_handler" /> ';
}

//**************
//activat the left color picker
function asns_left_color_picker() {
	$leftColor = esc_attr( get_option('left_color_picker_handler' ) );
	echo '<input type="text" name="left_color_picker_handler"  id="left-color-picker" value="'.$leftColor.'"  data-default-color="#4b0082" placeholder="色" />
			<input class="button button-small wp-picker-clear leftclear" type="button" value="Clear - 消す">';
}

//**************
//activat the left side bg field
function asns_left_bg_img() {
	$get_left_bg_img = esc_attr( get_option('left_bg_handler') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );
	if (empty($get_left_bg_img)) {
	echo '<input id="left-bg-upload-button" class="button button-secondary" type="button" name="left_bg_handler"  value="browsing" />
	<p class="description"><small>Upload a background. <br>きれいな景色をアップロードして下さい。</small></p>
	<input id="left-bg-upload-handler" type="hidden" name="left_bg_handler"  value="'.$get_left_bg_img.'" placeholder="set side bg" /> ';
	}else{
	echo '<input id="left-bg-upload-button" class="button button-secondary" type="button" name="left_bg_handler"  value="browsing" />
	<button id="left-bg-upload-reset" class="button button-secondary" type="button" name="left_bg_handler"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload a background. <br>きれいな景色をアップロードして下さい。</small></p>
	<input id="left-bg-upload-handler" type="hidden" name="left_bg_handler"  value="'.$get_left_bg_img.'" placeholder="set side bg" /> ';
	}

}

//**************
//activat the video fields
function asns_left_bg_video() {
	$left_video_src = esc_attr( get_option('left_video_src' ) );
	$left_video_start = esc_attr( get_option('left_video_start' ) );
	$left_video_end = esc_attr( get_option('left_video_end' ) );

	echo '<input id="left-video-src" type="text" name="left_video_src"  value="'.$left_video_src.'" placeholder="youtube video ID" size="20" /> 
	<p><small>Put your video embed ID.<br>[ ex: VSbIHKs0gEQ ]<br><p>ビデオの埋め込むアイディーをいれて下さい。</p></small></p>';
	
	// if ( !empty( $left_video_src ) ) {
		$default = 0;
		$left_start_value = ( $left_video_start == '' ? $default : $left_video_start );
		$left_end_value = ( $left_video_end == '' ? $default : $left_video_end );

	echo '<div class="left-value-wrapper">';
	echo '<hr><div id="s-e">from <input id="left-start-value" type="number" min="0" default-value="0" name="left_start_value"  value="'.$left_start_value.'" placeholder="start" style="width:70px;" /> 
			<p><small>Put your video start time by seconds .<br><p>ビデオの初め時間を秒にいれて下さい。</p></small></p></div>';
	
	echo 'to <input id="left-end-value" type="number" min="0" default-value="0" name="left_end_value"  value="'.$left_end_value.'" placeholder="end" style="width:70px;" /> 
			<p><small>Put your video end time by seconds .<br><p>ビデオの終わり時間を秒にいれて下さい。</p></small></p>';

	echo '<p style="text-align:center;"><small>[ From 0 to 0 = full length. ]</small></p>';
	echo '</div><!-- .left-value-wrapper -->';
	// }
}

/*
//**************
//activat the github field
function asns_left_github() {
	$leftGithub = esc_attr( get_option('left_github_handler' ) );
	echo '<input type="text" name="left_github_handler"  value="'.$leftGithub.'" placeholder="github_handler" /> ';
}

*/



//*********************************
//activate the right author fields
//===============================

//section title
function asns_right_options() {
	echo "customize right author information";
}


//**************
//activat the pic field
function asns_right_picture() {
	$get_right_picture = esc_attr( get_option('right_user_pic') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );

	if (empty($get_right_picture)) {
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="right_user_pic"  value="browsing" />
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</small></p>
	<input id="pic-upload-handler" type="hidden" name="right_user_pic"  value="'.$get_right_picture.'" placeholder="set your picture" /> ';
	}else{
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="right_user_pic"  value="browsing" />
	<button id="pic-upload-reset" class="button button-secondary" type="button" name="right_user_pic"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</small></p>
	<input id="pic-upload-handler" type="hidden" name="right_user_pic"  value="'.$get_right_picture.'" placeholder="set your picture" /> ';
	}
}

//**************
//activat the name field
function asns_right_name() {
	$rightFirstName = esc_attr( get_option('right_first_name' ) );
	$rightLastName = esc_attr( get_option('right_last_name' ) );
	echo '<input id="first-name" type="text" name="right_first_name"  value="'.$rightFirstName.'" placeholder="first name" /> 
			<input id="last-name" type="text" name="right_last_name"  value="'.$rightLastName.'" placeholder="last name" />';

}

//**************
//activat the description field
function asns_right_description() {
	$rightDescription = esc_attr( get_option('right_user_description' ) );
	echo '<input id="user-description" type="text" name="right_user_description"  value="'.$rightDescription.'" placeholder="description" size="45" /> ';

}

//**************
//activat the twitter field
function asns_right_twitter() {
	$rightTwitter = esc_attr( get_option('right_twitter_handler' ) );
	echo '<input type="text" name="right_twitter_handler"  value="'.$rightTwitter.'" placeholder="twitter_handler" /> 
			<br><p class="description"><small>write your twitter name without @　charachter.</small>
			<br><small>ツィター名前の前に @　マークを書かないで、自分のツイターの名前を書いてください。</small></p>';
}

//**************
//activat the facebook field
function asns_right_facebook() {
	$rightFacebook = esc_attr( get_option('right_facebook_handler' ) );
	echo '<input type="text" name="right_facebook_handler"  value="'.$rightFacebook.'" placeholder="facebook_handler" /> ';
}


//**************
//activat the right color picker
function asns_right_color_picker() {
	$rightColor = esc_attr( get_option('right_color_picker_handler' ) );
	echo '<input type="text" name="right_color_picker_handler"  id="right-color-picker" value="'.$rightColor.'"  data-default-color="#d4003c" placeholder="色" />
			<input class="button button-small wp-picker-clear rightclear" type="button" value="Clear - 消す">';
}


//**************
//activat the left side bg field
function asns_right_bg_img() {
	$get_right_bg_img = esc_attr( get_option('right_bg_handler') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );
	if (empty($get_right_bg_img)) {
	echo '<input id="right-bg-upload-button" class="button button-secondary" type="button" name="right_bg_handler"  value="browsing" />
	<p class="description"><small>Upload a background. <br>きれいな景色をアップロードして下さい。</small></p>
	<input id="right-bg-upload-handler" type="hidden" name="right_bg_handler"  value="'.$get_right_bg_img.'" placeholder="set side bg" /> ';
	}else{
	echo '<input id="right-bg-upload-button" class="button button-secondary" type="button" name="right_bg_handler"  value="browsing" />
	<button id="right-bg-upload-reset" class="button button-secondary" type="button" name="right_bg_handler"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload a background. <br>きれいな景色をアップロードして下さい。</small></p>
	<input id="right-bg-upload-handler" type="hidden" name="right_bg_handler"  value="'.$get_right_bg_img.'" placeholder="set side bg" /> ';
	}

}

//**************
//activat the video fields
function asns_right_bg_video() {
	$right_video_src = esc_attr( get_option('right_video_src' ) );
	$right_video_start = esc_attr( get_option('right_video_start' ) );
	$right_video_end = esc_attr( get_option('right_video_end' ) );

	echo '<input id="right-video-src" type="text" name="right_video_src"  value="'.$right_video_src.'" placeholder="youtube video source url" size="20" /> 
	<p><small>Put your video embed ID.<br>[ ex: VSbIHKs0gEQ ]<br><p>ビデオの埋め込むアイディーをいれて下さい。</p></small></p>';
	
	// if ( !empty( $right_video_src ) ) {
		$default = 0;
		$right_start_value = ( $right_video_start == '' ? $default : $right_video_start );
		$right_end_value = ( $right_video_end == '' ? $default : $right_video_end );
	
	echo '<div class="right-value-wrapper">';
	echo '<hr><div id="s-e">from <input id="right-start-value" type="number" min="0" default-value="0" name="right_start_value"  value="'.$right_start_value.'" placeholder="start" style="width:70px;" /> 
	<p><small>Put your video start time by seconds .<br><p>ビデオの初め時間を秒にいれて下さい。</p></small></p></div>';
	
	echo 'to <input id="right-end-value" type="number" min="0" default-value="0" name="right_end_value"  value="'.$right_end_value.'" placeholder="end" style="width:70px;" /> 
	<p><small>Put your video end time by seconds .<br><p>ビデオの終わり時間を秒にいれて下さい。</p></small></p>';

	echo '<p style="text-align:center;"><small>[ From 0 to 0 = full length. ]</small></p>';
	echo '</div><!-- .right-value-wrapper -->';
	// }
}

/*
//**************
//activat the github field
function asns_right_github() {
	$rightGithub = esc_attr( get_option('right_github_handler' ) );
	echo '<input type="text" name="right_github_handler"  value="'.$rightGithub.'" placeholder="github_handler" /> ';
}
*/

//*******************************************************
//sanitization settings
function asns_twitter_sanitize( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}


//*******************************************************
//activation of the theme option [post formats + custom (header+bg)]
//===============================


//***********************
//custom fav icon activation

function asns_fav_icon_fields() {
	$options = esc_attr( get_option('fav_icon') );
	echo '<input id="fav-icon-upload-button" class="button button-secondary" type="button" name="fav_icon"  value="browsing" />
	<button id="fav-icon-upload-reset" class="button button-secondary" type="button" name="fav_icon"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<div id="fav-icon-pic" style="background:url( '.$options.' );"></div>
	<p class="description"><small>Upload Your favorite icon. <br><p>自分のサイトの気に入りアイコンをアップロードして下さい。</p></small></p>
	<input id="fav-icon-upload-handler" type="hidden" name="fav_icon"  value="'.$options.'" placeholder="set your icon picture" /> ';
}

//**********************
//post formats activation

// function asns_post_formats_callback( $input ) {
// 	return $input;
// }

function asns_theme_option_section() {
	echo __('Activate & Deactivate Theme Option','asns');
}


// function asns_post_formats_fields() {
// 	$options = get_option('post_formats');
// 	$formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
// 	$output = '';
// 	foreach ( $formats as $format ) {
// 		$checked = ( isset($options[$format]) == 1 ? 'checked' : '' );
// 		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'/>'.$format.'</label><br>';
// 	}
// 	echo $output;
// }

//***********************
//custom header & bg activation

function asns_custom_header_fields() {
	$options = esc_attr( get_option('custom_header') );
	$checked = ( @$options == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="custom_header" name="custom_header" value="1" '.$checked.'/>Activate the Custom Header</label><br>';
}

function asns_custom_background_fields() {
	$options = esc_attr( get_option('custom_background') );
	$checked = ( @$options == 1 ? 'checked' : '');
	echo '<label><input type="checkbox" id="custom_background" name="custom_background" value="1" '.$checked.'/>Activate the Custom Background</label><br>';
}


//*******************************************************
//activation of the contact form
//===============================
/*
function asns_contact_section() {
	echo __('Activate & Deactivate the Built-in Contact Form','asns');
}


function contact_form() {
	$options = esc_attr( get_option('activate_contact') );
	$checked = ( @$options == 1 ? 'checked':'');
	echo '<label><input id="activate-contact" name="activate_contact" type="checkbox" value="1" '.$checked.'/></label>';
}
*/

//*********************************************************************************************
//*********************************************************************************************

							//===================================//
							//	INCLUDES OF THE REQUIRED FILES 	 //
							//===================================//

function asns_theme_create_page() {
	//generation of the admin page
	require_once ( get_template_directory() . '/inc/asns-left-admin.php' );

	//echo "<br><h1> ASNS THEME ADMIN PANEL </h1>";
}

//**************

function asns_theme_settings() {
	//generation of the sub-menu-page
	require_once ( get_template_directory() . '/inc/asns-right-admin.php' );

	//echo "<br><h1> ASNS Right Author Setting </h1>";
}


//**************

function asns_theme_support_option() {
	//generation of the theme-option-page
	require_once ( get_template_directory() . '/inc/asns-theme-support-option.php' );

	//echo "<br><h1> ASNS THEME OPTION Setting </h1>";
}


//**************

function asns_theme_contact() {
	//generation of the contact-form-page
	require_once ( get_template_directory() . '/inc/asns-contact-form.php' );

	//echo "<br><h1> ASNS Contact Form Setting </h1>";
}


