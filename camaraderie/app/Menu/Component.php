<?php
/**
 * Camaraderie (Component.php)
 *
 * @package   Camaraderie
 * @copyright Copyright (C) 2017-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author    Benjamin Lu (https://getbenonit.com)
 */

/**
 * Define namespace
 */
namespace Camaraderie\Menu;
use Benlumia007\Backdrop\Theme\Menu\Component as MenuContract;
use function Benlumia007\Backdrop\Mix\asset;

/**
 * Menus
 * 
 * @since  2.0.0
 * @access public
 */
class Component extends MenuContract {
    public function menus() {
        return [
			'primary'   => esc_html__( 'Primary Navigation', 'camaraderie' ),
            'secondary' => esc_html__( 'Secondary Navigation', 'camaraderie' ),
            'social'    => esc_html__( 'Social Navigation', 'camaraderie' )
		];
    }

	public function enqueue() {
		wp_enqueue_script( 'camaraderie-navigation', asset( 'assets/js/navigation.js' ), [ 'jquery' ], null, true );
		wp_localize_script( 'camaraderie-navigation', 'camaraderieScreenReaderText', [
			'expand'   => '<span class="screen-reader-text">' . esc_html__( 'expand child menu', 'camaraderie' ) . '</span>',
			'collapse' => '<span class="screen-reader-text">' . esc_html__( 'collapse child menu', 'camaraderie' ) . '</span>',
		] );
	}
}