<?php

namespace Monkey_Treat\Admin;

use Monkey_Treat\Includes\Functions;

class Init {

	private static $instance = null;

	private function __construct() {
		$this->init();
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Init();
		}

		return self::$instance;
	}

	public function init() {
		add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
	}

	public function assets( $hook ) {
		if ( 'settings_page_monkey-treat' === $hook ) {
			wp_enqueue_style( 'mtrt-admin' );
			wp_enqueue_script( 'mtrt-admin' );
		}
	}

	public function add_menu_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Monkey Treat', 'monkey-treat' ),
			__( 'Monkey Treat', 'monkey-treat' ),
			'manage_options',
			'monkey-treat',
			array( $this, 'renbder_settings_page' ),
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="mtrt-admin-wrapper">
			<div class="mtrt-admin-header">
				<span class="mtrt-logo">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" width="50" height="50" viewBox="0 0 64 35">
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="M2 23v-1l1-1v-3l1-3 1-2 1-1 1-2 1-1V8l3-3 2-1h1l1-1h1l1-1h2a433 433 0 0 1 15 2l3 1h1l1 2 2 2 2 3 1 3v2l-1 1h-6l-4-1-1-1h-1l-1-1v-1h-1l-2-2h-5l-4 2-1 1-3 2-2 2-1 2-2 1-1 1-4 1H3v-1"/>
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="m18 19 1 2 1 3 7 5 5 2 2 1h2l4 1h5l3-1 4-2 2-2 3-2 2-3 1-4 1-3 1-3-1-1c-1-2-3 0-5 0l-3 2-2 1-2 2-1 1-2 1-2 2v1h-2l-1 1-2 1h-2l-2-1-4-2-2-2-3-1-5-1-2 2"/>
					</svg>
				</span>
				<span class="mtrt-admin-title">
					<h1><?php esc_html_e( 'Monkey Treat', 'monkey-treat' ); ?></h1>
				</span>
				<p><?php esc_html_e( 'Unofficial Banano plugin for WordPress.', 'monkey-treat' ); ?></p>
				<p><?php esc_html_e( 'Use the following shortcode to display donation QR code. If you are using Elemntor, use the Elementor widget.', 'monkey-treat' ); ?><code>[monkey_treat]</code></p>
				<br>
			</div>
			<div class="mtrt-admin-main">
				<section class="mtrt-settings">
					<label for="ban_address">
						<?php _e( 'Banano address:', 'monkey-treat' ); ?>
					</label>
					<br>
					<input type="text" id="ban-address" name="ban_address" placeholder="ban_" size="64" pattern="[a-z0-9]{64}" value="<?php echo esc_attr( mtrt_get_option( '_monkey_treat_address' ) ); ?>">
					<?php wp_nonce_field( 'mtrt_save_settings' ); ?>
					<input type="submit" id="save_ban_address" name="save_ban_address" value="<?php esc_attr_e( 'Save', 'monkey-treat' ); ?>">
					<?php if ( mtrt_get_option( '_monkey_treat_address' ) ) : ?>
					<img id="ban-lovely-monkey" src="<?php echo esc_attr( esc_url( 'https://monkey.banano.cc/api/v1/monkey/' . mtrt_get_option( '_monkey_treat_address' ) . '?svc=monkey-treat' ) ); ?>">
					<?php endif; ?>
					<div id="ban-message-area"></div>
				</section>
			</div>
		</div>
		<?php
	}

}
