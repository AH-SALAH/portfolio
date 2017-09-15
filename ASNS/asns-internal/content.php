

		<!-- ip-container loading-->
<!--
<div id="ip-container" class="ip-container">
			<!-- initial header
             <header class="ip-header">

			<iframe  src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/svg-logo.html" id="mysvg" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/svg-logo.html"  frameborder="0"></iframe>
                
			</header>
		</div> /ip-container -->



<!--/**************************************************************************/-->		


<!--/**************************************************************************/-->		

			<!-- body content begin -->

<div class="container-fluid bg">
	<div class="row">

	<div class="cover">	</div><!--  cover-->
			<img class="ajax-loader" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/clock.svg">
<!--/**************************************************************************/-->		


<div class="left-credit collapse">

	<div class="lc-menu">
		<button type="button" class="l-open" id="l-open"></button>
		<button type="button" class="l-close" id="l-close-x" data-dismiss="l-menu"><span class="lc-x">&times;</span></button> 

		<ul class="l-menu collapse">
			

			<li><a href="#" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php _e( 'about', 'asns-internal' ); ?>" id="l-about" class="l-about">about</a></li>
			<li><a href="#" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php _e( 'location', 'asns-internal' ); ?>" id="l-location" class="l-location">location</a></li>
			<li><a href="#" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php _e( 'notes', 'asns-internal' ); ?>" id="l-note" class="l-note">notes</a></li>
			<li><a href="#" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php $numcomms = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->comments WHERE comment_approved = '1'");
if (0 < $numcomms) {
	$numcomms = number_format($numcomms); 
	printf( esc_html__( 'Latest Comments | %d total', 'asns-internal' ), $numcomms);
} ?>" data-original-title="" id="l-comments" class="l-comments">comments</a></li>

		</ul>
	</div>
	
	<a href="#" title="<?php _e( 'Designed & Developed By アハマド　サラーハ', 'asns-internal' ); ?>" class="lc-name"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/myname-opt.svg" id="myname" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/myname-opt.svg"/><h1 class="para"><?php _e( 'アハマド　サラーハで', 'asns-internal' ); ?><br><?php _e( '設計したと開発したです', 'asns-internal' ); ?> 。</h1></a>


		<div class="cr-cover">
			<embed class="cr-icon" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/copyright.svg"  type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/copyright.svg">
			<button class="menu-button" id="open-button" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php _ex( '© CR','copy right','asns-internal' ); ?>"></button></embed>
		</div>

</div><!--/left-credit -->

<button type="button" class="lc-arrow1"></button>
<button type="button" class="lc-arrow2"></button>

<!--/**************************************************************************/-->		



	<!-- Modal -->

  <div class="modal fade" id="video-modal" role="dialog">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">

        	<button type="button" class="close video-close" id="close-x" data-dismiss="modal"><i class="fa fa-power-off"></i></button>    
            <center><h3 style="color:crimson; text-shadow:1px 1px 4px 4px red; margin:1%;"><?php _e( 'ビデオ', 'asns-internal' ); ?></h3></center>
        <?php 
        		$video_src = esc_attr( get_option('video_src' ) );
        		$video_start = esc_attr( get_option('video_start' ) );
				$video_end = esc_attr( get_option('video_end' ) );

		        $default = 0;
				$start_value = ( $video_start == '' ? $default : $video_start );
				$end_value = ( $video_end == '' ? $default : $video_end );

		?>
		<?php
		if ( !empty($video_src) ) {

			echo  '<iframe 
          			id="yt-video" src="https://www.youtube.com/embed/'.$video_src.'?rel=0&amp;showinfo=0&amp;controls=0&amp;autoplay=0&amp;autohide=1&amp;modestbranding=0&amp;disablekb=1&amp;enablejsapi=0&amp;iv_load_policy=3&amp;loop=0&amp;fs=0&amp;cc_load_policy=0&amp;start='.$start_value.'&amp;end='.$end_value.'>" width="100%" height="97%" style="background:#ff0000;" frameborder="0" allowtransparency="true" allowfullscreen>
          		   </iframe>';		 
          } else {
          	echo '<div style="margin:0 auto;padding: 3%;box-shadow: 0 2px 4px 1px #000000;display:table;color: #b22222;background: #b0c4de url(http://orig13.deviantart.net/09f3/f/2016/099/5/1/8f787a0e33a835b5d3e60acecbde2f96_d74coco_by_cane_the_artist-d9yd0em.gif) no-repeat right center/contain;height: 100%;width: 100%;">
		          	<h1 style="text-align:center;">'.__('NO VIDEOS FOR NOW','asns-internal').'!</h1><br><br>
		          	<span class="glyphicon glyphicon-play-circle" style="font-size:40px;display:table;margin:0 auto;color: #b22222;"></span>
	          	</div>';
          }

		?>
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->
<!--/**************************************************************************/-->		


	<!-- Modal -->

  <div class="modal fade" id="general-modal" role="dialog">
	<div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
        	    <button class="modal-shut" id="modal-shut" data-dismiss="modal"></button>
					<img class="ajax-loader" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/clock.svg">
            <div class="inai-koto"><?php _e( 'loading', 'asns-internal' ); ?>...</div>
			
        </div>
      </div>
    </div>
  </div>

