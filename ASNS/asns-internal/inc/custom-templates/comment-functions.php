<?php

//======================
/*
 * 	@ package asns
 *	comment section functions
 */
//======================

//*************************************************

if ( ! function_exists( 'asns_comment' ) ) :
/*
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 */
function asns_comment( $comment, $args, $depth ) {

	$isByAuthor = false;

    	if($comment->comment_author_email == get_the_author_meta('email')) {
        $isByAuthor = true;
    	}

	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'asns-internal' ); ?> <?php comment_author_link(); ?> 
			<?php edit_comment_link( __( 'Edit', 'asns-internal' ), '<span class="edit-link">', '</span>' ); ?>
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body" <?php if($isByAuthor){ echo 'class="author"';} ?> >
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php	
						$avatar = get_avatar( get_the_author_meta('email'), '45' );
						$get_picture = esc_attr( get_option('user_pic') );

					 if ( 0 != $args['avatar_size'] && strpos("x".$avatar, 'adminavatar') == false ) { echo get_avatar( array($comment->comment_author_email, 45 ) , $args['avatar_size'] ); 

						}else{
							echo '<img src="'.$get_picture.'" width="45" height="45" style="margin: 0 0 0 40px !important;border: 3px solid #d4003c;border-radius: 50%;display: inline !important;min-width: 40px !important;position: relative !important;transition: all 0.3s ease-out 0s;"/>';
						}

					?>
						
						<div class="comment-metadata">
						<h3><?php //printf( __( '%s <span class="says">says:</span>', 'asns-internal' ),
					 printf( '<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h3>
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
								<time datetime="<?php comment_time( 'c' ); ?>">
									<span class="glyphicon glyphicon-time"></span> <?php printf(  _x( '%1$s at %2$s', '1: date, 2: time', 'asns-internal' ), get_comment_date(), get_comment_time() ); ?>
								</time>
							</a>
							<?php edit_comment_link( __( 'Edit', 'asns-internal' ), '<span class="edit-link"> | ', '</span>' ); ?>
						</div><!-- .comment-metadata -->

				</div><!-- .comment-author -->


				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'asns-internal' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>

				<div id="reply-link-cover">
				<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">&#10554;',
					'after'     => '</div>',
				) ) );
				?>
				</div>
			</div><!-- .comment-content -->

		</article><!-- .comment-body -->

	<?php
		endif;
	}
	endif; // ends check for asns_comment()

//*************************************************
// add fields to the comment default's fields area.

function my_comment_form_default_fields( $fields ) {

	$commenter = wp_get_current_commenter();

	$fields['email'] .= '<p class="comment-form-twitter"><label for="twitter"><i class="fa fa-twitter-square" title="twitter" aria-hidden="true"></i></label><br>
					        <input type="text" id="twitter" class="form-control" name="twitter" placeholder="'.__('Twitter (username)','asns-internal').'" value="" size="30" /></p>';

	return $fields;
}
add_filter( 'comment_form_default_fields', 'my_comment_form_default_fields' );


// ********************
// Add fields after default fields above the comment box, always visible

function additional_fields() {

  echo '<p class="comment-form-rating">'.
  '<label for="rating">'. __('Rating','asns-internal') . '</label>
  <span class="commentratingbox">';

    //Current rating scale is 1 to 5. If you want the scale to be 1 to 10, then set the value of $i to 10.
    for( $i=1; $i <= 5; $i++ )
    echo '<span class="commentrating"><span class="glyphicon glyphicon-star"><input type="radio" name="rating" id="rating" value="'. $i .'"/>'. $i .'</span></span>';

  echo'</span></p>';

}
add_action( 'comment_form_logged_in_after', 'additional_fields' );
add_action( 'comment_form_after_fields', 'additional_fields' );

//******************
// store the meta data together with the other comment data

function save_comment_meta_data( $comment_id ) {

if ( ( isset( $_POST['twitter'] ) ) && ( $_POST['twitter'] != '') )

	$twitter_field = wp_filter_nohtml_kses($_POST['twitter']);

    add_comment_meta( $comment_id, 'twitter', $twitter_field );


if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '') )

  $rating = wp_filter_nohtml_kses($_POST['rating']);
  
  add_comment_meta( $comment_id, 'rating', $rating );

}
add_action( 'comment_post', 'save_comment_meta_data' );


