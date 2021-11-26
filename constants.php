<?php

namespace Banano_Pay;

define( 'BNNP_PATH', plugin_dir_path( __FILE__ ) );
define( 'BNNP_URL', plugin_dir_url( __FILE__ ) );

define( 'BNNP_VERSION', '1.0.0' );
define( 'BNNP_SLUG', 'banano_pay' ); // snake_case

define( 'BNNP_ADMIN_PATH', BNNP_PATH . 'admin/' );
define( 'BNNP_ADMIN_URL', BNNP_URL . 'admin/' );

define( 'BNNP_FRONT_ASSETS', BNNP_URL . 'front/assets/dist/' );
define( 'BNNP_IMG_ASSETS', BNNP_URL . 'front/assets/img/' );
define( 'BNNP_ADMIN_ASSETS', BNNP_ADMIN_URL . 'assets/dist/' );
