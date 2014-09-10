<?php

class mymodel extends model{
	public function config_table(){
		return "mytable";
	}
	
	public function config_attributes(){
		return array();
		//name, type
	}
	
	public function config_relations(){
		//attribute, type, toModel, toModelAttribute
	}
}
