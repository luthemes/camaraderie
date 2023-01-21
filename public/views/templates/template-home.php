<?php
/**
 * Camaraderie ( template-home.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
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
