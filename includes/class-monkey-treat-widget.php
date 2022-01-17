<?php

namespace Monkey_Treat\Includes;

class Monkey_Treat_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'monkey-treat';
	}

	public function get_title() {
		return __( 'Monkey Treat', 'monkey-treat' );
	}

	public function get_icon() {
		return 'eicon-play';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	protected function _register_controls() {}

	protected function render() {
		echo mtrt_get_QR_code();
	}

}
