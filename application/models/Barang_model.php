<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang_model extends CI_Model
{
	public $name;
	public $price;
	public $desc;

	public function first($id)
	{
		return $this->db->where('id_barang', $id)->get('tb_barang')->row_object();
	}

	public function all()
	{
		return $this->db->order_by('id_barang', 'desc')->get('tb_barang')->result_object();
	}

	public function save() {
		$result = $this->db->set('nama_barang', $this->name)
							->set('tgl', date('Y-m-d'))
							->set('harga_awal', $this->price)
							->set('deskripsi_barang', $this->desc)
							->insert('tb_barang');
		$this->_reset();
		return $result;
	}

	public function update($id) {
		$result = $this->db->where('id_barang', $id)
							->set('nama_barang', $this->name)
							->set('tgl', date('Y-m-d'))
							->set('harga_awal', $this->price)
							->set('deskripsi_barang', $this->desc)
							->update('tb_barang');
		$this->_reset();
		return $result;
	}

	public function delete($id) {
		return $this->db->where('id_barang', $id)->delete('tb_barang');
	}

	private function _reset() {
		$this->name = null;
		$this->price = null;
		$this->desc = null;
	}
}
