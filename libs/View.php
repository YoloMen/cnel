<?php

Class View {
	public $link;
	public function render($controller, $view){
		$controller = get_class($controller);
		// view/User/index.php
		require './views/'.$controller.'/'.$view.'.php';
	}
       
}

?>