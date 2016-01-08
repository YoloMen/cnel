<?php

Class Aspirante_model extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function getAllCountries() {
       return $this->db->select('LOC_ID, LOC_NOMB','ssp_localidad', 'FK_LOID = 1', PDO::FETCH_NUM);        
    }

    public function getAllProvinces() {
       return $this->db->select('LOC_ID, LOC_NOMB','ssp_localidad', 'FK_LOID = 2', PDO::FETCH_NUM);        
    }

    public function getDataCandidate($id) {
       return $this->db->select('
       	ASP_CEDU, 
       	ASP_NOM1, 
       	ASP_NOM2, 
       	ASP_APE1, 
       	ASP_APE2,
       	ASP_DISC,
       	ASP_ETNI,
       	ASP_ESCI,
       	ASP_FENA,
       	ASP_GENE,
       	ASP_EMAP,
       	ASP_EMAI,
       	ASP_ESTA,
       	ASP_PESO,
       	ASP_TEL1,
       	ASP_TEL2,
       	ASP_TILI,
       	ASP_TISA,
        
        ASP_CAPR,
        ASP_CASE,
        ASP_NCAS,
        ASP_SECT,
        ASP_REFE,

       	ASP_FK_DIRE,
       	ASP_FK_ENCA,

        ASP_FK_LOCD,
        ASP_FK_LOCN,

       	ASP_STAT,
       	ASP_FMOD',
       	'SSP_ASPIRANTE', 'ASP_ID = '.$id, PDO::FETCH_ASSOC);   

    }

    public function updatePersonalInformation($data, $id){
      return $this->db->update('SSP_ASPIRANTE', $data, 'ASP_ID = '.$id, 'ASP_FMOD = null() ', true );
    }

}

