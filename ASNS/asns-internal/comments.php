<?php

/*

 * The template for displaying Comments.
 * @author: Ahmed Salah |
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
    return;
}
?>



	

    <div id="comments" class="comments-area">

    <?php // You can start editing here -- including this comment! ?>

    <?php if ( have_comments() ) : ?>
        <h4 class="comments-title">
            <?php
                printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'asns-internal' ),
                    number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
            ?>
        </h4>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-above" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'asns-internal' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'asns-internal' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'asns-internal' ) ); ?></div>
        </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>

        <li class="comment-list">
            <?php
                /* Loop through and list the comments. Tell wp_list_comments()
                 * to use asns-internal_comment() to format the comments.
                 * If you want to override this in a child theme, then you can
                 * define asns-internal_comment() and that will be used instead.
                 */
                wp_list_comments( array( 'callback' => 'asns_comment','avatar_size' => 60 ) );
            ?>
        </li><!-- .comment-list -->

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav id="comment-nav-below" class="comment-navigation" role="navigation">
            <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'asns-internal' ); ?></h1>
            <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'asns-internal' ) ); ?></div>
            <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'asns-internal' ) ); ?></div>
        </nav><!-- #comment-nav-below -->
        <?php endif; // check for comment navigation ?>

    <?php endif; // have_comments() ?>

    <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
    ?>
        <p class="no-comments"><?php _e( 'Comments are closed.', 'asns-internal' ); ?></p>
    <?php endif; ?>
    
    <?php
    // Arguments to edit the comment form
    $commenter = wp_get_current_commenter();
    $req = esc_attr( get_option( 'require_name_email' ) );
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $required_text = sprintf( ' ' . __('Required fields are marked %s','asns-internal'), '<span class="required">*</span>' );    
    $args = array(
        'id_form'           => 'commentform',
        'id_submit'         => 'submit',
        'title_reply'       => __( 'Please Post Your Comments & Reviews <br> <h5>Glad you have chosen to leave a comment</h5>','asns-internal'),
        'title_reply_to'    => __( 'Leave a Reply to %s','asns-internal' ),
        'cancel_reply_link' => __( 'Cancel Reply','asns-internal' ),
        'label_submit'      => __( '  &#1161;  Comment','asns-internal' ),
    
        'comment_field' =>  '<p class="comment-form-comment"><label for="comment"><span class="glyphicon glyphicon-comment" title="' . _x( 'comment', 'noun','asns-internal' ) .'"></span>
        </label><textarea id="comment" class="form-control" name="comment" placeholder="'.__('Express your thoughts, idea or write a feedback by clicking here & start an awesome comment','asns-internal').'..." cols="45" rows="8" aria-required="true">' .
        '</textarea></p>',
    
        'must_log_in' => '<p class="must-log-in">' .
        sprintf(
            __( 'You must be <a href="%s">logged in</a> to post a comment.','asns-internal' ),
            wp_login_url( apply_filters( 'the_permalink', get_permalink() ) ) ) . '</p>',
    
        'logged_in_as' => '<p class="logged-in-as">' .
        sprintf(
            __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>','asns-internal' ),
            admin_url( 'profile.php' ),
            $user_identity,
            wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
        ) . '</p>',

        'comment_notes_before' => '<p class="comment-notes"><h5>' .
        __( 'Please,Do NOT use keywords in the name field.And note that all links are nofollow.','asns-internal').' <br> '.__('Lets have a personal and meaningful conversation.','asns-internal' ).' </h5>' . ( $req ? $required_text : '' ) .
        '</p>',
    
        'comment_notes_after' => '<p class="form-allowed-tags">' .
        sprintf(
            __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s','asns-internal' ),
            ' <code style="white-space: normal !important;">' . allowed_tags() . '</code>'
        ) . '</p>',
    
        'fields' => apply_filters( 'comment_form_default_fields', array(
    
                'author' =>
                '<p class="comment-form-author">' .
                '<label for="author"><span class="glyphicon glyphicon-user" title="name"></span></label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="author" class="form-control" name="author" type="text" placeholder="' . __( 'Your Name (No Keywords)', 'asns-internal' ) . '" value="' . esc_attr( $commenter['comment_author'] ) .
                '" size="30"' . $aria_req . ' /></p>',
    
                'email' =>
                '<p class="comment-form-email"><label for="email"><span class="glyphicon glyphicon-envelope" title="email"></span></label> ' .
                ( $req ? '<span class="required">*</span>' : '' ) .
                '<input id="email" class="form-control" name="email" type="text" placeholder="' . __( 'Your email address will not be published ', 'asns-internal' ) . '" value="' . esc_attr(  $commenter['comment_author_email'] ) .
                '" size="30"' . $aria_req . ' /></p>',
    
                'url' =>
                '<p class="comment-form-url"><label for="url"><span class="glyphicon glyphicon-globe" title="'
                .__( 'your site url', 'asns-internal' ).'"></span></label>' .
                '<input id="url" class="form-control" name="url" type="text" placeholder="http://your-site-name.com" value="' . esc_attr( $commenter['comment_author_url'] ) .
                '" size="30" /></p>',

               // 'twitter' => 
               // '<p class="comment-form-twitter"><label for="twitter"><i class="fa fa-twitter-square" title="twitter" aria-hidden="true"></i></label><br>
               // <input type="text" id="twitter" class="form-control" name="twitter" placeholder="'.('Twitter (@username)','asns-internal').'" value="' . $twitter .
               // '" size="30" /></p>'
            )
        ),
    );
    
    comment_form($args); ?>

</div><!-- #comments -->



<!--//***************************************** -->

