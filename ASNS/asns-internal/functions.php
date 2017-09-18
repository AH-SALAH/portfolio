<?php

/*
 * ASNS functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 */

//********************************************************


//********************************************************

if ( ! function_exists( 'asns_setup' ) ) :

/*
 * Sets up theme defaults and registers support for various WordPress features.
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 * @since Twenty Fifteen 1.0
 */

function asns_internal_setup() {


	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on asns, use a find and replace
	 * to change 'asns' to the name of your theme in all the template files
	 */

	load_theme_textdomain( 'asns-internal', get_template_directory() . '/languages' );

//************************************************

	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );

//************************************************
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */

	add_theme_support( 'title-tag' );

// function title_output() { 
// 	if (is_single() || is_page() || is_archive()) {
// 	 wp_title(' | ',true); 
// 	} else { 
// 		$n_t = get_bloginfo('name','display') .' | '. get_bloginfo('description','display');
// 		 return $n_t;
// 	}
// } 
// add_filter( 'wp_title', 'title_output', 10, 2 );

//**************************************************


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

 


 //*********************************************

/*
 * Customize the title for the home page, if one is not set.
 * @param string $title The original title.
 * @return string The title to use.
 */

// function wpdocs_hack_wp_title_for_home( $title )

// {

//   if ( empty( $title ) && ( is_home() || is_front_page() ) ) {

//     $title = __( 'Home', 'asns-internal' ) . ' | ' . get_bloginfo( 'description' );

//   }

//   return $title;

// }
// add_filter( 'wp_title', 'wpdocs_hack_wp_title_for_home' );


//************************************************

	/* 
	*	Add Custom Header Support to your Theme 
	*	and update your header.php file to:
	* 	<img alt="" src="<?php header_image(); ?>" 
	*	width="<?php echo get_custom_header()->width; ?>" 
	*	height="<?php echo get_custom_header()->height; ?>" />
	*/
// 	$defaults = array(
//     	'default-image'          => get_template_directory_uri() . '/img/demo-11-bg.jpg',
//     	'random-default'         => false,
//     	'width'                  => 980,
//     	'height'                 => 200,
//     	'flex-height'            => true,
//     	'flex-width'             => true,
//     	'default-text-color'     => '',
//     	'header-text'            => true,
//     	'uploads'                => true,
//     	'wp-head-callback'       => '',
//     	'admin-head-callback'    => '',
//     	'admin-preview-callback' => '',
// 	);

// /*	Custom Headers are supported in WordPress 3.4 and above.
// *	If you’d like your theme to support WordPress installations that are older than 3.4, 
// *	you can use the following code instead of add_theme_support( ‘custom-header’);
// */
// global $wp_version;
// if ( version_compare( $wp_version, '3.4', '>=' ) ) :
//     add_theme_support( 'custom-header', $defaults );
// else :
//     add_custom_image_header( $wp_head_callback, $admin_head_callback );
// endif;

//******************************************************

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */

	add_theme_support( 'post-thumbnails' );
	//set_post_thumbnail_size( 825, 510, true );

//******************************************************

	// This theme uses wp_nav_menu() in two locations.

	register_nav_menus( array(
		'primary' => __( 'nav', 'asns-internal' ),
		'l-menu'  => __( 'l-menu', 'asns-internal' ),
	) );

//******************************************************

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */

	add_theme_support( 'html5', array(

		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'

	) );

//******************************************************

	/*
	 * Enable support for Post Formats.
	 * See: https://codex.wordpress.org/Post_Formats
	 */

	// add_theme_support( 'post-formats', array(

	// 	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'

	// ) );

//******************************************************

	//$color_scheme  = asns_get_color_scheme();

	//$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.

	// add_theme_support( 'custom-background', apply_filters( 'asns_custom_background_args', array(
	// 	// 'default-color'      => $default_color,
	// 	'default-attachment' => 'fixed',
	// ) ) );

//******************************

add_theme_support('editor_style');
    $font_url = str_replace( ',', '%2C', '//fonts.googleapis.com/css?family=Lato:300,400,700' );
    add_editor_style( $font_url );

// *****************************

}
endif; // asns_internal_setup

add_action( 'after_setup_theme', 'asns_internal_setup' );

