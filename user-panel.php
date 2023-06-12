<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Jquery files -->
    <link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
    <!-- Import Bootstrap v5.0.2 -->
    <link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files -->
    <link rel="stylesheet" href="CSS/admin-panel.css">
	  <link rel="stylesheet" href="CSS/user_panel.css">
    <!-- Import JavaScript files -->
    <script src="JavaScript/mainScripts.js"></script>
    <script src="JavaScript/admin-panel.js"></script>
    <link rel="stylesheet" href="CSS/cal.css">
 <!-- Import JavaScript files -->
 <script src="JavaScript/cal.js" type="text/javascript"></script>


  </head>
  <body>

  <?php 
    session_start();
    if($_SESSION['type'] != "User"){
      header('Location:login.php');
    }

    if(isset($_POST['btnEdit'])){
      $_SESSION['passEditID'] = $_POST['hiddenValue'];
      header('Location:user-panel.php?btnAddUpdate=true');
    }
  ?>

    <!--Side pannel-->
    <table width="100%">
      <tr width="15%">
        <td class="d-flex align-items-start tblLeft" width="15%">

      <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">

          <symbol id="home" viewBox="0 0 16 16">
              <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
          </symbol>
          <symbol id="people-circle" viewBox="0 0 16 16">
              <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
              <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
          </symbol>
          <symbol id="speedometer2" viewBox="0 0 16 16">
              <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
              <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
          </symbol>
          <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
          </symbol>
          <symbol id="site" viewBox="0 0 16 16">
            <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
          </symbol>
          <symbol id="bi bi-gear" viewBox="0 0 16 16">
            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
        </symbol>
        <symbol id="bi bi-power" viewBox="0 0 16 16">
          <path d="M7.5 1v7h1V1h-1z"/>
          <path d="M3 8.812a4.999 4.999 0 0 1 2.578-4.375l-.485-.874A6 6 0 1 0 11 3.616l-.501.865A5 5 0 1 1 3 8.812z"/>
        </symbol>
          
      </svg>

        <!--Side panel-->  
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;" height="100">
    <a href="user-panel.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
     <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
     <img src="Images/icon/logo.jpg" alt="" height="45px">
     <span class="fs-4">&nbsp;My Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
		<li class="nav-item">
        <a href="index.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li class="nav-item">
        <a href="user-panel.php?btnDashboard=true" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a href="user-panel.php?btnProfile=true" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Profile
        </a>
      </li>
		<li class="nav-item">
        <a href="user-panel.php?btnCreateAdd" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#site"/></svg>
          Create Advert
        </a>
      </li>
      <li class="nav-item">
        <a href="user-panel.php?btnUpdateAdd" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#site"/></svg>
          Update Advert
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#settings-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#bi bi-gear"/></svg>
          Settings
        </a>
		  <div class="collapse" id="settings-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="user-panel.php?btnEditProfile=true" class="link-dark rounded" aria-current="page">Edit Profile</a></li>
            <li><a href="user-panel.php?btn_change_password=true" class="link-dark rounded" aria-current="page">Change Password</a></li>
          </ul>
        </div>
      </li>

      <li>
        <a href="#" class="nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#more-collapse" aria-expanded="false">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          More
        </a>
        <div class="collapse" id="more-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
              <li><a href="user-panel.php?btn_advert=true" class="link-dark rounded" aria-current="page">Advert Reports</a></li>
              <li><a href="user-panel.php?btn_pay_report=true" class="link-dark rounded" aria-current="page">Calculator</a></li>
            </ul>
          </div>
      </li>

      <li>
        <a href="logout.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#bi bi-power"/></svg>
          Sign Out
        </a>
      </li> 
      
    </div>
  </div>
        </td>

<!-- Display panel for user pages --> 
        <td width="85%">
          <div class="displaypanel">
            <!--Pages display panel-->
            <?php 
              if(isset($_GET['btnDashboard'])){
                INCLUDE 'user-panels/dashbord.php';
              }

              if(isset($_GET['btnProfile'])){
                INCLUDE 'user-panels/user_profile.php';
              }
          
              if(isset($_GET['btnCreateAdd'])){
                INCLUDE 'user-panels/Create_Add.php';
              }

              if(isset($_GET['btnUpdateAdd'])){
                INCLUDE 'user-panels/Update_Add.php';
              }

              if(isset($_GET['btnAddUpdate'])){
                INCLUDE 'user-panels/Add_Update_Form.php';
              }

              if(isset($_GET['btnEditProfile'])){
                INCLUDE 'user-panels/edit_profile.php';
              }

              if(isset($_GET['btn_change_password'])){
                INCLUDE 'user-panels/change_password_profile.php';
              }

              if(isset($_GET['btn_advert'])){
                INCLUDE 'user-panels/Advert_chart.php';
              }

              if(isset($_GET['btn_pay_report'])){
                INCLUDE 'user-panels/Calculator.php';
              }
            ?>
          </div>
        </td>
      </tr>
    </table>
  </body>
</html>