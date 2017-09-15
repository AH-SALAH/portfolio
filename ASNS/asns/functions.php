<?php

/*
 * ASNS functions
 */



/*

 * Set the content width based on the theme's design and stylesheet.

 *

 * @since Twenty Fifteen 1.0

 */

if ( ! isset( $content_width ) ) {

	$content_width = 660;

}



/*

 * Twenty Fifteen only works in WordPress 4.1 or later.

 */

//if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {

	//require get_template_directory() . '/inc/back-compat.php';

//}



if ( ! function_exists( 'asns_setup' ) ) :

/*

 * Sets up theme defaults and registers support for various WordPress features.

 * Note that this function is hooked into the after_setup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 *

 */


function asns_setup() {



	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on asns, use a find and replace

	 * to change 'asns' to the name of your theme in all the template files

	 */

	load_theme_textdomain( 'asns', get_template_directory() . '/languages' );



	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	/*

	 * Let WordPress manage the document title.

	 * By adding theme support, we declare that this theme does not use a

	 * hard-coded <title> tag in the document head, and expect WordPress to

	 * provide it for us.

	 */

	add_theme_support( 'title-tag' );

/*
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 * @param string $title Default title text for current view.
 * @param string $sep   Optional separator.
 * @return string The filtered title.
*/


function wpdocs_theme_name_wp_title( $title, $sep ) {

    if ( is_feed() ) {

        return $title;

    }

     
    global $page, $paged;


    // Add the blog name

    $title = get_bloginfo( 'name', 'display' );
    $sep = '|';

    // Add the blog description for the home/front page.

    $site_description = get_bloginfo( 'description', 'display' );
    $p_title = get_the_title();

    if ( $site_description && ( is_home() || is_front_page() ) ) {

        $title .= " $sep $site_description";

    }else{
    	$title .= " $sep $p_title";
    }


    // Add a page number if necessary:

    if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {

        $title .= " $sep " . sprintf( __( 'Page %s', 'asns-internal' ), max( $paged, $page ) );

    }

    return $title;

}

add_filter( 'wp_title', 'wpdocs_theme_name_wp_title', 10, 2 );

// *********************************************

	/*

	 * Enable support for Post Thumbnails on posts and pages.

	 *

	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails

	 */

	// add_theme_support( 'post-thumbnails' );

	// set_post_thumbnail_size( 825, 510, true );



	// This theme uses wp_nav_menu() in two locations.

	// register_nav_menus( array(

	// 	'primary' => __( 'Primary Menu', 'asns' ),

	// 	'social'  => __( 'Social Links Menu', 'asns' ),

	// ) );



	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

	) );



	/*

	 * Enable support for Post Formats.

	 *

	 * See: https://codex.wordpress.org/Post_Formats

	 */

	// add_theme_support( 'post-formats', array(

	// 	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'

	// ) );



	//$color_scheme  = asns_get_color_scheme();

	//$default_color = trim( $color_scheme[0], '#' );



	// Setup the WordPress core custom background feature.

	//add_theme_support( 'custom-background', apply_filters( 'asns_custom_background_args', array(

	//	'default-color'      => $default_color,

	//	'default-attachment' => 'fixed',

	//) ) );





//**************************************************


/*

 * Register widget area.

 *

 * @since Twenty Fifteen 1.0

 *

 * @link https://codex.wordpress.org/Function_Reference/register_sidebar

 */
/*
function asns_widgets_init() {

	if(function_exists('register_sidebar'))

register_sidebar(array('name' => 'sidebar-1',

'class' => '',

'before_widget' => '<aside>',

'after_widget' => '</aside>',

'before_title' => '<h3>',

'after_title' => '</h3>'

));



register_sidebar(array('name'=>'sidebar-2',

'class' => '',

'before_widget' => '<aside>',

'after_widget' => '</aside>',

'before_title' => '<h3>',

'after_title' => '</h3>',

));



register_sidebar(array('name' => 'sidebar-3',

'class' => '',

'before_widget' => '<aside>',

'after_widget' => '</aside>',

'before_title' => '<h3>',

'after_title' => '</h3>'

));





register_sidebar(array('name'=>'top-menu-icon-list',

'class' => 'top-menu-icon-list',

'before_widget' => '<aside>',

'after_widget' => '</aside>',

'before_title' => '<h3>',

'after_title' => '</h3>',

));



}

add_action( 'widgets_init', 'asns_widgets_init' );
*/
}

