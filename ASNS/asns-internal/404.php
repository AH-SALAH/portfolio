<?php/*



    if (!isset($_COOKIE['visited'])) { // no cookie, so probably the first time here

        setcookie ('visited', 'yes', time() + 3600); // set visited cookie



	header( "Location: /wordpress/home" );

        exit(); // always use exit after redirect to prevent further loading of the page

    }

header( "refresh:13;url=/wordpress/home" );
*/
?>



<?php

/*

 * The template for displaying 404 pages (not found)

 * Template Name: 404

 * @package WordPress

 * @subpackage asns

 */

//header( "refresh:11;url=index.php" );

//get_header('home'); ?>



<!DOCTYPE html>

<html lang="en" class="no-js">



<head>

<style>
	@import url("<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/component.css");

html,body{

	background:#000;	

	}

#primary{

	background: #ccc none repeat 0 0;
    color: #000;
    height: auto;
    margin:1% 0 0 -40%;
    padding:1%;
    opacity: 0.5;
    position: absolute;
    width: 35%;
    z-index: 99999;
    box-shadow:1px 0 4px 4px #900;
	overflow: hidden;
	
	-webkit-transition: 1s ease-in-out;
    -moz-transition: 1s ease-in-out;
    -o-transition: 1s ease-in-out;
    transition: 1s ease-in-out;

	}


    

</style>



<script src="http://code.jquery.com/jquery-1.10.2.js"></script>



<script type="text/javascript">

$(document).ready(function(){
	$("#primary").animate({'margin':'1%'},500);
	});

</script>


</head>

<body>


	<div id="primary" class="content-area" >
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title" style="opacity:1;"><?php _e( 'Oops! That page can&rsquo;t be found.', 'asns-internal' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content" style="opacity:1;">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'asns-internal' ); ?></p>

					<div style="cursor:pointer;background:#fff;"><?php get_search_form(); ?></div>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

     <center><iframe width="100%" height="100%" style="margin:0% auto; display:block; position:absolute;" src="https://www.youtube.com/embed/6w7YVU4nHVE?start=0&amp;end=4&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe></center>

</body>
</html>



<?php //get_footer(); ?>