<?php
/**
 * Default index template
 *
 * @package   Camaraderie
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/luthemes.com
 */
?>
<?php Backdrop\Template\View\display( 'header' ); ?>
<section id="content" class="site-content">
	<div id="layout" class="no-sidebar">
		<main id="main" class="content-area">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					Backdrop\Template\View\display( 'content' );
				endwhile;
				the_posts_pagination();
			else :
				Backdrop\Template\View\display( 'content/none' );
			endif;
			?>
		</main>
	</div>
</section>
<?php Backdrop\Template\View\display( 'footer' ); ?>