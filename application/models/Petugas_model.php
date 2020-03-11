<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas_model extends CI_Model {
	public function first($username) {
		return $this->db->where('username', $username)
						->join('tb_level', 'tb_level.id_level = tb_petugas.id_level')
					    ->get('tb_petugas')->row_object();
	}

	public function all() {
		return $this->db->get('tb_petugas')->result_object();
	}
}
