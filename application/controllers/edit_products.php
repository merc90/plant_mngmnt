<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_products extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}


	public function index($editProductID)
	{

		// checking whether user loged in or not
		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('productName', 'Product Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('percentageOfOrder', 'Percentage Of Order', 'trim|required|xss_clean');
			$this->form_validation->set_rules('basicRate', 'Basic Rate', 'trim|required|xss_clean');
			
			$data['productList'] = $this->custom_model->getProductList();
			$data['editProductID'] = $editProductID;
			$data['editProductDetails'] = $this->custom_model->getProduct($editProductID);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_products',$data);
			}
			else
			{
				$this->_updateProductData($editProductID); 
				echo"Successfully edited the Product";

				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateProductData($editProductID)
	{
 		$productName = $this->input->post('productName',true);
 		$percentageOfOrder = $this->input->post('percentageOfOrder',true);
 		$basicRate = $this->input->post('basicRate',true);
		
		$data = array(
			'productName' => $productName,
			'percentageOfOrder' => $percentageOfOrder,
			'basicRate' => $basicRate,
		);

		$where = array(
			'productID' => $editProductID
		);

		$this->custom_model->updateProduct($data,$where);

		
		
	}
			
}
?>