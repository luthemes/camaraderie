<?php
/*
================================================================================================
Camaraderie - views/secton/section-jetpack-portfolio.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed when is on front page, home
or index.
@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017-2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://benjlu.com/)
================================================================================================
*/
?>
<section class="section-portfolio">
    <div class="site-main">
        <header class="entry-header">
            <h1 class="entry-title"><?php camaraderie_jetpack_portfolio_title_setup(); ?></h1>
            <span class="entry-description"><?php camaraderie_jetpack_portfolio_content(); ?></span>
        </header>
        <div class="entry-content">
            <div class="jetpack-portfolio-grid">
                <?php camaraderie_display_jetpack_portfolio_grid(); ?>
            </div>
        </div>
    </div>
</section>