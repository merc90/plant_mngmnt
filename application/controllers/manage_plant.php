<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_plant extends CI_Controller {

	const MODULE_NAME = 'manage_plant';

	public function __construct()
	{
		parent::__construct();

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');//taking admin id from session

			$data['plantList'] = $this->custom_model->getPlantList();
			
			$this->load->view('header_in',$data);
			$this->load->view('manage_plant');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addPlant()
	{
 		$plantName = $this->input->post('plantName',true);
		$contactNo = $this->input->post('contactNo',true);
		$plantLocation = $this->input->post('plantLocation',true);
		$plantAddress = $this->input->post('plantAddress',true);
		$plantDescription = $this->input->post('plantDescription',true);
		
		$data = array(
			'plantName' => $plantName,
			'plantAddress' => $plantAddress,
			'plantDescription' => $plantDescription,
			'contactNo' => $contactNo,
			'plantLocation' => $plantLocation,
		);

		$adminID = $this->custom_model->insertPlant($data);
		redirect("manage_plant");
	}


}
?>
