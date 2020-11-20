<?php
/*
============================================================================================================================
Camaraderie - /framework/framework.php
============================================================================================================================
This framework.php template file uses an array_map(); feature that allows you add or remove require file automatically 
without the need to type lines and lines of require_once();. This way it will be easier to maintain and only use the files
are needed.

@package        benjlu WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com)
============================================================================================================================
*/

/*
============================================================================================================================
Table of Content
============================================================================================================================
 1.0 - array_map ($config)
 2.0 - array_map ($menu)
 3.0 - array_map ($core)
 4.0 - array_map ($template)
 5.0 - array_map ($line_styles)
 6.0 - array_map ($customize)
 7.0 - array_map ($loop)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - array_map ($config)
============================================================================================================================
*/
array_map(function($config) {
    require_once(get_parent_theme_file_path("/framework/config/{$config}.php"));
}, [
    'functions-extras',
    'functions-scripts',
    'functions-setup',
    'functions-sidebars',
    'functions-tags'
]);

/*
============================================================================================================================
 2.0 - array_map ($menu)
============================================================================================================================
*/
array_map(function($menu) {
    require_once(get_parent_theme_file_path("/framework/menu/{$menu}.php"));
}, [
    'primary',
    'social'
]);

/*
============================================================================================================================
 3.0 - array_map ($core)
============================================================================================================================
*/
array_map(function($core) {
    require_once(get_parent_theme_file_path("/framework/core/{$core}.php"));
}, [
    'custom-header',
]);

/*
============================================================================================================================
 4.0 - array_map ($template)
============================================================================================================================
*/
array_map(function($template) {
    require_once(get_parent_theme_file_path("/framework/template/{$template}.php"));
}, [
    'footer',
    'general',
    'header'
]);

/*
============================================================================================================================
 5.0 - array_map ($inline_styles)
============================================================================================================================
*/
array_map(function($line_styles) {
    require_once(get_parent_theme_file_path("/framework/inline-styles/{$line_styles}.php"));
}, [
    'custom-image',
    'header-image'
]);

/*
============================================================================================================================
 6.0 - array_map ($customize)
============================================================================================================================
*/
array_map(function($customize) {
    require_once(get_parent_theme_file_path("/framework/customize/{$customize}.php"));
}, [
    'custom-image',
    'jetpack-portfolio',
    'theme-layouts'
]);

/*
============================================================================================================================
 7.0 - array_map ($loop)
============================================================================================================================
*/
array_map(function($loop) {
    require_once(get_parent_theme_file_path("/framework/loop/{$loop}.php"));
}, [
    'custom-blog',
    'jetpack-portfolio',
    'jetpack-testimonial',
    'main-query',
]);