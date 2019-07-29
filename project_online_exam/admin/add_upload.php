
<?php 
if(isset($_POST['INSERT'])){
	
	$insert = $admin->uploadFile('Filename',$_POST);
}
?>
<div class="col-md-9" style="padding-left:20px;">
<div class="title">Upload File </div>
<div>
<form class="well form-horizontal" action=" " method="post"  enctype="multipart/form-data" id="contact_form"  style="width: 100%;">

<fieldset>

<!-- Form Name -->
<legend>Upload</legend>

<!-- Select Basic -->  
<div class="form-group"> 
  <label class="col-md-4 control-label">Status</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
		
    <select name="type" class="form-control selectpicker" id="filetype" >
      <option value="" >Please select file type</option>
      <option value="0">Slider file</option>
      <option value="1">ad file</option>
      
    </select>
	<div class="alert alert-danger slastedu-display-error" style="display: none"></div>
  </div>

</div>
</div>




 <!-- Text input-->
       <div class="form-group" id="fileuload">
  <label class="col-md-4 control-label">File upload</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="Filename" placeholder="E-Mail Address" class="form-control"  type="file">
    <div class="alert alert-danger email-display-error" style="display: none"></div>
	</div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group" id="choicefiletype">
  <label class="col-md-4 control-label">File Type</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
   <input name="filetype" class="form-control"  type="radio" Value="img" checked> IMAGE<br>
	<input name="filetype" class="form-control filead"  type="radio" Value="html"> Html <br>
	<input name="filetype" class="form-control filead"  type="radio" Value="js"> Java script
	</div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group" id="companyname">
  <label class="col-md-4 control-label">Company Name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="companyname" placeholder="Company Name" class="form-control" value="" type="text">
    
	</div>
  </div>
</div>



<div class="form-group" id="paidstatus"> 
  <label class="col-md-4 control-label">Paid Status</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
		
    <select name="paidstatus" class="form-control selectpicker"  >
      <option value="" >Please select file type</option>
      <option value="0">Free</option>
      <option value="1">paid</option>
      
    </select>
	
  </div>

</div>
</div>






<!-- Success message -->
	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="INSERT" class="btn btn-primary" value="Update">


</div>
</div>

</fieldset>
</form>
</div>
</div>