//************************************************************************

/*
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


//*******************************************************

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
 * Register widget area.
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */

function asns_widgets_init() {

	if(function_exists('register_sidebar'))

register_sidebar(array(
'name' => __( 'post-sidebar', 'asns-internal' ),
'id' => 'single-sidebar',
//'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'asns-internal' ),
'class' => '',
'before_widget' => '<aside style="border-top:3px solid;text-align:center;margin:0 auto;padding: 10px;">',
'after_widget' => '</aside>',
'before_title' => '<h3>',
'after_title' => '</h3>'

));

/*

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


*/
}

add_action( 'widgets_init', 'asns_widgets_init' );




//**************************************************

if ( ! function_exists( 'asns_fonts_url' ) ) :

/*
 * Register Google fonts
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

//*************************************************


/* Show Recent Comments
 *
 * @author Baki Goxhaj
 * @link http://wplancer.com/how-to-display-recent-comments-without-using-a-plugin-or-widget/ 
 *
 * @param string/integer $no_comments
 * @param string/integer $comment_len
 * @param string/integer $avatar_size
 * 
 * @echo string $comm
 */
function asns_recent_comments($no_comments = 4, $comment_len = 80, $avatar_size = 48) {
	$comments_query = new WP_Comment_Query();
	$comments = $comments_query->query( array( 'number' => $no_comments ) );
	$comm = '';
	if ( $comments ) : foreach ( $comments as $comment ) :
		$comm .= '<div id="rc-main"> <a class="rc-title" href="'  . get_the_title( $comment->comment_post_ID ) . '">&#3572; '. get_the_title( $comment->comment_post_ID ) . '</a>';
		$comm .= '<li>' . get_avatar( $comment->comment_author_email, $avatar_size ) . '';
		$comm .= '<div id="rc-meta"> <a class="author" href="' . get_permalink( $comment->comment_post_ID ) . '#comment-' . $comment->comment_ID . '"> ' . get_comment_author( $comment->comment_ID ) . ' :</a>';
		$comm .= '<p class="rc-date"> ' . get_comment_date( '', $comment ) . '</p></div>';
		$comm .= '<p id="rc-text">' . strip_tags( substr( apply_filters( 'get_comment_text', $comment->comment_content ), 0, $comment_len ) ) . '...</p></li></div>';
	endforeach; else :
		$comm .= 'No comments.';
	endif;
	echo $comm;	
}



//*************************************************
/*
 * The formatted output of a list of pages.
 *
 * Displays page links for paginated posts (i.e. includes the "nextpage".
 * Quicktag one or more times). This tag must be within The Loop.
 *
 * The defaults for overwriting are:
 * 'next_or_number' - Default is 'number' (string). Indicates whether page
 *      numbers should be used. Valid values are number and next.
 * 'nextpagelink' - Default is 'Next Page' (string). Text for link to next page.
 *      of the bookmark.
 * 'previouspagelink' - Default is 'Previous Page' (string). Text for link to
 *      previous page, if available.
 * 'pagelink' - Default is '%' (String).Format string for page numbers. The % in
 *      the parameter string will be replaced with the page number, so Page %
 *      generates "Page 1", "Page 2", etc. Defaults to %, just the page number.
 * 'before' - Default is '<p id="post-pagination"> Pages:' (string). The html 
 *      or text to prepend to each bookmarks.
 * 'after' - Default is '</p>' (string). The html or text to append to each
 *      bookmarks.
 * 'text_before' - Default is '' (string). The text to prepend to each Pages link
 *      inside the <a> tag. Also prepended to the current item, which is not linked.
 * 'text_after' - Default is '' (string). The text to append to each Pages link
 *      inside the <a> tag. Also appended to the current item, which is not linked.
 *
 * @param string|array $args Optional. Overwrite the defaults.
 * @return string Formatted output in HTML.
 */
function custom_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<p id="post-pagination">' . __( '<span>Pages&raquo;</span>','asns-internal' ), 
		'after' => '</p>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number', 
		'nextpagelink' => __( 'Next page','asns-internal' ),
		'previouspagelink' => __( 'Previous page','asns-internal' ),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= _wp_link_page( $i );
				else
					$output .= '<span class="current-post-page">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}

