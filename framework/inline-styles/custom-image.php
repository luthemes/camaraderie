<?php
/*
============================================================================================================================
Camaraderie - custom-image.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This custom-image.php
template file allows you to add features and functionality has been preset to be used in this WordPress theme which is store
in the theme's framework directory.

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - Cutom Image (Inline Style)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Required Files
============================================================================================================================
*/
function camaraderie_custom_image_inline_style_setup() {
    $custom_image = esc_url(get_theme_mod('custom_image', get_theme_file_uri('/framework/assets/images/custom-image.jpg')));
    $avatar = esc_url(get_theme_mod('custom_avatar', get_theme_file_uri('/framework/assets/images/avatar.jpg')));
    $custom_css = "      
        .site-header {
            padding-top: 15em;
            min-height: 100vh;
        }  

        .site-header.custom-image {
            background: url({$custom_image});
            background-attachment: fixed;
            background-position: center;
        }
        
        .site-avatar {
            background: url({$avatar}) no-repeat;
            border: 0.625em solid #cccccc;
            border-radius: 50%;
            height: 15.625em;
            margin: 1em auto;
            width: 15.625em;
        }
    ";
    wp_add_inline_style('camaraderie-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'camaraderie_custom_image_inline_style_setup');