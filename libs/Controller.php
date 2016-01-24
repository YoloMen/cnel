<?php

Class Controller{

	public function __construct(){
		Session::init();
		$this->view = new View();
		$this->loadModel();

	}

	public function loadModel(){
		$model = get_class($this)."_model";		
		$path  = "model/".$model.".php";

		if(file_exists($path)){
			require $path;
			$this->model = new $model();
		}
	}

	public function castModel($Controller){
		$model = $Controller."_model";		
		$path  = "model/".$model.".php";

		if(file_exists($path)){
			require $path;
			$this->Cmodel = new $model();
		}
	}		


}

?>