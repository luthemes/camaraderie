<?php
/**
 * Camaraderie ( app/Customize/Component.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package   Camaraderie
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */


 namespace Camaraderie\ThemeLayouts;
 
 use Backdrop\Theme\Customize\Component as CustomizeContract;
 use Camaraderie\ThemeLayouts\Control\ImageRadio;
 
 use WP_Customize_Manager;

class Component extends CustomizeContract {
	/**
	 * Register panels
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager $manager
	 */
	public function panels( WP_Customize_Manager $manager ) {
		$manager->add_panel( 'theme_options', array(
			'title' => esc_html( 'Theme Options', 'camaraderie' ),
			'priority' => 15,
		) );
	}

	/**
	 * Register sections
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager $manager
	 */
	public function sections( WP_Customize_Manager $manager ) {
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
	 * Register settings
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager $manager
	 */
	public function settings( WP_Customize_Manager $manager ) {
		$manager->add_setting( 'global_layout',
			[
				'default'           => 'left-sidebar',
				'sanitize_callback' => 'Backdrop\Theme\Customize\Helpers\Sanitize::layouts',
			]
		);
	}

	/**
	 * Register controls
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  WP_Customize_Manager $manager
	 */
	public function controls( WP_Customize_Manager $manager ) {
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
							'left-sidebar'  => get_theme_file_uri( '/public/images/2cl.png' ),
							'right-sidebar' => get_theme_file_uri( '/public/images/2cr.png' ),
						],
				]
			)
		);
	}
}