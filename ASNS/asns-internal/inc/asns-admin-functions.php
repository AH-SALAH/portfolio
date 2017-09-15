<?php

/*
@package asns theme
	======================================
		ADMIN PAGE
	======================================
*/

function asns_add_admin_page() {
	//Generate admin page & sub pages

	// add_theme_page( 'ASNS THEME OPTION', 'ASNS-INTERNAL OPTION ' , 'manage_options', 'asns_option', 'asns_theme_create_page');
	add_menu_page( 'ASNS THEME OPTION', 'ASNS-INTERNAL OPTION ' , 'manage_options', 'asns_option', 'asns_theme_create_page', get_template_directory_uri() . '/img/asns-11-icon.png' , 110 );
	add_submenu_page( 'asns_option', 'ASNS-INTERNAL THEME OPTION', 'General', 'manage_options', 'asns_option', 'asns_theme_create_page' );
	add_submenu_page( 'asns_option', 'ASNS-INTERNAL OPTION', __( 'Theme Option', 'asns-internal' ), 'manage_options', 'asns_theme_option_settings', 'asns_theme_support_option' );
	//add_submenu_page( 'asns_option', 'ASNS OPTION', 'Custom CSS', 'manage_options', 'asns-option-settings', 'asns_theme_settings' );

add_action('admin_init','asns_custom_settings' );
add_action('admin_init','asns_theme_option_page' );
}
add_action('admin_menu','asns_add_admin_page' );

//**************

function asns_custom_settings() {
	register_setting( 'asns-settings-group', 'user_pic' );
/*	register_setting( 'asns-settings-group', 'first_name' );
	register_setting( 'asns-settings-group', 'last_name' );
	register_setting( 'asns-settings-group', 'user_description' );
	register_setting( 'asns-settings-group', 'twitter_handler' ,'asns_twitter_sanitize');
	register_setting( 'asns-settings-group', 'facebook_handler' );
	register_setting( 'asns-settings-group', 'github_handler' ); */
	register_setting( 'asns-settings-group', 'logo' );
	register_setting( 'asns-settings-group', 'fav_icon' );
	register_setting( 'asns-settings-group', 'map_src' );
	register_setting( 'asns-settings-group', 'audio_src' );
	register_setting( 'asns-settings-group', 'video_src' );
	register_setting( 'asns-settings-group', 'video_start' );
	register_setting( 'asns-settings-group', 'video_end' );

	add_settings_section( 'asns-sidebar-options', 'Sidebar Option', 'asns_sidebar_options', 'asns_option' );

	add_settings_field( 'sidebar-pic', '<span class="dashicons dashicons-format-image"></span> Picture', 'asns_sidebar_picture', 'asns_option', 'asns-sidebar-options');	
/*	add_settings_field( 'sidebar-name', '<span class="dashicons dashicons-id-alt"></span> Full Name', 'asns_sidebar_name', 'asns_option', 'asns-sidebar-options');
	add_settings_field( 'sidebar-description', '<span class="dashicons dashicons-edit"></span> Description', 'asns_sidebar_description', 'asns_option', 'asns-sidebar-options');
	add_settings_field( 'sidebar-twitter', '<span class="dashicons dashicons-twitter"></span> Twitter@', 'asns_sidebar_twitter', 'asns_option', 'asns-sidebar-options');	
	add_settings_field( 'sidebar-facebook', '<span class="dashicons dashicons-facebook-alt"></span> Facebook', 'asns_sidebar_facebook', 'asns_option', 'asns-sidebar-options');	
	add_settings_field( 'sidebar-github', 'Github', 'asns_sidebar_github', 'asns_option', 'asns-sidebar-options');	*/
	add_settings_field( 'sidebar-logo', '<span class="dashicons dashicons-universal-access-alt"></span> Site Logo', 'asns_sidebar_logo', 'asns_option', 'asns-sidebar-options');	
	add_settings_field( 'fav-icon', '<span class="dashicons dashicons-star-empty"></span> Fav Icon', 'asns_fav_icon_fields', 'asns_option', 'asns-sidebar-options');
	add_settings_field( 'sidebar-map', '<span class="dashicons dashicons-location-alt"></span> Google Map', 'asns_sidebar_map', 'asns_option', 'asns-sidebar-options');	
	add_settings_field( 'sidebar-audio', '<span class="dashicons dashicons-format-audio"></span> Audio', 'asns_sidebar_audio', 'asns_option', 'asns-sidebar-options');	
	add_settings_field( 'sidebar-video', '<span class="dashicons dashicons-video-alt3"></span> Video', 'asns_sidebar_video', 'asns_option', 'asns-sidebar-options');	

}



//********************
//Theme Support Option
//********************

