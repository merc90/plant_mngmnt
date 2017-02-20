<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

		function composeBody($templateFile,$html_keys,$html_values)
		{
			$templateFileName = '';
			$file = fopen($templateFile,'r');
			while(!feof($file))
			{
				$templateFileName .= fgets($file);
			}
			fclose($file);
				
			$finalMsg =  str_replace($html_keys,$html_values,$templateFileName);
			return $finalMsg;
		}
		
		
		
		function sendMail($to,$subject,$message,$headers)
		{
			$CI =& get_instance();

			$from = 'care@satyam.com';

			$CI->load->library('email');		
			$config['mailtype'] = 'html';

			$CI->email->initialize($config);

			$CI->email->from($from,'Satyam');
			$CI->email->to($to);
			$CI->email->cc('');
			$CI->email->bcc('');
			$CI->email->subject($subject);
			$CI->email->message($message);
			$CI->email->send();
		}


?>