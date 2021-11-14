<?php

namespace Super_Plugin\Includes;

class Init {

	public static $instance = null;

	private function __construct() {

	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new Init();
		}

		return self::$instance;
	}

	// Create database and things.
	public static function activate() {
		$db = DB::instance();
		$db->create();
	}

	public static function deactivate() {

	}
}
