<?php

namespace Super_Plugin\Includes;
class Assets {

	public static $instance = null;
	public $suffix          = '.min';

	private function __construct() {
		$this->init();
	}

	public function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'register_front_assets' ), 9 );
		add_action( 'wp_enqueue_scripts', array( $this, 'localize' ), 9 );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_assets' ), 9 );

		if ( $this->is_script_debug() ) {
			$this->suffix = '';
		}
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Assets();
		}

		return self::$instance;
	}

	public static function is_script_debug() {
		return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG;
	}

	public function register_front_assets() {
		$this->register_front_scripts();
		$this->register_front_styles();
	}

	public function register_front_scripts() {
		wp_register_script( 'supl-front', SUPL_FRONT_ASSETS . 'js/supl-front' . $this->suffix . '.js', array( 'jquery' ), SUPL_VERSION, true );
	}

	public function register_front_styles() {
		wp_register_style( 'supl-front', SUPL_FRONT_ASSETS . 'css/supl-front' . $this->suffix . '.css', array(), SUPL_VERSION, 'all' );
	}

	public function register_admin_assets() {
		$this->register_admin_scripts();
		$this->register_admin_styles();
	}

	public function register_admin_scripts() {
		wp_register_script( 'SUPL-admin', SUPL_ADMIN_ASSETS . 'js/supl-admin' . $this->suffix . '.js', SUPL_VERSION, true );
	}

	public function register_admin_styles() {
		wp_register_style( 'supl-admin', SUPL_ADMIN_ASSETS . 'css/supl-admin' . $this->suffix . '.css', array(), SUPL_VERSION, 'all' );
	}

	public function localize() {
		$i10n = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'supl-front', 'SUPER_PLUGINS', $i10n );
	}
}
