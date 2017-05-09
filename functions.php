<?php
/*
 *  Author: Jason Occhipinti | @positivespacegr
 *  URL: www.positivespacegroup.com
 *  Theme Functions
 */

// --------------------------------------------------------------------------
// >> Theme Support
// --------------------------------------------------------------------------

if (function_exists( 'add_theme_support' ) )
{
 // Add Menu Support
 add_theme_support( 'menus' );

 // Add Thumbnail Theme Support
 add_theme_support( 'post-thumbnails' );
 add_image_size( 'large', 800, 600, true ); // Large Thumbnail Size
 add_image_size( 'medium', 400, '', true ); // Medium Thumbnail Size
 add_image_size( 'small', 250, '', true ); // Small Thumbnail Size
 add_image_size( 'custom-size', 1500, 500, true ); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

 // Add Localization Support
 load_theme_textdomain( 'psmark1', get_template_directory() . '/languages' );
}

function register_my_menus() {
 register_nav_menus(
   array(
     'menu-primary' => __( 'Main Menu' ), // Primary Navigation/Menu Area
     'menu-secondary' => __( 'Secondary Menu' ), // Secondary Navigation/Menu Area
     'menu-tertiary' => __( 'Tertiary Menu' ) // Additional Menu Area
   )
 );
}

 // --------------------------------------------------------------------------
 // >> JavaScript
 // --------------------------------------------------------------------------

// Load JavaScript
function psmark1_scripts()
{
  if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ) {

    wp_deregister_script('jquery'); // Deregister local jQuery
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', false, '3.1.0', true); // Register jQuery CDN
    wp_enqueue_script('jquery');

    // Enqueue custom code or plugins
    wp_register_script( 'psmark1-js', get_template_directory_uri() . '/assets/js/min/custom.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'psmark1-js' );

    // Enqueue init plugins/options
    wp_register_script( 'psmark1-init', get_template_directory_uri() . '/assets/js/min/init.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'psmark1-init' );
  }

  // Enqueue conditional JavaScript
  elseif ( is_page( 'pagename' ) ) { // If page matches page name
    wp_register_script( 'scriptname', get_template_directory_uri() . '/assets/js/min/scriptname.min.js', array( 'jquery' ), '1.0' ); // Load Conditional JavaScript
    wp_enqueue_script( 'scriptname' );
  }
}

// Remove jQuery migrate script
function dequeue_jquery_migrate( &$scripts ) {
 	if( !is_admin() ) {
 		$scripts->remove( 'jquery');
 		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
 	}
}

// --------------------------------------------------------------------------
// >> Stylesheets
// --------------------------------------------------------------------------

// Load Stylesheets
function psmark1_styles()
{
  if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ) {

    wp_register_style( 'psmark1-styles', get_template_directory_uri() . '/assets/css/min/main.min.css', array(), '1.0', 'all' );
    wp_enqueue_style( 'psmark1-styles' );

    // Uncomment to enqueue old IE-specific stylesheets...if you're into that sort of thing.
    // wp_enqueue_style( 'ie9-styles', get_template_directory_uri().'/assets/css/min/ie9.min.css', array(), '1.0', 'all' );
    // wp_style_add_data( 'ie9-styles', 'conditional', 'lte IE 9' );

  }

  elseif ( is_page( 'pagename' ) ) {
     wp_register_style( 'stylename', get_template_directory_uri() . '/assets/css/stylename.css', array(), '1.0', 'all' ); // Conditional script(s)
     wp_enqueue_style( 'stylename' );}
}

// Remove "text/css" from enqueued stylesheets
function psmark1_style_remove( $tag )
{
   return preg_replace( '~\s+type=["\'][^"\']++["\']~', '', $tag );
}

// Remove dreadful Wordpress Emojis *** Affects inline editing dialogue box at least up to 4.6.X ***
function disable_wp_emojicons()
{
  // Emoji-related actions
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // Remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );

  // Remove emoji DNS prefetch
  add_filter( 'emoji_svg_url', '__return_false' );
}

// --------------------------------------------------------------------------
// >> Custom Post Types & Taxonomies
// --------------------------------------------------------------------------

