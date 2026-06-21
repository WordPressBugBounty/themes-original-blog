<?php
/**
 * Frontpage Small List Section.
 *
 * @package Original Blog
 */

// Small List Section.
$small_list_section = get_theme_mod( 'original_blog_small_list_section_enable', false );

if ( false === $small_list_section ) {
	return;
}

$content_ids             = array();
$small_list_content_type = get_theme_mod( 'original_blog_small_list_content_type', 'post' );

if ( $small_list_content_type === 'post' ) {

	for ( $i = 1; $i <= 4; $i++ ) {
		$content_ids[] = get_theme_mod( 'original_blog_small_list_post_' . $i );
	}

	$args = array(
		'post_type'           => 'post',
		'posts_per_page'      => absint( 4 ),
		'ignore_sticky_posts' => true,
	);

	if ( ! empty( array_filter( $content_ids ) ) ) {
		$args['post__in'] = array_filter( $content_ids );
		$args['orderby']  = 'post__in';
	} else {
		$args['orderby'] = 'date';
	}
} else {
	$cat_content_id = get_theme_mod( 'original_blog_small_list_category' );
	$args           = array(
		'cat'            => $cat_content_id,
		'posts_per_page' => absint( 4 ),
	);
}

$query = new WP_Query( $args );
if ( $query->have_posts() ) {
	$section_title    = get_theme_mod( 'original_blog_small_list_title', __( 'Small List', 'original-blog' ) );
	$section_subtitle = get_theme_mod( 'original_blog_small_list_subtitle', '' );
	?>

	<section id="original_blog_small_list_section" class="small-list section-divider small-list-layout-2">
		<div class="site-container-width">
			<?php if ( ! empty( $section_title ) || $section_subtitle ) : ?>
				<div class="header-title">
					<h3 class="section-title"><?php echo esc_html( $section_title ); ?></h3>
					<p class="section-sub-title"><?php echo esc_html( $section_subtitle ); ?></p>
				</div>
			<?php endif; ?>
			<div class="container-wrap">

				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					?>
					<div class="single-card-container list-card">
						<div class="single-card-image">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
						</div>
						<div class="single-card-detail">
							<h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="card-meta">
								<?php
								original_blog_posted_by();
								original_blog_posted_on();
								?>
							</div>
						</div>
					</div>

					<?php
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</section>

	<?php
}
