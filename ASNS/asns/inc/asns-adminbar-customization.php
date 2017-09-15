<?php
/*
@package asns theme
	======================================
		ASNS ADMINBAR FUNCTIONS
	======================================
*/



//***************************************************
//Change Admin logo

// function custom_admin_logo() {
//   echo '<style type="text/css">
//           #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before { content: url('.get_stylesheet_directory_uri().'../../asns/img/asns-11.png) !important; }
//   		  #wp-admin-bar-wp-logo {left: 0;right: 0;text-align: center;width: 4%;}
//         </style>';
// }
// add_action('admin_head', 'custom_admin_logo'); 


// ***********************************************
// show admin bar only for admins and editors
if (!current_user_can('edit_posts')) {
	add_filter('show_admin_bar', '__return_false');
}
//***************************************************
//Change Admin bar

function custom_admin_menu() {

 	global $wp_admin_bar;

    if ( !is_user_logged_in() ) { return; }  
    if ( !is_super_admin() || !current_user_can('edit_posts') || !is_admin_bar_showing() ) { return; } 

// Change Admin logo

	 // echo '<style type="text/css">
	 //          #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before { content: url('.get_stylesheet_directory_uri().'../../asns/img/asns-11.png) !important; top: 0; }
	 //  		  #wp-admin-bar-wp-logo {left: 0;right: 0;text-align: center;width: 4%;}
	 //        </style>';

        $url = ''.get_template_directory_uri().'/fonts/asns-11.svg';
        $adminlogo = '<div class="container" style="height: 31px;margin: 0 0 0 -3px;overflow: hidden;text-align: center;width: 50px;">
			<object src="'.$url.'" id="mysvg2" type="image/svg+xml" data="'.$url.'" width="100%" height="100%"></object>
		</div>';

		$wp_admin_bar->add_menu( array(
			'id' => 'wp-logo',
			'title' => $adminlogo,
			'href' => admin_url(),
			'meta'  => array( 'target' => 'parent' ),
			) );


// Change the WP Logo Icon within the My Sites Menu

    foreach ( (array) $wp_admin_bar->user->blogs as $blog ) { 

        $menu_id  = 'blog-' . $blog->userblog_id;  
        $blogname = empty( $blog->blogname ) ? $blog->domain : $blog->blogname;  
        $blavatar = '<img src="' . esc_url( get_template_directory_uri() ) . '/img/asns-11-icon.png" style="vertical-align:middle;margin:5px 5px 0 0" alt="' . esc_attr__( 'Blog avatar' ,'asns') . '" width="16" height="16" class="blavatar"/>';  
        
        $wp_admin_bar->add_menu( array(  
            'parent'    => 'my-sites-list',  
            'id'    => $menu_id,  
            'title'     => $blavatar . $blogname,  
            'href'  => get_admin_url( $blog->userblog_id ),
            ) );  
    }

// add an icon & visit link

		$wp_admin_bar->add_menu( array(
			'id' => 'Visit',
			'title' => '<img src="'.esc_url( get_template_directory_uri() ).'/img/asns-11-icon.png" style="vertical-align:middle;margin-right:5px;" alt="Visit Site" title="Visit Site" />'.__('Visit Site','asns').' >>' ,
			'href' => site_url(),
			'meta'  => array( 'target' => 'new_tab' ),
			) );

// ********************************
// add new menus


        /* menu link */  

		$leftFacebook = esc_attr( get_option('left_facebook_handler' ) );

        $wp_admin_bar->add_menu( array(  
            'parent' => 'top-secondary',  
            'id'     => 'fb', /* unique id name */  
            'title'     => '<span class="dashicons-before dashicons-facebook"></span>', /* Set the link title */  
            'href'  => 'https://www.facebook.com/'.$leftFacebook.'', /* Set the link a href */  
            'meta'  => array( 'target' => 'new_tab' ), 
            ) ); 

        /* menu link */  
        
        $leftTwitter = esc_attr( get_option('left_twitter_handler' ) );

        $wp_admin_bar->add_menu( array(  
            'parent' => 'top-secondary',  
            'id'     => 'twt', /* unique id name */  
            'title'  	=> '<span class="dashicons-before dashicons-twitter"></span>', /* Set the link title */  
            'href'  => 'https://twitter.com/'.$leftTwitter.'', /* Set the link a href */  
            'meta'  => array( 'target' => 'new_tab' ), 
            ) );


        $wp_admin_bar->add_menu( array(  
            'parent' => 'top-secondary',  
            'id'     => 'google', /* unique id name */  
            'title'     => '<img src="'.esc_url( get_template_directory_uri() ).'/img/google.gif" style="width:60px;height:32px;" alt="google" title="'.__('Go to GOOGLE','asns').'" />' , /* Set the link title */  
            'href'  => 'https://google.com/', /* Set the link a href */  
            'meta'  => array( 'target' => 'new_tab' ), 
            ) );

        $wp_admin_bar->add_menu( array(  
            'parent' => 'top-secondary',  
            'id'     => 'google-translate', /* unique id name */  
            'title'     => '<span class="dashicons-before dashicons-translation"></span>', /* Set the link title */  
            'href'  => 'https://translate.google.com/', /* Set the link a href */  
            'meta'  => array( 'target' => 'new_tab' ), 
            ) );

// *******************
// remove menues

        $wp_admin_bar->remove_menu( 'about' );
        $wp_admin_bar->remove_menu( 'wporg' );
        $wp_admin_bar->remove_menu( 'documentation' );
        $wp_admin_bar->remove_menu( 'support-forums' );
        $wp_admin_bar->remove_menu( 'feedback' );

// ***********************


        	// echo '<style type="text/css">
        	// 		#wpadminbar #wp-admin-bar-top-secondary li span::before{line-height:1.5;}
        	// 	  </style>';
// *****************************************************
// Add a Menu to the Theme Editor for Multisite and Standalone WordPress

    if ( function_exists('is_multisite') && is_multisite() ) {  
        $wp_admin_bar->add_menu( array(  
        	'parent' => 'top-secondary',
            'id' => 'theme-editor',  
            'title' => '<span class="dashicons-before dashicons-admin-generic"></span> '.__('Edit Theme','asns').'',  
            'href' => network_admin_url( 'theme-editor.php' ) )  
        );  
    }else{  
        $wp_admin_bar->add_menu( array(  
        	'parent' => 'top-secondary',
            'id' => 'theme-editor',  
            'title' => '<span class="dashicons-before dashicons-admin-generic"></span> '.__('Edit Theme','asns').'',  
            'href' => admin_url( 'theme-editor.php' ) )  
        );  
    }  


}
add_action('wp_before_admin_bar_render', 'custom_admin_menu'); 

