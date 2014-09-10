<?php

ob_start();

//For Debuging
error_reporting('E_ALL');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
/*
 * Setup Router
 * Aquire Configurations
 */

//Load Singleton Extender
if(file_exists(PUP_DIR.'framework/singleton.php5')) require_once(PUP_DIR.'/framework/singleton.php5');
else bootBrake('Path to Puppy Singleton is not found.');

//Load Autoloader
if(file_exists(PUP_DIR.'framework/autoload.php5')) require_once(PUP_DIR.'/framework/autoload.php5');
else bootBrake('Path to Puppy Autoloader is not found.');

//puppy & application should be a singleton
class puppy extends singleton{
	public static $app = null;//static makes property accessible from singleton
	
	public function __get($property){
		/*$trace = debug_backtrace();
		trigger_error(
			'Undefined property via __get(): ' . $name .
			' in ' . $trace[0]['file'] .
			' on line ' . $trace[0]['line'],
			E_USER_NOTICE);
		return null;*/
		return $this->$property;
	}
	
	function __construct(){
		self::$app = new application(APP_DIR);
		$r = new router();
	}
	
	function getAppDir(){
		return self::$app->app_dir;
	}
	
	function versionInfo(){
		return "";//phpinfo like information for puppy & application config / anything usefull for debugging
	}
}
