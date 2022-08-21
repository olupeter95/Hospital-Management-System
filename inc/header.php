


  

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo">
      
      <a href="#"><?php echo ucwords($_SESSION['role']);?></a>
    </div>
    <div class="sl-sideleft">
      <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Search">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
      </div><!-- input-group -->

      <br>
      <div class="sl-sideleft-menu">
      <?php 
        if($_SESSION["role"] == 'admin'){?>
          
          <a href="dashboard.php" class="sl-menu-link active">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
              <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="doctor.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon fa fa-user-md tx-20"></i>
              <span class="menu-item-label">Doctor</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="patient.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon  fa fa-medkit tx-20"></i>
              <span class="menu-item-label">Patient</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="appointment.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon fa fa-calendar tx-20"></i>
              <span class="menu-item-label">Appointments</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <?php
        }
      ?>
      
      <?php 
        if($_SESSION["role"] == 'doctor'){?>
          
          
          <a href="doctor.php" class="sl-menu-link active">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon fa fa-user-md tx-20"></i>
              <span class="menu-item-label">Doctor</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="patient.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon  fa fa-medkit tx-20"></i>
              <span class="menu-item-label">Patient</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="appointment.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon fa fa-calendar tx-20"></i>
              <span class="menu-item-label">Appointments</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <?php
        }
      ?>

<?php 
        if($_SESSION["role"] == 'patient'){?>
          
          
          
          <a href="patient.php" class="sl-menu-link active">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon  fa fa-medkit tx-20"></i>
              <span class="menu-item-label">Patient</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <a href="appointment.php" class="sl-menu-link">
            <div class="sl-menu-item">
              <i class="menu-item-icon icon fa fa-calendar tx-20"></i>
              <span class="menu-item-label">Appointments</span>
            </div><!-- menu-item -->
          </a><!-- sl-menu-link -->
          <?php
        }
      ?>
      
       
      
        
      </div><!-- sl-sideleft-menu -->

      <br>
    </div><!-- sl-sideleft -->
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    <div class="sl-header">
      <div class="sl-header-left">
        <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
        <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
      </div><!-- sl-header-left -->
      <div class="sl-header-right">
        <nav class="nav">
          <div class="dropdown">
            
              <?php if($_SESSION['role'] == 'admin'){?>
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name"><span class="hidden-md-down"> 
                  <?php echo $_SESSION["full_name"]; ?></span></span>
                  </a>
              <?php
              }else{?>
                <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                <span class="logged-name"><span class="hidden-md-down"> <?php echo $_SESSION["name"]; ?></span></span>
                  </a>
              <?php
              }
              ?>
            
            <div class="dropdown-menu dropdown-menu-header wd-200">
              <ul class="list-unstyled user-profile-nav">
                <li><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
              </ul>
            </div><!-- dropdown-menu -->
          </div><!-- dropdown -->
        </nav>
        
      </div><!-- sl-header-right -->
    </div><!-- sl-header -->
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
  
    <!-- ########## END: RIGHT PANEL ########## --->