<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['appointmentid'];
$sql = "SELECT *,hp.name as pname, hs.name as sname, hd.name as dname
FROM (((hms_appointments as ha INNER JOIN hms_patients as hp ON ha.patient_id = hp.id)
INNER JOIN hms_specialization as hs ON ha.specialization_id = hs.id)
INNER JOIN hms_doctor as hd ON ha.doctor_id = hd.id)  WHERE ha.id=$id";
$result = $conn->query($sql);
if($result->num_rows == 1){
$data = $result->fetch_assoc();
$pname = $data['pname'];
$sname = $data['sname'];
$dname = $data['dname'];
$consultancy_fee = $data['consultancy_fee'];
$appointment_date = $data['appointment_date'];
$appointment_time = $data['appointment_time'];
$status = $data['status'];
?>
<form method="post" action="appointment/update_appointment.php">
<input type="hidden" name="appointment_id" value="<?php echo $id ?>">
<div class="form-row">
<div class="col">
<div class="form-group">
<label for="name">Patient</label>
<select class="form-control" id="patient_id" name="patient_id">
<option value="<?php echo $data['patient_id']; ?>" selected><?php echo $pname; ?></option>
<?php
$sql = "SELECT * FROM hms_patients";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($rows = $result->fetch_assoc()){?>
<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
<?php
}
}

?>
</select>
</div>
</div>

<div class="col">
<div class="form-group">
<label for="specialization">Specialization</label>
<select class="form-control" id="specialization_id" name="specialization_id">
<option value="<?php echo $data['specialization_id']; ?>" selected><?php echo $sname; ?></option>
<?php
$sql = "SELECT * FROM hms_specialization";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($rows = $result->fetch_assoc()){?>
<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
<?php
}
}

?>
</select> 
</div>
</div>

</div>



<div class="form-row">

<div class="col">
<div class="form-group">
<label for="exampleFormControlSelect1">Doctor</label>
<select class="form-control" id="doctor_id" name="doctor_id">
<option value="<?php echo $data['doctor_id']; ?>" selected><?php echo $dname; ?></option>
<?php
$sql = "SELECT * FROM hms_doctor";
$result = $conn->query($sql);
if($result->num_rows > 0){
while($rows = $result->fetch_assoc()){?>
<option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
<?php
}
}

?>
</select>
</div>                
<div class="form-group">
<label for="consultancy_fee">Consultancy Fee</label>
<input type="text" class="form-control" id="consultancy_fee" name="consultancy_fee"  
value="&#8358;<?php echo $consultancy_fee ?>"/>
</div>

</div>

<div class="row">
<div class="col">
<div class="form-group">
<label for="appointment_date">Appointment Date</label>
<input type="date" class="form-control" id="appointment_date" name="appointment_date" 
value="<?php echo $appointment_date; ?>">
</div>
</div>
<div class="col">
<div class="form-group">
<label for="appointment_time">Appointment Time</label>
<input type="time" class="form-control" id="appointment_time" name="appointment_time" 
value="<?php echo $appointment_time ?>">
</div>
<div class="col">
<div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                  <select class="form-control" id="status" name="status">
                  <option value="<?php echo $data['status'];?>" selected><?php echo $data['status'];?></option>
                    <option value="Active">active</option>
                    <option value="Cancelled">cancelled</option>
                    <option value="Completed">completed</option>
                  </select>
                </div>
</div>
</div>
</div>
<button type="submit" class="btn btn-primary" name="submit">Update Appointment</button>
</form>

<?php  

}
$conn->close();
