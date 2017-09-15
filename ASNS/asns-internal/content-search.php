<?php
/*
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 *	author: Ahmed Salah |
 */
?>
<section id="content-search">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<div id="pic-date">
				<a href="<?php echo get_permalink($post->ID); ?>">
				<?php if (has_post_thumbnail()) {
					the_post_thumbnail('thumbnail');
				} ?></a>
				<time><span class="glyphicon glyphicon-calendar"></span>&nbsp; <?php the_time( esc_html( 'M j, Y' ) ); ?></time>
			</div>
			<?php if (has_excerpt()) {
		 		the_excerpt();
		 		}else{
		 			print_excerpt(300); 
		 			} ?>
		 			<a href="<?php echo get_the_permalink(); ?>" rel="read more..読む続き"　title="<?php echo __('read more..読む続き','asns-internal'); ?>"><?php echo __('more...「続く」','asns-internal'); ?></a>
		</div><!-- .entry-summary -->

		<?php if ( 'post' == get_post_type() ) : ?>

			<footer class="entry-footer">
				<?php //asns_entry_meta(); ?>
				<?php get_post_meta($post->ID); ?>
				<?php edit_post_link( __( 'Edit', 'asns-internal' ), '<span class="edit-link">', '</span>' ); ?>
			</footer><!-- .entry-footer -->

		<?php else : ?>

			<?php edit_post_link( __( 'Edit', 'asns-internal' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>

		<?php endif; ?>

	</article><!-- #post-## -->

</section>
