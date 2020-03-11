<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auction extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('lelang_model');
		if (!is_login()) {
			redirect('dashboard/login');
		}
	}

	public function index()
	{
		$args = [
			'page_title' => 'Pelelangan',
			'page_name'  => 'LelanginAja',
			'auctions'	 => $this->lelang_model->all(),
			'success' 	 => $this->session->flashdata('success'),
			'warning' 	 => $this->session->flashdata('warning'),
		];

		$this->template->dashboard('auction/list', $args);
	}

	public function create()
	{
		if (!is_level('administrator')) {
			redirect('dashboard');
		}
		if ($this->input->post('save')) {
			$errors = $this->_create_process();
		}
		$this->load->model(['masyarakat_model', 'barang_model', 'petugas_model']);
		$args = [
			'page_title' => 'Tambah barang',
			'page_name'  => 'LelanginAja',
			'users'	 => $this->masyarakat_model->all(),
			'products'	 => $this->barang_model->all(),
			'staffs' => $this->petugas_model->all(),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$this->template->dashboard('auction/create', $args);
	}

	public function edit($id)
	{
		if (!is_level('administrator')) {
			redirect('dashboard');
		}
		if ($this->input->post('save')) {
			$errors = $this->_edit_process($id);
		}
		$this->load->model(['masyarakat_model', 'barang_model', 'petugas_model']);
		$args = [
			'page_title' => 'Sunting barang',
			'page_name'  => 'LelanginAja',
			'users'	 => $this->masyarakat_model->all(),
			'products'	 => $this->barang_model->all(),
			'staffs' => $this->petugas_model->all(),
			'auction'	 => $this->lelang_model->first($id),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$this->template->dashboard('auction/edit', $args);
	}

	public function delete($id)
	{
		if ($this->input->post('delete')) {
			$errors = $this->_delete_process($id);
		}
		$args = [
			'page_title' => 'Hapus barang',
			'page_name'  => 'LelanginAja',
			'product'	 => $this->lelang_model->first($id),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$this->template->dashboard('auction/delete', $args);
	}

	public function bid($id) {
		if (is_level('administrator')) {
			redirect('dashboard');
		}
		$product = $this->lelang_model->first($id);
		if ($this->input->post('bid')) {
			$errors = $this->_bid_process($product);
			$product = $this->lelang_model->first($id);
		}
		if ($product->status != 'dibuka') {
			$this->session->set_flashdata('warning', 'Lelang telah ditutup');
			redirect('auction');
		}

		$args = [
			'page_title' => 'Bid barang',
			'page_name'  => 'LelanginAja',
			'product'	 => $product,
			'history'	 => $this->lelang_model->history($id),
			'max_bid'	 => $this->lelang_model->max_bid($id),
			'errors' 	 => isset($errors) ? $errors : [],
			'success' 	 => $this->session->flashdata('success'),
		];

		$this->template->dashboard('auction/bid', $args);
	}

	public function view($id)
	{
		if (is_level('')) {
			redirect('dashboard');
		}
		$product = $this->lelang_model->first($id);

		$args = [
			'page_title' => 'Lihat barang',
			'page_name'  => 'LelanginAja',
			'product'	 => $product,
			'history'	 => $this->lelang_model->history($id),
			'max_bid'	 => $this->lelang_model->max_bid($id),
		];

		$this->template->dashboard('auction/view', $args);
	}

	public function finish($id)
	{
		if ($this->input->post('finish')) {
			$errors = $this->_finish_process($id);
		}
		$args = [
			'page_title' => 'Selesaikan lelang',
			'page_name'  => 'LelanginAja',
			'product'	 => $this->lelang_model->first($id),
			'errors' 	 => isset($errors) ? $errors : [],
		];

		$this->template->dashboard('auction/finish', $args);
	}

	private function _finish_process($id)
	{
		$max = $this->lelang_model->max_bid($id);

		$this->lelang_model->harga_akhir = $max->penawaran_harga;
		$this->lelang_model->status = 'ditutup';
		$this->lelang_model->update($id);

		$this->session->set_flashdata('success', 'Lelang telah diselesaikan !');
		redirect('auction');

		return [];
	}

	private function _bid_process($product) {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('price', 'Price', 'required|numeric|greater_than_equal_to['.$product->harga_awal.']');
		if ($this->form_validation->run()) {
			$this->lelang_model->price = set_value('price');
			$this->lelang_model->id_lelang = $product->id_lelang;
			$this->lelang_model->id_user = uid();
			
			$this->lelang_model->save_bid();

			$this->session->set_flashdata('success', 'Bid telah ditambahkan');
			redirect('auction/bid/'.$product->id_lelang);
		}

		return $this->form_validation->error_array();
	}

	private function _create_process()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'Product', 'required');
		$this->form_validation->set_rules('tgl_lelang', 'Auction date', 'required');
		$this->form_validation->set_rules('jam_lelang', 'Auction time', 'required');
		$this->form_validation->set_rules('user', 'Auctioneer', 'required');
		$this->form_validation->set_rules('petugas', 'Staff', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run()) {
			$tgl_lelang = set_value('tgl_lelang') . ' '. set_value('jam_lelang') . ':00';
			$this->lelang_model->id_barang = set_value('product');
			$this->lelang_model->tgl_lelang = $tgl_lelang;
			$this->lelang_model->id_user = set_value('user');
			$this->lelang_model->id_petugas = set_value('petugas');
			$this->lelang_model->status = set_value('status');

			$this->lelang_model->save();

			$this->session->set_flashdata('success', 'Lelang telah ditambahkan');
			redirect('auction');
		}

		return $this->form_validation->error_array();
	}

	private function _edit_process($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('product', 'Product', 'required');
		$this->form_validation->set_rules('tgl_lelang', 'Auction date', 'required');
		$this->form_validation->set_rules('jam_lelang', 'Auction time', 'required');
		$this->form_validation->set_rules('user', 'Auctioneer', 'required');
		$this->form_validation->set_rules('petugas', 'Staff', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run()) {
			$tgl_lelang = set_value('tgl_lelang') . ' ' . set_value('jam_lelang') . ':00';
			$this->lelang_model->id_barang = set_value('product');
			$this->lelang_model->tgl_lelang = $tgl_lelang;
			$this->lelang_model->id_user = set_value('user');
			$this->lelang_model->id_petugas = set_value('petugas');
			$this->lelang_model->status = set_value('status');

			$this->lelang_model->update($id);

			$this->session->set_flashdata('success', 'Barang telah disunting');
			redirect('auction');
		}

		return $this->form_validation->error_array();
	}

	private function _delete_process($id)
	{
		$this->lelang_model->delete($id);

		$this->session->set_flashdata('success', 'Barang telah dihapus !');
		redirect('product');

		return [];
	}
}
