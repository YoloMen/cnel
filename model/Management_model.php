<?php

Class Management_model extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function setConcurso($CONCURSO_DATOS) {

        $cabecera_concurso = $CONCURSO_DATOS['SSP_CONCURSO'];


        $result = $this->db->select('CON_CODI', 'SSP_CONCURSO', "CON_CODI = " . $cabecera_concurso['CON_CODI'], PDO::FETCH_NUM);

        if (sizeof($result) > 0)
            return $data = ["Mensaje" => "Ingreso Incorrecto. El concurso " . $cabecera_concurso['CON_CODI'] . " ya existe"];
        else
            $this->db->insert('SSP_CONCURSO', $CONCURSO_DATOS['SSP_CONCURSO']);

        $result1 = $this->db->select('CON_ID', 'SSP_CONCURSO', "CON_CODI = " . $cabecera_concurso['CON_CODI'], PDO::FETCH_NUM);
        if (sizeof($result1) > 0)
            return $data = ["Mensaje" => "Ingreso Correctamente", "Concurso_" => $result1[0][0]];
    }

    //Inserta las fases al concurso
    public function setBaseConcurso($base_concurso) {

           // var_dump($base_concurso);
        $check = $this->db->check('*', 'SSP_BASE_CONCURSO', "CON_ID = " . $base_concurso['CON_ID'] . " AND FMO_ID=" . $base_concurso['FMO_ID']);
        if (!$check)
            {
               //SELECCIONAMOS EL TIPO DE FASE --MERITO OPOSICION -- DE  LA FASE A INSERTAR
            $F = $this->db->select("FMO_TFAS", 'SSP_FASE_MO ', "FMO_ID = " . $base_concurso['FMO_ID'], PDO::FETCH_NUM);
            $T_FASE=$F[0][0];

            ($T_FASE =='M' ? $TIPO_FASE='CON_VALM' : $TIPO_FASE='CON_VALO'); //
            
            //REVISAMOS EL PUNTAJE MAXIMO PARA EL TIPO DE FASE SELECCIONADO
            $C = $this->db->select($TIPO_FASE, 'SSP_CONCURSO ', "CON_ID = " . $base_concurso['CON_ID'], PDO::FETCH_NUM);
              
                $pMAX= $C[0][0];

                //Revisamos que no sobrepase la puntuación asignada a la cabecera de concurso
                $S = $this->db->select('SUM(BCO_VALO)', 'SSP_BASE_CONCURSO CB , SSP_FASE_MO F ', "CB.FMO_ID= F.FMO_ID AND CB.CON_ID = " . $base_concurso['CON_ID']." AND F.FMO_TFAS= '$T_FASE' ", PDO::FETCH_NUM);
                $BCO_VALO_=str_replace("'",' ',$base_concurso['BCO_VALO']);
               
                if (sizeof($S ) > 0)   
                 
                   $SUMA=intval($S[0][0])+intval($BCO_VALO_);

                
                else
                   $SUMA=intval($BCO_VALO_);
                    
                
                if($SUMA>$pMAX)
                {
                   return $data = ["Mensaje" => "Sobrepasa el puntaje permitido"];
                }else
                {
                   $this->db->insert('SSP_BASE_CONCURSO', $base_concurso);
                    return $data = ["Mensaje" => "Ingreso Correctamente2"];
                }
                         
            }else
            return $data = ["Mensaje" => "Ingreso Incorrecto registro existente.!"];
            
    }

    //Elimina las fases un concurso
    public function delete_FConcurso($DATOS) {
        return $this->db->delete('SSP_BASE_CONCURSO',"CON_ID = " . $DATOS['CON_ID'] . " AND FMO_ID=" . $DATOS['FMO_ID']);
    }

    //Consulta todos los departamentos
    public function getallDepartamentos($PTR_ESTA = "H") {
        return $this->db->select('PTR_ID, PTR_NOMB ,PTR_PADR , PTR_ESTA', 'SSP_PUESTO_TRABAJO', "PTR_TIPO = 'D' AND PTR_ESTA IN ('$PTR_ESTA')", PDO::FETCH_NUM);
    }

    //Consulta un departamento por ID
    public function getDepartamentos($PTR_DATOS) {


        $result = $this->db->select('PTR_ID, PTR_NOMB ,PTR_PADR , PTR_ESTA', 'SSP_PUESTO_TRABAJO', "PTR_ID=" . $PTR_DATOS['PTR_ID'], PDO::FETCH_NUM);

        if (sizeof($result) > 0)
            $data = ["Mensaje" => "" . $result[0][1] . " Encontrado",
                "Departamento" => $result[0]];
        else
            $data = ["Mensaje" => "No encontrado"];

        return $data;
    }

    //Ingreso de un departamento
    public function insertDepartamento($PTR_DATOS) {

        $result = $this->db->select('PTR_NOMB', 'SSP_PUESTO_TRABAJO', "PTR_NOMB = " . $PTR_DATOS['PTR_NOMB'], PDO::FETCH_NUM);

        if (sizeof($result) > 0)
            return $data = ["Mensaje" => "Ingreso Incorrecto. El departamento " . $PTR_DATOS['PTR_NOMB'] . " ya existe"];
        else
            $this->db->insert('SSP_PUESTO_TRABAJO', $PTR_DATOS);
        return $data = ["Mensaje" => "Ingreso Correctamente"];
    }

    //Ingreso de una fase
    public function insertFase($FMO_DATOS) {

        $result = $this->db->select('PTR_NOMB', 'SSP_FASE_MO', "FMO_NOMB LIKE " . $FMO_DATOS['FMO_NOMB'], PDO::FETCH_NUM);

        if (sizeof($result) > 0)
            return $data = ["Mensaje" => "Ingreso Incorrecto. La fase " . $FMO_DATOS['FMO_NOMB'] . " ya existe"];
        else
            $this->db->insert('SSP_FASE_MO', $FMO_DATOS);

        return $data = ["Mensaje" => "Ingreso Correctamente"];
    }

    //OBTENER LAS FASES DE UN CONCURSO
    public function getall_faseconcurso($DATOS) {
        return $this->db->select('*', 'SSP_BASE_CONCURSO b, SSP_FASE_MO f', 'f.FMO_ID= b.FMO_ID AND CON_ID=' . $DATOS['CON_ID'], PDO::FETCH_NUM);
    }

    //OBTENER LAS FASES 
    public function getallFase($FMO_DATOS) {
        return $this->db->select('*', 'SSP_FASE_MO', 'FMO_TDES=' . $FMO_DATOS['FMO_TDES'], PDO::FETCH_NUM);
    }

    //UPDATE de un departamento
    public function updateDepartamento($PTR_DATOS) {


        $this->db->update('SSP_PUESTO_TRABAJO', $PTR_DATOS, "PTR_ID=" . $PTR_DATOS['PTR_ID']);
        return $data = ["Mensaje" => "uPDATE Correctamente"];
    }

    //Consulta los cargos de un departamento
    public function getallCargos($PTR_DATOS) {
        return $this->db->select('PTR_ID, PTR_NOMB ,PTR_PADR , PTR_ESTA', 'SSP_PUESTO_TRABAJO', "PTR_TIPO = 'P' AND PTR_PADR=" . $PTR_DATOS['PTR_ID'], PDO::FETCH_NUM);
    }

    //Consulta un puesto por ID
    public function getPuestos($PTR_ID) {
        return $this->db->select('PTR_ID, PTR_NOMB ,PTR_PADR , PTR_ESTA', 'SSP_PUESTO_TRABAJO', "PTR_TIPO = 'P' AND PTR_ID='$PTR_ID'", PDO::FETCH_NUM);
    }

    public function updatePersonalInformation($data, $id) {
        return $this->db->update('SSP_ASPIRANTE', $data, 'ASP_ID = ' . $id, 'ASP_FMOD = null() ', true);
    }

}
