<?php

function supl_get_option( string $option, $default = null ) {
	$options = get_option( 'supl_config', array() );
	return $options[ $option ] ?? $default;
}

function supl_update_option( $option, $new_value ) {
	$config            = get_option( 'supl_config', array() );
	$config[ $option ] = $new_value;
	return update_option( 'supl_config', $config );
}
