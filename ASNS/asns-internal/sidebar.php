	<?php if ( is_single() && is_active_sidebar( 'single-sidebar' ) ) : ?>
<?php //get_search_form(); ?>
	<div id="primary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'single-sidebar' ); ?>
	</div>

	<?php endif; ?>