<!-- Modal -->

<!--/**************************************************************************/-->		



<section class="main-content">

<!-- 				<div class="tv">
		  			<div class="screen mute" id="tv"></div>
				</div>
 -->
	<section class="container">
		<div class="row">

			<div id="logo"><object src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/asns-11.svg" id="mysvg2" type="image/svg+xml" data="<?php $get_logo = esc_attr( get_option('logo') ); print $get_logo; ?>"></object></div>

<!--/****************************************/-->		

		<ul class="cbp-vimenu">

			<li ><a href="#" data-toggle="popover" data-trigger="hover" data-content="**<?php _e( '二つのクリックを', 'asns-internal' ); ?>" data-placement="right" title="<?php _e( 'double click me', 'asns-internal' ); ?>" id="menu-logo navbar-toggle" class="menu-logo navbar-toggle"></a></li>
			
			<span class="menu-icons collapse" >

			<li class="folder-menu"><a href="#" id="icon-menu" class="icon-menu" title="menu">Menu</a>
				<ul class="nav navbar-nav nav-pills collapse">
				<?php $page1 = get_page_by_title('about');
					  $page2 = get_page_by_title('map');	
				wp_list_pages('sort_column=menu_order&depth=1&title_li=&exclude='.$page1->ID.','.$page2->ID); ?>
				<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<!--<div id="primary-sidebar" class="primary-sidebar widget-area-1" role="complementary">-->

				<?php //dynamic_sidebar( 'sidebar-1' ); ?>

					<?php //endif; ?> 	

				</ul>
			</li>

				<span class="remain-icons" >
			<li>
			<a href="#" id="icon-search" class="icon-search" title="search">Search</a>
			<?php get_search_form(); ?>
			</li>


		<!-- Example for active item:
			<li class="cbp-vicurrent"><a href="#" class="icon-pencil">Pencil</a></li>
		-->

			<li><a href="#" id="icon-sound" class="icon-sound" title="sound">Sound</a>

				<ul class="sound collapse">
		<?php		
			$audio_src = esc_attr( get_option('audio_src' ) );
			if ( !empty($audio_src) ) {

        		echo	'<button type="button" class="sound-close" id="close-x" data-dismiss="sound">&times;</button> 
					<li>
					<iframe class="audio" width="100%" height="auto" style="box-shadow:1px 0 60px 4px maroon;-webkit-box-shadow:1px 0 60px 4px maroon;-moz-box-shadow:1px 0 60px 4px maroon;" scrolling="no" frameborder="no" src="<?php print $audio_src;?>&amp;color=00aabb&amp;auto_play=false&amp;hide_related=true&amp;sharing=true&amp;show_comments=false&amp;show_user=false&amp;show_reposts=false"></iframe>
					</li>';
				}
		?>
				</ul>
			</li>

			<li><a href="#" id="icon-video" class="icon-video" title="video">Video</a></li>
			<li><a href="#" id="icon-images" class="icon-images" title="<?php _e('僕','asns-internal') ?>" style="background:url('<?php $get_picture = esc_attr( get_option('user_pic') ); print $get_picture; ?>'); background-size:cover; border-radius: 40% 40% 50% 50%; -webkit-transform: rotate(0deg);-moz-transform: rotate(0deg);-ms-transform: rotate(0deg);-o-transform: rotate(0deg);transform: rotate(0deg);">Images</a></li>
			<!--<li><a href="#" id="icon-pencil" class="icon-pencil">Pencil</a></li>-->

				</span><!-- /cbp-vimenu -->
			</span><!-- /cbp-vimenu -->
		</ul><!-- /cbp-vimenu -->

