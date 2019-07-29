<?php
include_once (PATH.'/lib/Database.php');
include_once (PATH.'/helpers/Uploader.php');
include_once (PATH.'/lib/Session.php');
include_once (PATH.'/helpers/validate.php');
include_once (PATH.'/classes/databasequerybiulder.php');
class exam {
use databasequerybiulder;
private $rendomquestion =array() ;
private $runingquestion=array();
public function __construct(){
		$this->db = new Database();
	}
function checkexam($data){
	$id =$data['id'];
	$exam_code = $data['code'];
	$sql = "SELECT * FROM exam_infor WHERE id ='$id' AND exam_code = '$exam_code' AND status =0";
		$result = $this->db->select($sql);
		if($result != false){
				$value = $result->fetch_assoc();
			
				Session::set("examlogin", true);
				Session::set("topicid",$value['topic_id']);
				Session::set("examid",$value['id']);
				Session::set("start",time());
				Session::set("expire",Session::get('start')+($value['duration'])*60);
				$URL =urlhelper::baseurl()."/student/exam/index.php";
				echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
				//header("Location:".urlhelper::baseurl()."/student/exam/index.php");
				
			}else{
			  echo "All ready exam";
			}
		
}
function setsession(){
	
}
function providequestion(){
	$topic_id = Session::get('topicid');
	
$sql = "SELECT qId FROM question_info WHERE topic_id ='$topic_id'";
$result = $this->db->select($sql);
while ($rows = $result->fetch_row()) {
	foreach($rows as $row){
    $this->totalquestion[] = $row;
	}
}
$qestiondetails =  $this->randerid($this->totalquestion);
return $qestiondetails;
} 
private function randerid($question){
	$topicdetails = $this->selectuniqe('createtopic',array('numberQuestion','examDuration'),'id',$_SESSION['topicid']);
	$value = $topicdetails ->fetch_assoc();
	$total = 5;
	$numberquestion = $value['numberQuestion'];
	echo $numberquestion;
	
	$i = 0;
	
	$test = array();

	$questionexam = explode(",",$_SESSION['topicarr']);
	echo "<br>".count($questionexam);
	if(count($questionexam)<=$numberquestion-1){
	while (true) {
    $number = rand(0, $total);



    if (in_array($number,  $questionexam)) {    // start over if already taken
        continue;
    } else {
        $i++;
		if(isset($_SESSION['topicarr'])){
			Session::set("topicarr",$_SESSION['topicarr'].",".$number);
			$qestiondetails = $this->selectuniqe('question_info',array('question','optionone','optiontwo','optionthree','answer'),'qId',$question[$number]);
		}
		else{
		Session::set("topicarr",$number);
		$qestiondetails = $this->selectuniqe('question_info',array('question','optionone','optiontwo','optionthree','answer'),'qId',$question[$number]);
		}
                    // add to history
    }
  
    if ($i == 1) break;             // opt out at 4 questions asked
}

return $qestiondetails;
	}
	else{
		echo "exam";
	}
	
}










}
?>