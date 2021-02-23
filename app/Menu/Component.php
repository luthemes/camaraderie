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
use Benlumia007\Backdrop\Component\Menu as MenuContract;

/**
 * Menus
 * 
 * @since  2.0.0
 * @access public
 */
class Component extends MenuContract {
    public function __construct( $menu_id = [] ) {
        $this->menu_id = $this->defaults();
    }

    public function defaults() {
        return array(
            'primary'   => esc_html__( 'Primary Sidebar', 'camaraderie' ),
            'secondary' => esc_html__( 'Secondary Sidebar', 'camaraderie' ),
            'social'    => esc_html__( 'Social Navigation', 'camaraderie' )
        );
    }
}