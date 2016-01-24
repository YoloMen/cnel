<?php

Class Management extends Controller {

    public function __construct() {

        parent:: __construct();
        //$this->view->render($this, 'index');
    }
//________________________VISTAS RENDERIZADAS___________________________//
    //Cargamos la vista index del usuario
    public function index() {
        $this->view->render($this, 'index');
    }
    //Cargamos la vista gestion_aspirante
    public function gestion_aspirante() {

        $this->view->render($this, 'gestion_aspirante');
    }
    //Cargamos vista de concursos
    public function concursos() {
        $this->view->DATA=$this->model->getallConcurso();
        $this->view->render($this, 'concursos');
    }
    //Cargamos vista de creacion de concurso
    public function creaconcurso() {
        $this->view->data = $this->get_allDepartamentos();
        if(isset($_POST['IDCON_']))
        { 
            $datoConid=['CON_ID' => "'" . $_POST["IDCON_"] . "'"];
            $this->view->DATA = $this->model->get_concurso($_POST['IDCON_']);
            $this->view->DATA += ['fasesConcurso' => $this->model->getall_faseconcurso($datoConid)];    
        }
        $this->view->render($this, 'creaconcurso');
    }
     //Cargamos vista de concursos por reclutar 
    public function reclutamiento() {
        $this->view->data=$this->model->getallConcurso("CON_ESTA='I'"); //Devuelve concursos inicializados
        $this->view->render($this, 'reclutamiento');
    }
    //Cargamos vista de reclutamiento de personal
    public function reclutar() {
        if(isset($_POST['IDCON_']))
        { 
          $this->castModel('Aspirante');
             $this->view->data =$this->datos_concurso($_POST['IDCON_']);
            $this->view->data += ['Instruccion' => $this->Cmodel->getEducationLevel()];
            $this->view->data += ['AreaEstudio' => $this->Cmodel->getStudyArea()];
            $this->view->data += ['Experiencia' => $this->Cmodel->getWorkArea()];
            $this->view->data += ['Discapacidad' => $this->Cmodel->getDisability()];
            $this->view->data += ['Aspirantes' => $this->model->getAspirantesbyApro('S')];
            $this->view->data += ['AspirantesConcurso' => $this->model->getAspirantesbyCONID($_POST['IDCON_'])];
            $this->view->render($this, 'reclutar');
        }
    }
     //Cargamos vista de concursos por calificar
    public function calificaciones() {
        $this->view->DATA=$this->model->getallConcurso("CON_ESTA='P'"); //Devuelve concursos inicializados
        $this->view->render($this, 'calificaciones');
    }
    //Cargamos vista de calificacion del personal
    public function calificar() {
        if(isset($_POST['IDCON__']))
        { 
            echo $_POST['IDCON__'];
            $this->view->data =$this->datos_concurso($_POST['IDCON__']);
            $this->view->render($this, 'calificar');
        }

    }
//______________________________________________________________________//
    //Obtenemos los datos y fases de un concurso en base a su ID
    public function datos_concurso($CON_ID) {
            $datoConid=['CON_ID' => "'" . $CON_ID . "'"];
            $DATA = $this->model->get_concurso($CON_ID);
            $DATA += ['fasesConcurso' => $this->model->getall_faseconcurso($datoConid)];    

            return $DATA;
    }

    //Cargamos la vista concurso_aspirante
    public function concurso_aspirante() {
       
        $this->view->render($this, 'concurso_aspirante');
    }
    

    //Cargamos la vista index del usuario
    public function calendario() {
        $this->view->DATA=$this->model->getallConcurso();
        $this->view->render($this, 'calendario');
    }


    //Cargamos la vista login del usuario
    public function login() {
        $this->view->render($this, 'login');
    }

    //_______________CARGAMOS LOS DEPARTAMENTOS_______________//
    private function getDepartamentos_() {
        
    }

    //__________________________________________________________________//
    
    //___________Eliminamos el registro en SSP_FASE_CONCURSO_______________//
    public function delete_faseConcurso() {

        if (!empty($_POST["CONID"]) && isset($_POST["CONID"])) {
            $DATA = [

                "CON_ID" => "'" . $_POST["CONID"] . "'",
                "FMO_ID" => "'" . $_POST["FASE"] . "'"
            ];
        echo json_encode($this->model->delete_FConcurso($DATA));
        }
    }

   
    //__________________________________________________________________//
    //___________Creamos el registro en SSP_FASE_MO_______________//
    public function crea_fase() {

        $data = [

            "FMO_NOMB" => "'" . $this->Mayus($_POST["IFNOMB"]) . "'",
            "FMO_TFAS" => "'" . $_POST["IFTFAS"] . "'",
            "FMO_TDES" => "'" . $_POST["IFTDES"] . "'"
        ];


        echo json_encode($this->model->insertFase($data));
    }

    public function getall_fase() {
        $data = ["FMO_TDES" => "'" . $_POST["TDES"] . "'"];

        echo json_encode($this->model->getallFase($data));
    }

    //__________________________________________________________________//
    //_______________Buscamos el registro en SSP_BASE_CONCURSO_______________//
    public function getall_fase_concurso() {



        if (!empty($_POST["CONID"]) && isset($_POST["CONID"])) {
            $DATA = [

                "CON_ID" => "'" . $_POST["CONID"] . "'"
            ];


            echo json_encode($this->model->getall_faseconcurso($DATA));
        } else
            echo "Hola2";
    }

    //_______________Creamos el registro en SSP_BASE_CONCURSO_______________//
    public function insert_base_concurso() {



        if (!empty($_POST["CONID"]) && isset($_POST["CONID"]) && !empty($_POST["CFASE"]) && isset($_POST["CFASE"]) && !empty($_POST["BFINI"]) && isset($_POST["BFINI"]) && !empty($_POST["BFFIN"]) && isset($_POST["BFFIN"]) && !empty($_POST["BVALO"]) && isset($_POST["BVALO"])) {
            $base_concurso = [
                "FMO_ID" => "'" . $_POST["CFASE"] . "'",
                "BCO_FFIN" => "'" . $_POST["BFFIN"] . "'",
                "BCO_FINI" => "'" . $_POST["BFINI"] . "'",
                "CON_ID" => "'" . $_POST["CONID"] . "'",
                "BCO_VALO" => "'" . $_POST["BVALO"] . "'"
            ];


            echo json_encode($this->model->setBaseConcurso($base_concurso));
        } else
            echo "Hola2";
    }

    //__________________________________________________________________//
    //_______________Creamos el registro en SSP_CONCURSO_______________//
    public function insert_concurso() {



        if (!empty($_POST["CODI"]) && isset($_POST["CODI"]) && !empty($_POST["NOMB"]) 
            && isset($_POST["NOMB"]) && !empty($_POST["NVAC"]) && isset($_POST["NVAC"])
             && !empty($_POST["VALO"]) && isset($_POST["VALO"]) && !empty($_POST["VALM"])
              && isset($_POST["VALM"]) && !empty($_POST["CARGO"]) && ($_POST["CARGO"] != 'NULL')
               && isset($_POST["CARGO"]) && !empty($_POST["DESC"]) && isset($_POST["DESC"])
                && !empty($_POST["CFINI"]) && isset($_POST["CFINI"]) && !empty($_POST["CFFIN"]) && isset($_POST["CFFIN"])) {
            $cabecera_concurso = [
                "CON_NOMB" => "'" . $this->Mayus($_POST["NOMB"]) . "'",
                "CON_DESC" => "'" . $_POST["DESC"] . "'",
                "CON_VALM" => "'" . $_POST["VALM"] . "'",
                "CON_VALO" => "'" . $_POST["VALO"] . "'",
                "CON_CODI" => "'" . $_POST["CODI"] . "'",
                "PTR_ID" => "'" . $_POST["CARGO"] . "'",
                "CON_NVAC" => "'" . $_POST["NVAC"] . "'",
                "CON_FINI" => "'" . $_POST["CFINI"] . "'",
                "CON_FFIN" => "'" . $_POST["CFFIN"] . "'",
                "CON_ESTA" => "'C'"
            ];
            $CONCURSO_DATOS = ["SSP_CONCURSO" => $cabecera_concurso];

            echo json_encode($this->model->setConcurso($CONCURSO_DATOS));
        } else
            echo "Hola2";
    }

    //__________________________________________________________________//
    //___________Creamos el registro en SSP_PUESTO_TRABAJO_______________//
    public function crea_departamento() {
        $estado = "D";

        if ($_POST["DESTA"] = "on")
            $estado = "H";

        if (empty($_POST["DPADR"]) || $_POST["DPADR"] == "NULL") {
            $data = [
                "PTR_NOMB" => "'" . $this->Mayus($_POST["DNOMB"]) . "'",
                "PTR_TIPO" => "'" . $_POST["TIPO"] . "'",
                "PTR_ESTA" => "'" . $estado . "'"
            ];
        } else {
            $data = [

                "PTR_NOMB" => "'" . $this->Mayus($_POST["DNOMB"]) . "'",
                "PTR_TIPO" => "'" . $_POST["TIPO"] . "'",
                "PTR_ESTA" => "'" . $estado . "'",
                "PTR_PADR" => "'" . $_POST["DPADR"] . "'"
            ];
        }

        echo json_encode($this->model->insertDepartamento($data));
    }

    //__________________________________________________________________//
    //___________Actualiamos el registro en SSP_PUESTO_TRABAJO_______________//
    public function actualiza_departamento() {
        $estado = "D";

        if ($_POST["DESTA"] = "on")
            $estado = "H";

        if (empty($_POST["DPADR"]) || $_POST["DPADR"] == "NULL") {
            $data = [
                "PTR_NOMB" => "'" . $this->Mayus($_POST["DNOMB"]) . "'",
                "PTR_TIPO" => "'" . $_POST["TIPO"] . "'",
                "PTR_ESTA" => "'" . $estado . "'",
                "PTR_ID" => $_POST["DID"]
            ];
        } else {
            $data = [

                "PTR_NOMB" => "'" . $this->Mayus($_POST["DNOMB"]) . "'",
                "PTR_TIPO" => "'" . $_POST["TIPO"] . "'",
                "PTR_ESTA" => "'" . $estado . "'",
                "PTR_PADR" => "'" . $_POST["DPADR"] . "'",
                "PTR_ID" => $_POST["DID"]
            ];
        }

        echo json_encode($this->model->updateDepartamento($data));
    }

    //__________________________________________________________________//
    //___________Buscamos el registro en SSP_PUESTO_TRABAJO_______________//
    public function busca_departamento() {

        $data = [ "PTR_ID" => "'" . $_POST['PUESTO'] . "'"];
        echo json_encode($this->model->getDepartamentos($data));
    }


    //__________________________________________________________________//
   

    //Cargamos la calendario
    public function fases() {
        $this->view->render($this, 'fases');
    }

   
    //FUNCION QUE OBTIENE TODOS LOS CONCURSOS CREADOS
    public function getall_concursos() {
        echo json_encode($this->model->getallConcurso());
    }

    public function departamentos() {
        $this->view->render($this, 'departamentos');
    }

    
    //Obtiene valores de concurso segun ID
    public function get_concursobyID(){

          if(isset($_POST['IDCON_']))
        { 
            $datoConid=['CON_ID' => "'" . $_POST["IDCON_"] . "'"];
            $DATA = $this->model->get_concurso($_POST['IDCON_']);
            $DATA += ['fasesConcurso' => $this->model->getall_faseconcurso($datoConid)];    
             echo json_encode($DATA);
        }

    }

    //_________________CONTRUCCION DE LA CONDICION FINAL SEGUN LOS FILTROS DEL reclutamiento__
    public function get_aspirantes_reclutar(){

        $TotalWhere = "";

        if(isset($_POST['InstruccionFormal']) && !Empty($_POST['InstruccionFormal'])) //TABLA SSP_TITULO         
        $WhereInstruccionFormal ="SELECT TIT_FK_ASPI FROM SSP_TITULO WHERE " . $this->WhereFilter("TIT_FK_NSTR",$_POST['InstruccionFormal']);

        if(isset($_POST['AreaEstudio']) && !Empty($_POST['AreaEstudio']))   //TABLA SSP_TITULO Y TABLA SSP_CURSO
        $WhereAreaEstudio= "SELECT T.ASPIRANTE FROM (SELECT CUR_FK_ASPI AS ASPIRANTE FROM SSP_CURSO WHERE " . $this->WhereFilter("CUR_FK_AEST",$_POST['AreaEstudio']). ' UNION '.'  SELECT TIT_FK_ASPI AS ASPIRANTE FROM SSP_TITULO  WHERE ' . $this->WhereFilter("TIT_FK_AEST",$_POST['AreaEstudio']).') as T';      


        if(isset($_POST['Experiencia']) && !Empty($_POST['Experiencia']))   //TABLA SSP_experiencia_LABORAL  
        $WhereExperiencia = "SELECT ELA_FK_ASPI FROM SSP_EXPERIENCIA_LABORAL WHERE " . $this->WhereFilter("ELA_FK_ARTR",$_POST['Experiencia']);      

        if(isset($_POST['Discapacidad']) && !Empty($_POST['Discapacidad']))   //TABLA SSP_ASPIRANTE_DISCAPACIDAD  
        $WhereIDiscapacidad= "SELECT ADI_FK_ASID FROM SSP_ASPIRANTE_DISCAPACIDAD WHERE " . $this->WhereFilter("ADI_FK_TIDI",$_POST['Discapacidad']);


        if(isset($WhereInstruccionFormal))
        $TotalWhere.= ' AND ASP_ID in ('.$WhereInstruccionFormal.')';

        if(isset($WhereAreaEstudio))
        $TotalWhere.= ' AND ASP_ID in ('.$WhereAreaEstudio.')';

        if(isset($WhereExperiencia))
        $TotalWhere.= ' AND ASP_ID in ('.$WhereExperiencia.')';

        if(isset($WhereIDiscapacidad))
        $TotalWhere.= ' AND ASP_ID in ('.$WhereIDiscapacidad.')';


        
        echo json_encode(['Aspirantes' => $this->model->filter_getAspirantes($TotalWhere)]);

    } 

      // FUNCION QUE ARMA EL WHERE PARA CADA OPCIÓN ESTABLECIDA COMO FILTRO 
    private function WhereFilter($campo,$arrayV,$condicion=" OR "){
         $Where="";
        foreach ($arrayV as $key => $value) {
          $Where.= $campo." = ".$value['value'];
          if($key<count($arrayV)-1)
            $Where.=$condicion;
        }
        return $Where;

    }


    //________________
    
    //_INSERTAMOS LOS ASPIRANTES AL CONCURSO
    public function set_aspirantes_concurso() {
        $insertados=0;
        $errores=0;
        
        if(isset($_POST['IDCON_']) && isset($_POST['ASP_SELECTED']))
        {
            $datos=['CON_ID' => $_POST['IDCON_'], 'ASP_ID' =>""];
            foreach ($_POST['ASP_SELECTED'] as $key => $value) {
                $datos['ASP_ID']=$value['value'];
              
                if($this->model->setConcursotAspirantes($datos))
                   $insertados++;
                   else
                   $errores++;     
            }
            $strMensaje= "".$insertados.' Registros Insertados - '.$errores.' Errores';
            $datos= ["Mensaje" => $strMensaje];
         echo json_encode($datos);
        }
        
       // return ['departamentos' => $this->model->getallDepartamentos()];
    }

    public function JSONgetAspirantesbyCONID(){
        if(isset($_POST['IDCON_']))
        echo json_encode(['Mensaje' => 'Registros Obtenidos', 'AspirantesConcurso' => $this->model->getAspirantesbyCONID($_POST['IDCON_'])]);
        else
         echo json_encode(['Mensaje' => 'Concurso no encontrado']);
    }



    //___________obtenemos todos los departamentos en SSP_PUESTO_TRABAJO_______________//
    public function get_allDepartamentos() {
        return ['departamentos' => $this->model->getallDepartamentos()];
    }

    public function get_allDepartamentosjson() {
        echo json_encode(['departamentos' => $this->model->getallDepartamentos()]);
    }

    public function get_allCargos() {
        $data = [ "PTR_ID" => "'" . $_POST['PUESTO'] . "'"];
        echo json_encode(['puestos' => $this->model->getallCargos($data)]);
    }

  

    private function Mayus($variable) {
        $variable = strtr(strtoupper($variable), "àèìòùáéíóúçñäëïöü", "ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        return $variable;
    }

}
