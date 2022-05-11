<?php
/**
 * Camaraderie ( single.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

 $related_display = get_theme_mod( 'related_display' );
?>
<?php $engine = Benlumia007\Backdrop\App::resolve( 'view/engine' ); ?>
<?php $engine->display( 'header' ); ?>
	<section id="content" class="site-content">
		<div id="global-layout" class="right-sidebar">
			<main id="main" class="content-area">
				<?php
					while ( have_posts() ) : the_post();
						$engine->display( 'single', 'portfolio' );
					endwhile;
					comments_template();
				?>
			</main>
			<?php Benlumia007\Backdrop\Theme\Sidebar\display( 'sidebar', [ 'portfolio' ] ); ?>
		</div>
	</section>
	<?php if ( isset( $related_display)  && $related_display != 0 ) { ?>
		<div id="related-items" class="related-items">
			<header class="related-header">
				<h1 class="related-title"><?php esc_html_e( 'Related Items', 'camaraderie' ); ?></h1>
			</header>
			<div class="entry-content">
				<ul class="portfolio-grid">
					<?php $query = new WP_Query( array(
						'post_type'         => 'backdrop-portfolio', 
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
	<?php } ?>
<?php $engine->display( 'footer' ); ?>
