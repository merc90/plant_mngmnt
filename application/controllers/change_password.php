<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class change_password extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");

		
	}

	public function index()
	{
		
		$this->load->helper('url');
		// checking whether user loged in or not
		if($this->satyam_config_validation->_is_logged_in()){

			/* ###  Form Validation - START */
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('cu_password', 'Current Password', 'trim|required|xss_clean|min_length[4]|max_length[25]');
			
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[4]|max_length[25]');
			$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required|xss_clean|min_length[4]|max_length[25]|matches[password]|');

			$this->form_validation->set_message('matches', 'The passwords do not match. Please try again');
			
			$adminID = $this->session->userdata('adminID');//taking admin id from session
			
			$this->load->view('header_in');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('change_password');
			}
			else{
                    $currentPassword  = $this->input->post('cu_password',true);
					$newPassword = $this->input->post('password',true);
					$currentPassword = do_hash($currentPassword, 'md5');
					$adminPassword = do_hash($newPassword, 'md5'); // MD5 Hashing
					$data = array(
						'adminPassword' => $currentPassword,
						'adminID' => $adminID
					);

					$where = array(
						'adminID' => $adminID
					);
					
                    
					$result = $this->admin_model->check_item($data);

					if($result['valid']!=0)
					{
						$data = array(
               				'adminPassword' => $adminPassword

							);
						$valid = $this->admin_model->update($data,$where);
                        
                        if($valid==1)
                        {
						//email sending
						$adminDetails = $this->admin_model->select_row("adminID = $adminID");
			            $adminName = $adminDetails["adminName"];
			            $adminEmail = $adminDetails["adminEmail"];
			            $adminRole = $adminDetails["adminRole"];
			            $adminPassword=$newPassword;
			            $adminRole = $this->admin_role_model->select_item("role","roleID = $adminRole");
						$sendAdminMail['adminEmail']=$adminEmail;
	                    $sendAdminMail['adminName']=$adminName;
	                    $sendAdminMail['adminRole']=$adminRole;
			            $sendAdminMail['adminPassword']=$adminPassword;
			            $adminMail=$this->send_email->sendAdminChangePasswordEmail($sendAdminMail);	

			            //ebding of email send code
						$this->session->set_flashdata('result', '<div class="alert alert-success"><p>Password changed successfully</p></div>');
						redirect('change_password');
						}
						else
						{
							$this->session->set_flashdata('result', '<div class="alert alert-danger"><p>Password could not be changed </p></div>');
						    redirect('change_password');
						}
					}
					else
					{
						$this->session->set_flashdata('result', '<div class="alert alert-danger"><p>Wrong current password.Please try by entering correct current password</p></div>');
						redirect('change_password');
					}
		
		}
			$this->load->view('footer');

		}
		else{// If no session, go to home
			redirect('satyam_index');
		}
		
	}

}
?>