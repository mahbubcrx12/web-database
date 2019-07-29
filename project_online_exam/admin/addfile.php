
<div class="col-md-9" style="padding-left:20px;">
<div class="title"> Add File informatiom </div>
<div>
<div class="successmsg"> <?php if (isset($_POST['fileinsert'])) {
    
      $abc= $admin->fileinsert($_POST);
	echo $abc;
  }?></div>
<form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">

<fieldset>

<!-- Form Name -->
<legend>Course</legend>

<!-- Text input-->

<div class="form-group">

  
  <label class="col-md-4 control-label">File Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="file_name"    placeholder="File name" class="form-control"  type="text" >
    <div class="alert alert-danger sname-display-error" style="display: none"></div>
	
	</div>
  </div><!-- <span class="error"></span> -->
</div>


 <!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Folder name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <textarea name="folder_name" placeholder="folder name" class="form-control"  type="text"></textarea>
    <div class="alert alert-danger email-display-error" style="display: none"></div>
	</div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">meta keyword</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="meta_keyword" value=""  class="form-control"  type="text" >
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Meta description</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="meta_description" placeholder="Meta Description!" class="form-control" value="" type="text">
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Text input-->
       
<div class="form-group">
  <label class="col-md-4 control-label">Title</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
<input name="meta_title" placeholder="##" value="" class="form-control" type="text">
   <div class="alert alert-danger sphone-display-error" style="display: none"></div>
    </div>
  </div><!-- <span class="error"></span> -->
</div>


 


</div>
</div>



<!-- Success message -->
	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> please add your new file infomrtion or update it.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="fileinsert" class="btn btn-primary" value="Insert">


</div>
</div>

</fieldset>
</form>
</div>
</div>