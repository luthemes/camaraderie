<?php
/**
 * Camaraderie ( content-single.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<section id="blog" class="site-blog">
    <div class="content-area">
        <header id="header" class="blog-header">
            <h1 class="blog-title"><?php esc_html_e( 'Blog', 'camaraderie' ); ?></h1>
            <span class="blog-description"><?php esc_html_e( 'Latest News', 'camaraderie' ); ?></span>
        </header>
        <div class="blog-content">
            <ul class="blog-items">
                <?php
                    $posts_per_page = 2;
                    $query          = new WP_Query(
                        array(
                            'post_type'           => 'post',
                            'ignore_sticky_posts' => 1,
                            'posts_per_page'      => $posts_per_page,
                        )
                    );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                            $query->the_post();
                            ?>
                                <li class="blog-item">
                                    <?php the_post_thumbnail( 'camaraderie-medium-thumbnails' ); ?>
                                    <header class="entry-header">
                                        <h1 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h1>
                                        <div class="entry-metadata">
                                            <?php Benlumia007\Backdrop\Theme\Entry\display_author(); ?>
                                            <?php Benlumia007\Backdrop\Theme\Entry\display_date(); ?>
                                            <?php Benlumia007\Backdrop\Theme\Entry\display_comments_link(); ?>
                                        </div>
                                    </header>
                                    <div class="entry-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </li>
                            <?php
                        }
                    }
                ?>
            </ul>
        </div>
    </div>
</section>
