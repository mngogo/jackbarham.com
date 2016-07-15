<?php

    // Load in Custom Post Types
    require_once('functions/cpt-activity.php');

    // Theme support
    if (function_exists('add_theme_support'))
    {
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
    }

    // Remove junk from header
    function airpress_clean_header()
    {
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link', 10, 0);
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
        remove_action('wp_head', 'wp_generator');
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'rel_canonical');
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
        remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
        remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
        remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
        add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
        if (!is_admin()) {
            wp_deregister_script('jquery'); // De-Register jQuery
            wp_register_script('jquery', '', '', '', true); // It's already in the Header
        }
    }
    add_action('init', 'airpress_clean_header');

    // Remove WP version from RSS
    function airpress_rss_version() { return ''; }
    add_filter('the_generator', 'airpress_rss_version');

    // Remove recent comments CSS from header
    function remove_recent_comments_style()
    {
        global $wp_widget_factory;
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
    add_action('widgets_init', 'remove_recent_comments_style');

    // Remove admin menu (Posts)
    // http://www.wprecipes.com/how-to-remove-menus-in-wordpress-dashboard
    function remove_menus ()
    {
        global $menu;
        $restricted = array(__('Posts'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
    add_action('admin_menu', 'remove_menus');

    // Remove the p from post images
    function filter_ptags_on_images($content)
    {
       return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
    }
    add_filter('the_content', 'filter_ptags_on_images');

    // Puts link in excerpts more tag
    function new_excerpt_more($more)
    {
        global $post;
        return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');


?>