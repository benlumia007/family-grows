<?php
/*
===========================================================================================================
Family Grows - misc.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of required file to change the height
if is_singular(); so that it does not have an extra white space at the bottom of each post or page. This 

feature works by using wp_add_inline_style();.

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
function family_grows_inline_styles_misc_setup() {
        $custom_css = '';
        
        if (is_singular()) {
            $custom_css = "    
                .content-area .post,
                .content-area .page {
                    min-height: 0;
                }
            ";
        }
        wp_add_inline_style('family-grows-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'family_grows_inline_styles_misc_setup');