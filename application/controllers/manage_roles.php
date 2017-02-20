<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class manage_roles extends CI_Controller {

  const MODULE_NAME = 'manage_roles';

  public function __construct()
  {
    parent::__construct();

      if($this->satyam_config_validation->getAccessPermissionByController(self::MODULE_NAME) == '_N')
      {
        echo "No Access";
        exit();
      }

  }

  public function index()
  {
    if($this->satyam_config_validation->_is_logged_in()){

      $this->adminRoles = $this->admin_role_model->select_all('isActive = 1',null);
      $rolesOpt = "<option value='0'>---</option>";
      foreach ($this->adminRoles as $row) {
        $rolesOpt .= "<option value='".$row['roleID']."'>".$row['role']."</option>";
      }
      $data['rolesOpt'] = $rolesOpt;
      $data['modulePermissions'] = array();
      $data['filedPermissions'] = array();
      $data['roleID'] = 0;
      $data['module_table'] = $this->load->view('manage_roles_module_table', $data, TRUE);
      $data['field_table'] = $this->load->view('manage_roles_field_table', $data, TRUE);
      $this->load->view('header_in', $data);
      $this->load->view('manage_roles');
      $this->load->view('footer');
    } else {
      redirect("satyam_index");
    }
  }

  public function getModulesPermissionTable($roleID)
  {
    $data['roleID'] = $roleID;
    if($roleID > 0)
    {
      $data['modulePermissions'] = $this->custom_model->sp_get_admin_module_permissions_by_role($roleID)[0];
    }
    else
    {
      $data['modulePermissions'] = array();
    }
    echo $this->load->view('manage_roles_module_table', $data, TRUE);
  }

  public function getFieldPermissionTable($roleID)
  {
    $data['roleID'] = $roleID;

    if($roleID > 0)
    {
      $data['filedPermissions'] = $this->custom_model->sp_get_admin_field_permissions_by_role($roleID)[0];
    }
    else
    {
      $data['filedPermissions'] = array();
    }
    echo $this->load->view('manage_roles_field_table', $data, TRUE);
  }

  public function addRoles() {
    if($this->satyam_config_validation->_is_logged_in()){
      $name = $this->input->post('roleName');
      $this->custom_model->sp_add_new_admin_role($name);
    }
    else
    {
      redirect("satyam_index");
    }
  }

  public function addModules() {
    if($this->satyam_config_validation->_is_logged_in()){
      $moduleName = $this->input->post('moduleName');
      $moduleDisplayName = $this->input->post('moduleDisplayName');
      $moduleOrder = $this->input->post('moduleOrder');
      $this->custom_model->sp_add_new_admin_module($moduleName, $moduleDisplayName, $moduleOrder);
    }
    else
    {
      redirect("satyam_index");
    }
  }

  public function getModulesOpt() {
    if($this->satyam_config_validation->_is_logged_in()){
      $this->load->model('admin_module_model');
      $models = $this->admin_module_model->select_all('');
      $modelOpt = "";
      foreach ($models as $row) {
        $modelOpt .= "<option value='".$row['adminModuleID']."'>".$row['moduleDisplayName']."</option>";
      }
      echo $modelOpt;
    }
    else
    {
      redirect("satyam_index");
    }
  }

  public function addFields() {
    if($this->satyam_config_validation->_is_logged_in()){
      $name = $this->input->post('fieldName');
      $module = $this->input->post('moduleDropDown');
      $this->custom_model->sp_add_new_admin_fields($name, $module);
    }
    else
    {
      redirect("satyam_index");
    }
  }

  public function saveModulePermissions()
  {
    if($this->satyam_config_validation->_is_logged_in()){
      echo $roleID = $this->input->post('roleID');
      $readAccess = $this->input->post('read');
      $writeAccess = $this->input->post('write');

      if($roleID > 0)
      {
        $this->load->model('admin_module_permissions_model');
        foreach ($this->input->post('id') as $id) {
          $data = $where = array();

          $where['modulePermissionsID'] = $id;
          $data['Read'] = (array_key_exists($id, $readAccess)) ? 1 : 0;
          $data['Write'] = (array_key_exists($id, $writeAccess)) ? 1 : 0;
          $this->admin_module_permissions_model->update($data, $where);
        }
      }
    }
    else
    {
      redirect("satyam_index");
    }
  }

public function saveFieldPermissions()
  {
    if($this->satyam_config_validation->_is_logged_in()){
      echo $roleID = $this->input->post('roleID');
      $readAccess = $this->input->post('read');
      $writeAccess = $this->input->post('write');

      if($roleID > 0)
      {
        $this->load->model('admin_field_permissions_model');
        foreach ($this->input->post('id') as $id) {
          $data = $where = array();

          $where['fieldPermissionsID'] = $id;
          $data['Read'] = (array_key_exists($id, $readAccess)) ? 1 : 0;
          $data['Write'] = (array_key_exists($id, $writeAccess)) ? 1 : 0;
          $this->admin_field_permissions_model->update($data, $where);
        }
      }
    }
    else
    {
      redirect("satyam_index");
    }
  }
}
?>
