
<?php 
	$shows ="";
	$test =array();
	$tea = new Teacher();
	$shows = $tea->selectuniqe('teacher_choicecourse_info',array('*'),'tid',Session::get('teacherid'));
	$fileid = "";
	
	
	
	if(isset($_POST['select'])){
		//$update = $admin->update('uploader_info',$_POST,'id',$_POST['id']);
		$showsfile =$tea->selectall('course_info',array('*'));
		print_r ($shows);
	}
	if(isset($_POST['add'])){
		foreach($_POST['filename'] as $item){
		$t = $tea->insertstudentcoursedetails($_SESSION["teacherid"],$item);
		}
	}

	

?>
 





<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">Course Selection</div><!-- <form action=" " method="post" style="float:right;">type: 
<select name="folder" onchange="form.submit()">
      <option value="" >Please select Status</option>
	  <?php //foreach($showing as $row){
		  ?>
      <option value="<?php //echo $row['folder_name']; ?>"><?php// echo $row['folder_name']; ?></option>
      <?//php }?>
      
    </select></form>-->
	<form action="" method="post" >
	<input type="submit" class="btn pull-right btn-info" value="choice course" name="select">
	</form></div>
<?php if($shows !==false){?>
<table class="table table-bordered">
<thead>
<tr>
<th>
Id
</th>
<th>
Course Name
</th>

<th>
Edit
</th>
</tr>
</thead>

<tbody>
<?php foreach($shows as $row){
	$test[] = $row['courseid'];?>
<tr>
<td>
<?php echo $row['id'];?>
</td>
<td>
<span><?php echo $tea->coursename($row['courseid'])?></span>
</td>

<td>
<form action="" method="post">

<input type="hidden" value="<?php echo $row['id'];?>" name="id">
<?php if($row['status']==0){
	?>
	<button class="glyphicon glyphicon-remove" id="submit" name="active" type="sumbit">Inactive</button>
	<?php
} else{
	?>
	<a href="<?php echo urlhelper::baseurl();?>/teacher/index?<?php echo base64_encode('action');?>=<?php echo base64_encode('20');?>&id=<?php echo $row['courseid']; ?>" class="glyphicon glyphicon-remove">active</a>
	<?php
}?>

 <!--<button id="submit" name="delete" type="sumbit" class="btn btn-primary btn-block btn-lg">Delete <i class="ion-android-arrow-forward"></i></button>-->
</form>
</td>
</tr>
<?php }?>
</tbody>

</table>

<?php }
else {
	echo "NO Data Found";
}
?>

    
    <div class="col-md-12" >
	
	<form action="" method="post">
	
	<input type="hidden" value="<?php echo $fileid;?>" name="id">
	<?php if(!empty($showsfile)){
		
	
	foreach($showsfile as $row){
		if(empty($test)){
			?>
			<div class="col-md-2 inputGroupContainer">
    <div class="input-group">
   <input name="filename[]" class="form-control"  type="checkbox" Value="<?php echo $row['id'];?>" > <?php echo $row['cName'];?>
	
  </div>
</div><?php
		}
		else if(!in_array($row['id'],$test)){?>
      <div class="col-md-2 inputGroupContainer">
    <div class="input-group">
   <input name="filename[]" class="form-control"  type="checkbox" Value="<?php echo $row['id'];?>" > <?php echo $row['cName'];?>
	
  </div>
</div>
		<?php }
		
		}?>
		</div>
	<div class="col-md-12">
	<input type="submit" value="submit" name="add">
	</form>
	</div>
		<?php
	}?>
	

</div>
<!---end -->


