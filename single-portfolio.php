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
<?php get_footer(); ?>
