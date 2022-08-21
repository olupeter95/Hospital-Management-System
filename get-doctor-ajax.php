<?php

include_once 'config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['specialization_id'];
$sql = "SELECT hd.name as name, hd.id as id, fee, hs.id as sid FROM hms_specialization as hs 
INNER JOIN hms_doctor as  hd ON hs.id = hd.specialization_id  
WHERE hs.id = $id";
$result = $conn->query($sql);
if($result->num_rows > 0){
    while($data = $result->fetch_assoc()){
        $rows[] = $data;
    };
echo json_encode($rows);           
}else{
    echo json_encode(null);
}