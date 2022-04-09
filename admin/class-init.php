<?php

namespace BTC_QR_CODE\Admin;

use BTC_QR_CODE\Includes\Functions;

class Init {

	private static $instance = null;

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
		add_action( 'admin_enqueue_scripts', array( $this, 'assets' ) );
		add_action( 'admin_menu', array( $this, 'add_menu_page' ) );
	}

	public function assets( $hook ) {
		if ( 'settings_page_btc-qr-code' === $hook ) {
			wp_enqueue_style( 'btcqrc-admin' );
			wp_enqueue_script( 'btcqrc-admin' );
		}
	}

	public function add_menu_page() {
		add_submenu_page(
			'options-general.php',
			__( 'Bitcoin QR Code', 'btc-qr-code' ),
			__( 'Bitcoin QR Code', 'btc-qr-code' ),
			'manage_options',
			'btc-qr-code',
			array( $this, 'renbder_settings_page' ),
		);
	}

	public function renbder_settings_page() {
		?>
		<div class="btcqrc-admin-wrapper">
			<div class="btcqrc-admin-header">
				<span class="btcqrc-logo">
				<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="100px" height="100px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd"
				viewBox="0 0 4091.27 4091.73"
				 xmlns:xlink="http://www.w3.org/1999/xlink"
				 xmlns:xodm="http://www.corel.com/coreldraw/odm/2003">
				 <g id="Layer_x0020_1">
				  <metadata id="CorelCorpID_0Corel-Layer"/>
				  <g id="_1421344023328">
				   <path fill="#F7931A" fill-rule="nonzero" d="M4030.06 2540.77c-273.24,1096.01 -1383.32,1763.02 -2479.46,1489.71 -1095.68,-273.24 -1762.69,-1383.39 -1489.33,-2479.31 273.12,-1096.13 1383.2,-1763.19 2479,-1489.95 1096.06,273.24 1763.03,1383.51 1489.76,2479.57l0.02 -0.02z"/>
				   <path fill="white" fill-rule="nonzero" d="M2947.77 1754.38c40.72,-272.26 -166.56,-418.61 -450,-516.24l91.95 -368.8 -224.5 -55.94 -89.51 359.09c-59.02,-14.72 -119.63,-28.59 -179.87,-42.34l90.16 -361.46 -224.36 -55.94 -92 368.68c-48.84,-11.12 -96.81,-22.11 -143.35,-33.69l0.26 -1.16 -309.59 -77.31 -59.72 239.78c0,0 166.56,38.18 163.05,40.53 90.91,22.69 107.35,82.87 104.62,130.57l-104.74 420.15c6.26,1.59 14.38,3.89 23.34,7.49 -7.49,-1.86 -15.46,-3.89 -23.73,-5.87l-146.81 588.57c-11.11,27.62 -39.31,69.07 -102.87,53.33 2.25,3.26 -163.17,-40.72 -163.17,-40.72l-111.46 256.98 292.15 72.83c54.35,13.63 107.61,27.89 160.06,41.3l-92.9 373.03 224.24 55.94 92 -369.07c61.26,16.63 120.71,31.97 178.91,46.43l-91.69 367.33 224.51 55.94 92.89 -372.33c382.82,72.45 670.67,43.24 791.83,-303.02 97.63,-278.78 -4.86,-439.58 -206.26,-544.44 146.69,-33.83 257.18,-130.31 286.64,-329.61l-0.07 -0.05zm-512.93 719.26c-69.38,278.78 -538.76,128.08 -690.94,90.29l123.28 -494.2c152.17,37.99 640.17,113.17 567.67,403.91zm69.43 -723.3c-63.29,253.58 -453.96,124.75 -580.69,93.16l111.77 -448.21c126.73,31.59 534.85,90.55 468.94,355.05l-0.02 0z"/>
				  </g>
				 </g>
				</svg>
				</span>
				<span class="btcqrc-admin-title">
					<h1><?php esc_html_e( 'Bitcoin QR Code', 'btc-qr-code' ); ?></h1>
				</span>
				<p><?php esc_html_e( 'Un-Official Bitcoin QR Code plugin for WordPress.', 'btc-qr-code' ); ?></p>
				<p><?php esc_html_e( 'Use the following shortcode to display donation QR code. If you are using Elementor, use the Elementor widget.', 'btc-qr-code' ); ?><code>[btc_qr_code]</code></p>
				<br>
			</div>
			<div class="btcqrc-admin-main">
				<section class="btcqrc-settings">
					<label for="btc_qr_code_address">
						<?php _e( 'Bitcoin QR Code address:', 'btc-qr-code' ); ?>
					</label>
					<br>
					<input type="text" id="btc-qr-code-address" name="btc_qr_code_address" placeholder="1, 3 or bc1" size="34" pattern="[A-z0-9]{27,34}" value="<?php echo esc_attr( btcqrc_get_option( '_btc_qr_code_address' ) ); ?>">
					<?php wp_nonce_field( 'btcqrc_save_settings' ); ?>
					<input type="submit" id="save_btc_qr_code_address" name="save_btc_qr_code_address" value="<?php esc_attr_e( 'Save', 'btc-qr-code' ); ?>">
					<?php if ( btcqrc_get_option( '_btc_qr_code_address' ) ) : ?>
					<?php endif; ?>
					<div id="btcqrc-message-area"></div>
				</section>
			</div>
		</div>
		<?php
	}

}
