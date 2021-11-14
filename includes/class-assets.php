<?php

namespace Banano_Pay\Includes;
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
		wp_register_script( 'bnnp-front', BNNP_FRONT_ASSETS . 'js/bnnp-front' . $this->suffix . '.js', array( 'jquery' ), BNNP_VERSION, true );
	}

	public function register_front_styles() {
		wp_register_style( 'bnnp-front', BNNP_FRONT_ASSETS . 'css/bnnp-front' . $this->suffix . '.css', array(), BNNP_VERSION, 'all' );
	}

	public function register_admin_assets() {
		$this->register_admin_scripts();
		$this->register_admin_styles();
	}

	public function register_admin_scripts() {
		wp_register_script( 'BNNP-admin', BNNP_ADMIN_ASSETS . 'js/bnnp-admin' . $this->suffix . '.js', BNNP_VERSION, true );
	}

	public function register_admin_styles() {
		wp_register_style( 'bnnp-admin', BNNP_ADMIN_ASSETS . 'css/bnnp-admin' . $this->suffix . '.css', array(), BNNP_VERSION, 'all' );
	}

	public function localize() {
		$i10n = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		);

		wp_localize_script( 'bnnp-front', 'SUPER_PLUGINS', $i10n );
	}
}
