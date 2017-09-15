<?php
/*
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
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
				<a href="<?php  echo home_url(); ?>" class="home glyphicon glyphicon-home fa-2x"></a>
            		<div id="sa-chi" style="float:right;padding:1%;"><?php get_search_form(); ?></div>

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							*/
							the_post();
							printf( __( 'Author: %s', 'asns-internal' ), '<span class="vcard">' . get_the_author() . '</span>' );
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'asns-internal' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'asns-internal' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'asns-internal' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'asns-internal' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'asns-internal');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'asns-internal' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'asns-internal' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'asns-internal' );

						else :
							_e( 'Archives', 'asns-internal' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>			
			</header><!-- .page-header -->
	
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
$args = array(
        //'tag__in' => $sendTags,
        //'post__not_in' => array($post->ID),
        //'showposts' => 5,
        'posts_per_page' => 4,
        //'ignor_sticky_posts' => 1,
        'orderby' => 'rand',
    );
	?>		<?php 
				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				//get_template_part( 'content', get_post_format() );  ?>
	<div class="archive-contents">
	<?php the_title( sprintf( '<h2 class="entry-title">&#3572; <a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<div class="entry-summary">
			<div class="pic-date-wrapper">
				<div id="pic-date">
					<a href="<?php echo esc_url(get_permalink($post->ID)) ?>">
					<?php if (has_post_thumbnail()) {
						the_post_thumbnail('thumbnail');
					} ?></a>
				<time><span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php the_time( esc_html( 'M j, Y' ) ); ?></time>
				</div>
			</div>
		<?php if (has_excerpt()) {
	 		the_excerpt();
	 		}else{
	 	 	print_excerpt(300); 
	 	 	} ?>
	 	 	<a href="<?php echo esc_html( get_the_permalink($post_id), 'asns-internal' );  ?>" rel="read more..読む続き"　title="read more..読む続き"><?php _e( 'more...「続く」', 'asns-internal' );  ?></a>
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
				'prev_text'          => __( 'Previous page', 'asns-internal' ),
				'next_text'          => __( 'Next page', 'asns-internal' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'asns-internal' ) . ' </span>',
			) ); */

		// If no content, include the "No posts found" template. ?>
	<?php else : ?>
 		<?php get_template_part( 'no-results', 'archive' ); ?>

	<?php endif; ?>
</div><!-- /contents -->
		</main><!-- .site-main -->
	</section><!-- .content-area -->

<?php //get_footer(); ?>
