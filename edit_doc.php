<?php

include_once 'config/Database.php';

$database = new Database();
$conn = $database->getConnection();

$id = $_GET['docid'];
$sql = "SELECT hms_doctor.id, hms_doctor.name as dname, email, address, mobile, fee, specialization_id, hms_specialization.name as s_name 
FROM hms_doctor INNER JOIN hms_specialization ON 
hms_doctor.specialization_id = hms_specialization.id where hms_doctor.id = '$id'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $data = $result->fetch_assoc();
    $name = $data['dname'];
    $email = $data['email'];
    $address = $data['address'];
    $mobile = $data['mobile'];
    $fee = $data['fee'];
    $specialization_id = $data['specialization_id'];
    $sname = $data['s_name'];
    ?>
    <form method="post" action="update_doctor.php">
                <input type="hidden" name="docid" value="<?php echo $id ?>">
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
                  <label for="age">Fee</label>
                  <input type="text" class="form-control" id="fee" name="fee" value="<?php echo $fee ?>">
                </div>
                </div>
                <div class="col">
                <div class="form-group">
                <label for="specialization">Specialization</label>
                <select class="form-control" id="specialization_id" name="specialization_id"> 
                <option value="<?php echo $specialization_id; ?>" selected><?php echo $sname; ?></option>
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
                <button type="submit" class="btn btn-primary" name="submit">Update Doctor</button>
              </form>
    
  <?php  
 
}
$conn->close();
