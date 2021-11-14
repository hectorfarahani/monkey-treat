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
		if ( 'toplevel_page_super-plugin' === $hook ) {
			wp_enqueue_style( 'bnnp-admin' );
			wp_enqueue_script( 'bnnp-admin' );
		}
	}

	public function add_menu_page() {
		add_menu_page(
			__( 'Banano Pay', 'banano-pay' ),
			__( 'Menu page', 'banano-pay' ),
			'manage_options',
			'banano-pay',
			array( $this, 'renbder_settings_page' ),
			'dashicons-smiley',
			28
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="bnnp-admin-wrapper">
			<div class="bnnp-admin-header">
				<div class="bnnp-logo">

				</div>
				<div class="bnnp-admin-title">
					<h1><?php esc_html_e( 'Settings Page', '' ); ?></h1>
				</div>
			</div>
			<div class="bnnp-admin-main">
				<section class="bnnp-settings">
					<h2><?php esc_html_e( 'Settings:' ); ?></h2>
				<?php wp_nonce_field('bnnp'); ?>
				</section>
			</div>
		</div>
		<?php
	}

}
