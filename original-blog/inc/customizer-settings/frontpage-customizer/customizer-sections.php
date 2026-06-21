<?php

// Home Page Customizer panel.
$wp_customize->add_panel(
	'original_blog_frontpage_panel',
	array(
		'title'    => esc_html__( 'Frontpage Sections', 'original-blog' ),
		'priority' => 140,
	)
);

$customizer_settings = array( 'flash-posts', 'banner', 'small-list' );

foreach ( $customizer_settings as $customizer ) {

	require get_template_directory() . '/inc/customizer-settings/frontpage-customizer/' . $customizer . '.php';

}
