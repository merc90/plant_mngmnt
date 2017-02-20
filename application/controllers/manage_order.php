<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_order extends CI_Controller {

	const MODULE_NAME = 'manage_order';

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


		// if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
  //   	{
  //    	 	echo "No Access";
  //    	 	exit();
  //   	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');//taking admin id from session

			$data['orderCurrentList'] = $this->custom_model->getCurrentOrderList();
			$data['orderPastList'] = $this->custom_model->getPastOrderList();
			$data['partyList'] = $this->custom_model->getPartyList();
			$data['productList'] = $this->custom_model->getProductList();
			$this->load->view('header_in',$data);
			$this->load->view('manage_order');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addOrder()
	{
 		$partyID = $this->input->post('partyID',true);
		$destination = $this->input->post('destination',true);
		$fullDeliveryAddress = $this->input->post('fullDeliveryAddress',true);
		$totalQuantity = $this->input->post('totalQuantity',true);
		$adminID = $this->session->userdata('adminID');
		
		$totalProducts = $this->input->post('totalProducts',true);
		
		$data = array(
			'statusID' => 1,
			'partyID' => $partyID,
			'destination' => $destination,
			'fullDeliveryAddress' => $fullDeliveryAddress,
			'totalQuantity' => $totalQuantity,
			'adminID' => $adminID,
		);
		
		$orderID = $this->custom_model->insertOrder($data);
		$data = array(
			'orderID' => $orderID,
			);
		$adminID = $this->custom_model->insertPricing($data);
		for($i=1;$i<=$totalProducts;$i++){
			$productID="product".$i;
			$quantityID="quantity".$i;
			$productID = $this->input->post($productID,true);
			$quantity = $this->input->post($quantityID,true);
			$data = array(
				'productID' => $productID,
				'orderID' => $orderID,
				'percantageOfOrder' => $quantity,
			);
			$this->custom_model->insertProductToOrder($data);
			$productDetail = $this->custom_model->getProduct($productID);
			$data = array(
				'productID' => $productID,
				'orderID' => $orderID,
				'basicRate' => $productDetail[0]['basicRate'],
			);
			$this->custom_model->insertRate($data);
			$data = array(
				'productID' => $productID,
				'orderID' => $orderID,
				'remainingQuantity' => floatval((floatval($totalQuantity)*floatval($quantity))/100),
			);
			$this->custom_model->insertDispatch($data);
		}
		redirect("manage_order");
	}


}
?>
