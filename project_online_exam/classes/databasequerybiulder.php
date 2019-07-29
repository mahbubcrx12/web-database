<?php
trait databasequerybiulder
{
	public function selectall($table,$colums){
		$colums = implode(",",$colums);
				$query = "SELECT $colums FROM $table";
		$result = $this->db->select($query);
		return $result;
	}
	public function selectuniqe($table,$colums,$wherecolums,$wherevalue){
			$colums = implode(",",$colums);
				$query = "SELECT $colums FROM $table WHERE $wherecolums ='$wherevalue'";
		$result = $this->db->select($query);
		return $result;
	}
	private function inserttable($table,$data){
		array_pop($data);
		$colums=	array_keys($data); 
		$escaped_values=	array_values($data); 
		$colums = implode(",",$colums);
		$values = array_map('mysql_real_escape_string', array_values($escaped_values));
		 foreach ($values as $idx=>$sdata) $values[$idx] = "'".$sdata."'";
		$values  = implode(", ", $values);
			$sql = "INSERT INTO $table($colums)VALUES ($values)";
			$result = $this->db->insert($sql);
			return $result;
		
	}
	private function updatetableuniqe($table,$data,$wherecolums,$wherevalue){
		
		$query = "UPDATE {$table} SET";
		$comma = " ";
	foreach($data as $key => $val) {
    if( ! empty($val)) {
		
        $query .= $comma . $key . " = '" . mysql_real_escape_string(trim($val)) . "'";
        $comma = ", ";
    }
}



$sql = $query . "WHERE $wherecolums ='$wherevalue'";
$result = $this->db->update($sql);
			return $result;
	}
	private function deletecolumuniqe($table,$wherecolums,$wherevalue){
		
		
		$sql = "DELETE FROM $table WHERE $wherecolums ='$wherevalue'";
		$result = $this->db->delete($sql);
			return $result;
	}
	public function setinselector($table,$colums,$wherecolums,$wherevalue){
		$colums = implode(",",$colums);
		$wherevalue = implode(",",$wherevalue);
		
		$query = "SELECT $colums FROM $table WHERE $wherecolums IN ($wherevalue)";
		$result = $this->db->select($query);
		return $result;
	}
	
}

