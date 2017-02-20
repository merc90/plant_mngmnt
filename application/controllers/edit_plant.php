<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class edit_plant extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
	
	}


	public function index($editPlantID)
	{

		if($this->satyam_config_validation->_is_logged_in()){	

			$this->form_validation->set_error_delimiters('', '');
			$this->form_validation->set_rules('plantName', 'Plant Name', 'trim|required|xss_clean');
			$this->form_validation->set_rules('plantAddress', 'Plant Address', 'trim|required|xss_clean');
			$this->form_validation->set_rules('plantLocation', 'Plant Location', 'trim|required|xss_clean');
			$this->form_validation->set_rules('plantDescription', 'Plant Description', 'trim|required|xss_clean');
			$this->form_validation->set_rules('contactNo', 'Contact Number', 'trim|required|xss_clean');
			
			$data['plantList'] = $this->custom_model->getPlantList();
			$data['editPlantID'] = $editPlantID;
			$data['editPlantDetails'] = $this->custom_model->getPlant($editPlantID);

			if ($this->form_validation->run() == FALSE)
			{
				$this->load->view('edit_plant',$data);
			}
			else
			{
				$this->_updatePlantData($editPlantID); 
				echo"Successfully edited the plant";
				
			}
		}
		else{
			redirect('satyam_index');
		}
		
	}
	
	
	public function _updatePlantData($editPlantID)
	{
 		$plantName = $this->input->post('plantName',true);
 		$plantAddress = $this->input->post('plantAddress',true);
 		$plantLocation = $this->input->post('plantLocation',true);
 		$plantDescription = $this->input->post('plantDescription',true);
 		$contactNo = $this->input->post('contactNo',true);
		
		$data = array(
			'plantName' => $plantName,
			'plantLocation' => $plantLocation,
			'plantDescription' => $plantDescription,
			'plantAddress' => $plantAddress,
			'contactNo' => $contactNo,
		);

		$where = array(
			'plantID' => $editPlantID
		);

		$this->custom_model->updatePlant($data,$where);
		
	}
			
}
?>