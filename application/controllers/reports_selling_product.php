<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class reports_selling_product extends CI_Controller {

	const MODULE_NAME = 'report_selling_product';

	public function __construct()
	{
		parent::__construct();

        $this->load->model('chartmodel', 'selling_product');

		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{
		if($this->satyam_config_validation->_is_logged_in()){

			$results = $this->selling_product->get_selling_product_data();
        	$data['chart_data'] = $results['chart_data'];
       	 	$this->load->view('header_in',$data);
			$this->load->view('reports_selling_product', $data);
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}
}
?>
