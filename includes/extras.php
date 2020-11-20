<?php
/*
================================================================================================
Camaraderie - extras.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This extras.php template file allows you to add additional features and functionality to 
a WordPress theme which is stored in the extras folder and its called in the functions.php

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/

/*
================================================================================================
Table of Content
================================================================================================
 1.0 - Pingback Setup
 2.0 - Post Thumbnail Setup
 3.0 - Excerpt Length Setup
================================================================================================
*/

/*
================================================================================================
 1.0 - Pingback Setup
================================================================================================
*/

/*
================================================================================================
 2.0 - Post Thumbnail Setup
================================================================================================
*/
function camaraderie_unset_has_post_thumbnail($classes) {
    $class_key = array_search('has-post-thumbnail', $classes);
    if (is_singular() || is_post_type_archive('themes')) {
        unset($classes[$class_key]);
    }     
    return $classes;
}
add_filter('post_class', 'camaraderie_unset_has_post_thumbnail');

/*
================================================================================================
 3.0 - Excerpt Length Setup
================================================================================================
*/
function camaraderie_excerpt_length_setup() {
    return 50;
}
add_filter('excerpt_length', 'camaraderie_excerpt_length_setup');

function camaraderie_customize_control_print_styles_setup() {
    wp_enqueue_style('online-portfolio-customize-control-print-style', get_template_directory_uri() . '/css/customize-controls/checkbox.css');
}
add_action('customize_controls_print_styles', 'camaraderie_customize_control_print_styles_setup');



