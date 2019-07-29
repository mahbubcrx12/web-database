<?php 
define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$loader = new Loader();
	
	$teacher = "teacher";
	$clteacher = new teacher();
	$checklogin = Session::checkSession($teacher);
	if($checklogin == true){
	if(isset($_POST["submit"])) {

	echo $clstudent->checkuploadfile('fileToUpload',$_SESSION["User"]);
			
	}
	 
	include PATH.'/teacher/inc/header.php';
	?>
	<section id="main">
		<div class="container">
			<div class="row">
	
	<?php
	include PATH.'/teacher/inc/leftMenu.php';
if(isset($_GET[base64_encode('action')])){
		$file = base64_decode($_GET[base64_encode('action')]);
		$result = $loader->select($file);
		foreach($result as $row){
			include PATH.'/teacher/'.$row['file_name'].'.php'; 
		}
		
	}	 
else{
include PATH.'/teacher/inc/homeContent.php'; 
}
 ?>
 	</div>
		</div>
	</section>
 
 <?php

 include PATH.'/teacher/inc/footer.php'; 
 
	}
	else{
		header("Location: ".urlhelper::baseurl()."/home?".base64_encode('action')."=".base64_encode(4));
	}
	
 ?>