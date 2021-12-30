<?php
class Model_powersupply extends CI_Model{
	private $table="powersupply";
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
		$this->db->insert("powersupply",$simpan);
		return $this->db->insert_id();
	}

	public function hapus($kode){
    	$this->db->where($this->primary,$kode);
    	$this->db->delete($this->table);
    }

	// public function getQuestion(){
	// 	$this->db->select("*");
	// 	$this->db->from("konsultasi");
	// 	$this->db->where("id_konsultasi", 2);
	// 	$this->db->join("masalah","masalah.id_masalah=konsultasi.id_masalah");
	// 	$this->db->join("pertanyaan","pertanyaan.id_pertanyaan=konsultasi.id_pertanyaan");
	// 	$this->db->join("solusi","solusi.id_solusi=konsultasi.id_solusi");
	// 	return $this->db->get();
	// }

	// // public function cek($id_pertanyaan){
	// // 	$this->db->select("*");
	// // 	$this->db->from("konsultasi");
	// // 	$this->db->where("id_pertanyaan", $id_pertanyaan);
	// // 	return $this->db->get();
	// // }

	// public function pilihan($id_pertanyaan,$answer){
	// 	$this->db->select('pilihan, solusi');
	// 	$this->db->from('konsultasi');
	// 	$this->db->where("id_pertanyaan", $id_pertanyaan);
	// 	$this->db->where("pilihan", $answer);
	// 	$this->db->join("masalah","masalah.id_masalah=konsultasi.id_masalah");
	// 	// $this->db->join("pertanyaan","pertanyaan.id_pertanyaan=konsultasi.id_pertanyaan");
	// 	$this->db->join("solusi","solusi.id_solusi=konsultasi.id_solusi");
	// 	return $this->db->get();
	// }

	// public function pilihan_select($id_pertanyaan){
	// 	$this->db->select('pilihan, solusi');
	// 	$this->db->from('konsultasi');
	// 	$this->db->where("id_pertanyaan", $id_pertanyaan);
	// 	$this->db->join("masalah","masalah.id_masalah=konsultasi.id_masalah");
	// 	// $this->db->join("pertanyaan","pertanyaan.id_pertanyaan=konsultasi.id_pertanyaan");
	// 	$this->db->join("solusi","solusi.id_solusi=konsultasi.id_solusi");
	// 	return $this->db->get();
	// }

	// public function pertanyaan($id){
	// 	$this->db->select("*");
	// 	$this->db->from("pertanyaan");
	// 	$this->db->where("id_pertanyaan", $id);
	// 	return $this->db->get();
	// }

	// public function pertanyaan_dua($id){
	// 	$this->db->select("*");
	// 	$this->db->from("pertanyaan");
	// 	$this->db->where("id_pertanyaan", $id);
	// 	return $this->db->get();
	// }

	// public function jumlah(){
	// 	$this->db->select("*");
	// 	$this->db->from("pertanyaan");
	// 	// $this->db->group_by("id_pertanyaan");
	// 	return $this->db->count_all_results();
	// }
}