//*************************************************

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

//************************************************
/*
function pagination_bar() {
    global $wp_query;
 
    $total_pages = $wp_query->max_num_pages;
 
    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
 
        echo paginate_links(array(
            'base' => get_pagenum_link(1) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
        ));
    }
}
*/
//*************************************************
/*
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}
*/
//**************************************************
// function to display number of posts.

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return __('0 View','asns-internal');
    }
     printf(__('%d Views','asns-internal'),$count);
}

// function to count views.
function setPostViews($postID) {
	if ( !current_user_can( 'manage_options' )){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    	}
	}
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);

function posts_column_views($defaults){
    $defaults['post_views'] = __('Views','asns-internal');
    return $defaults;
}

function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

//**************************************************
//Display the Most Accurate Comment Count

function comment_count( $count ) {

if ( ! is_admin() ) {
global $id;
$sep_com = get_comments('status=approve&post_id=' . $id);
$comments_by_type = separate_comments($sep_com);
return count($comments_by_type['comment']);
} else {
return $count;
}
} 
add_filter('get_comments_number', 'comment_count', 0);

// *************************************************

//**************************************************
/*
 * Estimate time required to read the article
 *
 * @return string
 */
function asns_estimated_reading_time() {

	$post = get_post();

	$words = str_word_count( strip_tags( $post->post_content ) );
	$minutes = floor( $words / 120 );
	$seconds = floor( $words % 120 / ( 120 / 60 ) );

	if ( 1 <= $minutes ) {
		$estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : 's');
	} else {
		$estimated_time = $seconds . ' second' . ($seconds == 1 ? '' : 's');
	}

	return $estimated_time;

}

//**************************************************

/*
 * Add featured image as background image to post navigation elements.
 * @see wp_add_inline_style()
 */
/*
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
*/
//**************************************************
/*
 * Display descriptions in main navigation.
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.

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
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */

function asns_search_form_modify( $html ) {

	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );

}

add_filter( 'get_search_form', 'asns_search_form_modify' );


//************************************************
//Exclude Pages from Search Results

function SearchFilter($query) {
if ($query->is_search) {
$query->set('post_type', 'post');
}
return $query;
}

add_filter('pre_get_posts','SearchFilter');


//***************************************************
//Change Admin logo

function custom_admin_logo() {
  echo '<style type="text/css">
          #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon::before { content: url('. get_stylesheet_directory_uri() .'../../asns-internal/img/asns-11.png) !important; }
  		  #wp-admin-bar-wp-logo {left: 0;right: 0;text-align: center;width: 4%;}
        </style>';
}
add_action('admin_head', 'custom_admin_logo');

//**************************************************
// create a more versatile author page & add additional fields to the author profile
//if you want to delete fields just 4 ex add :  unset($contactmethods['aim']);

function add_contactmethods( $contactmethods ) {
// Add Twitter
$contactmethods['twitter'] = 'Twitter';
//add Facebook
$contactmethods['facebook'] = 'Facebook';

return $contactmethods;
}
add_filter('user_contactmethods','add_contactmethods',10,1);


//**************************************************


/*
 * JavaScript Detection.
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */

function asns_javascript_detection() {

	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";

}

// add_action( 'wp_head', 'asns_javascript_detection', 0 );



/*******************************************/
// Call the google CDN version of jQuery for the frontend
// Make sure you use this with wp_enqueue_script('jquery'); in your header
function asns_jquery_enqueue() {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js", false, null);
	wp_enqueue_script('jquery');
}
// if ( !is_admin() && !current_user_can('publish_posts') ) :
 add_action("wp_enqueue_scripts", "asns_jquery_enqueue");
// endif;

//**************************************************
/*
 * Enqueue scripts and styles.
 */

