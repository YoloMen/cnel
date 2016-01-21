<?php

Class Model{

	private static $_instance;
    
	private function __construct(){
        //$this->db = new PDOManager('mysql', 'localhost', 'root', '', 'ssp_test');
	}

	public static function getInstance(){
 
        if(!isset(self::$_instance)){
             self::$_instance = new PDOManager('mysql', 'localhost', 'root', 'root', 'ssp_test');
        }
 
        if(!isset(self::$_instance)){
            throw new Exception('Database connection cannot be established');
        }
 
        return self::$_instance;
 
    }
}

?>