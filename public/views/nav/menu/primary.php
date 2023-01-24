<?php

if ( has_nav_menu( 'primary' ) ) { ?>
	<nav id="primaire" class="primary-navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'backdrop' ); ?></button>
		<?php
		wp_nav_menu(
			array(
				'theme_location' => 'primary',
				'container'      => '',
				'menu_id'        => 'primary-menu',
				'menu_class'     => 'menu-items',
				'depth'          => 2
			)
		);
		?>
	</nav>
<?php }