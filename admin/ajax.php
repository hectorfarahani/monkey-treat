<?php

add_action( 'wp_ajax_bnnp_validate_address', 'bnnp_validate_address' );

function bnnp_validate_address() {

	check_ajax_referer( 'bnnp_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );

	if ( 64 !== strlen( $address ) ) {
		wp_send_json_error(__('Banano address is not valid. It should have exactly 64 characters.', 'banano-pay'));
	}

	if ( 0 !== strpos( $address, 'ban_' ) ) {
		wp_send_json_error(__('Banano address is not valid. It should start with <code>ban_</code>.', 'banano-pay'));
	}

	bnnp_update_option( '_banano_pay_address', $address );

	wp_send_json_success(__('Saved!', 'banano-pay'));
}
