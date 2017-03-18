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
 // >> Scripts & Styles
 // --------------------------------------------------------------------------

 // Load JavaScript
 function psmark1_scripts()
 {
  if ( $GLOBALS['pagenow'] != 'wp-login.php' && !is_admin() ) {

    wp_deregister_script('jquery'); // Deregister local jQuery
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js', false, '3.1.0'); // Register jQuery CDN
    wp_enqueue_script('jquery');

    // Add custom code or plugins
    wp_register_script( 'psmark1-js', get_template_directory_uri() . '/assets/js/min/custom.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'psmark1-js' );

    // Initialize plugins/options
    wp_register_script( 'psmark1-init', get_template_directory_uri() . '/assets/js/min/init.min.js', array( 'jquery' ), '1.0', true );
    wp_enqueue_script( 'psmark1-init' );
   }

   // Load conditional JavaScript
   elseif ( is_page( 'pagename' ) ) { // If page matches page name
     wp_register_script( 'scriptname', get_template_directory_uri() . '/assets/js/min/scriptname.min.js', array( 'jquery' ), '1.0' ); // Load Conditional JavaScript
     wp_enqueue_script( 'scriptname' );
   }
 }

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
     wp_enqueue_style( 'stylename' );
   }
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








 ?>