function asns_internal_scripts() {

if (is_home() || is_front_page() ) {

//wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css' ); // Inside a parent theme
wp_enqueue_style( 'fontawsome', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css", false, '', 'all' ); // Inside a parent theme

wp_enqueue_style( 'insider-style', get_template_directory_uri() . '/css/asns-internal.css' ); // Inside a parent theme

//wp_enqueue_style( 'animate', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css", false, '', 'all' ); // Inside a parent theme

//wp_enqueue_style( 'loading', get_template_directory_uri() . '/css/loading.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'v-menu', get_template_directory_uri() . '/css/v-menu.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'wave', get_template_directory_uri() . '/css/wave.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'switch-button', get_template_directory_uri() . '/css/switch-button.css', false, '1.0', 'all' ); // Inside a parent theme
//wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'bootstrap', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css", false, '', 'all' ); // Inside a parent theme



/*********************/

wp_register_script('jqui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/ui/1.12.0/jquery-ui.min.js", false, null);
wp_enqueue_script('jqui');

wp_register_script('bootjs', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", false, null);
wp_enqueue_script('bootjs');

wp_register_script( 'snap.svg-min', get_template_directory_uri() . '/js/snap.svg-min.js',array(), '1.1', true );
wp_enqueue_script( 'snap.svg-min');

wp_register_script( 'socialcircle', get_template_directory_uri() . '/js/socialCircle.js',array(), '1.1', true );
wp_enqueue_script( 'socialcircle');

wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.js',array(), '1.1', false );
wp_enqueue_script( 'modernizr');

wp_register_script( 'classie', get_template_directory_uri() . '/js/classie.js',array(), '1.1', false );
wp_enqueue_script( 'classie');

wp_register_script( 'jquery.easing.min', get_template_directory_uri() . '/js/jquery.easing.min.js',array('jquery'), '1.1', true );
wp_enqueue_script( 'jquery.easing.min');

// wp_register_script( 'mainLoader', get_template_directory_uri() . '/js/mainLoader.js',array(), '1.1', true );
// wp_enqueue_script( 'mainLoader');

wp_register_script( 'mainWave', get_template_directory_uri() . '/js/mainWave.js',array(), '1.1', true );
wp_enqueue_script( 'mainWave');


wp_register_script( 'jquery.newsTicker.min', get_template_directory_uri() . '/js/jquery.newsTicker.min.js',array(), '1.1', true );
wp_enqueue_script( 'jquery.newsTicker.min');

wp_register_script( 'jquery.nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js',array('jquery'), '1.1', true );
wp_enqueue_script( 'jquery.nicescroll');

wp_register_script( 'asns', get_template_directory_uri() . '/js/asns.js',array('jquery'), '1.1', true );
wp_enqueue_script( 'asns');

//wp_register_script( 'typewriter', get_template_directory_uri() . '/js/typewriter.js',array(), '1.1', true );
//wp_enqueue_script( 'typewriter');
}


if (is_single() || is_page() ) {

wp_enqueue_style( 'norm', get_template_directory_uri() . '/css/article-intro-css/normalize.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'fa', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css", false, '', 'all' ); // Inside a parent theme
wp_enqueue_style( 'bs', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css", false, '', 'all' ); // Inside a parent theme
wp_enqueue_style( 'demo', get_template_directory_uri() . '/css/article-intro-css/demo.css', false, '1.0', 'all' ); // Inside a parent theme
wp_enqueue_style( 'component', get_template_directory_uri() . '/css/article-intro-css/component.css', false, '1.0', 'all' ); // Inside a parent theme

wp_deregister_script('jquery');
wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js", false, null);
wp_enqueue_script('jquery');

wp_register_script('jq-ui', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/ui/1.11.4/jquery-ui.js", false, null);
wp_enqueue_script('jq-ui');

wp_register_script('bsjs', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js", false, null);
wp_enqueue_script('bsjs');

wp_register_script( 'jq.nicescroll', get_template_directory_uri() . '/js/jquery.nicescroll.js',array('jquery'), '1.1', false, null);
wp_enqueue_script( 'jq.nicescroll');


}





/*********************************************/
  /* Make site url available to JS scripts */
$site_parameters = array(
    'site_url' => get_site_url(),
    'theme_directory' => get_template_directory_uri()
    );
wp_localize_script( 'asns', 'SiteParameters', $site_parameters );

/**************************/
// enable threaded comments
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


}

add_action( 'wp_enqueue_scripts', 'asns_internal_scripts' );


//*********************************************************

//*********************************************************
//automatically sets the featured image by fetching the first image of the post if no featured image set.

function autoset_featured() {
    // global $post;

    $id = get_the_id();
    $status = get_post_status( $id );
    $already_has_thumb = has_post_thumbnail($id);
        if (!$already_has_thumb && $status == 'publish') {
        $attached_image = get_children( "post_parent=$id&post_type=attachment&post_mime_type=image&numberposts=1" );
            if ($attached_image) {
                foreach ($attached_image as $attachment_id => $attachment) {
                    set_post_thumbnail($id, $attachment_id);
                }
            }
        }
}
add_action('the_post', 'autoset_featured');
add_action('save_post', 'autoset_featured');
add_action('draft_to_publish', 'autoset_featured');
add_action('new_to_publish', 'autoset_featured');
add_action('pending_to_publish', 'autoset_featured');
add_action('future_to_publish', 'autoset_featured');

//**********************************************************
// A better way to add “time ago” to your

function the_time_ago() {
 
	global $post;
 
	$date = get_post_time('G', true, $post);
 
	/**
	 * Where you see 'asns' below, you'd
	 * want to replace those with whatever term
	 * you're using in your theme to provide
	 * support for localization.
	 */ 
 
	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year', 'asns-internal' ), __( 'years', 'asns-internal' ) ),
		array( 60 * 60 * 24 * 30 , __( 'month', 'asns-internal' ), __( 'months', 'asns-internal' ) ),
		array( 60 * 60 * 24 * 7, __( 'week', 'asns-internal' ), __( 'weeks', 'asns-internal' ) ),
		array( 60 * 60 * 24 , __( 'day', 'asns-internal' ), __( 'days', 'asns-internal' ) ),
		array( 60 * 60 , __( 'hour', 'asns-internal' ), __( 'hours', 'asns-internal' ) ),
		array( 60 , __( 'minute', 'asns-internal' ), __( 'minutes', 'asns-internal' ) ),
		array( 1, __( 'second', 'asns-internal' ), __( 'seconds', 'asns-internal' ) )
	);
 
	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}
 
	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );
 
	// Difference in seconds
	$since = $newer_date - $date;
 
	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'asns-internal' );
 
	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */
 
	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];
 
		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}
 
	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];
 
 
	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'asns-internal' );
	}
 
	$output .= __(' ago', 'asns-internal');
 
	return $output;
}

