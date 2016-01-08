<?php

Class Model{
    
	public function __construct(){
            $this->db = new PDOManager('mysql', 'localhost', 'root', '', 'ssp_test');
	}
}

?>