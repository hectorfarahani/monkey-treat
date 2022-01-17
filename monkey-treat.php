<?php

/**
 * Plugin Name: Monkey Treat
 * Description: ‌Generate link and QR image to receive Banano donation.
 * Version:     1.0.0
 * Author:      h71
 * Author URI:      https://farahani.dev
 * Text Domain: monkey-treat
 * Domain Path: /languages
 * License:     GPLv3
 */

namespace Monkey_Treat;

use Monkey_Treat\Admin\Init as Admin;
use Monkey_Treat\Includes\Assets;
use Monkey_Treat\Includes\Elementor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, '\Monkey_Treat\activation_hook_callback' );

function activation_hook_callback() {
	\Monkey_Treat\Includes\Init::activate();
}

register_deactivation_hook( __FILE__, '\Monkey_Treat\deactivation_hook_callback' );

function deactivation_hook_callback() {
	\Monkey_Treat\Includes\Init::deactivate();
}


Admin::instance();
Assets::instance();
Elementor::instance();
