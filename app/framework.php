<?php
/**
 * Camaraderie ( framework.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package     Camaraderie
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

$camaraderie->menus = new Benlumia007\Backdrop\Menu\Menu(
	$args = [
		'primary' => esc_html__( 'Primary Navigation', 'camaraderie' ),
		'social' => esc_html__( 'Social Navigation', 'camaraderie' ),
	]
);

$camaraderie->sidebars = new Benlumia007\Backdrop\Sidebar\Sidebar(
	$args = [
		'primary' => [
			'name' => esc_html__( 'Primary Sidebar', 'camaraderie' ),
			'desc' => esc_html__( 'Applies to Posts', 'camaraderie' ),
		],
		'secondary' => [
			'name' => esc_html__( 'Secondary Sidebar', 'camaraderie' ),
			'desc' => esc_html__( 'Applies to Pages', 'camaraderie' ),
		],
		'portfolio' => [
			'name' => esc_html__( 'Portfolio Sidebar', 'camaraderie' ),
			'desc' => esc_html__( 'Applies to Portoflio', 'camaraderie' ),
		]
	]
);

$camaraderie->admin = new Camaraderie\Component\Admin();
$camaraderie->customize = new Camaraderie\Component\Customize();
$camaraderie->layouts = new Camaraderie\Component\ThemeLayouts();