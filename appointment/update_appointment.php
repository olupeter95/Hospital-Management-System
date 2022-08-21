<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_POST['appointment_id'];
$patient_id = $_POST['patient_id'];
$specialization_id = $_POST['specialization_id'];
$doctor_id = $_POST['doctor_id'];
$consultancy_fee = $_POST['consultancy_fee'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$status = $_POST['status'];
$sql = "UPDATE hms_appointments SET patient_id='$patient_id', specialization_id='$specialization_id', doctor_id='$doctor_id', 
consultancy_fee='$consultancy_fee',appointment_date='$appointment_date', appointment_time='$appointment_time', status='$status' WHERE id=$id";
$result = $conn->query($sql);
if($result == TRUE){
   header('location: ../appointment.php');
}