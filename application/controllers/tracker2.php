<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tracker extends CI_Controller {

	const MODULE_NAME = 'tracker';

	public function __construct()
	{
		parent::__construct();

		if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
    	{
     	 	echo "No Access";
     	 	exit();
    	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');//taking admin id from session
			$data['name'] = ["Harshad","Mercury"];
			$data['lat']  = [25.303111,23.232];
			$data['lng']  = [82.977874,45.554];
			$data['plantList'] = $this->custom_model->getPlantList();
			
			$this->load->view('header_in',$data);
			$this->load->view('tracker');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


}
?>
