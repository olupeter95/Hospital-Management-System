<?php

include_once 'config/Database.php';

$database = new Database();
$conn = $database->getConnection();

  
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$password = $_POST['password'];
$hash_password = md5($password);
$mobile = $_POST['mobile'];
$fee = $_POST['fee'];
$specialization_id = $_POST['specialization_id'];
$sql = "INSERT INTO hms_doctor(name, email, password, address, mobile, fee, specialization_id) 
VALUE('$name', '$email', '$hash_password', '$address', '$mobile', '$fee', '$specialization_id')";
if ($conn->query($sql) == TRUE) {
    echo json_encode(array("statusCode"=>200));
} 
else {
    echo json_encode(array("statusCode"=>201));
}
$conn->close();

