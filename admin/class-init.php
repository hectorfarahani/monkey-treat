<?php

namespace Super_Plugin\Admin;

use Super_Plugin\Includes\Functions;

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
			wp_enqueue_style( 'supl-admin' );
			wp_enqueue_script( 'supl-admin' );
		}
	}

	public function add_menu_page() {
		add_menu_page(
			__( 'Super Plugin', 'super-plugin' ),
			__( 'Menu page', 'super-plugin' ),
			'manage_options',
			'super-plugin',
			array( $this, 'renbder_settings_page' ),
			'dashicons-smiley',
			28
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="supl-admin-wrapper">
			<div class="supl-admin-header">
				<div class="supl-logo">

				</div>
				<div class="supl-admin-title">
					<h1><?php esc_html_e( 'Settings Page', '' ); ?></h1>
				</div>
			</div>
			<div class="supl-admin-main">
				<section class="supl-settings">
					<h2><?php esc_html_e( 'Settings:' ); ?></h2>
				<?php wp_nonce_field('supl'); ?>
				</section>
			</div>
		</div>
		<?php
	}

}
