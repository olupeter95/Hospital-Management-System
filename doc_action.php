<?php

include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);

if(!$user->loggedIn()) {
	header("Location: index.php");
}

if($_SESSION['role'] == 'admin'){

  $sql = "SELECT hms_doctor.id as id, hms_doctor.name as dname, email, address, mobile, fee,hms_specialization.name as s_name 
  FROM hms_doctor INNER JOIN hms_specialization ON 
  hms_doctor.specialization_id = hms_specialization.id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($doctor = $result->fetch_assoc()) {
        $row[] = $doctor;
        
        
    }
    echo json_encode($row);
     
  } else {
    echo "0 results";
  }
  $conn->close();
}elseif($_SESSION['role'] == 'doctor') {
  $id = $_SESSION["userid"];
  $sql = "SELECT hms_doctor.id as id, hms_doctor.name as dname, email, address, mobile, fee,hms_specialization.name as s_name 
  FROM hms_doctor INNER JOIN hms_specialization ON 
  hms_doctor.specialization_id = hms_specialization.id WHERE hms_doctor.id=$id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $doctor = $result->fetch_assoc();
    echo json_encode($doctor);
  } else {
    echo "0 results";
  }
  $conn->close();
}
