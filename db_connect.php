<?php

class Database{
	private $_connection;
	private $_host = "mysql7.000webhost.com";
	private $_user = "a7253357_christo";
	private $_password = "1a2S3d4F#";
	private $_database = "a7253357_lost";
	private static $_instance;

	public static function getInstance(){
		if (!self::$_instance) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	private function __construct(){
		$this->_connection = new mysqli($this->_host, $this->_user,$this->_password, $this->_database);

		if(mysqli_connect_error()){
			trigger_error("Error Connecting To The Database : " . mysqli_connect_error());
		}
	}

	private function __clone(){}

	public function getConnection(){
		return $this->_connection;
	}

}

?>