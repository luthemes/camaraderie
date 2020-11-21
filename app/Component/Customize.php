<?php
/**
 * Camaraderie ( Customize.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2019. Benjamin Lu
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
use WP_Customize_Image_Control;

/**
 * 1.0 - Create a New Framework
 *
 * This will initialize te Backdrop Core Framework and will add all the necessary components and features
 * to the theme, such as Menu, Sidebar, and Global Layout.
 */
class Customize extends CustomizeAbstract {
	/**
	 * Register register_panels
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_panels( $manager ) {
		$manager->add_panel( 'home_section', array(
			'title' => esc_html( 'Home Section', 'camaraderie' ),
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
		$manager->add_section( 'header_section', array(
			'title'    => esc_html__( 'Header Section', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 5,
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
		$manager->add_setting( 'custom_avatar', array(
			'default'           => get_theme_file_uri( '/public/images/avatar.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );
	}

	/**
	 * Register register_controls
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object $manager customizer object.
	 */
	public function register_controls( $manager ) {
		$manager->add_control( new WP_Customize_Image_Control(
			$manager, 'custom_avatar', array(
				'label' => esc_html__( 'Avatar Image', 'camaraderie' ),
				'description' => esc_html__( 'Please set avatar image to 250 by 250 to fit properly', 'camaraderie' ),
				'section' => 'header_section',
				'settings' => 'custom_avatar',
			)
		) );
	}
}
