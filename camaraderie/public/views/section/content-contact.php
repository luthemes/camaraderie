<?php
/**
 * Camaraderie ( content-contact.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<section id="contact" class="site-contact">
    <div class="content-area">
        <header id="header" class="contact-header">
            <h1 class="contact-title"><?php esc_html_e( 'Contact', 'camaraderie' ); ?></h1>
            <span class="contact-description"><?php esc_html_e( 'Work That I have done', 'camaraderie' ); ?></span>
        </header>
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
</section>
