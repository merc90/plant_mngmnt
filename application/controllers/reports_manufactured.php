<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_manufactured extends CI_Controller {

	const MODULE_NAME = 'reports_manufactured';

	public function __construct()
	{
		parent::__construct();

        $this->load->model('chartmodel', 'manufactured');

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->manufactured->get_manufactured_data();
        	$data['chart_data'] = $results['chart_data'];
			$this->load->view('header_in',$data);
			$this->load->view('reports_manufactured', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


}
?>
