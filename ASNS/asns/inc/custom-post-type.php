<?php

// /*
// @package asns theme
// 	======================================
// 		CUSTOM POST TYPE
// 	======================================
// */


// 	/* contact CPT */

// function asns_contact_custom_post_type() {
// 	$labels = array(
// 		'name' 				=>	'Messages',
// 		'singular_name' 	=>	'Message',
// 		'menu_name'			=>	'Messages',
// 		'name_admin_bar'	=>	'Message'
// 		);

// 	$args = array(
// 		'labels'			=>	$labels,
// 		'show_ui'			=>	true,
// 		'show_in_menu'		=>	true,
// 		'capability_type'	=>	'post',
// 		'hierarchical'		=>	false,
// 		'menu_position'		=>	26,
// 		'menu_icon'			=>	'dashicons-email-alt',
// 		'supports'			=>	array('title','editor','author')
// 		);

// 	register_post_type( 'asns-contact', $args );
// }


// 	$contact = esc_attr( get_option('activate_contact') );
// 	if ( @$contact == 1 ) {
// 		add_action( 'init', 'asns_contact_custom_post_type');

// 		add_filter( 'manage_asns-contact_posts_columns', 'asns_contact_columns' );
// 		add_action( 'manage_asns-contact_posts_custom_column', 'asns_contact_custom_column', 10 , 2 );

// 		add_action( 'add_meta_boxes', 'asns_contact_add_meta_box' );
// 		add_action( 'save_post', 'asns_save_contact_email_data' );
// 	}


// function asns_contact_columns( $columns ) {
// 	$newColumns = array();
// 	$newColumns['title']	= 'From';
// 	$newColumns['message']	= 'Message';
// 	$newColumns['email']	= 'Email';
// 	$newColumns['date']		= 'Date';
// 	return $newColumns;
// }


// function asns_contact_custom_column( $column,$post_id ) {
// 	switch ($column) {
// 		case 'message':
// 			echo get_the_excerpt();
// 			break;
		
// 		case 'email':
// 			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
// 			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
// 			break;
// 	}
// }

// /***********************/
// /* Contact Meta Boxes */

// function asns_contact_add_meta_box() {
// 	add_meta_box( 'contact_email', 'User Email', 'asns_contact_email', 'asns-contact', 'side', 'high');
// }

// function asns_contact_email( $post ) {
// 	wp_nonce_field( 'asns_save_contact_email_data', 'asns_contact_email_meta_box_nonce');

// 	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );

// 	echo '<label for="asns_contact_email_field">User Email Address : </label>';
// 	echo '<input type="email" id="asns_contact_email_field" name="asns_contact_email_field" value="'. esc_attr( $value ) .'" size="28" />';
// }

// function asns_save_contact_email_data( $post_id ) {

// 	if ( !isset( $_POST['asns_contact_email_meta_box_nonce'] ) ) {
// 		return;
// 	}

// 	if ( !wp_verify_nonce( $_POST['asns_contact_email_meta_box_nonce'] , 'asns_save_contact_email_data' ) ) {
// 		return;
// 	}

// 	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
// 		return;
// 	}

// 	if ( !current_user_can('edit_post', $post_id ) ) {
// 		return;
// 	}

// 	if ( !isset( $_POST['asns_contact_email_field'] ) ) {
// 		return;
// 	}

// 	$my_data = sanitize_text_field( $_POST['asns_contact_email_field'] );

// 	update_post_meta( $post_id, '_contact_email_value_key', $my_data );

// }

