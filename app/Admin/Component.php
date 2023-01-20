<?php
/**
 * Camaraderie ( app/Customize/Component.php )
 *
 * This file is used to create a new framework instance and adds specific features to the theme.
 *
 * @package   Camaraderie
 * @copyright Copyright (C) 2019-2021. Benjamin Lu
 * @license   GNU General Public License v2 or later ( https://www.gnu.org/licenses/gpl-2.0.html )
 * @author    Benjamin Lu ( https://getbenonit.com )
 */


 namespace Camaraderie\Admin;
 
 use Backdrop\Theme\Admin\Component as AdminContract;

class Component extends AdminContract {
	/**
	 * Theme Info
	 */
	private $theme_info = null;
	/**
	 * Construct
	 */
	public function __construct() {
		$this->theme_info = wp_get_theme();
		add_action( 'admin_menu', array( $this, 'menu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue' ), true, '1.0.0' );
	}
	/**
	 * Register Menu
	 */
	public function menu() {
		add_theme_page( $this->theme_info->name, $this->theme_info->name, 'manage_options', 'theme-page', array( $this, 'callback') );
	}

	/**
	 * Render Menu
	 */
	public function callback() {
		echo '<h1 class="admin-title">' . $this->theme_info->name . '</h1>';
		$this->pages();
	}

	public function tabs( $current = 'introduction' ) {
		$tabs = array(
			'introduction' => esc_html__( 'Introduction', 'camaraderie' ),
		);

		$admin_nonce = wp_create_nonce( 'admin_nonce' );

		echo '<h2 class="tabs">';
			foreach ( $tabs as $tab => $name ) {
				$class = ( $tab === $current ) ? ' nav-tab-active' : '';
				echo "<a class='nav-tab $class' href='?page=theme-page&tab=$tab&_wp_nonce=$admin_nonce'>$name</a>"; // XSS OK.
			}
		echo '</h2>';
	}

	public function pages() {
		global $pagenow;

		if ( isset( $_GET['tab'] ) && isset( $_GET['_wp_nonce'] ) && false !== wp_verify_nonce( $_GET['_wp_nonce'], 'admin_nonce' ) ) {// WPCS: input var ok.
			$this->tabs( esc_html( wp_unslash( $_GET['tab'] ) ) ); // WPCS: input var ok, sanitization ok.
		} else {
			$this->tabs( 'introduction' );
		}
		echo '<div class="tabs-content clear">';

		if ( 'themes.php' === $pagenow && 'theme-page' === sanitize_text_field( wp_unslash( $_GET['page'] ) ) ) { // WPCS: input var ok.
			if ( isset( $_GET['tab'] ) && isset( $_GET['_wp_nonce'] ) && false !== wp_verify_nonce( $_GET['_wp_nonce'], 'admin_nonce' ) ) { // WPCS: input var ok, sanitization ok.
				$this->tab = esc_html( wp_unslash( $_GET['tab'] ) ); // WPCS: input var ok, sanitization ok.
			} else {
				$this->tab = 'introduction';
			}

			switch ( $this->tab ) {
				case 'introduction':
					$this->introduction();
					break;
			}
		}
		echo '</div>';
	}

	public function introduction() { ?>
		<h2 class="admin-title"><?php esc_html_e( 'Theme Info', 'camaraderie' ); ?></h2>
		<ul>
			<li><?php echo esc_html( __('Theme Name: ', 'camaraderie' ) . $this->theme_info->name ); ?></li>
			<li><?php echo esc_html( __('Theme Version: ', 'camaraderie' ) . $this->theme_info->version ); ?></li>
		</ul>
		<h2 class="admin-title"><?php esc_html_e( 'Description', 'camaraderie' ); ?></h2>
		<?php echo esc_html( $this->theme_info->description ); ?>
		<h2 class="admin-title"><?php esc_html_e( 'Welcome', 'camaraderie' ); ?></h2>
		<?php esc_html_e( 'Hope you are enjoying the theme. ', 'camaraderie' ); ?>
		<h2 class="admin-title"><?php esc_html_e( 'Recommended Plugins', 'camaraderie' ); ?></h2>
		<ul>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/jetpack' ); ?>"><?php esc_html_e( 'Jetpack Portfolio', 'camaraderie' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/contact-form-7' ); ?>"><?php esc_html_e( 'Contact Form 7', 'camaraderie' ); ?></a></li>
			<li><a href="<?php echo esc_url( 'https://wordpress.org/plugins/regenerate-thumbnails' ); ?>"><?php esc_html_e( 'Regenerate Thumbnails', 'camaraderie' ); ?></a></li>
		</ul>
	<?php }

	public function admin_enqueue() {
		wp_register_style( 'admin-style', get_theme_file_uri() . '/public/css/admin.css', array(), '1.0.0' );
		wp_enqueue_style( 'admin-style' );
	}
}