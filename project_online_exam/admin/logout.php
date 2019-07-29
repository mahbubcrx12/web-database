<?php 

	$filepath = realpath(dirname(__FILE__));

	include_once ($filepath.'/../lib/Session.php');
	Session::checkSession('adminlogin');

	if(isset($_GET['action']) && $_GET['action'] == "logout"){
		Session::destroy();
		header("Location:home.php");
	}
?>