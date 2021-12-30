<?php
class Model_administrator extends CI_Model {
	
	public function cek ($username){
		$this->db->select('*');
		$this->db->where("user",$username);
		// $this->db->where("password",$password);
		return $this->db->get("administrator");
	}


	public function semua($id){
		$this->db->select('*');
		$this->db->where('id_admin',$id);
		$this->db->from('administrator');
		return $this->db->get();
	}

	public function cekId($kode){
		$this->db->where('user', $kode);
		return $this->db->get("administrator");
	}

	public function update($id,$info){
        $this->db->where("id_admin",$id);
        $this->db->update("administrator",$info);
    }
}