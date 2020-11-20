<?php
/**
 * Initiator ( header.php )
 *
 * @package     Initiator
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

use Benlumia007\Backdrop\Site\Site as site;
use Benlumia007\Backdrop\View\View as menu;
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
<div id="container" class="site-container">
	<?php menu::display( 'menu', [ 'primary' ] ); ?>
		<?php $is_front = ( is_front_page() && ! is_home() ); ?>
		<header id="header" class="site-header <?php echo $is_front ? 'custom' : 'header'; ?>-image">
		<?php if ( $is_front ) { ?>
			<div class="site-avatar"></div>
		<?php } ?>
		<div class="site-branding">
			<?php site::display( 'site-title' ); ?>
			<?php site::display( 'site-description' ); ?>
		</div>
		</header>