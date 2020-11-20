<?php
/*
================================================================================================
Camaraderie - single-jetpack-portfolio.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for 
a theme. This is single-portfolio.php is controlled by Jetpack Plugin for Custom Post Type for it
to work properly. 
@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
================================================================================================
*/
?>
<?php get_header(); ?>
    <section id="site-main" class="site-main">
        <div id="portfolio-layout" class="<?php echo esc_attr(get_theme_mod('portfolio_layout', 'no-sidebar')); ?>">
            <div id="content-area" class="content-area">
                <?php camaraderie_display_jetpack_portfolio(); ?>
            </div>
            <?php if ('left-sidebar' == get_theme_mod('portfolio_layout')) { ?>
                <?php get_sidebar('portfolio'); ?>
            <?php } ?>
            <?php if ('right-sidebar' == get_theme_mod('portfolio_layout')) { ?>
                <?php get_sidebar('portfolio'); ?>
            <?php } ?>
        </div>
    </section>
<?php get_footer(); ?>