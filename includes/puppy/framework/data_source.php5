<?php

class data_source{
	public $dsn;
	public $username;
	public $password;
	private $pdo;
	
	public function __construct($dsn=null,$username,$password){
		$this->dsn=$dsn;
		$this->username=$username;
		$this->password=$password;
		$this->connect();
		return $this->pdo;
	}
	/**
	 * Connects to the Data Source
	 * @param bool $EP Emulate Prepares
	 * @param bool $EM Error mode
	 */
	public function connect($EP = true, $EM = PDO::ERRMODE_EXCEPTION){
		if($this->pdo===null){
			if(!empty($this->dsn)){
				try{
					$this->pdo = new PDO($this->dsn, $this->username, $this->password);
					$this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, $EP);
					$this->pdo->setAttribute(PDO::ATTR_ERRMODE, $EM);
				}
				catch(PDOException $e){
					/*echo "<pre>";
					var_dump($e);
					echo $e->getMessage();//for debuging, remove
					/**/
				}
			}
		}
	}
	public function scopeId(){
		return $this->pdo->lastInsertId();
	}
}