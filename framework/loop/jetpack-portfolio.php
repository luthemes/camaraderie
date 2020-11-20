<?php
/*
============================================================================================================================
Camaraderie - main-query.php
============================================================================================================================
This is the most generic template file in a WordPress theme and is one of the required file for a theme. This main-query.php
template file allows you to create the main query so that it keeps the pages clean as possible. 

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
 1.0 - Content (Jetpack Portfolio)
 2.0 - Content (Jetpack Portfolio Archive)
 3.0 - Content (Jetpack Portfolio Grid System)
============================================================================================================================
*/
/*
============================================================================================================================
 1.0 - Content (Jetpack Portfolio)
============================================================================================================================
*/
function camaraderie_display_jetpack_portfolio() {
    do_action('camaraderie_display_jetpack_portfolio');
}
function camaraderie_output_jetpack_portfolio() {
    while (have_posts()) : the_post();
        get_template_part('views/jetpack-portfolio/content', 'jetpack-portfolio');
    endwhile;
    the_posts_navigation(array(
        'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'camaraderie' ) . '</span>' . '<span class="post-title">Projects</span>',
        'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Newer', 'camaraderie') . '</span>' . '<span class="post-title">Projects</span>',
    ));
    comments_template();
}
add_action('camaraderie_display_jetpack_portfolio', 'camaraderie_output_jetpack_portfolio');
/*
============================================================================================================================
 2.0 - Content (Jetpack Portfolio Archive)
============================================================================================================================
*/
function camaraderie_display_archive_jetpack_portfolio() {
    do_action('camaraderie_display_archive_jetpack_portfolio');
}
function camaraderie_output_archive_jetpack_portfolio() {
    if (have_posts()) :
        get_template_part('views/jetpack-portfolio/content', 'archive-jetpack-portfolio');
        the_posts_navigation(array(
            'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'camaraderie' ) . '</span>' . '<span class="post-title">Projects</span>',
            'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Newer', 'camaraderie') . '</span>' . '<span class="post-title">Projects</span>',
        ));
    else :
        get_template_part('template-parts/content', 'none');
    endif;
}
add_action('camaraderie_display_archive_jetpack_portfolio', 'camaraderie_output_archive_jetpack_portfolio');
/*
============================================================================================================================
 3.0 - Content (Jetpack Portfolio Grid System)
============================================================================================================================
*/
function camaraderie_display_jetpack_portfolio_grid() {
    do_action('camaraderie_display_jetpack_portfolio_grid');
}
function camaraderie_output_jetpack_portfolio_grid() {
    if (is_front_page() && !is_home()) { 
        $posts_per_page = get_option('jetpack_portfolio_posts_per_page');
        $query = new WP_Query(array('post_type'   => 'jetpack-portfolio', 'posts_per_page' => $posts_per_page));
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                    if (has_post_thumbnail()) { ?>
                        <div class="jetpack-portfolio-items">
                            <a href="<?php echo esc_url(get_permalink()); ?>">
                                <?php the_post_thumbnail('camaraderie-jetpack-portfolio-thumbnails'); ?>
                            </a>
                            <div class="wp-caption">
                                <div class="wp-caption-text">
                                    <h3 class="jetpack-portfolio-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail_caption(); ?></a></h3>
                                    <small><?php echo get_post_field('post_content', get_post_thumbnail_id()); ?></small>
                                </div>
                            </div>
                        </div>
              <?php }
            }
            wp_reset_postdata();
        }
    } else {
        while (have_posts()) : the_post(); ?>
            <div class="jetpack-portfolio-items">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_post_thumbnail('camaraderie-jetpack-portfolio-thumbnails'); ?>
                </a>
                <div class="wp-caption">
                    <div class="wp-caption-text">
                        <h3 class="jetpack-portfolio-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                        <small><?php echo get_post(get_post_thumbnail_id())->post_content; ?></small>
                    </div>
                </div>
            </div>
    <?php endwhile; 
    }
}
add_action('camaraderie_display_jetpack_portfolio_grid', 'camaraderie_output_jetpack_portfolio_grid');