// Add Custom Post Type
function create_post_type()
{
  // register_taxonomy_for_object_type('category', 'portfolio'); // Register Taxonomies for Category
  // register_taxonomy_for_object_type('post_tag', 'portfolio');
  register_post_type('custom', // Register Custom Post Type
    array(
     'labels' => array(
     'name' => __('Custom Post Name', 'psmark1'), // Rename these to suit
     'singular_name' => __('Custom Post', 'psmark1'),
     'add_new' => __('Add New', 'psmark1'),
     'add_new_item' => __('Add New Custom Post', 'psmark1'),
     'edit' => __('Edit', 'psmark1'),
     'edit_item' => __('Edit Custom Post', 'psmark1'),
     'new_item' => __('New Custom Post', 'psmark1'),
     'view' => __('View', 'psmark1'),
     'view_item' => __('View Custom Post', 'psmark1'),
     'search_items' => __('Search Custom Posts', 'psmark1'),
     'not_found' => __('No Custom Posts found', 'psmark1'),
     'not_found_in_trash' => __('No Custom Posts found in Trash', 'psmark1')
    ),
   'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
   'has_archive' => true,
   'public' => true,
   'supports' => array(
     'title',
     'editor',
     'excerpt',
     'thumbnail'
    ),
     'can_export' => true //,  Allows export via Tools > Export
    )
  );
}

// Add Custom Taxonomy
add_action( 'init', 'build_taxonomies', 0 );
function build_taxonomies() {
  register_taxonomy(
    'taxonomy_type',
    'custom', // this is name of the custom post you'll use your taxonomy with
    array(
      'hierarchical' => true,
      'label' => 'Project Type',
      'query_var' => true,
      'rewrite' => true
    )
  );
}





// --------------------------------------------------------------------------
// >> Actions + Filters + ShortCodes
// --------------------------------------------------------------------------

// Add Actions
add_action( 'init', 'psmark1_scripts' ); // Add Custom Scripts to wp_head
add_action( 'init', 'psmark1_styles' ); // Add Custom Scripts to wp_head
add_action( 'init', 'disable_wp_emojicons' ); // Disable those dreadful Wordpress emojis
//add_action( 'admin_init', 'role_lower_admin_hide' );
add_action( 'init', 'register_my_menus' );
add_action( 'init', 'create_post_type'); // Add our HTML5 Blank Custom Post Type
add_action( 'wp_enqueue_styles', 'enqueue_my_styles_and_scripts' );

// Remove Actions
remove_action( 'wp_head', 'wp_generator' ); // Remove Generator Meta tag
remove_action( 'wp_head', 'wlwmanifest_link' ); // Remove Windows Live Writer Manifest Link
remove_action( 'wp_head', 'rsd_link' ); // Remove RSD link
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 ); // Remove JSON REST API
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 ); // Remove oEmbed discovery links
remove_action( 'wp_head', 'wp_resource_hints', 2 ); // Remove ajax.googleapis.com DNS prefetch

// Add Filters
add_filter( 'style_loader_tag', 'psmark1_style_remove' ); // Remove 'text/css' from enqueued stylesheets
add_filter( 'show_admin_bar', '__return_false' ); // Hide Admin Bar
add_filter( 'body_class', 'psmark1_body_class', 10, 2 ); // Remove body classes and create white list
add_filter( 'nav_menu_css_class', 'psmark1_css_attributes_filter', 100, 1 ); // Remove navigation <li> injected classes
add_filter( 'script_loader_tag', 'clean_script_tag' ); // Remove type="text/javascript" from script tags
add_filter( 'style_loader_tag', 'remove_style_id' ); // Remove id from stylesheets


add_action( 'pre_ping', 'no_self_ping' );
add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' ); // Remove jQuery Migrate Script
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );


add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}



// Filter: Remove body classes & create whitelist
// Via Geert on wordpress.stackexchange.com/questions/15850/remove-classes-from-body-class

function psmark1_body_class( $wp_classes, $extra_classes ) {

  // List of the only WP generated classes allowed
  $whitelist = array( 'portfolio', 'home', 'error404' );

  // Filter the body classes
  $wp_classes = array_intersect( $wp_classes, $whitelist );

  // Add the extra classes back untouched
  return array_merge( $wp_classes, (array) $extra_classes );
}


/*
Plugin Name:        BYE BYE Pingback
Plugin URI:         https://github.com/Wordpress-Development/bye-bye-pingback/
Description:        Banishment of wordpress pingback
Version:            1.0.0
Author:             bryanwillis
Author URI:         https://github.com/bryanwillis/
*/
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}
/**
 * Htaccess directive block xmlrcp for extra security.
 * Here are some rewrite examples:
 *   404 - RewriteRule xmlrpc\.php$ - [R=404,L]
 *   301 - RewriteRule ^xmlrpc\.php$ index.php [R=301]
 * If you want custom 404 make sure your server is finding it by also adding this 'ErrorDocument 404 /index.php?error=404' or 'ErrorDocument 404 /wordpress/index.php?error=404' for sites in subdirectory.
 */
