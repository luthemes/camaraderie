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
<?php Backdrop\Template\View\display( 'header' ); ?>
	<section id="content" class="site-content">
		<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
			<main id="main" class="content-area">
				<?php
					while ( have_posts() ) : the_post();
						Backdrop\Template\View\display( 'single' );
					endwhile;
						the_post_navigation(
							array(
								'next_text' => '<span class="post-next" aria-hiddent="true">' . esc_html__( 'Next', 'camaraderie' ) . '</span><span class="post-title">%title</span>',
								'prev_text' => '<span class="post-previous" aria-hidden="true">' . esc_html__( 'Previous', 'camaraderie' ) . '</span><span class="post-title">%title</span>',
							)
						);
				comments_template();
				?>
			</main>
			<?php Backdrop\Theme\Menu\display( 'sidebar', [ 'primary' ] ); ?>
		</div>
	</section>
<?php Backdrop\Template\View\display( 'footer' ); ?>