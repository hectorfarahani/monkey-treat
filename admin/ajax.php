<?php

add_action( 'wp_ajax_supl_save_settings', 'supl_save_settings' );

function supl_save_settings() {

	check_ajax_referer( 'supl_save_settings', 'nonce' );

	$post_type = sanitize_text_field( $_POST['option'] );
	$value     = sanitize_text_field( $_POST['value'] );


}
