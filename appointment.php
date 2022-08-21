<!DOCTYPE html>
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
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta patient="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta patient="twitter:site" content="@themepixels">
    <meta patient="twitter:creator" content="@themepixels">
    <meta patient="twitter:card" content="summary_large_image">
    <meta patient="twitter:title" content="Starlight">
    <meta patient="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta patient="twitter:image" content="http:themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http:themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http:themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http:themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta patient="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta patient="author" content="ThemePixels">

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
        <span class="breadcrumb-item active">Appointment</span>
      </nav>
    
          <div class="sl-pagebody">
        <div class="sl-page-title">
          <div class="clearfix">
            <h5 class="float-left mt-2">Manage Appointment</h5>
       <?php
        if($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'admin'){?>
            <a href="new_appointment.php" class="btn btn-primary float-right">
              <i class="fa fa-plus"></i>&nbsp;Schedule Appointment
            </a> 
          <?php
        }else{?>
              <a href="new_appointment.php" class="btn btn-primary float-right">
              <i class="fa fa-plus"></i>&nbsp;Book Appointment
            </a>
          <?Php
        } 
        ?>
          </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          

          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Patient</th>
                  <th class="wd-15p">Specialization</th>
                  <th class="wd-10p">Doctor</th>
                  <th class="wd-5p"> Consultancy fee</th>
                  <th class="wd-10p">Date</th>
                  <th class="wd-10p">Time</th>
                  <th class="wd-5p">Status</th>
                  <th class="wd-15p">Action</th>
               </tr>
              </thead>
              <tbody id="info">
              
              
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->

      </div><!-- sl-pagebody -->
       
      
<!-- The Modal -->
<div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-lg" style="width: 600px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title">Edit Appointment</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
          <div class="row justify-content-center">
            <div class="card" style="width:500px">
              <div class="card-body" id="docData">
              
                
              </div>
            </div>
          </div>

        
      </div>

      

    </div>
  </div>
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
            $(function(){
              $.ajax({
                    type:'POST',
                    url:'\appointment/appointment_action.php',
                    success: function(data){
                        console.log(data)
                        $('#info').html(data)
                        

                    }
                })
            })
          </script>

<script>
    function delAppointment(id){
      $.ajax({
          type:'POST',
          url:'\appointment/del_appointment.php?appointmentid='+id,
          success: function(response){
              location.reload()
              $('#success').show()
          }
      })
    }
</script>
<script>
    function editAppointment(id){
      $.ajax({
        type:'GET',
        url:'\appointment/edit_appointment.php?appointmentid='+id,
        success: function(data){
          
              $('#docData').html(data)
        }
      })
    }
</script>


<script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
          
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

         

         //Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

  </body>
</html>
