<?php
/**
 * Camaraderie ( 404.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<?php Backdrop\Template\View\display( 'header' ); ?>
	<section id="content" class="site-content">
		<div id="global-layout" class="<?php echo esc_attr( get_theme_mod( 'global_layout', 'left-sidebar' ) ); ?>">
			<main id="main" class="content-area">
				<?php Backdrop\Template\View\display( 'content/404' ); ?>
			</main>
			<?php Backdrop\Theme\Sidebar\display( 'sidebar', [ 'primary' ] ); ?>
		</div>
	</section>
<?php Backdrop\Template\View\display( 'footer' ); ?>