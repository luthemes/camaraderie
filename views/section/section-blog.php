<?php
/*
================================================================================================
Camaraderie - content-blog.php
================================================================================================
This is the most generic template file in a WordPress theme and is one required files to display
content. This content.php is the main content that will be displayed when is on front page, home
or index.
@package        Camaraderie WordPress Theme
@copyright      Copyright (C) 2017. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.benjlu.com/)
================================================================================================
*/
?>
<section class="section-blog">
    <div class="site-main">
        <header class="entry-header">
            <h1 class="entry-title"><?php camaraderie_custom_blog_title_setup(); ?></h1>
            <span class="entry-description"><?php camaraderie_custom_blog_description_setup(); ?></span>
        </header>
        <div class="entry-content">
            <div class="blog-grid">
                <?php camaraderie_display_custom_blog(); ?>
            </div>
        </div>
    </div>
</section>