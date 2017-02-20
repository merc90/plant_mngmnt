<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class dashboard extends CI_Controller {

	const MODULE_NAME = 'dashboard';

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


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');

			$data['orderList'] = $this->custom_model->getOrderListDashboard();
			$data['stockList'] = $this->custom_model->getStockDashboardList();
			$data['pricingList'] = $this->custom_model->getPricingDashboardList();
			
			$this->load->view('header_in',$data);
			$this->load->view('dashboard');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}

}
?>
