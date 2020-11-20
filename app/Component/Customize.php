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
use WP_Customize_Image_Control;
use WP_Customize_Color_Control;

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
			'priority' => 10,
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
		$manager->add_section( 'custom_header', array(
			'title'    => esc_html__( 'Custom Header', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 5,
		) );

		$manager->add_section( 'custom_portfolio', array(
			'title'    => esc_html__( 'Custom Portfolio', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 10,
		) );

		$manager->add_section( 'custom_blog', array(
			'title'    => esc_html__( 'Custom Blog', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 15,
		) );

		$manager->add_section( 'custom_contact', array(
			'title'    => esc_html__( 'Custom Contact', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 20,
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
			'default'           => get_theme_file_uri( '/assets/images/avatar.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		/**
		 * Custom Portfolio
		 */
		$manager->add_setting( 'custom_portfolio_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting( 'custom_portfolio_background', array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$manager->add_setting( 'custom_portfolio_title', array(
			'default' => esc_html__( 'Portfolio', 'camaraderie' ),
			'sanitize_callback' => 'sanitize_text_field'
		) );

		$manager->add_setting( 'custom_portfolio_description', array(
			'default' => esc_html__( 'Some of my recent works!', 'camaraderie' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$manager->add_setting( 'custom_portfolio_items', array(
			'default' => 9,
			'sanitize_callback' => 'absint',
		) );

		/**
		 * Custom Background
		 */
		$manager->add_setting( 'custom_blog_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting( 'custom_blog_background', array(
			'default'           => '#eeeeee',
			'sanitize_callback' => 'sanitize_hex_color',
		) );

		$manager->add_setting( 'custom_blog_title', array(
			'default'           => esc_html__( 'Blog', 'camaraderie' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		$manager->add_setting( 'custom_blog_description', array(
			'default'           => esc_html__( 'Some of my recent works!', 'camaraderie' ),
			'sanitize_callback' => 'sanitize_text_field',
		) );

		/**
		 * Custom Contact
		 */
		$manager->add_setting( 'custom_contact_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting('custom_contact_dropdown', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Helpers\Sanitize::dropdown',
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
				'description' => esc_html__( 'Please set avatar image to 200 by 200 to fit properly', 'camaraderie' ),
				'section' => 'custom_header',
				'settings' => 'custom_avatar',
			)
		) );

		$manager->add_control( 'custom_portfolio_display', array(
			'label' => esc_html__( 'Enable Portfolio', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_portfolio',
			'settings' => 'custom_portfolio_display',
		) );

		$manager->add_control( 'custom_contact_display', array(
			'label' => esc_html__( 'Enable Contact', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_contact',
			'settings' => 'custom_contact_display',
		) );

		$manager->add_control( new WP_Customize_Color_Control( $manager, 'custom_portfolio_background', array(
			'label' => esc_html__( 'Background Color', 'camaraderie' ),
			'section' => 'custom_portfolio',
			'settings' => 'custom_portfolio_background',
		) ) );

		$manager->add_control('custom_portfolio_title', array(
			'label' => esc_html__('Title', 'camaraderie'),
			'section' => 'custom_portfolio',
			'priority' => 10,
			'settings' => 'custom_portfolio_title',
		));

		$manager->add_control('custom_portfolio_description', array(
			'label' => esc_html__('Description', 'camaraderie'),
			'section' => 'custom_portfolio',
			'priority' => 15,
			'settings' => 'custom_portfolio_description',
		));

		$manager->add_control( 'custom_portfolio_items', array(
			'label'    => esc_html__( 'Number of Items', 'camaraderie' ),
			'type'     => 'number',
			'section'  => 'custom_portfolio',
			'settings' => 'custom_portfolio_items',
			'priority' => 20,
		) );

		/**
		 * Custom Blog - Control
		 */

		$manager->add_control( 'custom_blog_display', array(
			'label' => esc_html__( 'Enable Blog', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_blog',
			'settings' => 'custom_blog_display',
		) );

		$manager->add_control( new WP_Customize_Color_Control( $manager, 'custom_blog_background', array(
			'label' => esc_html__( 'Background Color', 'camaraderie' ),
			'section' => 'custom_blog',
			'settings' => 'custom_blog_background',
		) ) );

		$manager->add_control( 'custom_blog_title', array(
			'label' => esc_html__( 'Title', 'camaraderie' ),
			'section' => 'custom_blog',
			'priority' => 10,
			'settings' => 'custom_blog_title',
		) );

		$manager->add_control('custom_blog_description', array(
			'label' => esc_html__('Description', 'camaraderie'),
			'section' => 'custom_blog',
			'priority' => 15,
			'settings' => 'custom_blog_description',
		) );

		$manager->add_control('custom_contact_dropdown', array(
			'type'    => 'dropdown-pages',
			'section' => 'custom_contact',
			'label'   => esc_html__( 'Custom Dropdown Pages', 'camaraderie' ),
		) );
	}
}