<?php

include_once (PATH.'/lib/Database.php');
 class Validate{
  private $_passed = false,
			$_errors = array(),
			$db = null;
  public function __construct(){
       $this->db = new Database();
	   
  }
  public function check ($source, $items = array())
	  {
		  foreach($items as $item => $rules){
		  foreach($rules as $rule => $rule_value){
		  
		  $value = trim($source[$item]);
			if($rule === 'required'&& empty($value)){
				$this->addError($item,"{$item} is required");
			}
			else if(!empty($value)){
				switch($rule){
					case 'min':
					if((strlen($value) < $rule_value)){
					$this->addError($item,"{$item} must be a minimum of {$rule_value} charter");	
					}
					break;
					case 'max':
					if((strlen($value) > $rule_value)){
					$this->addError($item,"{$item} must be a Miximum of {$rule_value} charter");	
					}
					break;
					case 'int':
					if(!ctype_digit($value)){
					$this->addError($item,"{$item} must be a Number");	
					}
					break;
					case 'matches':
					if($value !=$source[$rule_value]){
					$this->addError($item,"{$rule_value} must  Match item {$item}");	
					}
					break;
					case 'unique':
					$value = mysqli_real_escape_string($this->db->link, $value);
					$query = "SELECT * FROM $rule_value WHERE  $item = '$value'";
					$result = $this->db->select($query);
					if($result != false){
					$this->addError($item,"{$item} already exit");	
					}
					break;
				}
				
			}
		  
		  }
		  }
		  if(empty($this->_errors)){
			  $this->_passed = true;
		  }
		  return $this;
	  }
	  private function addError($name,$error){
		  $this->_errors["error_".$name] = $error;
	  }
	  public function errors(){
		  
		  return $this->_errors;
	  }
	  public function passed(){
		  
		  return $this->_passed ;
	  }
  }
?>