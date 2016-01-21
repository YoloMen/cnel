<?php

Class Aspirante_model extends Model {
    
    public function __construct() {
      //parent::__construct();
      $this->db = parent::getInstance();
    }

    public function getLocations($country = 0, $province = 0) {
      $data = null;

      if($country){
        $data["country"] = $this->db->select('LOC_ID, LOC_NOMB','SSP_LOCALIDAD', 'FK_LOID = 1 ORDER BY LOC_NOMB', PDO::FETCH_NUM);        
      }

      if($province){
        $data["province"] = $this->db->select('LOC_ID, LOC_NOMB','SSP_LOCALIDAD', 'FK_LOID = 2 ORDER BY LOC_NOMB', PDO::FETCH_NUM);        
      }

      return $data;

    }

    public function getLocationById($id, $LOC='LOC_ID=') {
      return $this->db->select('*','SSP_LOCALIDAD', $LOC.$id, PDO::FETCH_NUM);        
    }
    

    public function getCatastrophicIllness() {
      return $this->db->select('ECA_ID, ECA_NOMB','SSP_ENFERMEDAD_CATASTROFICA', '', PDO::FETCH_NUM);        
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
        ASP_FASE,

       	ASP_FK_ENCA,
        ASP_FK_LOCD,
        ASP_FK_LOCN,

       	ASP_STAT,
       	ASP_FMOD',
       	'SSP_ASPIRANTE', 'ASP_ID = '.$id);   
    }

    public function getDisability() {
      return $this->db->select('TDI_ID, TDI_NOMB','SSP_TIPO_DISCAPACIDAD','', PDO::FETCH_NUM);        
    }

    public function getFamilyType() {
      return $this->db->select('TFA_ID, TFA_NOMB','SSP_TIPO_FAMILIAR','', PDO::FETCH_NUM);        
    }

    public function getEducationLevel() {
      return $this->db->select('*','SSP_INSTRUCCION','', PDO::FETCH_NUM);        
    }

    public function getJobs() {
      return $this->db->select('*','SSP_OFICIO','', PDO::FETCH_NUM);        
    }


    public function getDisabilityCandidate($id) {
      $data = $this->db->select('*','SSP_ASPIRANTE_DISCAPACIDAD',' ADI_FK_ASID = '.$id);               
      if($data){
        $data = $data[0];
      }else{
        $data = [
          "ADI_ID" => null,
          "ADI_FK_ASID" => null,
          "ADI_FK_TIDI" => null,
          "ADI_CONA" => null,
          "ADI_PORC" => null,
          "ADI_FK_TIFA" => null
        ];
      }
      return $data;
    }

    public function CreateUpdateFamily($data, $idASP = false, $idRow = false) {
      if($idRow){
        $this->db->update('SSP_FAMILIAR', $data, false, 'FAM_ID = '.$idRow, true);  

        $data = $this->getFamilyCandidate($idASP, $idRow, true);     
        $data["DFINST"] = $this->db->select('INS_NOMB', 'SSP_INSTRUCCION', 'INS_ID='.$data["DFINST"], PDO::FETCH_NUM)[0][0];

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Actualización exitosa!", "DATA"=> $data];
        return json_encode($output);
      }else{
        $this->db->insert('SSP_FAMILIAR', $data, true);
        $idRow = $this->getLastId('FAM_ID', 'SSP_FAMILIAR', 'FAM_FK_ASPI='.$idASP. ' ORDER BY FAM_ID DESC');
        
        $data = $this->getFamilyCandidate($idASP, $idRow, true);     
        $data["DFINST"] = $this->db->select('INS_NOMB', 'SSP_INSTRUCCION', 'INS_ID='.$data["DFINST"], PDO::FETCH_NUM)[0][0];

        $row ='<tr data-id="'.$idRow.'">'.
                  '<td>'.$data["DFAPEL"].'</td>'.
                  '<td>'.$data["DFNOMB"].'</td>'.
                  '<td>'.$data["DFCEDU"].'</td>'.
                  '<td>'.$data["DFFNAC"].'</td>'.
                  '<td>'.$data["DFINST"].'</td>'.
                  '<td>'.$data["DFFEME"].'</td>'.
                  '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Registro exitoso!", "ROW"=> $row];
        return json_encode($output);
      }
    }

    public function getFamilyCandidate($idASP, $id = 0, $confI = 0){

      if($id){
        $d = $this->db->select('*', 'SSP_FAMILIAR', 'FAM_ID = '.$id)[0];
        $data = [
          "DFAPEL" => $d["FAM_APEL"],
          "DFNOMB" => $d["FAM_NOMB"],
          "DFCEDU" => $d["FAM_CEDU"],
          "DFFNAC" => $d["FAM_FNAC"],
          "DFDIRE" => $d["FAM_DIRE"],
          "DFTEL1" => $d["FAM_TEL1"],
          "DFTEL2" => $d["FAM_TEL2"],

          "DFFEME" => $d["FAM_FEME"],
          
          "DFTIFA" => $d["FAM_FK_TIFA"],
          "DFINST" => $d["FAM_FK_INST"],
          "DFOFIC" => $d["FAM_FK_OFIC"]
        ];

        if ($confI) {
          return $data;
        }


        $output = ["STATUS" => "SUCCESS", "MSG" => "Edición de datos", "DATA"=> $data];
        return json_encode($output);
      }

      return $this->db->select('*', 'SSP_FAMILIAR', 'FAM_FK_ASPI = '.$idASP.' ORDER BY FAM_ID DESC', PDO::FETCH_NUM);
    }


    public function updatePersonalInformation($data, $disability, $idASP){
      $output = $this->db->update('SSP_ASPIRANTE', $data, 'ASP_FMOD = now() ', 'ASP_ID = '.$idASP, true);

      if($disability){
        if($output){
          $query = $this->db->select('ADI_ID','SSP_ASPIRANTE_DISCAPACIDAD',' ADI_FK_ASID = '.$idASP, PDO::FETCH_NUM);
          if($query){
            $output = $this->db->update('SSP_ASPIRANTE_DISCAPACIDAD', $disability, false, 'ADI_ID = '.$query[0][0], true);
          }else{
            $output = $this->db->insert('SSP_ASPIRANTE_DISCAPACIDAD', $disability, true);
          }
        }
      }
           
      if($output){
        $output = ["STATUS" => "SUCCESS", "MSG" => "<i class=\"material-icons green-text\">done</i> &nbsp;¡Datos guardados correctamente!"];
      }else{
        $output = ["STATUS" => "SUCCESS", "MSG" => "<i class=\"material-icons red-text\">error</i> &nbsp; No se ha actualizado la información", "MSG1" => "Por favor, intentelo más tarde..."];
      }

      return json_encode($output);     
    }

    public function CreateUpdateFormalEducation($data, $idASP = false, $idRow = false) {
      if($idRow){
        $this->db->update('SSP_TITULO', $data, false, 'TIT_ID = '.$idRow, true); 

        $data = $this->getFormalEducation($idASP, $idRow, true);      
        $data["IFNSTR"] = $this->db->select('INS_NOMB', 'SSP_INSTRUCCION', 'INS_ID='.$data["IFNSTR"], PDO::FETCH_NUM)[0][0];        

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Actualización exitosa!", "DATA"=> $data];
        return json_encode($output);
      }else{

        $this->db->insert('SSP_TITULO', $data, true);
        $idRow = $this->getLastId('TIT_ID', 'SSP_TITULO', 'TIT_FK_ASPI='.$idASP. ' ORDER BY TIT_ID DESC');
        
        $data = $this->getFormalEducation($idASP, $idRow, true); 
        $data["IFNSTR"] = $this->db->select('INS_NOMB', 'SSP_INSTRUCCION', 'INS_ID='.$data["IFNSTR"], PDO::FETCH_NUM)[0][0];
        
        if($data["IFINST"]){
          $data["IFINST"] = $this->db->select('INS_NOMB', 'SSP_INSTITUCION', 'INS_ID='.$data["IFINST"], PDO::FETCH_NUM)[0][0];
        }
        
        if($data["IFINST"] === 'OTRA'){
          $data["IFINST"] = $data["IFOINS"];
        }
             
        $row ='<tr data-id="'.$idRow.'">'.
                  '<td>'.$data["IFNSTR"].'</td>'.
                  '<td>'.$data["IFINST"].'</td>'.
                  '<td>'.$data["IFNOMB"].'</td>'.
                  '<td>'.$data["IFSENE"].'</td>'.
                  '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Registro exitoso!", "ROW"=> $row];
        return json_encode($output);
      }
    }


    public function getFormalEducation($idASP, $id = 0, $confI = 0){

      if($id){
        $d = $this->db->select('*', 'SSP_TITULO', 'TIT_ID = '.$id)[0];
        $data = [
          "IFNOMB" => $d["TIT_NOMB"],
          "IFTIEM" => $d["TIT_TIEM"],
          "IFSENE" => $d["TIT_SENE"],
          "IFFGRA" => $d["TIT_FGRA"],

          "IFAEST" => $d["TIT_FK_AEST"],
          "IFINST" => $d["TIT_FK_INST"],
          "IFNSTR" => $d["TIT_FK_NSTR"],

          "IFOINS" => $d["TIT_OINS"]
        ];

        if ($confI) {
          return $data;
        }


        $output = ["STATUS" => "SUCCESS", "MSG" => "Edición de datos", "DATA"=> $data];
        return json_encode($output);
      }

      return $this->db->select('TIT_ID, TIT_FK_NSTR, TIT_FK_INST, TIT_NOMB, TIT_SENE, TIT_OINS', 'SSP_TITULO', 'TIT_FK_ASPI = '.$idASP.' ORDER BY TIT_ID DESC', PDO::FETCH_NUM);
    }



    public function deleteData($table, $where = false) {
      $query = $this->db->delete($table, $where);
      
      if($query){
        $output = ["STATUS" => "SUCCESS", "MSG" => "<i class=\"material-icons green-text\">done</i> &nbsp;¡Eliminación exitosa!"];
      }else{
        $output = ["STATUS" => "FAIL", "MSG" => "<i class=\"material-icons red-text\">error</i> &nbsp;Eliminación fallida", "MSG1"=> "Por favor, intentelo más tarde..."];
      }
      
      return json_encode($output);     
    }


    //Obtenemos el último ID registrado en la tabla a consultar
    public function getLastId($attr, $table, $where){
        $query = $this->db->select($attr, $table, $where,PDO::FETCH_NUM);
        
        if (count($query)==0){
            return false;
        }
        return $query[0][0];        
    }

    public function getInstitutions() {
      return $this->db->select('*','SSP_INSTITUCION', '', PDO::FETCH_NUM);        
    }

    public function getStudyArea() {
      return $this->db->select('*','SSP_AREA_ESTUDIO', '', PDO::FETCH_NUM);        
    }


    public function getLanguages() {
      return $this->db->select('*','SSP_IDIOMAS', '', PDO::FETCH_NUM);        
    }

    public function getLanguagesApplicant($idASP, $id = 0, $confI = 0){ 
      if($id){
        $d = $this->db->select('*', 'SSP_ASPIRANTE_IDIOMA', 'AID_ID = '.$id)[0];
        $data = [
          "IDNESC" => $d["AID_NESC"],
          "IDNHAB" => $d["AID_NHAB"],
          "IDIDIO" => $d["AID_FK_IDIO"]
        ];

        if($confI){
          return $data;
        }

        $output = ["STATUS" => "SUCCESS", "MSG" => "Edición de datos", "DATA"=> $data];
        return json_encode($output);
      }

      return $this->db->select('*', 'SSP_ASPIRANTE_IDIOMA', 'AID_FK_ASPI = '.$idASP.' ORDER BY AID_ID DESC', PDO::FETCH_NUM);
    }

    public function CreateUpdateLanguageApplicant($data, $idASP = false, $idRow = false) {

      if(!$data){
        $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Datos incorrectos."];
        return json_encode($output);
      }

      $levels = ["B"=>"BÁSICO", "I"=>"INTERMEDIO", "A"=>"AVANZADO"];      

      if($idRow){
        $this->db->update('SSP_ASPIRANTE_IDIOMA', $data, false, 'AID_ID = '.$idRow);  
        $data = $this->getLanguagesApplicant($idASP, $idRow, true);    
        $data["IDIDIO"] = $this->db->select('IDI_NOMB', 'SSP_IDIOMAS', 'IDI_ID='.$data["IDIDIO"], PDO::FETCH_NUM)[0][0];        

        $data["IDNESC"] = $levels[$data["IDNESC"]];
        $data["IDNHAB"] = $levels[$data["IDNHAB"]];

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Actualización exitosa!", "DATA"=> $data];
        return json_encode($output);
      }else{

        $queryLanguage = $this->db->select('AID_ID', 'SSP_ASPIRANTE_IDIOMA', 'AID_FK_ASPI = '.$idASP.' AND AID_FK_IDIO = '.$data["AID_FK_IDIO"], PDO::FETCH_NUM);
        if($queryLanguage){
          $output = ["STATUS" => "FAIL", "MSG" => "Al parecer ya ha registrado este idioma", "MSG1" => "Intentelo con otro idioma."];
          return json_encode($output);
        }     
    
        $this->db->insert('SSP_ASPIRANTE_IDIOMA', $data);
        $idRow = $this->getLastId('AID_ID', 'SSP_ASPIRANTE_IDIOMA', 'AID_FK_ASPI='.$idASP. ' ORDER BY AID_ID DESC');

        $data = $this->getLanguagesApplicant($idASP, $idRow, true);    
        $data["IDIDIO"] = $this->db->select('IDI_NOMB', 'SSP_IDIOMAS', 'IDI_ID='.$data["IDIDIO"], PDO::FETCH_NUM)[0][0];  

        $data["IDNESC"] = $levels[$data["IDNESC"]];
        $data["IDNHAB"] = $levels[$data["IDNHAB"]];

        $row ='<tr data-id="'.$idRow.'">'.
                  '<td>'.$data["IDIDIO"].'</td>'.
                  '<td>'.$data["IDNESC"].'</td>'.
                  '<td>'.$data["IDNHAB"].'</td>'.
                  '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';
        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Registro exitoso!", "ROW"=> $row];
        return json_encode($output);
      }
    }


    public function CreateUpdateCandidateTraining($data, $idASP = false, $idRow = false) {

      if(!$data){
        $output = ["STATUS" => "FAIL", "MSG" => "ERROR: Datos incorrectos."];
        return json_encode($output);
      }

      $certificate_type = ["A"=> "APROBACIÓN", "S"=>"ASISTENCIA"];
  
      if($idRow){
        $this->db->update('SSP_CURSO', $data, false, 'CUR_ID = '.$idRow, true);      

        $data =  $this->getCandidateTraining($idASP, $idRow, true);

        $data["CATEVE"] = $this->db->select('TEV_NOMB', 'SSP_TIPO_EVENTO', 'TEV_ID='.$data["CATEVE"], PDO::FETCH_NUM)[0][0];                
        $data["CAAEST"] = $this->db->select('AES_NOMB', 'SSP_AREA_ESTUDIO','AES_ID='.$data["CAAEST"], PDO::FETCH_NUM)[0][0];

        $data["CATCER"] = $certificate_type[$data["CATCER"]];

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Actualización exitosa!", "DATA"=> $data];
        return json_encode($output);
      }else{
   
        $this->db->insert('SSP_CURSO', $data, true);
        $idRow = $this->getLastId('CUR_ID', 'SSP_CURSO', 'CUR_FK_ASPI='.$idASP. ' ORDER BY CUR_ID DESC');

        $data =  $this->getCandidateTraining($idASP, $idRow, true);

        $data["CATEVE"] = $this->db->select('TEV_NOMB', 'SSP_TIPO_EVENTO', 'TEV_ID='.$data["CATEVE"], PDO::FETCH_NUM)[0][0];                
        $data["CAAEST"] = $this->db->select('AES_NOMB', 'SSP_AREA_ESTUDIO','AES_ID='.$data["CAAEST"], PDO::FETCH_NUM)[0][0];
        
        $data["CATCER"] = $certificate_type[$data["CATCER"]];
        
        $row ='<tr data-id="'.$idRow.'">'.
                  '<td>'.$data["CAECAP"].'</td>'.
                  '<td>'.$data["CATEVE"].'</td>'.
                  '<td>'.$data["CAAEST"].'</td>'.
                  '<td>'.$data["CATITU"].'</td>'.
                  '<td>'.$data["CATCER"].'</td>'.
                  '<td>'.$data["CADHOR"].'</td>'.
                  '<td>'.$data["CAFICA"].'</td>'.
                  '<td>'.$data["CAFFCA"].'</td>'.
                  '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';
        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Registro exitoso!", "ROW"=> $row];
        return json_encode($output);
      }
    }


    public function getEventType() {
      return $this->db->select('*','SSP_TIPO_EVENTO', '', PDO::FETCH_NUM);        
    }

    public function getCandidateTraining($idASP, $id = 0, $confI = 0){ 
      if($id){
        $d = $this->db->select('*', 'SSP_CURSO', 'CUR_ID = '.$id)[0];
        $data = [
          "CAECAP" => $d["CUR_ECAP"],
          "CATITU" => $d["CUR_TITU"],
          "CATCER" => $d["CUR_TCER"],
          "CADHOR" => $d["CUR_DHOR"],
          "CAFICA" => $d["CUR_FICA"],
          "CAFFCA" => $d["CUR_FFCA"],
          
          "CAAEST" => $d["CUR_FK_AEST"],
          "CATEVE" => $d["CUR_FK_TEVE"],
        ];

        if($confI){
          return $data;
        }

        $output = ["STATUS" => "SUCCESS", "MSG" => "Edición de datos", "DATA"=> $data];
        return json_encode($output);
      }

      return $this->db->select('*', 'SSP_CURSO', 'CUR_FK_ASPI = '.$idASP.' ORDER BY CUR_ID DESC', PDO::FETCH_NUM);
    }

    public function getWorkArea() {
      return $this->db->select('*','SSP_AREA_TRABAJO', '', PDO::FETCH_NUM);        
    }

    public function getWorkExperience($idASP, $id = 0, $confI = 0){ 
      if($id){
        $d = $this->db->select('*', 'SSP_EXPERIENCIA_LABORAL', 'ELA_ID = '.$id)[0];
        $data = [
          "ELNEMP" => $d["ELA_NEMP"],
          "ELCARG" => $d["ELA_CARG"],
          "ELRELA" => $d["ELA_RELA"],
          "ELTELE" => $d["ELA_TELE"],
          "ELSECT" => $d["ELA_SECT"],
          "ELARTR" => $d["ELA_FK_ARTR"]

        ];

        if($confI){
          return $data;
        }

        $output = ["STATUS" => "SUCCESS", "MSG" => "Edición de datos", "DATA"=> $data];
        return json_encode($output);
      }

      return $this->db->select('*', 'SSP_EXPERIENCIA_LABORAL', 'ELA_FK_ASPI = '.$idASP.' ORDER BY ELA_ID DESC', PDO::FETCH_NUM);
    }

    public function CreateUpdateWorkExperience($data, $idASP = false, $idRow = false) {
  
      if($idRow){
        $this->db->update('SSP_EXPERIENCIA_LABORAL', $data, false, 'ELA_ID = '.$idRow, true);      

        $data =  $this->getWorkExperience($idASP, $idRow, true);

        $data["ELARTR"] = $this->db->select('ATR_NOMB', 'SSP_AREA_TRABAJO', 'ATR_ID='.$data["ELARTR"], PDO::FETCH_NUM)[0][0];                

        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Actualización exitosa!", "DATA"=> $data];
        return json_encode($output);
      }else{
   
        $this->db->insert('SSP_EXPERIENCIA_LABORAL', $data, true);
        $idRow = $this->getLastId('ELA_ID', 'SSP_EXPERIENCIA_LABORAL', 'ELA_FK_ASPI='.$idASP. ' ORDER BY ELA_ID DESC');

        $data =  $this->getWorkExperience($idASP, $idRow, true);

        $data["ELARTR"] = $this->db->select('ATR_NOMB', 'SSP_AREA_TRABAJO', 'ATR_ID='.$data["ELARTR"], PDO::FETCH_NUM)[0][0];                

        
        $row ='<tr data-id="'.$idRow.'">'.
                  '<td>'.$data["ELNEMP"].'</td>'.
                  '<td>'.$data["ELARTR"].'</td>'.
                  '<td>'.$data["ELCARG"].'</td>'.
                  '<td>'.$data["ELRELA"].'</td>'.
                  '<td>'.$data["ELTELE"].'</td>'.
                  '<td><a href="javascript:" class="delete"><i class="material-icons">delete</i></a><a href="javascript:" class="edit"><i class="material-icons">edit</i></a></td>'.
                  '</tr>';
        $output = ["STATUS" => "SUCCESS", "MSG" => "¡Registro exitoso!", "ROW"=> $row];
        return json_encode($output);
      }
    }

    public function getPersonalReferences($id) {
      return $this->db->select('
        ASP_R1AP, 
        ASP_R1NO, 
        ASP_R1TE, 
        ASP_R1CO,
        ASP_R2AP, 
        ASP_R2NO, 
        ASP_R2TE, 
        ASP_R2CO', 'SSP_ASPIRANTE', 'ASP_ID = '.$id);   
    }

    public function UpdatePersonalReferences($data, $idASP) {
      $query = $this->db->update('SSP_ASPIRANTE', $data, false, 'ASP_ID = '.$idASP, true);
      
      if($query){
        $output = ["STATUS" => "SUCCESS", "MSG" => "<i class=\"material-icons green-text\">done</i> &nbsp;¡Actualización exitosa!"];
      }else{
        $output = ["STATUS" => "FAIL", "MSG" => "<i class=\"material-icons red-text\">error</i> &nbsp;No se ha podido actualizar", "MSG1" => "Por favor, intentelo más tarde..."];
      }
      
      return json_encode($output);
    }


    


}