// Filter our the_time_ago() function into WP's the_time() function
//add_filter('the_time', 'asns_time_ago');


//**********************************************************
//Dynamic custom length excpert
//The snippet will return the excerpt with a maximum length of predetermined length 
//and removes everything after the last sentence within the excerpt. 
//So that the excerpt will NOT cut off mid-sentence.
//Here is an example how to use the function in your theme templates. <?php print_excerpt(50); >

// Variable & intelligent excerpt length.
function print_excerpt($length) { // Max excerpt length. Length is set in characters
	global $post;
	$text = $post->post_excerpt;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]>', $text);
	}
	$text = strip_shortcodes($text); // optional, recommended
	$text = strip_tags($text); // use ' $text = strip_tags($text,'&lt;p&gt;&lt;a&gt;'); ' if you want to keep some tags

	$text = substr($text,0,$length);
	$excerpt = reverse_strrchr($text, '.', 1);
	if( $excerpt ) {
		echo apply_filters('the_excerpt',$excerpt);
	} else {
		echo apply_filters('the_excerpt',$text);
	}
}

// Returns the portion of haystack which goes until the last occurrence of needle
function reverse_strrchr($haystack, $needle, $trail) {
    return strrpos($haystack, $needle) ? substr($haystack, 0, strrpos($haystack, $needle) + $trail) : false;
}

//******************************************


//********************************************
/*
 * Filter the "read more" excerpt string link to the post.
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
    return sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
        get_permalink( get_the_ID() ),
        __( 'Read More', 'asns-internal' )
    );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

//***************************************
/*
function child_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Read More</a>';
}
add_filter( 'excerpt_more', 'child_excerpt_more' );
*/

//*****************************************************
// footer copyright

