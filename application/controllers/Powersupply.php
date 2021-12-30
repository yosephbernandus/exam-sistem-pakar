<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Powersupply extends CI_Controller {
	private $limit=1;

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination','template_front','template'));
		$this->load->model('model_powersupply');

		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index(){
		$data['view_pertanyaan'] = $this->model_powersupply->view_pertanyaan()->result();
		$data['view_solusi'] = $this->model_powersupply->view_solusi()->result();
		$data['view_all'] = $this->model_powersupply->view_all()->result();

		if ($this->uri->segment(3)=="delete_success_pertanyaan") {
			$data['message_pertanyaan']="<div class='alert alert-success'>Data Deleted</div>";
		} else if ($this->uri->segment(3)=="add_success_pertanyaan"){
			$data['message_pertanyaan']="<div class='alert alert-success'>Data Saved</div>";
		} else {
			$data['message_pertanyaan']='';
		}

		if ($this->uri->segment(3)=="delete_success_solusi") {
			$data['message_solusi']="<div class='alert alert-success'>Data Deleted</div>";
		} else if ($this->uri->segment(3)=="add_success_solusi"){
			$data['message_solusi']="<div class='alert alert-success'>Data Saved</div>";
		} else {
			$data['message_solusi']='';
		}

		$this->template->display('backend/powersupply/index',$data);
	}

	public function tambah_pertanyaan(){
		$data['title']="Tambah Pertanyaan";
		$this->_set_rules_tambah();
		if ($this->form_validation->run()==true) {
			$pertanyaan=$this->input->post('pertanyaan');
			$cek=$this->model_powersupply->cek($pertanyaan);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-warning'>ID Already Use</div>";
				$this->template->display('backend/powersupply/tambah_pertanyaan',$data);
			} else {
				$info=array(
					'pertanyaan'=>$this->input->post('pertanyaan'),
					'bila_benar'=>$this->input->post('bila_benar'),
					'keterangan'=>$this->input->post('keterangan'),
					'bila_salah'=>$this->input->post('bila_salah'),
				);
				$this->model_powersupply->simpan($info);
				redirect('powersupply/index/add_success_pertanyaan');
			}
		} else {
			$data['message']="";
			$data['view_all_result'] = $this->model_powersupply->view_all()->result();
			$this->template->display('backend/powersupply/tambah_pertanyaan',$data);
		}
	}

	public function tambah_solusi(){
		$data['title']="Tambah Solusi";
		$this->_set_rules_tambah();
		if ($this->form_validation->run()==true) {
			$pertanyaan=$this->input->post('pertanyaan');
			$cek=$this->model_powersupply->cek($pertanyaan);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-warning'>ID Already Use</div>";
				$this->template->display('backend/powersupply/tambah_pertanyaan',$data);
			} else {
				$info=array(
					'pertanyaan'=>$this->input->post('pertanyaan'),
					'bila_benar'=>$this->input->post('bila_benar'),
					'keterangan'=>$this->input->post('keterangan'),
					'bila_salah'=>$this->input->post('bila_salah'),
				);
				$this->model_powersupply->simpan($info);
				redirect('powersupply/index/add_success_solusi');
			}
		} else {
			$data['message']="";
			$this->template->display('backend/powersupply/tambah_solusi',$data);
		}
	}


	public function edit($id_pertanyaan){
		$data['title'] = "Edit Pertanyaan";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$id_pertanyaan = $this->input->post('id_pertanyaan');

			$simpan=array(
				'pertanyaan'=>$this->input->post('pertanyaan'),
				'bila_benar'=>$this->input->post('bila_benar'),
				'bila_salah'=>$this->input->post('bila_salah'),
				'keterangan'=>$this->input->post('keterangan'),
			);

			$this->model_powersupply->update($id_pertanyaan,$simpan);
			$data['message']="<div class='alert alert-success'>Data Updated</div>";
			$data['view_all']=$this->model_powersupply->cek($id_pertanyaan)->row_array();
			$this->template->display('backend/powersupply/edit',$data);
		} else {
			$data['view_all']=$this->model_powersupply->cek($id_pertanyaan)->row_array();
			$data['view_all_result'] = $this->model_powersupply->view_all()->result();
			$data['message']="";
			$this->template->display('backend/powersupply/edit',$data);
		}
	}

	public function edit_solusi($id_pertanyaan){
		$data['title'] = "Edit Solusi";
		$this->_set_rules();
		if ($this->form_validation->run()==true) {
			$id_pertanyaan = $this->input->post('id_pertanyaan');

			$simpan=array(
				'pertanyaan'=>$this->input->post('pertanyaan'),
				'bila_benar'=>$this->input->post('bila_benar'),
				'bila_salah'=>$this->input->post('bila_salah'),
				'keterangan'=>$this->input->post('keterangan'),
			);

			$this->model_powersupply->update($id_pertanyaan,$simpan);
			$data['message']="<div class='alert alert-success'>Data Updated</div>";
			$data['view_all']=$this->model_powersupply->cek($id_pertanyaan)->row_array();
			$this->template->display('backend/powersupply/edit_solusi',$data);
		} else {
			$data['view_all']=$this->model_powersupply->cek($id_pertanyaan)->row_array();
			$data['view_all_result'] = $this->model_powersupply->view_all()->result();
			$data['message']="";
			$this->template->display('backend/powersupply/edit_solusi',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
		$this->model_powersupply->hapus($kode);
	}

	public function _set_rules_tambah(){
		$this->form_validation->set_rules('pertanyaan','Pertanyaan','required|max_length[500]');
		$this->form_validation->set_rules('bila_benar','Bila Benar','required|max_length[500]');
		$this->form_validation->set_rules('bila_salah','Bila Salah','required|max_length[50]');
		$this->form_validation->set_rules('keterangan','Keterangan','required|max_length[500]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}

	public function _set_rules(){
		$this->form_validation->set_rules('pertanyaan','Pertanyaan / Solusi','required|max_length[500]');
		$this->form_validation->set_rules('bila_benar','Bila Benar','required|max_length[500]');
		$this->form_validation->set_rules('bila_salah','Bila Salah','required|max_length[50]');
		$this->form_validation->set_rules('keterangan','Keterangan','required|max_length[500]');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
	}

	// public function index(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1'); 
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');
	// 		$cek = $this->model_powersupply->cek($id_pertanyaan);
	// 		if ($cek->num_rows()>0) {
	// 			$cek = $this->model_powersupply->cek($id_pertanyaan)->result();
	// 			foreach ($cek as $row) {
	// 				if ($row->id_solusi == 0) {
	// 					if ($answer == $row->pilihan) {
	// 						redirect('powersupply/next_satu');
	// 					} else {
	// 						redirect('powersupply/next_dua');
	// 					}
	// 				}
	// 			}
	// 		} else {
	// 			echo "data tidak ada";
	// 		}
	// 	} else {
	// 		$id=1;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan_dua($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	// public function next_satu(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		$pilihan = $this->model_powersupply->pilihan($id_pertanyaan)->result();

	// 		foreach ($pilihan as $row) {
	// 			if ($answer != $row->pilihan) {
	// 				echo $row->pilihan;
	// 				for ($i=0; $i <= $id_pertanyaan; $i++) { 
				
	// 				}
	// 					$data['pertanyaan'] = $this->model_powersupply->pertanyaan($i)->result();
	// 					$this->template->display('powersupply/index',$data);
	// 				} else {
	// 					$data['solusi'] = $row->solusi;
	// 					$this->template->display('powersupply/solusi',$data);
	// 			}
	// 		}
	// 	} else {
	// 		$id = 2;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	// public function next_dua(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		$pilihan = $this->model_powersupply->pilihan($id_pertanyaan, $answer)->result();
	// 		$pilihan_select = $this->model_powersupply->pilihan_select($id_pertanyaan)->result();
	// 		$jumlah = $this->model_powersupply->jumlah();
	// 		foreach ($pilihan_select as $row) {
	// 			if ($answer != $row->pilihan) {
	// 				for ($i=$id_pertanyaan; $i <= $id_pertanyaan; $i++) { 
							
	// 				}
	// 				if ($i > $jumlah) {
	// 					redirect('powersupply/next_tiga');
	// 				} else {
	// 					echo "data ada";
	// 					$data['pertanyaan'] = $this->model_powersupply->pertanyaan($i)->result();
	// 					$this->template->display('powersupply/index',$data);
	// 				}
	// 			} else {
	// 				$data['solusi'] = $row->solusi;
	// 				$this->template->display('powersupply/solusi',$data);
	// 			}
	// 		}
	// 	} else {
	// 		$id = 11;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	// public function next_tiga(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		$pilihan = $this->model_powersupply->pilihan($id_pertanyaan)->result();
	// 		$jumlah = $this->model_powersupply->jumlah();
	// 		$cek = $this->model_powersupply->cek($id_pertanyaan);

	// 		if ($cek->num_rows()>0) {
	// 			$cek = $this->model_powersupply->cek($id_pertanyaan)->result();
	// 			foreach ($cek as $row) {
	// 				if ($row->id_solusi == 0) {
	// 					if ($answer == $row->pilihan) {
	// 						redirect('powersupply/next_empat');
	// 					} else {
	// 						redirect('powersupply/next_lima');
	// 					}
	// 				}
	// 			}
	// 		}
	// 	} else {
	// 		$id = 7;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	// public function next_empat(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		$pilihan = $this->model_powersupply->pilihan($id_pertanyaan, $answer)->result();

	// 		foreach ($pilihan as $row) {
	// 			if ($answer != $row->pilihan) {
	// 				echo $row->pilihan;
	// 				for ($i=0; $i <= $id_pertanyaan; $i++) { 
				
	// 				}
	// 					$data['pertanyaan'] = $this->model_powersupply->pertanyaan($i)->result();
	// 					$this->template->display('powersupply/index',$data);
	// 				} else {
	// 					$data['solusi'] = $row->solusi;
	// 					$this->template->display('powersupply/solusi',$data);
	// 			}
	// 		}
	// 	} else {
	// 		$id = 8;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	// public function next_lima(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		// $pilihan = $this->model_powersupply->pilihan_select($id_pertanyaan)->result();
	// 		$pilihan = $this->model_powersupply->pilihan_select($id_pertanyaan, $answer)->result();
			
	// 		$jumlah = $this->model_powersupply->jumlah();
	// 		foreach ($pilihan as $row) {
	// 			if ($answer != $row->pilihan) {
	// 				echo $row->pilihan;
	// 				for ($i=9; $i <= $id_pertanyaan; $i++) { 
				
	// 				}
	// 				$data['pertanyaan'] = $this->model_powersupply->pertanyaan($i)->result();
	// 				$this->template->display('powersupply/index',$data);
	// 			} else {
	// 				$data['solusi'] = $row->solusi;
	// 				$this->template->display('powersupply/solusi',$data);
	// 			}
	// 		}
	// 	} else {
	// 		$id = 9;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	

	// public function next_tiga(){
	// 	if (!empty($_POST)) {
	// 		$answer = $this->input->post('group1');
	// 		$id_pertanyaan = $this->input->post('id_pertanyaan');

	// 		$pilihan = $this->model_powersupply->pilihan($id_pertanyaan)->result();
	// 		$jumlah = $this->model_powersupply->jumlah();
	// 		foreach ($pilihan as $row) {
	// 			if ($answer != $row->pilihan) {
	// 				for ($i=$id_pertanyaan; $i <= $id_pertanyaan; $i++) { 
							
	// 				}
	// 				if ($i > $jumlah) {
	// 					redirect('powersupply/next_tiga');
	// 					} else {
	// 						$data['pertanyaan'] = $this->model_powersupply->pertanyaan($i)->result();
	// 						$this->template->display('powersupply/index',$data);
	// 					}
	// 				} else {
	// 					$data['solusi'] = $row->solusi;
	// 					$this->template->display('powersupply/solusi',$data);
	// 				}
	// 			}
			
	// 	} else {
	// 		$id = 7;
	// 		$data['pertanyaan'] = $this->model_powersupply->pertanyaan($id)->result();
	// 		$this->template->display('powersupply/index',$data);
	// 	}
	// }

	public function test(){

		// $jumlah = $this->model_powersupply->jumlah();
		// for ($i=1; $i <= $jumlah ; $i++) { 
			$data['pertanyaan'] = $this->model_powersupply->pertanyaan()->result();
			$this->template->display('powersupply/index',$data);
		// }
	}

	public function perulangan_view(){
		$this->load->view('powersupply/perulangan_view');
	}

	public function perulangan(){
		$jumlah = $this->model_powersupply->jumlah();
		$id = $this->input->post('id');
		for ($i=0; $i <= $id; $i++) { 
				
		}
		echo $i;
	}
}
