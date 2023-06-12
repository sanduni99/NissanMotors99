<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>
    <!-- Import Bootstrap v5.0.2-->
    <link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Import CSS files-->
    <link rel="stylesheet" href="CSS/user_panel.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <!-- Import JavaScript files-->
	<script src="JavaScript/mainScripts.js" type="text/javascript"></script>
    
  </head>
  <body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #147f8f;" >
            <div class="container-fluid">
              <img src="Images/icon/logo.png" alt="" height="45px"> &nbsp;&nbsp;
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">News & Updates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                  </li>
                </ul>
                </div>
                <div class="d-flex justify-content-end">
                  <ul class="navbar-nav ">
					 &nbsp;

           <!-- check user login and display user dropdown list -->
           <?php
							if(empty($_SESSION['userID']))
							{
								echo('<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>');
							}
					  		else
							{
								echo('<li class="nav-item">
                            <div class="btn-group">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$_SESSION["name"].'
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                <li><a class="dropdown-item" href="My_panel.php">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="LogOut.php">Log out</a></li>
                                </ul>
                            </div>
                        </li>');
							}
							?>
                  </ul>
                </div>
            </div>
          </nav>
    </header>
	  
	  <br>
		<hr>
			 <!------------------------ User Registration Form start ---------------------->

			<div class="container d-flex align-content-center"> 
				<div class="row">
					<form name="myForm" id="myForm" method="post">
					<div class="col-md-5 border-right">
							<div class="d-flex justify-content-between align-items-content mb-3">
								<h4 class="text-right">Create your own Account</h4>
							</div>
						 <hr>
							<div class="row mt-3 d-flex align-content-center">
								<!--<div class="col-md-12"><label class="labels">User ID</label>
									<input type="text" class="form-control" name="" placeholder="" value="" disabled></div>-->
								
								<div class="col-md-12"><label class="labels">Name</label>
									<input type="text" class="form-control" name="name" id="name" value=""></div>
								
								<div class="col-md-12"><label class="labels">Email Address
									</label><input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" name="email" id="email" value=""></div>
								
								<div class="col-md-12"><label class="labels">NIC/Passport</label>
									<input type="text" class="form-control" name="nic" id="nic" value="" pattern="[0-9]{9}[Vv]"></div>
								
								<div class="col-md-12"><label class="labels">Contact</label>
									<input type="text" class="form-control" name="contact"  value=""></div>
								
								<div class="col-md-12"><label class="labels">Password</label>
									<input type="password" class="form-control" name="password" value=""></div>
								
								<div class="col-md-12"><label class="labels">Confirm Password</label>
									<input type="password" class="form-control" name="confirm" value=""></div>
							</div>
							<div class="mt-5 text-center">
								<input type="submit" class="btn btn-primary profile-button" onclick="validateForm()" name="submit" value="Create Profile"/>
						</div>
					</div>
					</form>
				</div> 
			 </div>
				<!------------------------ Patient Registration Form end ---------------------->
	
	  <br><br><br>
	  
	  <!------------------ Insert new Customer Details to database start ------------------>
	<?php
            if(isset($_POST['submit'])) {
              if(!empty($_POST['name'])&&!empty($_POST['email'])&&!empty($_POST['nic'])&&!empty($_POST['contact'])&&!empty($_POST['password'])&&!empty($_POST['confirm'])){
                $id=0;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $nic = $_POST['nic'];
                $contact = $_POST['contact'];
                $password = $_POST['password'];
				        $confirm = $_POST['confirm'];

                if($password==$confirm){
                  require_once('Database/db_connnection.php');
                  $sql = "SELECT MAX(`userID`) FROM `user`";
                  $result = mysqli_query($conn, $sql);
                  $userCount = 0;

                  if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                      $id = $row["MAX(`userID`)"]+1;
                    }
                  } else {
                    echo "0 results";
                  }


                    $sql = "INSERT INTO `user` (`userID`, `name`, `email`, `password`, `contact`, `nic`, `type`) VALUES ('".$id."', '".$name."', '".$email."', '".$confirm."', '".$contact."', '".$nic."', 'User' );";
                    if (mysqli_query($conn, $sql)) {
                      echo '<script>alert("Profile created successfully Login to Enjoy")</script>';
                      echo "<script>window.top.location='login.php'</script>";
                    } else {
                      $txt ="Error: " . $sql . "<br>" . mysqli_error($conn);
                      echo '<script>alert("'.$txt.'")</script>';
                    }

                  mysqli_close($conn);

                }
                else{
                  echo '<script>alert("Password not match...!")</script>';
                }
              }
              else{
                echo '<script>alert("Fill all!")</script>';
              }
            }
        ?>
	
	<!--------------- Insert new customer Details to database end --------------->

    <footer class="footer mt-auto py-3 fixed-bottom">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>
  </body>
	
</html>