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
    <!-- Import jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Import JavaScript files-->
    <script src="JavaScript/mainScripts.js"></script>
  </head>
  <body>

  <?php 
    session_start();

    if(empty($_SESSION['name'])||empty($_SESSION['userID'])||empty($_SESSION['type'])){
      $_SESSION['name'] = ""; //User name
      $_SESSION['userID'] = ""; //UserID
      $_SESSION['type'] = ""; //User Type (Admin or User)
      $_SESSION['advert'] = ""; //Advert ID passing
    }

    if(isset($_POST['btnGo'])){
      $_SESSION['advert'] = $_POST['addID'];
      echo 'alert("'.$_SESSION['advert'].'");';
    }
  ?>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #147f8f;">
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
                    <form class="d-flex justify-content-end" method="post">
                        <input class="form-control me-2" type="search" placeholder="Search" name="Search">
                        <button class="btn btn-light" type="submit" name="btnSearch">Search</button>
                    </form>
                    <?php
							if(empty($_SESSION['userID']))
							{
								echo('<li class="nav-item"><a class="nav-link" href="login.php">Log in</a></li>');
							}
					  		else
							{
								if($_SESSION["type"]=="Admin")
								{
									$type = "admin-panel.php";
								} 
								else 
								{
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
                    <!--<li class="nav-item">
                      <a class="nav-link" href="#">Log in</a>
                    </li>-->
                  </ul>
                </div>
            </div>
          </nav>
    </header>

    <div class="welcome-div">
        <div class="text_Welcome">
            <h1 class="display-1 text-center whitetxt"><strong>Nissan Motors PVT (LTD)</strong></h1>
        </div>
    </div>

    <div class="adds">
        <?php 
            $search = "";
            if(isset($_POST['btnSearch'])){
              if($_POST['Search']=="" || isNan($_POST['Search'])){
                $search = "";
              }
              else{
                $search = $_POST['Search'];
              }
            }
        ?>
        <h2 name="content_headline"><?php if($search ==""){echo "All advertiesments"; } else { echo "Searching results of ".$search; } ?></h2><br>
        <div class="row row-cols-2 justify-content-center">
        <?php
            require_once('Database/db_connnection.php');
            $x=1;
            $rpp = 50;
            $maxNo= $x * $rpp;
            $minNo= $maxNo - $rpp;

            for($n = $minNo; $n < $maxNo; ++$n){
              $sql = "SELECT * FROM `advert` WHERE `status`= 'Posted'AND (`conditionType` LIKE '%".$search."%' OR `brand` LIKE '%".$search."%' OR `model` LIKE '%".$search."%') ORDER BY `date` DESC LIMIT ".$n.",1";
              $result = mysqli_query($conn, $sql);
              if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                  $sql1 = "SELECT * FROM `postimage` WHERE `addID` = ". $row['addID'];
                  $result1 = mysqli_query($conn, $sql1);
                  if (mysqli_num_rows($result) > 0) {
                    while($row1 = mysqli_fetch_assoc($result1)) {
                      //$addCount = $row['COUNT(`addID`)'];
                      echo '
                        
                        <div class="card" style="width: 18rem;">
                        <form method="post">
                        <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row1["image1"]).'" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h3 class="text-center">'.$row['brand'].' '.$row['model'].'</h3>
                          <p class="text-center text-secondary">'.$row['conditionType'].'</p>
                          <p class="card-text">'.$row['discription'].'</p>
                          <input type="hidden" name="addID" value="'.$row['addID'].'">
                          <input type="submit" class="btn btn-primary" name="btnGo" value="Open add"/>
                        </div>
                        </from>
                        </div></a><br>
                      ';
                    }
                  }
                }
              }
            } 
        ?>
        </div>
        <br>
        <div class="justify-content-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
      <div class="container">
        <span class="text-justify footertxt"><p class="text-cente">&copy; Nissan Motors (PVT) LTD. | Developed by <b>TurboMotions</b> </p></span>
      </div>
    </footer>
  </body>
</html>