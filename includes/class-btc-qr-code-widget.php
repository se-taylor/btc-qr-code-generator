<?php

namespace BTC_QR_CODE\Includes;

class Bitcoin_QR_Code_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'btc-qr-code';
	}

	public function get_title() {
		return __( 'Bitcoin QR Code', 'btc-qr-code' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {}

	protected function render() {
		echo btcqrc_get_QR_code();
	}

}
