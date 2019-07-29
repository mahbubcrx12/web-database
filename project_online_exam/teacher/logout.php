<?php 

define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$clteacher = new teacher();
	Session::checkSession('teacherlogin');

	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::destroy();
		header("Location: ".urlhelper::baseurl()."/home?".base64_encode('action')."=".base64_encode(4));
	}
?>