<?php

class controller{
	protected $puppy_controller_actions = array();
	
	function __construct(){
		/* Allow a config property to allow actions to be auto added baised off 
		 * of a prefix in the method name vs calling addAction for each action.
		 */
	}
	
	function addAction($call, $method){
		if(!is_string($method)){
			throw new Exception("The method must be a string of the function name.");
		}
		else{
			array_push($this->puppy_controller_actions, $method);
		}
	}
	
	function addActions($methods){
		foreach($methods as $call => $method){
			if(!is_string($call) || strlen($call)<1){
				$call = $method;
			}
			if(array_key_exists($call, $this->puppy_controller_actions)){
				throw new Exception("The Action $call has allready been added to the controller - Cannot Add Twice.");
			}
			elseif(!is_string($method)){
				throw new Exception("The method must be a string of the function name.");
			}
			else{
				$this->puppy_controller_actions[$call] = $method;
			}
		}
	}
	
	function callAction($callback){
		/* Should action methods be allowed to have parameters
		 * maybe method($id, $id2); url: ?id=23&id2=35
		 * urlfe method($id, $id2); url: /23/35 to ?0=23&1/35 OR /id/23/id2/35
		 * would be GET basied only for sure, no POST
		 * It would be better to only gether form input via the form class
		 * to filter input & escape input properly for security;
		 * So the answer is no paramters for actions.
		 */
		if(array_key_exists($callback, $this->puppy_controller_actions)){
			call_user_func('$this->'.$this->puppy_controller_actions[$callback]);
		}
		else{
			throw new Exception(
				"The Action is not avalible to the controller, try calling 
				\"$this->addAction('callText', 'methodName');\" in your __construct method."
			);
		}
	}
}
