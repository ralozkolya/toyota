<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_lang() {
	$ci =& get_instance();
	$lang = $ci->session->userdata('language');

	if(!$lang && $lang !== 'ka' && $lang !== 'en') {
		$lang = 'ka';
	}

	$ci->session->set_userdata('language', $lang);
	define('LANG', $lang);

	return $lang;
}

function lang_file() {
	return LANG === 'ka' ? 'georgian' : 'english';
}