add_action( 'after_setup_theme', 'asns_setup' );


endif; // asns_internal_setup



// **********************************


if ( ! function_exists( 'asns_fonts_url' ) ) :

//**************************************************

/*

 * Register Google fonts for Twenty Fifteen.

 *

 * @since Twenty Fifteen 1.0

 *

 * @return string Google fonts URL for the theme.

 */

function asns_fonts_url() {

	$fonts_url = '';

	$fonts     = array();

	$subsets   = 'latin,latin-ext';



	/*

	 * Translators: If there are characters in your language that are not supported

	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.

	 */

	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'asns' ) ) {

		$fonts[] = 'Noto Sans:400italic,700italic,400,700';

	}



	/*

	 * Translators: If there are characters in your language that are not supported

	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.

	 */

	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'asns' ) ) {

		$fonts[] = 'Noto Serif:400italic,700italic,400,700';

	}



	/*

	 * Translators: If there are characters in your language that are not supported

	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.

	 */

	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'asns' ) ) {

		$fonts[] = 'Inconsolata:400,700';

	}



	/*

	 * Translators: To add an additional character subset specific to your language,

	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.

	 */

	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'asns' );



	if ( 'cyrillic' == $subset ) {

		$subsets .= ',cyrillic,cyrillic-ext';

	} elseif ( 'greek' == $subset ) {

		$subsets .= ',greek,greek-ext';

	} elseif ( 'devanagari' == $subset ) {

		$subsets .= ',devanagari';

	} elseif ( 'vietnamese' == $subset ) {

		$subsets .= ',vietnamese';

	}



	if ( $fonts ) {

		$fonts_url = add_query_arg( array(

			'family' => urlencode( implode( '|', $fonts ) ),

			'subset' => urlencode( $subsets ),

		), 'https://fonts.googleapis.com/css' );

	}



	return $fonts_url;

}

endif;



//***************************
/* Hide WP version strings from scripts and styles
 * @return {string} $src
 * @filter script_loader_src
 * @filter style_loader_src
 */
function asns_remove_wp_version_strings( $src ) {
     global $wp_version;
     parse_str(parse_url($src, PHP_URL_QUERY), $query);
     if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
          $src = remove_query_arg('ver', $src);
     }
     return $src;
}
add_filter( 'script_loader_src', 'asns_remove_wp_version_strings' );
add_filter( 'style_loader_src', 'asns_remove_wp_version_strings' );

/* Hide WP version strings from generator meta tag */
function asns_remove_version() {
return '';
}
add_filter('the_generator', 'asns_remove_version');
//*****************************

//**************************************************

/*

 * Add featured image as background image to post navigation elements.

 *

 * @since Twenty Fifteen 1.0

 *

 * @see wp_add_inline_style()

 */

function asns_post_nav_background() {

	if ( ! is_single() ) {

		return;

	}



	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );

	$next     = get_adjacent_post( false, '', false );

	$css      = '';



	if ( is_attachment() && 'attachment' == $previous->post_type ) {

		return;

	}



	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {

		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );

		$css .= '

			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }

			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }

			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

	}



	if ( $next && has_post_thumbnail( $next->ID ) ) {

		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );

		$css .= '

			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }

			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }

			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }

		';

	}



	wp_add_inline_style( 'asns-style', $css );

}

add_action( 'wp_enqueue_scripts', 'asns_post_nav_background' );

//**************************************************


/*

 * Display descriptions in main navigation.

 *

 * @since Twenty Fifteen 1.0

 *

 * @param string  $item_output The menu item output.

 * @param WP_Post $item        Menu item object.

 * @param int     $depth       Depth of the menu.

 * @param array   $args        wp_nav_menu() arguments.

 * @return string Menu item with possible description.

 */

function asns_nav_description( $item_output, $item, $depth, $args ) {

	if ( 'primary' == $args->theme_location && $item->description ) {

		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );

	}



	return $item_output;

}

add_filter( 'walker_nav_menu_start_el', 'asns_nav_description', 10, 4 );


//**************************************************

/*

 * Add a `screen-reader-text` class to the search form's submit button.

 *

 * @since Twenty Fifteen 1.0

 *

 * @param string $html Search form HTML.

 * @return string Modified search form HTML.

 */

function asns_search_form_modify( $html ) {

	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );

}

add_filter( 'get_search_form', 'asns_search_form_modify' );



//**************************************************

