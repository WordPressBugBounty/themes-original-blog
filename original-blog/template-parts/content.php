<?php
/**
 * Template part for displaying archive posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Original Blog
 */

$excerpt_length = get_theme_mod( 'original_blog_excerpt_length', 35 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="single-card-container list-card">
		<div class="single-card-image">
			<?php original_blog_post_thumbnail(); ?>
		</div>
		<div class="single-card-detail">
			<?php original_blog_categories_list(); ?>
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="card-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;
			?>
			<?php
			if ( 'post' === get_post_type() ) :
				?>
				<div class="card-meta">
						<?php
						original_blog_posted_by();
						original_blog_posted_on();
						?>
					</div>
				<?php endif; ?>
				<div class="post-excerpt">
					<?php
					$content = get_the_content();
					$content = strip_shortcodes( $content );
					$content = preg_replace( '/<img(.*?)alt=[\'"](.*?)[\'"](.*?)>/i', '', $content );
					$content = wp_kses_post( wp_trim_words( $content, $excerpt_length ) );
					?>
					<p><?php echo $content; ?></p>
				</div><!-- post-excerpt -->
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
