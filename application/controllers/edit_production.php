<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_production extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}

	public function index()
	{
		
	}

	public function editTarget($editProductionID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('dateFrom', 'Date From', 'trim|required|xss_clean');
			$this->form_validation->set_rules('targetOfProduction', 'Target Of Production', 'trim|required|xss_clean');
			$data['editProductionProducts'] = $this->custom_model->getProductionProduct($editProductionID);
			$i=1;
			foreach ($data['editProductionProducts'] as $product) {
			$this->form_validation->set_rules('productName'.$i, 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('productID'.$i, 'Product ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('quantityTarget'.$i, 'Target Quantity', 'trim|required|xss_clean');
			$this->form_validation->set_rules('m2productID'.$i, 'm2productID', 'trim|required|xss_clean');
			$i++;
			}
			$this->form_validation->set_rules('totalProducts', 'totalProducts', 'trim|required|xss_clean');
			$data['editProductionID'] = $editProductionID;
			$data['editProductionDetails'] = $this->custom_model->getProduction($editProductionID);
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_target',$data);
			}
			else
			{
				$this->_updateTargetData($editProductionID); 
				echo"Successfully edited the Target";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateTargetData($editProductionID)
	{
		$totalProducts = $this->input->post('totalProducts',true);

		for($i=1;$i<=$totalProducts;$i++){
			$productID="productID".$i;
			$quantityTarget="quantityTarget".$i;
			$m2productID="m2productID".$i;
			$productID = $this->input->post($productID,true);
			$quantityTarget = $this->input->post($quantityTarget,true);
			$m2productID = $this->input->post($m2productID,true);
			$this->custom_model->updateProductionProductTarget($m2productID,$productID,$quantityTarget);
		}

 		$dateFrom = $this->input->post('dateFrom',true);
 		$targetOfProduction = $this->input->post('targetOfProduction',true);
 		$data = $this->custom_model->getProduction($editProductionID);
		
		$dateTo=$data[0]['dateTo'];
		$producedAmount=$data[0]['producedAmount'];
		$deviation = $targetOfProduction-$producedAmount;
		$rateOfTPPerDay = $data[0]['rateOfTPPerDay'];
		$rateOfPAPerDay = $data[0]['rateOfPAPerDay'];
		$rateOfDeviationPerDay = $data[0]['rateOfDeviationPerDay'];
		$days=1;

		if($dateTo!="0000-00-00")
		{
			$diff = date_diff(date_create($dateTo), date_create($dateFrom));
			$days=$diff->days;
			$deviation=$targetOfProduction-$producedAmount;
			$rateOfDeviationPerDay=$deviation/$days;
			$rateOfTPPerDay=$targetOfProduction/$days;
			$rateOfPAPerDay=$producedAmount/$days;

		}

		$data = array(
			'dateFrom' => $dateFrom,
			'dateTo' => $dateTo,
			'targetOfProduction' => $targetOfProduction,
			'producedAmount' => $producedAmount,
			'deviation' => $deviation,
			'rateOfTPPerDay' => $rateOfTPPerDay,
			'rateOfPAPerDay' => $rateOfPAPerDay,
			'rateOfDeviationPerDay' => $rateOfDeviationPerDay,
		);

		$where = array(
			'mproductID' => $editProductionID
		);

		$this->custom_model->updateProduction($data,$where);
		
	}

	public function editProduction($editProductionID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('dateTo', 'Date To', 'trim|required|xss_clean');
			$this->form_validation->set_rules('producedAmount', 'Total Produced', 'trim|required|xss_clean');
			$data['editProductionProducts'] = $this->custom_model->getProductionProduct($editProductionID);
			$i=1;
			foreach ($data['editProductionProducts'] as $product) {
			$this->form_validation->set_rules('productName'.$i, 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('productID'.$i, 'Product ID', 'trim|required|xss_clean');
			$this->form_validation->set_rules('quantityProduced'.$i, 'Quantity Produced', 'trim|required|xss_clean');
			$this->form_validation->set_rules('m2productID'.$i, 'm2productID', 'trim|required|xss_clean');
			$i++;
			}
			$this->form_validation->set_rules('totalProducts', 'totalProducts', 'trim|required|xss_clean');
			$data['editProductionID'] = $editProductionID;
			$data['editProductionDetails'] = $this->custom_model->getProduction($editProductionID);
			
			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_production',$data);
			}
			else
			{
				$this->_updateProductionData($editProductionID); 
				echo"Successfully edited the Product";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}

	public function _updateProductionData($editProductionID)
	{
		$totalProducts = $this->input->post('totalProducts',true);

		for($i=1;$i<=$totalProducts;$i++){
			$productID="productID".$i;
			$quantityProduced="quantityProduced".$i;
			$m2productID="m2productID".$i;
			$productID = $this->input->post($productID,true);
			$quantityProduced = $this->input->post($quantityProduced,true);
			$m2productID = $this->input->post($m2productID,true);
			$this->custom_model->updateProductionProductProd($m2productID,$productID,$quantityProduced);
		}
	
 		$dateTo = $this->input->post('dateTo',true);
 		$producedAmount = $this->input->post('producedAmount',true);
 		$data = $this->custom_model->getProduction($editProductionID);
		
		$dateFrom=$data[0]['dateFrom'];
		$targetOfProduction=$data[0]['targetOfProduction'];
		$deviation = $data[0]['deviation'];
		$rateOfTPPerDay = $data[0]['rateOfTPPerDay'];
		$rateOfPAPerDay = $data[0]['rateOfPAPerDay'];
		$rateOfDeviationPerDay = $data[0]['rateOfDeviationPerDay'];
		$days=1;

		if($dateTo!="0000-00-00")
		{
			$diff = date_diff(date_create($dateTo), date_create($dateFrom));
			$days=$diff->days;
			$deviation=$targetOfProduction-$producedAmount;
			$rateOfDeviationPerDay=$deviation/$days;
			$rateOfTPPerDay=$targetOfProduction/$days;
			$rateOfPAPerDay=$producedAmount/$days;

		}

		$data = array(
			'dateFrom' => $dateFrom,
			'dateTo' => $dateTo,
			'targetOfProduction' => $targetOfProduction,
			'producedAmount' => $producedAmount,
			 'deviation' => $deviation,
			'rateOfTPPerDay' => $rateOfTPPerDay,
			'rateOfPAPerDay' => $rateOfPAPerDay,
			'rateOfDeviationPerDay' => $rateOfDeviationPerDay,
		);

		$where = array(
			'mproductID' => $editProductionID
		);

		$this->custom_model->updateProduction($data,$where);
		
	}
			
}
?>