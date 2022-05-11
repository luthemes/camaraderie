<?php
/**
 * Camaraderie ( header.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2018-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="profile" href="https://gmpg.org/xfn/11" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="container" class="site-container">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'camaraderie' ) ?></a>
	<?php $is_front = ( is_front_page() && ! is_home() ); ?>
		<section id="masthead" class="primary-navigation">
			<?php Benlumia007\Backdrop\Theme\Menu\display( 'menu', [ 'primary' ] ); ?>
		</section>
		<header id="header" class="site-header <?php echo $is_front ? 'custom' : 'header'; ?>-image">
				<div class="site-branding">
				<?php if ( $is_front ) { ?>
					<div class="site-avatar"></div>
				<?php } ?>
				<?php Benlumia007\Backdrop\Theme\Site\display_site_title(); ?>
				<?php Benlumia007\Backdrop\Theme\Site\display_site_description(); ?>
			</div>
		</header>