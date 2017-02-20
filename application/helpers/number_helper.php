<?php
if ( ! defined('BASEPATH'))
    exit('No direct script access allowed');

function currency_format($number, $decimalPoints = 2)
{
  setlocale(LC_ALL, 'en_AU');
  /*if(function_exists('money_format'))
    return money_format("%n",$number);
  else*/
    return '$'.(number_format((int)$number, $decimalPoints));
}

function my_number_format($number, $decimalPoints = 0)
{
  return (number_format($number, $decimalPoints));
}



?>
