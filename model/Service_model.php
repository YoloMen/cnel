<?php

Class Service_Model extends Model{
	public function __construct(){
		//parent::__construct();
    $this->db = parent::getInstance();     
	}

    public function getAllCantonById($id) {
       return $this->db->select('LOC_ID, LOC_NOMB','ssp_localidad', 'FK_LOID = 3 AND LOC_PADR = '.$id, PDO::FETCH_NUM);        
    }

    public function getAllParroquiasById($id) {
       return $this->db->select('LOC_ID, LOC_NOMB','ssp_localidad', 'FK_LOID = 4 AND LOC_PADR = '.$id, PDO::FETCH_NUM);        
    }

    public function delete($id) {
       return $this->db->delete('TEST', 'idtest = '.$id);        
    }
}


?>