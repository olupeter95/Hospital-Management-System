<?php
include_once '../config/Database.php';

include_once '../class/User.php';

$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);

if(!$user->loggedIn()) {
	header("Location: index.php");
}

    
if($_SESSION['role'] == 'admin'){
$sql = "SELECT hms_appointments.id as id,consultancy_fee, appointment_date, appointment_time,status, 
hms_doctor.name as d_name, hms_specialization.name as s_name,
hms_patients.name as p_name  FROM (((hms_appointments  INNER JOIN hms_doctor ON hms_appointments.doctor_id=hms_doctor.id)
INNER JOIN hms_specialization ON  hms_appointments.specialization_id=hms_specialization.id) INNER JOIN
hms_patients ON hms_appointments.patient_id = hms_patients.id)";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($appointment = $result->fetch_assoc()) {
    ?>			
			
    <tr>
          <td><?php echo $appointment['p_name'];?></td>
          <td><?php echo $appointment['s_name']; ?></td>
          <td><?php echo $appointment['d_name']; ?></td>
          <td>&#8358;<?php echo $appointment['consultancy_fee']; ?></td>
          <td><?php echo $appointment['appointment_date']; ?></td>
          <td><?php echo $appointment['appointment_time']; ?></td>
          <td>
            <?php
                if($appointment['status'] == 'Active'){?>
                    <span class="badge badge-pill badge-success p-1">active</span>
                  <?php 
                }elseif($appointment['status'] == 'Completed'){?>
                    <span class="badge badge-pill badge-info p-1">completed</span>
                <?php
              }else{?>
                    <span class="badge badge-pill badge-danger p-1">cancelled</span>
                  <?Php
                }
            ?>
          </td>
          <td>
            <button type="button" name="update" id="<?php echo $appointment["id"] ?>" data-toggle="modal" data-target="#exampleModal"
               class="btn btn-primary" title="Edit" onclick="editAppointment(this.id)">
                  <i class="fa fa-pencil"></i>
              </button>
            <button id="<?php echo $appointment['id']?>" onclick="delAppointment(this.id)" class="btn btn-danger" title="delete">
                <i class="fa fa-trash"></i>
            </button>
          </td>
        </tr>

    <?php
  }
} else {
  echo "0 results";
}

}elseif($_SESSION['role'] == 'doctor'){
  $id = $_SESSION['userid'];
  $sql = "SELECT hms_appointments.id as id,consultancy_fee, appointment_date, appointment_time,status, 
  hms_doctor.name as d_name, hms_specialization.name as s_name,
  hms_patients.name as p_name  FROM (((hms_appointments  INNER JOIN hms_doctor ON hms_appointments.doctor_id=hms_doctor.id)
  INNER JOIN hms_specialization ON  hms_appointments.specialization_id=hms_specialization.id) INNER JOIN
  hms_patients ON hms_appointments.patient_id = hms_patients.id) WHERE hms_doctor.id = $id";
  
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($appointment = $result->fetch_assoc()) {
      ?>			
        
      <tr>
            <td><?php echo $appointment['p_name'];?></td>
            <td><?php echo $appointment['s_name']; ?></td>
            <td><?php echo $appointment['d_name']; ?></td>
            <td><?php echo $appointment['consultancy_fee']; ?></td>
            <td><?php echo $appointment['appointment_date']; ?></td>
            <td><?php echo $appointment['appointment_time']; ?></td>
            <td>
              <?php
                  if($appointment['status'] == 'Active'){?>
                      <span class="badge badge-pill badge-success p-1">active</span>
                    <?php 
                  }elseif($appointment['status'] == 'Completed'){?>
                      <span class="badge badge-pill badge-info p-1">completed</span>
                  <?php
                }else{?>
                      <span class="badge badge-pill badge-danger p-1">cancelled</span>
                    <?Php
                  }
              ?>
            </td>
            <td>
              <button type="button" name="update" id="<?php echo $appointment["id"] ?>" data-toggle="modal" data-target="#exampleModal"
               class="btn btn-primary" title="Edit" onclick="editAppointment(this.id)">
                  <i class="fa fa-pencil"></i>
              </button>
              <button id="<?php echo $appointment['id']?>" onclick="delAppointment(this.id)" class="btn btn-danger" title="delete">
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
  $sql = "SELECT hms_appointments.id as id,consultancy_fee, appointment_date, appointment_time,status, 
  hms_doctor.name as d_name, hms_specialization.name as s_name,
  hms_patients.name as p_name  FROM (((hms_appointments  INNER JOIN hms_doctor ON hms_appointments.doctor_id=hms_doctor.id)
  INNER JOIN hms_specialization ON  hms_appointments.specialization_id=hms_specialization.id) INNER JOIN
  hms_patients ON hms_appointments.patient_id = hms_patients.id) WHERE hms_doctor.id = $id";
  
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    // output data of each row
    while($appointment = $result->fetch_assoc()) {
      ?>			
        
      <tr>
            <td><?php echo $appointment['p_name'];?></td>
            <td><?php echo $appointment['s_name']; ?></td>
            <td><?php echo $appointment['d_name']; ?></td>
            <td><?php echo $appointment['consultancy_fee']; ?></td>
            <td><?php echo $appointment['appointment_date']; ?></td>
            <td><?php echo $appointment['appointment_time']; ?></td>
            <td>
              <?php
                  if($appointment['status'] == 'Active'){?>
                      <span class="badge badge-pill badge-success p-1">active</span>
                    <?php 
                  }elseif($appointment['status'] == 'Completed'){?>
                      <span class="badge badge-pill badge-info p-1">completed</span>
                  <?php
                }else{?>
                      <span class="badge badge-pill badge-danger p-1">cancelled</span>
                    <?Php
                  }
              ?>
            </td>
            <td>
              
         <button type="button" name="update" id="<?php echo $appointment["id"] ?>" data-toggle="modal" data-target="#exampleModal"
               class="btn btn-primary" title="Edit" onclick="editAppointment(this.id)">
                  <i class="fa fa-pencil"></i>
              </button>
              <button id="<?php echo $appointment['id']?>" onclick="delAppointment(this.id)" class="btn btn-danger" title="delete">
                  <i class="fa fa-trash"></i>
              </button> 
            </td>
          </tr>
  
      <?php
    }
  } else {
    echo "0 results";
  }

}

$conn->close();