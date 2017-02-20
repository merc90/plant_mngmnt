<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class satyam_index extends CI_Controller {


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

	}


	public function index()
	{
		$this->load->helper('url');
		$this->load->library('satyam_config_validation');

		/* ###  Form Validation - START */
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


		$this->form_validation->set_rules('userID', 'User ID', 'trim|required|xss_clean');

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]|max_length[30]|xss_clean');
		/* ###  Form Validation - END */
		$data['message'] = "";

		$this->load->view('header');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('satyam_index',$data);
		}
		else
		{
			if(	$this->attenticate->check_login($this->input->post('userID',true), $this->input->post('password',true)) )
			{
				redirect('/dashboard/');
			}
			else
			{
				$this->load->view('satyam_index',$data);
			}
		}

		//$this->load->view('footer');
	}

	public function validateLogin()
	{
		$this->load->library('satyam_config_validation');

		/* ###  Form Validation - START */
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');


		$this->form_validation->set_rules('userID', 'User ID', 'trim|required|xss_clean');

		$this->form_validation->set_rules('password', 'Password', 'required|min_length[1]|max_length[30]|xss_clean');

		$this->load->view('header');

		if ($this->form_validation->run() == FALSE)
		{
			$data['message'] = "";
			$this->load->view('satyam_index',$data);
		}
		else
		{
			if(	$this->attenticate->check_login($this->input->post('userID',true), $this->input->post('password',true)) )
			{
               
				$data['adminid'] = $this->satyam_config_validation->_get_logged_in_user_id();
				$data['activityid'] = 1;

				$this->load->model('admin_model');
				$this->admin_model->saveActivity($data);
				$this->satyam_config_validation->adminRedirect();
			}
			else
			{
				$data['message'] = "<div class='alert alert-danger'>Invalid email or password</div>";
				$this->load->view('satyam_index',$data);
			}
		}

        //$this->load->view('footer');


	}


	public function forgotAdminPassword()
	{
		$email = $_POST['email'];
		$checkEmail =  $this->admin_model->select_row("adminEmail = '$email'");
		if($checkEmail != "0#")
		{
			$adminID = $checkEmail['adminID'];
            
	        // $password = substr(md5(rand().rand()), 0, 9);
	        
	        $result = $this->admin_model->select_item_table("tbl_admin_unq_codes","passwordResetCode","adminID = $adminID");
	        
	        if($result=="0#")
	        {

	          $passwordResetCode =$this->getRandom();
			

				$data = array(
					'passwordResetCode' => $passwordResetCode,
					'adminID' => $adminID
				);
			// $where = array(
			// 	'adminID' => $adminID,
			// );

			$result = $this->admin_model->insert_table('tbl_admin_unq_codes',$data);
			$result = $this->admin_model->select_item_table("tbl_admin_unq_codes","passwordResetCode","adminID = $adminID");
	            if($result!="0#")
	            {
	                $passwordResetCode = $result;
				
					$this->sendForgotPassword($adminID,$passwordResetCode);
					//echo "An email has been sent to your email id with new  password";
					
	            }

	         }
	         else
	         {
	         	$result = $this->admin_model->select_item_table("tbl_admin_unq_codes","passwordResetCode","adminID = $adminID");
	            if($result!="0#")
	            {
	                $passwordResetCode = $result;
				
					$this->sendForgotPassword($adminID,$passwordResetCode);
					//echo "An email has been sent to your email id with new  password";
					
	            }
	         }

		}
		else
		{
			echo "Email Does Not Exists ";
		}


	}
	function sendForgotPassword($adminID,$passwordResetCode)
	{
		
        
        $adminDetails = $this->admin_model->select_row("adminID = $adminID");
		$adminName = $adminDetails["adminName"];
		$adminEmail = $adminDetails["adminEmail"];
		$adminRole = $adminDetails["adminRole"];
		$adminRole = $this->admin_role_model->select_item("role","roleID = $adminRole");
        $sendAdminMail['adminEmail']=$adminEmail;
        $sendAdminMail['adminName']=$adminName;
        $sendAdminMail['adminRole']=$adminRole;
		$sendAdminMail['passwordResetCode']=$passwordResetCode;
		$adminMail=$this->send_email->sendAdminForgotPasswordEmail($sendAdminMail);
        if($adminMail)
        {
            echo "An email has been sent to your email id with new  password";
        }    
        else
        {
             echo " Email is not sent due to some internal error";
        }   


	}
	public function getRandom()
	{
		$an = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $su = strlen($an) - 1;
	    return substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1) .
	            substr($an, rand(0, $su), 1);
	}


}
?>
