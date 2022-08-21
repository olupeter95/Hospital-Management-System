<?php
include_once 'config/Database.php';
include_once 'class/User.php';


$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if(!$user->loggedIn()) {
	header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

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
        <span class="breadcrumb-item active">Add Patient</span>
      </nav>
      <div class="alert alert-warning alert-dismissible fade" role="alert" id="success">
        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Add New Patient</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
        <form method="post">
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
               <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" placeholder="enter your name" id="name" 
                    name="name" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="email">E-mail</label>
                  <input type="email" class="form-control" placeholder="enter email" id="email" 
                  name="email" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="gender" class="control-label">Gender</label>							
                  <input class="form-control"  id="gender" name="gender" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="address" class="control-label">Address</label>							
                  <textarea class="form-control" rows="2" id="address" name="address" required></textarea>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" placeholder="enter mobile number" 
                  id="mobile" name="mobile" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="password" id="password" 
                    name="password" required>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" class="form-control" placeholder="age" id="age" name="age" required>
              </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
              <div class="form-group">
                <label for="medical_history">Medical History</label>
                <textarea type="text" class="form-control" placeholder="medical_history" id="medical_history" 
                name="medical_history" required></textarea>
              </div>
            </div><!-- col-4 -->
            </div><!-- row -->
            

            <div class="form-layout-footer">
            <button type="submit" class="btn btn-primary" onclick="addPatient()">Add Patient</button>
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
  function addPatient(){

    var name = $('#name').val()
    var email = $('#email').val()
    var address = $('#address').val()
    var gender = $('#gender').val()
    var password = $('#password').val()
    var mobile = $('#mobile').val()
    var age = $('#age').val()
    var medical_history = $('#medical_history').val()
   
      $.ajax({
        type:'POST',
        url:'\patient/addpatient.php',
        data:{name:name, email:email, password:password, gender:gender, address:address,  
          mobile:mobile, age:age, medical_history:medical_history},
        success: function(data){
            console.log(data)
            
            var dataResult = JSON.parse(dataResult);
			if(dataResult.statusCode==200){
        
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