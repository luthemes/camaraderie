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
$related_display = get_theme_mod('related_display');
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
    <?php if (isset($related_display) && $related_display != 0) { ?>
            <div id="related-items" class="related-items">
                <header class="entry-header">
                    <h1 class="entry-title"><?php camaraderie_custom_related_title_setup(); ?></h1>
                </header>
                <div class="entry-content">
                    <div class="jetpack-portfolio-grid">
                        <?php $query = new WP_Query(array(
                            'post_type'         => 'jetpack-portfolio', 
                            'posts_per_page'    => 3, 
                            'orderby'           => 'rand',
                            'post__not_in'      => array(get_queried_object_id())
                        )); 
                        ?>
                        <?php if ($query->have_posts()) { ?>
                            <?php while ($query->have_posts()) { ?>
                                <?php $query->the_post(); ?>
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <div class="jetpack-portfolio-items>
                                        <a href="<?php echo esc_url(get_permalink()); ?>">
                                            <?php the_post_thumbnail('camaraderie-portfolio-thumbnails'); ?>
                                        </a>
                                        <div class="wp-caption">
                                            <div class="wp-caption-text">
                                                <h3 class="jetpack-portfolio-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
                                                <small><?php echo get_post(get_post_thumbnail_id())->post_content; ?></small>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?> 
                            <?php wp_reset_postdata(); ?>
                        <?php } ?>
                    </div >
                </div>
            </div>
            <?php } ?>
<?php get_footer(); ?>