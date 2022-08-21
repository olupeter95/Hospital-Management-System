<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$hash_password = md5($password);
$gender = $_POST['gender'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$age = $_POST['age'];
$medical_history = $_POST['medical_history'];
$sql = "INSERT INTO hms_patients(name, email, password, gender, mobile, address, age, medical_history) 
VALUES('$name', '$email', '$hash_password','$gender', '$mobile', '$address', '$age', '$medical_history')";
$result = $conn->query($sql);
if ($result  == TRUE) {
    echo json_encode(array("statusCode"=>200));
    header('location: patient.php');
} 
else {
   echo json_encode(array("statusCode"=>201));
}
$conn->close();

