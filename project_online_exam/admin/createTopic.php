<?php 

$abc="";
  $admin = new Admin();
    if (isset($_POST['coursetopic'])) {
  
      $abc= $admin->courseAdd($_POST);
  }
  
  

?>
<div class="col-md-9" style="padding-left:20px;">
<?php
	
	if($abc==1){
		echo "success";
	}
?>
<div>
<?if(!empty()){?>
<table>
<thead>
<tr>
<th>
Topic Name
</th>
<th>
Marks 
</th>
<th>
Total Exam
</th>
</tr>
</thead>
<tbody>
<td>
</td>
<td>
</td>
<td>
</td>
</tbody>
</table>
<?php }
else {
	echo "NO Data Found"?>
	<button>Add Topic</button>
	<?php
}?>

</div>
<div>
<form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<fieldset>

<!-- Form Name -->
<legend>Course</legend>

<!-- Text input-->

<div class="form-group">

  
  <label class="col-md-4 control-label">Course Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="ctName" id="ctName" onkeyup="ajaxnew('cName')" placeholder="Your Name" class="form-control"  type="text" value="<?php if(isset($_POST['sname'])){echo $_POST['sname'];} ?>">
    <div class="alert alert-danger sname-display-error" style="display: none"></div>
	<?php if(!empty($form_error['error_sname'])){ ?>
		<div class="alert alert-danger sname-display-error" style="display: block"><?php echo $form_error['error_sname']; ?></div><?php }?>
	</div>
  </div><!-- <span class="error"></span> -->
</div>


 <input  name="cId" id="cId" onkeyup="" placeholder="Your Name" class="form-control"  type="text">

 <!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Course Details</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <textarea name="ctDetails" placeholder="E-Mail Address" class="form-control"  type="text"></textarea>
    <div class="alert alert-danger email-display-error" style="display: none"></div>
	</div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Marks</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="marks" placeholder="Your Last Education Result!" class="form-control"  type="number">
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Question</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="numberQuestion" placeholder="Your Last Education Result!" class="form-control"  type="text">
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Duration</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
  <input name="examDuration" placeholder="##" class="form-control" type="number">
   <div class="alert alert-danger sphone-display-error" style="display: none"></div>
    </div>
  </div><!-- <span class="error"></span> -->
</div>


<!-- Select Basic -->  
<div class="form-group"> 
  <label class="col-md-4 control-label">Status</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
		
    <select name="status" class="form-control selectpicker" >
      <option value="" >Please select Status</option>
      <option value="0">Published</option>
      <option value="1">Unpublished</option>
      
    </select>
	<div class="alert alert-danger slastedu-display-error" style="display: none"></div>
  </div>
</div>
</div>



<!-- Success message -->
	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" name="coursetopic" class="btn btn-primary" value="Send">
</div>
</div>
</fieldset>
</form>
</div>
</div>