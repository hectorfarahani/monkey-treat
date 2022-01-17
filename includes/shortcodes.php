<?php

function mtrt_shortcode(){
	return mtrt_get_QR_code();
}

add_shortcode('monkey_treat', 'mtrt_shortcode');
