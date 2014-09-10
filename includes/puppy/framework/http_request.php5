<?php

class http_request extends singleton{
	public function env_debug(){
		echo "\n\nSERVER\n\n";
		var_dump($_SERVER);
		echo "\n\nGET\n\n";
		var_dump($_GET);
		echo "\n\nPOST\n\n";
		var_dump($_POST);
		echo "\n\nFILES\n\n";
		var_dump($_FILES);
		echo "\n\nREQUEST\n\n";
		var_dump($_REQUEST);
		echo "\n\nSESSION\n\n";
		var_dump($_SESSION);
		echo "\n\nENV\n\n";
		var_dump($_ENV);
		echo "\n\nCOOKIE\n\n";
		var_dump($_COOKIE);
		echo "\n\nHTTP_RAW_POST\n\n";
		var_dump($HTTP_RAW_POST_DATA);
		echo "\n\nHTTP_RESPONSE\n\n";
		var_dump($http_response_header);
		echo "\n\nARGC\n\n";
		var_dump($argc);
		echo "\n\nARGV\n\n";
		var_dump($argv);
	}
}
