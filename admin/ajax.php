<?php

add_action( 'wp_ajax_btcqrc_validate_address', 'btcqrc_validate_address' );

function btcqrc_validate_address() {

	check_ajax_referer( 'btcqrc_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );

	if ( (strlen( $address ) < 27) || (strlen( $address ) > 34) ) {
		wp_send_json_error(__('Bitcoin address is not valid. It should have 27-34 characters.', 'btc-qr-code'));
	}


	if ( 0 !== strpos( $address, '1' ) && 0 !== strpos( $address, '3' ) && 0 !== strpos( $address, 'bc1' ) ) {
		wp_send_json_error(__('Bitcoin address is not valid. It should start with <code>1, 3 or bc1</code>.', 'btc-qr-code'));
	}

	btcqrc_update_option( '_btc_qr_code_address', $address );

	wp_send_json_success(__('Saved!', 'btc-qr-code'));
}
