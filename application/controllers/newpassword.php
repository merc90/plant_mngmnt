<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class newpassword extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");

		
	}

	public function index($passwordResetCode="")
	{
		   $this->load->view('header');
		   $this->load->helper('url');
		   $data['message'] = "";
		   $data['passwordResetCode']="";
		   //$data['flash']= "";
		   //check validate of password reset code
		   
		  
		   $result = $this->admin_model->select_item_table("tbl_admin_unq_codes","adminID","passwordResetCode = '$passwordResetCode'");
	        if($result!="0#"||$this->session->flashdata('result') != '')
	        {
			/* ###  Form Validation - START */
			
			$data['passwordResetCode']=$passwordResetCode;
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('', '');
			
			
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[4]|max_length[25]');
			$this->form_validation->set_rules('re_password', 'Re-enter Password', 'trim|required|xss_clean|min_length[4]|max_length[25]|matches[password]|');

			$this->form_validation->set_message('matches', 'The passwords do not match. Please try again');
			
			$adminID = $this->admin_model->select_item_table("tbl_admin_unq_codes","adminID","passwordResetCode = '$passwordResetCode'");
			
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('newpassword',$data);
			}
			else{
                    $newPassword = $this->input->post('password',true);
					$adminPassword = do_hash($newPassword, 'md5'); // MD5 Hashing
					$data = array(
						'adminPassword' => $adminPassword
						
					);

					$where = array(
						'adminID' => $adminID
					);
					
                    
					
					
						
						$valid = $this->admin_model->update($data,$where);
                        
                        if($valid==1)
                        {
						   
                        // $data['message']="success";
                        $valid = $this->admin_model->delete_table("tbl_admin_unq_codes",$where);

						$this->session->set_flashdata('result', '<div class="alert alert-success"><p>Password changed successfully.</p>&nbsp;Redirecting.. to Admim Login
							</div>');
							redirect('newpassword');
						}
						else
						{
							$this->session->set_flashdata('result', '<div class="alert alert-danger"><p>Password could not be changed </p></div>');

						    redirect('newpassword');

						}
					}
				}
				else
				{
					$data['message'] = "<div class='alert alert-danger'><p>Invalid password reset code</p></div>";
					// $this->session->set_flashdata('result', '<div class="alert alert-success"><p>Password reset code is not validating</p></div>');
					$this->load->view('newpassword',$data);
						//redirect('newpassword');
				}
				$this->load->view('footer');	
		
		}

		// function successreset()
		// {
		// 	$this->load->view('header');
		// 	$data['message']="";
		// 	$data['passwordResetCode']="";
  //           $data['flash']= "flash";
  //           $data['messageflash']="<a class='btn btn-maroon' href='".base_url()."' style='margin-left:450px;margin-top:130px;'>Go to adminsite</a>";
		// 	$this->load->view('newpassword',$data);
		// 	$this->load->view('footer');

		// }



		
		}
		
		
	


?>