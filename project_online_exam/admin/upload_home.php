
<?php 
	
	
	$shows =$admin->selectall('uploader_info',array('*'));
	$showing = $admin->shownotduplicate('uploader_info',array('filetype'));
	
	if(isset($_POST['update'])){
		$update = $admin->update('uploader_info',$_POST,'id',$_POST['id']);
		$shows =$admin->selectall('file_info',array('*'));
	}
	if(isset($_POST['filetype'])){
		$shows = $admin->singleshow('uploader_info',array('*'),'filetype',$_POST['filetype']);
	}

?>
 

<div id="test" style="display:none">text</div>



<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">File informatiom details</div> <form action=" " method="post" style="float:right;">Select: 
<select name="filetype" onchange="form.submit()">
      <option value="" >Please select Status</option>
	  <?php foreach($showing as $row){?>
      <option value="<?php echo $row['filetype']; ?>"><?php echo $row['filetype']; ?></option>
      <?php }?>
      
    </select></form></div>
<div>
<table class="table table-bordered">
<thead>
<tr>
<th>
Id
</th>
<th>
File Name 
</th>
<th>
Company Name
</th>
<th>
Type
</th>
<th>
File Type
</th>
<th>
Payment Status
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
<a href="<?php echo urlhelper::baseurl();?>/admin/home?<?php echo base64_encode('action');?>=<?php echo base64_encode('15');?>&id=<?php echo $row['id']; ?>"><?php echo $row['Filename'];?></a>
</td>
<td>
<?php echo $row['companyname'];?>
</td>
<td>
<?php if($row['type']==0){
	echo "Slider";
}
else{
	echo "AD";
}?>
</td>
<td>
<?php echo $row['filetype'];?>
</td>
<td>
<?php if($row['paidstatus']==0){
	echo "FREE";
}
else{
	echo "PAID";
}
?>
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
<a href="<?php echo urlhelper::baseurl();?>/admin/home?<?php echo base64_encode('action');?>=<?php echo base64_encode('14');?>"><button>Add</button></a>

<?php
if(isset($_POST['reading'])){
	
	$reads = $admin->selectuniqe('uploader_info',array('*'),'id',$_POST['id']); 

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
       <div class="form-group" >
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
       <div class="form-group" >
  <label class="col-md-4 control-label">File Type</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
   <input name="filetype" class="form-control"  type="text" Value="<?php echo $read['filetype'];?>" disabled > 
	
  </div>
</div>

</div>
<!-- Text input-->
       <div class="form-group" >
  <label class="col-md-4 control-label">Company Name</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="companyname" placeholder="Company Name" class="form-control" value="<?php echo $read['companyname'];?>" type="text">
    
	</div>
  </div>
</div>



<div class="form-group" > 
  <label class="col-md-4 control-label">Paid Status</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>

    <select name="paidstatus" class="form-control selectpicker"  >
      <option value="" >Please select file type</option>
	  <?php if ($read['paidstatus'] == 0){?>
      <option  selected="
		 selected" value="0">Free</option>
      <option   value="1">paid</option>
	  <?php }else{
		  ?>
		  <option   value="0">Free</option>
      <option selected="
		 selected"  value="1">paid</option>
	  <?php }?>
	  
	 
   
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
   