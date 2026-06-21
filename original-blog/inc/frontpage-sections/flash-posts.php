<?php
/**
 * Frontpage Flash Posts Section.
 *
 * @package Original Blog
 */

// Flash Posts Section.
$flash_posts_section = get_theme_mod( 'original_blog_flash_posts_section_enable', false );

if ( false === $flash_posts_section ) {
	return;
}

$content_ids              = array();
$flash_posts_content_type = get_theme_mod( 'original_blog_flash_posts_content_type', 'post' );

if ( $flash_posts_content_type === 'post' ) {

	for ( $i = 1; $i <= 5; $i++ ) {
		$content_ids[] = get_theme_mod( 'original_blog_flash_posts_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 5 ),
		'ignore_sticky_posts' => true,
	);

	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'original_blog_flash_posts_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 5 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	$section_title = get_theme_mod( 'original_blog_flash_posts_title', __( 'Flash Posts', 'original-blog' ) );
	?>

	<section id="original_blog_flash_posts_section" class="flash-posts">
		<div class="site-container-width">
			<div class="flash-container-wrap">
				<?php if ( ! empty( $section_title ) ) { ?>
					<div class="flash-posts-title">
						<span><?php echo esc_html( $section_title ); ?></span>
					</div>
				<?php } ?>
				<div class="container-wrap flash-carousel">
					<?php
					while ( $query->have_posts() ) :
						$query->the_post();
						?>
						<div class="flash-carousel-container">
							<div class="single-card-container list-card">
								<div class="single-card-image">
									<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
								</div>
								<div class="single-card-detail">
									<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								</div>
							</div>
						</div>
						<?php
					endwhile;
					wp_reset_postdata();
					?>
				</div>
				<div class="flash-carousel-navigation"></div>
			</div>
		</div>
	</section>

	<?php
}
