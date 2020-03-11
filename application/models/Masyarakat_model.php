<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masyarakat_model extends CI_Model
{
	public $fullname;
	public $username;
	public $password;
	public $telp;

	public function first($username)
	{
		return $this->db->where('username', $username)->get('tb_masyarakat')->row_object();
	}

	public function all()
	{
		return $this->db->get('tb_masyarakat')->result_object();
	}

	public function save()
	{
		$result = $this->db->set('nama_lengkap', $this->fullname)
			->set('username', $this->username)
			->set('password', password_hash($this->password, PASSWORD_ARGON2ID))
			->set('telp', $this->telp)
			->insert('tb_masyarakat');
		$this->_reset();
		return $result;
	}

	private function _reset() {
		$this->fullname = null;
		$this->username = null;
		$this->password = null;
		$this->telp		= '';
	}
}
