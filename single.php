<?php
/*
===========================================================================================================
Family Grows - single.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files for a 
theme (the other being content-single.php). This single.php template file is used to display the loop and 
display the content in the content-single.php.

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="site-main" class="site-main">
        <div id="post-layout" class="<?php echo esc_attr(get_theme_mod('post_layout', 'no-sidebar')); ?>">
            <div id="content-area" class="content-area">
                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/content', 'single'); ?>
                <?php endwhile; ?>
                <?php 
                    the_post_navigation(array(
                        'next_text' => '<span class="post-next" aria-hiddent="true">' . __('Next', 'family-grows') . '</span>' . '<span class="post-title">%title</span>',
                        'prev_text' => '<span class="post-previous" aria-hidden="true">' . __( 'Previous', 'family-grows' ) . '</span> ' . '<span class="post-title">%title</span>',
                    ));
                ?>
                <?php comments_template(); ?>
            </div>
            <?php if ('left-sidebar' == get_theme_mod('post_layout')) { ?>
                <?php get_sidebar(); ?>
            <?php } else if ('right-sidebar' == get_theme_mod('post_layout')) { ?>
                <?php get_sidebar(); ?>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>