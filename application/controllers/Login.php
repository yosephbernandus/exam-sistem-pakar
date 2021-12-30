<?php
date_default_timezone_set('Asia/Makassar');
Class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('model_administrator');
		$this->load->library('recaptcha');
		if ($this->session->userdata('username')) {
			redirect('dashboard');
		}
	}

	public function password(){
		// See the password_hash() example to see where this came from.
		$username = "admin";
		$password = "admin.2017";

		$cek = $this->model_administrator->cek($username);
		if ($cek->num_rows()>0) {
			$hash = $this->model_administrator->cek($username)->result();
			foreach ($hash as $row) {
				if (password_verify($password, $row->password)) {
					echo "password ada";
				} else {
					echo "password tidak ada";
				}
			}
		} else {
			echo "Password tidak ada";
		}
	}

	public function index(){
		$data = array (
			'action' => site_url('login/proses'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'widget' => $this->recaptcha->getWidget(),
			'script' => $this->recaptcha->getScriptTag()
		);
		$this->load->view('login/index',$data);
	}

	public function proses(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','password','required|trim|xss_clean');

		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);

		if ($this->form_validation->run()==true || !isset($response['success']) || $response['success'] <> true) {
			$this->index();
		} else {
			$id = $this->input->post('id_admin');
			$username=$this->input->post('username');
			$password=$this->input->post('password');

			$cek=$this->model_administrator->cek($username);
			if ($cek->num_rows()>0) {
				$hash = $this->model_administrator->cek($username)->result();
				foreach ($hash as $row) {
					if (password_verify($password, $row->password)) {
						$admin = array (
							'username' => $username,
							'password' => $password,
							'id_admin' => $id
						);
						$this->session->set_userdata($admin);
						redirect('dashboard');		
					} else {
						$this->session->set_flashdata('message','Username atau password salah');
						redirect('login');
					}
				}
			} else {
				$this->session->set_flashdata('message','Username atau password salah');
				redirect('login');
			}
		}
	}
}