/*

 * Customize the title for the home page, if one is not set.

 *

 * @param string $title The original title.

 * @return string The title to use.

 */

function wpdocs_hack_wp_title_for_home( $title )

{

  if ( empty( $title ) && ( is_home() || is_front_page() ) ) {

    $title = __( 'Home', 'asns' ) . ' | ' . get_bloginfo( 'description' );

  }

  return $title;

}
add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );




//**************************************************




/*

 * JavaScript Detection.

 *

 * Adds a `js` class to the root `<html>` element when JavaScript is detected.

 *

 * @since Twenty Fifteen 1.1

 */

function asns_javascript_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

}



add_action( 'wp_head', 'asns_javascript_detection', 0 );




//**************************************************



/*
 * Enqueue scripts and styles.
 */



function asns_scripts() {


// wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' ); // Inside a parent theme
wp_enqueue_style( 'insider-style', get_template_directory_uri() . '/css/split-intro.css' ); // Inside a parent theme

wp_enqueue_style( 'split-intro-demo', get_stylesheet_directory_uri() . '/css/split-intro-demo.css', false, '1.0', 'all' ); // Inside a child theme

	
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js", false, null);
	wp_enqueue_script('jquery');

	wp_register_script('bootjs', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", false, null);
	wp_enqueue_script('bootjs');
	

wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js',array(), '1.1', true );
  wp_enqueue_script( 'modernizr');

wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js',array(), '1.1', true );
  wp_enqueue_script( 'classie');

wp_register_script( 'cbpSplitLayout', get_template_directory_uri() . '/js/cbpSplitLayout.js',array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'cbpSplitLayout');
  
wp_register_script( 'jquery.nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js',array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'jquery.nicescroll');

wp_register_script( 'asns.min', get_template_directory_uri() . '/js/asns.min.js',array( 'jquery' ), '1.1', true );
  wp_enqueue_script( 'asns.min');



	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {

		wp_enqueue_script( 'comment-reply' );

	}



}

add_action( 'wp_enqueue_scripts', 'asns_scripts' );

//****************************************************
/*
function wp_pagination() {
global $wp_query;
$big = 12345678;
$page_format = paginate_links( array(
    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
    'format' => '?paged=%#%',
    'current' => max( 1, get_query_var('paged') ),
    'total' => $wp_query->max_num_pages,
    'type'  => 'array'
) );
if( is_array($page_format) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div id="pagination"><ul>';
            echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
            foreach ( $page_format as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
}
}
*/

//************************************************
// Make a new default gravatar available

function new_default_avatar ( $avatar_defaults ) {
		//Set the URL where the image file for your avatar is located
		$new_avatar_url = esc_attr( get_option('left_user_pic') );
		echo '<input type="hidden" name="admin-avatar" id="admin-avatar" value="'.$new_avatar_url.'" />';

		$new_avatar_url = 'admin-avatar';

		$avatar_defaults[$new_avatar_url]  = 'ADMIN AVATAR';
		return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'new_default_avatar' );

//------------------------------------------------------
// Make a new default gravatar available on the dashboard

function new_global_avatar () {
		//Set the URL where the image file for your avatar is located
		$new_avatar_url = esc_attr( get_option('left_user_pic') );

		echo '<input type="hidden" name="admin-avatar" id="admin-avatar" value="'.$new_avatar_url.'" />';

}
add_filter( 'admin_head', 'new_global_avatar' );


// *************************************************


// *************************************************
// Customise the footer in admin area
function asns_footer_admin () {
	echo ' '.__('Theme designed and developed by','asns') .' <a class="credit" href="#" target="_blank"><span>アハマド</span> <span>✡</span> サラーハ</a>';
}
add_filter('admin_footer_text', 'asns_footer_admin');


// ***********************************************
// login page customization

function my_login_logo() {

	echo  '<style type="text/css">
				html{background: transparent url('.get_template_directory_uri().'/img/demo-11-bg.jpg) no-repeat fixed center top/cover !important;}
        		
        		body{background:transparent!important;}
        		
        		body.login div#login h1 a {
            		background-image: url('.get_template_directory_uri().'/img/asns-11.png) no-repeat center center/cover !important;
            		padding-bottom: 30px;
            		display:none;
        		}

        		#login{padding:1% 0 0!important;}

        		#login #loginform{
        			background: rgba(0,0,0,0.5) url('.get_template_directory_uri().'/img/google.gif) no-repeat 0% 153% / contain !important;
        		}

        		.login #backtoblog a, .login #nav a, .login h1 a{color:#000 !important;}

        		.login #backtoblog, .login #nav{display:inline-table; padding:0 20px!important;}

        		.wp-core-ui .button-primary,
        		.wp-core-ui .button-primary:focus,
        		.wp-core-ui .button-primary:active{
        			background:#d4003c !important;
        			border-color:#d4003c !important;
        			text-shadow:none !important;
        			box-shadow:none !important;
        			-webkit-transition:all 0.2s ease;
        			-moz-transition:all 0.2s ease;
        			-o-transition:all 0.2s ease;
        			transition:all 0.2s ease;
        		}
        		.wp-core-ui .button-primary:hover{background:#4b0082;border-color:#4b0082;}

    		</style>';
    		?>
    		<div class="container" style="width:100px;height:100px;text-align:center;margin:0 auto;padding:7% 0 0 0;">
    			<object src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/asns-11.svg" id="mysvg2" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/asns-11.svg" width="100%" height="100%"></object>
    		</div>
<?php 
}
add_action( 'login_head', 'my_login_logo',1 );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

