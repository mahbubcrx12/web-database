<?php

include_once (PATH.'/lib/Database.php');
include_once (PATH.'/lib/Session.php');
include_once (PATH.'/helpers/validate.php');
include_once (PATH.'/helpers/Uploader.php');
include_once (PATH.'/classes/databasequerybiulder.php');

//Class: Student
class Teacher{
	use databasequerybiulder;
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->ud = new Uploader();
		$this->vd = new Validate();
	}
	 
public function Validation($source){
	$this->vd->check($source, 
 array(
  'tname' =>array(
  'required'=>true,
  'min' => 2,
  'max' => 20,
  'alphabate'=>'a-zA-Z -',
 
  ),
  'tpassword' => array(
  'required'=>true,
  'min' => 6,
  'max' => 20,
  ),
  'conpassword' => array(
    'required'=>true,
     'matches' => 'tpassword'
  ),
  'email' => array(
  'required'=>true,
  'min' => 6,
  'max' => 50,
  'email'=>'email',
  'unique' => 'teacher_info',
  ),
 
 ));

 if($this->vd->passed()){
	
		return $this->insertTeacher($source);
	
 }
 else{
 
return $this->vd->errors();


 }
	}


	public function insertTeacher($data){

		$name = mysqli_real_escape_string($this->db->link,$data['tname']);
		$password = mysqli_real_escape_string($this->db->link,$data['tpassword']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$gender = mysqli_real_escape_string($this->db->link,$data['tgender']);
		$phone = mysqli_real_escape_string($this->db->link,$data['tphone']);
		$experience = mysqli_real_escape_string($this->db->link,$data['texpe']);
		$lastEdu = mysqli_real_escape_string($this->db->link,$data['tlastedu']);

		

		if(empty($name) || empty($password)||empty($email)||empty($lastEdu)){
			$msg = '<center><span class="error">name & email must not be empty !</span><center>';
			return $msg;
		}else{
			$password = sha1(md5($password));
               /*
			   SELECT 'user' = 'UsEr' // true
				SELECT BINARY 'user' = 'UsEr' // false
			   */
			$sql = "INSERT INTO teacher_info ( tName, gender, email, mobile, lastEdu, experience, password)
        VALUES ('".$name."','".$gender."','".$email."','".$phone."','".$lastEdu."','".$experience."','".$password."')";
			$result = $this->db->insert($sql);
			return $result;
		}
	}
		public function getTeacher($data){

		$email = $data['email'];
		$password = $data['password'];

		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, $password);

		if(empty($email) || empty($password)){
			$msg = '<center><span class="error">Email & Password not empty !</span><center>';
			return $msg;
		}else{

			$password = sha1(md5($password));
			$query = "SELECT * FROM teacher_info WHERE BINARY email = '$email' AND password = '$password' AND status = 1";
				
			$result = $this->db->select($query);
			
			if($result != false){
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("teacherlogin", true);
				Session::set("User",$value['email']);
				Session::set("teacherid",$value['tId']);
				Session::set("sName",$value['tName']);
				Session::set("sessionid",session_id());
				
				header("Location:".urlhelper::baseurl()."/teacher/index.php");
			}else{
				$loginmsg = '<center><span class="error">eamil/Password not match!</span><center>';
				return $loginmsg;
			}
		}
	}
	
	function insertstudentcoursedetails($colum1,$colum2){
			$sql = "INSERT INTO  teacher_choicecourse_info  ( tid,courseid)
        VALUES ('".$colum1."','".$colum2."')";
			$result = $this->db->insert($sql);
			return $result;
		}
		function coursename($data){
			$result = $this->selectuniqe('course_info',array('cName'),'id',$data);
			if($result != false){
			$values= $result->fetch_assoc();
			$value = $values['cName'];
			}
			return $value;
		}
		
	function examreg($data){
	 $result = $this->inserttable('exam_infor',$data);
	 $name = $_SESSION["tName"];
	 $code = $data['exam_code'];
	
	 if($result ==1){
		$mail= new Send_Email;
		$sender = 'jasimpopi03032017@gmail.com';
		$purpose = 'Exam Registration';
		$senderPassword='quitlove';
		$recipient=$_SESSION["User"];
		$subject="Exam Registration Confirmation";
		$bodyContent = '<h3>Dear '.$name.',</h3> <br /> Your Exam Confirmation Code is: <b>'.$code.'</b>
		';

		$mail->usermail($sender,$purpose,$senderPassword,$recipient,$subject,$bodyContent);
	 }
	 return $result;
	 
 }
 function insert($table,$data){
	 $result = $this->inserttable($table,$data);
		return $result;
 }
}
?>