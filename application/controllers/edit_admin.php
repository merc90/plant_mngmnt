<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_admin extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}


	public function index()
	{
		
	}

	public function editAdmin($editAdminID)
	{

		// checking whether user loged in or not
		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('adminName', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('adminEmail', 'Email Address', 'trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('mobileNo', 'Phone number', 'trim|required|xss_clean');
			
			$data['adminRolesList'] = $this->admin_role_model->select_all("","");
			$data['editAdminID'] = $editAdminID;
			$data['editAdminDetails'] = $this->admin_model->select_row("adminID = $editAdminID");


			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_admin',$data);
			}
			else
			{
				$this->_updateAdminData($editAdminID); 
				echo"Successfully edited the admin profile";

				
			}
		}
		else{// If no session, go to home
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateAdminData($editAdminID)
	{
		
 		$adminEmail = $this->input->post('adminEmail',true);
 		$adminName = $this->input->post('adminName',true);
 		$mobileNo = $this->input->post('mobileNo',true);
 		$address = $this->input->post('address',true);

		$adminRole = $this->input->post('adminRole',true);
		
		$role = $this->admin_model->getRoleName("roleID=".$adminRole);
		
		$data = array(
			'adminEmail' => $adminEmail,
			'adminName' => $adminName,
			'address' => $address,
			'mobileNo' => $mobileNo,
			'adminRole' => $adminRole,
		);

		
		$where = array(
			'adminID' => $editAdminID
		);

		$this->admin_model->update($data,$where);

		$sendAdminMail['adminEmail']=$adminEmail;
        $sendAdminMail['adminName']=$adminName;
   		$sendAdminMail['address']=$address;
        $sendAdminMail['mobileNo']=$mobileNo;
        $sendAdminMail['adminRole']=$role;

		$adminMail=$this->send_email->sendAdminEditEmail($sendAdminMail);	
		
	}

	public function editLimit($editLimitID)
	{

		// checking whether user loged in or not
		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('adminName', 'Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('orderStockLimit', 'Order Stock Limit', 'trim|required|xss_clean');

			$data['editLimitID'] = $editLimitID;
			$data['editDetails'] = $this->custom_model->getLimit($editLimitID);


			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_limit',$data);
			}
			else
			{
				$this->_updateLimitData($editLimitID); 
				echo"Successfully edited the admin profile";

				
			}
		}
		else{// If no session, go to home
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updateLimitData($editLimitID)
	{
		
 		$orderStockLimit = $this->input->post('orderStockLimit',true);
 		
		$data = array(
			'orderStockLimit' => $orderStockLimit,
		);

		
		$where = array(
			'adminID' => $editLimitID
		);

		$this->custom_model->updateLimit($data,$where);
	}
			
}
?>