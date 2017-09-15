<?php

//======================
/*
 * 	@ package asns
 *	ajax functions
 */
//======================


add_action('wp_ajax_nopriv_load_more_btn','load_more_btn' );
add_action('wp_ajax_load_more_btn','load_more_btn' );


function load_more_btn(){

	$paged = $_POST["page"]+1;

	$query = new WP_Query( array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'paged' => $paged
		) );

		 if ( $query->have_posts() ) : 

		 	echo '<div class="page-limit" data-page="/page/'.$paged.'">';

				while ( $query->have_posts() ) : $query->the_post();
				$args = array(
			        //'tag__in' => $sendTags,
			        //'post__not_in' => array($post->ID),
			        //'showposts' => 5,
			        'posts_per_page' => 4,
			        //'ignor_sticky_posts' => 1,
			        'orderby' => 'rand',
    				); 

					 get_template_part( 'inc/custom-templates/custom-template-page-content' );

				endwhile;
		
			echo '</div>';

			else:
				echo 0;

		endif; 

	wp_reset_postdata();

	die();
}


function asns_check_paged( $num = null ){

	$output = '';

	if( is_paged() ){ $output = 'page/' . get_query_var( 'paged' ); }

	if ( $num == 1 ) {
		$paged = ( get_query_var('paged' ) == 0 ? 1 : get_query_var('paged' ) );
		return $paged;
	} else {
		return $output;
	}

}