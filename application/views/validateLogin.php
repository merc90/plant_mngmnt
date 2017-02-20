<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Authorization');

//echo "HI";exit();
//var_dump($_SERVER); 
  //exit();
if (!isset($_SERVER['HTTP_USER'])) {
		        header('WWW-Authenticate: Basic realm="Restricted Area"');
		        header("HTTP/1.0 401 Unauthorized");
		        echo  "Sorry - you need valid credentials to be granted access!\n";
		        exit;
		    } else {
                    

		        if (($_SERVER['HTTP_USER']) && ($_SERVER['HTTP_PASSWORD'])) {
		            echo  "Welcome to the private area!<br>".$_SERVER['PHP_AUTH_USER']."<br>".$_SERVER['PHP_AUTH_PW'];
		            exit();
		        } else {
		            header("WWW-Authenticate: Basic realm=\"Private Area\"");
		            header("HTTP/1.0 401 Unauthorized1");
		            echo "Sorry - invalid credentials to be granted access!\n";
		            exit;
		        }
		    }

?>
