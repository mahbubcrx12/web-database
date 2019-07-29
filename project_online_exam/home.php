<?php

define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$loader = new Loader();
include PATH.'/inc/header.php';
if(isset($_GET[base64_encode('action')])){
		$file = base64_decode($_GET[base64_encode('action')]);
		$result = $loader->select($file);
		foreach($result as $row){
			include PATH.'/'.$row['file_name'].'.php'; 
		}
		
	}
	else{
include PATH.'/inc/silder.php'; 
include PATH.'/inc/ad.php'; 
	}
include PATH.'/inc/footer.php'; 
?>