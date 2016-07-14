<?php

    // Load in Custom Post Types
    require_once('functions/cpt-activity.php');
    require_once('functions/cpt-articles.php');
    require_once('functions/cpt-playground.php');
    require_once('functions/cpt-portfolio.php');

    // Theme support
    if (function_exists('add_theme_support'))
    {
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');
    }

    // Remove junk from header
    function airpress_clean_header()
    {
        remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
        remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
        remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
        remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
        remove_action('wp_head', 'index_rel_link'); // Index link
        remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
        remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
        remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
        remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
        remove_action('wp_head', 'start_post_rel_link', 10, 0);
        remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
        remove_action('wp_head', 'rel_canonical');
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
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