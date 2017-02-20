<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_admins extends CI_Controller {

	const MODULE_NAME = 'manage_admins';

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


		if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
    	{
     	 	echo "No Access";
     	 	exit();
    	}

	}


	public function index()
	{

		if($this->satyam_config_validation->_is_logged_in()){

			$adminID = $this->session->userdata('adminID');//taking admin id from session
			$data['adminRole'] = $this->session->userdata('adminRole');
			$data['adminRolesList'] = $this->admin_role_model->select_all("","");

			$all_admin_users = $this->admin_model->select_all("","adminID DESC");

			foreach($all_admin_users as $users)
			{
				$adminRole = $this->admin_role_model->select_item("role","roleID = ".$users['adminRole']);

				$data['all_admins'][] = array(
					'adminID' => $users['adminID'],
					'adminName' => $users['adminName'],
					'adminRole' => $adminRole,
					'adminEmail' => $users['adminEmail'],
					'isBlocked' => $users['isBlocked'],
				);
			}

			$this->load->view('header_in',$data);
			$this->load->view('manage_admins');
			$this->load->view('footer');
		}
		else
		{
			redirect("satyam_index");
		}

	}


	public function addAdmin()
	{

 		$adminEmail = $this->input->post('adminEmail',true);
 		$adminName = $this->input->post('adminName',true);
		$adminRole = $this->input->post('adminRole',true);
		$address = $this->input->post('address',true);
		$mobileNo = $this->input->post('mobileNo',true);

		$password = substr(md5(rand().rand()), 0, 9);
		$userID = substr(str_shuffle("0123456789"), 0, 6);
		$new_password = $password;
		$adminPassword = do_hash($password, 'md5'); // MD5 Hashing

		$data = array(
			'adminEmail' => $adminEmail,
			'adminPassword' => $adminPassword,
			'userID' => $userID,
			'adminName' => $adminName,
			'mobileNo' => $mobileNo,
			'address' => $address,
			'adminRole' => $adminRole,
		);

		$adminID = $this->admin_model->insert($data);


		$this->sendPassword($adminID,$adminEmail,$new_password,$adminName,$adminRole,$userID);

		if($adminRole==4)
		{
			$data = array(
			'adminID' => $adminID,
			'orderStockLimit' => "",
			);

			$limitID = $this->custom_model->insertLimit($data);
		}

		// redirect("manage_admins");
	}


	public function resetAdminPassword()
	{
		$adminID = $_POST['adminID'];

        $password = substr(md5(rand().rand()), 0, 9);
		$new_password = $password;
		$adminPassword = do_hash($password, 'md5'); // MD5 Hashing


		$data = array(
			'adminPassword' => $adminPassword,
		);
		$where = array(
			'adminID' => $adminID,
		);

		$this->admin_model->update($data,$where);

		$this->sendResetPassword($adminID,$new_password);
		echo "Password Reset Successfully";
	}


	public function blockAdminUser()
	{
		$adminID = $_POST['adminID'];

		$data = array(
			'isBlocked' => 1,
		);
		$where = array(
			'adminID' => $adminID,
		);

		$this->admin_model->update($data,$where);

		echo "Blocked Successfully";

	}

public function existAdminUser()
	{
		$email = $_POST['adminEmail'];

		if($this->admin_model->select_row("adminEmail = '$email'") == "0#") {
			
				$this->addAdmin();
			echo "false";
		}
		else {
			echo "true";
		}

	}

	public function unblockAdminUser()
	{
		$adminID = $_POST['adminID'];

		$data = array(
			'isBlocked' => 0,
		);
		$where = array(
			'adminID' => $adminID,
		);

		$this->admin_model->update($data,$where);

		echo "UnBlocked Successfully";

	}



	public function forgotAdminPassword()
	{
		$email = $_POST['email'];
		$checkEmail =  $this->admin_model->select_row("adminEmail = '$email'");
		if($checkEmail != "0#")
		{
			$adminID = $checkEmail['adminID'];

	        $password = substr(md5(rand().rand()), 0, 9);
			$new_password = $password;
			$adminPassword = do_hash($password, 'md5'); // MD5 Hashing


			$data = array(
				'adminPassword' => $adminPassword,
			);
			$where = array(
				'adminID' => $adminID,
			);

			$this->admin_model->update($data,$where);
			$this->sendForgotPassword($adminID,$new_password);
			echo "New Password has been sent Successfully";
			


		}
		else
		{
			echo "Email Does Not Exists In List";
		}


	}



	function sendPassword($adminID,$adminEmail,$adminPassword,$adminName,$adminRole,$userID)
	{
        $adminRole=$this->admin_role_model->select_item("role","roleID = $adminRole");
        $sendAdminMail['adminEmail']=$adminEmail;
        $sendAdminMail['adminName']=$adminName;
        $sendAdminMail['adminRole']=$adminRole;
		$sendAdminMail['adminPassword']=$adminPassword;
		$sendAdminMail['userID']=$userID;
		$adminMail=$this->send_email->sendNewAdminEmail($sendAdminMail);
        if($adminMail)
        {
            echo "Successfully admin added and email is sent";
        }    
        else
        {
             echo "Successfully admin added but email is not sent due to some internnal error";
        }   

	}


	function sendResetPassword($adminID,$adminPassword)
	{
		$adminDetails = $this->admin_model->select_row("adminID = $adminID");
		$adminName = $adminDetails["adminName"];
		$adminEmail = $adminDetails["adminEmail"];
		$adminRole = $adminDetails["adminRole"];
		$adminRole = $this->admin_role_model->select_item("role","roleID = $adminRole");
        $sendAdminMail['adminEmail']=$adminEmail;
        $sendAdminMail['adminName']=$adminName;
        $sendAdminMail['adminRole']=$adminRole;
		$sendAdminMail['adminPassword']=$adminPassword;
		$adminMail=$this->send_email->sendAdminResetPasswordEmail($sendAdminMail);
        if($adminMail)
        {
            echo "Successfully  admin passowrd  is reset";
        }    
        else
        {
             echo " Email is not sent due to some internnal error";
        }   
	}


	function sendForgotPassword($adminID,$adminPassword)
	{
		
        $adminDetails = $this->admin_model->select_row("adminID = $adminID");
		$adminName = $adminDetails["adminName"];
		$adminEmail = $adminDetails["adminEmail"];
		$adminRole = $adminDetails["adminRole"];
		$adminRole = $this->admin_role_model->select_item("role","roleID = $adminRole");
        $sendAdminMail['adminEmail']=$adminEmail;
        $sendAdminMail['adminName']=$adminName;
        $sendAdminMail['adminRole']=$adminRole;
		$sendAdminMail['adminPassword']=$adminPassword;
		$adminMail=$this->send_email->sendAdminForgotPasswordEmail($sendAdminMail);
        if($adminMail)
        {
            echo "Successfully forgot password  email is sent";
        }    
        else
        {
             echo " Email is not sent due to some internal error";
        }   


	}



}
?>
