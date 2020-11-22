<?php
/**
 * Camaraderie ( template-home.php )
 * 
 * Template Name: Home
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
<?php get_header(); ?>
    <?php if ( 0 != $portfolio_display && isset( $portfolio_display ) ) { // phpcs:ignore ?>
        <?php Benlumia007\Backdrop\Template\get_template_part( 'section/content', 'portfolio' ); ?>
    <?php } ?>
    <?php if ( 0 != $blog_display && isset( $blog_display ) ) { // phpcs:ignore ?>
        <?php Benlumia007\Backdrop\Template\get_template_part( 'section/content', get_post_format() ); ?>
    <?php } ?>
    <?php if ( 0 != $contact_display && isset( $contact_display ) ) { // phpcs:ignore ?>
        <?php Benlumia007\Backdrop\Template\get_template_part( 'section/content', get_post_format() ); ?>
    <?php } ?>
<?php get_footer(); ?>
