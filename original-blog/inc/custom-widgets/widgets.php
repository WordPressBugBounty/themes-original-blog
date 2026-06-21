<?php

// Author Info Widget.
require get_template_directory() . '/inc/custom-widgets/info-author-widget.php';

// Featured Posts Widget.
require get_template_directory() . '/inc/custom-widgets/featured-posts-widget.php';

// Social Widget.
require get_template_directory() . '/inc/custom-widgets/social-widget.php';

/**
 * Register Widgets
 */
function original_blog_register_widgets() {

	register_widget( 'Original_Blog_Author_Info_Widget' );

	register_widget( 'Original_Blog_Featured_Posts_Widget' );

	register_widget( 'Original_Blog_Social_Widget' );
}
add_action( 'widgets_init', 'original_blog_register_widgets' );
