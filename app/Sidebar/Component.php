<?php
/**
 * Backdrop Core ( app/Sidebar/Component.php )
 *
 * @package   Backdrop Core
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General PUblic License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */


namespace Camaraderie\Sidebar;
use Benlumia007\Backdrop\Component\Sidebar as SidebarContract;

class Component extends SidebarContract {
    public function __construct( $sidebar_id = [] ) {
        $this->sidebar_id = $this->defaults();
    }

    public function defaults() {
        return array(
            'primary' => [
                'name' => esc_html__( 'Primary Sidebar', 'camaraderie' ),
                'desc' => esc_html__( 'Displays Only on Posts', 'camaraderie' ),
            ],
            'secondary' => [
                'name' => esc_html__( 'Secondary Sidebar', 'camaraderie' ),
                'desc' => esc_html__( 'Displays Only on Pages', 'camaraderie' ),
            ],
            'custom' => [
                'name' => esc_html__( 'Custom Sidebar', 'camaraderie' ),
                'desc' => 
                esc_html__( 'Displays only custom templates', 'camaraderie' )
            ],
            'portfolio' => [
                'name' => esc_html__( 'Portfolio Sidebar', 'camaraderie' ),
                'desc' => esc_html__( 'Displays only on Portfolio', 'camaraderie' )
            ]
        );
    }
}   