// **********************
// Add the comment meta (saved earlier) to the comment text
// You can also output the comment meta values directly to the comments template  

function modify_comment( $text ){

  // $plugin_url_path = WP_PLUGIN_URL;

  if( $commentrating = get_comment_meta( get_comment_ID(), 'rating', true ) ) {
    $commentrating = '<p class="comment-rating"><span class="dashicons dashicons-star-filled"></span>'. $commentrating . '<br/> '.sprintf( __('Rating : <strong> %s / 5</strong>','asns-internal'), $commentrating ).' </p>';
    $text = $text . $commentrating;
    return $text;
  } else {
    return $text;
  }
}
add_filter( 'comment_text', 'modify_comment');

// ****************
// Add an edit option to comment editing screen  

function extend_comment_add_meta_box() {
    add_meta_box( 'rating', __( 'Rating','asns-internal' ), 'extend_comment_meta_box', 'comment', 'normal','low' );
    add_meta_box( 'twitter', __( 'twitter','asns-internal' ), 'extend_twitter_comment_meta_box', 'comment', 'normal','high' );
	
}
add_action( 'add_meta_boxes_comment', 'extend_comment_add_meta_box' );

// *********

function extend_comment_meta_box ( $comment ) {

    $rating = get_comment_meta( $comment->comment_ID, 'rating', true );

    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    
    ?>
    
    <p>
        <label for="rating"><?php _e( 'Rating','asns-internal' ); ?></label>
      <span class="commentratingbox">
      
      <?php for( $i=1; $i <= 5; $i++ ) {

        echo '<span class="commentrating"><input type="radio" name="rating" id="rating" value="'. $i .'"';
        
        if ( $rating == $i ) echo ' checked="checked"';
        echo ' />'. $i .' </span>';
        }

      ?>

      </span>
    </p>
    
    <?php
}

// ***************
function extend_twitter_comment_meta_box ( $comment ) {

    $twitter = get_comment_meta( $comment->comment_ID, 'twitter', true );
 //    $twitter = sanitize_text_field( $twitter );
	// $twitter = str_replace('@', '', $twitter);
	// return $twitter;

    wp_nonce_field( 'extend_comment_update', 'extend_comment_update', false );
    
    ?>
    
    <p>
        <label for="twitter"><?php _e( 'twitter','asns-internal' ); ?></label>
        <input type="text" name="twitter" value="<?php echo esc_attr( $twitter ); ?>" class="widefat" />
    </p>
    
    <?php
}



// ***************
// attached to the author name by using the filter get_comment_author_link:

function attach_twitter_to_author_link( $author ) {
    $twitter = get_comment_meta( get_comment_ID(), 'twitter', true );
    if ( $twitter )
        $author .= '<a href="https://twitter.com/'.$twitter.'">'.$twitter.'</a>';
    return $author;
}
add_filter( 'get_comment_author_link', 'attach_twitter_to_author_link' );



// ***************
// Update comment meta data from comment editing screen 


function extend_comment_edit_metafields( $comment_id ) {
    if( ! isset( $_POST['extend_comment_update'] ) || ! wp_verify_nonce( $_POST['extend_comment_update'], 'extend_comment_update' ) ) 
    	return;

  if ( ( isset( $_POST['twitter'] ) ) && ( $_POST['twitter'] != '') ):

  $twitter = wp_filter_nohtml_kses($_POST['twitter']);
  update_comment_meta( $comment_id, 'twitter', $twitter );
  
  else :
  delete_comment_meta( $comment_id, 'twitter');
  
  endif;


  if ( ( isset( $_POST['rating'] ) ) && ( $_POST['rating'] != '') ):

  $rating = wp_filter_nohtml_kses($_POST['rating']);
  update_comment_meta( $comment_id, 'rating', $rating );
  
  else :
  delete_comment_meta( $comment_id, 'rating');
  
  endif;

}

add_action( 'edit_comment', 'extend_comment_edit_metafields' );

//******************
/*
* Add a rel="nofollow" to the comment reply links
* to stop search engines going into these links
*/
function add_nofollow_to_reply_link( $link ) {
    return str_replace( '")\'>', '")\' rel=\'nofollow\'>', $link );
}
add_filter( 'comment_reply_link', 'add_nofollow_to_reply_link' );

//******************
/* 
*stop autolinking URLs in comments
*/
remove_filter('comment_text', 'make_clickable', 9);


//************************************************************