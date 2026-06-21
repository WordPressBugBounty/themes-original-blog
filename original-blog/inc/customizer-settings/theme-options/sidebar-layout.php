<?php
/**
 * Sidebar settings
 */

$wp_customize->add_section(
	'original_blog_sidebar_option',
	array(
		'title' => esc_html__( 'Sidebar Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Sidebar Option - Archive Sidebar Position.
$wp_customize->add_setting(
	'original_blog_archive_sidebar_position',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'original_blog_archive_sidebar_position',
	array(
		'label'   => esc_html__( 'Archive Sidebar Position', 'original-blog' ),
		'section' => 'original_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'original-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'original-blog' ),
		),
	)
);

// Sidebar Option - Post Sidebar Position.
$wp_customize->add_setting(
	'original_blog_post_sidebar_position',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'original_blog_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'original-blog' ),
		'section' => 'original_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'original-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'original-blog' ),
		),
	)
);

// Sidebar Option - Page Sidebar Position.
$wp_customize->add_setting(
	'original_blog_page_sidebar_position',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'original_blog_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'original-blog' ),
		'section' => 'original_blog_sidebar_option',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'original-blog' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'original-blog' ),
		),
	)
);
