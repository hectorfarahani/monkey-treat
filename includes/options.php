<?php

function bnnp_get_option( string $option, $default = null ) {
	$options = get_option( 'bnnp_config', array() );
	return $options[ $option ] ?? $default;
}

function bnnp_update_option( $option, $new_value ) {
	$config            = get_option( 'bnnp_config', array() );
	$config[ $option ] = $new_value;
	return update_option( 'bnnp_config', $config );
}