function asns_copyright() {
	global $wpdb;
	$copyright_dates = $wpdb->get_results("
	SELECT
	YEAR(min(post_date_gmt)) AS firstdate,
	YEAR(max(post_date_gmt)) AS lastdate
	FROM
	$wpdb->posts
	WHERE
	post_status = 'publish'
	");
	$output = '';
	if($copyright_dates) {
	$copyright = "&copy; " . $copyright_dates[0]->firstdate;
	if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
	$copyright .= '-' . $copyright_dates[0]->lastdate;
	}
	$output = $copyright;
	}
	return $output;
	}

// *********************************************
//************************************************
// Make a new default gravatar available

function new_default_avatar ( $avatar_defaults ) {
		//Set the URL where the image file for your avatar is located
		$new_avatar_url = esc_attr( get_option('user_pic') );
		echo '<input type="hidden" name="admin-avatar" id="admin-avatar" value="'.$new_avatar_url.'" />';


	$new_avatar_url = 'adminavatar';



		$avatar_defaults[$new_avatar_url]  = 'ADMIN AVATAR';
		return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'new_default_avatar' );

//------------------------------------------------------
// Make a new default gravatar available on the dashboard

function new_global_avatar () {
		//Set the URL where the image file for your avatar is located
		$new_avatar_url = esc_attr( get_option('user_pic') );
		echo '<input type="hidden" name="admin-avatar" id="admin-avatar" value="'.$new_avatar_url.'" />';

}
add_filter( 'admin_head', 'new_global_avatar' );


// *************************************************
// *************************************************
// Customise the footer in admin area
function asns_footer_admin () {
	echo ' '.__('Theme designed and developed by','asns-internal') .' <a class="credit" href="#" target="_blank"><span>アハマド</span> <span>✡</span> サラーハ</a>';
}
add_filter('admin_footer_text', 'asns_footer_admin');


// ********************************************
// ********************************************

function my_login_logo() {

	echo  '<style type="text/css">
				html{background: transparent url('.get_template_directory_uri().'/img/demo-11-bg.jpg) no-repeat fixed center top/cover !important;}
        		
        		body{background:transparent!important;}
        		
        		body.login div#login h1 a {
            		background-image: url('.get_template_directory_uri().'/img/asns-11.png);
            		padding-bottom: 30px;
            		display:none;
        		}

        		#login{padding:1% 0 0!important;}

        		#login #loginform{
        			background: rgba(0,0,0,0.5) url('.get_theme_root_uri().'/asns/img/google.gif) no-repeat 0% 153% / contain !important;
        		}

        		.login #backtoblog a, .login #nav a, .login h1 a{color:#000!important;}

        		.login #backtoblog, .login #nav{display:inline-table;padding: 0 10px !important;}

        		.wp-core-ui .button-primary{
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
//     return esc_html__(bloginfo('name'),'asns-internal');
// }
// add_filter( 'login_headertitle', 'my_login_logo_url_title' );

//*************************************************


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

	$url = get_template_directory_uri();

	echo '<div class="intro-loader">
    			<object src="'.$url.'/fonts/asns-11.svg" id="mysvg2" type="image/svg+xml" data="'.$url.'/fonts/asns-11.svg" width="30%" height="30%"></object>
		  </div>';

	echo '<style type="text/css">
			#wpwrap,#wpbody {opacity:0;}
			</style>';

}
add_action('admin_head','admin_intro' );

// *******************************************

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

//***************************************************
//Remove wlwmanifest-->> This adds a xml-file to your blog
// to enable Windows Live Writer to interact with your WordPress blog.
// If you’re not using it, you should remove it.

remove_action('wp_head', 'wlwmanifest_link');

//**************************************************
/*
 * asns_breadcrumbs function.
 * Edit the standart breadcrumbs to fit the bootstrap style without producing more css
 * @access public
 * @return void
 */
