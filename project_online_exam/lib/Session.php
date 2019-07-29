<?php
class Session{
	 public static function init(){
	 	session_start();
	 }
	 
	 public static function set($key, $val){
	 	$_SESSION[$key] = $val;
	 }

	 public static function get($key){
	 	if (isset($_SESSION[$key])) {
	 		return $_SESSION[$key];
	 	} else {
	 		return false;
	 	}
	 }

	 public static function checkSession($data){
	 	self::init();
		$check = $data."login";
	 	if (self::get($check) == false) {
	 		self::destroy();
	 		return false;
	 	}
		else {
			return true;
		}
	 }
	public static function logout($data){
		$sessionid = self::get('sessionid');
		if (self::get($data) == true) {
	 	unlink(session_save_path() . '/sess_' . $sessionid);
	 		
	 	}
	}
	

	 public static function destroy(){
		
	 	session_destroy();
	 	
	 }
}

?>