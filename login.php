<!DOCTYPE html>
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
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="stylesheet" href="CSS/mainStyle.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>

    <!--<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nissan Motors</title>-->
    <!-- Import Bootstrap v5.0.2-->
    <!--<link rel="stylesheet" href="Bootstrap 5.0.2/dist/css/bootstrap.min.css">
    <script src="Bootstrap 5.0.2/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- Import CSS files-->
    <!--<link rel="stylesheet" href="CSS/mainStyle.css">
    <link rel="stylesheet" href="CSS/navbar & footer.css">-->
    <!-- Import JavaScript files-->
    <!--<script src="JavaScript/mainScripts.js"></script>-->
  </head>
  <body>
  <?php 
    session_start();

	  ?>
	  
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
                </div>
            </div>
          </nav>
    </header>
	 

	  <div class="wrapper fadeInDown d-flex justify-content-center">
            <div id="formContent">

              <form method="post">
                <input type="text" id="login" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="fadeIn second" name="email" placeholder="email">
                <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="btn btn-primary profile-button" onclick="validateLogForm()" name="submit" value="Log In"/><br>
				 <a href="signup.php"> Create new account </a><br>
				  <p>&#160</p>
              </form>

            </div>
          </div>
	  
	  <!------------------ Select user login details to log start ------------------------->
		<?php
            if(isset($_POST['submit'])) {
                if(!empty($_POST['email']) && !empty($_POST['password'])){
                    require_once('Database/db_connnection.php');
                        $sql = "SELECT * FROM `user` WHERE `email` = '".$_POST['email']."'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            // ------- output data of each row
                            while($row = mysqli_fetch_assoc($result)) {
                              
                                $email = $row["email"];
                                $password = $row["password"];
                                $name = $row["name"];
                                $type = $row["type"];
                                $userID = $row["userID"];
                           }

                           /* set user details to session */
                            if($password==$_POST['password']){
                              	session_start();
                                $_SESSION['name'] = $name; //User name
                                $_SESSION['userID'] = $userID; //UserID
                                $_SESSION['type'] = $type;
                                
							    /* go to home page*/
								header('Location:index.php');
                            }
                            else{
                                echo "<script>alert('Wrong password..!')</script>";
                            }
                        } 
                        else {
                           echo "<script>alert('Wrong email adress..!')</script>";
                        }
                }
            }
        ?>
		 <!------------------ Select user login details to log end ------------------------->  


    <footer class="footer mt-auto py-3 fixed-bottom">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>
  </body>
</html>