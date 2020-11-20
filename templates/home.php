<?php 
/*
============================================================================================================================
Camaraderie - /templates/home.php
Template Name: Home
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for this theme. This home.php is
a template file that allows you to set it as a static page and it will use this to display custom different views for this
theme.
@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/
$jetpack_portfolio_display = get_theme_mod('jetpack_portfolio_display');
$blog_display = get_theme_mod('blog_display');
$testimonial_display = get_theme_mod('testimonial_display');
$contact_display = get_theme_mod('contact_display');
?>
<?php get_header(); ?>
    <?php if (isset($jetpack_portfolio_display) && $jetpack_portfolio_display != 0) { ?>
        <?php get_template_part('views/section/section', 'jetpack-portfolio'); ?>
    <?php } ?>
    <?php if (isset($blog_display) && $blog_display != 0) { ?>
        <?php get_template_part('views/section/section', 'blog'); ?>
    <?php } ?>
    <?php if (isset($testimonial_display) && $testimonial_display != 0) { ?>
        <?php get_template_part('views/section/section', 'testimonial'); ?>
    <?php } ?>
    <?php if (isset($contact_display) && $contact_display != 0) { ?>
        <?php get_template_part('views/section/section', 'contact'); ?>
    <?php } ?>
<?php get_footer(); ?>