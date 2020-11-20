<?php
/*
============================================================================================================================
Camaraderie - content-single.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display content. This template file,
content-single.php is the main content that will be displayed.

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
============================================================================================================================
        
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php camaraderie_display_post_thumbnails(); ?>
    <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title">', '</h1>')); ?>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
        <?php wp_link_pages( array(
            'before'      => '<div class="page-links">' . esc_html__('Pages:', 'camaraderie'),
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            'pagelink'    => '<span class="screen-reader-text">' . esc_html__('Page', 'camaraderie') . ' </span>%',
            'separator'   => '<span class="screen-reader-text">,</span> ',
        ));
        ?>
    </div>
</article>