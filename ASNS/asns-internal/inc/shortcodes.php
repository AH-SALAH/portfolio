<?php

//======================
/*
 * 	@ package asns
 *	short codes options
 */
//======================

//tooltip short code fn

function asns_tooltip( $atts, $content = null ) {
	//get the attributes
	//shortcode_atts( $pairs, $atts, $shortcode );

	$atts = shortcode_atts( 
		array(
		'placement' => 'top',
		'title' => '',
		),
		$atts,
		'tooltip'
	);

	$title = ( $atts['title'] == '' ? $content : $atts['title'] );

	//return HTML
	return '<span class="asns-tooltip" data-toggle="tooltip" data-placement="'. $atts['placement'] .'" title="'. $title .'">'. $content .'</span>';
}

add_shortcode( 'tooltip', 'asns_tooltip' );

//========================================================
//popover shortcode fn

function asns_popover( $atts, $content = null ) {
	//get the attributes
	$atts = shortcode_atts( 
		array(
		'placement' => 'top',
		'title' => '',
		'data-content' => '',
		'data-trigger' => ''
		),
		$atts,
		'popover'
	);

	$title = ( $atts['title'] == '' ? '' : $atts['title'] );
	$dataContent = ( $atts['data-content'] == '' ? $content : $atts['data-content'] );
	$trigger = ( $atts['data-trigger'] == '' ? 'click' : $atts['data-trigger'] );

	//return HTML
	return '<span class="asns-popover" data-toggle="popover" data-trigger="'. $trigger .'" data-placement="'. $atts['placement'] .'" title="'. $title .'" data-content="'. $dataContent .'">'. $content .'</span>';
}

add_shortcode( 'popover', 'asns_popover' );
