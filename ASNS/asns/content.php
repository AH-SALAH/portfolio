<!--/**************************************************************************/-->		









		<div class="container-fluid">

			<div id="splitlayout" class="splitlayout">

								

			<div class="mail-wrapper">

				<div class="mail-inner">

					<?php get_template_part('contact','page' ); ?>

					<button class="mail-close-button" type="button" data-dismiss="mail-wrapper">&times;</button>

				</div>

			</div>

				<div class="intro">

				<?php 

					$leftColor = esc_attr( get_option('left_color_picker_handler' ) );

					$get_left_bg_img = esc_attr( get_option('left_bg_handler') );

					$left_video_src = esc_attr( get_option('left_video_src' ) ); 

					$left_video_start = esc_attr( get_option('left_video_start' ) );

					$left_video_end = esc_attr( get_option('left_video_end' ) );

					

						$default = 0;

						$left_start_value = ( $left_video_start == '' ? $default : $left_video_start );

						$left_end_value = ( $left_video_end == '' ? $default : $left_video_end );

				?>

					<div class="side side-left" style="background-color:<?php print $leftColor; ?>;outline-color: 1px solid <?php print $leftColor; ?>;background-image:url(<?php print $get_left_bg_img; ?>);">

					<div class="w-toggle left">

						<a type="button" class="expand"><i class="fa fa-expand" aria-hidden="true"></i></a>

						<a type="button" class="compress"><i class="fa fa-compress" aria-hidden="true"></i></a>

					</div>

						<?php if ( !empty($left_video_src) ) :



							echo '<div id="left-video-bg" class="left-video-bg">

		          				<div 

		          					id="left-yt-video" class="left-yt-video" src="https://www.youtube.com/embed/'.$left_video_src.'?rel=0&amp;showinfo=0&amp;controls=0&amp;autoplay=1&amp;autohide=1&amp;modestbranding=0&amp;disablekb=1&amp;enablejsapi=0&amp;iv_load_policy=3&amp;loop=1&amp;fs=0&amp;cc_load_policy=0&amp;start=20&amp;end=50" width="100%" height="100%"  frameborder="0" allowtransparency="true" allowfullscreen>

		          				</div>

							</div>';

							          				

							echo '<input id="left-video-src" type="hidden" name="left_video_src"  value="'.$left_video_src.'" placeholder="youtube video source url" size="15" />

								  <input id="left-start-value" type="hidden" name="left_start_value"  value="'.$left_start_value.'" placeholder="youtube video source url" size="15" />

								  <input id="left-end-value" type="hidden" name="left_end_value"  value="'.$left_end_value.'" placeholder="youtube video source url" size="15" />';

						endif; ?>

						<div class="intro-content">

							<div class="profile"><img src="<?php $get_left_picture = esc_attr( get_option('left_user_pic') ); print $get_left_picture; ?>" alt="profile1"></div>

								<h1><span class="1st" title="<?php _e( 'Ahmed Salah', 'asns');  ?>"><?php	$leftFirstName = esc_attr( get_option('left_first_name' ) ); print $leftFirstName; ?>&nbsp;<span class="2nd" style="color:#626262;"><?php $leftLastName = esc_attr( get_option('left_last_name' ) ); print $leftLastName; ?></span></span> 

								<span class="3rd" ><?php $leftDescription = esc_attr( get_option('left_user_description' ) ); print $leftDescription; ?></span>

								</h1>

								<?php 
									$leftFacebook = esc_attr( get_option('left_facebook_handler' ) );
									$leftTwitter = esc_attr( get_option('left_twitter_handler' ) );
									$leftGithub = esc_attr( get_option('left_github_handler' ) );
								
									echo '<ul class="social-connect sc-left">';

											if (!empty($leftFacebook)) {
												echo '<li><a href="http://www.facebook.com/'.$leftFacebook.'" class="fb" title="facebook" target="_blank"></a></li>';
											}
											if (!empty($leftTwitter)) {
												echo '<li><a href="http://twitter.com/'.$leftTwitter.'" class="tw" title="twitter" target="_blank"></a></li>';
											}
											if (!empty($leftGithub)) {
												echo '<li><a href="http://github.com/'.$leftGithub.'" class="gh" title="github" target="_blank"></a></li>';
											}
												echo '<li><a href="#" class="mail ml" title="mail"></a></li>';

									echo '</ul>';

								?>
						</div>

						<div class="overlay"></div>

					</div>

					<?php 

						$rightColor = esc_attr( get_option('right_color_picker_handler' ) );

						$get_right_bg_img = esc_attr( get_option('right_bg_handler') );

						$right_video_src = esc_attr( get_option('right_video_src' ) );

						$right_video_start = esc_attr( get_option('right_video_start' ) );

						$right_video_end = esc_attr( get_option('right_video_end' ) );



							$default = 0;

							$right_start_value = ( $right_video_start == '' ? $default : $right_video_start );

							$right_end_value = ( $right_video_end == '' ? $default : $right_video_end );

					 ?>

					<div class="side side-right" style="background-color:<?php print $rightColor; ?>;outline-color: <?php print $rightColor; ?>;background-image:url(<?php print $get_right_bg_img; ?>);">

					<div class="w-toggle right">

						<a type="button" class="expand"><i class="fa fa-expand" aria-hidden="true"></i></a>

						<a type="button" class="compress"><i class="fa fa-compress" aria-hidden="true"></i></a>

					</div>

					<?php if ( !empty( $right_video_src ) ) :

							echo '<div id="right-video-bg" class="right-video-bg">

		          				<div 

		          					id="right-yt-video" class="right-yt-video" src="https://www.youtube.com/embed/'.$right_video_src.'?rel=0&amp;showinfo=0&amp;controls=0&amp;autoplay=1&amp;autohide=1&amp;modestbranding=0&amp;disablekb=1&amp;enablejsapi=0&amp;iv_load_policy=3&amp;loop=1&amp;fs=0&amp;cc_load_policy=0&amp;start=20&amp;end=50" width="100%" height="100%"  frameborder="0" allowtransparency="true" allowfullscreen>

		          				</div>

							</div>';

							          				

							echo '<input id="right-video-src" type="hidden" name="right_video_src"  value="'.$right_video_src.'" placeholder="youtube video source url" size="15" />

								  <input id="right-start-value" type="hidden" name="right_start_value"  value="'.$right_start_value.'" placeholder="youtube video source url" size="15" />

								  <input id="right-end-value" type="hidden" name="right_end_value"  value="'.$right_end_value.'" placeholder="youtube video source url" size="15" />';

						endif; ?>

										<div class="intro-content">

							<div class="profile"><img src="<?php $get_right_picture = esc_attr( get_option('right_user_pic') ); print $get_right_picture; ?>" alt="profile2"></div>

							<h1><span class="1st" title="<?php _e( 'Nehal Salah', 'asns'); ?>"><?php $rightFirstName = esc_attr( get_option('right_first_name' ) ); print $rightFirstName; ?>&nbsp;<span class="2nd" style="color:#626262;"><?php $rightLastName = esc_attr( get_option('right_last_name' ) ); print $rightLastName; ?></span></span> 

								<span><?php $rightDescription = esc_attr( get_option('right_user_description' ) ); print $rightDescription; ?></span>

							</h1>

							<?php 
								$rightFacebook = esc_attr( get_option('right_facebook_handler' ) );
								$rightTwitter = esc_attr( get_option('right_twitter_handler' ) );
								$rightGithub = esc_attr( get_option('right_github_handler' ) );

								echo '<ul class="social-connect sc-left">';
								
										if (!empty($rightFacebook)) {
											echo '<li><a href="http://www.facebook.com/'.$rightFacebook.'" class="fb" title="facebook" target="_blank"></a></li>';
										}
										if (!empty($rightTwitter)) {
											echo '<li><a href="http://twitter.com/'.$rightTwitter.'" class="tw" title="twitter" target="_blank"></a></li>';
										}
										if (!empty($rightGithub)) {
											echo '<li><a href="http://github.com/'.$rightGithub.'" class="gh" title="github" target="_blank"></a></li>';
										}		
											echo '<li><a href="#" class="mail ml" title="mail"></a></li>';

								echo '</ul>';
							?>
								
								<object class="nehal-svg" src="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/nehal.svg" type="image/svg+xml" data="<?php echo esc_url( get_template_directory_uri() ); ?>/fonts/nehal.svg"></object>

						</div>

						<div class="overlay"></div>

					</div>

				</div><!-- /intro -->

				<div class="page page-right">

					<div class="page-inner">

						<section>

							 <iframe src="http://as.iblogger.org/internal"  marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0" scrolling="auto" style="border: 0; position:absolute; top:0; left:0; right:0; bottom:0; width:100%; height:100%; margin:0; padding:0; overflow:hidden;"></iframe> 

						</section>

					</div><!-- /page-inner -->

				</div><!-- /page-right -->

				<div class="page page-left">

					<div class="page-inner">

						<section>
						<h1 id="rap-title" style="display:table;margin:15% auto;text-align:center;-webkit-transition:all 0.5s ease-in;transition:all 0.5s ease-in;">Raping... (* Q ב)</h1>
						<script type="text/javascript">
							setTimeout(function(){ //some naughty Jerk
								var ttl = document.getElementById('rap-title');
									ttl.style.opacity 	= '0';
									setTimeout(function(){ttl.style.opacity = '1';},1000);
									setInterval(function(){
										ttl.style.opacity = '0';
										setTimeout(function(){ttl.style.opacity = '1';},500);
										ttl.childNodes[0].style.left = '-15px';
										ttl.childNodes[0].style.transition 	= 'left 0.1s ease-out';
										ttl.childNodes[0].style.transform 	= 'skew(-45deg,0)';
										setTimeout(function(){
											ttl.childNodes[0].style.left = '10px'; 
										},1000);
										setTimeout(function(){
											ttl.childNodes[0].style.left = '0';
											ttl.childNodes[0].style.transition = 'left 0.7s ease-out';
											ttl.childNodes[0].style.transform 	= 'skew(0,0)';
										},1300);
									},6000);
								ttl.innerHTML = '<span style="position:relative;left:0;transition:left 0.7s ease-out;">StilL</span> Raping... (* Q ב)';
							},45000);
						</script>
							<!--<iframe src=""  marginwidth="0" marginheight="0" frameborder="0" vspace="0" hspace="0" scrolling="auto" style="border: 0; position:absolute; top:0; left:0; right:0; bottom:0; width:100%; height:100%; margin:0; padding:0; overflow:hidden;"></iframe> 

						--></section>

					</div><!-- /page-inner -->

				</div><!-- /page-left -->

				<a href="#" class="back back-right" title="<?php echo __('back to intro','asns'); ?>">&#10144;</a>

				<a href="#" class="back back-left" title="<?php echo __('back to intro','asns'); ?>">&#10144;</a>

			</div><!-- /splitlayout -->

		</div><!-- /container -->





<!-- /**************************************************************************/ -->		

