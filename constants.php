<?php

namespace BTC_QR_CODE;

define( 'BTCQRC_PATH', plugin_dir_path( __FILE__ ) );
define( 'BTCQRC_URL', plugin_dir_url( __FILE__ ) );

define( 'BTCQRC_VERSION', '1.0.0' );
define( 'BTCQRC_SLUG', 'btc_qr_code' ); // snake_case

define( 'BTCQRC_ADMIN_PATH', BTCQRC_PATH . 'admin/' );
define( 'BTCQRC_ADMIN_URL', BTCQRC_URL . 'admin/' );

define( 'BTCQRC_FRONT_ASSETS', BTCQRC_URL . 'front/assets/dist/' );
define( 'BTCQRC_IMG_ASSETS', BTCQRC_URL . 'front/assets/img/' );
define( 'BTCQRC_ADMIN_ASSETS', BTCQRC_ADMIN_URL . 'assets/dist/' );
