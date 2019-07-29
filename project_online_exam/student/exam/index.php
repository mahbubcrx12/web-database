<?php 
define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$loader = new Loader();
	
	$exam = "exam";
	$exa = new exam();
	$checklogin = Session::checkSession($exam);
	$now = time();
	if(($checklogin == true) && $now<Session::get('expire')  ){
	
	 include PATH.'/student/inc/header.php';
	
	?>
	<section id="main">
		<div class="container">
			<div class="row">
	
	<?php
	
	echo Session::get('topicarr');
			include PATH.'/student/exam/examhome.php'; 
		
		
		 

 ?>
 	</div>
		</div>
	</section>
 
 <?php


 
	}
	else{
		header("Location: /project_online_exam/home?".base64_encode('action')."=".base64_encode(2));
	}
	
 ?>