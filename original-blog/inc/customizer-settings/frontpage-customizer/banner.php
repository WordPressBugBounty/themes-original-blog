<?php
/**
 * Frontpage Customizer Settings
 *
 * @package Original Blog
 *
 * Banner Section
 */

$wp_customize->add_section(
	'original_blog_banner_section',
	array(
		'title' => esc_html__( 'Banner Section', 'original-blog' ),
		'panel' => 'original_blog_frontpage_panel',
	)
);

// Banner section enable settings.
$wp_customize->add_setting(
	'original_blog_banner_section_enable',
	array(
		'default'           => false,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);
$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_banner_section_enable',
		array(
			'label'    => esc_html__( 'Enable Banner Section', 'original-blog' ),
			'type'     => 'checkbox',
			'settings' => 'original_blog_banner_section_enable',
			'section'  => 'original_blog_banner_section',
		)
	)
);

// Banner Posts Sub Heading.
$wp_customize->add_setting(
	'original_blog_banner_posts_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Original_Blog_Section_Sub_Heading_Control(
		$wp_customize,
		'original_blog_banner_posts_sub_heading',
		array(
			'label'           => esc_html__( 'Banner Posts Section', 'original-blog' ),
			'settings'        => 'original_blog_banner_posts_sub_heading',
			'section'         => 'original_blog_banner_section',
			'active_callback' => 'original_blog_if_banner_enabled',
		)
	)
);

// banner content type settings.
$wp_customize->add_setting(
	'original_blog_banner_posts_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_banner_posts_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'original-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'original-blog' ),
		'section'         => 'original_blog_banner_section',
		'type'            => 'select',
		'active_callback' => 'original_blog_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'original-blog' ),
			'category' => esc_html__( 'Category', 'original-blog' ),
		),
	)
);

for ( $i = 1; $i <= 3; $i++ ) {
	// banner post setting.
	$wp_customize->add_setting(
		'original_blog_banner_posts_post_' . $i,
		array(
			'sanitize_callback' => 'original_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'original_blog_banner_posts_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'original-blog' ), $i ),
			'section'         => 'original_blog_banner_section',
			'type'            => 'select',
			'choices'         => original_blog_get_post_choices(),
			'active_callback' => 'original_blog_banner_posts_content_type_post_enabled',
		)
	);
}

// banner category setting.
$wp_customize->add_setting(
	'original_blog_banner_posts_category',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_banner_posts_category',
	array(
		'label'           => esc_html__( 'Category', 'original-blog' ),
		'section'         => 'original_blog_banner_section',
		'type'            => 'select',
		'choices'         => original_blog_get_post_cat_choices(),
		'active_callback' => 'original_blog_banner_posts_content_type_category_enabled',
	)
);

// Banner Hot Topics Sub Heading.
$wp_customize->add_setting(
	'original_blog_banner_hot_topics_sub_heading',
	array(
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	new Original_Blog_Section_Sub_Heading_Control(
		$wp_customize,
		'original_blog_banner_hot_topics_sub_heading',
		array(
			'label'           => esc_html__( 'Banner Hot Topics Section', 'original-blog' ),
			'settings'        => 'original_blog_banner_hot_topics_sub_heading',
			'section'         => 'original_blog_banner_section',
			'active_callback' => 'original_blog_if_banner_enabled',
		)
	)
);

// banner content type settings.
$wp_customize->add_setting(
	'original_blog_banner_hot_topics_content_type',
	array(
		'default'           => 'post',
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_banner_hot_topics_content_type',
	array(
		'label'           => esc_html__( 'Content type:', 'original-blog' ),
		'description'     => esc_html__( 'Choose where you want to render the content from.', 'original-blog' ),
		'section'         => 'original_blog_banner_section',
		'type'            => 'select',
		'active_callback' => 'original_blog_if_banner_enabled',
		'choices'         => array(
			'post'     => esc_html__( 'Post', 'original-blog' ),
			'category' => esc_html__( 'Category', 'original-blog' ),
		),
	)
);

for ( $i = 1; $i <= 5; $i++ ) {
	// banner post setting.
	$wp_customize->add_setting(
		'original_blog_banner_hot_topics_post_' . $i,
		array(
			'sanitize_callback' => 'original_blog_sanitize_dropdown_pages',
		)
	);

	$wp_customize->add_control(
		'original_blog_banner_hot_topics_post_' . $i,
		array(
			'label'           => sprintf( esc_html__( 'Post %d', 'original-blog' ), $i ),
			'section'         => 'original_blog_banner_section',
			'type'            => 'select',
			'choices'         => original_blog_get_post_choices(),
			'active_callback' => 'original_blog_banner_hot_topics_content_type_post_enabled',
		)
	);

}

// banner category setting.
$wp_customize->add_setting(
	'original_blog_banner_hot_topics_category',
	array(
		'sanitize_callback' => 'original_blog_sanitize_select',
	)
);

$wp_customize->add_control(
	'original_blog_banner_hot_topics_category',
	array(
		'label'           => esc_html__( 'Category', 'original-blog' ),
		'section'         => 'original_blog_banner_section',
		'type'            => 'select',
		'choices'         => original_blog_get_post_cat_choices(),
		'active_callback' => 'original_blog_banner_hot_topics_content_type_category_enabled',
	)
);

/*========================Active Callback==============================*/
function original_blog_if_banner_enabled( $control ) {
	return $control->manager->get_setting( 'original_blog_banner_section_enable' )->value();
}
// Banner Posts.
function original_blog_banner_posts_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_banner_posts_content_type' )->value();
	return original_blog_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function original_blog_banner_posts_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_banner_posts_content_type' )->value();
	return original_blog_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
// Banner Hot Topics.
function original_blog_banner_hot_topics_content_type_post_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_banner_hot_topics_content_type' )->value();
	return original_blog_if_banner_enabled( $control ) && ( 'post' === $content_type );
}
function original_blog_banner_hot_topics_content_type_category_enabled( $control ) {
	$content_type = $control->manager->get_setting( 'original_blog_banner_hot_topics_content_type' )->value();
	return original_blog_if_banner_enabled( $control ) && ( 'category' === $content_type );
}
