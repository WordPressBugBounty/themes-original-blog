<?php
/**
 * Footer copyright
 */

// Footer copyright
$wp_customize->add_section(
	'original_blog_footer_section',
	array(
		'title' => esc_html__( 'Footer Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

$copyright_default = sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'original-blog' ), '[the-year]', '[site-link]' );

// Footer copyright setting.
$wp_customize->add_setting(
	'original_blog_copyright_txt',
	array(
		'default'           => $copyright_default,
		'sanitize_callback' => 'original_blog_sanitize_html',
	)
);

$wp_customize->add_control(
	'original_blog_copyright_txt',
	array(
		'label'   => esc_html__( 'Copyright text', 'original-blog' ),
		'section' => 'original_blog_footer_section',
		'type'    => 'textarea',
	)
);
