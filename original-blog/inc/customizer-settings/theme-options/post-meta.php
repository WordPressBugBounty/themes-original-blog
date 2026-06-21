<?php

$wp_customize->add_section(
	'original_blog_posts_meta_options',
	array(
		'title' => esc_html__( 'Post Meta Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Enable post category setting.
$wp_customize->add_setting(
	'original_blog_enable_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_enable_category',
		array(
			'label'    => esc_html__( 'Enable Category', 'original-blog' ),
			'settings' => 'original_blog_enable_category',
			'section'  => 'original_blog_posts_meta_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable post author setting.
$wp_customize->add_setting(
	'original_blog_enable_author',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_enable_author',
		array(
			'label'    => esc_html__( 'Enable Author', 'original-blog' ),
			'settings' => 'original_blog_enable_author',
			'section'  => 'original_blog_posts_meta_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable post date setting.
$wp_customize->add_setting(
	'original_blog_enable_date',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_enable_date',
		array(
			'label'    => esc_html__( 'Enable Date', 'original-blog' ),
			'settings' => 'original_blog_enable_date',
			'section'  => 'original_blog_posts_meta_options',
			'type'     => 'checkbox',
		)
	)
);

// Enable post tag setting.
$wp_customize->add_setting(
	'original_blog_enable_tag',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_enable_tag',
		array(
			'label'    => esc_html__( 'Enable Post Tag', 'original-blog' ),
			'settings' => 'original_blog_enable_tag',
			'section'  => 'original_blog_posts_meta_options',
			'type'     => 'checkbox',
		)
	)
);
