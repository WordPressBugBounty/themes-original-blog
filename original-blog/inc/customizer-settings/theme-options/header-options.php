<?php
/**
 * Header Options
 */

// Header Options.
$wp_customize->add_section(
	'original_blog_header_section',
	array(
		'title' => esc_html__( 'Header Options', 'original-blog' ),
		'panel' => 'original_blog_theme_options_panel',
	)
);

// Topbar Section.
$wp_customize->add_setting(
	'original_blog_topbar_enable',
	array(
		'default'           => true,
		'sanitize_callback' => 'original_blog_sanitize_checkbox',
	)
);

$wp_customize->add_control(
	new Original_Blog_Toggle_Checkbox_Custom_control(
		$wp_customize,
		'original_blog_topbar_enable',
		array(
			'label'    => esc_html__( 'Enable Topbar.', 'original-blog' ),
			'settings' => 'original_blog_topbar_enable',
			'section'  => 'original_blog_header_section',
			'type'     => 'checkbox',
		)
	)
);

// Topbar Button settings.
$wp_customize->add_setting(
	'original_blog_topbar_button_label',
	array(
		'default'           => __( 'Youtube', 'original-blog' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'original_blog_topbar_button_label',
	array(
		'label'           => esc_html__( 'Button Label', 'original-blog' ),
		'section'         => 'original_blog_header_section',
		'active_callback' => 'original_blog_topbar_enabled',
	)
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'original_blog_topbar_button_label',
		array(
			'selector'            => '.site-top-header a.login-button',
			'settings'            => 'original_blog_topbar_button_label',
			'container_inclusive' => false,
			'fallback_refresh'    => true,
		)
	);
}

// Topbar Button URL setting.
$wp_customize->add_setting(
	'original_blog_topbar_button_url',
	array(
		'default'           => '#',
		'sanitize_callback' => 'esc_url_raw',
	)
);

$wp_customize->add_control(
	'original_blog_topbar_button_url',
	array(
		'label'           => esc_html__( 'Topbar Button Link', 'original-blog' ),
		'section'         => 'original_blog_header_section',
		'settings'        => 'original_blog_topbar_button_url',
		'type'            => 'url',
		'active_callback' => 'original_blog_topbar_enabled',
	)
);

// Topbar Button Fontawesome icon.
$wp_customize->add_setting(
	'original_blog_topbar_button_fontawesome_icon',
	array(
		'default'           => 'fa-brands fa-youtube',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'original_blog_topbar_button_fontawesome_icon',
	array(
		'label'           => esc_html__( 'Fontawesome Icon', 'original-blog' ),
		'description'     => sprintf( '<a href=" ' . esc_url( 'https://fontawesome.com/v6/icons?o=r&m=free' ) . ' " target="_blank"> %1$s </a> %2$s', esc_html__( 'Click Here ', 'original-blog' ), esc_html__( ' to select a FontAwesome icon. Click the icon you want to add to the button, and then add the icons class, such as "fa-regular fa-bell".', 'original-blog' ) ),
		'section'         => 'original_blog_header_section',
		'settings'        => 'original_blog_topbar_button_fontawesome_icon',
		'type'            => 'text',
		'active_callback' => 'original_blog_topbar_enabled',
	)
);

/*========================Active Callback==============================*/
function original_blog_topbar_enabled( $control ) {
	return $control->manager->get_setting( 'original_blog_topbar_enable' )->value() === true;
}
