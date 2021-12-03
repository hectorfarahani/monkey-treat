<?php

function mtrt_get_option( string $option, $default = null ) {
	$options = get_option( 'mtrt_config', array() );
	return $options[ $option ] ?? $default;
}

function mtrt_update_option( $option, $new_value ) {
	$config            = get_option( 'mtrt_config', array() );
	$config[ $option ] = $new_value;
	return update_option( 'mtrt_config', $config );
}
