<?php
/**
 * Camaraderie ( functions-setup.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

/**
 * Define namespace
 */
namespace Camaraderie;

/**
 * Setup Theme Support.
 *
 * This is where all of the add_theme_support(); will happen.
 *
 * @since  1.0.0
 * @access public
 * @return void
 *
 * @link   https://developer.wordpress.org/reference/functions/add_theme_support/
 * @link   https://developer.wordpress.org/themes/basics/theme-functions/
 * @link   https://developer.wordpress.org/reference/functions/load_theme_textdomain/
 */
add_action( 'after_setup_theme', function() {
		/**
		 * Content width is a theme feature, when set, it can set the maximum allow width for any content in teh theme like
		 * oEmbeds and images added to posts.
		 */
		$GLOBALS['content_width'] = 810;

		/**
		 * By adding add_theme_support( 'title-tag' );, this will let WordPress manage all document titles and should be use instead of wp_title();.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * By adding add_theme_support( 'automatic-feed-links' );, this feature when enabled allows feed links for post and comments
		 * in the head of the theme. This feature should be used in place of of the deprecated function automatic_feed_links();.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * By adding add_theme_support( 'html5', arrayy() );, this feature when enabled allows the user use of HTML5 markup for
		 * comment list, comment forms, search forms, galleries, and captions.
		 */
		add_theme_support( 'html5', array(
			'comment-list',
			'comment-form',
			'search-form',
			'gallery',
			'caption',
		) );

		/**
		 * By adding add_theme_support( 'post-thumbnails' );, this feature when enabled allows you to setup featured images
		 * also known as featured image. If you need to use conditional, please consider using has_post_thumbnail.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * By add_image_size( 'camaraderie-small-thumbnails', 324, 324, true );. This should be used for content in the home for blogs.
		 */
		add_image_size( 'camaraderie-small-thumbnails', 324, 324, true );

		/**
		 * By add_image_size( 'camaraderie-medium-thumbnails', 810, 396, true );. This should be used for content that has sidebars.
		 */
		add_image_size( 'camaraderie-medium-thumbnails', 986, 448, true );

		/**
		 * By add_image_size( 'camaraderie-large-thumbnails', 1132, 594, true );. This should be used for content that has no sidebars.
		 */
		add_image_size( 'camaraderie-large-thumbnails', 1132, 594, true );

		/**
		 * By add_theme_support( 'wp-block-styles' );. This should enable block styles on the frontend.
		 */
		add_theme_support( 'wp-block-styles' );

		/**
		 * By adding add_theme_support( 'editor-styles' ); and add_editor_style(); to enable styles in the backend of the editor.
		 */
		add_theme_support( 'editor-styles' );
		add_editor_style( 'public/css/editor.css' );

		// Add Jetpack Portfolio
		add_theme_support( 'jetpack-portfolio', [ 'title' => true, 'content' => true ] );

		/**
		 * Load theme translation.
		 */
		load_theme_textdomain( 'camaraderie' );
	}
);

/**
 * Add support for custom header.
 */
add_action( 'after_setup_theme', function() {

		add_theme_support( 'custom-header',
			[
				'default-text-color' => 'ffffff',
				'default-image'      => get_theme_file_uri( '/public/images/header-image.jpg' ),
				'height'             => 1200,
				'max-width'          => 2000,
				'width'              => 2000,
				'flex-height'        => false,
				'flex-width'         => false,
			]
		);

		register_default_headers(
			array(
				'header-image' => array(
					'url'           => '%s/public/images/header-image.jpg',
					'thumbnail_url' => '%s/public/images/header-image.jpg',
					'description'   => esc_html__( 'Header Image', 'camaraderie' ),
				),
			)
		);
} );

/**
 * Registers custom templates with WordPress.
 *
 * @since  1.0.0
 * @access public
 * @param  object  $templates
 * @return void
 */
add_action( 'backdrop/templates/register', function( $templates ) {
	$templates->add( 'template-home.php', [
		'label' => esc_html__( 'Home', 'camaraderie' )
	] );

	$templates->add( 'template-left-sidebar.php', [
		'label' => esc_html__( 'Left Sidebar', 'camaraderie' )
	] );

	$templates->add( 'template-right-sidebar.php', [
		'label' => esc_html__( 'Right Sidebar', 'camaraderie' )
	] );
} );