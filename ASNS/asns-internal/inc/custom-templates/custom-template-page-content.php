<?php
/*
 * The template for displaying custom-template-page-content
 * 
 * @author: Ahmed Salah |
 */
?>

				<div class="custom-template-contents">
					<?php the_title( sprintf( '<h2 class="entry-title">&#3572; <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<div id="meta-t">
						<span id="meta-t1">
							<?php  _ex('by ','+ a user name','asns-internal'); ?><strong><?php
							 
								$avtr = get_avatar( get_the_author_meta('email'), '45' );
								$get_picture = esc_attr( get_option('user_pic') );

								if ( ( strpos("x".$avtr, 'adminavatar') == false) ) {
									echo $avtr;
								}else{
									echo '<img src="'.$get_picture.'" width="45" height="45" style="border: 3px solid #d4003c;border-radius: 50%;display: inline !important;min-width: 40px !important;position: relative !important;transition: all 0.3s ease-out 0s;"/>';
								}

							 ?>
							<?php esc_html( the_author() ); ?></strong> &#8212; <?php _ex('Filed in','+ a category','asns-internal'); ?> &raquo;<strong><?php esc_html( the_category() ); ?> |</strong>
						</span>

						<span id="meta-t2">
							<span id="metadeta-j">
								
								<b><?php _e( 'メタデータ', 'asns-internal' ); ?></b></span> : <?php _ex('on','+ a time format','asns-internal'); ?> <strong><span class="glyphicon glyphicon-time"></span> 
								<?php echo the_time(); ?> | </strong>

								<?php _e( 'about', 'asns-internal' ); ?>: <strong> 
								<?php 
									# For posts & pages #
									// echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ago';
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
									};
								?> |</strong>
									 <?php _ex( 'with:','+ post views count', 'asns-internal' ); ?> 
									 <strong><?php setPostViews(get_the_ID()); ?><?php echo getPostViews( get_the_ID() ); ?> <i class="fa fa-eye" aria-hidden="true"></i> |</strong>
									  <?php echo _x( 'EST', 'estimated reading time', 'asns-internal' ); ?> <span class="glyphicon glyphicon-hourglass"></span>: <strong><?php if (function_exists('asns_estimated_reading_time')){ echo asns_estimated_reading_time(); } ?></strong>
				  		</span><!-- #meta-t2 -->
					</div><!-- #meta-t -->

							<div class="entry-summary">
								<div class="pic-date-wrapper">
									<div id="pic-date">
										<a href="<?php echo esc_url(get_permalink($post->ID)); ?>">
										<?php if (has_post_thumbnail()) {
											the_post_thumbnail('thumbnail');
										} ?></a>
										<time><span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php the_time( esc_html( 'M j, Y' ) ); ?></time>
									</div>
								</div>


									<?php if (has_excerpt()) {
								 		the_excerpt();
								 		//$postlink = esc_url( get_the_permalink() );
								 		echo '<a href="'.esc_url( get_the_permalink() ).'" rel="read more..読む続き"　title="'.__('read more..読む続き','asns-internal').'">
								 			'.__('more...「続く」','asns-internal').'</a>';

								 			// echo '<a href="'.$postId.'" rel="read more..読む続き"　title="read more..読む続き">more...「続く」</a>'; 
								 		}else{
								 	 	print_excerpt(300);
								 		echo '<a href="'.esc_url( get_the_permalink() ).'" rel="read more..読む続き"　title="'.__('read more..読む続き','asns-internal').'">
								 			'.__('more...「続く」','asns-internal').'</a>';

								 	 		// echo '<a href="'.$postId.'" rel="read more..読む続き"　title="read more..読む続き">more...「続く」</a>'; 
								 	 	} ?>


							</div><!-- /entry-summery -->

						<!--<hr style="margin-bottom:0;border: 1px solid #4682b4;"><span id="star">✡</span>-->   
				
				</div><!-- /custom-template-contents -->
