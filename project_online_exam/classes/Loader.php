
<?php
//class loader
include_once (PATH.'/lib/Database.php');
include_once (PATH.'/classes/databasequerybiulder.php');
class Loader{
	use databasequerybiulder;
	
	private $db;
	private $fm;
	

	function __construct(){
		$this->db = new Database();
		
		
	}
	public function select($id){
		$query = "SELECT * FROM file_info WHERE BINARY id = '$id'";
		$result = $this->db->select($query);
		if($result != false){
			return $result;
		}
	}
	public function get(){
		
	}
	
	
	}
?>