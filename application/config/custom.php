<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//Maximum allowed wrong password attempts
$config['max_pass_attempts'] = 5;

$config['website_directory'] = 'C:/xampp/htdocs/satyam/';

$config['access_json_path'] = $config['website_directory'].'json/';
$config['default']['upload_path'] = $config['website_directory'].'user_docs/';
$config['default']['allowed_types'] = '*';

$config['default']['report_path'] = $config['website_directory'].'user_docs/reports/';

$config['mainsite_directory'] = 'C:/xampp/htdocs/satyam/';
$config['contract_path'] = $config['mainsite_directory'].'user_docs/';
$config['doc_path'] = $config['mainsite_directory'].'uploads/';