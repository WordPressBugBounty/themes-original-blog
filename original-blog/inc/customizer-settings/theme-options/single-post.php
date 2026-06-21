<?php
/**
 * Single Post Options
 */

$wp_customize->add_section(
	'original_blog_single_page_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Single post related Posts title label.
$wp_customize->add_setting(
	'original_blog_related_posts_title',
	array(
		'default'           => __( 'Related Posts', 'original-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'original_blog_related_posts_title',
	array(
		'label'    => esc_html__( 'Related Posts Title', 'original-blog' ),
		'section'  => 'original_blog_single_page_options',
		'settings' => 'original_blog_related_posts_title',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'original_blog_related_posts_title',
		array(
			'selector'            => '.theme-wrapper h2.related-title',
			'settings'            => 'original_blog_related_posts_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}
