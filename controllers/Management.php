<?php

Class Management extends Controller {

    public function __construct() {
        parent:: __construct();
    }

    //Cargamos la vista index del usuario
    public function index() {

        $this->view->render($this, 'index');
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

    public function concursos() {
        $this->view->DATA=$this->model->getallConcurso();
        $this->view->render($this, 'concursos');
    }
    //FUNCION QUE OBTIENE TODOS LOS CONCURSOS CREADOS
    public function getall_concursos() {
        echo json_encode($this->model->getallConcurso());
    }

    public function departamentos() {
        $this->view->render($this, 'departamentos');
    }

    public function creaconcurso_1() {
        $this->view->data = $this->get_allDepartamentos();
        if(isset($_POST['IDCON_']))
        $this->view->DATA = $this->model->get_concurso($_POST['IDCON_']);    
        $this->view->render($this, 'creaconcurso_1');
    }

    public function cabecera_concurso() {
        $this->view->data = $this->get_allDepartamentos();
        if(isset($_POST['METHOD']))
            echo $_POST['METHOD'];
        $this->view->render($this, 'cabecera_concurso');
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
