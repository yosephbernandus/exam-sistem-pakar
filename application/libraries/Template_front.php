<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_front{
	protected $_CI;
	function __construct(){
		$this->_CI=&get_instance();
	}

	public function display_front($template, $data=null){
		$data['_content']=$this->_CI->load->view($template,$data,true);
		$data['_header']=$this->_CI->load->view('template/header_front',$data,true);
		$data['_footer']=$this->_CI->load->view('template/footer_front',$data,true);
		$this->_CI->load->view('/template_front.php',$data);
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */