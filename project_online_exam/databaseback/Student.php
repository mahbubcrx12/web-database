<?php


include_once (PATH.'/lib/Database.php');
include_once (PATH.'/helpers/Uploader.php');
include_once (PATH.'/lib/Session.php');
include_once (PATH.'/helpers/validate.php');

include_once (PATH.'/classes/Email.php');
//Class: Student
class Student{
	
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->ud = new Uploader();
		
		
	}



	public function insertStudent($data){


			 $validate = new Validate();
			 $validation = $validate->check($data, 
			 array(
			  'sname' =>array(
			  'required'=>true,
			  'min' => 2,
			  'max' => 20,
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
			  'min' => 2,
			  'max' => 50,
			  'unique' => 'student_info'
			  
			  )
			 
			 ));

			 if($validate->passed()){
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
			             
						$sql = "INSERT INTO student_info  ( sName, gender, email, mobile, lastEdu, lastEduResult, password, code)
			        VALUES ('".$name."','".$gender."','".$email."','".$phone."','".$lastEdu."','".$lastEduReslt."','".$password."','".$code."')";
						$result = $this->db->insert($sql);
						if ($result==1) {
							$mail = new Send_Email();
							$sender = 'azadmahin9@gmail.com';
							$purpose = 'Email Verification';
							$senderPassword='01981332566';
							$recipient=$email;
							$subject="Registration Confirmation";
							$bodyContent = '<h3>Dear '.$name.',</h3> <br /> Your Confirmation Code is: <b>'.$code.'</b>';

							$mail->send_Email($sender,$purpose,$senderPassword,$recipient,$subject,$bodyContent);
						}
						return $result;
					}
			 }
			 else{
			 
			$he = $validate->errors();
			return $he;
			/*foreach($he as $he => $hevalue){
				echo $he."<br>";
				echo $hevalue."<br>";
			}*/
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
			$query = "SELECT * FROM student_info WHERE BINARY email = '$semail' AND password = '$spassword'";
				
			$result = $this->db->select($query);
			
			if($result != false){
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("studentlogin", true);
				Session::set("User",$value['email']);
				Session::set("sName",$value['sName']);
				Session::set("sessionid",session_id());
				
				header("Location: ".urlhelper::baseurl()."/student/index.php");
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
}
?>