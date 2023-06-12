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
    <link rel="stylesheet" href="CSS/navbar & footer.css">
    <link rel="stylesheet" href="CSS/viewAdds.css">
    <link href="details.css" rel="stylesheet">

    <style>
      #cmtbox:hover {   /* Add hover effect */
        box-shadow: 0 0 8px 1px rgba(0, 140, 186, 0.5);
        border-color: black;
        background-color:#c5ede5;
      }
    </style>

    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
    <script src="JavaScript/slideShow.js"></script>
  </head>

	<link href="details.css" rel="stylesheet">  

  <body>
      <?php
      session_start();
      $_SESSION['news'];

      ?>
	<header>
        <div class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #147f8f;">
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
                    <a class="nav-link" href="news.php">News & Updates</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Reviews</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                </ul>
                </div>
                <div class="d-flex justify-content-end">
                  <ul class="navbar-nav ">
                    <?php
                      if(empty($_SESSION['userID'])){
                          echo('<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>');
                      }
                      else{
                          if($_SESSION["type"]=="Admin"){
                            $type = "admin-panel.php";
                          } 
                          else {
                            $type = "user-panel.php";
                          }
                          echo('<li class="nav-item">
                                      <div class="btn-group">
                                          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">'.$_SESSION["name"].'
                                          </a>
                                          <ul class="dropdown-menu dropdown-menu-dark dropdown-menu-end">
                                          <li><a class="dropdown-item" href="'.$type.'">Profile</a></li>
                                          <li><hr class="dropdown-divider"></li>
                                          <li><a class="dropdown-item" href="logout.php">Log out</a></li>
                                          </ul>
                                      </div>
                                  </li>');
                      }
                    ?>

                  </ul>
                </div>
            </div>
        </div>
    </header>

    <br><br><br>

	<div class="container">
		<div class="card">
			<div class="container-fliud">
            <?php 
                require_once('Database/db_connnection.php');
                $sql = "SELECT * FROM `news` WHERE `newsID`=".$_SESSION['news'];   ///$_SESSION['advert']
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
            ?>
				<div class="wrapper row">
					<div class="preview col-md-5">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']);?>" style="height:auto; width: 480px;" /></div>
						</div>
						<!--<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="Image cars/Low_ToyotaAllNewAqua-1-1.jpg" width="241" height="131" /></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img src="Image cars/20210719_04_02_s.jpg" width="237" height="167" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="Image cars/20210719_04_03_s.jpg" width="236" height="196" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="Image cars/20210719_04_05_s.jpg" width="237" height="109" /></a></li>
						</ul>-->
						
					</div>
					<div class="details col-md-6">
						<h3 class="h2"><?php echo $row['topic']; ?></h3>
						<p class="text-muted blockquote"><?php echo $row['discription'];?></p>
			
						<div class="action">
							<!--<button class="add-to-wishlist btn btn-default" type="button">Add to wishlist</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>-->
						</div>
					</div>
				</div>
            <?php
                }
            }
            ?>
			</div>
		</div>
	</div>

  <div class="container">
    <form method="post" enctype="multipart/form-data">
         <br>
            <table class="sell_table" style="width: 400px;" border="0">
            <tr>
                <td colspan="2"> <h2> Write Your Comment </h2> </td>   
            </tr>    
            <tr>
            <td>
                <label> Add Comment : </label> <br>
                <textarea rows="4" cols="50" class="form-control" name="cmt" id="cmt" >  </textarea>
            </td> 
            </tr>   
            <tr>
                <td colspan="2" >
                    <input type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-dark" value="ADD COMMENT"  style="width: 150;" />
                    <input type="reset" name="clear" class="btn btn-secondary" value="CANCEL"  style="width:100;" /> 
                </td>
            </tr>  
            <tr>
              <td colspan="2"> 
                  <p>
            <?php
              if (isset($_POST["btnSubmit"])){
                if($_SESSION['userID'] != ""){
                  $cmtDesc = $_POST["cmt"];
                  require_once('Database/db_connnection.php');

                  $sql = "INSERT INTO `comment` (`newsID`, `userID`, `comment`) VALUES ('{$_SESSION['news']}', '{$_SESSION['userID']}', '{$cmtDesc}')";
                  if(mysqli_query($conn,$sql)){
                    echo '<script>alert("Successfully Commented...!")</script>';
                  }
                  else{
                    echo '<script>alert("Something went wrong, Please try again!")</script>';
                  }
                }
                else{
                  echo '<script>alert("Please Login...!")</script>';
                  echo "<script>window.top.location='login.php'</script>";
                }
                
              }
            ?>
            </p>
              </td>
            </tr>
          </table>
      </form>
    </div>

    <div class="container">
    <br>

      <?php

      require_once('Database/db_connnection.php'); // Using database connection file here
      $sql = "SELECT * FROM comment c, user u WHERE c.userID = u.userID AND c.newsID =".$_SESSION['news'];
      $records = mysqli_query($conn,$sql); // fetch data from database

      while($data = mysqli_fetch_array($records))
      {
      ?>
      <table border="0" width="400px">
        <tr>
          <td id="cmtbox"> <br>
            <h6> <i style="color:gray;"> by :  <?php echo $data['name']; ?> </i></h6>
            <p style="color:gray;"> <?php echo $data['comment']; ?> </p>  <hr> 
          </td>
          </tr>

      </table>	
      <?php
      }
      ?> 
    </div>


  </body>
</html>
