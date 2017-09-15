<?php
/*
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @author Ahmed Salah | 
 */
?>
<style type="text/css">
	html,body,.no-results{
		background: transparent;
	}
</style>
<section class="no-results not-found" style="color: #dc143c;">
	<header class="page-header">
		<h1 class="page-title"><?php _e( 'Nothing Found', 'asns-internal' ); ?></h1>
	</header><!-- .page-header -->


	<div class="page-content">
		<?php if ( is_home() || is_single() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'asns-internal' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p style="z-index:1;"><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'asns-internal' ); ?></p>
			<?php get_search_form(); ?>
	<div id="404-video">
    <iframe width="100%" height="100%" style="margin:0% auto; display:block; position:absolute;top:0;left:0;right:0;z-index:-1;" src="https://www.youtube.com/embed/6w7YVU4nHVE?start=0&amp;end=4&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>
	</div>
		<?php else : ?>

			<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'asns-internal' ); ?></p>
			<?php get_search_form(); ?>
	<div id="404-video">
    <iframe width="100%" height="100%" style="margin:0% auto; display:block; position:absolute;top:0;left:0;right:0;z-index:-1;" src="https://www.youtube.com/embed/6w7YVU4nHVE?start=0&amp;end=4&amp;rel=0&amp;controls=0&amp;showinfo=0&amp;autoplay=1" frameborder="0" allowfullscreen></iframe>
    </div>
		<?php endif; ?>

	</div><!-- .page-content -->
</section><!-- .no-results -->
