<?php 

	$abc="";
	$cid=0;
	$admin = new Admin();
	$update ="";
	
	$sCourses = $admin->selectCourse();
	
    if (isset($_POST['regcourse'])) {
     $cid = $_POST['cid'];
      $abc= $admin->showTopic($_POST);
	
  }
  else if(isset($_POST['delete'])){
	 
	  $delete = $admin->topicdelete($_POST);
	   $abc= $admin->showTopic($_POST);
  }
  
  
  

?>
<div class="col-md-9" style="padding-left:20px;">

<form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<fieldset>

<!-- Form Name -->
<legend>Course</legend>



<!-- Select Basic -->  
<div class="form-group"> 
  <label class="col-md-4 control-label">Status</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
		
    <select name="cid" class="form-control selectpicker" >
	<option value="" >Please select Status</option>
	<?php  
    foreach($sCourses as $sCourse){?>	
      <option value="<?php echo $sCourse['id']?>"><?php echo $sCourse['cName']?> </option>
	  
      <?php
	}
	  ?>
    </select>
	<div class="alert alert-danger slastedu-display-error" style="display: none"></div>
  </div>
</div>
</div>





<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <input type="submit" name="regcourse" class="btn btn-primary" value="Send">
</div>
</div>
</fieldset>
</form>
<?php 

if(!empty($abc['result'])){
	
	?>
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
Exam
</th>
<th>
other
</td>
</tr>
</thead>

<tbody>
<?php foreach ($abc['result'] as $row){?>
<tr>
<td>
<?php echo $row['ctName'];?>
</td>
<td>
<?php echo $row['marks'];?>
</td>
<td>
<?php echo $row['examDuration'];?>
</td>
<td>
<form action=" " method="post">
<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
<input type="hidden" value="<?php echo $row['cid']; ?>" name="cid">
<input type="Submit" value="edit" name="edit">/<input type="Submit" value="delete" name="delete">
</form>
</td>
</tr>
<?php }?>
</tbody>

</table>
	<?php
	
}else{


echo "NO Data Found";?>
	<button>Add Topic</button>
<?php }?>



</div>
<?php 
    if (isset($_POST['coursetopic'])) {
     
      $addtopic= $admin->createTopic($_POST);
	  if($addtopic == 1){
		  echo "Successfully inser";
	  }
	  else{
		 echo $addtopic; 
	  }
	
  }
 
if(isset($abc['mark'])&&$abc['mark'] !=0 or isset($_POST['edit'] )){
	if(isset($_POST['edit'])){
	  $update = $admin->selectuniqe('createTopic',array('*'),'id',$_POST['id']);
	  $abc= $admin->showTopic($_POST);
	  foreach($update as $row1){
	}?>
	<input type="hidden" value="<?php echo $_POST['cid'];?>" name="cid">
  <input type="hidden" value="<?php echo $_POST['id'];?>" name="id">
	<?php
}
else{?>
	<input type="hidden" value="<?php echo $cid;?>" name="cid">
<?php
}
  
	
?>
<div>
<form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<input type="hidden" value="<?php echo $cid;?>" name="couseid">
<fieldset>

<!-- Form Name -->
<legend>Course</legend>

<!-- Text input-->

<div class="form-group">

  
  <label class="col-md-4 control-label">Course Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="ctName" id="ctName" value="<?php if(isset($row1['ctName'])){echo $row1['ctName']; }?>"  placeholder="Your Name" class="form-control"  type="text" >
    <div class="alert alert-danger sname-display-error" style="display: none"></div>
	
	</div>
  </div><!-- <span class="error"></span> -->
</div>


 <!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Course Details</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <textarea name="ctDetails" placeholder="E-Mail Address" class="form-control"  type="text"><?php if(isset($row1['ctDetails'])){echo $row1['ctDetails']; }?></textarea>
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
  <input name="marks" value="<?php if(isset($row1['marks'])){echo $row1['marks']; }else{echo $abc['mark'];}?>"  class="form-control"  type="number" min="1" max="<?php echo $abc['mark'];?>">
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
  <input name="numberQuestion" placeholder="Your Last Education Result!" class="form-control" value="<?php if(isset($row1['numberQuestion'])){echo $row1['numberQuestion']; }?>" type="text">
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
<input name="examDuration" placeholder="##" value="<?php if(isset($row1['examDuration'])){echo $row1['examDuration']; }; ?>" class="form-control" type="number">
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
     <?php if (isset($_POST['edit'])){?>
      <input type="submit" name="coursetopicup" class="btn btn-primary" value="Update">
    <?php }else{ ?>

  <input type="submit" name="coursetopic" class="btn btn-primary" value="Send">
   <?php } ?>
</div>
</div>

</fieldset>
</form>
</div>
<?php 
 }


 
 
	

echo "topic cover";
?>
</div>