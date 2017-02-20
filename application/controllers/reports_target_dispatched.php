<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_target_dispatched extends CI_Controller {

	const MODULE_NAME = 'reports_target_dispatched';

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

        $this->load->model('chartmodel', 'target_dispatched');

		if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
    	{
     	 	echo "No Access";
     	 	exit();
    	}

	}


	public function index($sDate="0000-01-01",$eDate="9999-12-31")
	{
		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->target_dispatched->get_target_dispatched_data($sDate,$eDate);
        	$data['chart_data'] = $results['chart_data'];
    		$this->load->view('header_in',$data);
			$this->load->view('reports_target_dispatched', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


}
?>
