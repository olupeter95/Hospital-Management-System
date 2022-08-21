<?php
include_once 'config/Database.php';
include_once 'class/User.php';


$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);

if(!$user->loggedIn()) {
	header("Location: /index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta patient_id="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta patient_id="twitter:site" content="@themepixels">
    <meta patient_id="twitter:creator" content="@themepixels">
    <meta patient_id="twitter:card" content="summary_large_imappointment_time">
    <meta patient_id="twitter:title" content="Starlight">
    <meta patient_id="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta patient_id="twitter:imappointment_time" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:imappointment_time" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:imappointment_time:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:imappointment_time:type" content="imappointment_time/png">
    <meta property="og:imappointment_time:width" content="1200">
    <meta property="og:imappointment_time:height" content="600">

    <!-- Meta -->
    <meta patient_id="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta patient_id="author" content="ThemePixels">

    <title>Doctor</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/highlightjs/github.css" rel="stylesheet">
    <link href="lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="lib/select2/css/select2.min.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
  </head>
  <body>
<?php
include_once 'inc/header.php';
?>
    <!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Hospital Administration System</a>
        <span class="breadcrumb-item active">Add Appointment</span>
      </nav>
      <div class="alert alert-warning alert-dismissible fade" role="alert" id="success">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add New Appointment</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <form method="post">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
               <div class="form-group">
               <label for="patient">Patient</label>
                <select class="form-control" id="patient_id" name="patient_id">
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
              </div><!-- col-4 -->
              <div class="col-lg-4">
              <div class="form-group">
              <label for="specialization">Specialization</label>
                <select class="form-control" id="specialization_id" name="specialization_id">
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
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                <label for="exampleFormControlSelect1">Doctor</label>
                <select class="form-control" id="doctor_id" name="doctor_id">
                <option value="" selected="" disabled>Select Doctor</option>
                </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="consultancy_fee" class="control-label">Consultancy Fee</label>							
                  <input type="text" class="form-control" id="consultancy_fee" name="consultancy_fee" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="appointment_date">Appointment Date</label>
                  <input type="date" class="form-control" placeholder="appointment date" id="appointment_date" 
                    name="appointment_date" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="appointment_time">Appointment Time</label>
                  <input type="time" class="form-control" placeholder="appointment time" id="appointment_time" 
                    name="appointment_time" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
               <div class="form-group">
                    <label for="exampleFormControlSelect1">Status</label>
                  <select class="form-control" id="status" name="status">
                    <option value="Active">active</option>
                    <option value="Cancelled">cancelled</option>
                    <option value="Completed">completed</option>
                  </select>
                </div>
            </div><!-- col-4 -->
            </div><!-- row -->
            

            <div class="form-layout-footer">
              <button type="submit" class="btn btn-primary" onclick="addAppointment()">Schedule Appointment </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
        </div><!-- card -->
                

</div>

      <?php
      include_once 'inc/footer.php';
      ?>
    <!-- ########## END: MAIN PANEL ########## -->



    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/highlightjs/highlight.pack.js"></script>
    <script src="lib/datatables/jquery.dataTables.js"></script>
    <script src="lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="lib/select2/js/select2.min.js"></script>

    <script src="js/starlight.js"></script>
  

    
<script>
  $(document).ready(function() {
        $('select[name="specialization_id"]').on('change', function(){
            var specialization_id = $(this).val();
            if(specialization_id) {
                $.ajax({
                    url: 'get-doctor-ajax.php?specialization_id='+specialization_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                      console.log(data)
                      if(data == null){
                        $('select[name="doctor_id"]').html('')
                        $('select[name="doctor_id"]').empty()
                        $('#consultancy_fee').val('')
                      }else{
                        $('select[name="doctor_id"]').html('')
                        $('select[name="doctor_id"]').empty()
                        $('#consultancy_fee').val('')
                        $.each(data, function(key, value){
                          $('select[name="doctor_id"]').append('<option value="'+ value.id +'">' + value.name + '</option>')
                          $('#consultancy_fee').val(value.fee)
                        
                        })
                      }
                    
                      
                     
                         },
                });
            } else {
                alert('danger');
            }
        });
        
      }       
    )



  function addAppointment(){
    var patient_id = $('#patient_id').val()
    var specialization_id = $('#specialization_id').val()
    var doctor_id = $('#doctor_id').val()
    var consultancy_fee = $('#consultancy_fee').val()
    var appointment_date = $('#appointment_date').val()
    var appointment_time = $('#appointment_time').val()
    var status = $('#status').val()
      $.ajax({
        type:'POST',
        url:'\appointment/addappointment.php',
        data:{patient_id:patient_id, specialization_id:specialization_id, consultancy_fee:consultancy_fee, 
          doctor_id:doctor_id, appointment_date:appointment_date, appointment_time:appointment_time, status:status},
        success: function(data){
            console.log(data)
            var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
        window.location.replace("http://localhost/hms/appointment.php");
				$("#success").show();
				$('#success').html('Data added successfully !'); 						
			}
			else if(dataResult.statusCode==201){
				alert("Error occured !");
			}
        }
     })
    
     
  }
</script>
  </body>
</html>