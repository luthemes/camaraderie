<?php
/*
===========================================================================================================
luthemes - index.php
===========================================================================================================
This is the most generic template file in a WordPress Theme and is one of the two required files for a 
theme (the other being style.css). The index.php template file is flexible. It can be used to include all 
references to the header, content, widget, footer and any other pages created in WordPress. Or it can be 
divided into modular template files, each taking on part of the workload. If you do not provide other 
template files, WordPress may have default files or functions to perform their jobs.

@package        luthemes WordPress Theme
@copyright      Copyright (C) 2018. Benjamin Lu
@license        GNU General Public License v2 or later (http://www.gnu.org/licenses/gpl-2.0.html)
@author         Benjamin Lu (https://www.luthemes.com/)
===========================================================================================================
*/
?>
<?php get_header(); ?>
    <div id="site-main" class="site-main">
        <div id="content-area" class="content-area">
            <?php camaraderie_display_archive_jetpack_portfolio(); ?>
        </div>
    </div>
<?php get_footer(); ?>