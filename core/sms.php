<?php

$number = $_POST["nos"];
$message =$_POST["mess"];
$apicode = "TR-ERICP953693_9ZK94";
		

			//echo $message; 
			/*
			$ch = curl_init();
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
			curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($itexmo));
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			return curl_exec ($ch);
			curl_close ($ch);
			//*/
			//*
			$url = 'https://www.itexmo.com/php_api/api.php';
			$itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
			$param = array(
    			'http' => array(
        		'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        		'method'  => 'POST',
        		'content' => http_build_query($itexmo),
    			),
    		);
			$context  = stream_context_create($param);
			return file_get_contents($url, false, $context);
			//*/


?>