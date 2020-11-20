<?php
/*
============================================================================================================================
Camaraderie - blog.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This main-query.php
template file allows you to create the main query so that it keeps the pages clean as possible. 

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Content (Blog)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Content (Blog)
============================================================================================================================
*/
function camaraderie_display_custom_blog() {
    do_action('camaraderie_display_custom_blog');
}
function camaraderie_output_custom_blog() {
    $posts_per_page = 2;
    $query = new WP_Query(array(
        'post_type' => 'post', 
        'ignore_sticky_posts' => 1, 
        'posts_per_page' => $posts_per_page,
        'tax_query' => array(array(
            'taxonomy'  => 'post_format',
            'field'     => 'slug',
            'terms'     => array('post-format-quote'),
            'operator'  => 'NOT IN',
        ))
    ));
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post(); ?>
            <div class="blog-items">
                <?php the_post_thumbnail('camaraderie-blog-thumbnails'); ?>
                <header class="recent-header">
                    <h2 class="recent-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                    <span class="entry-timestamp"><?php echo camaraderie_entry_time_stamp(); ?></span>
                </header>
                <div class="entry-excerpt">
                    <?php the_excerpt(); ?>
                </div>
            </div> 
        <?php }
        wp_reset_postdata();
    }
}
add_action('camaraderie_display_custom_blog', 'camaraderie_output_custom_blog');