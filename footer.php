<?php
/*
================================================================================================
Online Portfolio - footer.php
================================================================================================
This is the most generic template file in a WordPress theme and is one of the two required files 
for a theme (the other header.php). The footer.php template file only displays the footer section
of this theme. This also displays the navigation menu for Socal Navigation as well.

@package        Online Portfolio WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjaminlu.net/)
================================================================================================
*/
?>
    </section>
    <?php if (has_nav_menu('social-navigation')) { ?>
        <div id="site-social" class="site-social">
            <?php
                wp_nav_menu(array(
                    'theme_location'    => 'social-navigation',
                    'container'         => 'nav',
                    'container_id'      => 'menu-social',
                    'container_class'   => 'menu-social',
                    'menu_id'           => 'menu-social-items',
                    'menu_class'        => 'menu-items',
                    'depth'             => 1,
                    'link_before'       => '<span class="screen-reader-text">',
                    'link_after'        => '</span>',
                    'fallback_cb'       => '',
                ));                                  
            ?>
        </div>
    <?php } ?>
    <footer id="site-footer" class="site-footer">
        <div id="site-info" class="site-info">
            <span class="footer-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></span>
            <small><i class="fa fa-copyright" aria-hidden="true"></i> <?php esc_html_e('2014-2017. ', 'camaraderie'); ?><?php esc_html_e('All Rights Reserved', 'camaraderie'); ?></small>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>