<?php 
/*
	===========================
	single-header template
	===========================
*/
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
<!-- 		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
		<title><?php wp_title(); ?></title>
		<meta name="description" content="next generation of web design" />
		<meta name="keywords" content="personal,design,web,web design,designs,site,website,slick,slick web design,new,unique,fun,fresh design," />
		<meta name="author" content="AS" />
 -->		<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/../ASNS/img/asns-11.png">     

<!--          <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/demo.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/component.css" />
 --> 
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<?php wp_head(); ?>

<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
--> <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

		<!--[if IE]>
  		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
</head>

<body <?php post_class('demo-2'); ?> >

		<div id="scrollbar">
			<div id="scrollbar-span"></div>
		</div>

		<div  id="container" class="container intro-effect-fadeout">
			<!-- Top Navigation -->
			<nav id="asns-top" class="asns-top clearfix" data-spy="affix" data-offset-top="500">
			  <div class="container-fluid">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle mini-menu-button" data-toggle="collapse" data-target="#myNavbar">
			        <span class="glyphicon glyphicon-menu-hamburger"></span>
			      </button>
			      <!--<a class="navbar-brand" href="#">WebSiteName</a>-->
			    </div>
			    <div class="collapse navbar-collapse nav-div" id="myNavbar">
			      <ul id="nav-ul" class="nav-ul nav navbar-nav">
					<li><i class="fa fa-arrow-left"></i><?php esc_html( previous_post_link('%link') ); ?><span></span></li>
					<li><?php esc_html( next_post_link('%link') ); ?><i class="fa fa-arrow-right"></i></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo home_url(); ?>" class="home glyphicon glyphicon-home fa-2x"></a></li>
			      </ul>
			    </div>
			  </div>
			</nav>

			<img class="ajax-loader" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/clock.svg">
			
			<header class="header">
				<div class="bg-img">                    
				<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					    the_post_thumbnail();
					} 
				?>

				<div class="title">
					<h1><?php  esc_html( the_title() );  ?></h1>
					<!--<p class="subline">Inspiration for Article Intro Effects</p>-->
					<p><strong><?php 
					function avatar_display(){

						$avtr = get_avatar( get_the_author_meta('email'), 45 );
						$get_picture = esc_attr( get_option('user_pic') );

						if ( ( strpos("x".$avtr, 'adminavatar') == false) ) {
							echo $avtr;
						}else{
							echo '<img src="'.$get_picture.'" alt="avatar" width="45" height="45" style="border: 3px solid #d4003c;border-radius: 50%;display: inline !important;min-width: 40px !important;position: relative !important;transition: all 0.3s ease-out 0s;"/>';
						}
					}
					
					?><?php _ex('by ','+ a user name','asns-internal'); avatar_display(); esc_html( the_author() );?> </strong> &#8212; 

					 <?php _ex('Filed in','+ a category','asns-internal'); ?> &raquo;  <?php esc_html( the_category() ); ?>  <br>

					 <div id="date"> 
					 <?php _ex('on','+ a time format','asns-internal'); ?> <strong><span class="glyphicon glyphicon-time"></span> <?php esc_html( the_time() ); ?> | 
					 
					 <?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
							<?php echo date_i18n( the_date() ); ?> 
						<?php endwhile; ?>     
						<?php endif; ?> 
						                       
							| </strong>

					 <?php 
					 function timing(){
					# For posts & pages #
					//echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
					# For comments #
					//echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ago'; 

					// Change to the date after a certain time
					$time_difference = current_time('timestamp') - get_the_time('U');
					if($time_difference < 86400) {
					    //here goes the code from one of the sample above
					    printf( _x(' %s ago','like : 2 months ago','asns-internal') , human_time_diff( get_the_time( esc_html( 'U') ) , current_time( esc_html( 'timestamp') ) ) );

					} else {
					    //the_time();
						echo esc_html( the_time_ago() );
					}
				}
					?>
					<?php echo __('about: ','asns-internal'); ?><strong><?php timing(); ?></strong> 

					<strong> |</strong><br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
					<?php _ex( 'with:','+ post views count', 'asns-internal' ); ?> <strong><?php setPostViews(get_the_ID()) ?><?php echo getPostViews( get_the_ID() ); ?>
					 <i class="fa fa-eye" aria-hidden="true"></i> & <?php $count = ''; echo esc_html( comment_count($count) ); ?> <span class="glyphicon glyphicon-comment"></span> |</strong> <?php echo _x( 'EST', 'estimated reading time', 'asns-internal' ); ?> <span class="glyphicon glyphicon-hourglass"></span>: <strong><?php if (function_exists('asns_estimated_reading_time')){ echo asns_estimated_reading_time(); } ?></strong></div></p>
					</div>
				</div>
			</header>

				<button class="trigger" data-info="読む続き"><span><i class="fa fa-arrow-down fa-1x"></i><?php _e( 'Trigger', 'asns-internal' ); ?></span></button>
