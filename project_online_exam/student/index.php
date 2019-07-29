<?php 
define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$loader = new Loader();
	
	$student = "student";
	$stu = new student();
	$checklogin = Session::checkSession($student);
	if($checklogin == true){
	if(isset($_POST["submit"])) {

	echo $stu->checkuploadfile('fileToUpload',$_SESSION["User"]);
			
	}
	 
	include PATH.'/student/inc/header.php';
	?>
	<section id="main">
		<div class="container">
			<div class="row">
	
	<?php
	include PATH.'/student/inc/leftMenu.php';
if(isset($_GET[base64_encode('action')])){
		$file = base64_decode($_GET[base64_encode('action')]);
		$result = $loader->select($file);
		foreach($result as $row){
			include PATH.'/student/'.$row['file_name'].'.php'; 
		}
		
	}	 
else{
include PATH.'/student/inc/homeContent.html'; 
}
 ?>
 	</div>
		</div>
	</section>
 
 <?php

 include PATH.'/student/inc/footer.html'; 
 
	}
	else{
		header("Location: /project_online_exam/home?".base64_encode('action')."=".base64_encode(2));
	}
	
 ?>