<?php

Class Management extends Controller{
	public function __construct(){
		parent::__construct();
	}

	   //Cargamos la vista index del usuario
        public function index(){
          
        $this->view->render($this, 'index');
        }
        
        //Cargamos la vista login del usuario
        public function login(){
        $this->view->render($this, 'login');
        }

        
        //_______________CARGAMOS LOS DEPARTAMENTOS_______________//
        private function getDepartamentos_(){
       
        
       

        }
        //__________________________________________________________________//


        //___________Creamos el registro en SSP_FASE_MO_______________//
        public function crea_fase(){
        
                $data = [
               
                "FMO_NOMB" => "'".$this->Mayus($_POST["IFNOMB"])."'", 
                "FMO_TFAS" => "'".$_POST["IFTFAS"]."'",  
                "FMO_TDES" => "'".$_POST["IFTDES"]."'"
                

                ];  


        echo json_encode($this->model->insertFase($data));    
        }


         public function getall_fase(){
                echo json_encode($this->model->getallFase());    
        }


        
        //__________________________________________________________________//



        //_______________Creamos el registro en SSP_CONCURSO_______________//
        public function insert_concurso(){
       
        $this->creaconcurso_2();

        }
        //__________________________________________________________________//

         //___________Creamos el registro en SSP_PUESTO_TRABAJO_______________//
        public function crea_departamento(){
        $estado="D";
       
        if($_POST["DESTA"]="on")
            $estado= "H";

        if(empty($_POST["DPADR"]) || $_POST["DPADR"]=="NULL")
            {
              $data = [
                "PTR_NOMB" => "'".$this->Mayus($_POST["DNOMB"])."'", 
                "PTR_TIPO" => "'".$_POST["TIPO"]."'",   
                "PTR_ESTA" => "'".$estado."'"    
                ];  
            }
        else
            {
                $data = [
               
                "PTR_NOMB" => "'".$this->Mayus($_POST["DNOMB"])."'", 
                "PTR_TIPO" => "'".$_POST["TIPO"]."'",  
                "PTR_ESTA" => "'".$estado."'",
                "PTR_PADR" => "'".$_POST["DPADR"]."'"

                ];  


            }
            
        echo json_encode($this->model->insertDepartamento($data));    
       

        }
        //__________________________________________________________________//

        //___________Actualiamos el registro en SSP_PUESTO_TRABAJO_______________//
        public function actualiza_departamento(){
        $estado="D";
       
        if($_POST["DESTA"]="on")
            $estado= "H";

        if(empty($_POST["DPADR"]) || $_POST["DPADR"]=="NULL")
            {
              $data = [
                "PTR_NOMB" => "'".$this->Mayus($_POST["DNOMB"])."'", 
                "PTR_TIPO" => "'".$_POST["TIPO"]."'",   
                "PTR_ESTA" => "'".$estado."'",   
                "PTR_ID" =>$_POST["DID"]
                ];  
            }
        else
            {
                $data = [
               
                "PTR_NOMB" => "'".$this->Mayus($_POST["DNOMB"])."'", 
                "PTR_TIPO" => "'".$_POST["TIPO"]."'",    
                "PTR_ESTA" => "'".$estado."'",
                "PTR_PADR" => "'".$_POST["DPADR"]."'",
                "PTR_ID" =>$_POST["DID"]
                ];  


            }
           
        echo json_encode($this->model->updateDepartamento($data));    
       

        }
        //__________________________________________________________________//

        //___________Buscamos el registro en SSP_PUESTO_TRABAJO_______________//
        public function busca_departamento(){

       $data = [ "PTR_ID" => "'".$_POST['PUESTO']."'"]; 
        echo json_encode($this->model->getDepartamentos($data));    
       

        }
        //__________________________________________________________________//


        //Cargamos la calendario
        public function calendario(){
        $this->view->render($this, 'calendario');
        }
        
        //Cargamos la calendario
        public function fases(){
        $this->view->render($this, 'fases');
        }
        
         public function concursos(){
        $this->view->render($this, 'concursos');
        }

        
        public function departamentos(){
        $this->view->render($this, 'departamentos');
        }
        
        public function creaconcurso_1(){
        $this->view->data=$this->get_allDepartamentos();
        $this->view->render($this, 'creaconcurso_1');
        }

        public function cabecera_concurso(){
        $this->view->data=$this->get_allDepartamentos();
        $this->view->render($this, 'cabecera_concurso');
        }




        //___________obtenemos todos los departamentos en SSP_PUESTO_TRABAJO_______________//
        public function get_allDepartamentos(){
        return ['departamentos' => $this->model->getallDepartamentos()];
        
        }

         public function get_allDepartamentosjson(){
        echo json_encode(['departamentos' => $this->model->getallDepartamentos()]);
        
        }
         public function get_allCargos(){
         $data = [ "PTR_ID" => "'".$_POST['PUESTO']."'"];    
        echo json_encode(     ['puestos' => $this->model->getallCargos($data)]);
        
        }
        
        public function creaconcurso_2(){
        $this->view->render($this, 'creaconcurso_2');
        }
        
        private function Mayus($variable) {
        $variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
        return $variable;
        }
}

