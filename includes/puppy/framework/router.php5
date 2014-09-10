<?php

/*Front Controller Pattern
public function getRoute()
{
    if(($action=$this->getAction())!==null)
        return $this->getUniqueId().'/'.$action->getId();
    else
        return $this->getUniqueId();
}
use of singleton would be less effecient
router can be access via instance of puppy object
or global varible $puppy
*/
//Allow pre request & post request
class router{
	function __construct(){
		$this->resolveRequest();
	}
	
	private function getPathInfo(){
		return substr($_SERVER['REQUEST_URI'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1);
	}
	
	private function getRequestInfo(){
		if(isset($_GET['r']))
			return $_GET['r'];
		else if(isset($_POST['r']))
			return $_POST['r'];
	}
	
	private function getRoute(){
		//GET, PATH, or MAP
	}
	
	private function resolveRequest(){
		/* take apart url & rebuild as call to controller
		 * or module/s/controller
		 */
		$controllers_dir = puppy::getAppDir().'controllers';
		$path_segments = explode('/', $this->getPathInfo());
		
		$controller_location = null;
		$controller_name = null;
		$action_name = null;
		
		//build path to controller
		$build_path = $controllers_dir;
		foreach($path_segments as $k => $dir){
			$build_path = $build_path.'/'.$dir;
			if(file_exists($build_path."/")){
				if(is_dir($build_path)){
					$controller_location = $build_path;
					if(is_file($build_path.'/'.$dir.'.php')){
						$controller_name = $dir;
					}
				}
			}
			else{
				$action_name = $dir;
				break;
			}
		}
		
		//call action
		if(file_exists($controller_location.'/'.$controller_name.'.php')){
			//wrap require in try catch to state file has error
			require_once($controller_location.'/'.$controller_name.'.php');
			$controller = new $controller_name();
			if($action_name !== null)
				$controller->$action_name();
		}
	}
}
