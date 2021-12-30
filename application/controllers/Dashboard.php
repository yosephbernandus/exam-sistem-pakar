<?php
date_default_timezone_set('Asia/Makassar');
class Dashboard extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation','template'));
		$this->load->model('model_administrator');
		// if (!$this->session->userdata('username')) {
		// 	redirect('login');
		// }
	}

	public function index(){
		$this->template->display('dashboard/index');
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect('login');
	}

	public function change_password($username){
		$data['title']="Change Password";
		$this->_set_rules();
		if($this->form_validation->run()==true){
			$id = $this->input->post('id');
			$info = array(
				'user' => $this->input->post('user'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$this->model_administrator->update($id,$info);
			$data['petugas'] = $this->model_administrator->cekId($username)->row_array();
			$data['message']="<div class='alert alert-success'>Data Updated</div>";

			$this->template->display('dashboard/edit',$data);
		} else {
			$data['message']="";
			$data['petugas'] = $this->model_administrator->cekId($username)->row_array();
			$this->template->display('dashboard/edit',$data);
		}
	}

	function _set_rules(){
        $this->form_validation->set_rules('user','username','required|trim');
        $this->form_validation->set_rules('password','password','required|trim');
        $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");
    }
}