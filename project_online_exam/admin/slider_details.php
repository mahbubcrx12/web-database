
<?php 
	$shows ="";
	$test ="";
	$showing = $admin->shownotduplicate('file_info',array('folder_name'));
	$fileid = "";
	
	
	
	if(isset($_POST['update'])){
		$update = $admin->update('uploader_info',$_POST,'id',$_POST['id']);
		$shows =$admin->selectall('file_info',array('*'));
	}
	if(isset($_POST['folder'])){
		$showsfile = $admin->singleshow('file_info',array('id','file_name'),'folder_name',$_POST['folder']);
	}
	if(isset($_POST['add'])){
		foreach($_POST['filename'] as $item){
		$t = $admin->insertslide_info($_POST['id'],$item);
}
	}
	$shows =$admin->selectuniqe('slide_in',array('*'),'slide_id',$_GET['id']);
	$imgs =$admin->selectuniqe('uploader_info',array('Filename','id'),'id',$_GET['id']);
	

?>
 





<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">File informatiom details</div> <form action=" " method="post" style="float:right;">Select: 
<select name="folder" onchange="form.submit()">
      <option value="" >Please select Status</option>
	  <?php foreach($showing as $row){
		  ?>
      <option value="<?php echo $row['folder_name']; ?>"><?php echo $row['folder_name']; ?></option>
      <?php }?>
      
    </select></form>
      
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
Edit
</th>
</tr>
</thead>

<tbody>
<?php if(!empty($shows)){foreach($shows as $row){
	$test[] = $row['file_id'];?>
<tr>
<td>
<?php echo $row['id'];?>
</td>
<td>
<a href=""><?php echo $row['file_id'];?></a>
</td>

<td>
<form action="" method="post">

<input type="hidden" value="<?php echo $row['id'];?>" name="id">
 <button id="submit" name="delete" type="sumbit" class="btn btn-primary btn-block btn-lg">Delete <i class="ion-android-arrow-forward"></i></button>
</form>
</td>
</tr>
<?php }?>
<?php }
else {
	echo "NO Data Found";
}
?>
</tbody>

</table>

<a href="<?php echo urlhelper::baseurl();?>/admin/home?<?php echo base64_encode('action');?>=<?php echo base64_encode('14');?>"><button>Add</button></a>
<div style= "width:50%;height:200px;"><img src="<?php echo urlhelper::baseurl();?>/img/slider/<?php foreach($imgs as $img){echo $img['Filename']; 
$fileid = $img['id']; }?>"></div>

    <div class="row" >
	<form action="" method="post">
	
	<input type="hidden" value="<?php echo $fileid;?>" name="id">
	<?php if(!empty($showsfile)){
		
	
	foreach($showsfile as $row){
		if(empty($test)){
			?>
			<div class="col-md-2 inputGroupContainer">
    <div class="input-group">
   <input name="filename[]" class="form-control"  type="checkbox" Value="<?php echo $row['id'];?>" > <?php echo $row['file_name'];?>
	
  </div>
</div><?php
		}
		else if(!in_array($row['id'],$test)){?>
      <div class="col-md-2 inputGroupContainer">
    <div class="input-group">
   <input name="filename[]" class="form-control"  type="checkbox" Value="<?php echo $row['id'];?>" > <?php echo $row['file_name'];?>
	
  </div>
</div>
		<?php }
		
		}
	}?>
	<input type="submit" value="submit" name="add">
	</form>
</div>

<!---end -->


