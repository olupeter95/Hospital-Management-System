<?php
include_once '../config/Database.php';
include_once '../class/User.php';

$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);

if(!$user->loggedIn()) {
	header("Location: index.php");
}

if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'doctor'){
  $sql = "SELECT * FROM hms_patients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($patient = $result->fetch_assoc()) {
    ?>			
			
    <tr>
          <td><?php echo $patient['name']; ?></td>
          <td><?php echo $patient['email']; ?></td>
          <td><?php echo $patient['gender']; ?></td>
          <td><?php echo $patient['mobile']; ?></td>
          <td><?php echo $patient['age']; ?></td>
          <td><?php echo $patient['medical_history']; ?></td>
          <td>
            <button type="button" name="update" id="<?php echo $patient["id"] ?>" data-toggle="modal" data-target="#exampleModal"
             class="btn btn-primary" title="Edit" onclick="editPatient(this.id)">
                <i class="fa fa-pencil"></i>
            </button>
            <button type="button" name="delete" id="<?php echo $patient["id"] ?>" class="btn btn-danger" title="Delete"
             onclick="delPatient(this.id)">
                <i class="fa fa-trash"></i>
            </button>
          </td>
          
        </tr>

    <?php
  }
} else {
  echo "0 results";
}
}else{
  $id = $_SESSION['userid'];
  $sql = "SELECT * FROM hms_patients WHERE id=$id";
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    $patient = $result->fetch_assoc(); 
    echo json_encode($patient);
  } else {
    echo "0 results";
  }

}


$conn->close();