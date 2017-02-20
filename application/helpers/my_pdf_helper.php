<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function createPDF($html_data,  $file_name = '', $head = '', $footer = '')
    {
      $CI =& get_instance();

      $CI->load->config('upload', TRUE);
      $uploadPath = $CI->config->item('upload')['default']['report_path'];
      if ($file_name == "") {
        $file_name = '_'. date('dMY');
      }

      $file_path = $uploadPath .$file_name;

      $CI->load->library('pdf');
      $pdf = $CI->pdf->load();
      $pdf->WriteHTML($html_data);
      $pdf->Output($file_name . 'pdf', 'F');
      return $file_path;
    }


?>
