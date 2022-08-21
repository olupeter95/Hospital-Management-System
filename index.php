<!DOCTYPE html>
<?php 
include_once 'config/Database.php';
include_once 'class/User.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

if($user->loggedIn()) {	
    header("Location: dashboard.php");  
}

$loginMessage = '';
if(!empty($_POST["login"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["loginType"]) && $_POST["loginType"]) {	
	$user->email = $_POST["email"];
	$user->password = $_POST["password"];	
	$user->loginType = $_POST["loginType"];
	if($user->login()) {
    if($_SESSION['role'] == 'admin'){
      header("Location: dashboard.php");
    }elseif($_SESSION['role'] == 'doctor'){
      header("Location: doctor.php");
    }else{
      header("Location: patient.php");
    }
			
	} else {
		$loginMessage = 'Invalid login! Please try again.';
	}
} else {
	$loginMessage = 'Fill all fields.';
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

    <title>Hospital Administration system</title>

    <!-- vendor css -->
    <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-dark" style="width:500px">
      
      
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse text-white">HOSPITAL ADMINSTRATION SYSTEM</div>
        
        <div class="tx-center mg-b-20"></div>
        <form method="POST" action="">
        <?php if ($loginMessage != '') { ?>
					<div id="login-alert" class="alert alert-danger col-sm-12"><?php echo $loginMessage; ?></div>                            
				<?php } ?>
        
        <div class="form-group">
          <input type="text" class="form-control" id="email" name="email" 
          value="<?php if(!empty($_POST["email"])) { echo $_POST["email"]; } ?>" placeholder="email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" id="password" name="password" 
          value="<?php if(!empty($_POST["password"])) { echo $_POST["password"]; } ?>" placeholder="password" required>
        </div><!-- form-group -->
          <div class="form-check form-check-inline pl-4">
            <input class="form-check-input" type="radio" name="loginType" value="admin">
            <label class="form-check-label text-white" for="admin">
              Administrator
            </label>
          </div>
          <div class="form-check form-check-inline pl-4">
            <input class="form-check-input" type="radio" name="loginType" value="doctor">
            <label class="form-check-label text-white" for="doctor">
              Doctor
            </label>
          </div>
          <div class="form-check form-check-inline pl-4">
            <input class="form-check-input" type="radio" name="loginType" value="patient">
            <label class="form-check-label text-white" for="patient">
              Patient
            </label>
          </div>
        <button type="submit" class="btn btn-danger btn-block" name="login" value="Login">Sign In</button>
      </form>
      <div class="tx-center mg-b-20"></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="lib/jquery/jquery.js"></script>
    <script src="lib/popper.js/popper.js"></script>
    <script src="lib/bootstrap/bootstrap.js"></script>

  </body>
</html>
