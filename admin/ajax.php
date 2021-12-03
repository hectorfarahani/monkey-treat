<?php

add_action( 'wp_ajax_mtrt_validate_address', 'mtrt_validate_address' );

function mtrt_validate_address() {

	check_ajax_referer( 'mtrt_save_settings', 'nonce' );

	$address = sanitize_text_field( $_POST['address'] );

	if ( 64 !== strlen( $address ) ) {
		wp_send_json_error(__('Banano address is not valid. It should have exactly 64 characters.', 'monkey-treat'));
	}

	if ( 0 !== strpos( $address, 'ban_' ) ) {
		wp_send_json_error(__('Banano address is not valid. It should start with <code>ban_</code>.', 'monkey-treat'));
	}

	mtrt_update_option( '_monkey_treat_address', $address );

	wp_send_json_success(__('Saved!', 'monkey-treat'));
}
