<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Mengecek apakah user telah login atau belum
 */
if ( ! function_exists('is_login')) {
	function is_login() {
		$_ci =& get_instance();
		$session = $_ci->session;
		
		return $session->has_userdata('username') && 
			   $session->has_userdata('uid') && 
			   $session->has_userdata('level');

		// TODO(asharyver): After check userdata, check login status in db
	}
}

/**
 * function agar user bisa login
 */
if  ( !  function_exists('login')) {
	function login($data) {
		$_ci =& get_instance();

		$_ci->session->set_userdata($data);

		// TODO(asharyver): After login, set the login to db
	}
}

if ( ! function_exists('is_level')) {
	function is_level($level) {
		$_ci = &get_instance();
		return ($_ci->session->userdata('level') == $level);
	}
}

if ( ! function_exists('username')) {
	function username() {
		return get_instance()->session->userdata('username');
	}
}

if ( ! function_exists('uid')) {
	function uid() {
		return get_instance()->session->userdata('uid');
	}
}
