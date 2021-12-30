<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	private $limit=1;

	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','pagination','template_front','template'));
		$this->load->model(array('model_powersupply','model_vga','model_vga_kinerja','model_mb','model_mb_k','model_sata','model_booting'));
	}


	public function index(){
		$this->template_front->display_front('index');
	}

	public function powersupply(){
		if (empty($_POST)) {
			$data['judul'] = "Powersupply";
			$data['pertanyaan'] = $this->model_powersupply->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Powersupply";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_powersupply->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}


	public function vga(){
		if (empty($_POST)) {
			$data['judul'] = "Kerusakan VGA";
			$data['pertanyaan'] = $this->model_vga->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Kerusakan VGA";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_vga->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}

	public function kinerja_vga(){
		if (empty($_POST)) {
			$data['judul'] = "Kinerja VGA";
			$data['pertanyaan'] = $this->model_vga_kinerja->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Kinerja VGA";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_vga_kinerja->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}

	public function kerusakan_motherboard(){
		if (empty($_POST)) {
			$data['judul'] = "Kerusakan Motherboard, Processor, RAM";
			$data['pertanyaan'] = $this->model_mb->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Kerusakan Motherboard, Processor, RAM";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_mb->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}

	public function kinerja_motherboard(){
		if (empty($_POST)) {
			$data['judul'] = "Kinerja Motherboard, Processor, RAM";
			$data['pertanyaan'] = $this->model_mb_k->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Kinerja Motherboard, Processor, RAM";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_mb_k->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}

	public function ata_sata(){
		if (empty($_POST)) {
			$data['judul'] = "ATA/SATA";
			$data['pertanyaan'] = $this->model_sata->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "ATA/SATA";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_sata->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}

	public function booting(){
		if (empty($_POST)) {
			$data['judul'] = "Booting";
			$data['pertanyaan'] = $this->model_booting->view()->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		} else {
			$data['judul'] = "Booting";
			$id = $this->input->post('group1');
			$data['pertanyaan'] = $this->model_booting->view_result($id)->row_array();
			$this->template_front->display_front('konsultasi/index',$data);
		}
	}
}
