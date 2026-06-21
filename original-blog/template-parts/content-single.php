<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Original Blog
 */

$single_post_title = get_theme_mod( 'original_blog_enable_single_post_title', true );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-page">
		<?php original_blog_post_thumbnail(); ?>
		<div class="page-header-content">
			<div class="entry-cat">
				<?php original_blog_categories_list(); ?>
			</div>
			<?php if ( is_singular() ) : ?>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header><!-- .entry-header -->
				<?php
				if ( 'post' === get_post_type() ) {
					setup_postdata( get_post() );
					?>
					<div class="entry-meta">
						<?php
						original_blog_posted_by();
						original_blog_posted_on();
						?>
					</div><!-- .entry-meta -->
				<?php } ?>
			<?php endif; ?>

			<?php
			if ( has_excerpt() ) {
				the_excerpt();
			}
			?>
		</div>
		<div class="entry-content">
			<?php
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'original-blog' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'original-blog' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<footer class="entry-footer">
			<?php original_blog_entry_footer(); ?>
		</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