function asns_theme_option_page() {
	// register_setting( 'asns-theme-option-page', 'fav_icon' );
	register_setting( 'asns-theme-option-page', 'post_formats', 'asns_post_formats_callback');
	register_setting( 'asns-theme-option-page', 'custom_header' );
	register_setting( 'asns-theme-option-page', 'custom_background' );

	add_settings_section( 'asns-theme-option-section', 'Manage Theme Support Option', 'asns_theme_option_section', 'asns_theme_support_option' );
	
	// add_settings_field( 'fav-icon', 'Fav Icon', 'asns_fav_icon_fields', 'asns_theme_support_option', 'asns-theme-option-section');
	add_settings_field( 'post-formats', 'Post Formats', 'asns_post_formats_fields', 'asns_theme_support_option', 'asns-theme-option-section');
	add_settings_field( 'custom-header', 'Custom Header', 'asns_custom_header_fields', 'asns_theme_support_option', 'asns-theme-option-section' );
	add_settings_field( 'custom-background', 'Custom Background', 'asns_custom_background_fields', 'asns_theme_support_option', 'asns-theme-option-section' );

}


//**************
//****** Activate the sidebar theme option *******

//section title
function asns_sidebar_options() {
	echo "customize your sidebar information";
}

//**************
//activat the pic field
function asns_sidebar_picture() {
	$get_picture = esc_attr( get_option('user_pic') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );

	if ( empty($get_picture) ) {
	
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="user_pic"  value="browsing" />
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br><p>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</p></small></p>
	<input id="pic-upload-handler" type="hidden" name="user_pic"  value="'.$get_picture.'" placeholder="set your picture" /> ';
	}else{
	echo '<input id="pic-upload-button" class="button button-secondary" type="button" name="user_pic"  value="browsing" />
	<button id="pic-upload-reset" class="button button-secondary" type="button" name="user_pic"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload Your Picture. (150x150) recommended. <br><p>自分のピキチャーをアップロードして下さい。(150x150) がすいしょうです。</p></small></p>
	<input id="pic-upload-handler" type="hidden" name="user_pic"  value="'.$get_picture.'" placeholder="set your picture" /> ';
	}

}

/*
//**************
//activat the name fields
function asns_sidebar_name() {
	$firstName = esc_attr( get_option('first_name' ) );
	$lastName = esc_attr( get_option('last_name' ) );
	echo '<input id="first-name" type="text" name="first_name"  value="'.$firstName.'" placeholder="first name" /> 
			<input id="last-name" type="text" name="last_name"  value="'.$lastName.'" placeholder="last name" />';

}

//**************
//activat the description field
function asns_sidebar_description() {
	$description = esc_attr( get_option('user_description' ) );
	echo '<input id="user-description" type="text" name="user_description"  value="'.$description.'" placeholder="description" size="45" /> ';

}

//**************
//activat the twitter fields
function asns_sidebar_twitter() {
	$twitter = esc_attr( get_option('twitter_handler' ) );
	echo '<input type="text" name="twitter_handler"  value="'.$twitter.'" placeholder="twitter_handler" /> 
			<br><p class="description"><small>write your twitter name without @　charachter.</small>
			<br><p><small>ツィター名前の前に @　マークを書かないで、自分のツイターの名前を書いてください。</small></p></p>';
}

//**************
//activat the facebook fields
function asns_sidebar_facebook() {
	$facebook = esc_attr( get_option('facebook_handler' ) );
	echo '<input type="text" name="facebook_handler"  value="'.$facebook.'" placeholder="facebook_handler" /> ';
}


//**************
//activat the github fields
function asns_sidebar_github() {
	$github = esc_attr( get_option('github_handler' ) );
	echo '<input type="text" name="github_handler"  value="'.$github.'" placeholder="github_handler" /><hr> ';
}

*/


//**************
//activat the logo field
function asns_sidebar_logo() {
	$get_logo = esc_attr( get_option('logo') );
	//$update_picture = esc_attr( update_option( 'user_pic', '' ) );

	if ( empty($get_logo) ) {

	echo '<input id="logo-upload-button" class="button button-secondary" type="button" name="logo"  value="browsing" />
	<p class="description"><small>Upload Your Logo. <span style="color:#c00;">(135x89) strongly recommended.</span><br><b>You can upload (.svg) but,files with only (.jpg .jpeg .png .gif) extensions will appear in the left review bar.</b><br><p>自分のロゴをアップロードして下さい。<span style="color:#c00;">(135x89) が一押しです。</span><br><b>(.svg) のファイルもアップロードことができますが、(.jpg .jpeg .png .gif)　のファイルだけ、レビューバーに見られます。</b></p> </small></p>
	<input id="logo-upload-handler" type="hidden" name="logo"  value="'.$get_logo.'" placeholder="set your logo" /> ';
	}else {
	echo '<input id="logo-upload-button" class="button button-secondary" type="button" name="logo"  value="browsing" />
	<button id="logo-upload-reset" class="button button-secondary" type="button" name="logo"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload Your Logo. <span style="color:#c00;">(135x89) strongly recommended.</span><br><b>You can upload (.svg) but,files with only (.jpg .jpeg .png .gif) extensions will appear in the left review bar.</b><br><p>自分のロゴをアップロードして下さい。<span style="color:#c00;">(135x89) が一押しです。</span><br><b>(.svg) のファイルもアップロードことができますが、(.jpg .jpeg .png .gif)　のファイルだけ、レビューバーに見られます。</b></p> </small></p>
	<input id="logo-upload-handler" type="hidden" name="logo"  value="'.$get_logo.'" placeholder="set your logo" /> ';
	}
}

