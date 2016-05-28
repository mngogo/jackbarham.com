<?php

/******************************************************************

	AIRPRESS ONE - FUNCTIONS

	Author: Jack Barham
	Theme: AirPress One
	URI: http://airpressthemes.com/

******************************************************************/

	// Load in admin and login functions
	require_once('functions/custom-post-types.php');


/* 	THEME SUPPORT
****************************************************/

	if (function_exists('add_theme_support'))
	{

		// Add Thumbnail Theme Support
		add_theme_support('post-thumbnails');

		// Enables post and comment RSS feed links to head
		add_theme_support('automatic-feed-links');
	}



/* 	REMOVE HEADER JUNK
****************************************************/

	function airpress_clean_header() {

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
			wp_deregister_script('jquery');                                   // De-Register jQuery
			wp_register_script('jquery', '', '', '', true);                   // It's already in the Header
		}
	}

	add_action('init', 'airpress_clean_header');

	// remove WP version from RSS
	function airpress_rss_version() { return ''; }
	add_filter('the_generator', 'airpress_rss_version');

	// Remove recent comments CSS from header
	function remove_recent_comments_style() {
	    global $wp_widget_factory;
	    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
	}
	add_action('widgets_init', 'remove_recent_comments_style');


/* 	REMOVE ADMIN MENUS
****************************************************/

	// http://www.wprecipes.com/how-to-remove-menus-in-wordpress-dashboard

	function remove_menus () {
		global $menu;
		$restricted = array(__('Posts'));
		end ($menu);
		while (prev($menu)){
			$value = explode(' ',$menu[key($menu)][0]);
			if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
		}
	}

	add_action('admin_menu', 'remove_menus');



/* 	SIDEBAR WIDGETS
****************************************************/

	function airpress_register_sidebars() {

	    register_sidebar(array(
	    	'id' => 'sidebar1',
	    	'name' => 'Sidebar (Main)',
	    	'description' => 'Primary sidebar',
	    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    	'after_widget' => '</div>',
	    	'before_title' => '<h3 class="widgettitle">',
	    	'after_title' => '</h3>',
	    	'class' => 'clearfix'
	    ));

	}

	add_action('widgets_init', 'airpress_register_sidebars');



/* 	WP MENU
****************************************************/

	function airpress_nav_main() {
	    wp_nav_menu(
	    	array(
	    		'menu' => 'main_nav', /* menu name */
	    		'theme_location' => 'nav_main', /* where in the theme it's assigned */
	    		'container_class' => 'menu', /* container class */
	    		'menu_class'      => 'sf-menu clearfix',
	    		'fallback_cb' => 'airpress_nav_main_fallback' /* menu fallback */
	    	)
	    );
	}

	function airpress_nav_footer() {
	    wp_nav_menu(
	    	array(
	    		'menu' => 'footer_links', /* menu name */
	    		'theme_location' => 'nav_footer', /* where in the theme it's assigned */
	    		'container_class' => 'footer-links', /* container class */
	    		'fallback_cb' => 'airpress_nav_footer_fallback' /* menu fallback */
	    	)
		);
	}

	register_nav_menus(                      	// wp3+ menus
		array(
			'nav_main' => 'The Main Menu',   	// Main nav in header
			'nav_footer' => 'Footer Links' 		// secondary nav in footer
		)
	);

	// Fallback
	function airpress_nav_main_fallback() {  wp_page_menu( 'show_home=Home&menu_class=menu' ); }
	function airpress_nav_footer_fallback() {}



/* 	PAGINATON
****************************************************/

	function airpress_pagination() {
	    global $wp_query;
	    $big = 999999999;
	    echo paginate_links(array(
	        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
	        'format' => '?paged=%#%',
	        'current' => max(1, get_query_var('paged')),
	        'total' => $wp_query->max_num_pages
	    ));
	}


/* 	COMMENT LAYOUT
****************************************************/

	function airpress_comments($comment, $args, $depth) {
	   $GLOBALS['comment'] = $comment; ?>
		<li <?php comment_class(); ?>>
			<article id="comment-<?php comment_ID(); ?>" class="clearfix">
				<header class="comment-author vcard">
					<?php echo get_avatar($comment,$size='32',$default='<path_to_url>' ); ?>
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time('F jS, Y'); ?> </a></time>
					<?php edit_comment_link(__('(Edit)'),'  ','') ?>
				</header>
				<?php if ($comment->comment_approved == '0') : ?>
	       			<div class="help">
	          			<p><?php _e('Your comment is awaiting moderation.') ?></p>
	          		</div>
				<?php endif; ?>
				<section class="comment_content clearfix">
					<?php comment_text() ?>
				</section>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</article>
	    <!-- </li> is added by wordpress automatically -->
	<?php
	} // don't remove this bracket!

	// loading jquery reply elements on single pages automatically
	function airpress_queue_js(){
		if (!is_admin()){
			if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1))
			wp_enqueue_script( 'comment-reply' );
		}
	}
	// reply on comments script
	add_action('wp_print_scripts', 'airpress_queue_js');




/* 	DISPLAY BROWSER ENGINE
****************************************************/

	function airpress_browser_class($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
			if($is_lynx) $classes[] = 'browser-lynx';
			elseif($is_gecko) $classes[] = 'browser-gecko';
			elseif($is_opera) $classes[] = 'browser-opera';
			elseif($is_NS4) $classes[] = 'browser-ns4';
			elseif($is_safari) $classes[] = 'browser-safari';
			elseif($is_chrome) $classes[] = 'browser-chrome';
			elseif($is_IE) $classes[] = 'browser-ie';
			else $classes[] = '';
			if($is_iphone) $classes[] = 'browser-iphone';
		return $classes;
	}

	add_filter('body_class','airpress_browser_class');




/* 	HACKS & FIXES
****************************************************/

	// remove the p from post images
	function filter_ptags_on_images($content){
	   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
	}
	add_filter('the_content', 'filter_ptags_on_images');

	// Puts link in excerpts more tag
	function new_excerpt_more($more) {
	       global $post;
		return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
	}
	add_filter('excerpt_more', 'new_excerpt_more');


?>