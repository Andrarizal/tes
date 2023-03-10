<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_root extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 

		if($this->session->userdata('level') == "0") {  
			redirect(base_url('C_admin'));  
		}else if ($this->session->userdata('level') == "1") {
			redirect(base_url('C_rguru')); 
		}
	} 

	public function index()
	{
		$this->load->view('login');
	}

}