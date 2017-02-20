<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_party extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}


	public function index($editPartyID)
	{

		// checking whether user loged in or not
		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('partyName', 'Party Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tinVat', 'Tin Vat', 'trim|required|xss_clean');
			$this->form_validation->set_rules('emailID', 'Email ID', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('phoneNo', 'Phone No', 'trim|required|xss_clean');
			
			$data['partyList'] = $this->custom_model->getProductList();
			$data['editPartyID'] = $editPartyID;
			$data['editPartyDetails'] = $this->custom_model->getParty($editPartyID);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_party',$data);
			}
			else
			{
				$this->_updatePartyData($editPartyID); 
				echo"Successfully edited the party";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updatePartyData($editPartyID)
	{
 		$partyName = $this->input->post('partyName',true);
 		$address = $this->input->post('address',true);
 		$tinVat = $this->input->post('tinVat',true);
 		$emailID = $this->input->post('emailID',true);
 		$phoneNo = $this->input->post('phoneNo',true);
		
		$data = array(
			'partyName' => $partyName,
			'address' => $address,
			'tinVat' => $tinVat,
			'emailID' => $emailID,
			'phoneNo' => $phoneNo,
		);

		$where = array(
			'partyID' => $editPartyID
		);

		$this->custom_model->updateParty($data,$where);
		
	}
			
}
?>