// *************************************************
// admin menu bar button

function adminbar_buttons(){

	global $wp_admin_bar;

        $wp_admin_bar->add_menu( array(  
              
            'id'     => 'menu-button-open', /* unique id name */  
            'title'     => '<span class="dashicons-before dashicons-menu"></span>', /* Set the link title */  
            'href'  => '#', /* Set the link a href */  
            'meta'  => array( 'class' => 'adminmbtnopen' ), 
            ) );

        $wp_admin_bar->add_menu( array(  
              
            'id'     => 'menu-button-close', /* unique id name */  
            'title'     => '<span class="dashicons-before dashicons-dismiss"></span>', /* Set the link title */  
            'href'  => '#', /* Set the link a href */  
            'meta'  => array( 'class' => 'adminmbtnclose' ), 
            ) );

        	// echo '<style type="text/css">
        	// 		#wpadminbar #wp-admin-bar-root-default li span::before{line-height:1.5;}
        	// 	  </style>';
}
add_action( 'admin_bar_menu','adminbar_buttons',10 );

// *************************************************
// change and customize hody message.

function public_holiday() {

// ゅゅゅゅゅゅゅゅゅゅゅ
// global $curlang;

$date = date('d-m');

 $curlang = get_bloginfo('language');

 if($curlang =="ja") {

  switch($date) {
    case '01-01':
      $message = ' '.__('新明けおめでとう~','asns').' ';
    break;
 
    case '25-12':
      $message = ' '.__('メリークリスマス','asns').' ';
    break;
 
    default:
      $message = ' '.__('ようこそ','asns').' ';
  }
  return $message;

} else{

  switch($date) {
    case '01-01':
      $message = ' '.__('Happy New Years','asns').' ';
    break;
 
    case '25-12':
      $message = ' '.__('Merry Christmas','asns').' ';
    break;
 
    default:
      $message = ' '.__('Welcome','asns').' ';
  }
  return $message;

}


}



				/*******************/

// function howdy_message($translated_text, $text, $domain) {
//   $message = public_holiday();
//     $new_message = str_replace('Howdy', $message, $text);
//     return $new_message;
// }
// add_filter('gettext', 'howdy_message', 10, 3);

// *************************************************

function admin_bar_account_howdy_message() {

    global $wp_admin_bar;

    if( !method_exists( $wp_admin_bar, 'add_menu' ) )
        return;

    $user_id      = get_current_user_id();
    $current_user = wp_get_current_user();
    $profile_url  = get_edit_profile_url( $user_id );

    if ( ! $user_id )
        return;

    $avatarcss = '<style type="text/css">#wpadminbar #wp-admin-bar-my-account.with-avatar > a img{height:20px;width:auto;}</style>';
    $avatar = get_avatar( $user_id, 20 ) . $avatarcss;
    $howdy  = public_holiday() . sprintf( ', %s', $current_user->display_name );
    $class  = empty( $avatar ) ? '' : 'with-avatar';

    $wp_admin_bar->add_menu( array(
        'id'        => 'my-account',
        'parent'    => 'top-secondary',
        'title'     => $howdy . $avatar,
        'href'      => $profile_url,
        'meta'      => array(
            'class'     => $class,
            'title'     => __('My Account','asns'),
        ),
    ) );
}
add_action( 'wp_before_admin_bar_render', 'admin_bar_account_howdy_message' );
