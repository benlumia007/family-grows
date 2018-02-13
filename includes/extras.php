<?php
/*
====================================================================================================================================
Family Grows - extras.php
====================================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This extras.php template file allows you to add additional features and functionality to 
a WordPress theme which is stored in the extras folder and its called in the functions.php

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
====================================================================================================================================
*/

/*
====================================================================================================================================
Table of Content
====================================================================================================================================
 1.0 - Pingback Setup
 2.0 - Post Thumbnail Setup
 3.0 - Excerpt Length Setup
 4.0 - Breadcrumb Trail Setup
====================================================================================================================================
*/

/*
====================================================================================================================================
 1.0 - Pingback Setup
====================================================================================================================================
*/
function family_grows_pingback_setup() {
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
	}
}
add_action('wp_head', 'family_grows_pingback_setup');
/*
====================================================================================================================================
 2.0 - Post Thumbnail Setup
====================================================================================================================================
*/
function family_grows_unset_has_post_thumbnail($classes) {
    $class_key = array_search('has-post-thumbnail', $classes);
    if (is_singular()) {
        unset($classes[$class_key]);
    }     
    return $classes;
}
add_filter('post_class', 'family_grows_unset_has_post_thumbnail');

/*
====================================================================================================================================
 3.0 - Excerpt Length Setup
====================================================================================================================================
*/
function family_grows_excerpt_length_setup() {
    return 50;
}
add_filter('excerpt_length', 'family_grows_excerpt_length_setup');

/*
====================================================================================================================================
 4.0 - Breadcrumb Trail Setup
====================================================================================================================================
*/
if (function_exists('breadcrumb_trail')) { 
    function family_grows_breadcrumb_trail_labels_setup($labels) {
        $labels['browse'] = 'You are Here:';
        
        return $labels;
    }
    add_filter('breadcrumb_trail_labels', 'family_grows_breadcrumb_trail_labels_setup');
    
     function family_grows_breadcrumb_trail_inline_styles_setup($style) {
        $style = '
            .breadcrumbs {
                margin: 0 auto;
                max-width: 70.875em;
                padding: 0.5em;
            }
            
            .breadcrumbs .trail-browse,
            .breadcrumbs .trail-items,
            .breadcrumbs .trail-items li {
                color: #ffffff;
                display:     inline-block;
                margin:      0;
                padding:     0;
                border:      none;
                background:  transparent;
                text-indent: 0;
            }

            .breadcrumbs .trail-browse {
                font-size:   inherit;
                font-style:  inherit;
                font-weight: inherit;
                color:       #ffffff;
                margin-right: 5px;
            }

            .breadcrumbs .trail-items {
                list-style: none;
            }
            
            .breadcrumbs .trail-items span {
                color: #ffffff;
            }

            .trail-items li::after {
                content: "\f061";
                font-family: "FontAwesome";
                padding: 0 0.5em;
            }

            .trail-items li:last-of-type::after {
                display: none;
            }';
        return $style;
    }
    add_filter('breadcrumb_trail_inline_style', 'family_grows_breadcrumb_trail_inline_styles_setup');
}