<!--/***********************************************/-->		

		<div class="upper-content-wrapper">
				<div class="upper-content">
				<?php get_template_part('inc/custom-templates/custom-template-page','asns-internal' ); ?>


				</div>
		</div>
				<button class="down-toggle-btn"><i id="down-toggle-btn" class="fa fa-chevron-down"></i></button>
				<button class="up-toggle-btn"><i id="up-toggle-btn" class="fa fa-chevron-up"></i></button>

<!-- /************************************************ -->

		<div class="content-wrapper">

			<div class="content-left-wrapper col-xs-12 col-sm-5 col-md-5 collapse">
				<svg id="cl-close" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
					<path d="M24 3.752l-4.423-3.752-7.771 9.039-7.647-9.008-4.159 4.278c2.285 2.885 5.284 5.903 8.362 8.708l-8.165 9.447 1.343 1.487c1.978-1.335 5.981-4.373 10.205-7.958 4.304 3.67 8.306 6.663 10.229 8.006l1.449-1.278-8.254-9.724c3.287-2.973 6.584-6.354 8.831-9.245z"/>
				</svg>
				<div id="content-left" class="content-left">
				<?php  asns_recent_comments(); ?>
				<?php  //get_template_part('comments','asns' ); ?>
				</div>
			</div>

			<div class="content-right col-xs-12 col-sm-6 col-md-6">
				<div id="nt-example2-container">
					<ul id="nt-example2" style="height: 60px; overflow: hidden;">

					<?php //Query 5 recent published post in descending order
					$args = query_posts(array( 'showposts' => '5', 'order' => 'DESC','post_status' => 'publish' ));
					$recent_posts = wp_get_recent_posts( $args ); ?>
					<?php //$post_id = 35; ?>
					<?php //$limit = 4 ?>
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>

						<li data-infos=""  style="margin-top: 0px;">
							<i class="fa fa-fw state fa-play"></i>

 								<h1>
  									<a id="image-a" href="<?php echo esc_html( get_the_permalink() ); ?>">
  										<?php 
										//query_posts('category_name=latest&showposts=10');
										if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
										 the_post_thumbnail(); 
										}
										?>
 									</a>
								</h1>


					<?php 
						$avtr = get_avatar( get_the_author_meta('email'), '45' );
						$get_picture = esc_attr( get_option('user_pic') );

						if ( ( strpos("x".$avtr, 'adminavatar') == false) ) {
							echo $avtr;
						}else{
							echo '<img src="'.$get_picture.'" width="45" height="45" style="margin: 0 0 0 40px !important;border: 3px solid #d4003c;border-radius: 50%;display: inline !important;min-width: 40px !important;position: relative !important;transition: all 0.3s ease-out 0s;"/>';
						}

					?>

					<?php
					//$post_id = 35;
					//$queried_post = get_post($post_id);
					// $title = $queried_post->post_title;
					// $title = the_title();
					// $title = get_the_permalink();

					//echo $queried_post->post_content;
					?>
					<a href="<?php echo esc_html( get_the_permalink() ); ?>"><?php esc_html( the_title() ); ?>
					<?php
					//$post_id = 35;
					// $queried_post = get_post($post_id);
					// $title = $queried_post->post_title;
					//$post_url = get_permalink($post_id);
					// echo $title;
					//echo $queried_post->post_content;
					?></a>

					<section><?php
						//$post_id = 35;
						//$queried_post = get_post($post_id);
						// $content = $queried_post->post_excerpt;
						// $content = apply_filters('the_content', $content);
						// $content = str_replace(']]>', ']]&gt;', $content);
						// $content = the_excerpt();
						if ( has_excerpt() ) {
						 the_excerpt(); 
						}else{
							if ( function_exists('print_excerpt') ) {
								 print_excerpt(300);
							}
						}
						?>
						<a href="<?php echo esc_html( get_the_permalink() ); ?>" rel="read more..読む続き"　title="<?php _e('read more..読む続き','asns-internal') ?>"><?php _e('more...「続く」','asns-internal') ?></a>
					</section>		

					<span class="hour"><?php 
						# For posts & pages #
						//echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago';
						# For comments #
						//echo human_time_diff(get_comment_time('U'), current_time('timestamp')) . ' ago'; 

						// Change to the date after a certain time
						$time_difference = current_time('timestamp') - get_the_time('U');
						if($time_difference < 86400) {
						    //here goes the code from one of the sample above
						    echo '<div id="break-div1"> &raquo; ';
						    echo human_time_diff(get_the_time( 'U' ), current_time( 'timestamp' ) ) . ' '.__( 'ago', 'asns-internal' ) .' ';
						    echo "</div>";
						    echo '<div id="break-div2"> &raquo; ';
						    echo the_time( 'F-j-Y' );
						    echo "</div>";
						} else {
						    echo '<div id="break-div1"> &raquo; ';
							echo the_time_ago(); 
						    echo "</div>";
						    echo '<div id="break-div2"> &raquo; ';
						    the_modified_time( 'F-j-Y' ); //the_modified_time('g:i a');
						    echo " (modi)</div>";
						}
						?></span>
												<!--Cras sagittis nulla sit amet feugiat pulvinar.--> 
														</li>
					<?php endwhile; ?>
					<?php endif; ?>
					</ul>

					<div id="nt-example2-infos-container" style="display: block;">
							<div id="nt-example2-infos-triangle"></div>
						<div id="nt-example2-infos" class="row">
							<div class="col-xs-4 centered">
								<div class="image"></div>
								<div class="infos-hour"></div>
								<i id="nt-example2-prev" class="fa fa-arrow-left"></i>
								<i id="nt-example2-next" class="fa fa-arrow-right"></i>
							</div>
							<div class="col-xs-8">
								<div class="infos-text"></div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /content-right -->
		</div><!-- /content-wrapper -->
	</div><!-- /row -->
</section><!-- /container -->



<!-- /**************************************************************************/ -->		


