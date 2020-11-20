<?php
/*
============================================================================================================================
Camaraderie - /framework/menu/primary.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This default.php
will display all the necessary.

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
 1.0 - Primary Navigation
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Primary Navigation
============================================================================================================================
*/
function camaraderie_display_primary_navigation() {
    do_action('camaraderie_display_primary_navigation');
}
function camaraderie_output_primary_navigation() {
    if (has_nav_menu('primary')) { ?>
        <nav id="site-navigation" class="primary-navigation">
            <button class="menu-toggle" aria-conrol="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'camaraderie'); ?></button>
            <?php wp_nav_menu(array(
                'theme_location'    => 'primary',
                'menu_id'           => 'primary-menu',
                'menu_class'        => 'nav-menu'   
            )); 
            ?>
        </nav>
    <?php }
}
add_action('camaraderie_display_primary_navigation', 'camaraderie_output_primary_navigation');