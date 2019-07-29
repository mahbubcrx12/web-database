<?php
//url helper
include_once (PATH.'/config/urlconfig.php');
class urlhelper{
	public static $host = FD_HOST;
	public static $re  = RE_HOST;
	
	public static function baseurl(){
		return self::$re.$_SERVER['HTTP_HOST']."/".self::$host;
		
	}
	
}

?>