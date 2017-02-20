<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_target extends CI_Controller {

	const MODULE_NAME = 'report_target';

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

        $this->load->model('chartmodel', 'target');

		if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
    	{
     	 	echo "No Access";
     	 	exit();
    	}

	}


	public function index()
	{
		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->target->get_target_data();
        	$data['chart_data'] = $results['chart_data'];
       	 	
       	 	$this->load->view('header_in',$data);
			$this->load->view('reports_target', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}
}
?>
