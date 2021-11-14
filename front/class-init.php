<?php

namespace Super_Plugin\Front;

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
		wp_enqueue_script( 'supl-front' );
		wp_enqueue_style( 'supl-front' );
	}
}
