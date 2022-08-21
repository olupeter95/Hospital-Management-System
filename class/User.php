<?php
class User {	
   
		
	private $conn;
	
	public function __construct($db){
        $this->conn = $db;
    }	    
	
	public function login(){
		if($this->email && $this->password) {
			$loginTable = '';
			if($this->loginType == 'admin') {
				$loginTable = "hms_admin";
			} else if ($this->loginType == 'doctor') {
				$loginTable = "hms_doctor";
			} else if ($this->loginType == 'patient') {
				$loginTable = "hms_patients";
			}
			$sqlQuery = "
				SELECT * FROM ".$loginTable." 
				WHERE email = ? AND password = ?";			
			$stmt = $this->conn->prepare($sqlQuery);
			$password = md5($this->password);
			$stmt->bind_param("ss", $this->email, $password);	
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1){
				$user = $result->fetch_assoc();
				$_SESSION["userid"] = $user['id'];
				$_SESSION["role"] = $this->loginType;
				$_SESSION["name"] = $user['name'];	
				$_SESSION["first_name"] = $user['first_name'];
				$_SESSION["last_name"] = $user['last_name'];
				$_SESSION["full_name"] = $user['first_name'].' '.$user['last_name'] ;
					
				return 1;		
			} else {
				return 0;		
			}			
		} else {
			return 0;
		}
	}
	
	public function loggedIn (){
		if(!empty($_SESSION["userid"])) {
			return 1;
		} else {
			return 0;
		}
	}

}
?>