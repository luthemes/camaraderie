<?php
/**
 * Camaraderie ( template-home.php )
 *
 * @package   Camaraderie
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2019-2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/camaraderie
 */
$portfolio_display = get_theme_mod( 'custom_portfolio_display' );
$blog_display      = get_theme_mod( 'custom_blog_display' );
$contact_display   = get_theme_mod( 'custom_contact_display' );
?>
<?php Backdrop\Template\View\display( 'header' ); ?>
    <?php if ( 0 != $portfolio_display && isset( $portfolio_display ) ) { ?>
        <?php Backdrop\Template\View\display( 'section/portfolio' ); ?>
    <?php } ?>
    <?php if ( 0 != $blog_display && isset( $blog_display ) ) { ?>
	<?php Backdrop\Template\View\display( 'section/blog' ); ?>
    <?php } ?>
<?php Backdrop\Template\View\display( 'footer' ); ?>
