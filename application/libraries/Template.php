<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template 
{
	public function auth($page, $args) {
		$_ci =& get_instance();
		$_ci->load->view('auth/header', $args);
		$_ci->load->view('auth/'.$page, $args);
		$_ci->load->view('auth/footer', $args);
	}

	public function dashboard($page, $args) {
		$_ci = &get_instance();
		$_ci->load->view('layouts/header', $args);
		$_ci->load->view($page, $args);
		$_ci->load->view('layouts/footer', $args);
	}
}
