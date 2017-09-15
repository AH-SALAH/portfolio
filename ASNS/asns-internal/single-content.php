<?php 
/*
	===========================
	single-content template
	===========================
*/
 ?>

<article class="container-fluid s-main-wrapper">
	<div class="hidari col-xs-12 col-sm-8 col-md-8">
		<div class="hidari-content">
			<?php if(have_posts()) : ?> 			      
			<?php while(have_posts()) : the_post(); ?>
	            <?php if(function_exists('asns_breadcrumbs')) asns_breadcrumbs(); ?>
					    <?php the_content( get_post_format() ); ?> 
						<?php custom_wp_link_pages(); ?>
<!--  -->
			<?php endwhile; ?>     
			<?php endif; ?>                        

	       <div class="post-tags"><span class="glyphicon glyphicon-tags"></span>&nbsp; 
	       <?php

	       	$title = the_post_thumbnail( array(40,40) );
			$tags = wp_get_post_tags($post->ID);
				 if ($tags) {
				   foreach($tags as $tag) {

				   	$term = get_term_link( $tag, 'post_tag' );

				       // echo '<p>' . $title . 'on <a href="'.get_term_link( $tag, 'post_tag' ).'" title="' . sprintf( __( 'View all posts in %s','asns-internal' ), $tag->name ) . '" ' . '>' . $tag->name.'</a>
				       //  	& has ' . $tag->count . ' post(s). </p> ';

				    $link = '<p>' . $title . sprintf( wp_kses( _x( 'on <a href="%s" title="'.sprintf( _x( 'View all posts in %s','tag name', 'asns-internal'),$tag->name).'" >' . $tag->name.'</a>
				     & has ' . $tag->count . ' post(s). </p>' ,'tag name', 'asns-internal' ), array(  'a' => array( 'href' => array() ) ) ), esc_url( $term ) );
					echo $link ."\n";

					// printf( esc_html( _n( '& has %d post.', '& has %d posts.', $tag->count, 'asns-internal'  ) ), $tag->count );
				   }
				 }else{
				 	the_tags();
				 }
				 

			?>

			</div>

			<?php
			$original_post = $post;
			$tags = wp_get_post_tags($post->ID);
			if($tags)
			{
			    echo '<h4 class="related-posts-title">| '. _x( 'You may interested in','related posts title', 'asns-internal' ) .' |</h4>';
			      echo '<div class="related-posts-content-container">';
			        echo '<button id="related-posts-lb">&#8826;</button>';
					   echo '<div class="related-posts-content-wrapper">';
					      echo '<div class="related-posts-content">';
			    $sendTags = array();
			    foreach($tags as $tag)
			        $sendTags[] = $tag->term_id;
			         
			    $args = array(
			        'tag__in' => $sendTags,
			        'post__not_in' => array($post->ID),
			        'showposts' => 7,
			        'ignor_sticky_posts' => 1,
			        'orderby' => 'rand',
			    );
			     
			    $queryDb = new WP_Query($args);
			    if($queryDb->have_posts())
			    {
			        		echo '<ul>';
			        while ($queryDb->have_posts()) { $queryDb->the_post();
			?>
			            <li><a id="img-link" href="<?php esc_url( the_permalink() ); ?>" rel="related-posts" title="<?php the_title_attribute(); ?>"><?php if ( has_post_thumbnail() ) { the_post_thumbnail('thumbnail'); } ?></a>
			            	<div class="related-subcontent">
			            		<div class="inner">
									<h4><a id="data-link" href="<?php esc_url( the_permalink() ); ?>" rel="related-posts" title="<?php the_title(); ?>"><?php esc_html( the_title() ); ?></a></h4>
									<time><span class="glyphicon glyphicon-time"></span> <?php the_time( esc_html( 'M j, Y' ) ); ?> </time>
									<br> <span><?php setPostViews(get_the_ID()); ?><?php printf( esc_html( ' %d ' ), getPostViews( get_the_ID()) ); ?> <i class="fa fa-eye" aria-hidden="true"></i></span>
								</div>
							</div>
						</li>
			<?php  }
			        
			        		echo '</ul>';
			       		echo '</div>';
			     	 echo '</div>';
			       echo '<button id="related-posts-rb">&#8827;</button>';
			    echo '</div>';

			    }
			}
			$post = $original_post;
			wp_reset_query();
			?>
<br>

					<img src="http://api.qrserver.com/v1/create-qr-code/?size=500x500&amp;data=<?php esc_url( the_permalink() ); ?>" alt="QR Code for <?php  the_title_attribute(); ?>" style="width:50px;height:50px;"/>
				
				</div><!-- .hidari-content -->

				<?php if ( comments_open() ) { ?>

				<div class="cmnt">
    				<div class="cmnt-content">
    				     <?php comments_template(); ?>
        			</div>
				</div>

				<?php } ?>
					
			</div><!-- .hidari -->

			<div class="migi col-xs-12 col-sm-4 col-md-4">
					<div class="migi-content">
					<?php get_sidebar(); ?>
					</div>
			</div><!-- .migi -->
</article>

