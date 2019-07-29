
<?php 
$student = new Student();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$stu = $student->getStudent($_POST);
	}
?>
<?php 
		if(isset($stu)){
			
			echo $stu;
		
		}
		
	?>
<br><br>
  <div class="container">
    <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<fieldset>

<!-- Form Name -->
<legend>Student Login Form!</legend>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="semail" placeholder="E-Mail Address" class="form-control"  type="text">
    </div>
  </div><!-- <span class="error"><?php echo $emailErr; ?></span> -->
</div>

<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Password</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input name="spassword" placeholder="Password...!" class="form-control" type="password">
    </div>
  </div>
</div>

<!-- Text input-->
       



<!-- Success message -->
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" name="regstudent" class="btn btn-primary" value="Send">
</div>

</fieldset>
</form>
</div><br><br>
