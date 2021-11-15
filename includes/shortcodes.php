<?php

function bnnp_shortcode(){
	return bnnp_get_QR_code();
}

add_shortcode('bananp_pay', 'bnnp_shortcode');
