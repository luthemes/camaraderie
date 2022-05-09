<?php
/**
 * Camaraderie (functions-filters.php)
 *
 * @package   camaraderie
 * @copyright Copyright (C) 2017-2020. Benjamin Lu
 * @license   GNU General Public License v2 or later (https://www.gnu.org/licenses/gpl-2.0.html)
 * @author    Benjamin Lu (https://benjlu.com)
 */

/**
 * Define namespace
 */
namespace Camaraderie;

/**
 *  Table of Content
 *
 *  1.0 - Filters (Excerpt More)
 *  2.0 - Filters (Excerpt Length)
 *  3.0 - Filters (Archive Title)
 */

/**
 *  1.0 - Filters (Excerpt More)
 */
add_filter(
	'excerpt_more',
	function() {
		global $post;
		$more = 'continue reading...';
		
		return '<a class="read-more" href="' . esc_url( get_permalink( $post->ID ) ) . '"> ( ' . esc_html( $more ) . ' )</a>';
	}
);

/**
 *  2.0 - Filters (Excerpt Length)
 */
add_filter(
	'excerpt_length',
	function() {
		if ( ! is_admin() ) {
			return 50;
		}
	}
);

/**
 *  3.0 - Filters (Archive Title)
 */
add_filter(
	'get_the_archive_title',
	function() {
		if ( is_category() ) {
			$title = esc_html__( 'Category', 'camaraderie' ) . '<span class="archive-description">' . single_cat_title( '', false ) . '</span>';
		} elseif ( is_tag() ) {
			$title = esc_html__( 'Tag', 'camaraderie' ) . '<span class="archive-description">' . single_tag_title( '', false ) . '</span>';
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author', 'camaraderie' ) . '<span class="archive-description">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = esc_html__( 'Year', 'camaraderie' ) . '<span class="archive-description">' . get_the_date( _x( 'Y', 'yearly archives date format', 'camaraderie' ) ) . '</span>';
		} elseif ( is_month() ) {
			$title = esc_html__( 'Month', 'camaraderie' ) . '<span class="archive-description">' . get_the_date( _x( 'F', 'monthly archives date format', 'camaraderie' ) ) . '</span>';
		} elseif ( is_day() ) {
			$title = esc_html__( 'Day', 'camaraderie' ) . '<span class="archive-description">' . get_the_date( _x( 'F j Y', 'daily archives date format', 'camaraderie' ) ) . '</span>';
		} elseif ( is_tax( 'post_format' ) ) {
			if ( is_tax( 'post_format', 'post-format-aside' ) ) {
				$title = _x( 'Asides', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
				$title = _x( 'Galleries', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
				$title = _x( 'Images', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
				$title = _x( 'Videos', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
				$title = _x( 'Quotes', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
				$title = _x( 'Links', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
				$title = _x( 'Statuses', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
				$title = _x( 'Audio', 'post format archive title', 'camaraderie' );
			} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
				$title = _x( 'Chats', 'post format archive title', 'camaraderie' );
			}
		} elseif ( is_post_type_archive() ) {
			$title = esc_html__( 'Archives', 'camaraderie' ) . '<span class="archive-description">' . post_type_archive_title( '', false ) . '</span>';
		} elseif ( is_tax() ) {
			$tax = get_taxonomy( get_queried_object()->taxonomy );
			// Translators: 1 = singular name, 2 = single term title.
			$title = sprintf( __( '%1$s: %2$s', 'camaraderie' ), $tax->labels->singular_name, single_term_title( '', false ) );
		} else {
			$title = esc_html__( 'Archives', 'camaraderie' );
		}
		return $title;
	}
);

/**
 * Change Tempalate Path
 * 
 * @since  1.0.0
 */
add_filter( 'backdrop/template/path', function() {
	return 'public/views';
} );