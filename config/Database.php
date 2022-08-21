<?php
session_start();
class Database{
	
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "hms"; 
	private $port  = 4000;
	
    
    public function getConnection(){		
		$conn = new mysqli($this->host, $this->user, $this->password, $this->database, $this->port);
		if($conn->connect_error){
			die("Error failed to connect to MySQL: " . $conn->connect_error);
		} else {
			return $conn;
		}
    }
}
