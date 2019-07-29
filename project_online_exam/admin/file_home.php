
<?php 
	
	
	$shows =$admin->selectall('file_info',array('*'));
	$showing = $admin->shownotduplicate('file_info',array('folder_name'));
	
	if(isset($_POST['update'])){
		$update = $admin->update('file_info',$_POST,'id',$_POST['id']);
		$shows =$admin->selectall('file_info',array('*'));
	}
	if(isset($_POST['folder'])){
		$shows = $admin->singleshow('file_info',array('*'),'folder_name',$_POST['folder']);
	}

?>
 

<div id="test" style="display:none">text</div>



<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">File informatiom details</div> <form action=" " method="post" style="float:right;">Select: 
<select name="folder" onchange="form.submit()">
      <option value="" >Please select Status</option>
	  <?php foreach($showing as $row){?>
      <option value="<?php echo $row['folder_name']; ?>"><?php echo $row['folder_name']; ?></option>
      <?php }?>
      
    </select></form></div>
<div>
<table class="table table-bordered" >
<thead>
<tr>
<th>
Id
</th>
<th>
File Name 
</th>
<th>
Folder Name
</th>
<th>
Meta keywords 
</th>
<th>
Meta Title
</th>
<th>
Title
</th>
<th>
Edit
</th>
</tr>
</thead>

<tbody>
<?php foreach($shows as $row){?>
<tr>
<td>
<?php echo $row['id'];?>
</td>
<td>
<?php echo $row['file_name'];?>
</td>
<td>
<?php echo $row['folder_name'];?>
</td>
<td>
<?php echo $row['meta_keyword'];?>
</td>
<td>
<?php echo $row['meta_description'];?>
</td>
<td>
<?php echo $row['meta_title'];?>
</td>
<td>
<form action="" method="post">
<input type="hidden" value="<?php echo $row['id'];?>" name="id">
 <button id="submit" name="reading" type="sumbit" class="btn btn-primary btn-block btn-lg">update <i class="ion-android-arrow-forward"></i></button>
</form>
</td>
</tr>
<?php }?>
</tbody>

</table>
<a href="<?php echo urlhelper::baseurl();?>/admin/home?<?php echo base64_encode('action');?>=<?php echo base64_encode('11');?>"><button>Add</button></a>

<?php
if(isset($_POST['reading'])){
	
	$reads = $admin->selectuniqe('file_info',array('*'),'id',$_POST['id']); 

?>

</div>
<!-- Modal -->


  <div class="modal fade" id="myModal"  role="dialog">
    <div class="modal-dialog" >
 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="title">Update file information</div>
        </div>
        <div class="modal-body">
		<?php  foreach($reads as $read) {  ?>
          <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
<input type="hidden" value="<?php echo $read['id'];?>" name="id">
<fieldset>

<!-- Form Name -->
<legend>Course</legend>

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-4 control-label">meta keyword</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="meta_keyword" value="<?php echo $read['meta_keyword'];?>"  class="form-control"  type="text" >
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
  <input name="meta_description" placeholder="Meta Description!" class="form-control" value="<?php echo $read['meta_description'];?>" type="text">
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
<input name="meta_title" placeholder="##" value="<?php echo $read['meta_title'];?>"
class="form-control" type="text">
   <div class="alert alert-danger sphone-display-error" style="display: none"></div>
    </div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Success message -->
	
<div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="update" class="btn btn-primary" value="Update">


</div>
</div>

</fieldset>
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <?php 

}
	
	 
	echo "<script>";
	echo "$(document).ready(function(){
$('#myModal').modal('show');

});";
echo "</script>";

		

}?>

   