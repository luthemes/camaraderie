<?php
/**
 * Camaraderie ( home-portfolio.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<div id="portfolio" class="site-portfolio">
	<div class="content-area">
		<div class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Portfolio', 'camaraderie' ); ?></h1>
			<span class="entry-description"><?php esc_html_e( 'Some of my recent works', 'camaraderie' ); ?></span>
		</div>
		<div class="entry-content">
			<div class="portfolio-grid">
				<?php
					$posts_per_page = get_theme_mod( 'custom_portfolio_items', 9);
					$query          = new WP_Query( array(
						'post_type'      => 'portfolio',
						'posts_per_page' => $posts_per_page,
					) );

					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();

							if ( has_post_thumbnail() ) {
								?>
									<div class="portfolio-items">
										<a href="<?php echo esc_url( get_permalink() ); ?>">
											<?php the_post_thumbnail( 'camaraderie-large-thumbnails' ); ?>
										</a>
										<div class="wp-caption">
											<div class="wp-caption-text">
												<h3 class="portfolio-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_post_thumbnail_caption(); ?></a></h3>
												<span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); // phpcs:ignore ?></span>
											</div>
										</div>
									</div>
								<?php
							}
						}
					}
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>