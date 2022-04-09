<?php

function btcqrc_shortcode(){
	return btcqrc_get_QR_code();
}

add_shortcode('btc_qr_code', 'btcqrc_shortcode');
