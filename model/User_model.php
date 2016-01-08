<?php

Class User_Model extends Model{
	public function __construct(){
		parent::__construct();
	}

	public function signUp($data){
		return $this->db->insert('usuarios', $data);
	}
}


?>