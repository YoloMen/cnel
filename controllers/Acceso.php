<?php

class Acceso extends Controller{
    
    public function __construct() {
        parent::__construct();
    }
    //Cargamos la vista login
    public function login(){
        $this->view->render($this, 'login');
    }
    //Cargamos la vista registro
    public function registro(){
        $this->view->render($this, 'registro');
    }
  
    //Cargamos la vista registro
    public function renovacion_clave(){
        $this->view->render($this, 'renovacion_clave');
    }
}