add_filter('mod_rewrite_rules', 'noxmlrpc_mod_rewrite_rules'); // should we put this inside wp_loaded or activation hook
function noxmlrpc_mod_rewrite_rules($rules) {
  $insert = "RewriteRule xmlrpc\.php$ - [F,L]";
  $rules = preg_replace('!RewriteRule!', "$insert\n\nRewriteRule", $rules, 1);
  return $rules;
}
register_activation_hook(__FILE__, 'noxmlrpc_htaccess_activate');
function noxmlrpc_htaccess_activate() {
  flush_rewrite_rules(true);
}
register_deactivation_hook(__FILE__, 'noxmlrpc_htaccess_deactivate');
function noxmlrpc_htaccess_deactivate() {
  remove_filter('mod_rewrite_rules', 'noxmlrpc_mod_rewrite_rules');
  flush_rewrite_rules(true);
}
add_action('wp', function(){
    // Remove rsd_link from filters- link rel="EditURI"
    remove_action('wp_head', 'rsd_link');
    // Windows Live Writer
    // <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="/wp-includes/wlwmanifest.xml" />
    remove_action('wp_head', 'wlwmanifest_link');
}, 9);
// Remove pingback from head (link rel="pingback")
if (!is_admin()) {
    function link_rel_buffer_callback($buffer) {
        $buffer = preg_replace('/(<link.*?rel=("|\')pingback("|\').*?href=("|\')(.*?)("|\')(.*?)?\/?>|<link.*?href=("|\')(.*?)("|\').*?rel=("|\')pingback("|\')(.*?)?\/?>)/i', '', $buffer);
                return $buffer;
    }
    function link_rel_buffer_start() {
        ob_start("link_rel_buffer_callback");
    }
    function link_rel_buffer_end() {
        ob_flush();
    }
    add_action('template_redirect', 'link_rel_buffer_start', -1);
    add_action('get_header', 'link_rel_buffer_start');
    add_action('wp_head', 'link_rel_buffer_end', 999);
}
// Hijack pingback_url for get_bloginfo (<link rel="pingback" />).
add_filter('bloginfo_url', function($output, $property){
    return ($property == 'pingback_url') ? null : $output;
}, 11, 2);
add_filter( 'xmlrpc_enabled', '__return_false' ); // https://github.com/WordPress/WordPress/blob/77e365efbf2e499e2ed11d29c101ea466cf1ceed/wp-includes/class-wp-xmlrpc-server.php#L255
add_filter( 'pre_update_option_enable_xmlrpc', '__return_false' );
add_filter( 'pre_option_enable_xmlrpc', '__return_zero' ); // https://github.com/WordPress/WordPress/blob/77e365efbf2e499e2ed11d29c101ea466cf1ceed/wp-includes/class-wp-xmlrpc-server.php#L241
add_filter( 'pings_open', '__return_false', 10, 2 );
add_filter( 'rewrite_rules_array', function( $rules ) {
	foreach( $rules as $rule => $rewrite ) {
		if( preg_match( '/trackback\/\?\$$/i', $rule ) ) {
			unset( $rules[$rule] );
		}
	}
	return $rules;
});
// Disable X-Pingback HTTP Header.
add_filter('wp_headers', function($headers, $wp_query){
    if(isset($headers['X-Pingback'])){
        unset($headers['X-Pingback']);
    }
    return $headers;
}, 11, 2);
/*----------------------------------------------------------------------------*
 * XML-RCP Methods
 *----------------------------------------------------------------------------*/

// https://github.com/WordPress/WordPress/blob/77e365efbf2e499e2ed11d29c101ea466cf1ceed/wp-includes/class-wp-xmlrpc-server.php#L170
add_filter( 'xmlrpc_methods', function($methods){
    unset( $methods['pingback.ping'] );
    unset( $methods['pingback.extensions.getPingbacks'] );
    unset( $methods['wp.getUsersBlogs'] ); // Block brute force discovery of existing users
    unset( $methods['system.multicall'] );
    unset( $methods['system.listMethods'] );
    unset( $methods['system.getCapabilities'] );
    return $methods;
});
// Just disable pingback.ping functionality while leaving XMLRPC intact?
add_action('xmlrpc_call', function($method){
    if($method != 'pingback.ping') return;
    wp_die(
        'This site does not have pingback.',
        'Pingback not Enabled!',
        array('response' => 403)
    );
});







// Remove text/javascript
// Via LeoNovais @ css-tricks.com/forums/topic/clean-up-script-tags-in-wordpress/

function clean_script_tag ($input) {
$input = str_replace("type='text/javascript' ", '', $input);
return str_replace("'", '"', $input);
}



add_filter("style_loader_tag", function($tag){
    return str_replace("id='custom-stylesheet-css' " ,'',  $tag);
});



// Remove id from stylesheets
// Via Fabian Lange @ blog.codecentric.de/en/2011/10/wordpress-and-mod_pagespeed-why-combine_css-does-not-work/

function remove_style_id($link) {
        return preg_replace("/id='.*-css'/", "", $link);
}







 ?>
