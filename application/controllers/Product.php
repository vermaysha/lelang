<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('barang_model');
		if (!is_login()) {
			redirect('dashboard/login');
		}
		if (!is_level('administrator')) {
			redirect('dashboard');
		}
	}
	
	public function index()
	{
		$args = [
			'page_title' => 'Barang',
			'page_name'  => 'LelanginAja',
			'products'	 => $this->barang_model->all(),
			'success' 	 => $this->session->flashdata('success'),
		];

		$this->template->dashboard('product/list', $args);
	}

	public function edit($id)
	{
		if ($this->input->post('save')) {
			$errors = $this->_edit_process($id);
		}
		$args = [
			'page_title' => 'Sunting barang',
			'page_name'  => 'LelanginAja',
			'product'	 => $this->barang_model->first($id),
			'errors' 	 => isset($errors) ? $errors : [],		
		];

		$this->template->dashboard('product/edit', $args);
	}

	public function delete($id)
	{
		if ($this->input->post('delete')) {
			$errors = $this->_delete_process($id);
		}
		$args = [
			'page_title' => 'Hapus barang',
			'page_name'  => 'LelanginAja',
			'product'	 => $this->barang_model->first($id),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$this->template->dashboard('product/delete', $args);
	}

	public function create() {
		if ($this->input->post('save')) {
			$errors = $this->_create_process();
		}
		$args = [
			'page_title' => 'Tambah barang',
			'page_name'  => 'LelanginAja',
			'errors' 	 => isset($errors) ? $errors : [],			
		];

		$this->template->dashboard('product/create', $args);
	}

	private function _create_process() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Product name', 'required|alpha_numeric_spaces|min_length[10]');
		$this->form_validation->set_rules('desc', 'Product desc', 'required|min_length[20]');
		$this->form_validation->set_rules('price', 'Product price', 'required|numeric');

		if ($this->form_validation->run()) {
			$this->barang_model->name = set_value('name');
			$this->barang_model->desc = set_value('desc');
			$this->barang_model->price = set_value('price');

			$this->barang_model->save();

			$this->session->set_flashdata('success', 'Barang telah ditambahkan');
			redirect('product');
		}

		return $this->form_validation->error_array();
	}

	private function _edit_process($id) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Product name', 'required|alpha_numeric_spaces|min_length[10]');
		$this->form_validation->set_rules('desc', 'Product desc', 'required|min_length[20]');
		$this->form_validation->set_rules('price', 'Product price', 'required|numeric');

		if ($this->form_validation->run()) {
			$this->barang_model->name = set_value('name');
			$this->barang_model->desc = set_value('desc');
			$this->barang_model->price = set_value('price');

			$this->barang_model->update($id);

			$this->session->set_flashdata('success', 'Barang telah disunting');
			redirect('product');
		}

		return $this->form_validation->error_array();
	}

	private function _delete_process($id) {
		$this->barang_model->delete($id);

		$this->session->set_flashdata('success', 'Barang telah dihapus !');
		redirect('product');

		return [];
	}
}
