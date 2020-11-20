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
 1.0 - Display (Custom Header
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Display (Custom Header
============================================================================================================================
*/
function camaraderie_display_site_header() {
    do_action('camaraderie_display_site_header');
}

function camaraderie_output_site_header() {
    $is_front = (is_front_page() && !is_home()); ?>
    <header id="header" class="site-header <?php echo $is_front ? 'custom' : 'header' ?>-image">
        <?php if ($is_front) { ?>
            <div class="site-avatar"></div>
        <?php } ?>      
        <div class="site-branding">
            <?php 
                camaraderie_display_site_title();
                camaraderie_display_site_description();
            ?>
        </div>
    </header>
<?php }
add_action('camaraderie_display_site_header', 'camaraderie_output_site_header');