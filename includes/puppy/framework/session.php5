<?php

class session extends singleton{
	function __construct(){
		//broken, need to work on and test
		session_set_save_handler(array(&self, 'open'),
                         array(&self, 'close'),
                         array(&self, 'read'),
                         array(&self, 'write'),
                         array(&self, 'destroy'),
                         array(&self, 'gc'));
		session_start();
	}
	function retrieve_all(){
		return $_SESSION;
	}
	function id($id = NULL){
		if(is_null($id)){
			return session_id();
		}
		else{
			session_id($id);
		}
	}
	function regen(){
		session_regenerate_id();
	}
	function save_session(){
		
	}
	function load_session(){}
	function open(){}
	function close(){}
	function read(){}
	function write(){}
	function destroy(){}
	function gc(){}
}
