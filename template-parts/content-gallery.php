<?php
/*
===========================================================================================================
Family Grows - content.php
===========================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display content. 
This content.php is the main content that will be displayed when is on front page, home or index.

@package        Family Grows WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
===========================================================================================================
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="post-thumbnail">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('family-grows-small-thumbnails'); ?></a>
    </div>
    <header class="entry-header">
        <span class="entry-timestamp"><?php echo family_grows_entry_time_stamp_setup(); ?></span>
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', esc_url(get_permalink())), '</a></h1>'); ?>
    </header>
    <div class="entry-excerpt">
        <?php the_excerpt(); ?>
        <div class="continue-reading">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php
                    printf(
                        wp_kses(__('View Gallery %s', 'family-grows'), array('span' => array('class' => array()))),
                        the_title('<span class="screen-reader-text">"', '"</span>', false)
                    );
                ?>
            </a>
        </div>
    </div>
</article>