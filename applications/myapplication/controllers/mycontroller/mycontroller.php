<?php

class mycontroller extends controller{
	function __construct(){
		echo "construct";
		parent::__construct();
		//$this->addAction('action');
	}
	
	function action(){
		echo "action";
	}
}