<?php

include_once 'config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_POST['docid'];
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$mobile = $_POST['mobile'];
$fee = $_POST['fee'];
$specialization = $_POST['specialization_id'];
$sql = "UPDATE hms_doctor SET name='$name', email='$email', address='$address',
mobile='$mobile', fee='$fee', specialization_id='$specialization' WHERE id=$id";
$result = $conn->query($sql);
if($result == TRUE){
    header('location: doctor.php');
}