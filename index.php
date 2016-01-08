<?php
	
	require_once "config.php";
        

	// Controller/Method/Parms
	$url = isset($_GET["url"])  ? $_GET["url"] : "Acceso/login";
	//$url = !empty($_GET["url"])  ? $_GET["url"] : "index/index";
        ///echo $url;
	$url = explode("/", $url);
        

	if (isset($url[0])) {$controller = $url[0];}
	if (isset($url[1])) {if ($url[1] != '') { $method = $url[1];}}
	if (isset($url[2])) {if ($url[2] != '') { $params = $url[2];}}


	spl_autoload_register(function($class){

		if (file_exists(LIBS.$class.".php")){
			require_once LIBS.$class.".php";
		}

	});

	$path = "./controllers/".$controller.".php";
	if (file_exists($path)) {
		require_once $path;
		$controller = new $controller();

			if(isset($method)){
				if(method_exists($controller, $method)){
					if (isset($params)) {
					$controller->{$method}($params);
				}else{
					$controller->{$method}();
				}
			}
		}else{
			//$controller->index();
		}
	}else{
		echo 'Error';
	}

      
?>

