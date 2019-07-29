<?php


include_once (PATH.'/lib/Database.php');
include_once (PATH.'/helpers/Uploader.php');
include_once (PATH.'/lib/Session.php');
include_once (PATH.'/helpers/validate.php');
include_once (PATH.'/classes/databasequerybiulder.php');

//Class: Student
class Student{
	use databasequerybiulder;
	private $db;
	private $fm;
	private $vd;

	function __construct(){
		$this->db = new Database();
		$this->ud = new Uploader();
		$this->vd = new Validate();
		
		
	}
		public function Validation($source){
		$this->vd->check($source, 
 array(
  'sname' =>array(
  'required'=>true,
  'min' => 2,
  'max' => 20,
  'alphabate'=>'a-zA-Z -',
 
  ),
  'spassword' => array(
  'required'=>true,
  'min' => 6,
  'max' => 20,
  ),
  'conpassword' => array(
    'required'=>true,
     'matches' => 'spassword'
  ),
  'email' => array(
  'required'=>true,
  'min' => 6,
  'max' => 50,
  'email'=>'email',
  'unique' => 'student_info',
  ),
 'slastedu' => array(
  'required'=>true,
  ),
 ));

 if($this->vd->passed()){
	
		return $this->insertStudent($source);
	
 }
 else{
 
return $this->vd->errors();


 }
	}


	public function insertStudent($data){

		$name = mysqli_real_escape_string($this->db->link,$data['sname']);
		$password = mysqli_real_escape_string($this->db->link,$data['spassword']);
		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$gender = mysqli_real_escape_string($this->db->link,$data['sgender']);
		$phone = mysqli_real_escape_string($this->db->link,$data['sphone']);
		$lastEdu = mysqli_real_escape_string($this->db->link,$data['slastedu']);
		$lastEduReslt = mysqli_real_escape_string($this->db->link,$data['slastresult']);
		$code = mysqli_real_escape_string($this->db->link,$data['code']);
		

		if(empty($name) || empty($password)||empty($email)||empty($lastEduReslt)){
			$msg = '<center><span class="error">name & email must not be empty !</span><center>';
			return $msg;
		}else{
			$password = sha1(md5($password));
             
			$sql = "INSERT INTO student_info  ( sName, gender, email, mobile, lastEdu, lastEduResult, password,code)
        VALUES ('".$name."','".$gender."','".$email."','".$phone."','".$lastEdu."','".$lastEduReslt."','".$password."','".$code."')";
			$result = $this->db->insert($sql);
				if ($result==1) {
							$mail= new Send_Email;
							$sender = 'jasimpopi03032017@gmail.com';
							$purpose = 'Email Verification';
							$senderPassword='quitlove';
							$recipient=$email;
							$subject="Registration Confirmation";
							$bodyContent = '<h3>Dear '.$name.',</h3> <br /> Your Confirmation Code is: <b>'.$code.'</b>
							<a href="'.urlhelper::baseurl().'?'.base64_encode('action').'='.base64_encode('10').'">Confirmation Link</a>';

							$mail->usermail($sender,$purpose,$senderPassword,$recipient,$subject,$bodyContent);
						}
			return $result;
		}
	}
	//start check email
	public function checkMail($data){
		
		$email = mysqli_real_escape_string($this->db->link,$data['semail']);
		$code = mysqli_real_escape_string($this->db->link,$data['code']);
		
		if(empty($email) && empty($code)){
			$msg = '<center><span class="error">Email & Code not empty !</span><center>';
			return $msg;
		}
		else{
		$check= "UPDATE student_info
				SET status = 1 WHERE email='$email' AND code='$code'";
				
				$result = $this->db->update($check);
				if($result === TRUE){
					header("Location:".urlhelper::baseurl()."/home?".base64_encode('action')."=".base64_encode(2));
				}
				else{
					echo "Code Doesn't Match";
				}
		}
	}
	
	public function getStudent($data){

		$semail = $data['semail'];
		$spassword = $data['spassword'];

		$semail = mysqli_real_escape_string($this->db->link, $semail);
		$spassword = mysqli_real_escape_string($this->db->link, $spassword);

		if(empty($semail) || empty($spassword)){
			$msg = '<center><span class="error">Email & Password not empty !</span><center>';
			return $msg;
		}else{

			$spassword = sha1(md5($spassword));
			$query = "SELECT * FROM student_info WHERE BINARY email = '$semail' AND password = '$spassword' AND status = 1";
				
			$result = $this->db->select($query);
			
			if($result != false){
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("studentlogin", true);
				Session::set("User",$value['email']);
				Session::set("studentid",$value['sId']);
				Session::set("sName",$value['sName']);
				Session::set("sessionid",session_id());
				
				header("Location:".urlhelper::baseurl()."/student/index.php");
			}else{
				$loginmsg = '<center><span class="error">eamil/Password not match!</span><center>';
				return $loginmsg;
			}
		}
	}
	public function checkuploadfile($image,$email){
		$query = "SELECT * FROM student_info WHERE BINARY email = '$email'";
		$result = $this->db->select($query);
		if($result != false){
			foreach($result as $row){
				if(!empty($row['simage'])){
					$imagename = $row['simage'];
					$this->ud->setDir('../img/');
					$this->ud->setDeleteName($imagename);
					$this->ud->deleteUploaded();
					$this->uploadFile($image,$email);
					 return "successfully upload";
					
				}
				else{
					$this->uploadFile($image,$email);
					 return "successfully upload";
				}
				
			}
		}
	}
	public function uploadFile($image,$email){
		
		$this->ud->setDir('../img/');
		$this->ud->setExtensions(array('jpg','jpeg','png','gif'));
		$this->ud->setMaxSize(1);
		$this->ud->setSequence("student");
		

		if($this->ud->uploadFile($image)){
			 $getimage  =   $this->ud->getUploadName();
			// echo $getimage;
	$query = "UPDATE student_info SET simage = '$getimage' WHERE email = '$email'";
	 $this->db->update($query);
	 return "successfully upload";
		} 
else{
    return $this->ud->getMessage(); //get upload error message 
}		
		
   
		
		}
		function insertstudentcoursedetails($colum1,$colum2){
			$sql = "INSERT INTO  selectcourse_infom  ( sid,courseid)
        VALUES ('".$colum1."','".$colum2."')";
			$result = $this->db->insert($sql);
			return $result;
		}
		function coursename($data){
			$value="";
			$result = $this->selectuniqe('course_info',array('cName'),'id',$data);
			if($result != false){
			$values= $result->fetch_assoc();
			$value = $values['cName'];
			}
			return $value;
		}
		 function examreg($data){
	 $result = $this->inserttable('exam_infor',$data);
	 $name = $_SESSION["sName"];
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

}
?>