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

if ( isset( $data->location ) && has_nav_menu( $data->location ) ) { ?>
	<nav id="primaire" class="primary-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'camaraderie' ); ?></button>
		<?php
		wp_nav_menu( [
			'theme_location' => $data->location,
			'container'      => '',
			'menu_id'        => 'primary-menu',
			'menu_class'     => 'menu-items',
			'depth'          => 2
		] );
		?>
	</nav>
<?php }