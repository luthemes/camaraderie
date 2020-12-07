<?php
/**
 * Camaraderie ( single.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<?php get_header(); ?>
	<section id="content" class="site-content">
		<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'no-sidebar' ) ); ?>">
			<main id="main" class="content-area">
				<?php
					while ( have_posts() ) : the_post();
						Benlumia007\Backdrop\Template\get_template_part( 'single/content', 'portfolio' );
					endwhile;
					comments_template();
				?>
			</main>
			<?php Benlumia007\Backdrop\View\display( 'sidebar', [ 'portfolio' ] ); ?>
		</div>
	</section>
	<div id="related-items" class="related-items">
		<div class="entry-content">
			<ul class="portfolio-grid">
				<?php $query = new WP_Query( array(
					'post_type'         => 'portfolio', 
					'posts_per_page'    => 3, 
					'orderby'           => 'rand',
					'post__not_in'      => array( get_queried_object_id() )
				) ); 
				?>
				<?php if ($query->have_posts()) { ?>
					<?php while ($query->have_posts()) { ?>
						<?php $query->the_post(); ?>
							<?php if ( has_post_thumbnail() ) { ?>
							<li>
								<a href="<?php echo esc_url(get_permalink()); ?>">
									<?php the_post_thumbnail('camaraderie-large-thumbnails'); ?>
								</a>
							<div class="wp-caption">
								<div class="wp-caption-text">
									<h3 class="portfolio-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h3>
									<span><?php echo wptexturize( wp_strip_all_tags( get_post( get_post_thumbnail_id() )->post_content ) ); // phpcs:ignore ?></span>
								</div>
							</div>
							</li>
						<?php } ?>
					<?php } ?> 
					<?php wp_reset_postdata(); ?>
				<?php } ?>
			</ul>
		</div>
	</div>
<?php get_footer(); ?>
