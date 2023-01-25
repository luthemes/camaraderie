<?php

namespace Camaraderie\Customize\Jetpack;

function display_portfolio_title( $before = '', $after = '' ) {
	$portfolio_title = get_option('jetpack_portfolio_title', __('Projects', 'camaraderie'));
	$title = '';

	if (isset($portfolio_title) && '' != $portfolio_title) {
		$title = esc_html($portfolio_title);
	} else {
		$title = esc_html(post_type_archive_title('', false));
	}
	echo $before . $title . $after;
}

function display_portfolio_content($before = '', $after = '') {
	$portfolio_description = get_option('jetpack_portfolio_content', __('Some of My Recent Works.', 'camaraderie'));

	if (is_tax() && get_the_archive_description()) {
		echo $before . get_the_archive_description() . $after;
	} else if (isset($portfolio_description) && '' != $portfolio_description) {
		$content = convert_chars(convert_smilies(wptexturize(stripslashes(wp_filter_post_kses(addslashes($portfolio_description))))));
		echo $before . $content . $after;
	}
}