<?php
include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['appointmentid'];
$sql = "DELETE FROM hms_appointments WHERE id=$id";
if ($conn->query($sql) === TRUE) {
    echo $id;
  } else {
    echo "Error deleting record: " . $conn->error;
  }
  
  $conn->close();