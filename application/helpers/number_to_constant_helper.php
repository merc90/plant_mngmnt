<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function investmentPeriodNA($data)
{
  return ($data < 1) ? 'Not Applicable' : $data;
}
