<?php

/**
 * Plugin Name: Banano Pay
 * Description: ‌Generate link and QR image to receive Banano donation.
 * Version:     1.0.0
 * Author:      h71
 * Text Domain: banano-pay
 * Domain Path: /languages
 * License:     GPLv3
 */

namespace Banano_Pay;

use Banano_Pay\Front\Init as Front;
use Banano_Pay\Admin\Init as Admin;
use Banano_Pay\Includes\Assets;
use Banano_Pay\Includes\Elementor;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, '\Banano_Pay\activation_hook_callback' );

function activation_hook_callback() {
	\Banano_Pay\Includes\Init::activate();
}

register_deactivation_hook( __FILE__, '\Banano_Pay\deactivation_hook_callback' );

function deactivation_hook_callback() {
	\Banano_Pay\Includes\Init::deactivate();
}


Admin::instance();
Assets::instance();
Elementor::instance();
