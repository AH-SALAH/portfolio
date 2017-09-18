<?php

/*

 * The template for displaying the header

 * @package WordPress

 */

if (isset($_GET['ckattempt']) || isset($_GET['i']))
{
        header("Location: " . rtrim($_SERVER['PHP_SELF'], '?'));
}

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="text/html"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1,user-scalable=no">
	<meta name="HandheldFriendly" content="true">
	<meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black"/>
    <meta name="format-detection" content="telephone=no"/>
   	<title><?php wp_title(); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ): ?>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php endif; ?>
	<meta name="description" content="next generation of web design" />
	<meta name="keywords" content="personal,design,web,web design,designs,site,website,slick,slick web design,new,unique,fun,fresh design," />
	<meta name="author" content="AS" />
	<link rel="shortcut icon" href="<?php $options = esc_attr( get_option('fav_icon') ); print $options; ?>">     

		<!--<link rel="stylesheet" type="text/css" href="css/split-intro-demo.css" />
		<link rel="stylesheet" type="text/css" href="css/split-intro.css" />-->
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300,200' rel='stylesheet' type='text/css'>
<!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css" type="text/css">-->

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script> -->
 <?php wp_head(); ?>
<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 -->
<!--<script type="text/javascript" src="<?php //echo esc_url( get_template_directory_uri() ); ?>/js/jquery.nicescroll.js"></script>
-->

	</head>

	<body <?php body_class(); ?>>


<div class="loader">
		<object src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/wave-loader.svg" id="intro-svg" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/wave-loader.svg"></object>
</div>

<!--/**************************************************************************/-->		




