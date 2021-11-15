<?php

namespace Banano_Pay\Includes;

class Banano_Pay_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'banano-pay';
	}

	public function get_title() {
		return __( 'Banano Pay', 'banano-pay' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {}

	protected function render() {
		echo bnnp_get_QR_code();
	}

}
