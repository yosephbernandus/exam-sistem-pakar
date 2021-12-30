<?php
class Model_vga extends CI_Model{
	private $table="kerusakan_vga";
	private $primary="id_pertanyaan";

	public function view(){
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->get();
	}

	public function view_result($id){
		$this->db->select("*");
		$this->db->from($this->table);
		$this->db->where("id_pertanyaan", $id);
		return $this->db->get();
	}

	public function view_pertanyaan(){
		$this->db->select("*");
		$this->db->from($this->table);
		// $this->db->where("id_masalah", 2);
		$this->db->where("keterangan", "pertanyaan");
		return $this->db->get();
	}

	public function view_solusi(){
		$this->db->select("*");
		$this->db->from($this->table);
		// $this->db->where("id_masalah", 2);
		$this->db->where("keterangan", "solusi");
		return $this->db->get();
	}

	public function view_all(){
		$this->db->select("*");
		$this->db->from($this->table);
		return $this->db->get();
	}

	public function cek($kode){
		$this->db->where($this->primary,$kode);
		$query=$this->db->get($this->table);

		return $query;
	}

	public function update($kode, $jenis){
		$this->db->where($this->primary,$kode);
        $this->db->update($this->table,$jenis);
	}

	public function simpan($simpan){
		$this->db->insert($this->table,$simpan);
		return $this->db->insert_id();
	}

	public function hapus($kode){
    	$this->db->where($this->primary,$kode);
    	$this->db->delete($this->table);
    }
}