//***********************
//custom fav icon activation

function asns_fav_icon_fields() {
	$fav = esc_attr( get_option('fav_icon') );

	if ( empty($fav) ) {

	echo '<input id="fav-icon-upload-button" class="button button-secondary" type="button" name="fav_icon"  value="browsing" />
	<p class="description"><small>Upload Your favorite icon. <br><p>自分のサイトの気に入りアイコンをアップロードして下さい。</p></small></p>
	<input id="fav-icon-upload-handler" type="hidden" name="fav_icon"  value="'.$fav.'" placeholder="set your icon picture" /> ';
	}else {
	echo '<input id="fav-icon-upload-button" class="button button-secondary" type="button" name="fav_icon"  value="browsing" />
	<button id="fav-icon-upload-reset" class="button button-secondary" type="button" name="fav_icon"  value="delete" title="reset"><span class="dashicons dashicons-image-rotate"></span></button>
	<p class="description"><small>Upload Your favorite icon. <br><p>自分のサイトの気に入りアイコンをアップロードして下さい。</p></small></p>
	<input id="fav-icon-upload-handler" type="hidden" name="fav_icon"  value="'.$fav.'" placeholder="set your icon picture" /> ';
	}

}


//**************
//activat the map fields
function asns_sidebar_map() {
	$map_src = esc_attr( get_option('map_src' ) );
	echo '<input id="map-src" type="text" name="map_src"  value="'.$map_src.'" placeholder="map embed source url" size="45" /> 
	<p><small>Put your Google map location embed code.<br>[ ex: https://www.google.com/maps/embed?.... ]<br><p>グーグルマップの場所の埋め込むコードをいれて下さい。</p></small></p>';

}

//**************
//activat the audio fields
function asns_sidebar_audio() {
	$audio_src = esc_attr( get_option('audio_src' ) );
	echo '<input id="audio-src" type="text" name="audio_src"  value="'.$audio_src.'" placeholder="soundcloud source url" size="45" /> 
	<p><small>Put your soundcloud embed code.<br>[ ex: https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/166560774 ]<br><p>サウンドクロードの埋め込むコードをいれて下さい。</p></small></p>';

}

//**************
//activat the video fields
function asns_sidebar_video() {
	$video_src = esc_attr( get_option('video_src' ) );
	$video_start = esc_attr( get_option('video_start' ) );
	$video_end = esc_attr( get_option('video_end' ) );

	echo '<input id="video-src" type="text" name="video_src"  value="'.$video_src.'" placeholder="youtube video ID" size="20" /> 
	<p><small>Put your video embed ID.<br>[ ex: Sf_8F7R9Ot0 ]<br><p>ビデオの埋め込むアイディーをいれて下さい。</p></small></p>';

		$default = 0;
		$start_value = ( $video_start == '' ? $default : $video_start );
		$end_value = ( $video_end == '' ? $default : $video_end );
	
	echo '<div class="value-wrapper">';
	echo '<hr><div id="s-e">from <input id="start-value" type="number" min="0" default-value="0" name="start_value"  value="'.$start_value.'" placeholder="start" style="width:70px;" /> 
	<p><small>Put your video start time by seconds .<br><p>ビデオの初め時間を秒にいれて下さい。</p></small></p></div>';
	
	echo 'to <input id="end-value" type="number" min="0" default-value="0" name="end_value"  value="'.$end_value.'" placeholder="end" style="width:70px;" /> 
	<p><small>Put your video end time by seconds .<br><p>ビデオの終わり時間を秒にいれて下さい。</p></small></p>';

	echo '<p style="text-align:center;"><small>[ From 0 to 0 = full length. ]</small></p>';
	echo '</div><!-- .value-wrapper -->';

}

//**************
//sanitization settings
function asns_twitter_sanitize( $input ) {
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

//**************

//**********************
//post formats activation

function asns_post_formats_callback( $input ) {
	return $input;
}

function asns_theme_option_section() {
	echo __('Activate & Deactivate Theme Option','asns-internal');
}


function asns_post_formats_fields() {
	$options = get_option('post_formats');
	$formats = array('aside','gallery','link','image','quote','status','video','audio','chat');
	$output = '';
	foreach ( $formats as $format ) {
		$checked = ( isset($options[$format]) == 1 ? 'checked' : '' );
		$output .= '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'/>'.$format.'</label><br>';
	}
	echo $output;
}

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

//**************

// function asns_theme_settings() {
// 	//generation of the sub-menu-page

// 	echo "<br><h1> ASNS Custom CSS </h1>";
// }

// *****************************



function asns_theme_create_page() {
	//generation of the admin page
	require_once ( get_template_directory() . '/inc/asns-admin.php' );

	//echo "<br><h1> ASNS THEME ADMIN PANEL </h1>";
}


function asns_theme_support_option() {
	//generation of the theme-option-page
	require_once ( get_template_directory() . '/inc/asns-theme-support-option.php' );

	//echo "<br><h1> ASNS THEME OPTION Setting </h1>";
}

