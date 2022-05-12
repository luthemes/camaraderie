<?php
/**
 * Camaraderie ( content-portfolio.php )
 *
 * @package     Camaraderie
 * @copyright   Copyright (C) 2017-2020. Benjamin Lu
 * @license     GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author      Benjamin Lu ( https://benjlu.com )
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if ( has_post_thumbnail() ) { ?>
        <picture class="post-thumbnail">
            <?php the_post_thumbnail( 'camaraderie-large-thumbnails' ); ?>
	    </picture>
    <?php } ?>
	<div class="entry-content">
		<?php the_content(); ?>
	</div>
</article>
