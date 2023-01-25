<?php
/**
 * Camaraderie ( app/Customize/Component.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package   Camaraderie
 * @copyright 2017-2023. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2..html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */


namespace Camaraderie\Customize\Jetpack;

use Backdrop\Theme\Customize\Component as CustomizeContract;
use WP_Customize_Manager;

class Component extends CustomizeContract {

	/**
	 * Register panels
	 */
	public function panels( WP_Customize_Manager $manager ) {

	}

	/**
	 * Register sections
	 */
	public function sections( WP_Customize_Manager $manager ) {
		$manager->get_section( 'jetpack_portfolio' )->panel = 'home_section';
		$manager->get_section( 'jetpack_portfolio' )->title = esc_html__( 'Custom Portfolio', 'camaraderie' );
		$manager->get_section( 'jetpack_portfolio' )->priority = 5;
	}

	/**
	 * Register settings
	 */
	public function settings( WP_Customize_Manager $manager ) {
		$manager->get_setting('jetpack_portfolio_content')->default = esc_html('Some of my recent works.', 'camaraderie');
	}

	/**
	 * Register controls
	 */
	public function controls( WP_Customize_Manager $manager ) {
		
	}

	public function boot() {
		add_action( 'customize_register', [ $this, 'panels' ], 11  );
		add_action( 'customize_register', [ $this, 'sections' ], 11  );
		add_action( 'customize_register', [ $this, 'settings' ], 11  );
		add_action( 'customize_register', [ $this, 'controls' ] , 11 );
	}
}