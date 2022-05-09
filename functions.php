<?php
/**
 * Camaraderie ( functions.php )
 *
 * This (functions.php) template file should only do two jobs, one is to check the compatibility if the site meets
 * the miminum requirements before the theme proceeds to activate. The second job is to autoload the backdrop core
 * famework.
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Table of Content
 *
 * 1.0 - Compatibility Check
 * 2.0 - Backdrop Core
 */

/**
 * 1.0 - Compatibility Check
 */
function camaraderie_compatibility_check() {
	if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) ) {
		return sprintf(
			// translators: 1 =  a version string, 2 = current wp version string.
			__( 'camaraderie requires at least WordPress version %1$s. You are currently running %2$s. Please upgrade and try again.', 'camaraderie' ),
			'4.9',
			$GLOBALS['wp_version']
		);
	} elseif ( version_compare( PHP_VERSION, '7.4', '<' ) ) {
		return sprintf(
			// translators: 1 =  a version string, 2 = current wp version string.
			__( 'camaraderie requires at least PHP version %1$s. You are currently running %2$s. Please upgrade and try again.', 'camaraderie' ),
			'7.4',
			PHP_VERSION
		);
	}
	return '';
}

/**
 * Triggered after switch themes and check if it meets the requirements.
 */
function camaraderie_switch_theme() {
	if ( version_compare( $GLOBALS['wp_version'], '4.9', '<' ) || version_compare( PHP_VERSION, '7.4', '<' ) ) {
		switch_theme( get_option( 'theme_switched' ) );
		add_action( 'admin_notices', 'camaraderie_upgrade_notice' );
	}
	return false;
}
add_action( 'after_switch_theme', 'camaraderie_switch_theme' );

/**
 * Displays an error if it doesn't meet the requirements.
 */
function camaraderie_upgrade_notice() {
	printf( '<div class="error"><p>%s</p></div>', esc_html( camaraderie_compatibility_check() ) );
}

/**
 * 2.0 - Backdrop Core
 */
if ( file_exists( get_parent_theme_file_path( '/vendor/autoload.php' ) ) ) {
	require_once get_parent_theme_file_path( '/vendor/autoload.php' );
}