<div class="marquee-content">		
		<div class="marquee-sibling">
			<svg id="pic-frame" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="87%" viewBox="0 0 100 100">

				<path d="M.703.703h98.994v98.794H.703z" fill="#fdf5e6" stroke="#EB9600" stroke-linecap="Square" stroke-linejoin="Miter"/>
				<!--<?php //$image_attributes = wp_get_attachment_image_src( $attachment_id = 10 );
//if ( $image_attributes ) : ?> -->
				<image width="84%" height="84%" xlink:href="<?php $get_picture = esc_attr( get_option('user_pic') ); print $get_picture; ?>"></image>
<!-- <?php //endif; ?> -->
			</svg>
			<span id="date_time"></span>
		</div>
	<div class="marquee-container">
		<div class="marquee-1">
			<span id="marquee-close" class="marquee-close">
				<svg id="xmarky" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 24 24">

				<path d="M20.197 2.837l.867.867-8.21 8.291 8.308 8.202-.866.867-8.292-8.21-8.23 8.311-.84-.84 8.213-8.32-8.312-8.231.84-.84 8.319 8.212 8.203-8.309zm-.009-2.837l-8.212 8.318-8.31-8.204-3.666 3.667 8.321 8.24-8.207 8.313 3.667 3.666 8.237-8.318 8.285 8.204 3.697-3.698-8.315-8.209 8.201-8.282-3.698-3.697z"/>
				</svg>
			</span>
			<ul class="marquee-content-items">
<?php //Query 5 recent published post in descending order
$args = query_posts(array( 'showposts' => '5', 'order' => 'DESC','post_status' => 'publish' ));
$recent_posts = wp_get_recent_posts( $args );?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<li><a href="<?php echo esc_html( get_the_permalink() ); ?>"><?php print_excerpt(100); ?></a></li>

<?php endwhile; ?>
<?php endif; ?>

			</ul>
		</div>
	</div>
</div>
<!--
<div class="text" style="text-align:center;margin:0 auto;position:absolute;top:70%;left:20%;color:white;"><span class="typewriter"> ay haga keda negarab</span></div> -->

<!-- /**************************************************************************/ -->		


</section><!-- main-content -->


<!--/**************************************************************************/-->		





	<div class="map-container">
		<section class="map"><?php _e( 'loading', 'asns-internal' ); ?>...</section>
			<button type="button" class="shut" id="shut" data-dismiss="map-container"></button>
	</div>

<!--/**************************************************************************/-->		


