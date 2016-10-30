<?php
	$valid = false;
	
if(isset($_POST['submit'])){
	if($_POST['submit']) {
		$messages = array();
		$valid = true;
		$passSet = false;
		foreach($_POST as $key => $value) {
			$validators = explode('-', $key);
			$inputName = explode('_', $validators[0]);
			
			if(in_array('req', $validators)) {
			  		   
				if(empty($value) || $value === "selectreq") {
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " is required!";
					array_push($messages, $reqiuredField );
				}
			}
			
			if(in_array('alpha', $validators)) {
				
				if((!preg_match("/^[A-Za-z ]+$/",$value)) && !empty($value)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " can only be letters!";
					array_push($messages, $reqiuredField );			
				}
			}
			
			if(in_array('alphanum', $validators)) {
				
				if(!preg_match('#^[a-z0-9\x20]+$#i',$value) && !empty($value)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " can have letters and numbers!";
					array_push($messages, $reqiuredField );			
				}
			}
			
			if(in_array('num', $validators)) {
				
				if((!preg_match('/^[0-9]*$/',$value)) && !empty($value)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " is not valid!";
					array_push($messages, $reqiuredField );			
				}
			}
			
			if(in_array('address', $validators)) {
				
				if((!preg_match('#^[a-z0-9\x20]+$#i',$value)) && !empty($value)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " is not valid!";
					array_push($messages, $reqiuredField );			
				}
			}
			
			if(in_array('email', $validators)) {
				
				if(!filter_var($value, FILTER_VALIDATE_EMAIL) && !empty($value)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " is not valid!";
					array_push($messages, $reqiuredField );			
				}
			}
			/*
			if(in_array('Password', $validators) || in_array('Confirm_Password', $validators) ) {
											
				if(in_array('Password', $validators) && $passSet = false){
					$passwordOne = $value;
					$passSet = true;
					echo $passwordOne;
				}
				
				if(in_array('Confirm_Password', $validators) && $passSet = true){
					$passwordTwo = $value;
					$passSet = false;
					echo $passwordTwo;
				}
				
				if(!empty($passwordOne) != !empty($passwordTwo)){
					$valid = false;
					$inputTwo = "";
					if(isset($inputName[1])){
						$inputTwo = $inputName[1];
					}
					$reqiuredField = $inputName[0] . " " . $inputTwo . " must be matching!";
					array_push($messages, $reqiuredField );			
				}
			}*/
		}
		
	}
}

function errorMsg($messages){
	
	if(isset($messages)){											
		foreach($messages as $key => $value){														
			echo '<font color="red">' . $value . '</font>';							
			echo '</br>';							
		}						
	}	
	return;
}
?>