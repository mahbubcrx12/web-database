<!DOCTYPE html>
<?php 

?>
<html lang="en">
  <head>
     <meta charset="utf-8">
	<?php 
		if(isset($_GET[base64_encode('action')])){
		$file = base64_decode($_GET[base64_encode('action')]);
		$fileinfo = $loader->select($file);
		foreach($fileinfo as $row){
			
		
	?>
    <!-- Required meta tags -->
   
	<title><?php echo $row['meta_title'];?></title>
	<meta name="description" content="<?php echo $row['meta_description'];?>">
	<meta name="keywords" content="<?php echo $row['meta_keyword'];?>">
	<?php 
	}
		}
		else{
			$fileinfo = $loader->select(1);
			

	foreach($fileinfo as $row){
			
		
	?>
    <!-- Required meta tags -->
   
	<title><?php echo $row['meta_title'];?></title>
	<meta name="description" content="<?php echo $row['meta_description'];?>">
	<meta name="keywords" content="<?php echo $row['meta_keyword'];?>">
	<?php 
	}
		}
	?>
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo urlhelper::baseurl();?>/css/bootstrap.min.css">
   <!--  <link rel="stylesheet" href="CSS/jquery-ui.css"> -->
  <!--<link rel="stylesheet" type="text/css" href="css/main.css">-->

  <script src="<?php echo urlhelper::baseurl();?>/JS/jquery.js"></script>
  <script src="<?php echo urlhelper::baseurl();?>/JS/bootstrap.min.js"></script>
<!--     <script src="JS/jquery-ui.js"></script> -->
      
  </head>
  <body>
 


     <nav class="navbar-wrapper navbar-inverse navbar-top"  style=" border-radius: none;border:none; font-weight: bold;">
  <div class="container">
    <div class="navbar-header" style="color: black;">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Onlie Exam System</a>
    </div>
   <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home">Home</a></li>
        <li><a href="#">Student Info</a></li>
        <li><a href="#">Privacy</a></li>
        
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="home?<?php echo base64_encode('action');?>=<?php echo base64_encode('3');?>"> Sign Up</a></li>
      <li><a href="home?<?php echo base64_encode('action');?>=<?php echo base64_encode('2');?>"></span> Login</a></li>
	  <li><a href="home?<?php echo base64_encode('action');?>=<?php echo base64_encode('5');?>"> Teacher Sign Up</a></li>
      <li><a href="home?<?php echo base64_encode('action');?>=<?php echo base64_encode('4');?>"></span> Teacher Login</a></li>
     <!-- <a href="index.php"><button class="btn btn-sm btn-success" style="margin-top: 8px;">Registration</button></a>  -->
    </ul>
  </div>
</nav>
