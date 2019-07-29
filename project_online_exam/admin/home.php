<?php define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");
spl_autoload_register(function($class_name){
	include PATH.'/classes/'.$class_name.'.php';
});
$loader = new Loader();
$admin = new Admin();
$adminname = 'admin';
$checklogin = Session::checkSession($adminname);
if($checklogin == true){
	include PATH.'/admin/inc/header.php';
	?>
	<section id="main">
		<div class="container">
			<div class="row">
	<?php
	include PATH.'/admin/inc/leftMenu.php';
if(isset($_GET[base64_encode('action')])){
	
		$file = base64_decode($_GET[base64_encode('action')]);
		$result = $loader->select($file);
		foreach($result as $row){
			include PATH.'/admin/'.$row['file_name'].'.php'; 
		}
		}
		else{
			include PATH.'/admin/homeContent.php';
		}
		?>
		
			</div>
		</div>
	</section>
		<?php
		 include PATH.'/admin/inc/footer.html';
		
	
}
	else{
include PATH.'/admin/login.php'; 

	}
 
?>