<?php /* Template Name: map */ ?>





<?php if(have_posts()) : ?>
<?php while(have_posts()) : the_post(); ?>



<section>



<!DOCTYPE HTML>

<html>

<head>


<!--
<script>

    var themeHasJQuery = !!window.jQuery;

</script>

<script type="text/javascript" src="./assets/js/jquery.js"></script>

<script>

    window._$ = jQuery.noConflict(themeHasJQuery);

</script>
-->




		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php wp_title(); ?></title>
		<meta name="description" content="next generation web design" />
		<meta name="keywords" content="personal,design,web,web design,designs,site,website,slick,slick web design,new,unique,fun,fresh design," />
		<meta name="author" content="A7s" />
        <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/../ASNS/img/asns-11.png">     



<!-- <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/map-css/bootstrap.css" media="screen" />
<link class="" href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,regular,italic,600,600italic,700,700italic,800,800italic|Alfa+Slab+One:regular|Ribeye+Marrow:regular|Sarina:regular&subset=latin' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/map-css/style.css">
<link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome/css/font-awesome.min.css" type="text/css">

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/map-js/script.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/map-js/CloudZoom.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/map-js/bootstrap.min.js"></script>
 -->



</head>



<body>





<!--<a href="<?php echo esc_url( home_url() ); ?>/home" class="home" style="margin: 5%;position: absolute;z-index: 999;"><i class="fa fa-fw fa-home fa-2x" style="color:maroon; float:right;"></i></a>-->



        <div id="content" style="width:100%; height:100%; position:absolute;">
         
            <iframe src="<?php $map_src = esc_attr( get_option('map_src' ) ); print $map_src; ?>" style="border:0;" allowfullscreen="true" frameborder="0" height="100%" width="100%"></iframe>        

          <script>

          panorama = new google.maps.StreetViewPanorama(document.getElementById('pano'), {

    position: svPos,

    heading: parseFloat(svHeading),

    pitch: parseFloat(svPitch),

    addressControlOptions: {

        position: google.maps.ControlPosition.LEFT_TOP

    },

    linksControl: false,

    panControl: true,

    panControlOptions: {

        position: google.maps.ControlPosition.RIGHT_BOTTOM

    },

    zoomControlOptions: {

        style: google.maps.ZoomControlStyle.SMALL,

        position: google.maps.ControlPosition.RIGHT_BOTTOM

    },

    rotateControl: true,

    rotateControlOptions: {

        position: google.maps.ControlPosition.RIGHT_CENTER

    },

    enableCloseButton: false,

    fullScreenControl: false,

    fullScreenControlOptions: {

        position: google.maps.ControlPosition.RIGHT_BOTTOM

    }

});

          </script>

</div>





</body>

</html>







</section>



<?php endwhile; ?>
<?php endif; ?>










