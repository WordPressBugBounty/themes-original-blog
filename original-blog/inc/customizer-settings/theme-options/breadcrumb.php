<?php
/**
 * Breadcrumb settings
 */

$wp_customize->add_section(
	'original_blog_breadcrumb_section',
	array(
		'title' => esc_html__( 'Breadcrumb Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Breadcrumb enable setting.
$wp_customize->add_setting(
	'original_blog_breadcrumb_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_breadcrumb_enable',
		array(
			'label'    => esc_html__( 'Enable breadcrumb.', 'original-blog' ),
			'type'     => 'checkbox',
			'settings' => 'original_blog_breadcrumb_enable',
			'section'  => 'original_blog_breadcrumb_section',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'original_blog_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'original_blog_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'original-blog' ),
		'section'         => 'original_blog_breadcrumb_section',
		'active_callback' => function( $control ) {
			return ( $control->manager->get_setting( 'original_blog_breadcrumb_enable' )->value() );
		},
	)
);
