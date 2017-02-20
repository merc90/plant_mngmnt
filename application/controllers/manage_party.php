<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_party extends CI_Controller {

	const MODULE_NAME = 'manage_party';

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

			$data['partyList'] = $this->custom_model->getPartyList();
			
			$this->load->view('header_in',$data);
			$this->load->view('manage_party');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addParty()
	{
 		$partyName = $this->input->post('partyName',true);
		$phoneNo = $this->input->post('phoneNo',true);
		$emailID = $this->input->post('emailID',true);
		$address = $this->input->post('address',true);
		$tinVat = $this->input->post('tinVat',true);
		
		$data = array(
			'partyName' => $partyName,
			'address' => $address,
			'tinVat' => $tinVat,
			'phoneNo' => $phoneNo,
			'emailID' => $emailID,
		);

		$adminID = $this->custom_model->insertParty($data);
		redirect("manage_party");
	}


}
?>
