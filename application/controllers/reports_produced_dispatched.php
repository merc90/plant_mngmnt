<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_produced_dispatched extends CI_Controller {

	const MODULE_NAME = 'reports_produced_dispatched';

	public function __construct()
	{
		parent::__construct();

        $this->load->model('chartmodel', 'produced_dispatched');

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->produced_dispatched->get_produced_dispatched();
        	$data['chart_data'] = $results['chart_data'];        	
			
			$this->load->view('header_in');
			$this->load->view('reports_produced_dispatched', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


}
?>
