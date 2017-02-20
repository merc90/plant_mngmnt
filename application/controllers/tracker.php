<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class tracker extends CI_Controller {

	const MODULE_NAME = 'tracker';

	public function __construct()
	{
		parent::__construct();

		$this->load->library('satyam_config_validation');
		$access = $this->custom_model->getAccess()[0]["access"];
		if($access)
    	{
     	 	echo "No Access";
     	 	exit();
    	}


		if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
    	{
     	 	echo "No Access";
     	 	exit();
    	}

	}


	public function index($aID=57)
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');//taking admin id from session
			$data['adminRole'] = $this->session->userdata('adminRole');
			$data['adminRolesList'] = $this->admin_role_model->select_all("","");

			$data['locationList'] = $this->custom_model->getLocationList($aID);

			$all_admin_users = $this->admin_model->select_all("","adminID DESC");

			foreach($all_admin_users as $users)
			{
				$adminRole = $this->admin_role_model->select_item("role","roleID = ".$users['adminRole']);

				$data['all_admins'][] = array(
					'adminID' => $users['adminID'],
					'adminName' => $users['adminName'],
					'adminRole' => $adminRole,
				);
			}

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
