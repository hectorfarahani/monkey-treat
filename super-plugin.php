<?php

/**
 * Plugin Name: Super Plugin
 * Description: Short Description about Super Plugin
 * Version:     0.0.0
 * Author:      h71
 * Text Domain: super-plugin
 * Domain Path: /languages
 * License:     GPLv3
 */

namespace Super_Plugin;

use Super_Plugin\Front\Init as Front;
use Super_Plugin\Admin\Init as Admin;
use Super_Plugin\Includes\Assets;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once 'vendor/autoload.php';

register_activation_hook( __FILE__, '\Super_Plugin\activation_hook_callback' );

function activation_hook_callback() {
	\Super_Plugin\Includes\Init::activate();
}

register_deactivation_hook( __FILE__, '\Super_Plugin\deactivation_hook_callback' );

function deactivation_hook_callback() {
	\Super_Plugin\Includes\Init::deactivate();
}


Admin::instance();
Assets::instance();
Front::instance();
