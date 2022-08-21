<?php

include_once '../config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['patient_id'];
$sql = "SELECT * FROM hms_patients where id = '$id'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $data = $result->fetch_assoc();
    $name = $data['name'];
    $email = $data['email'];
    $gender = $data['gender'];
    $address = $data['address'];
    $mobile = $data['mobile'];
    $age = $data['age'];
    $medical_history = $data['medical_history'];
    ?>
    <form method="post" action="patient/update_patient.php">
                <input type="hidden" name="patient_id" value="<?php echo $id ?>">
                <div class="form-row">
                  <div class="col">
                  <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>">
                </div>
                  </div>

                  <div class="col">
                    <div class="form-group">
                      <label for="mobile">Mobile</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $mobile ?>">
                    </div>

                  </div>

                </div>
                
                
                   
               <div class="form-row">

               <div class="col">
                  <div class="form-group">
                    <label for="name">Gender</label>
                    <input type="text" class="form-control" id="gender" name="gender" value="<?php echo $gender ?>">
                  </div>                
                </div>



                <div class="col">
                  <div class="form-group">
                    <label for="name">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                  </div>                
                </div>
               </div>


                <div class="form-group">
                  <label for="address">Address</label>
                  <textarea type="text" class="form-control" id="address" name="address"  value="<?php echo $address ?>"><?php echo $address ?>
                  </textarea>
                </div>
              <div class="row">
                <div class="col">
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" class="form-control" id="age" name="age" value="<?php echo $age ?>">
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                  <label for="medical_history">Mobile History</label>
                  <input type="text" class="form-control" id="medical_history" name="medical_history" value="<?php echo $medical_history ?>">
                </div>
                </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update Patient</button>
              </form>
    
  <?php  
 
}
$conn->close();
