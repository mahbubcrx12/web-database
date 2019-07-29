
<?php 
	
	
	


	$gettopic =$stu->selectuniqe('createtopic',array('*'),'cid',$_GET['id']);
		
	if(isset($_POST['registration'])){
		
		$exam =$stu->examreg($_POST);
		$_POST = NULL;
	}
 $code =captcha::generate_code(10);

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
	</div>
<?php if($gettopic !==false){?>
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
Course Details
</th>
<th>
Course Marks
</th>
<th>
Questions
</th>
<th>
Time
</th>
<th>
Apply
</th>
</tr>
</thead>

<tbody>
<?php foreach($gettopic as $row){
	?>
<tr>
<td>
<?php echo $row['id'];?>
</td>
<td>
<?php echo $row['ctName'];?>
</td>
<td>
<?php echo $row['ctDetails'];?>
</td>
<td>
<?php echo $row['marks'];?>
</td>
<td>
<?php echo $row['numberQuestion'];?>
</td>
<td>
<?php echo $row['examDuration'];?> Minute
</td>
<td>
<form action="" method="post">
<input type="hidden" value="<?php  echo $row['numberQuestion'];?>" name="numberQuestion">
<input type="hidden" value="<?php echo $row['examDuration'];?>" name="examDuration">
<input type="hidden" value="<?php echo $row['id'];?>" name="id">
 <button id="submit" name="examreg" type="sumbit" class="btn btn-primary btn-block btn-lg">Apply for exam <i class="ion-android-arrow-forward"></i></button>
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

    
   

</div>
<?php
if(isset($_POST['examreg'])){
	
	 

?>

</div>
<!-- Modal -->


  <div class="modal fade" id="myModal"  role="dialog">
    <div class="modal-dialog" >
 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="title">Exam Registration</div>
        </div>
        <div class="modal-body">
		
          <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
		 
<input type="hidden" value="<?php echo $_POST['id'];?>" name="topic_id">
<input type="hidden" value="<?php  echo $_POST['numberQuestion'];?>" name="number_question">
<input type="hidden" value="<?php echo $_POST['examDuration'];?>" name="duration">
<input type="hidden" value="<?php echo $_SESSION["studentid"];?>" name="sid">
<input type="hidden" value="<?php echo $code;?>" name="exam_code">
<fieldset>

<!-- Form Name -->
<legend>Exam Registration</legend>

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-4 control-label">Date</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="date" value=""  class="form-control"  type="date" >
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="registration" class="btn btn-primary" value="Update">


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


	
	 
	echo "<script>";
	echo "$(document).ready(function(){
$('#myModal').modal('show');

});";
echo "</script>";

		

}?>
<!---end -->


