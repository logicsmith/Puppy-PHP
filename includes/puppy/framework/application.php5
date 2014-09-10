<?php

class application{
	public $app_dir = null;
	/* Access to register of modules
	 * Access to application config / static scope
	 * Access to application user session
	 */
	function __construct($app_dir){
		$this->app_dir = $app_dir;
		//echo config::instance()->getDetail("controllers/actionPrefix");
	}
	
	public function loadConfig(){
		
	}
}