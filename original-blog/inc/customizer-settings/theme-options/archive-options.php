<?php
/**
 * Blog / Archive Options
 */

$wp_customize->add_section(
	'original_blog_archive_page_options',
	array(
		'title' => esc_html__( 'Blog / Archive Pages Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'original_blog_excerpt_length',
	array(
		'default'           => 35,
		'sanitize_callback' => 'original_blog_sanitize_number_range',
	)
);

$wp_customize->add_control(
	'original_blog_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'original-blog' ),
		'section'     => 'original_blog_archive_page_options',
		'settings'    => 'original_blog_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 5,
			'max'  => 200,
			'step' => 1,
		),
	)
);
