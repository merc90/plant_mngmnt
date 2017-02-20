<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_pricing extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
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
				$this->load->view('edit_pricing_module',$data);
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