<?php
/**
 * Frontpage Customizer Settings
 *
 * @package Original Blog
 *
 * Small List Section
 */

$wp_customize->add_section(
	'original_blog_small_list_section',
	array(
		'title' => esc_html__( 'Small List Section', 'original-blog' ),
		'panel' => 'original_blog_frontpage_panel',
	)
);

// Small List section enable settings.
$wp_customize->add_setting(
	'original_blog_small_list_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_small_list_section_enable',
		array(
			'label'    => esc_html__( 'Enable Small List Section', 'original-blog' ),
			'type'     => 'checkbox',
			'settings' => 'original_blog_small_list_section_enable',
			'section'  => 'original_blog_small_list_section',
		)
	)
);

// Small List title settings.
$wp_customize->add_setting(
	'original_blog_small_list_title',
	array(
		'default'           => __( 'Small List', 'original-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'original_blog_small_list_title',
	array(
		'label'           => esc_html__( 'Section Title', 'original-blog' ),
		'section'         => 'original_blog_small_list_section',
		'active_callback' => 'original_blog_if_small_list_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'original_blog_small_list_title',
		array(
			'selector'            => '.small-list h3.section-title',
			'settings'            => 'original_blog_small_list_title',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}

// Small List subtitle settings.
$wp_customize->add_setting(
	'original_blog_small_list_subtitle',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'original_blog_small_list_subtitle',
	array(
		'label'           => esc_html__( 'Section Subtitle', 'original-blog' ),
		'section'         => 'original_blog_small_list_section',
		'active_callback' => 'original_blog_if_small_list_enabled',
	)
);

// Small List content type settings.
$wp_customize->add_setting(
	'original_blog_small_list_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_small_list_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'original-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'original-blog' ),
		'section'         => 'original_blog_small_list_section',
		'type'            => 'select',
		'active_callback' => 'original_blog_if_small_list_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'original-blog' ),
			'category' => esc_html__( 'Category', 'original-blog' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i++ ) {
	// Small List post setting.
	$wp_customize->add_setting(
		'original_blog_small_list_post_' . $i,
		array(
			'sanitize_callback' => 'original_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'original_blog_small_list_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'original-blog' ), $i ),
			'section'         => 'original_blog_small_list_section',
			'type'            => 'select',
			'choices'         => original_blog_get_post_choices(),
			'active_callback' => 'original_blog_small_list_section_content_type_post_enabled',
		)
	);

}

// Small List category setting.
$wp_customize->add_setting(
	'original_blog_small_list_category',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_small_list_category',
	array(
		'label'           => esc_html__( 'Category', 'original-blog' ),
		'section'         => 'original_blog_small_list_section',
		'type'            => 'select',
		'choices'         => original_blog_get_post_cat_choices(),
		'active_callback' => 'original_blog_small_list_section_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function original_blog_if_small_list_enabled( $control ) {
	return $control->manager->get_setting( 'original_blog_small_list_section_enable' )->value();
}
function original_blog_small_list_section_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_small_list_content_type' )->value();
	return original_blog_if_small_list_enabled( $control ) && ( 'post' === $content_type );
}
function original_blog_small_list_section_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_small_list_content_type' )->value();
	return original_blog_if_small_list_enabled( $control ) && ( 'category' === $content_type );
}

/*========================Partial Refresh==============================*/
if ( ! function_exists( 'original_blog_small_list_title_text_partial' ) ) :
	// Title.
	function original_blog_small_list_title_text_partial() {
		return esc_html( get_theme_mod( 'original_blog_small_list_title' ) );
	}
endif;
