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
 1.0 - Content (Jetpack Testimonial)
 2.0 - Content (Jetpack Testimonial Archive)
 3.0 - Content (Jetpack Testimonial Grid System)
============================================================================================================================
*/

/*
============================================================================================================================
 1.0 - Content (Jetpack Testimonial)
============================================================================================================================
*/
function camaraderie_display_jetpack_testimonial() {
    do_action('camaraderie_display_jetpack_testimonial');
}
function camaraderie_output_jetpack_testimonial() {
    while (have_posts()) : the_post();
        get_template_part('views/jetpack-testimonial/content', 'jetpack-testimonail');
    endwhile;
    the_posts_navigation(array(
        'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'camaraderie' ) . '</span>' . '<span class="post-title">Projects</span>',
        'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Newer', 'camaraderie') . '</span>' . '<span class="post-title">Projects</span>',
    ));
    comments_template();
}
add_action('camaraderie_display_jetpack_testimonial', 'camaraderie_output_jetpack_testimonial');
/*
============================================================================================================================
 2.0 - Content (Jetpack testimonial Archive)
============================================================================================================================
*/
function camaraderie_display_archive_jetpack_testimonial() {
    do_action('camaraderie_display_archive_jetpack_testimonial');
}
function camaraderie_output_archive_jetpack_testimonial() {
    if (have_posts()) :
        get_template_part('views/jetpack-testimonial/content', 'archive-jetpack-testimonial');
        the_posts_navigation(array(
            'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Older', 'camaraderie' ) . '</span>' . '<span class="post-title">Projects</span>',
            'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__('Newer', 'camaraderie') . '</span>' . '<span class="post-title">Projects</span>',
        ));
    else :
        get_template_part('template-parts/content', 'none');
    endif;
}
add_action('camaraderie_display_archive_jetpack_testimonial', 'camaraderie_output_archive_jetpack_testimonial');
/*
============================================================================================================================
 3.0 - Content (Jetpack testimonial Grid System)
============================================================================================================================
*/
function camaraderie_display_jetpack_testimonial_grid() {
    do_action('camaraderie_display_jetpack_testimonial_grid');
}
function camaraderie_output_jetpack_testimonial_grid() {
    if (is_front_page() && !is_home()) { 
        $posts_per_page = get_option('jetpack_testimonial_posts_per_page');
        $query = new WP_Query(array('post_type'   => 'jetpack-testimonial', 'posts_per_page' => $posts_per_page));
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                    if (has_post_thumbnail()) { ?>
                        <div class="jetpack-testimonial-items">
                            <?php the_post_thumbnail('camaraderie-testimonial-thumbnails'); ?>
                            <div class="testimonial-header">
                                <h3 class="testimonial-title"><?php the_post_thumbnail_caption(); ?></h3>
                                <small><?php echo get_post(get_post_thumbnail_id())->post_content; ?></small>
                            </div>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        </div>
              <?php }
            }
            wp_reset_postdata();
        }
    } else {
        while (have_posts()) : the_post(); ?>
            <div class="jetpack-testimonial-items">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_post_thumbnail('camaraderie-testimonial-thumbnails'); ?>
                </a>
                <div class="wp-caption">
                    <div class="wp-caption-text">
                        <h3 class="jetpack-testimonial-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                        <small><?php echo get_post(get_post_thumbnail_id())->post_content; ?></small>
                    </div>
                </div>
            </div>
    <?php endwhile; 
    }
}
add_action('camaraderie_display_jetpack_testimonial_grid', 'camaraderie_output_jetpack_testimonial_grid');