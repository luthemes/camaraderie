<?php
/**
 * Camaraderie ( content-portfolio.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://luthemes.com )
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
        <h1 class="entry-title"><?php esc_html_e( 'Portfolio', 'camaraderie' ); ?></h1>
	</header>
    <div class="entry-content">
        <ul class="portfolio-items">
            <?php while (have_posts()) : the_post(); ?>
                <li class="portfolio-item">
                    <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_post_thumbnail('camaraderie-large-thumbnails'); ?></a>
					<div class="wp-caption">
						<h2 class="wp-caption-text"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
						<span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); // phpcs:ignore ?></span>
					</div>
                </li>
            <?php endwhile; ?>
        </ul>
    </div>
</article>