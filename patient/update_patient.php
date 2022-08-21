<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_POST['patient_id'];
$name = $_POST['name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$medical_history = $_POST['medical_history'];
$sql = "UPDATE hms_patients SET name='$name', email='$email', gender='$gender', address='$address',
mobile='$mobile', age='$age', medical_history='$medical_history' WHERE id=$id";
$result = $conn->query($sql);
if($result == TRUE){
   header("location: ../patient.php");
}