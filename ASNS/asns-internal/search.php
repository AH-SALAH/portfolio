<?php
/*
 * The template for displaying Search Results pages.
 *
 * @author Ahmed Salah | 
 */
?>

<?php //if ($_GET) { ?>
<?php //ini_set('display_errors', 0); ?>

<!doctype html>
<html lang="en-us" >
<head>

<?php //wp_head(); ?>

<?php if (function_exists('get_header')) {
	get_header();
}/*else{
    /* Redirect browser */
 //   header("Location: http://" . $_SERVER['HTTP_HOST'] . "");
    /* Make sure that code below does not get executed when we redirect. */
 //   exit;
//}; ?>

</head>

<body>

		<div class="sa-chi-peiji col-xs-12 col-sm-12 col-md-12">
			<section id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
			
					<?php if ( have_posts() ) : ?>
						<a href="<?php echo esc_url( home_url() ); ?>" class="home glyphicon glyphicon-home fa-2x"></a>
			<div id="sa-chi" style="float:right;padding:1%;"><?php get_search_form(); ?></div>
						<header class="page-header">
							<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'asns-internal' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
			
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<div id="search-content">
			<?php get_template_part( 'content', 'search' ); ?>
							</div><hr>
						<?php endwhile; ?>
			
						<?php  if (function_exists("wp_pagination")) {
						            wp_pagination(); 
						       }; ?>
			
					<?php else : ?>
						<a href="<?php echo esc_url( home_url() ); ?>" class="home glyphicon glyphicon-home fa-2x"></a>
						<?php get_template_part( 'no-results', 'search' ); ?>
			
					<?php endif; ?>
			
					</main><!-- #main -->
				</section><!-- #primary -->
			</div><!-- .col-md-12 -->
			

</body>
</html>

<?php// } ?>


<?php //get_footer(); ?>