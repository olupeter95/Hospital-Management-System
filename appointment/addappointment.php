<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$patient_id = $_POST['patient_id'];
$specialization_id = $_POST['specialization_id'];
$doctor_id = $_POST['doctor_id'];
$consultancy_fee = $_POST['consultancy_fee'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$status = $_POST['status'];
$sql = "INSERT INTO hms_appointments(patient_id, specialization_id, doctor_id, consultancy_fee, 
appointment_date, appointment_time, status)
VALUES('$patient_id', '$specialization_id', '$doctor_id','$consultancy_fee',
'$appointment_date', '$appointment_time', '$status')";
$result = $conn->query($sql);
if($result  == TRUE) {
    echo json_encode(array("statusCode"=>200));
} 
else {
   echo json_encode(array("statusCode"=>201));
}
$conn->close();

