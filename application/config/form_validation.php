<?php

//Config array for validating in groups
//Adding Groups in core and making use of it in Validations in controller by calling groupnames in run

 
//Can Make an Generic ruleset of your own
// Check Below comments for the rules available in codeigniter

$varalpha='alpha';


$config['validate_fields']=array(
      array(
            'field' => 'title',
            'label' => 'title',
            'rules' => 'numeric'
      ),
      array(
            'field' => 'userFirstName',
            'label' => 'firstName',
            'rules' => 'alpha|min_length[2]'
      ),
      array(
            'field' => 'userLastName',
            'label' => 'userLastName',
            'rules' => 'alpha|min_length[1]'
      ),
      array(
            'field' => 'dobday',
            'label' => '',
            'rules' => 'numeric'
      ),
       array(
            'field' => 'dobmonth',
            'label' => '',
            'rules' => 'numeric'
      ),
       array(
            'field' => 'dobyear',
            'label' => '',
            'rules' => 'numeric'
      ),  
      array(
            'field' => 'mobileNumber',
            'label' => 'mobileNumber',
            'rules' => 'numeric|max_length[10]'
      ),
      array(
            'field' => 'userResAddress',
            'label' => '',
            'rules' => 'callback__validate_address'
      ),
      array(
            'field' => 'userPosAddress',
            'label' => '',
            'rules' => 'callback__validate_address'
      ),
      
  );


//This config array contains basic details mandate rules
$config['mandateBasicDetails']=array(
      array(
            'field' => 'title',
            'label' => 'title',
            'rules' => 'required'
      ),
      array(
            'field' => 'firstName',
            'label' => 'firstName',
            'rules' => 'required'
      ),
       array(
            'field' => 'lastName',
            'label' => 'lastName',
            'rules' => 'required'
      ),
       array(
            'field' => 'dobday',
            'label' => '',
            'rules' => 'required'
      ),
       array(
            'field' => 'dobmonth',
            'label' => '',
            'rules' => 'required'
      ),
       array(
            'field' => 'dobyear',
            'label' => '',
            'rules' => 'required'
      ),
       array(
            'field' => 'mobileNumber',
            'label' => '',
            'rules' => 'required'
      ),
      array(
            'field' => 'userResAddress',
            'label' => '',
            'rules' => 'required'
      ),
      array(
            'field' => 'userPosAddress',
            'label' => '',
            'rules' => 'callback__required_if[samePostalAddress,1]'
      ),  
      
  );


