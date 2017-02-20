<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_order extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}


	public function index()
	{
		
	}

	public function editOrder($editOrderID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('destination', 'Destination', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fullDeliveryAddress', 'Full Delivery Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('totalQuantity', 'Total Quantity', 'trim|required|xss_clean');
			//$this->form_validation->set_rules('statusID', 'Status', 'trim|required|xss_clean');
			$this->form_validation->set_rules('adminID', 'Admin ID', 'trim|required|xss_clean');
			
			// $data['orderList'] = $this->custom_model->getOrderList();
			// $data['partyList'] = $this->custom_model->getPartyList();
			$data['orderStatusList'] = $this->custom_model->getOrderStatusList();
			$data['editOrderID'] = $editOrderID;
			$data['editOrderDetails'] = $this->custom_model->getOrderParty($editOrderID);
			$data['adminName'] = $this->custom_model->getOrderAdminName($data['editOrderDetails'][0]['adminID']);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_order',$data);
			}
			else
			{
				$this->_updateOrderData($editOrderID); 
				echo"Successfully edited the order";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateOrderData($editOrderID)
	{
 		$destination = $this->input->post('destination',true);
 		$fullDeliveryAddress = $this->input->post('fullDeliveryAddress',true);
 		$totalQuantity = $this->input->post('totalQuantity',true);
 		$statusID = $this->input->post('orderStatus',true);
 		
		$data = array(
			'destination' => $destination,
			'fullDeliveryAddress' => $fullDeliveryAddress,
			'totalQuantity' => $totalQuantity,
			'statusID' => $statusID,
		);

		$where = array(
			'orderID' => $editOrderID
		);

		$this->custom_model->updateOrder($data,$where);
		
	}

	public function editDispatch($editOrderID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$data['editOrderID'] = $editOrderID;
			$data['editDispatchDetails'] = $this->custom_model->getDispatchProduct($editOrderID);
			$i=1;
			foreach ($data['editDispatchDetails'] as $dispatch) {
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('productName'.$i, 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('productID'.$i, 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dispatchedQuantity'.$i, 'Dispatched Quantity', 'trim|required|xss_clean');
			$this->form_validation->set_rules('remainingQuantity'.$i, 'Remaining Quantity', 'trim|required|xss_clean');
			$this->form_validation->set_rules('dispatchedID'.$i, 'Disspatched ID', 'trim|required|xss_clean');
			$i++;
			}
			$this->form_validation->set_rules('totalProducts', 'totalProducts', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_dispatch',$data);
			}
			else
			{
				$this->_updateDispatchData($editOrderID); 
				echo"Successfully edited the order";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateDispatchData($editOrderID)
	{
 		$totalProducts = $this->input->post('totalProducts',true);

 		for($i=1;$i<=$totalProducts;$i++){
			// $productID="productName".$i;
			$dispatchedQuantityID="dispatchedQuantity".$i;
			// $remainingQuantityID="remainingQuantityHidden".$i;
			$dispatchedID="dispatchedID".$i;
			// $productID = $this->input->post($productID,true);
			$dispatchedQuantity = $this->input->post($dispatchedQuantityID,true);
			// $remainingQuantity = $this->input->post($remainingQuantityID,true);
			$dispatchedID = $this->input->post($dispatchedID,true);
			$this->custom_model->updateDispatch($dispatchedID/*,$productID*/,$dispatchedQuantity/*,$remainingQuantity*/);
		}

		$totalRemainingQuantity = $this->input->post("totalRemainingQuantity",true);

		if($totalRemainingQuantity)
		$data = array(
			'statusID' => 3,
		);
		else
		$data = array(
			'statusID' => 4,
		);

		$where = array(
			'orderID' => $editOrderID
		);

		$this->custom_model->updateOrder($data,$where);
		
	}

	public function editRate($editOrderID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$data['editOrderID'] = $editOrderID;
			$data['editRateDetails'] = $this->custom_model->getRateProduct($editOrderID);
			$i=1;
			foreach ($data['editRateDetails'] as $rate) {
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('productName'.$i, 'Product Name', 'trim|required|xss_clean');
				$this->form_validation->set_rules('basicRate'.$i, 'Basic Rate', 'trim|required|xss_clean');
				$this->form_validation->set_rules('sizeDiffRate'.$i, 'Size Difference Rate', 'trim|required|xss_clean');
				$this->form_validation->set_rules('sizeDiffID'.$i, 'Size Difference ID', 'trim|required|xss_clean');
				$i++;
			}
			$this->form_validation->set_rules('totalProducts', 'totalProducts', 'trim|required|xss_clean');			
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_rate',$data);
			}
			else
			{
				$this->_updateRateData($editOrderID); 
				echo"Successfully edited the order";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateRateData($editOrderID)
	{
		$totalProducts = $this->input->post('totalProducts',true);

		for($i=1;$i<=$totalProducts;$i++){
			// $productID="productName".$i;
			$sizeDiffRateID="sizeDiffRate".$i;
			// $basicRateID="basicRate".$i;
			$sizeDiffID="sizeDiffID".$i;
			$productID = $this->input->post($productID,true);
			$sizeDiffRate = $this->input->post($sizeDiffRateID,true);
			$basicRate = $this->input->post($basicRateID,true);
			$sizeDiffID = $this->input->post($sizeDiffID,true);
			$this->custom_model->updateRate($sizeDiffID,$sizeDiffRate/*,$basicRate,$productID*/);
 		}
			
	}

	public function editProduct($editOrderID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$data['editOrderID'] = $editOrderID;
			$data['editProductDetails'] = $this->custom_model->getOrderProductName($editOrderID);
			$i=1;
			foreach ($data['editProductDetails'] as $product) {
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('productName'.$i, 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('percentageOfOrder'.$i, 'Percentage Of Order', 'trim|required|xss_clean');
			$this->form_validation->set_rules('orderToProID'.$i, 'orderToProID', 'trim|required|xss_clean');
			$i++;
			}
			$this->form_validation->set_rules('totalProducts', 'totalProducts', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_orderProduct',$data);
			}
			else
			{
				$this->_updateProductData($editOrderID); 
				echo"Successfully edited the order";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateProductData($editOrderID)
	{
 		$totalProducts = $this->input->post('totalProducts',true);

		for($i=1;$i<=$totalProducts;$i++){
			// $productID="productName".$i;
			$quantityID="percentageOfOrder".$i;
			$orderToProID="orderToProID".$i;
			// $productID = $this->input->post($productID,true);
			$quantity = $this->input->post($quantityID,true);
			$orderToProID = $this->input->post($orderToProID,true);
			$this->custom_model->updateOrderProduct(/*$productID,*/$quantity,/*$basicRate,*/$orderToProID);
		}
		
	}

	public function editPricing($editOrderID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('feesOfDelivery', 'Fees Of Delivery', 'trim|required|xss_clean');
			$this->form_validation->set_rules('exFactoryPrice', 'Ex Factory Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('totalPrice', 'Total Price', 'trim|required|xss_clean');
			$this->form_validation->set_rules('advanceAmount', 'Advance Amount', 'trim|required|xss_clean');
			$this->form_validation->set_rules('creditAmount', 'Credit Amount', 'trim|required|xss_clean');
			$this->form_validation->set_rules('daysOfCredit', 'Days Of Credit', 'trim|required|xss_clean');
			
			$data['editPricingDetails'] = $this->custom_model->getPricing($editOrderID);
			$data['orderProduct'] = $this->custom_model->getOrderProduct($editOrderID);
			$data['rate'] = $this->custom_model->getRate($editOrderID);
			$data['order'] = $this->custom_model->getOrder($editOrderID);
			$data['editOrderID'] = $editOrderID;

			$exFactoryPrice=0;
			$i=0;
			$data['quantity']=$data['order'][0]['totalQuantity'];
			foreach($data['orderProduct'] as $product){
				$exFactoryPrice+=((($data['quantity']*$product['percantageOfOrder'])/100)*($data['rate'][$i]['basicRate']+$data['rate'][$i]['sizeDiffRate']));
				$i++;
			}
			$data['exFactoryPrice']=$exFactoryPrice;

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_pricing',$data);
			}
			else
			{
				$this->_updatePricingData($editOrderID); 
				echo"Successfully edited the Pricing";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updatePricingData($editOrderID)
	{
		$feesOfDelivery = $this->input->post('feesOfDelivery',true);
		$exFactoryPrice = $this->input->post('exFactoryPrice',true);
		$totalPrice = $this->input->post('totalPriceHidden',true);
		$advanceAmount = $this->input->post('advanceAmount',true);
		$creditAmount = $this->input->post('creditAmountHidden',true);
		$daysOfCredit = $this->input->post('daysOfCredit',true);

		$data = array(
			'feesOfDelivery' => $feesOfDelivery,
			'exFactoryPrice' => $exFactoryPrice,
			'totalPrice' => $totalPrice,
			'advanceAmount' => $advanceAmount,
			'creditAmount' => $creditAmount,
			'daysOfCredit' => $daysOfCredit,
			'pricingEdit' => 1,
			'pricingDate' => date("Y-m-d H:i:s"),
		);
		// print_r($advanceAmount);exit();
		$where = array(
			'orderID' => $editOrderID
		);

		$this->custom_model->updatePricing($data,$where);
		
	}
			
}
?>