<?php
/**
 * Camaraderie ( home-blog.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<div id="blog" class="site-blog">
	<div class="content-area">
		<div class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Blog', 'camaraderie' ); ?></h1>
			<span class="entry-description"><?php esc_html_e( 'Latest News', 'camaraderie' ); ?></span>
		</div>
		<div class="entry-content">
			<ul class="blog-grid">
				<?php
					$posts_per_page = 2;
					$query          = new \WP_Query(
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
								<li>
									<?php the_post_thumbnail( 'camaraderie-medium-thumbnails' ); ?>
									<header class="entry-header">
										<h1 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h1>
										
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
</div>