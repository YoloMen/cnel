<?php

Class Acceso_model extends Model {
    
    public function __construct() {
      $this->db = parent::getInstance();
    }

    public function registerCandidate($data, $email) {

      $check = $this->checkCandidate($email);

      if($check){
        return ["S"=> false, "D" => "Error: Correo electrónico ya registrado"];
      }else{
        $query =  $this->db->insert('SSP_ASPIRANTE', $data);
        if($query){
          $check = $this->checkCandidate($email);
          return ["S"=> true, "D" => $check];
        }   
        else{
          return ["S"=> false, "D" => "Error: No es posible registrarse. Por favor, intentalo más tárde..."];
        }
        
      }      
    }


    public function updateStatusCandidate($idRow = 0, $stat) {
      if(!$idRow){
        return false;
      }else{
        return $this->db->update('SSP_ASPIRANTE', ["ASP_STAT"=>"'$stat'"], "ASP_FMOD = now() ", 'ASP_ID = '.$idRow);
      }

    }

    public function updatePasswordCandidate($idRow = 0, $pass, $token) {
      if(!$idRow){
        return false;
      }else{
        return $this->db->update('SSP_ASPIRANTE', ["ASP_PASS"=>"'$pass'", "ASP_TCOD" => "'".$token."'"], "ASP_FMOD = now() ", 'ASP_ID = '.$idRow);
      }
    }



    public function getToken($idRow) {
      return $this->db->select('ASP_TCOD','SSP_ASPIRANTE', "ASP_ID=$idRow", PDO::FETCH_NUM);        
    }


    public function checkCandidate($email) {
      return $this->db->select('ASP_ID, ASP_FCRE','SSP_ASPIRANTE', "ASP_EMAP='".$email."'", PDO::FETCH_NUM);        
    }

    public function getStatusCandidate($id) {
      return $this->db->select('ASP_STAT, ASP_FMOD, ASP_EMAP','SSP_ASPIRANTE', "ASP_ID='".$id."'", PDO::FETCH_NUM);        
    }



    public function login($email, $pass) {
      $query =  $this->db->select('ASP_ID, ASP_STAT, ASP_PASS','SSP_ASPIRANTE', "ASP_EMAP='".$email."'", PDO::FETCH_NUM);        


      if(!$query){
        $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons red-text\">error</i> &nbsp; Usuario no registrado"];
      }else{

        if(password_verify($pass, $query[0][2])){

          if($query[0][1]==='A'){
            Session::setValue("idASP", $query[0][0]);
            Session::setValue("emailASP", $email);
            $output = ["STATUS" => "SUCCESS", "MSG"=> "<i class=\"material-icons green-text\">done</i> &nbsp; Has iniciado sesión correctamente"];  
          }

          if ($query[0][1]==='I') {
            $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons\">highlight_off</i> &nbsp; ¡Esta cuenta no se encuentra habilitada! Por favor, debe activar su cuenta."];  
          }
          
        }else{
          $output = ["STATUS" => "FAIL", "MSG"=> "<i class=\"material-icons red-text\">error</i> &nbsp; Credenciales incorrectas"];
        }

      }

      


      return json_encode($output);
    }



    





}