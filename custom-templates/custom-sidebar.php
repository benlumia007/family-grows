<?php
/*
===========================================================================================================
Family Grows - custom-sidebar.php
Template Name: Custom Sidebar
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
        <div id="custom-layout" class="<?php echo esc_attr(get_theme_mod('custom_layout', 'no-sidebar')); ?>">
            <div id="content-area" class="content-area">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'page'); ?>
                <?php endwhile; ?>
                <?php comments_template(); ?>
            </div>
            <?php if ('left-sidebar' == get_theme_mod('custom_layout')) { ?>
                <?php get_sidebar('custom'); ?>
            <?php } else if ('right-sidebar' == get_theme_mod('custom_layout')) { ?>
                <?php get_sidebar('custom'); ?>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>