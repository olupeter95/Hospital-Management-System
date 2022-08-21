<!DOCTYPE html>
<?php
include_once 'config/Database.php';
include_once 'class/User.php';


$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);

if(!$user->loggedIn()) {
  header("Location: index.php");
}

?>
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

    <title>Hospital Administration System</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
  </head>
<?php
include_once 'inc/header.php';
?>
<body>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="dashboard.php">Hospital Admin System</a>
        <span class="breadcrumb-item active">Dashboard</span>
      </nav>

      <div class="sl-pagebody">

      <div class="row row-sm mg-t-20">
          <div class="col-sm-6 col-xl-4 mg-t-20 mg-sm-t-0">
            <div class="card bg-purple tx-white pd-25">
              <div class="d-flex align-items-center justify-content-between mg-b-10">
                <h6 class="card-body-title tx-12  tx-white-8 tx-spacing-1">Total Number of Patient</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-more"></i></a>
              </div><!-- d-flex -->
              <h2 class="tx-lato  mg-b-15 py-3">
              <?php 
                      $sql = "SELECT * FROM hms_patients";
                      $result = $conn->query($sql);
                    echo   $rows = mysqli_num_rows($result);
                     

               ?>
              </h2>
              <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="patient.php" class="text-white">Vies Details</a>
                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
              </div>
              
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
            <div class="card pd-20 pd-sm-25">
              <div class="d-flex align-items-center justify-content-between mg-b-10">
                <h6 class="card-body-title tx-12 tx-spacing-1">Total Number of Doctor</h6>
                <a href="" class="tx-gray-600 hover-info"><i class="icon ion-more"></i></a>
              </div><!-- d-flex -->
              <h2 class="tx-teal tx-lato mg-b-15 py-3">
              <?php 
                      $sql = "SELECT id FROM hms_doctor";
                      $result = $conn->query($sql);
                      echo   $rows = mysqli_num_rows($result);
                     

               ?>
            
              </h2>
              <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="doctor.php" class="text-primary">Vies Details</a>
                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
              </div>  
            </div><!-- card -->
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-4 mg-t-20 mg-xl-t-0">
            <div class="card bg-teal tx-white pd-25">
              <div class="d-flex align-items-center justify-content-between mg-b-10">
                <h6 class="card-body-title tx-12 tx-white-8 tx-spacing-1">Total Number of Appointment</h6>
                <a href="" class="tx-white-8 hover-white"><i class="icon ion-more"></i></a>
              </div><!-- d-flex -->
              <h2 class="tx-lato mg-b-15 py-3">
               <?php 
                      $sql = "SELECT id FROM hms_appointments";
                      $result = $conn->query($sql);
                      echo   $rows = mysqli_num_rows($result);
                     

               ?>
              </h2>
              <div class="card-footer d-flex align-item-center justify-content-between">
                <a href="appointment.php" class="text-white">Vies Details</a>
                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
              </div>
              
            </div><!-- card -->
          </div><!-- col-3 -->
        </div>

        
        

      </div><!-- sl-pagebody -->
      

<script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>
    <script src="lib/jquery-ui/jquery-ui.js"></script>
    <script src="lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="lib/d3/d3.js"></script>
    <script src="lib/rickshaw/rickshaw.min.js"></script>
    <script src="lib/chart.js/Chart.js"></script>
    <script src="lib/Flot/jquery.flot.js"></script>
    <script src="lib/Flot/jquery.flot.pie.js"></script>
    <script src="lib/Flot/jquery.flot.resize.js"></script>
    <script src="lib/flot-spline/jquery.flot.spline.js"></script>

    <script src="js/starlight.js"></script>
    <script src="js/ResizeSensor.js"></script>
    <script src="js/dashboard.js"></script>
  </body>
</html>