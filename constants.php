<?php

namespace Monkey_Treat;

define( 'MTRT_PATH', plugin_dir_path( __FILE__ ) );
define( 'MTRT_URL', plugin_dir_url( __FILE__ ) );

define( 'MTRT_VERSION', '1.0.0' );
define( 'MTRT_SLUG', 'monkey_treat' ); // snake_case

define( 'MTRT_ADMIN_PATH', MTRT_PATH . 'admin/' );
define( 'MTRT_ADMIN_URL', MTRT_URL . 'admin/' );

define( 'MTRT_FRONT_ASSETS', MTRT_URL . 'front/assets/dist/' );
define( 'MTRT_IMG_ASSETS', MTRT_URL . 'front/assets/img/' );
define( 'MTRT_ADMIN_ASSETS', MTRT_ADMIN_URL . 'assets/dist/' );
