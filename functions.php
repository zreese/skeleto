<?php

if (!defined('ABSPATH')) {
    exit;
}

// Basic Theme Support
function skeleto_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'skeleto_setup');

// Enqueue Styles
function skeleto_frontend_scripts()
{
    wp_enqueue_style('skeleto', get_stylesheet_uri(), array(), null);

    wp_enqueue_script('skeleto', get_template_directory_uri().'/js/skeleto.js', array('jquery'), null, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'skeleto_frontend_scripts');

// Width of Container
function skeleto_content_width()
{
    $GLOBALS['content_width'] = 960;
}
add_action('after_setup_theme', 'skeleto_content_width', 0);

// Register Sidebar Widgets
function skeleto_widgets_init()
{
    $skeleto_widget_args = array(

        'name'          => __('Widgets Sidebar', 'skeleto'),
        'id'            => 'widgets_sidebar',
        'class'         => '',
        'description'   => __('Widgets added here are displayed in the sidebar', 'skeleto'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',

    );

    register_sidebar($skeleto_widget_args);
}
add_action('widgets_init', 'skeleto_widgets_init');
