<?php

Class Session {
	public static function init(){
		@session_start();
	}

	public static function destroy(){
		session_destroy();
	}

	public static function getValue ($key){
		if(!isset($_SESSION[$key])){
			return false;
		}
		
		return $_SESSION[$key];
	}

	public static function setValue($key, $val){
		$_SESSION[$key] = $val;
	}

	public static function unsetValue($key){
		if(isset($_SESSION[$key])){
			unset($_SESSION[$key]);
		}
	}

	public function exist(){
		if(sizeof($_SESSION) > 0 ){
			return true;
		}else{
			return false;
		}
	}
}


?>