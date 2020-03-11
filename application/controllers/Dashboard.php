<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('petugas_model');
	}

	public function index()
	{
		if (!is_login()) {
			redirect('dashboard/login');
		}
		
		$args = [
			'page_title' => 'Dashboard',
			'page_name'  => 'LelanginAja',
			'errors' 	 => isset($errors) ? $errors : []
		];

		$this->template->dashboard('dashboard/welcome', $args);
	}

	public function login() {
		if (is_login()) {
			redirect('dashboard');
		}
		if ($this->input->post('login')) {
			$errors = $this->_login_process();
		}
		$args = [
			'page_title' => 'Dashboard',
			'page_name'  => 'LelanginAja',
			'errors' 	 => isset($errors) ? $errors : [],
			'success'	 => $this->session->flashdata('success')
		];

		$this->template->auth('login', $args);
	}

	/**
	 * Process login
	 */
	private function _login_process() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|min_length[5]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');

		if ($this->form_validation->run()) {
			$username = set_value('username');
			$password = set_value('password');
			$user = $this->petugas_model->first($username);
			if ($user == null) {
				return ['Username not registered !.'];
			}

			if ( ! password_verify($password, $user->password)) {
				return ['Password wrong !.'];
			}

			login([
				'username' => $user->username,
				'uid'	   => $user->id_petugas,
				'level'	   => $user->level
			]);

			redirect('dashboard');
			exit;
		}

		return $this->form_validation->error_array();
	}
}
