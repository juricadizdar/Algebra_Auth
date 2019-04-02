<?php 

class Validation
{
	private $passed = false;
	private $errors = array();
	
	private $db = null;
	
	public function __construct()
	{
		$this->db=DB::getInstance();
	}
	
	// Add error to array
	private function addError($field, $error)
	{
		$this->errors[$field] = $error;
	}
	
	// Check fields
	public function check($items=array())
	{
		if(!empty($items)){
			foreach($items as $field=>$rules){
				foreach($rules as $rule=>$ruleValue){
					// Get value from field
					$value = trim(Request::getPost($field));
					
					if($rule === 'required' && empty($value)){
						$this->addError($field, "Field {$field} is required.");
					} else if(!empty($value)){
						
						switch($rule){
							case 'min':
								(strlen($value) < $ruleValue) ? $this->addError($field, "Field {$field} must have minimum {$ruleValue} characters.") : false; 
								break;
							case 'max':
								(strlen($value) > $ruleValue) ? $this->addError($field, "Field {$field} must have maximum {$ruleValue} characters.") : false;
								break;
							case 'match':
								($value != Request::getPost($ruleValue)) ? $this->addError($field, "{$field} must match {$ruleValue}."): false;
								break;
							case 'unique':
								$user = $this->db->get('id', $ruleValue, array($field, '=', $value));
								($user->countRow()) ? $this->addError($field, "{$field} username already exists."): false;
								break;
						}
					}
					
				}
			}
						
		}
		
		if(empty($this->errors)){
			$this->passed = true;
		}
		return $this;
	}
	
	// Get all errors
	public function getErrors()
	{
		return $this->errors;
	}
	
	// Get error for field
	public function hasError($field)
	{
		if(isset($this->errors[$field])){
			return $this->errors[$field];
		}
		return false;
	}
	
	// Get property passed
	public function getPassed()
	{
		return $this->passed;
	}
}
















