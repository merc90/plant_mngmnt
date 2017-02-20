<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class access extends CI_Controller 
{
	public function index()
	{
		$this->load->view('access');
	}

	public function alter(){
		$passcode = $this->input->post('password',true);
		if($passcode=="SkipSite")
		{
				$access = $this->custom_model->getAccess()[0]["access"];
				$access=$access?0:1;
				$this->custom_model->setAccess($access);
		}
		redirect('access');
	}

}