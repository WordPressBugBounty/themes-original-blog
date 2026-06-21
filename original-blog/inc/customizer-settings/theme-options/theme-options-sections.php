<?php

/**
 * Theme Customizer Hub.
 */

$wp_customize->add_panel(
	'original_blog_theme_options_panel',
	array(
		'title'    => esc_html__( 'Theme Options', 'original-blog' ),
		'priority' => 150,
	)
);

$theme_options = array( 'header-options', 'font-options', 'breadcrumb', 'post-meta', 'archive-options', 'sidebar-layout', 'pagination', 'single-post', 'footer' );

foreach ( $theme_options as $customizer ) {
	require get_template_directory() . '/inc/customizer-settings/theme-options/' . $customizer . '.php';

}
