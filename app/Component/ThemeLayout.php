<?php
/**
 * Camaraderie ( Customize.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Table of Content
 *
 * 1.0 - Create a New Framework
 */
namespace Camaraderie\Component;

use Benlumia007\Backdrop\Contracts\Customize\Customize as CustomizeAbstract;
use Camaraderie\Control\ImageRadio;
/**
 * 1.0 - Create a New Framework
 *
 * This will initialize te Backdrop Core Framework and will add all the necessary components and features
 * to the theme, such as Menu, Sidebar, and Global Layout.
 */
class ThemeLayout extends CustomizeAbstract {
	/**
	 * Register register_panels
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_panels( $manager ) {
		$manager->add_panel( 'theme_options', array(
			'title' => esc_html( 'Theme Options', 'camaraderie' ),
			'priority' => 15,
		) );
	}

	/**
	 * Register register_sections
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_sections( $manager ) {
		/**
		 * Home Section
		 */
		$manager->add_section( 'global_layout', array(
			'title'    => esc_html__( 'Global Layout', 'camaraderie' ),
			'panel'    => 'theme_options',
			'priority' => 25,
		) );
	}

	/**
	 * Register register_settings
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_settings( $manager ) {
		$manager->add_setting( 'global_layout',
			[
				'default'           => 'left-sidebar',
				'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::layouts',
			]
		);
	}

	/**
	 * Register register_controls
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_controls( $manager ) {
		$manager->add_control(
			new ImageRadio(
				$manager,
				'global_layout',
				[
					'description' => esc_html__( 'General Layout applies to all layouts that supports in this theme.', 'camaraderie' ),
					'section'     => 'global_layout',
					'settings'    => 'global_layout',
					'type'        => 'radio-image',
					'choices'     =>
						[
							'left-sidebar'  => get_theme_file_uri( '/assets/images/2cl.png' ),
							'right-sidebar' => get_theme_file_uri( '/assets/images/2cr.png' ),
							'no-sidebar'    => get_theme_file_uri( '/assets/images/1col.png' ),
						],
				]
			)
		);
	}
}