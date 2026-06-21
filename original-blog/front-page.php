<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Original Blog
 */

get_header();

// Call home.php if Homepage setting is set to latest posts.
if ( original_blog_is_latest_posts() ) {

	require get_home_template();

} elseif ( original_blog_is_frontpage() ) {

	$sorted_sections = array( 'flash-posts', 'banner', 'small-list' );
	
	foreach ( $sorted_sections as $sorted_section ) {
		require get_template_directory() . '/inc/frontpage-sections/' . $sorted_section . '.php';
	}
}

if ( get_theme_mod( 'original_blog_enable_frontpage_content', false ) === true && 'page' == get_option('show_on_front') ) {
	?>
	<div id="primary-content" class="primary-site-content">
		<div id="content" class="site-content site-container-width">
			<div class="theme-wrapper">
				<main id="primary" class="site-main">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
					endif;

					endwhile; // End of the loop.
					?>
				</main><!-- #main -->
				<?php
				if ( original_blog_is_sidebar_enabled() ) {
					get_sidebar();
				}
				?>
			</div>
		</div>
	</div>
	<?php
}

get_footer();
