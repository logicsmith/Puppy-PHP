<?php

//handles configuration presidence and assibility
//class config_instance(){}
class config extends singleton{
	protected $defaultConfig = array(
		"controllers" => array(
			"actionPrefix" => "action",
			"actionSuffix" => "action",
		),
		"dbConnection" => array(
			'user',
			'pass'
		),
	);
	//allow prerequisites directory to be added, avaliable classes or librarys
	//  controllers/components + framework classes + added classes
	//allow moveTo, getDetail from moveTo location
	private $compiledConfig = array();
	
	function __construct(){
		$this->compilePresidence();
		
	}
	
	private function compilePresidence(){
		$this->compiledConfig = $this->defaultConfig;
		
	}
	
	public function getDetail($location){
		if(!is_string($location)){
			throw new Exception("The location must be a string with parent/dependent relationships seperated by slashes.");
		}
		else{
			$tmpReturn = $this->compiledConfig;
			$location = explode("/", $location);
			foreach($location as $node){
				if(array_key_exists($node, $tmpReturn)){
					$tmpReturn = $tmpReturn[$node];
				}
				else{
					throw new Exception("The item \"$node\" from \"$location\" could not be found in the configuration array.");
				}
			}
			return $tmpReturn;
		}
	}
	
	public function setDetail($location, $value){
		
	}
}