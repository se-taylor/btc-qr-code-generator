<?php

function btcqrc_get_option( string $option, $default = null ) {
	$options = get_option( 'btcqrc_config_btc', array() );
	return $options[ $option ] ?? $default;
}

function btcqrc_update_option( $option, $new_value ) {
	$config            = get_option( 'btcqrc_config_btc', array() );
	$config[ $option ] = $new_value;
	return update_option( 'btcqrc_config_btc', $config );
}