// function my_login_logo_url_title() {
//     return esc_html__(bloginfo('name'),'asns');
// }
// add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//******************************************
//stop helping the hacker from identifying whether p-w or u-n is right
//by disabling the error message in the login page
//but Not recommended for sites with multiple authors.
function login_er(){
	$er = '<p style="color:#f8f8ff;margin:0 auto;text-align:center;">
			<strong style="display: inline-flex;line-height: 2.5;">
			<span class="dashicons dashicons-no" style="line-height: 1.1;font-size:30px;margin:0 auto;text-align:center;display:table;"></span>LOGIN ERROR
			</strong>
			</p>';
	$er .= '<style type="text/css">
			.login #login_error{padding:0;background:#ff0000;border:0;}
			.login .message {background-color: rgba(0, 0, 0, 0.7);color: #40e0d0;font-style: italic;font-weight: 600;}
			</style>';		
	return $er;
}
add_filter('login_errors','login_er');

//******************************************
function login_out_ms(){
	$ms = '<style type="text/css">
			.login .message {background-color: rgba(0, 0, 0, 0.7);color: #40e0d0;font-style: italic;font-weight: 600;}
			</style>';		
	return $ms;
}
add_filter('login_message','login_out_ms');

//*************************************************
//**************************************************

function admin_intro(){

	$url = esc_url( get_template_directory_uri() );

	echo '<div class="intro-loader">
    			<object src="'.$url.'/fonts/asns-11.svg" id="mysvg2" type="image/svg+xml" data="'.$url.'/fonts/asns-11.svg" width="30%" height="30%"></object>
		  </div>';

	echo '<style type="text/css">
			#wpwrap,#wpbody {opacity:0;}
			</style>';

}
add_action('admin_head','admin_intro' );

//**********************************************

function admin_sticker(){

	echo '<div class="announce1">
			<a href="#" type="button" class="a-mis"><span class="dashicons dashicons-dismiss"></span></a>
			<p>
			<strong>THANKS FOR USING OUR THEME<br>テーマ使うにありがとうございます</strong><br>
			<span class="dashicons dashicons-smiley"></span>
			</p>
			</div>';

	echo '<style type="text/css">
			.announce1 {
				display:none;
				position:fixed;
				bottom:8%;
				right:0;
				width:300px;
				height:80px;
				padding:1%;
				word-wrap: break-word;
				background:rgba(60, 255, 255, 0.2) none repeat scroll 0 0;
				border-radius:4px 4px 4px 4px;
				box-shadow: 0px 0px 1px 0px;
				z-index:9;}
			.announce1 > p {
				color: #dc143c;
				display: table;
				font-family: fantasy; 
				margin: 0 auto;
				text-align: center;}
			.announce1 .a-mis{border: 1px inset #ff0000;border-radius: 50%;color: #696969;display:table;}
			.announce1 .a-mis span{text-decoration:none;}
			.announce1 .a-mis span:hover{color: #696000;}
			</style>';

}
add_action('in_admin_header','admin_sticker' );

//**********************************************


require get_template_directory() . '/inc/asns-admin-functions.php';
require get_template_directory() . '/inc/asns-enqueue-functions.php';
//require get_template_directory() . '/inc/custom-post-type.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/asns-adminbar-customization.php';
