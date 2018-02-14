<?php
/*
===========================================================================================================
Family Grows - right-sidebar.php
Template Name: Right Sidebar
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a theme 
(the other being content-page.php). This custom-sidebar.php uses the content-page.php to display the content 
while giving the custom layout output. 

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="site-main" class="site-main">
        <div id="right-layout" class="right-sidebar">
            <div id="content-area" class="content-area">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                <?php endwhile; ?>
                <?php 
                    the_post_navigation(array(
                        'next_text' => '<span class="post-next" aria-hiddent="true">' . __('Next', 'family-grows') . '</span>' . '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="post-previous" aria-hidden="true">' . __( 'Previous', 'family-grows' ) . '</span> ' . '<span class="post-title">%title</span>',
                    ));
                ?>
                <?php comments_template(); ?>
            </div>
            <?php get_sidebar('page'); ?>
        </div>
    </section>
<?php get_footer(); ?>