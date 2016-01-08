<?php

Class Test_model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function tipo_sangre() {
       return $this->db->select('*','ssp_tipo_sangre');
        
       
        
    }
}

