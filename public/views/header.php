<?php
/**
 * Default header template
 *
 * @package   Camaraderie
 * @author    Benjamin Lu <benlumia007@gmail.com>
 * @copyright 2017-2023. Benjamin Lu
 * @license   https://www.gnu.org/licenses/gpl-2.0.html
 * @link      https://github.com/benlumia007/camaraderie
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
		<section id="masthead" class="primary-naviggation">
			<?php Backdrop\Template\View\display( 'nav/menu', 'primary', [ 'location' => 'primary' ] ); ?>
		</section>
		<header id="header" class="site-header <?php echo $is_front ? 'custom' : 'header'; ?>-image">
				<div class="site-branding">
				<?php if ( $is_front ) { ?>
					<div class="site-avatar"></div>
				<?php } ?>
				<?php Camaraderie\Site\display_site_title(); ?>
				<?php Camaraderie\Site\display_site_description(); ?>
			</div>
		</header>