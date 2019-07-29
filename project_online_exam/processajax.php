<?php

define("PATH",$_SERVER['DOCUMENT_ROOT']."/project_online_exam");

	include_once (PATH.'/helpers/validate.php');
 $validate = new Validate();





 if(isset($_POST["sname"])){
 $validation = $validate->check($_POST, 
 array(
  'sname' =>array(
  'required'=>true,
  'min' => 2,
  'max' => 20,
)));
$name = $validate->errors();
echo json_encode($name);
 }
  else if(isset($_POST["email"])){
 $validation = $validate->check($_POST, 
 array(
  'email' => array(
  'required'=>true,
  'min' => 6,
  'max' => 50,
  'email'=>'email',
  'unique' => 'student_info',
  
)));
$name = $validate->errors();
echo json_encode($name);
  }
  
  










?>