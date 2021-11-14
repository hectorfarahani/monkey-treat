<?php

namespace Super_Plugins;

define( 'SUPL_PATH', plugin_dir_path( __FILE__ ) );
define( 'SUPL_URL', plugin_dir_url( __FILE__ ) );

define( 'SUPL_VERSION', '0.0.0' );
define( 'SUPL_SLUG', 'super_plugin' ); // snake_case

define( 'SUPL_ADMIN_PATH', SUPL_PATH . 'admin/' );
define( 'SUPL_ADMIN_URL', SUPL_URL . 'admin/' );

define( 'SUPL_FRONT_ASSETS', SUPL_URL . 'front/assets/dist/' );
define( 'SUPL_IMG_ASSETS', SUPL_URL . 'front/assets/img/' );
define( 'SUPL_ADMIN_ASSETS', SUPL_ADMIN_URL . 'assets/dist/' );
