<?php

namespace Banano_Pay\Admin;

use Banano_Pay\Includes\Functions;

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
		if ( 'settings_page_banano-pay' === $hook ) {
			wp_enqueue_style( 'bnnp-admin' );
			wp_enqueue_script( 'bnnp-admin' );
		}
	}

	public function add_menu_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Banano Pay', 'banano-pay' ),
			__( 'Banano Pay', 'banano-pay' ),
			'manage_options',
			'banano-pay',
			array( $this, 'renbder_settings_page' ),
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="bnnp-admin-wrapper">
			<div class="bnnp-admin-header">
				<span class="bnnp-logo">
					<svg xmlns="http://www.w3.org/2000/svg" fill="none" width="50" height="50" viewBox="0 0 64 35">
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="M2 23v-1l1-1v-3l1-3 1-2 1-1 1-2 1-1V8l3-3 2-1h1l1-1h1l1-1h2a433 433 0 0 1 15 2l3 1h1l1 2 2 2 2 3 1 3v2l-1 1h-6l-4-1-1-1h-1l-1-1v-1h-1l-2-2h-5l-4 2-1 1-3 2-2 2-1 2-2 1-1 1-4 1H3v-1"/>
						<path stroke="#000" stroke-linecap="round" stroke-width="3" d="m18 19 1 2 1 3 7 5 5 2 2 1h2l4 1h5l3-1 4-2 2-2 3-2 2-3 1-4 1-3 1-3-1-1c-1-2-3 0-5 0l-3 2-2 1-2 2-1 1-2 1-2 2v1h-2l-1 1-2 1h-2l-2-1-4-2-2-2-3-1-5-1-2 2"/>
					</svg>
				</span>
				<span class="bnnp-admin-title">
					<h1><?php esc_html_e( 'Banano pay', 'banano-pay' ); ?></h1>
				</span>
				<p><?php esc_html_e( 'Unofficial Banano plugin for WordPress.', 'banano-pay' ); ?></p>
			</div>
			<div class="bnnp-admin-main">
				<section class="bnnp-settings">
					<label for="ban_address">
						<?php _e( 'Banano address:', 'banano-pay' ); ?>
					</label>
					<br>
					<input type="text" id="ban-address" name="ban_address" placeholder="ban_" size="64" pattern="[a-z0-9]{64}" value="<?php echo esc_attr( bnnp_get_option( '_banano_pay_address' ) ); ?>">
					<?php wp_nonce_field( 'bnnp_save_settings' ); ?>
					<input type="submit" id="save_ban_address" name="save_ban_address" value="<?php esc_attr_e( 'Save', 'banano-pay' ); ?>">
					<?php if ( bnnp_get_option( '_banano_pay_address' ) ) : ?>
					<img id="ban-lovely-monkey" src="<?php echo esc_attr( esc_url( 'https://monkey.banano.cc/api/v1/monkey/' . bnnp_get_option( '_banano_pay_address' ) . '?svc=banano-pay' ) ); ?>">
					<?php endif; ?>
					<div id="ban-message-area"></div>
				</section>
			</div>
		</div>
		<?php
	}

}
