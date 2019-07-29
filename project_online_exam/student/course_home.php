
<?php 
	$shows ="";
	$test =array();
	$stu = new student();

	$shows = $stu->selectuniqe('selectcourse_infom',array('*'),'sid',$_SESSION["studentid"]);
	//echo $_SESSION["studentid"];
	$fileid = "";
	
	
	
	if(isset($_POST['select'])){
		//$update = $admin->update('uploader_info',$_POST,'id',$_POST['id']);
		$showsfile =$stu->selectall('course_info',array('*'));
		
	}
	if(isset($_POST['add'])){
		foreach($_POST['filename'] as $item){
		$t = $stu->insertstudentcoursedetails($_SESSION["studentid"],$item);
		}
	}

	

?>
 





<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">Course Selection</div>
	<form action="" method="post" >
	<input type="submit" value="choice course" name="select">
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
<a href="<?php echo urlhelper::baseurl();?>/student/index?<?php echo base64_encode('action');?>=<?php echo base64_encode('18');?>&id=<?php echo $row['courseid']; ?>"><?php echo $stu->coursename($row['courseid'])?></a>
</td>

<td>
<form action="" method="post">

<input type="hidden" value="<?php echo $row['id'];?>" name="id">
 <button id="submit" name="delete" type="sumbit" class="btn btn-primary btn-block btn-lg">Delete <i class="ion-android-arrow-forward"></i></button>
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


