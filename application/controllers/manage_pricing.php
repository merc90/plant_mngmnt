<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_pricing extends CI_Controller {

	const MODULE_NAME = 'manage_pricing';

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

			$adminID = $this->session->userdata('adminID');
			$data['pricingListPast'] = $this->custom_model->getPastPricingListParty();
			$data['pricingListCurrent'] = $this->custom_model->getCurrentPricingListParty();
			$this->load->view('header_in',$data);
			$this->load->view('manage_pricing');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addPricing()
	{
 		$orderID = $this->input->post('orderID',true);
		$FOD = $this->input->post('FOD',true);
		$xFactoryPrice = $this->input->post('xFactoryPrice',true);
		$totalPrice = $this->input->post('totalPriceHidden',true);
		$advanceAmount = $this->input->post('advanceAmount',true);
		$creditAmount = $this->input->post('creditAmountHidden',true);
		$daysOfCredit = $this->input->post('daysOfCredit',true);
		
		$data = array(
			'orderID' => $orderID,
			'feesOfDelivery' => $FOD,
			'exFactoryPrice' => $xFactoryPrice,
			'totalPrice' => $totalPrice,
			'advanceAmount' => $advanceAmount,
			'creditAmount' => $creditAmount,
			'daysOfCredit' => $daysOfCredit,
		);

		$adminID = $this->custom_model->insertPricing($data);
		redirect("manage_pricing");
	}


}
?>
