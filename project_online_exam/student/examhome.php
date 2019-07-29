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
			<?php if(isset($_POST['insertquestion'])){
		$optionone=$_POST['optionone'];
		$optiontwo=$_POST['optiontwo'];
		$optionthree=$_POST['optionthree'];
		$answer=$_POST['answer'];
		$question=$_POST['question'];
		if(!empty($optionone)&&!empty($optiontwo)&&!empty('optionthree')&&!empty('answer')&&!empty($question)){
			$que = $tea->insert('question_info',$_POST);
			echo "please provide next question";
		}
		else{
			echo "please fill all";
		}
			}
		?>
	
	
          <form class="well form-horizontal" action=" " method="post"  id="<form class="well form-horizontal" action=" " method="post"  id="contact_form"  style="width: 100%;">
		 
<input type="hidden"  value="<?php if(isset($_POST['examreg'])){echo $_POST['id'];}
else{
	echo $_POST['tId'];
}?>" name="tId">

<fieldset>

<!-- Form Name -->
<legend>Exam Registration</legend>

<!-- Text input-->

 <div class="form-group">
  <label class="col-md-4 control-label">Question</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <textarea name="question" value=""  class="form-control"  type="text" ></textarea>
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>
<div>Select your Answr option please or Defult Answer 
<div class="form-group">
  <label class="col-md-4 control-label">Answer </label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        
  <input type="radio"  id="one">1 <input name="answer" type="text" id="onetext"><br>
  <input type="radio"  id="two">2 <input type="text" name="optionone" id="twotext"><br>
  <input type="radio"  id="three">3 <input type="text" name="optiontwo" id="threetext"><br>
  <input type="radio"  id="four">4 <input type="text" name="optionthree" id="fourtext"><br>
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	</div>
  </div><!-- <span class="error"></span> -->
</div>
<div class="form-group">
  <label class="col-md-4 control-label">Question Hints</label>  
<div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <textarea name="qHints"   class="form-control"  type="text" ></textarea>
    <div class="alert alert-danger slastresult-display-error" style="display: none"></div>
	<div class=""> Optional</div>
	</div>
  </div>
  </div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">

      <input type="submit" name="insertquestion" class="btn btn-primary" value="Next">


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