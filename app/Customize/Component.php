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


 namespace Camaraderie\Customize;
 use Benlumia007\Backdrop\Customize\Component as CustomizeContract;
 use WP_Customize_Image_Control;

 class Component extends CustomizeContract {
	/**
	 * Register panels
	 */
	public function panels( $manager ) {
        $manager->add_panel( 'home_section', array(
			'title' => esc_html( 'Home Section', 'camaraderie' ),
			'priority' => 15,
		) );
    }
	
	/**
	 * Register sections
	 */
	public function sections( $manager ) {
        $manager->add_section( 'header_section', array(
			'title'    => esc_html__( 'Header Section', 'camaraderie' ),
			'panel'    => 'home_section',
			'priority' => 5,
		) );

		$manager->add_section( 'custom_portfolio', array(
			'title' => esc_html__( 'Custom Portfolio', 'camaraderie' ),
			'panel' => 'home_section',
			'priority' => 10
		) );

		$manager->add_section( 'custom_blog', array(
			'title' => esc_html__( 'Custom Blog', 'camaraderie' ),
			'panel' => 'home_section',
			'priority' => 15
		) );

		$manager->add_section( 'custom_contact', array(
			'title' => esc_html__( 'Custom Contact', 'camaraderie' ),
			'panel' => 'home_section',
			'priority' => 15
		) );
    }

	/**
	 * Register settings
	 */
	public function settings( $manager ) {
        $manager->add_setting( 'custom-image', array(
			'default'	        => get_theme_file_uri( '/public/images/header-image.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$manager->add_setting( 'custom_avatar', array(
			'default'           => get_theme_file_uri( '/public/images/avatar.jpg' ),
			'sanitize_callback' => 'esc_url_raw',
		) );

		$manager->add_setting( 'custom_portfolio_display', [
			'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox',
		] );

		$manager->add_setting( 'custom_portfolio_items', array(
			'default' => 9,
			'sanitize_callback' => 'absint',
		) );

		$manager->add_setting( 'related_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting( 'custom_blog_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting( 'custom_contact_display', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::checkbox',
		) );

		$manager->add_setting('custom_contact_dropdown', array(
			'sanitize_callback' => 'Benlumia007\Backdrop\Customize\Helpers\Sanitize::dropdown',
		) );
    }

	/**
	 * Register controls
	 */
	public function controls( $manager ) {
        $manager->add_control( new WP_Customize_Image_Control(
			$manager, 'custom-image', array(
				'label' => esc_html__( 'Background Image', 'camaraderie' ),
				'description' => esc_html__( 'Please set background image to 2000 by 1200 to fit properly', 'camaraderie' ),
				'section' => 'header_section',
				'settings' => 'custom-image',
			)
		) );

		$manager->add_control( new WP_Customize_Image_Control(
			$manager, 'custom_avatar', array(
				'label' => esc_html__( 'Avatar Image', 'camaraderie' ),
				'description' => esc_html__( 'Please set avatar image to 250 by 250 to fit properly', 'camaraderie' ),
				'section' => 'header_section',
				'settings' => 'custom_avatar',
			)
		) );

		$manager->add_control( 'custom_portfolio_display', array(
			'label' => esc_html__( 'Enable Portfolio', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_portfolio',
			'settings' => 'custom_portfolio_display',
		) );

		$manager->add_control( 'custom_portfolio_items', array(
			'label'    => esc_html__( 'Number of Items', 'camaraderie' ),
			'type'     => 'number',
			'section'  => 'custom_portfolio',
			'settings' => 'custom_portfolio_items',
			'priority' => 20,
		) );

		$manager->add_control( 'related_display', array(
            'label'     => esc_html__('Enable Related Items', 'camaraderie'),
            'description'   => esc_html__('Related Items when enabled, will appear at the bottom page when using Backdrop Post Types for Portfolio.', 'camaraderie'),
            'type'      => 'checkbox',
            'section'   => 'custom_portfolio',
            'settings'  => 'related_display',
            'priority'  => 25,
		) );

		$manager->add_control( 'custom_blog_display', array(
			'label' => esc_html__( 'Enable Blog', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_blog',
			'settings' => 'custom_blog_display',
		) );

		$manager->add_control( 'custom_contact_display', array(
			'label' => esc_html__( 'Enable Contact', 'camaraderie' ),
			'type' => 'checkbox',
			'section' => 'custom_contact',
			'settings' => 'custom_contact_display',
		) );

		$manager->add_control('custom_contact_dropdown', array(
			'label'   => esc_html__( 'Custom Dropdown Pages', 'camaraderie' ),
			'description' => esc_html__( 'It is recommended to enable Contact Form 7 and use the default layout that comes with and use the dropdown to select the contact page to display the contact form', 'camaraderie' ),
			'type'    => 'dropdown-pages',
			'section' => 'custom_contact',
		) );
    }
 }