<?php

include_once (PATH.'/lib/Database.php');
include_once (PATH.'/helpers/Uploader.php');
include_once (PATH.'/lib/Session.php');
include_once (PATH.'/helpers/validate.php');
include_once (PATH.'/classes/databasequerybiulder.php');

//Class: Admin
class Admin{
	use databasequerybiulder;
	
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->ud = new Uploader();
		
	}

	public function getAdminData($data){
		$email ="";
		$password = "";

		$email = mysqli_real_escape_string($this->db->link,$data['email']);
		$password = mysqli_real_escape_string($this->db->link,$data['pasword']);
		
		if(empty($email) || empty($password)){
			$msg = '<center><span class="error">Email & Password not empty !</span><center>';
			return $msg;
		}else{

			$password = sha1(md5($password));
			$query = "SELECT * FROM admin_info WHERE BINARY email = '$email' AND password = '$password'";
				
			$result = $this->db->select($query);
			
			if($result != false){
				$value = $result->fetch_assoc();
				Session::init();
				Session::set("adminlogin", true);
				Session::set("User",$value['email']);
				Session::set("sessionid",session_id());
				
				header("Location:".urlhelper::baseurl()."/admin/home?".base64_encode('action')."=".base64_encode(6));
			}else{
				$loginmsg = '<center><span class="error">eamil/Password not match!</span><center>';
				return $loginmsg;
			}
		}
		

	}
	
	public function courseAdd($data){
		
		if(empty($data['cName']) || empty($data['cDetails'])||empty($data['cMarks'])||empty($data['totalExam'])){
			$msg = '<center><span class="error">All field ar require !</span><center>';
			return $msg;
		}else{
			
			$result = $this->inserttable('course_info',$data);
			return $result;
		}
	}

	
	public function selectCourse(){
		$result = $this->selectall('course_info',array('cName','id','cMarks'));
			return $result;
	}
	public function showTopic($data){
		$total = 0;
		$mark = 0;
		$value =0;
		$resultmarkvalue =0;
		

	$resultmark = $this->selectuniqe('course_info',array('cMarks'),'id',$data['cid']);
	$result = $this->selectuniqe('createtopic',array('*'),'cid',$data['cid']);
	foreach($resultmark as $row){
		 $resultmarkvalue = $row['cMarks'];
	}
	if(empty($result)){
	
		$mark = $resultmarkvalue;
	}
	else{
		
	foreach($result as $row){
		$value = $row['marks'] ;
		$total += $value;
		
	}
	
	
	
		$mark = $resultmarkvalue-$total;
		
	
	}
	return array('result' => $result, 'mark' =>$mark);
		
	}
	
	public function createTopic($data){
		
		$couseid = mysqli_real_escape_string($this->db->link,$data['couseid']);
		$name = mysqli_real_escape_string($this->db->link,$data['ctName']);
		$details = mysqli_real_escape_string($this->db->link,$data['ctDetails']);
		$marks = mysqli_real_escape_string($this->db->link,$data['marks']);
		$Question = mysqli_real_escape_string($this->db->link,$data['numberQuestion']);
		$duration = mysqli_real_escape_string($this->db->link,$data['examDuration']);
		$status = mysqli_real_escape_string($this->db->link,$data['status']);
		


		if(empty($name) || empty($marks)||empty($Question)||empty($duration)){
			$msg = '<center><span class="error">All field ar require !</span><center>';
			return $msg;
		}else{
			
			$sql = "INSERT INTO createtopic  ( cid,ctName, ctDetails, marks, numberQuestion, examDuration, status)
        VALUES ('".$couseid."','".$name."','".$details."','".$marks."','".$Question."','".$duration."','".$status."')";
			$result = $this->db->insert($sql);
			return $result;
		}
	}
	function topicdelete($data)
 {
	 $result = $this->deletecolumuniqe('createtopic','id',$data['id']);
	 
 }
 //add file 
 function fileinsert($data){
	 $result = $this->inserttable('file_info',$data);
	 return $result;
 }
 function update($table,$data,$wherecolums,$wherevalue){
	 array_pop($data);
	 $result = $this->updatetableuniqe($table,$data,$wherecolums,$wherevalue);
	 return $result;
 }
 function singleshow($table,$data,$wherecolums,$wherevalue){
	 $result = $this->selectuniqe($table,$data,$wherecolums,$wherevalue);
	 return $result;
 }
function shownotduplicate($table,$data){
	$colums = implode(",",$data);
		$sql = "SELECT DISTINCT $colums FROM $table";
		$result = $this->db->select($sql);
			return $result;
}
public function uploadFile( $image,$data){
		if($data['type'] == 1){
		$this->ud->setDir(PATH.'/ad/');
		$this->ud->setExtensions(array('html','htm','js'));
		$this->ud->setMaxSize(1);
		$this->ud->setSequence("ad");
		}
		else{
			$this->ud->setDir(PATH.'/img/slider/');
		$this->ud->setExtensions(array('jpg','jpeg','png','gif'));
		$this->ud->setMaxSize(1);
		$this->ud->setSequence("slider");
		}
		
		echo $_FILES[$image]['name'];
		if($this->ud->uploadFile($image)){
			 $getimage  =   $this->ud->getUploadName();
			 $file = array($image=>$getimage);
			 $data= array_merge($file,$data);
	$result = $this->inserttable('uploader_info',$data);
	return $result;
		}  
		
   
		
		}
		function insertslide_info($colum1,$colum2){
			$sql = "INSERT INTO slide_in  ( slide_id,file_id)
        VALUES ('".$colum1."','".$colum2."')";
			$result = $this->db->insert($sql);
			return $result;
		}
		function deletecolum($table,$wherecolums,$wherevalue){
			$this->deletecolumuniqe($table,$wherecolums,$wherevalue);
		}
 
	
}
 

?>