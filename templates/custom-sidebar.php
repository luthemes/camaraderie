<?php 
/*
============================================================================================================================
Camaraderie - page.php
Template Name: Custom Sidebar
============================================================================================================================
The index.php template file is flexible, it can be used to include all the references for the header, content, aside, and 
footer and other pages created in WordPress. It can also be divided into modular template files, each taking on part of the 
workload. If you wish to not provide other template files, the WordPress hierarchy may have default template files or 
functions to peform their jobs.

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
<?php get_header(); ?>
    <section class="site-main">
        <div id="custom-layout" class="<?php echo esc_attr(get_theme_mod('custom_layout', 'no-sidebar')); ?>">
            <div id="content-area" class="content-area">
                <?php camaraderie_display_content_page(); ?>
            </div>
            <?php if ('left-sidebar' == get_theme_mod('custom_layout')) { ?>
                <?php get_sidebar('custom'); ?>
            <?php } else if ('right-sidebar' == get_theme_mod('custom_layout')) { ?>
                <?php get_sidebar('custom'); ?>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>