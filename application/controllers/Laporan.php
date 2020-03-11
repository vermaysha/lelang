<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('lelang_model');
		$this->load->library('pdf');
		if (!is_login() && is_level('')) {
			redirect('dashboard/login');
		}
	}

	public function index() {
		$this->load->library('pdf');
		$html = $this->load->view('report/lelang', [
			'auction' => $this->lelang_model->report(),
			'lelang_model' => $this->lelang_model
		], true);
		$this->pdf->WriteHTML($html);
		$this->pdf->Output('laporan-lelang-'.date('j-F-Y').'.pdf', 'I');
	}
}
