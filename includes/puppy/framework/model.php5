<?php

abstract class model{
	public $is_new;//is new insert or updating existing record
	public $is_saved;//are values saved to data source
	
	protected $table_name;
	protected $attributes;
	protected $relations;
	
	private $active_record_id;//current loaded record pk
	
	private $local_data;//data stored in class
	private $live_data;//data stored in data source
	
	abstract function config_table();
	abstract function config_attributes();
	abstract function config_relations();
	
	public function __construct(){
		$this->table_name = $this->config_table();
		$this->attributes = $this->config_attributes();
		$this->relations = $this->config_relations();
	}
	
	/**
	 * Set Attribute Value
	 */
	public function setAttribute($attr, $value){
		
	}
	/**
	 * Submit Values to all Attributes
	 */
	public function setAttributes($array){
		
	}
	/**
	 * Get Attribute Value
	 */
	public function getAttribute($attr, $value){
		
	}
	
	/**
	 * Checks Local $local_data against Attribute Data Types
	 */
	public function checkInput(){}
	
	public function newRecord(){
		
	}
	public function loadRecord($pk){
		
	}
	public function getId(){
		
	}
	public function save(){
		//if is new update $active_record_id
	}
	public function delete(){}
	/**
	 * Compares unsaved values with live record
	 */
	public function compare(){
		
	}
	private function insert(){
		
	}
	private function update(){
		
	}
	private function read(){
		
	}
}