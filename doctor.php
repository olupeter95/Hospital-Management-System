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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http:themepixels.me/starlight/img/starlight-social.png">

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
        <span class="breadcrumb-item active">Doctor</span>
      </nav>
    <?php
        if($_SESSION['role'] == 'admin'){?>
              <div class="sl-pagebody">
              <div class="sl-page-title">
                  <div class="clearfix">
                    <h5 class="float-left mt-2">Manage Doctors</h5>
                    <a href="new_doctor.php" class="btn btn-primary float-right">
                      <i class="fa fa-plus"></i>&nbsp;Add Doctor
                    </a>
                  </div>
              </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <div class="table-wrapper">
                  <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                          <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">E-mail</th>
                            <th class="wd-15p">Address</th>
                            <th class="wd-10p">Mobile</th>
                            <th class="wd-5p">Fee</th>
                            <th class="wd-20p">Specialization</th>
                            <th class="wd-20p">Actions</th>
                          </tr>
                        </thead>
                        <tbody id="info">
                        
                        
                        </tbody>
                  </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->

      </div><!-- sl-pagebody -->

          <?php
        }else{?>
              
              <div class="sl-pagebody">
                
                <div class="sl-page-title">
                    <div class="clearfix">
                      <h5 class="float-left mt-2">View Profile</h5>
                    </div>
                </div><!-- sl-page-title -->
                
                
              <div class="card ">
              <table class="table table-white table-responsive mg-b-0 tx-12">
                <tbody>
                  <tr>
                     <td><strong>NAME:</strong></td>
                     <td class="tx-12" id="name"></td>
                  </tr>
                  <tr>
                     <td><strong>EMAIL:</strong></td>
                     <td class="tx-12" id="email"></td>
                  </tr>
                  <tr>
                     <td><strong>ADDRESS:</strong></td>
                     <td class="tx-12" id="address"></td>
                  </tr>
                  <tr>
                     <td><strong>MOBILE:</strong></td>
                     <td class="tx-12" id="mobile"></td>
                  </tr>
                  <tr>
                     <td><strong>FEE:</strong></td>
                     <td class="tx-12" id="fee"></td>
                  </tr>
                  <tr>
                     <td><strong>SPECIALIZATION:</strong></td>
                     <td class="tx-12" id="special"></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                    <button type="button" name="update" id="" data-toggle="modal" data-target="#exampleModal"
                    class="btn btn-primary" title="Edit" onclick="editDoctor(this.id)">
                        <i class="fa fa-pencil"></i>&nbsp; Edit Profile
                    </button>
                    <button type="button" name="delete" id="" class="btn btn-danger" title="Delete"
                    onclick="delDoctor(this.id)">
                        <i class="fa fa-trash"></i>&nbsp; Delete Profile
                    </button>
                    </td>
                  
                  </tr>
                </tbody>
              </table>
            </div> 
            <!-- /card -->
          </div>
       
          <?php
        }
    ?>
      

<!-- The Modal -->
<div class="modal" id="exampleModal" tabindex="-1">
  <div class="modal-dialog modal-lg" style="width: 600px;">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
      <h4 class="modal-title">Edit Doctor</h4>
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

<?php
if($_SESSION['role'] == 'admin'){?>
<script>
 $(function(){
  var rows = '' 
    $.ajax({
      type:'POST',
            url:'doc_action.php',
            success: function(data){
              console.log(data)
              $.each(JSON.parse(data), function(key,value){
                 
                   rows += `<tr>
                  <td>${value.dname}</td>
                  <td>${value.email}</td>
                  <td>${value.address}</td>
                  <td>${value.mobile}</td>
                  <td>${value.fee}</td>
                  <td>${value.s_name}</td>
            <td>
              <button type="button" name="update" id="${value.id}" data-toggle="modal" data-target="#exampleModal"
               class="btn btn-primary" title="Edit" onclick="editDoctor(this.id)">
                  <i class="fa fa-pencil"></i>
              </button>
              <button type="button" name="delete" id="${value.id}" class="btn btn-danger" title="Delete"
               onclick="delDoctor(this.id)">
                  <i class="fa fa-trash"></i>
              </button>
            </td>
            
          </tr>` 
                    })
                    $('#info').html(rows)

            }
    })
 }) 
</script>
  <?php
}elseif($_SESSION['role'] == 'doctor'){?>
      <script>
        $.ajax({
          type:'POST',
            url:'doc_action.php',
            success: function(data){
              var doctor = JSON.parse(data)
                  $('#name').text(doctor.dname)
                  $('#email').text(doctor.email)
                  $('#address').text(doctor.address)
                  $('#mobile').text(doctor.mobile)
                  $('#fee').text(doctor.fee)
                  $('#special').text(doctor.s_name)
                  $('.btn').attr("id",doctor.id)
            }
        })
      </script>
  <?php
}
?>
 

<script>
    function delDoctor(id){
      $.ajax({
          type:'POST',
          url:'del_doctor.php?docid='+id,
          success: function(response){
              console.log("it is working")
              location.reload()
              $('#success').show()
          }
      })
    }
</script>
<script>
    function editDoctor(id){
      $.ajax({
        type:'GET',
        url:'edit_doc.php?docid='+id,
        success: function(data){
          
              $('#docData').html(data)
        }
      })
    }
</script>


  </body>
</html>
