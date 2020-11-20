<?php
/*
============================================================================================================================
Camaraderie - /framework/template/general.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This framework.php
template file allows you to add features and functionality has been preset to be used in this WordPress theme which is store
in the theme's framework directory.

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
 1.0 - Display (Site Title)
 2.0 - Display (Site Description)
 3.0 - Display (Site Link)
 4.0 - Display (WordPress Link)
 5.0 - Display (Theme Link)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Display (Site Title)
============================================================================================================================
*/
function camaraderie_display_site_title() {
    echo camaraderie_output_site_title(); 
}

function camaraderie_output_site_title() {
    $site_title = get_bloginfo('name');

    if ($site_title) {
        $site_title = sprintf('<h1 class="site-title"><a href="%s">%s</a></h1>', esc_url(home_url('/')), $site_title);
    }
    return apply_filters('camaraderie_display_site_title', $site_title);
}

/*
============================================================================================================================
 2.0 - Display (Site Description)
============================================================================================================================
*/
function camaraderie_display_site_description() {
    echo camaraderie_output_site_description();
}

function camaraderie_output_site_description() {
    $site_description = get_bloginfo('description');

    if ($site_description) {
        $site_description = sprintf('<h3 class="site-description">%s</h3>', $site_description);
    }
    return apply_filters('camaraderie_display_site_description', $site_description);
}

/*
============================================================================================================================
 3.0 - Display (Site Link)
============================================================================================================================
*/
function camaraderie_display_site_link() {
    echo camaraderie_output_site_link();
}

function camaraderie_output_site_link() {
    return sprintf('<a href="%s">%s</a>', esc_url(home_url('/')), get_bloginfo('name'));
}

/*
============================================================================================================================
 4.0 - Display (WordPress Link)
============================================================================================================================
*/
function camaraderie_display_wp_link() {
    echo camaraderie_output_wp_link();
}

function camaraderie_output_wp_link() {
    return sprintf('<a href="%s">%s</a>', esc_url(__('https://wordpress.org', 'camaraderie')), esc_html__('WordPress', 'camaraderie'));
}

/*
============================================================================================================================
 5.0 - Display (Theme Link)
============================================================================================================================
*/
function camaraderie_display_theme_link() {
    echo camaraderie_output_theme_link();
}

function camaraderie_output_theme_link() {
    $theme_name = wp_get_theme(get_template());
    $allowed = array('abbr' => array('title' => true), 'acronym' => array('title' => true), 'code' => true, 'em' => true, 'strong' => true);
 
    return sprintf( '<a href="%s">%s</a>', $theme_name->display('ThemeURI'), wp_kses($theme_name->display('Name'), $allowed));
}