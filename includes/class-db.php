<?php

namespace Super_Plugin\Includes;
class DB {

	public static $instance = null;

	public $table;
	public $charset_collate;

	private function __construct() {
		$this->init();
	}

	public static function instance() {
		if ( null === self::$instance ) {
			self::$instance = new DB();
		}

		return self::$instance;
	}

	public function init() {
		global $wpdb;
		$this->table           = $wpdb->prefix . SUPL_SLUG;
		$this->charset_collate = $wpdb->get_charset_collate();
	}

	public function create() {
		global $wpdb;

		$sql = "CREATE TABLE $this->table (
			id INT NOT NULL AUTO_INCREMENT,
			time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
			PRIMARY KEY  (id)
		) $this->charset_collate;";

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';
		dbDelta( $sql );
	}

}
