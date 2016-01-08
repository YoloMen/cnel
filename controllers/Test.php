<?php

Class Test extends Controller 
{
   function __construct() {
       parent::__construct();
   } 
   
   public function vista() {
       
      $result= $this->model->tipo_sangre();
     
      //var_dump($result);
   }
   
   public function consulta() {
       
      $result= $this->model->tipo_sangre();
     
      var_dump($result);
   }
}