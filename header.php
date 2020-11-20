<?php
/*
============================================================================================================================
Camaraderie - header.php
============================================================================================================================
The header.php template file only displays the header section for this theme. 

@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="https://gmpg.org/xfn/11" rel="profile" />
        <?php wp_head(); ?>
    </head>
<body <?php body_class(); ?>>
    <?php camaraderie_display_primary_navigation(); ?>
    <?php camaraderie_display_site_header(); ?>
    <section id="content" class="site-content">