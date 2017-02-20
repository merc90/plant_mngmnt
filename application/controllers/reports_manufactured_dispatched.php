<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_manufactured_dispatched extends CI_Controller {

	const MODULE_NAME = 'reports_manufactured_dispatched';

	public function __construct()
	{
		parent::__construct();

        $this->load->model('chartmodel', 'manufactured_dispatched');

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->manufactured_dispatched->get_manufactured_dispatched_data();
        	$data['chart_data'] = $results['chart_data'];
			$this->load->view('header_in',$data);
			$this->load->view('reports_manufactured_dispatched', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


}
?>
