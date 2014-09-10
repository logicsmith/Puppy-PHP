<?php

function include_file_exists($file){
	foreach(explode(PATH_SEPARATOR, ini_get('include_path')) as $include_path){
		if(file_exists($include_path."/".$file))
			return true;
	}
	return false;
}

class autoload_pup extends singleton{
	public $autoload_entry = array();
	
	function __construct(){}
	
	public function addEntry($class, $path){
		$this->autoload_entry[$class] = $path;
	}
	public function removeEntry($class){
		unset($this->autoload_entry[$class]);
	}
	public function checkEntry($class){
		if(array_key_exists($class, $this->autoload_entry)){
			return $this->autoload_entry[$class];
		}
		else{
			return false;
		}
	}
}

//autoload_pup::instance()->addEntry("PHPMailer", INCLUDE_PHPMAILER_PATH."class.phpmailer.php");
//autoload_pup::instance()->addEntry("Smarty", SMARTY_VERSION."libs/Smarty.class.php");

function puppy_autoload($class){
	$direct = autoload_pup::instance()->checkEntry($class);
	if($direct!==false && file_exists(PUP_DIR."/".$file)){
		require_once(PUP_DIR."/".$direct.".php5");
	}
	elseif($direct!==false && include_file_exists($direct.".php5")){
		require_once($direct.".php5");
	}
	
	if(file_exists(PUP_DIR."framework/".$class.".php5")){
		//wrap require in try catch to state file has error
		require_once(PUP_DIR."framework/".$class.".php5");
	}
	if(include_file_exists("framework/".$class.".php5")){
		require_once("framework/".$class.".php5");
	}
}
spl_autoload_register('puppy_autoload');
if(function_exists('__autoload')){
	spl_autoload_register('__autoload');
}
