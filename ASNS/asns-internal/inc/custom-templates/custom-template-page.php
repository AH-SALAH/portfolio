<?php
/*
 * The template for displaying custom-template-page
 *
 * Template Name: custom-template-page
 *
 * @author: Ahmed Salah |
 */

get_header(); ?>

<style type="text/css">

	body,#primary{
		overflow: auto!important;
	}
    #star{
    background: #f5fffa none repeat scroll 0 0;
    border: 1px solid;
    border-radius: 50%;
    color: #0000ff;
    margin: 0 50%;
    padding: 3px;
    position: relative;
    text-align: center;
    top: -11.5px;
    opacity: 0;
    -webkit-transition: all 0.2s ease-out;
    -moz-transition: all 0.2s ease-out;
    -o-transition: all 0.2s ease-out;
    transition: all 0.2s ease-out;
    }
    .archive-contents:hover #star{
    opacity: 1;
    }   
    #star:hover{
    background: #0076CB;
    color: #fff;
    }

    </style>


<section id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container-fluid" style="margin:0;padding:0;">
			<div class="custom-template-contents-wrapper w1">
		<!--	<a href="<?php echo home_url(); ?>" class="home glyphicon glyphicon-home fa-2x"></a>
        		<div id="sa-chi" style="float:right;padding:1%;"><?php //get_search_form(); ?></div>
		-->
			<?php if ( have_posts() ) : ?>

				<?php echo '<div class="page-limit" data-page="/'. asns_check_paged() .'">'; ?>

					<?php while ( have_posts() ) : the_post();
					$args = array(
				        //'tag__in' => $sendTags,
				        //'post__not_in' => array($post->ID),
				        //'showposts' => 5,
				        'posts_per_page' => 4,
				        //'ignor_sticky_posts' => 1,
				        'orderby' => 'rand',
	    				); ?>

						<?php get_template_part( 'inc/custom-templates/custom-template-page-content' ); ?>

					<?php endwhile; ?>

				<?php echo '</div>'; ?><!-- .page-limit -->

						       <?php /* if (function_exists("wp_pagination")) {
						            wp_pagination();
						        	};
								*/?>

								<?php // If no content, include the "No posts found" template. ?>
								<?php else : 			
						 		 	get_template_part( 'no-results', 'custom-template' );
							 	?>

						<?php endif; ?>

			</div><!-- /contents-wrapper w1-->
			
					<div class="container-fluid custom-template-contents-wrapper w2">
						<div class="asns-load-more text-center">
							<a class="btn btn-lg btn-default load-more-btn text-center" data-page="<?php echo asns_check_paged(1); ?>" data-url="<?php echo admin_url( 'admin-ajax.php' ); ?>">
							<span><i class="fa fa-magnet load-icon"></i></span>
							<span class="load-more-text"><?php _e( 'load more', 'asns-internal' ); ?>...</span>
							</a>
						</div>
					</div><!-- /container-fluid w2-->

		</div><!-- /container-fluid -->
	</main><!-- .site-main -->
</section><!-- .content-area -->

<?php //get_footer(); ?>
