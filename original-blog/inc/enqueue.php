<?php

// Add custom fonts, used in the main stylesheet.
wp_enqueue_style( 'original-blog-fonts', wptt_get_webfont_url( original_blog_fonts_url() ), array(), null );

// Slick style.
wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/css/slick.min.css', array(), '1.8.1' );

// Fontawesome style.
wp_enqueue_style( 'all-style', get_template_directory_uri() . '/assets/css/all.min.css', array(), '6.7.2' );

// blocks.
wp_enqueue_style( 'original-blog-blocks-style', get_template_directory_uri() . '/assets/css/blocks.min.css' );

// style.
wp_enqueue_style( 'original-blog-style', get_template_directory_uri() . '/style.css', array(), ORIGINAL_BLOG_VERSION );

// navigation.
wp_enqueue_script( 'original-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.min.js', array(), ORIGINAL_BLOG_VERSION, true );

// Slick script.
wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/assets/js/slick.min.js', array( 'jquery' ), '1.8.1', true );

// Custom script.
wp_enqueue_script( 'original-blog-custom-script', get_template_directory_uri() . '/assets/js/custom.min.js', array( 'jquery' ), ORIGINAL_BLOG_VERSION, true );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}
