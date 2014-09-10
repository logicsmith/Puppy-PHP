<?php

class singleton{
	//Signleton Classes Require __construct method
	private static $_singleton = array();
	
	public static function instance(){
		$calling_class = get_called_class();
		if(!array_key_exists($calling_class, self::$_singleton)){
			$instance = new ReflectionClass($calling_class);
			$args = func_get_args();
			self::$_singleton[$calling_class] = $instance->newInstanceArgs($args);
		}
		return self::$_singleton[$calling_class];
	}
}