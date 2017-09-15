<?php
/*
 * The template for displaying custom-blog-page
 *
 * Template Name: offff
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @author: Ahmed Salah |
 */

get_header(); ?>

<style type="text/css">
	@import url("<?php echo esc_url( get_template_directory_uri() ); ?>/css/article-intro-css/component.css");

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
			<div class="container-fluid">
				<a href="<?php echo esc_url( home_url() ); ?>" class="home glyphicon glyphicon-home fa-2x"></a>
            		<div id="sa-chi" style="float:right;padding:1%;"><?php get_search_form(); ?></div>

		<?php if ( have_posts() ) : ?>

			<!--<header class="page-header">
			</header> .page-header -->
	
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
//$args = array(
        //'tag__in' => $sendTags,
        //'post__not_in' => array($post->ID),
        //'showposts' => 5,
        //'posts_per_page' => 4,
        //'ignor_sticky_posts' => 1,
        //'orderby' => 'rand',
   // );
//Query 5 recent published post in descending order
$args = query_posts(array( 'showposts' => '5', 'order' => 'DESC','post_status' => 'publish' ));
$recent_posts = wp_get_recent_posts( $args ); 
	?>

			<?php 
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );  ?>
	<div class="custom-contents">
	<?php the_title( sprintf( '<h2 class="entry-title">&#3572; <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-summary">
			<div class="pic-date-wrapper">
				<div id="pic-date">
					<a href="<?php echo esc_url(get_permalink($post->ID)) ?>">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail('thumbnail');
					} ?></a>
				<time><span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php the_time('M j, Y'); ?></time>
				</div>
			</div>
		<?php if (has_excerpt()) {
	 		the_excerpt();
	 		}else{
	 	 	print_excerpt(300); 
	 	 	} ?>
	 	 	<a href="<?php echo get_the_permalink($post_id); ?>" rel="read more..読む続き"　title="read more..読む続き">more...「続く」</a>
		</div><!-- /entry-summery -->
	<hr style="margin-bottom:0;border: 1px solid #4682b4;"><span id="star">✡</span>   
			
		<?php /* End the loop. */
			endwhile; ?>

       <?php if (function_exists("wp_pagination")) {
            wp_pagination();
        };
?>
	<?php		// Previous/next page navigation.
		/*	the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
				'next_text'          => __( 'Next page', 'twentyfifteen' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
			) ); */

		// If no content, include the "No posts found" template. ?>
	<?php else : ?>
 		<?php get_template_part( 'no-results', 'custom-template' ); ?>

	<?php endif; ?>
</div><!-- /contents -->
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php //get_footer(); ?>
