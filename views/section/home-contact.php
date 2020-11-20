<?php
/**
 * Camaraderie ( home-contact.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<div id="contact" class="site-contact">
	<div class="content-area">
		<div class="entry-header">
			<h1 class="entry-title"><?php esc_html_e( 'Contact', 'camaraderie' ); ?></h1>
		<span class="entry-description"><?php esc_html_e( 'Questions or Hire Me', 'camaraderie' ); ?></span>
		</div>
		<div class="entry-content">
			<?php
				$query = new WP_Query( array( 'page_id' => get_theme_mod( 'custom_contact_dropdown' ) ) ); // phpcs:ignore
			?>
			<?php if ( $query->have_posts() ) { ?>
				<?php while ( $query->have_posts() ) { ?>
					<?php $query->the_post(); ?>
						<div class="contact-content">
							<?php if ( '' != get_theme_mod( 'custom_contact_dropdown' ) ) {
								the_content();
							} ?>
						</div>
				<?php } ?>
					<?php wp_reset_postdata(); ?>
			<?php } ?>
		</div>
	</div>
</div>