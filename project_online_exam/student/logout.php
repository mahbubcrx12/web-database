<?php 

	define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});

	include_once ($filepath.'/../lib/Session.php');
	
	Session::checkSession('studentlogin');

	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::logout('studentlogin');
		header("Location:".urlhelper::baseurl()."/home?".base64_encode('action')."=".base64_encode(2));
	}
?>