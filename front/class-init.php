<?php

namespace Banano_Pay\Front;

class Init {

	public static $instance = null;

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
		add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
	}

	public function assets() {
		wp_enqueue_script( 'bnnp-front' );
		wp_enqueue_style( 'bnnp-front' );
	}
}
