<?php

Class Service extends Controller{
	public function __construct(){
		parent::__construct();
	}

	public function information($data){
		$data = explode('-', $data);
	
		switch ($data[0]) {
			case 'canton':
				$cantones = $this->model->getAllCantonById($data[1]);
				echo json_encode($cantones);
			break;

			case 'parroquia':
				$cantones = $this->model->getAllParroquiasById($data[1]);
				echo json_encode($cantones);
			break;
			
			default:
			break;
		}
		
		
	}
}

?>