<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_products extends CI_Controller {

	const MODULE_NAME = 'manage_products';

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

			$data['productList'] = $this->custom_model->getProductList();
			
			$this->load->view('header_in',$data);
			$this->load->view('manage_products');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addProduct()
	{
 		$productName = $this->input->post('productName',true);
		$percentageOfOrder = $this->input->post('percentageOfOrder',true);
		$basicRate = $this->input->post('basicRate',true);
		
		$data = array(
			'productName' => $productName,
			'percentageOfOrder' => $percentageOfOrder,
			'basicRate' => $basicRate,
		);

		$adminID = $this->custom_model->insertProduct($data);
		redirect("manage_products");
	}


}
?>
