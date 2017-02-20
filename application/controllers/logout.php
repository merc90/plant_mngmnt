<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class logout extends CI_Controller {

	public function index()
	{
		
		$this->load->helper('url');
		$this->load->library('satyam_config_validation');
		
		$this->satyam_config_validation->_logout();
		redirect('satyam_index');		
	}
	
	
}
?>