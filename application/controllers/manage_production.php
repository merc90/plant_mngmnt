<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_production extends CI_Controller {

	const MODULE_NAME = 'manage_production';

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

			$adminID = $this->session->userdata('adminID');//taking admin id from session
			
			$data['plantList'] = $this->custom_model->getPlantList();
			$data['productionList'] = $this->custom_model->getProductionListPlant();
			$data['productList'] = $this->custom_model->getProductList();
			$this->load->view('header_in',$data);
			$this->load->view('manage_production');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addProduction()
	{
 		$plantID = $this->input->post('plantID',true);
		$dateFrom = $this->input->post('dateFrom',true);
		$targetOfProduction = $this->input->post('targetOfProduction',true);
		$totalProducts = $this->input->post('totalProducts',true);
		
		$data = array(
			'plantID' => $plantID,
			'dateFrom' => $dateFrom,
			'targetOfProduction' => $targetOfProduction,
			 'deviation' => $targetOfProduction,
		);

		$mproductID = $this->custom_model->insertProduction($data);
		for($i=1;$i<=$totalProducts;$i++){
			$productID="product".$i;
			$quantityID="quantity".$i;
			$productID = $this->input->post($productID,true);
			$quantity = $this->input->post($quantityID,true);
			$data = array(
				'productID' => $productID,
				'mproductID' => $mproductID,
				'quantityTarget' => $quantity,
			);
			$this->custom_model->insertManufactureToProduct($data);
		}
		redirect("manage_production");
	}


}
?>
