<?php
/*
================================================================================================
Camaraderie - extras.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This extras.php template file allows you to add additional features and functionality to 
a WordPress theme which is stored in the extras folder and its called in the functions.php

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Post Thumbnail Setup
 2.0 - Excerpt Length Setup
 3.0 - Post Thumbnail Layout
================================================================================================
*/

/*
================================================================================================
 1.0 - Post Thumbnail Setup
================================================================================================
*/
function camaraderie_unset_has_post_thumbnail($classes) {
    $class_key = array_search('has-post-thumbnail', $classes);
    if (is_singular() || is_post_type_archive('jetpack-portfolio') || is_post_type_archive('jetpack-testimonial')) {
        unset($classes[$class_key]);
    }     
    return $classes;
}
add_filter('post_class', 'camaraderie_unset_has_post_thumbnail');
/*
================================================================================================
 2.0 - Excerpt Length Setup
================================================================================================
*/
function camaraderie_excerpt_length_setup() {
   if (!is_admin()) {
       return 50;
   }
}
add_filter('excerpt_length', 'camaraderie_excerpt_length_setup');
function camaraderie_excerpt_more($more) {
    global $post;
    $more = 'more...';
    return '<a class="read-more" href="'. esc_url(get_permalink($post->ID)) . '"> ('. esc_html($more) .')</a>';
}
add_filter('excerpt_more', 'camaraderie_excerpt_more');

/*
================================================================================================
 3.0 - Post Thumbnail Layout
================================================================================================
*/
function camaraderie_display_post_thumbnails() {
    do_action('camaraderie_display_post_thumbnails');
}

function camaraderie_output_post_thumbnails() {
    if (has_post_thumbnail()) {
        $size = 'no-sidebar' === get_theme_mod('global_layout', 'no-sidebar') ? 'large' : 'medium';

        the_post_thumbnail("camaraderie-{$size}-thumbnails");
    }
 }
add_action('camaraderie_display_post_thumbnails', 'camaraderie_output_post_thumbnails');