function asns_breadcrumbs() {

	$delimiter = '&raquo;';
	$home = 'Home';
	$before = '<li class="active">';
	$after = '</li>';

	if (!is_home() && !is_front_page() || is_paged()) {

		echo '<ol class="breadcrumb">';

		global $post;
		$homeLink = home_url();
		echo '<li><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

		if (is_category()) {
			global $wp_query;
			$cat_obj = $wp_query->get_queried_object();
			$thisCat = $cat_obj->term_id;
			$thisCat = get_category($thisCat);
			$parentCat = get_category($thisCat->parent);
			if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
			echo $before . single_cat_title('', false) . $after;

		} elseif (is_day()) {
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('d') . $after;

		} elseif (is_month()) {
			echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_time('F') . $after;

		} elseif (is_year()) {
			echo $before . get_the_time('Y') . $after;

		} elseif (is_single() && !is_attachment()) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
				echo $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
				echo $before . get_the_title() . $after;
			}

		} elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif (is_attachment()) {
			$parent = get_post($post->post_parent);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
			echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && !$post->post_parent ) {
			echo $before . get_the_title() . $after;

		} elseif ( is_page() && $post->post_parent ) {
			$parent_id  = $post->post_parent;
			$breadcrumbs = array();
			while ($parent_id) {
				$page = get_page($parent_id);
				$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
				$parent_id  = $page->post_parent;
			}
			$breadcrumbs = array_reverse($breadcrumbs);
			foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $delimiter . ' ';
			echo $before . get_the_title() . $after;

		} elseif ( is_search() ) {
			echo $before . 'Search results for "' . get_search_query() . '"' . $after;

		} elseif ( is_tag() ) {
			echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

		} elseif ( is_author() ) {
			global $author;
			$userdata = get_userdata($author);
			echo $before . 'Articles posted by ' . $userdata->display_name . $after;

		} elseif ( is_404() ) {
			echo $before . 'Error 404' . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo ': ' . __('Page','asns-internal') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ol>';

	}
}


//****************************************************
// Put post thumbnails into rss feed

function asns_feed_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'asns_feed_post_thumbnail');
add_filter('the_content_feed', 'asns_feed_post_thumbnail');

//****************************************************
/* Stop images getting wrapped up in <p> tags when they get dumped out with the_content()
/* for easier theme styling
*/

function asns_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'asns_remove_img_ptags');


//*********************************************************
/*
 * asns Theme Customizer
 * author : Ahmed Salah |
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function asns_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'asns_customize_register' );

/*
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function asns_customize_preview_js() {
	wp_enqueue_script( 'asns_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'asns_customize_preview_js' );


//******************************************
//stop helping the hacker from identifying whether p-w or u-n is right
//by disabling the error message in the login page
//but Not recommended for sites with multiple authors.

add_filter('login_errors',create_function('$a', "return null;"));

//******************************************
// single post share fn 

function asns_sharethis( $content ) {

	if ( is_single() ) {

		$content .= '<div class="single-sharethis"><h4>SHARE THIS</h4>';

		$title = get_the_title();
		$permalink = get_permalink();

		$twitter_handler = ( get_option('twitter_handler') ? '&amp;via='.esc_attr( get_option('twitter_handler') ):'' );

		$twitter = 'https://twitter.com/intent/tweet?text=Hey! read..>> '. $title .'&amp;url='. $permalink . $twitter_handler .'';
		$facebook = 'https://www.facebook.com/sharer/sharer.php?u='.$permalink;
		$googleplus = 'https://plus.google.com/share?url='.$permalink;

		$content .= '<ul>';
		$content .= '<li><a href="'. $twitter .'" rel="nofollow" target="new_tab"><i class="fa fa-twitter"></i></a></li>';
		$content .= '<li><a href="'. $facebook .'" rel="nofollow" target="new_tab"><i class="fa fa-facebook"></i></a></li>';
		$content .= '<li><a href="'. $googleplus .'" rel="nofollow" target="new_tab"><i class="fa fa-google-plus"></i></a></li>';
		$content .= '</ul></div><!-- .single-sharethis -->';

		return $content;

	} else {
		return $content;
	}

}

add_filter('the_content','asns_sharethis' );

//******************************************
// Add this to the functions.php file of your WordPress theme
// It filters the mime types using the upload_mimes filter hook
// Add as many keys/values to the $mimes Array as needed

function my_custom_upload_mimes($mimes = array()) {

	$mimes['svg'] = "svg";

	return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');

//**********************************************

require get_template_directory() . '/inc/asns-admin-functions.php';
require get_template_directory() . '/inc/asns-enqueue-functions.php';
require get_template_directory() . '/inc/theme-support.php';
require get_template_directory() . '/inc/ajax.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/custom-templates/comment-functions.php';
require get_template_directory() . '/inc/asns-adminbar-customization.php';
