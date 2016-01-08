<?php

Class Index extends Controller{

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->view->render($this, 'index');
	}
        
        

}

?>