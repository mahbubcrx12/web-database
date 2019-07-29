
<?php 
 $read = $stu->selectuniqe('exam_infor',array('*'),'sid',$_SESSION['studentid']);
 if(isset($_POST['login'])){
	 $exam = new exam();
	 
	 $check = $exam->checkexam($_POST);
	 echo "test";
 }
?>

<div class="col-md-9" style="padding-left:20px;">
<div class="title"> <div style="float:left;">Course Selection</div>
	<form action="" method="post" >
	<input type="submit" value="choice course" name="select">
	</form></div>
<?php if($read !==false){?>
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
<?php foreach($read as $row){
	;?>
<tr>
<td>
<?php echo $row['id'];?>
</td>
<td>
<a href="<?php echo urlhelper::baseurl();?>/student/index?<?php echo base64_encode('action');?>=<?php echo base64_encode('18');?>&id=<?php echo $row['courseid']; ?>"><?php echo $row['topic_id'];?></a>
</td>

<td>
<form action="" method="post">

<input type="hidden" value="<?php echo $row['id'];?>" name="id">
 <button id="submit" name="examlogin" type="sumbit" class="btn btn-primary btn-block btn-lg">GO <i class="ion-android-arrow-forward"></i></button>
</form>
</td>
</tr>
<?php }?>
</tbody>

</table>
<?php }
else{
echo "no data ";}?>
</div>
<!-- Modal -->

<?php if(isset($_POST['examlogin'])){ ?>
  <div class="modal fade" id="myModal"  role="dialog">
    <div class="modal-dialog" >
 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="title">Exam login</div>
        </div>
        <div class="modal-body">
		
          <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
		 
<input type="hidden" value="<?php echo $_POST['id'];?>" name="id">



<fieldset>

<!-- Form Name -->
<legend>Exam login</legend>

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-4 control-label">Code</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input name="code" value=""  class="form-control"  type="text" >
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="login" class="btn btn-primary" value="Login">


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
