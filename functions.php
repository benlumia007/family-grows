<?php
/*
===========================================================================================================
Family Grows - functions.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme (the other being template-tags.php). This functions.php template file allows you to add features and 
functionality to a WordPress theme which is stored in the theme's sub-directory in the theme folder. The 
second template file template-tags.php allows you to add additional features and functionality to the 
WordPress theme which is stored in the includes folder and it's called in the functions.php.

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/

/*
===========================================================================================================
Table of Content
===========================================================================================================
 1.0 - Theme Setup
 2.0 - Enqueue Scripts and Styles
 3.0 - Content Width
 4.0 - Register Sidebars
 5.0 - Required Files
===========================================================================================================
*/

/*
===========================================================================================================
 1.0 - Theme Setup
===========================================================================================================
    =======================================================================================================
*/
function family_grows_theme_setup() {
    /*
    =======================================================================================================
    Enable and activate add_theme_support('title-tag'); for Family Grows WordPress theme. This feature 
    should be used in place instead of wp_title(); function.
    =======================================================================================================
    */
    add_theme_support('title-tag');
    
    /*
    =======================================================================================================
    Enable and activate load_theme_textdomain('family-grows'); for Family Grows WordPress theme. This feature 
    mkes this theme available for translation.
    =======================================================================================================
    */
    load_theme_textdomain('family-grows');
    
    /*
    =======================================================================================================
    Enable and activate add_theme_support('automatic-feed-links'); for Family Grows WordPress theme. This 
    feature when eanbled allows feed links for post and comments in the head. This should be used in place 
    of the deprecated automatic_feed_link(); function. 
    =======================================================================================================
    */
    add_theme_support('automatic-feed-links');
    
    /*
    =======================================================================================================
    Enable and activate register_nav_menus(array()); for Family Grows WordPress theme. This feature when 
    enabled, allows you to create a Primary Navigation and Social Navigation menus in the dashboard under 
    Menus.
    =======================================================================================================
    */
    register_nav_menus(array(
        'primary-navigation'    => esc_html__('Primary Navigation', 'family-grows'),
        'social-navigation'     => esc_html__('Social Navigation', 'family-grows')
    ));
    
    /*
    =======================================================================================================
    Enable and activate add_theme_support('html5', array()); for Family Grows WordPress theme. This feature 
    when enabled, allows the use of HTML5 markup for search forms, comment forms, comment list, gallery, 
    and captions.
    =======================================================================================================
    */
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form', 
        'gallery',
        'caption'
    ));
    
    /*
    =======================================================================================================
    Enable and activate add_theme_support('cusom-background'); for Family Grows WordPress theme. This feature 
    allows to set backgrounds such as solid colors or custom background images.
    =======================================================================================================
    */
    add_theme_support('custom-background', array(
        'default-color' => 'eeeeee',
    ));
    
    /*
    =======================================================================================================
    Enable and activate add_theme_support('post-thumbnails); for Family Grows WordPress theme. This feature 
    enables Post Thumbnails (Featured Images) support for a theme. If you wish to display thumbnails, use 
    the following to display the_post_thumbnail();. If you need to to check of there is a post thumbnail, 
    then use has_post_thumbnail();.
    =======================================================================================================
    */
    add_theme_support('post-thumbnails');
    
    /*
    =======================================================================================================
    add_image_size('family-grows-small-thumbnails', 300, 300, true); should be used under the following 
    file, content.php.
    =======================================================================================================
    */
    add_image_size('family-grows-small-thumbnails', 300, 300, true);
    
    /*
    =======================================================================================================
    add_image_size('camaraderie-medium-thumbnails', 1200, 250, true); should be used under the following 
    files, content-single.php and content-page.php
    =======================================================================================================
    */
    add_image_size('family-grows-medium-thumbnails', 1200, 250, true);
}
add_action('after_setup_theme', 'family_grows_theme_setup');

/*
===========================================================================================================
 2.0 - Enqueue Scripts and Styles
===========================================================================================================
*/
function family_grows_enqueue_scripts_styles_setup() {
    /*
    =======================================================================================================
    Enable and activate the main stylesheet and custom stylesheet if available for Merriment WordPress Theme. 
    The main stylesheet should be enqueued rather than using @import.
    =======================================================================================================
    */
    wp_enqueue_style('family-grows-style', get_stylesheet_uri());
    wp_enqueue_style('family-grows-normalize', get_template_directory_uri() . '/css/normalize.css', '02012018', true);
    
    /*
    =======================================================================================================
    Enable and activate Google Fonts (Sanchez and Merriweather) locally for Family Grows WordPress theme. For 
    more information regarding this feature, please go the following url to begin the awesomeness of Google 
    WebFonts Helper. 
    Reference: (https://google-webfonts-helper.herokuapp.com/fonts)
    =======================================================================================================
    */
    wp_enqueue_style('family-grows-custom-fonts', get_template_directory_uri() . '/extras/fonts/custom-fonts.css', '02012018', true);
    
    /*
    =======================================================================================================
    Enable and activate Font Awesome 4.7 locally for Family Grows WordPress theme. For more information 
    regarding about Font Awesome 4.7, please do navigate to the URL for more information. 
    Reference: (http://fontawesome.io/)
    =======================================================================================================
    */
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/extras/font-awesome/css/font-awesome.css', '02012018', true);
    
    /*
    =======================================================================================================
    Enable and activate (JavaScript/JQuery) to Primary Navigation for Family Grows WordPress theme. This 
    allows you to use click feature for dropdowns and multiple depths, When using this new feature for 
    this theme. The Menu for mobile side is now at the bottom of the page for easy access.
    =======================================================================================================
    */
    wp_enqueue_script('family-grows-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '02012018', true);
	wp_localize_script('family-grows-navigation', 'familygrowsScreenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __('expand child menu', 'family-grows') . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __('collapse child menu', 'family-grows') . '</span>',
	));
    
    /*
    =======================================================================================================
    Enable and activate the threaded comments for Family Grows WordPress Theme. This allows 
    users to comment by clicking on reply so that it gets nested to the comments you are trying 
    to response too. Please do remember that you can change the depth of comment's reply in the
    comments setting in the dashboard.
    =======================================================================================================
    */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'family_grows_enqueue_scripts_styles_setup');

/*
===========================================================================================================
 3.0 - Content Width
===========================================================================================================
*/
function family_grows_content_width_setup() {
	$GLOBALS['content_width'] = apply_filters('family_grows_content_width_setup', 800);
}
add_action( 'after_setup_theme', 'family_grows_content_width_setup', 0 );

/*
===========================================================================================================
 4.0 - Register Sidebars
===========================================================================================================
*/
function family_grows_register_sidebars_setup() {
    /*
    =======================================================================================================
    Enable and activate Primary Sidebar for Family Grows WordPress Theme. The Primary Sidebar
    should only show in the blog posts only rather in the pages. 
    =======================================================================================================
    */
    register_sidebar(array(
        'name'          => __('Primary Sidebar', 'family-grows'),
        'description'   => __('Add widgets here to appear in your sidebar on Blog Posts and Archives only', 'family-grows'),
        'id'            => 'primary-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'family_grows_register_sidebars_setup');

/*
===========================================================================================================
 5.0 - Required Files
===========================================================================================================
*/
require_once(get_template_directory() . '/extras/inline-styles/header-image.php');
require_once(get_template_directory() . '/includes/extras.php');
require_once(get_template_directory() . '/includes/header-image.php');
require_once(get_template_directory() . '/includes/template-tags.php');