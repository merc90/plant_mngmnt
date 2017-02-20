<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_party extends CI_Controller {

	const MODULE_NAME = 'report_party';

	public function __construct()
	{
		parent::__construct();

        $this->load->model('chartmodel', 'party');

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index($partyID)
	{
		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->party->get_party_data($partyID);
        	$data['chart_data'] = $results['chart_data'];
       	 	
       	 	$this->load->view('header_in',$data);
			$this->load->view('reports_party', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}
}
?>
