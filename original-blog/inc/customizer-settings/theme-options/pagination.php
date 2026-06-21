<?php
/**
 * Pagination setting
 */

// Pagination setting.
$wp_customize->add_section(
	'original_blog_pagination',
	array(
		'title' => esc_html__( 'Pagination', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Pagination enable setting.
$wp_customize->add_setting(
	'original_blog_pagination_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_pagination_enable',
		array(
			'label'    => esc_html__( 'Enable Pagination.', 'original-blog' ),
			'settings' => 'original_blog_pagination_enable',
			'section'  => 'original_blog_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Style.
$wp_customize->add_setting(
	'original_blog_pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Style', 'original-blog' ),
		'section'         => 'original_blog_pagination',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'original-blog' ),
			'numeric' => __( 'Numeric', 'original-blog' ),
		),
		'active_callback' => 'original_blog_pagination_enabled',
	)
);

/*========================Active Callback==============================*/
function original_blog_pagination_enabled( $control ) {
	return $control->manager->get_setting( 'original_blog_pagination_enable' )->value();
}
