<?php
/**
 * Initiator ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Initiator
 * @copyright   Copyright (C) 2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Create a new framework instance
 *
 * This will create an instance of the framework allowing you to initialize the theme.
 */
$camaraderie = Benlumia007\Backdrop\Framework::get_instance();

$camaraderie->customize = new Camaraderie\Component\Customize();
$camaraderie->admin     = new Camaraderie\Component\Admin();
$camaraderie->layouts   = new Camaraderie\Component\ThemeLayout();

$extras = array(
	'secondary' => array(
		'name'  => esc_html__( 'Secondary Sidebar', 'camaraderie' ),
		'desc'  => esc_html__( 'All widgets defined here will display in pages.', 'camaraderie' ), 
	),
	'portfolio' => array(
		'name' => esc_html__( 'Portfolio Sidebar', 'camaraderie' ),
		'desc' => esc_html__( 'test', 'camaraderie'),
	),
);

$sidebars = new Benlumia007\Backdrop\Sidebar\Sidebar( $extras 	);