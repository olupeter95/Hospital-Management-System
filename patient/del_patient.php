<?php
include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['patient_id'];
$sql = "DELETE FROM hms_patients WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    
  }else{
    echo "Error deleting record: " . $conn->error;
  }
  
$conn->close();