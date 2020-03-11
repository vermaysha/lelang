<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('masyarakat_model');
	}

	/**
	 * Index page
	 */
	public function index() {
		if ( ! is_login()) {
			redirect('login');
		} 
		redirect('dashboard');
	}

	/**
	 * Login page
	 */
	public function login() {
		if ($this->input->post('login')) {
			$errors = $this->_login_process();
		}
		$args = [
			'page_title' => 'Login',
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
			$user = $this->masyarakat_model->first($username);
			if ($user == null) {
				return ['Username not registered !.'];
			}

			if (!password_verify($password, $user->password)) {
				return ['Password wrong !.'];
			}

			login([
				'username' => $user->username,
				'uid'	   => $user->id_user,
				'level'	   => ''
			]);

			redirect('dashboard');
			exit;
		}

		return $this->form_validation->error_array();
	}

	/**
	 * Register Process
	 */
	public function register() {
		if ($this->input->post('register')) {
			$errors = $this->_register_process();
		}
		$args = [
			'page_title' => 'Register',
			'page_name'  => 'LelanginAja',
			'errors' 	 => isset($errors) ? $errors : []
		];

		$this->template->auth('register', $args);
	}

	/**
	 * Process Register
	 */
	private function _register_process()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|alpha_dash|min_length[5]');
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_dash|min_length[5]|is_unique[tb_masyarakat.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|min_length[8]|matches[password]');
		
		if ($this->form_validation->run()) {
			$this->masyarakat_model->fullname = set_value('fullname');
			$this->masyarakat_model->username = set_value('username');
			$this->masyarakat_model->password = set_value('password');
			$this->masyarakat_model->telp 	  = '';

			$this->masyarakat_model->save();

			$this->session->set_flashdata('success', 'Akun berhasil mendaftar !');
			redirect('login');
		}
	}

	public function logout() {
		if (is_level(null)) {
			$url = 'login';
		} else {
			$url = 'dashboard/login';
		}
		$this->session->sess_destroy();
		redirect($url);
	}
}
