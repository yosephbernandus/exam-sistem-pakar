<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kerusakan_mb extends CI_Controller {
	private $limit=1;

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination','template_front','template'));
		$this->load->model('model_mb');

		if (!$this->session->userdata('username')) {
			redirect('login');
		}
	}

	public function index(){
		$data['view_pertanyaan'] = $this->model_mb->view_pertanyaan()->result();
		$data['view_solusi'] = $this->model_mb->view_solusi()->result();
		$data['view_all'] = $this->model_mb->view_all()->result();

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

		$this->template->display('backend/kerusakan_mb/index',$data);
	}

	public function tambah_pertanyaan(){
		$data['title']="Tambah Pertanyaan";
		$this->_set_rules_tambah();
		if ($this->form_validation->run()==true) {
			$pertanyaan=$this->input->post('pertanyaan');
			$cek=$this->model_mb->cek($pertanyaan);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-warning'>ID Already Use</div>";
				$this->template->display('backend/kerusakan_mb/tambah_pertanyaan',$data);
			} else {
				$info=array(
					'pertanyaan'=>$this->input->post('pertanyaan'),
					'bila_benar'=>$this->input->post('bila_benar'),
					'keterangan'=>$this->input->post('keterangan'),
					'bila_salah'=>$this->input->post('bila_salah'),
				);
				$this->model_mb->simpan($info);
				redirect('kerusakan_mb/index/add_success_pertanyaan');
			}
		} else {
			$data['message']="";
			$data['view_all_result'] = $this->model_mb->view_all()->result();
			$this->template->display('backend/kerusakan_mb/tambah_pertanyaan',$data);
		}
	}

	public function tambah_solusi(){
		$data['title']="Tambah Solusi";
		$this->_set_rules_tambah();
		if ($this->form_validation->run()==true) {
			$pertanyaan=$this->input->post('pertanyaan');
			$cek=$this->model_mb->cek($pertanyaan);
			if ($cek->num_rows()>0) {
				$data['message']="<div class='alert alert-warning'>ID Already Use</div>";
				$this->template->display('backend/kerusakan_mb/tambah_pertanyaan',$data);
			} else {
				$info=array(
					'pertanyaan'=>$this->input->post('pertanyaan'),
					'bila_benar'=>$this->input->post('bila_benar'),
					'keterangan'=>$this->input->post('keterangan'),
					'bila_salah'=>$this->input->post('bila_salah'),
				);
				$this->model_mb->simpan($info);
				redirect('kerusakan_mb/index/add_success_solusi');
			}
		} else {
			$data['message']="";
			$this->template->display('backend/kerusakan_mb/tambah_solusi',$data);
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

			$this->model_mb->update($id_pertanyaan,$simpan);
			$data['message']="<div class='alert alert-success'>Data Updated</div>";
			$data['view_all']=$this->model_mb->cek($id_pertanyaan)->row_array();
			$this->template->display('backend/kerusakan_mb/edit',$data);
		} else {
			$data['view_all']=$this->model_mb->cek($id_pertanyaan)->row_array();
			$data['view_all_result'] = $this->model_mb->view_all()->result();
			$data['message']="";
			$this->template->display('backend/kerusakan_mb/edit',$data);
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

			$this->model_mb->update($id_pertanyaan,$simpan);
			$data['message']="<div class='alert alert-success'>Data Updated</div>";
			$data['view_all']=$this->model_mb->cek($id_pertanyaan)->row_array();
			$this->template->display('backend/kerusakan_mb/edit_solusi',$data);
		} else {
			$data['view_all']=$this->model_mb->cek($id_pertanyaan)->row_array();
			$data['view_all_result'] = $this->model_mb->view_all()->result();
			$data['message']="";
			$this->template->display('backend/kerusakan_mb/edit_solusi',$data);
		}
	}

	public function hapus(){
		$kode=$this->input->post('kode');
		$this->model_mb->hapus($kode);
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
}