<div class="about-circle-div">

	<svg id="about-circle"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100%" height="100%" viewBox="0 0 500 400">

		<defs>
		
			<clipPath id="circlepath" clipPathUnits="userSpaceOnuse">
            	<circle stroke="#000000" stroke-miterlimit="10" cx="125" cy="100" r="95"/>
            	<!-- more circles... -->
        	</clipPath>

        	<style type="text/css">

        		.about-circle-div image {

					-webkit-clip-path:url(#circlepath);
					clip-path:url(#circlepath);

					}	

        	</style>

		</defs>

 		<g  transform="translate(0,-652.36218)">

  			<path class="about-circle" stroke-linejoin="round" 
  			d="m385.36,199.61c0,83.002-68.839,150.29-153.76,150.29-84.918,0-153.76-67.287-153.76-150.29,0-83.002,68.839-150.29,153.76-150.29,84.918,0,153.76,67.287,153.76,150.29z" 
  			stroke-dashoffset="0" transform="matrix(1.1161308,0,0,1.1418878,-8.5880251,624.42897)" stroke="#c8b7d0" stroke-linecap="round" stroke-miterlimit="4" stroke-dasharray="15.94421868, 10" stroke-width="6" fill="indigo"/>

 		</g>

	<!--	<text class="ac-h3" y="120" x="130"  fill="oldlace" font-size="26px">some about me texts
			<tspan y="150" x="150" fill="black">and any thing else</tspan>
			<tspan y="180" x="100" fill="black">and another any thing else</tspan>
		</text>-->

		<foreignObject x="130" y="100" width="250" height="200"
      		requiredExtensions="http://www.w3.org/1999/xhtml">
    			<div id="about-post" xmlns="http://www.w3.org/1999/xhtml"><?php
//$post_id = 35;
$page = get_page_by_title ('about');
$queried_post = get_post($page);
$content = $queried_post->post_content;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]&gt;', $content);
echo $content;
?><!--some about me texts and any thing else,and another any thing else...some about me texts and any thing else,and another any thing else--></div>
  		</foreignObject>

<!--		<text class="ac-h4" y="120" x="130"  fill="oldlace" font-size="26px">some about me texts
			<tspan y="150" x="150" fill="black">and any thing else</tspan>
			<tspan y="180" x="100" fill="black">and another any h4 else</tspan>
		</text>-->

		<image width="50%" height="50%" xlink:href="<?php $get_picture = esc_attr( get_option('user_pic') ); print $get_picture; ?>"></image>

	</svg>

	<!--	<object src="fonts/about-circle.svg" id="about-circle-obj" type="image/svg+xml" data="fonts/about-circle.svg"></object>-->
</div>

<!--/**************************************************************************/-->		


<div class="playcard-note">
	
	<object src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/playcard-onna.svg" id="svg-onna" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/playcard-onna.svg"></object>

		
	<!-- content -->

	<div id="nt-example1-container" class="backnote">
		<i id="nt-example1-prev" class="fa fa-arrow-up"></i>
		<ul id="nt-example1">

<?php //Query 5 recent published post in descending order
$args = query_posts(array( 'showposts' => '5', 'order' => 'DESC','post_status' => 'publish' ));
$recent_posts = wp_get_recent_posts( $args );?>
<?php //$post_id = 35; ?>
<?php //$limit = 4 ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); //$counter++; ?>
<?php //if ( $counter < $limit + 1 ): ?>
<?php //$post_id = $args[$counter-1]; ?>
<?php //$queried_post = get_post($post_id); ?>
<?php //$title = get_permalink($args); ?>
<?php //$title = $queried_post; ?>
<?php //echo $title; 
//if ( has_post_thumbnail($args) ) { // check if the post has a Post Thumbnail assigned to it.
    //echo get_the_post_thumbnail(); 
//} ?>
			<li><a href="<?php echo esc_html( get_permalink() ); ?>" data-toggle="popover" data-placement="right" data-trigger="hover" data-content="<?php echo esc_html( the_title() ); ?>">
			<?php 
	if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
	    echo get_the_post_thumbnail(); 
	} ?></a></li>

<?php //endif; ?>
<?php endwhile; ?>
<?php endif; ?>

		</ul>
		<i id="nt-example1-next" class="fa fa-arrow-down"></i>
	</div>

</div><!-- /playcard-note -->


<!-- /**************************************************************************/ -->		
