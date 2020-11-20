<?php
/**
 * Camaraderie ( content.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2018-2019. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */

use Benlumia007\Backdrop\Entry\Entry as entry;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<picture class="post-thumbnail">
		<?php if ( has_post_thumbnail() ) { ?>
			<source media="(min-width: 601px) and (max-width: 768px)" srcset="<?php the_post_thumbnail_url( 'camaraderie-medium-thumbnails' ); ?>">
			<?php the_post_thumbnail( 'camaraderie-small-thumbnails' ); ?>
		<?php } ?>
	</picture>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) { ?>
			<?php printf( '<span class="sticky-post">%1$s</span>', esc_html__( 'Featured', 'camaraderie' ) ); ?>
		<?php } ?>
		<?php entry::display( 'entry-title' ); ?>
		<span class="entry-metadata"><?php entry::display( 'posted-on' ); ?></span>
	</header>
	<div class="entry-excerpt">
		<?php the_excerpt(); ?>
	</div>
</article>
